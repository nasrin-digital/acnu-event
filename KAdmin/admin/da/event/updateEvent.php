<?php
$eventId=$_REQUEST["eventId"];
$eventName=$_REQUEST["eventName"];
$eventDate=$_REQUEST["eventDate"];
$eventAddress=$_REQUEST["eventAddress"];

include("../../source/mysql_connecting.php");

$sqlEvent=mysql_query("SELECT eventId FROM event_table WHERE eventName='$eventName' AND eventDate='$eventDate' AND eventDelete='0' AND eventId!='$eventId'");
if(mysql_num_rows($sqlEvent)>0)
{
	echo 'Duplicate';
	
}
else
{
	mysql_query("UPDATE event_table SET eventName='$eventName', eventDate='$eventDate', eventAddress='$eventAddress' WHERE eventId='$eventId'");
	echo'yes';
	exit;
}
?>