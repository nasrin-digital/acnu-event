<?php
$seatId=$_REQUEST["seatId"];
$eventId=$_REQUEST["eventId"];
$tableId=$_REQUEST["tableId"];
$seatName=$_REQUEST["seatName"];


include("../../source/mysql_connecting.php");

$sqlSeat=mysql_query("SELECT seatId FROM seat_table WHERE eventId='$eventId' AND tableId='$tableId' AND seatName='$seatName' AND seatDelete='0' AND seatId!='$seatId'");
if(mysql_num_rows($sqlSeat)>0)
{
	echo 'Duplicate';
	
}
else
{
	mysql_query("UPDATE seat_table SET eventId='$eventId', tableId='$tableId', seatName='$seatName' WHERE seatId='$seatId'");
	echo'yes';
	exit;
}
?>