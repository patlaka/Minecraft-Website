<?php
	include("db.php"); 
	if (isset($_POST['username']) && isset($_POST['password'])){ 
		$password = $_POST['password'];
		$password = sha1($password);    
		user_login($_POST['username'], $password); 
	} 

	$title = "Login";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
?>

<!-- End Header --> 
  <div class="content">
	<?php
	
		if(isset($_SESSION["message"])){
			echo '<h4>' . $_SESSION["message"] . '</h4>';
			$_SESSION["message"] = NULL;
		}
	
		// If the session is already logged in do not show
		// another log in box.
		
		elseif(session_is_registered("username")){
			echo "<h3>You are already logged in</h3>";
		}
		else{
			echo "<h3>Please log in</h3>";
		}
	?>

  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>
