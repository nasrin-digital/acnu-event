<?php
$eventName=$_REQUEST["eventName"];
$eventDate=$_REQUEST["eventDate"];
$eventAddress=$_REQUEST["eventAddress"];

include("../../source/mysql_connecting.php");

$sqlEvent=mysql_query("SELECT eventId FROM event_table WHERE eventName='$eventName' AND eventDate='$eventDate' AND eventDelete='0'");
if(mysql_num_rows($sqlEvent)>0)
{
	echo 'Duplicate';
	
}
else
{
	$currentDate=date("m/d/Y"); 
	mysql_query("INSERT INTO event_table (eventName, eventDate, eventAddress, eventRegisterDate) VALUES ('$eventName', '$eventDate', '$eventAddress', '$currentDate') ");
	echo'yes';
	exit;
}
?>