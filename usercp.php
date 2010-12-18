<?
	include "db.php";
	session_start();
	$_SESSION["prevpage"] = "usercp.php";
	if(!session_is_registered("username")){ // if session variable "username" does not exist.
		header("location:login.php"); // Re-direct to login.php
	}

	$title = "User Control Panel";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
?>

<!-- End Header -->  
  <div class="content">
    <h1>User Control Panel</h1>
    <h4>Change Password:</h4>
	<?php
		if(isset($_SESSION["message"])){
			echo $_SESSION["message"];
			$_SESSION["message"] = "";
		}
	?>
	<p>
		<form action="changepass.php" method="post">
			<table>
				<tr>
					<td>Current Password: </td>
					<td><input type="password" name="currentpass" /></td>
				</tr>
				<tr>
					<td>New Password: </td>
					<td><input type="password" name="newpass1" /></td>
				</tr>
				<tr>
					<td>Confirm Password: </td>
					<td><input type="password" name="newpass2" /></td>
				</tr>
			</table>
			<input type="submit" value="Change" />
		</form>
	</p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>