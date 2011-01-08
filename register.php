<?php 
include("db.php"); 
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['referrer'])){ 
	//Prevent SQL injections 
	$username = mysql_real_escape_string($_POST['username']); 
	$username = strtolower($username); //No uppercase in usernames
	$email = mysql_real_escape_string($_POST['email']);
	$referrer = mysql_real_escape_string($_POST['referrer']); 
	$referrer = strtolower($referrer); //No uppercase in usernames
	 
	 // Check that the email is valid
	 $emailvalid = check_email($email);
	 if(!$emailvalid){
		echo $email . " is not a valid email
			<br> Click <a href='register.php'>here</a> to try again.";
		
		exit();
	 }
	 
	 // Check that the referrer is actually a user and allowed to refer
	$referrervalid = check_referrer($referrer);
	if(!$referrervalid){
		echo "That referrer is either not valid or not allowed to refer users.
			<br> Click <a href='register.php'>here</a> to try again.";
		
		exit();
	}
	 
	//Get Sha1 hash of password 
	$password = sha1($_POST['password']); 
	 
	$debug = false;
	if ($debug){
		echo "Debugging: <br> Username Entered: " . $username;
		echo "<br> Password Entered: " . $password;
		echo "<br> Email Entered: " . $email . "<br>";
	}
	
	$userexists = check_username($username);
	 if($userexists){
		die ("Username taken.");
	 } 
	
	//
	// If Sucessful
	//
	
	//Create Account
	mysql_query("INSERT INTO webusers (login, password, email, referrer) VALUES ('$username', '$password', '$email', '$referrer')");
	
	//Add to whitelist
	$query = "SELECT name FROM whitelist WHERE name = '$username'";
	$result = mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)==0){
		mysql_query("INSERT INTO whitelist (name) VALUES ('$username')");
	}
	
	//Send email to administrators
	$subject = "New user registered - Atrium Minecraft";
	$body = "Please welcome new user: " . $username;
	$headers = "MIME-Version: 1.0\n"
            ."From: \"".$name."\" <".$email.">\n"
            ."Content-type: text/html; charset=iso-8859-1\n";
	$toemail1 = "webmaster@grosinger.net";
	mail($toemail1, $subject, $body, $headers);

	header("location:created.php"); // success page. put the URL you want 
}

function check_referrer($referrer) {
		$query = "SELECT login,canrefer FROM webusers WHERE login = '$referrer' and canrefer= 1 ";
        $result = mysql_query($query) or die(mysql_error());
		
		if(mysql_num_rows($result)==0){
			return false;
		}
		else{
			return true;
		}
	//}
}

function check_email($email) { 
	//Taken from http://ycscripts.co.cc/free-php-tutorials/1/User-Management-System
	
    // First, we check that there's one @ symbol, and that the lengths are right 
     if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {  
        // Email invalid because wrong number of characters in one section, or wrong number of @ symbols. 
        return false;  
     }  
     // Split it into sections to make life easier  
     $email_array = explode("@", $email); 
     $local_array = explode(".", $email_array[0]); 
     for ($i = 0; $i < sizeof($local_array); $i++) { 
        if (!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])) { 
            return false; 
        } 
    } 
    if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {  
        // Check if domain is IP. If not, it should be valid domain name  
        $domain_array = explode(".", $email_array[1]);  
        if (sizeof($domain_array) < 2) {  
            return false; // Not enough parts to domain 
        } 
        for ($i = 0; $i < sizeof($domain_array); $i++) {  
            if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])) {  
                return false; 
            } 
        } 
    } 
    return true; 
} 

	$title = "Register";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
?>

<!-- End Header --> 
  <div class="content">
    <h2>Create New Account</h2>
    <p>All fields are required. Passwords are encrypted.</p>
    <p>Be sure to use your minecraft username or you will be unable to log into the server.  </p>
	<p>Note: The referrer field is the username of the person who told you about this server.</p>
    <form action="register.php" method="post">
  <br />
		<table border="0">
			<tr>
				<td>Username: </td>
				<td><input name="username" type="text" /></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" /></td>
            </tr>
			<tr>
				<td>Email: </td>
				<td><input name="email" type="text" /></td>
            </tr>
			<tr>
				<td>Referrer: </td>
				<td><input name="referrer" type="text" /></td>
			</td>
			<tr>
				<td></td>
				<td><input type="submit" value="Submit" /></td>
			</tr>
		</table>
    </form>
	</p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>