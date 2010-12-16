<?php 
	session_start();
	$title = "Account Created";
	$_SESSION["prevpage"] = "created.php";
	include("./includes/header.php"); 
	
?>

<!-- End Header --> 
  <div class="content">
    <p align="center">&nbsp;</p>
    <p align="center">Account Created
				<br />
				Click <a href='login.php'>here</a> to Login</p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>