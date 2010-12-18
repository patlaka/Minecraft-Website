<?php 
	session_start();
	$title = "Home";
	$_SESSION["prevpage"] = "index.php";
	include("db.php");
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php");
?>

<!-- End Header -->  
  <div class="content">
    <h1>New Users</h1>
    <p>Please visit the Server Info page to view the rules and other information about website. 
		All rules must be followed at all times, even when no mods are present.</p>
		
    <h1>Announcements</h1>
		<?php 
		 $data = mysql_query("SELECT * FROM frontpage ORDER BY created desc") or die(mysql_error()); 
		 while($info = mysql_fetch_array( $data )) 
		 { 
			if($info['onfront'] == 1)
			{
				echo "<h3>" . $info['title'] . "</h3>";
				echo "<p>" . $info['content'] . "</p><hr />"; 
			}
		 }  
		?> 
	
	
	<p><a href="oldposts.php">Click to view old posts</a></p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>
