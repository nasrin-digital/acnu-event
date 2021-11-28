<?php
$tableId=$_REQUEST["tableId"];

include("../../source/mysql_connecting.php");

$sqlTable=mysql_query("SELECT * FROM table_table WHERE tableId='$tableId' AND tableDelete='0'");
if(mysql_num_rows($sqlTable)==1)
{
	$rowTable=mysql_fetch_assoc($sqlTable);
	echo'<td>
			<select id="tableEventUpdate_'.$rowTable["tableId"].'" class="form-control">';
			$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventDelete='0' ORDER BY eventId DESC");
			if(mysql_num_rows($sqlEvent)>0)
			{
				while($rowEvent=mysql_fetch_assoc($sqlEvent))
				{
					if($rowEvent["eventId"]==$rowTable["eventId"])
						echo'<option value="'.$rowEvent["eventId"].'" selected>'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
					else	
						echo'<option value="'.$rowEvent["eventId"].'">'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
				}
			}
			echo'</select>
		</td>
		<td>
			<input type="text" class="form-control" id="tableNameUpdate_'.$rowTable["tableId"].'" value="'.$rowTable["tableName"].'">
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
				<li><a href="#" onclick="updateTable('.$rowTable["tableId"].');">Update</a></li>
				<li><a href="#" onclick="cancelTable('.$rowTable["tableId"].');">Cancel</a></li>
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