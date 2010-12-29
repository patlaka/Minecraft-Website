<?php
$q=$_GET["q"];
$q = trim($q);

include ("connect.php");

$sql="SELECT * FROM webusers WHERE login = '".$q."'";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>Username</th>
<th>Referrer</th>
<th>Email</th>
<th>CanRefer</th>
<th>Level</th>
<th>LoginTimes</th>
<th>LastLogin</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['login'] . "</td>";
  echo "<td>" . $row['referrer'] . "</td>";
  echo "<td>" . $row['email'] . "</td>";
  echo "<td>" . $row['canrefer'] . "</td>";
  echo "<td>" . $row['level'] . "</td>";
  echo "<td>" . $row['timesloggedin'] . "</td>";
  echo "<td>" . $row['lastlogin'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>