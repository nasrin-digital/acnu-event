<?php
$seatId=$_REQUEST["seatId"];

include("../../source/mysql_connecting.php");

$sqlSeat=mysql_query("SELECT * FROM seat_table WHERE seatId='$seatId' AND seatDelete='0'");
if(mysql_num_rows($sqlSeat)==1)
{
	$rowSeat=mysql_fetch_assoc($sqlSeat);
	echo'<td>
			<select id="seatEventUpdate_'.$rowSeat["seatId"].'" class="form-control" onChange="loadTableUpdate('.$rowSeat["seatId"].')">';
			$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventDelete='0' ORDER BY eventId DESC");
			if(mysql_num_rows($sqlEvent)>0)
			{
				while($rowEvent=mysql_fetch_assoc($sqlEvent))
				{
					if($rowEvent["eventId"]==$rowSeat["eventId"])
						echo'<option value="'.$rowEvent["eventId"].'" selected>'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
					else	
						echo'<option value="'.$rowEvent["eventId"].'">'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
				}
			}
			echo'</select>
		</td>
		<td id="loadTableUpdate_'.$rowSeat["seatId"].'">
			<select id="seatTableUpdate_'.$rowSeat["seatId"].'" class="form-control">';
			$sqlTable=mysql_query("SELECT * FROM table_table WHERE tableDelete='0' ORDER BY tableId DESC");
			if(mysql_num_rows($sqlTable)>0)
			{
				while($rowTable=mysql_fetch_assoc($sqlTable))
				{
					if($rowTable["tableId"]==$rowTable["tableId"])
						echo'<option value="'.$rowTable["tableId"].'" selected>'.$rowTable["tableName"].'</option>';
					else	
						echo'<option value="'.$rowTable["tableId"].'">'.$rowTable["tableName"].'</option>';
				}
			}
			echo'</select>
		</td>
		<td>
			<input type="text" class="form-control" id="seatNameUpdate_'.$rowSeat["seatId"].'" value="'.$rowSeat["seatName"].'">
		</td>
		<td style="text-align:center;">
			<div class="btn-group" style="margin-top:10px;">
			  <button type="button" class="btn btn-danger btn-xs">Action</button>
			  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#" onclick="updateSeat('.$rowSeat["seatId"].');">Update</a></li>
				<li><a href="#" onclick="cancelSeat('.$rowSeat["seatId"].');">Cancel</a></li>
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