<?php
	include "db.php";
	session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="refresh" content="0;URL=contact.php">
<title>Email Form</title>
</head>

<body>
<?php
  $name=addslashes($_POST['name']);
  $email=addslashes($_POST['email']);
  $comments=addslashes($_POST['message']);

 // you can specify which email you want your contact form to be emailed to here

  $toemail1 = "webmaster@grosinger.net";
  $toemail2 = "r.garrett.wright@gmail.com";
  $toemail3 = "linkreedy@gmail.com";
  $subject = "From Online Contact Form - Atrium Minecraft";

  $headers = "MIME-Version: 1.0\n"
            ."From: \"".$name."\" <".$email.">\n"
            ."Content-type: text/html; charset=iso-8859-1\n";

  $body = "Name: ".$name."<br>\n"
            ."Email: ".$email."<br>\n"
            ."Comments:<br>\n"
            .$comments;

  if (!ereg("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $email))
  {
    echo "That is not a valid email address.  Please return to the"
           ." previous page and try again.";
    exit;
  }

    mail($toemail1, $subject, $body, $headers);
    mail($toemail2, $subject, $body, $headers);
    mail($toemail3, $subject, $body, $headers);
    echo "Thanks for submitting your comments";
	$_SESSION["message"] = "Your message has been sent";
?>
</body>
</html>
