<?php
$ticketId=$_REQUEST["ticketId"];

include("../../source/mysql_connecting.php");

$sqlTicket=mysql_query("SELECT * FROM ticket_table WHERE ticketId='$ticketId' AND ticketDelete='0'");
if(mysql_num_rows($sqlTicket)==1)
{
	$rowTicket=mysql_fetch_assoc($sqlTicket);
	echo'<td>
			<select id="ticketEventUpdate_'.$rowTicket["ticketId"].'" class="form-control">';
			$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventDelete='0' ORDER BY eventId DESC");
			if(mysql_num_rows($sqlEvent)>0)
			{
				while($rowEvent=mysql_fetch_assoc($sqlEvent))
				{
					if($rowEvent["eventId"]==$rowTicket["eventId"])
						echo'<option value="'.$rowEvent["eventId"].'" selected>'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
					else	
						echo'<option value="'.$rowEvent["eventId"].'">'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
				}
			}
			echo'</select>
		</td>
		<td>
			<select id="ticketOfficerUpdate_'.$rowTicket["ticketId"].'" class="form-control">';
			$sqlOfficer=mysql_query("SELECT * FROM officer_table WHERE officerDelete='0' ORDER BY officerId DESC");
			if(mysql_num_rows($sqlOfficer)>0)
			{
				while($rowOfficer=mysql_fetch_assoc($sqlOfficer))
				{
					if($rowOfficer["officerId"]==$rowTicket["officerId"])
						echo'<option value="'.$rowOfficer["officerId"].'" selected>'.$rowOfficer["officerFirstName"].' '.$rowOfficer["officerLastName"].'</option>';
					else	
						echo'<option value="'.$rowOfficer["officerId"].'">'.$rowOfficer["officerFirstName"].' '.$rowOfficer["officerLastName"].'</option>';
				}
			}
			echo'</select>
		</td>
		<td>
			<input type="text" class="form-control" id="ticketNumberUpdate_'.$rowTicket["ticketId"].'" value="'.$rowTicket["ticketNumber"].'">
		</td>
		<td>
			<input type="text" class="form-control" id="ticketPriceUpdate_'.$rowTicket["ticketId"].'" value="'.$rowTicket["ticketPrice"].'">
		</td>
		</td>
		<td style="text-align:center;">
			<div class="btn-group" style="margin-top:10px;">
			  <button type="button" class="btn btn-danger btn-xs">Action</button>
			  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#" onclick="updateTicket('.$rowTicket["ticketId"].');">Update</a></li>
				<li><a href="#" onclick="cancelTicket('.$rowTicket["ticketId"].');">Cancel</a></li>
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