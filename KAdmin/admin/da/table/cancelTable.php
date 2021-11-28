<?php
$tableId=$_REQUEST["tableId"];

include("../../source/mysql_connecting.php");

$sqlTable=mysql_query("SELECT * FROM table_table, event_table WHERE table_table.eventId=event_table.eventId AND eventDelete='0' AND tableDelete='0' AND tableId='$tableId'");
if(mysql_num_rows($sqlTable)==1)
{
	$rowTable=mysql_fetch_assoc($sqlTable);
	echo'<td>'.$rowTable["eventName"].' '.$rowTable["eventDate"].'</td>
		  <td>'.$rowTable["tableName"].'</td>
		  <td style="text-align:center;">
			  <div class="btn-group">
				<button type="button" class="btn btn-danger btn-xs">Action</button>
				<button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
				  <span class="caret"></span>
				  <span class="sr-only">Toggle Dropdown</span>
				</button>
				<ul class="dropdown-menu" role="menu">
				  <li><a href="#" onclick="editTable('.$rowTable["tableId"].');">Edit</a></li>
				  <li><a href="#" onclick="deleteTable('.$rowTable["tableId"].');">Delete</a></li>
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