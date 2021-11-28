<?php
$eventId=$_REQUEST["eventId"];
$officerId=$_REQUEST["officerId"];

include("../../source/mysql_connecting.php");
if($officerId==0)
	$sqlTicket=mysql_query("SELECT * FROM ticket_table WHERE eventId='$eventId' AND ticketDelete='0' ORDER BY ticketId DESC");
else
	$sqlTicket=mysql_query("SELECT * FROM ticket_table WHERE eventId='$eventId' AND officerId='$officerId' AND ticketDelete='0' ORDER BY ticketId DESC");
	
	
if(mysql_num_rows($sqlTicket)>0)
{
	echo'<select id="guestTicket" class="form-control">
			<option>Select</option>';
	while($rowTicket=mysql_fetch_assoc($sqlTicket))
	{
		echo'<option value="'.$rowTicket["ticketId"].'">'.$rowTicket["ticketNumber"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="guestTicket" class="form-control"><option>Select</option></select>';
	exit;
}
?>