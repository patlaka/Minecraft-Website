<?php
session_start();
include("./includes/connect.php");
function user_logout()
{
	session_destroy();
	echo "<p>You have been logged out.</p>";
}

function user_login ($username, $password) 
{ 	
	$debug = false;
	if ($debug){
		echo "Debugging: <br> Username Entered: " . $username;
		echo "<br> Password Entered: " . $password . "<br>";
	}
	//take the username and prevent SQL injections 
	$username = mysql_real_escape_string($username);
	
	//See if username exists
	if(!check_username($username)){
		$_SESSION["message"] = "Username does not exist";
		header("location:login.php"); //Forward to login page if username doesn't exist
	}
	
	//begin the query 
	$verify = mysql_query("SELECT password FROM webusers WHERE login = '$username'")
	or die(mysql_error());
	$row = mysql_fetch_array( $verify );
	$verifypass = $row['password'];

	if (!$verifypass) {
		die("Error, could not query the db! " . mysql_error());
	}
	
	
	//check to see if password is the same
	if ($password != $verifypass){ 
		$_SESSION["message"] = "Incorrect username/password";
		header("location:login.php");
	}
	else { 
		//have them logged in 
		
		$_SESSION["username"] = $username;

		//Find their level and set as session variable
		$query = "SELECT level FROM webusers WHERE login = '$username'";
		$result = mysql_query($query) or die(mysql_error());
		$queryresult = mysql_fetch_array($result);
		$_SESSION["level"] = $queryresult['level'];
		 
		//Update timestamp for user
		$query_date = "UPDATE webusers SET lastlogin=CURDATE() WHERE login='$username'";
		mysql_query($query_date) or die(mysql_error());
		
		//Increment number of times logged in
		$query = "SELECT timesloggedin FROM webusers WHERE login = '$username'";
		$result = mysql_query($query) or die(mysql_error());
		$queryresult = mysql_fetch_array($result);
		$times = $queryresult['timesloggedin'] + 1;
		$query = "UPDATE webusers SET timesloggedin='$times' WHERE login='$username'";
		$result = mysql_query($query) or die(mysql_error());
		
		if($debug){
			echo "<br>You Logged in!";
			if(isset($_SESSION["username"])){
				echo "<br>Your username is " . $_SESSION["username"];
				echo "<br><a href='index.php'>Continue</a>";
			}
		}
		
		if (isset($_SESSION["prevpage"])){
			$page = $_SESSION["prevpage"]; //Return to the page stored in their previous page variable
			header("location: $page");
		}
		else{
			header("location:index.php"); //Else just return to the homepage
		}
		
	} 
}
function check_username($username) {
	//Check to see if username exists
	$sql = mysql_query("SELECT login FROM webusers WHERE login = '$username'") or die(mysql_error());
	if(mysql_num_rows($sql)==0) {
		return false;
	}
	else {
		return true;
	}
}
?>