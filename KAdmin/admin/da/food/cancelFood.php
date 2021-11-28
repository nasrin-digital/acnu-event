<?php
$foodId=$_REQUEST["foodId"];

include("../../source/mysql_connecting.php");

$sqlFood=mysql_query("SELECT * FROM food_table, event_table WHERE food_table.eventId=event_table.eventId AND eventDelete='0' AND foodDelete='0' AND foodId='$foodId'");
if(mysql_num_rows($sqlFood)==1)
{
	$rowFood=mysql_fetch_assoc($sqlFood);
	echo'<td>'.$rowFood["eventName"].' '.$rowFood["eventDate"].'</td>
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
		  </td>';
	
}
else
{
	echo'Error';
	exit;
}
?>