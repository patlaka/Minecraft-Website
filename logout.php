<?PHP

session_start();
session_destroy();

?>

<?php 
	include("./includes/header.php"); 
	$title = "Logout";
?>

<!-- End Header --> 
  <div class="content">
    <h3>You have been logged out</h3>
		<p>Click <a href="index.php">here</a> to view Home Page</p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>

  