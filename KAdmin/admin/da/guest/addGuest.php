<?php
$eventId=$_REQUEST["eventId"];
$officerId=$_REQUEST["officerId"];
$ticketId=$_REQUEST["ticketId"];
$tableId=$_REQUEST["tableId"];
$seatId=$_REQUEST["seatId"];
$foodId=$_REQUEST["foodId"];
$guestDishSize=$_REQUEST["guestDishSize"];
$guestFirstName=$_REQUEST["guestFirstName"]; 
$guestLastName=$_REQUEST["guestLastName"]; 
$guestCellphone=$_REQUEST["guestCellphone"];
$guestPayment=$_REQUEST["guestPayment"]; 
$guestComment=$_REQUEST["guestComment"];

include("../../source/mysql_connecting.php");


if(mysql_num_rows(mysql_query("SELECT guestId FROM guest_table WHERE eventId='$eventId' AND ticketId='$ticketId' AND guestDelete='0'"))>0)
{
	echo 'Ticket number exist';
	exit;
	
}
if(mysql_num_rows(mysql_query("SELECT guestId FROM guest_table WHERE eventId='$eventId' AND seatId='$seatId' AND guestDelete='0'"))>0)
{
	echo 'Seat name exist';
	exit;
}
if(mysql_num_rows(mysql_query("SELECT guestId FROM guest_table WHERE eventId='$eventId' AND guestFirstName='$guestFirstName' AND guestLastName='$guestLastName' AND guestCellphone='$guestCellphone' AND guestDelete='0'"))>0)
{
	echo 'Guest name exist';
	exit;
}

if($officerId==0)
{
	$sqlOfficer=mysql_query("SELECT officerId FROM ticket_table WHERE ticketId='$ticketId'");
	$rowOfficer=mysql_fetch_assoc($sqlOfficer);
	$officerId=$rowOfficer["officerId"];
}
$currentDate=date("m/d/Y"); 


mysql_query("INSERT INTO guest_table (eventId, officerId, ticketId, tableId, seatId, foodId, guestDishSize, guestFirstName, guestLastName, guestCellphone, guestPayment, guestComment, guestRegisterDate) VALUES ('$eventId', '$officerId', '$ticketId', '$tableId', '$seatId', '$foodId', '$guestDishSize', '$guestFirstName', '$guestLastName', '$guestCellphone', '$guestPayment', '$guestComment', '$currentDate')");


echo'yes';
exit;

?>