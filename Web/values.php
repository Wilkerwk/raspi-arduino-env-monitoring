<?php

$con = mysql_connect("localhost","root","root");

if (!$con) {
die('Could not connect: ' . mysql_error());
}

mysql_select_db("doaIbuProject", $con);

$result = mysql_query("SELECT * FROM sensorDataExt") or die ("Imposible");

while($row = mysql_fetch_array($result)) {
echo $row['time'] . "/" . $row['temperature']. "/" . $row['humidity']. "/";
}

mysql_close($con);
?>
