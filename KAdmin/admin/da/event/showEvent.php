<?php
include("../../source/mysql_connecting.php");

$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventDelete='0' ORDER BY eventId DESC");
if(mysql_num_rows($sqlEvent)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>Event Name</th>
				<th>Date</th>
				<th>Place Address</th>
				<th>Register Date</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>';
	while($rowEvent=mysql_fetch_assoc($sqlEvent))
	{
		echo'<tr id="event_'.$rowEvent["eventId"].'">
				<td>'.$rowEvent["eventName"].'</td>
				<td>'.$rowEvent["eventDate"].'</td>
				<td>'.$rowEvent["eventAddress"].'</td>
				<td>'.$rowEvent["eventRegisterDate"].'</td>
				<td style="text-align:center;">
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-xs">Action</button>
					  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="#" onclick="editEvent('.$rowEvent["eventId"].');">Edit</a></li>
						<li><a href="#" onclick="deleteEvent('.$rowEvent["eventId"].');">Delete</a></li>
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
	
	echo'<p style="text-align:center; color:#C00; margin-top:20px; font-size:16px;">There is not any event to show </p>';
	exit;
	exit;
}
?>