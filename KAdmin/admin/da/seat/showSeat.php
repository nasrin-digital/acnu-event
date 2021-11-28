<?php
include("../../source/mysql_connecting.php");

$sqlSeat=mysql_query("SELECT * FROM seat_table, event_table, table_table WHERE seat_table.eventId=event_table.eventId AND seat_table.tableId=table_table.tableId AND eventDelete='0' AND tableDelete='0' AND seatDelete='0' ORDER BY seatId DESC");
if(mysql_num_rows($sqlSeat)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>Event Name</th>
				<th>Table Name</th>
				<th>Seat Name</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>';
	while($rowSeat=mysql_fetch_assoc($sqlSeat))
	{
		echo'<tr id="seat_'.$rowSeat["seatId"].'">
				<td>'.$rowSeat["eventName"].' '.$rowSeat["eventDate"].'</td>
				<td>'.$rowSeat["tableName"].'</td>
				<td>'.$rowSeat["seatName"].'</td>
				<td style="text-align:center;">
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-xs">Action</button>
					  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="#" onclick="editSeat('.$rowSeat["seatId"].');">Edit</a></li>
						<li><a href="#" onclick="deleteSeat('.$rowSeat["seatId"].');">Delete</a></li>
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
	echo'<p style="text-align:center; color:#C00; margin-top:20px; font-size:16px;">There is not any seat to show </p>';
	exit;
}
?>