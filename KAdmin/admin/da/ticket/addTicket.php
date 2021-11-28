<?php
$eventId=$_REQUEST["eventId"];
$officerId=$_REQUEST["officerId"];
$ticketNumber=$_REQUEST["ticketNumber"];
$ticketPrice=$_REQUEST["ticketPrice"];

include("../../source/mysql_connecting.php");

$sqlTicket=mysql_query("SELECT ticketId FROM ticket_table WHERE eventId='$eventId' AND ticketNumber='$ticketNumber' AND ticketDelete='0'");
if(mysql_num_rows($sqlTicket)>0)
{
	echo 'Duplicate';
	
}
else
{
	$currentDate=date("m/d/Y"); 
	mysql_query("INSERT INTO ticket_table (eventId, officerId, ticketNumber, ticketPrice, ticketRegisterDate) VALUES ('$eventId', '$officerId', '$ticketNumber', '$ticketPrice', '$currentDate') ");
	echo'yes';
	exit;
}
?>