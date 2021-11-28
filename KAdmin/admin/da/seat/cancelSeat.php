<?php
$seatId=$_REQUEST["seatId"];

include("../../source/mysql_connecting.php");

$sqlSeat=mysql_query("SELECT * FROM seat_table, event_table, table_table WHERE seat_table.eventId=event_table.eventId AND seat_table.tableId=table_table.tableId AND eventDelete='0' AND tableDelete='0' AND seatDelete='0' AND seatId='$seatId'");
if(mysql_num_rows($sqlSeat)==1)
{
	$rowSeat=mysql_fetch_assoc($sqlSeat);
	echo'<td>'.$rowSeat["eventName"].' '.$rowSeat["eventDate"].'</td>
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
		  </td>';
	
}
else
{
	echo'Error';
	exit;
}
?>