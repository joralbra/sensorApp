<?php
$username="root";
$password="sensorproject";
$database="tempSensor";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die("Unable to select database");

$query="SELECT * FROM tempLog";
$result = mysql_query($query);

$num = mysql_numrows($result);

mysql_close();

$tempValues = array();

$i = 0;

while($i < $num)
{
	$dateAndTemps = array();
	$dataTime = mysql_result($result, $i, "dataTime");
	$Data = mysql_result($result, $i, "Data");

	$dateAndTemps["Date"] = $dataTime;
	$dateAndTemps["Temp"] = $Data;

	$tempValues[$i] = $dateAndTemps;
	$i++;
}
echo json_encode($tempValues[0]["Date"]);
?>