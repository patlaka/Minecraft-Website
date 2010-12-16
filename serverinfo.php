<?php 
	session_start();
	$title = "Server Info";
	$_SESSION["prevpage"] = "serverinfo.php";
	include("./includes/header.php"); 
?>

<!-- End Header -->  
  <div class="content">
    <?php
		if(!session_is_registered("username")){ // if not logged in
			echo "<h3>You must be logged in to view server login information</h3>";
		}
		else{
			echo 
				'<h2>Welcome</h2>
				<p>Server Address: mc.grosinger.net<br />
				Port: 25565<br />
				Player Limit: 20</p>
				<p>If you have a microphone on your computer consider installing Mumble and joining our channel. 
					When playing it is much nicer to just talk instead of having to stop and type. Instructions on 
					how to install can be found <a href="mumble.html">here</a>.
				</p>';
		}	
	?><h2>Installed Plugins</h2>
    <ul> 
    	<li><a href = "http://wiki.hey0.net/index.php/Main_Page">Hey0's Mod (most recent version)</a></li>
		<?php
			if(session_is_registered("username")){ // if logged in
				echo
					"<li><a href = 'http://forum.hey0.net/showthread.php?tid=34'>Cuboid</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=94'>World Edit</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=797'>Leaf Dropper</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=837'>Light Weight Chest Protection</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=179'>Backup Plugin</a></li>
					<li><a href = 'http://www.minecraftwiki.net/wiki/Minecart_Mania!'>Minecart Mania</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=1696'>Spawn Control</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=386'>Graceful Reboot</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=512'>Holsters</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=260'>Borderlands</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=2059'>Flashlight</a></li>
					<li><a href = 'http://forum.hey0.net/showthread.php?tid=1787'>Sign Dispenser</a></li>
					</ul>";
					
			}
			else{
				echo "</ul>
					<h4>Please log in to view all plugins</h4>";
			}
		?>
	
    <h2>Rules</h2>
    <ul> 
    	<li>No Griefing</li>
        <li>Listen to the OPs and do what they request</li>
        <li>Travel away from all inhabited areas before gathering resources.  We like to keep the land looking nice.</li>
        <li>Use of bugs (duping or other exploits) is an instant ban.</li>
        <li>Please do no continuously ask for items. (This is survival, not creative!)</li>
        <li>No massive exploration without an admin's say so. (If the map file gets too large the server will lag more)</li>
    </ul>
    <h2>How to Change Player Skin</h2>
    <ol>
    	<li>Go to <a href="http://minecraft.net">http://minecraft.com</a> and log in.</li>
        <li>Click on the preferences link at the top of the page</li>
        <li>Click on Choose File and upload the skin file that you have saved to your computer</li>
        <li>Click Upload image and then restart your minecraft client.  Thats it!</li>
    </ol>
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>