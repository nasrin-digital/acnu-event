<?php
$ticketId=$_REQUEST["ticketId"];

include("../../source/mysql_connecting.php");

$sqlTicket=mysql_query("SELECT * FROM ticket_table, event_table, officer_table WHERE ticket_table.eventId=event_table.eventId AND ticket_table.officerId=officer_table.officerId AND eventDelete='0' AND officerDelete='0' AND ticketDelete='0' AND ticketId='$ticketId'");
if(mysql_num_rows($sqlTicket)==1)
{
	$rowTicket=mysql_fetch_assoc($sqlTicket);
	echo'<td>'.$rowTicket["eventName"].' '.$rowTicket["eventDate"].'</td>
		  <td>'.$rowTicket["officerFirstName"].' '.$rowTicket["officerLastName"].'</td>
		  <td>'.$rowTicket["ticketNumber"].'</td>
		  <td>'.$rowTicket["ticketPrice"].'</td>
		  <td style="text-align:center;">
			  <div class="btn-group">
				<button type="button" class="btn btn-danger btn-xs">Action</button>
				<button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
				  <span class="caret"></span>
				  <span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#" onclick="editTicket('.$rowTicket["ticketId"].');">Edit</a></li>
				  <li><a href="#" onclick="deleteTicket('.$rowTicket["ticketId"].');">Delete</a></li>
				 </ul>
			   </div>
		  </td>';
	
}
else
{
	echo'Error';
	exit;
}
?>