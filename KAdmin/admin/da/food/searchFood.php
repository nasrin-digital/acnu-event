<?php
$eventId=$_REQUEST["eventId"];

include("../../source/mysql_connecting.php");

$sqlFood=mysql_query("SELECT * FROM food_table, event_table WHERE food_table.eventId=event_table.eventId AND eventDelete='0' AND foodDelete='0' AND event_table.eventId='$eventId' ORDER BY foodId DESC");
if(mysql_num_rows($sqlFood)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>Event Name</th>
				<th>Food Name</th>
				<th>Food Comment</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>';
	while($rowFood=mysql_fetch_assoc($sqlFood))
	{
		echo'<tr id="food_'.$rowFood["foodId"].'">
				<td>'.$rowFood["eventName"].' '.$rowFood["eventDate"].'</td>
				<td>'.$rowFood["foodName"].'</td>
				<td>'.$rowFood["foodComment"].'</td>
				<td style="text-align:center;">
					<div class="btn-group">
					  <button type="button" class="btn btn-danger btn-xs">Action</button>
					  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
						<span class="caret"></span>
						<span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
						<li><a href="#" onclick="editFood('.$rowFood["foodId"].');">Edit</a></li>
						<li><a href="#" onclick="deleteFood('.$rowFood["foodId"].');">Delete</a></li>
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
	echo'<p style="text-align:center; color:#C00; margin-top:20px; font-size:16px;">There is not any food to show </p>';
	exit;
}
?>