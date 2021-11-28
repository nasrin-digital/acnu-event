<?php
$eventId=$_REQUEST["eventId"];
$tableId=$_REQUEST["tableId"];
$seatName=$_REQUEST["seatName"];


include("../../source/mysql_connecting.php");

$sqlSeat=mysql_query("SELECT seatId FROM seat_table WHERE eventId='$eventId' AND tableId='$tableId' AND seatName='$seatName' AND seatDelete='0'");
if(mysql_num_rows($sqlSeat)>0)
{
	echo 'Duplicate';
	
}
else
{
	$currentDate=date("m/d/Y"); 
	mysql_query("INSERT INTO seat_table (eventId, tableId, seatName, seatRegisterDate) VALUES ('$eventId', '$tableId', '$seatName', '$currentDate') ");
	echo'yes';
	exit;
}
?>