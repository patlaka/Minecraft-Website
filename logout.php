<?PHP
	session_start();
	session_destroy();

	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
	$title = "Logout";
?>

<!-- End Header --> 
  <div class="content">
    <h3>You have been logged out</h3>
		<p>Click <a href="index.php">here</a> to view Home Page</p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>

  