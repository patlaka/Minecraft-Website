<?php 
	session_start();
	$title = "Projects";
	$_SESSION["prevpage"] = "projects.php";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	include("./includes/lowerheader.php"); 
?>

<!-- End Header --> 
  <div class="content">
	<h2>Northern Outpost</h2>
	<p>The next major team project for Atrium Minecraft is building a subway station at the northern base. Atop the subway station will sit a fortification against the wilderness, a castle! Current plans can be found below. Plans are based loosely around <a href=http://en.wikipedia.org/wiki/Manzanares_el_Real>Manzanares el Real</a> Castle in Spain. <a href="archives/projects/northernoutpost-01-08-2011.png"><img src="archives/projects/northernoutpost-01-08-2011.png" width=600 height=403/></a><br />
	<a href="archives/projects/northernoutpost-01-08-2011-night.png">Night time photo</a><br />
	<a href="archives/projects/northernoutpost-12-25-2010.png">Work in progress</a></p>
	<p>
		<h4>Current Plans</h4>
		<img src=images/castleplan.png />
	</p><hr />
    <h2>The Apartment Building</h2>
    <p>Started by Shadowriver, construction on this multistory appartment building is now complete.  If you donated glass please choose an unclaimed floor and start customizing!  You may change the floor and the ceiling if you wish but may not touch the glass.  Send me pictures of your finished product.<a href="archives/projects/apartment-12-03-2010.png"><img src="archives/projects/apartment-12-03-2010.png" width="600" height="382" alt="Apartment Building" /></a><br />
    <a href="archives/projects/apartment-11-24-2010.png">Work in progress</a></p><hr />
    
    <h2>The Spawn Area</h2>
    <p>The spawn is the first view anyone has of the server and should make a great first impression.  Currently the spawn area is very bland and could use a comeplete overhaul.  If anyone feels up to the task of making a simple and elegant spawn area please pm Abadon125 about gaining access to editing it.<a href="archives/projects/spawn-11-24-2010.png"><img src="archives/projects/spawn-11-24-2010.png" width="600" height="480" alt="Apartment Building" /></a></p><hr />

  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>