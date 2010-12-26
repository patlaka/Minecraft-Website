<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
		if(isset($title)){
			echo "<title>" . $title . " - Atrium Minecraft</title>";
		}
		else{
			echo "<title>Atrium Minecraft</title>";
		}
		
		function GetServerStatus($site, $port)
			{
				$status = array("OFFLINE", "ONLINE");
				$fp = @fsockopen($site, $port, $errno, $errstr, 2);
				if (!$fp) {
					return $status[0];
				} else {
					return $status[1];
				}
			}
	?>

	<link href="main.css" rel="stylesheet" type="text/css" />
	<!--
	<script type="text/javascript" language="JavaScript" src="scripts/banner.js"></script>
	<script type="text/javascript" language="JavaScript" src="scripts/analytics.js"></script>
	-->
	
	<script type="text/javascript" language="JavaScript" src="scripts/main.js"></script>

  