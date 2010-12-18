<?
include "db.php";
// You may copy this PHP section to the top of file which needs to access after login.
session_start(); // Use session variable on this page. This function must put on the top of page.
$_SESSION["prevpage"] = "oldposts.php";
if(!session_is_registered("username")){ // if session variable "sername" does not exist.
	header("location:login.php"); // Re-direct to index.php
}
?>

<?php
	$title = "Old Posts";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php");
?>

<!-- End Header -->  
  <div class="content">
    <h1>Old Posts Archive</h1>
	<?php 
		 $data = mysql_query("SELECT * FROM frontpage ORDER BY datecreated desc") or die(mysql_error()); 
		 while($info = mysql_fetch_array( $data )) 
		 { 
			if($info['onfront'] == 0)
			{
				echo "<h3>" . $info['title'] . "</h3>";
				echo "<p>" . $info['content'] . "</p>"; 
			}
		 }  
	?> 
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>