<?php 
	session_start();
	$title = "Screenshots";
	$_SESSION["prevpage"] = "screenshots.php";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php");
?>

<!-- End Header -->
  <div class="content">
    <h1>ScreenShots</h1>
    <h4>Server Bug 12/1/2010</h4>
    <p><a href="archives/screenshots/serverbug-12-01-2010.png"><img src="archives/screenshots/serverbug-12-01-2010.png" width="600" height="340" alt="serverbug" /></a>
    <br />It appears as though animals are not properly de-spawning.</p>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>