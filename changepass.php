<?php
	include "db.php";
	// You may copy this PHP section to the top of file which needs to access after login.
	session_start(); // Use session variable on this page. This function must put on the top of page.
	$_SESSION["prevpage"] = "changepass.php";
	if(!session_is_registered("username")){ // if session variable "sername" does not exist.
		header("location:login.php"); // Re-direct to index.php
	}
	
	$username = $_SESSION["username"];
	
	if (isset($_POST['currentpass']) && isset($_POST['newpass1']) && isset($_POST['newpass2'])){ 
		//Get Sha1 hash of password 
		$currentpass = sha1($_POST['currentpass']);
		$newpass1 = sha1($_POST['newpass1']);
		$newpass2 = sha1($_POST['newpass2']);
		
		//Find actual current password
		$query = "SELECT password FROM webusers WHERE login = '$username'";
		$result = mysql_query($query) or die(mysql_error());
		$queryresult = mysql_fetch_array($result);
		$password = $queryresult['password'];
		if($password == $currentpass && $newpass1 == $newpass2){
			$query = "UPDATE webusers SET password='$newpass1' WHERE login='$username'";
			$result = mysql_query($query) or die(mysql_error());
			$_SESSION["message"] = "Password has been changed";
			header("location:usercp.php"); // Re-direct to index.php
		}
	}

?>