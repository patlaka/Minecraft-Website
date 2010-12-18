<?
	include "db.php";
	session_start();
	$_SESSION["prevpage"] = "mumble.php";
	if(!session_is_registered("username")){ // if session variable "username" does not exist.
		header("location:login.php"); // Re-direct to login.php
	}

	$title = "Mumble";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
?>

<!-- End Header -->  
  <div class="content">
    <h2>Welcome</h2>
    <ul> 
    	<li>Download and install Mumble from <a href="http://sourceforge.net/projects/mumble/">here</a></li>
    	<li>Follow the instructions until you are able to connect to a server.</li>
    	<li>Click Add New...</li>
    	<li>
            <table width="400" border="0">
          <tr>
            <td>Server Name:</td>
            <td>Minecraft</td>
          </tr>
          <tr>
            <td>Address:</td>
            <td>mc.grosinger.net</td>
          </tr>
          <tr>
            <td>Port:</td>
            <td>64742</td>
          </tr>
          <tr>
            <td>Username:</td>
            <td>Your Minecraft username</td>
          </tr>
        </table></li>
    </ul>
	<p>If you have any questions ask me in-game.</p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>