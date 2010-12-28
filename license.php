<?php 
	session_start();
	$title = "License";
	$_SESSION["prevpage"] = "license.php";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
?>

<!-- End Header --> 
  <div class="content">
	<h1>Creative Commons</h1>
	<center><a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Atrium Minecraft</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://minecraft.grosinger.net" property="cc:attributionName" rel="cc:attributionURL">Tony Grosinger</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/">Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License</a>.</center>

  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>