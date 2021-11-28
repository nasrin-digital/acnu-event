<?php
$eventId=$_REQUEST["eventId"];

include("../../source/mysql_connecting.php");

$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventId='$eventId' AND eventDelete='0'");
if(mysql_num_rows($sqlEvent)==1)
{
	$rowEvent=mysql_fetch_assoc($sqlEvent);
	echo'<td>'.$rowEvent["eventName"].'</td>
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
		</td>';
	
}
else
{
	echo'Error';
	exit;
}
?>