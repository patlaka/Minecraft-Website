<?
include "db.php";
session_start();
$_SESSION["prevpage"] = "admincp.php";

if(!session_is_registered("username")){ // if session variable "username" does not exist.
	header("location:login.php"); // Re-direct to login.php
}elseif($_SESSION["level"] < 4){ //Must be level 4 or higher to get in
	header("location:index.php"); // Re-direct to index.php
}

//Create new article on front page
if (isset($_POST['title']) && isset($_POST['content'])){
	$title = mysql_real_escape_string($_POST['title']); 
	$content = mysql_real_escape_string($_POST['content']); 
	
	//Insert into table
	$querry = "INSERT INTO frontpage (title, content) VALUES ('$title', '$content')";
	mysql_query($querry);
}

//Remove article from front page
if (isset($_POST['titleremove']) && isset($_POST['confirm'])){
	$title = mysql_real_escape_string($_POST['titleremove']);
	$title = trim($title);
	$confirm = $_POST['confirm'];
	if($confirm == 1){
		$query_date = "UPDATE frontpage SET onfront=0 WHERE title='$title'";
		mysql_query($query_date) or die(mysql_error());
	}
}

//Change user account
if (isset($_GET['selectuser']) && isset($_GET['setlectedfield']) && isset($_GET['newvalue'])){
	$user = mysql_escape_string($_GET['selectuser']);
	$user = trim($user);
	$field = mysql_escape_string($_GET['selectedfield']);
	$field = trim($field);
	$value = mysql_escape_string($_GET['newvalue']);
	$value = trim($value);
	
	if ($field == 'password'){
		$value = sha1($value);
	}
	
	if ($field == 'login' || $field == 'password' || $field == 'referrer' || $field == 'email'){
		$query = "UPDATE webusers SET $field='$value' WHERE 'login'='$user'";
	}
	else{
		$query = "UPDATE webusers SET $field=$value WHERE 'login'='$user'";
	}
	mysql_query($query) or die(mysql_error());
}

//Generate html for dropdown menu with name $name and options $options
function generateSelect($name = '', $options = array()){
	$html = '<select name="'.$name.'"><option value="">Select an option:</option>';
	foreach ($options as $value => $option) {
		$html .= '<option value= " '.$option.'">'.$option.'</option>';
	}
	$html .= '</select>';
	return $html;
}

//Generate html for dropdown menu with name $name and options $options
function generateSelectNoHead($name = '', $options = array()){
	$html = '<option value="">Select a person:</option>';
	foreach ($options as $value => $option) {
		$html .= '<option value= " '.$option.'">'.$option.'</option>';
	}
	$html .= '</select>';
	return $html;
}

	$title = "Admin Control Panel";
	include("./includes/header.php");
	//Insert items here to include in HTML Head section
	echo '<script type="text/javascript" language="JavaScript" src="scripts/admincp.js"></script>';
	include("./includes/lowerheader.php");
?>

<!-- End Header -->  
  <div class="content">
    <?php
	
		//
		//Add article to front page if level 5
		//
		
		echo "<h3>Add to Front Page</h3>";
		if ($_SESSION["level"] == 5) //Only have the ability to add if level 5 account
		{
			echo
				'<p>
					<form action="admincp.php" method="post">
							</p>
								<table>
									<tr>
										<td>Title: </td>
										<td><input name="title" type="text" /></td>
									</tr>
								</table>
							
								<textarea rows="4" cols="33" name="content"></textarea>
							</p>
							<p>
								<input type="submit" value="Add to Front Page" />
							</p>
						</form>
				</p>';
		}
		else
		{
			echo "<p>You are not level 5</p>";
		}
		
		//
		//Remove article from front page if level 5
		//
		
		echo "<hr /><h3>Remove from Front Page</h3>";
		if ($_SESSION["level"] == 5)
		{
		
			//Generate list of all articles that are on the front page
			$result = mysql_query("SELECT * FROM frontpage WHERE onfront = '1' ORDER BY created desc") or die(mysql_error());
			$articles = array();
			while ($row = mysql_fetch_assoc($result)) {
				$articles[] = $row['title'];
			}
			
			$html = generateSelect('titleremove', $articles);
			echo
				'<p>
					<form action="admincp.php" method="post">
							</p>
								<table>
									<tr>
										<td>Article to Remove from Front: </td>
										<td> ' . $html . '</td>
									</tr>
								</table>
								<input type="checkbox" name="confirm" value="1" />Are you sure?
							</p>
							<input type="submit" value="Remove from Front Page" />
						</form>
				</p>';
		}
		else
		{
			echo "<p>You are not level 5</p>";
		}
	
	//
	//Begin section for viewing users	
	//
	echo "<hr /><h3>Edit Users</h3>";
	if ($_SESSION["level"] == 5)
	{
		//Generate code for Users list
		$result = mysql_query("SELECT * FROM webusers") or die(mysql_error());
		$users = array();
		while ($row = mysql_fetch_assoc($result)) {
			$users[] = $row['login'];
		}
		$html = generateSelectNoHead('selecteduser', $users);
		
		//Generate code for fields list
		$fields = array("1" => "login", "2" => "password", "3" => "referrer", "4" => "email", "5" => "canrefer", "6" => "level");
		$fieldscode = generateSelect('selectedfield', $fields);
		echo
			'<p>
				<form action="admincp.php" method="get">
					<table>
						<tr>
							<td>Select User: </td>
						</tr>
						<tr>
							<td> <select name="selectuser" onchange="showUser(this.value)">' . $html . '</td>
						</tr>
						<tr>
							<td>Field: ' . $fieldscode . '</td>
						</tr>
						<tr>
							<td>New Value: <input name="newvalue" type="text" /></td>
						</tr>
					</table>
					<input type="submit" value="Update Account" />
				</form>
			</p>';
		echo '<div id="displayuser"></div>'; //User information will be displayed here
	}
	else
	{
		echo "<p>You are not level 5</p>";
	}
	
	?>
	
	
  </div>
<!-- Begin Footer -->  

<?php include("./includes/footer.php"); ?>