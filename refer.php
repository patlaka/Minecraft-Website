<?
include "db.php";
// You may copy this PHP section to the top of file which needs to access after login.
session_start(); // Use session variable on this page. This function must put on the top of page.
$_SESSION["prevpage"] = "mumble.php";
if(!session_is_registered("username")){ // if session variable "sername" does not exist.
	header("location:login.php"); // Re-direct to index.php
}
?>

<?php
	$title = "Refer-a-Friend";
	include("./includes/header.php"); 
?>

<!-- End Header -->  
  <div class="content">
    <h2>Coming Soon</h2>
    
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>