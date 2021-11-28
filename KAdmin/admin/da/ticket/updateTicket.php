<?php
$ticketId=$_REQUEST["ticketId"];
$eventId=$_REQUEST["eventId"];
$officerId=$_REQUEST["officerId"];
$ticketNumber=$_REQUEST["ticketNumber"];
$ticketPrice=$_REQUEST["ticketPrice"];

include("../../source/mysql_connecting.php");

$sqlTicket=mysql_query("SELECT ticketId FROM ticket_table WHERE eventId='$eventId' AND ticketNumber='$ticketNumber' AND ticketDelete='0' AND ticketId!='$ticketId'");
if(mysql_num_rows($sqlTicket)>0)
{
	echo 'Duplicate';
	
}
else
{
	mysql_query("UPDATE ticket_table SET eventId='$eventId', officerId='$officerId', ticketNumber='$ticketNumber', ticketPrice='$ticketPrice' WHERE ticketId='$ticketId'");
	echo'yes';
	exit;
}
?>