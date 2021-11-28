<?php
include("../../source/mysql_connecting.php");

$sqlTicket=mysql_query("SELECT * FROM ticket_table, event_table, officer_table WHERE ticket_table.eventId=event_table.eventId AND ticket_table.officerId=officer_table.officerId AND eventDelete='0' AND officerDelete='0' AND ticketDelete='0' ORDER BY ticketId DESC");
if(mysql_num_rows($sqlTicket)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>Event Name</th>
				<th>Officer Name</th>
				<th>Ticket Number</th>
				<th>Ticket Price</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>';
	while($rowTicket=mysql_fetch_assoc($sqlTicket))
	{
		echo'<tr id="ticket_'.$rowTicket["ticketId"].'">
				<td>'.$rowTicket["eventName"].' '.$rowTicket["eventDate"].'</td>
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
				</td>
			</tr>';
	}
	
		echo'</tbody>
        </table>';
	
}
else
{
	echo'<p style="text-align:center; color:#C00; margin-top:20px; font-size:16px;">There is not any ticket to show </p>';
	exit;
}
?>