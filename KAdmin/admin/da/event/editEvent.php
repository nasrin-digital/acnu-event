<?php
$eventId=$_REQUEST["eventId"];

include("../../source/mysql_connecting.php");

$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventId='$eventId' AND eventDelete='0'");
if(mysql_num_rows($sqlEvent)==1)
{
	$rowEvent=mysql_fetch_assoc($sqlEvent);
	echo'<td>
			<input type="text" class="form-control" id="eventNameUpdate_'.$rowEvent["eventId"].'" value="'.$rowEvent["eventName"].'">
		</td>  
		<td>
			<input type="text" class="form-control" id="eventDateUpdate_'.$rowEvent["eventId"].'" value="'.$rowEvent["eventDate"].'">
		</td>
		<td>
		<div>
			<input type="text" class="form-control" id="eventAddressUpdate_'.$rowEvent["eventId"].'" value="'.$rowEvent["eventAddress"].'">
		</div>
		</td>
		<td>'.$rowEvent["eventRegisterDate"].'</td>
		<td style="text-align:center;">
			<div class="btn-group" style="margin-top:10px;">
			  <button type="button" class="btn btn-danger btn-xs">Action</button>
			  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#" onclick="updateEvent('.$rowEvent["eventId"].');">Update</a></li>
				<li><a href="#" onclick="cancelEvent('.$rowEvent["eventId"].');">Cancel</a></li>
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