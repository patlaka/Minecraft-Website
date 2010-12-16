<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		if(isset($title)){
			echo "<title>" . $title . " - Atrium Minecraft</title>";
		}
		else{
			echo "<title>Atrium Minecraft</title>";
		}
	?>

	<link href="main.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" language="JavaScript" src="scripts/banner.js"></script>
	<script type="text/javascript" language="JavaScript" src="scripts/analytics.js"></script>
</head>

<body>
<div class="container">
  <div class="header"><a href="#"><script language="JavaScript"><!--
printImage();
//--></script></a> 
  </div>
  <div class="sidebar1">
    <ul class="nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="serverinfo.php">Server Info</a></li>
      <li><a href="commands.php">Commands</a></li>
      <li><a href="mumble.php">Mumble</a></li>
      <li><a href="projects.php">Projects</a></li>
      <li><a href="maps.php">World Maps</a></li>
      <li><a href="screenshots.php">Screen Shots</a></li>
      <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <p>
		<div class="loginbox">
		<?php
			if(session_is_registered("username")){
				echo "Welcome " . $_SESSION["username"];
				echo "<br><a href='logout.php'>Logout</a>";
				echo "<br><a href='usercp.php'>Control Panel</a>";
				if ($_SESSION["level"] >= 4){ //If the user is greater than level 3
					//Show link to AdminCP
					echo "<br><a href='admincp.php'>AdminCP</a>";
				}
				
			}
			else{
				echo 
					'<form action="login.php" method="post">
						<table>
							<tr>Username: </tr>
							<tr><input name="username" type="text" /></tr>
							<tr>Password: </tr>
							<tr><input type="password" name="password" /></tr>
						</table>
						<input type="submit" value="Submit" />
					</form>';
				echo "<br><h6><a href='register.php'>Create Account</a></h6>";
			}
		
		?>
		</div>
	</p>
  </div>
  