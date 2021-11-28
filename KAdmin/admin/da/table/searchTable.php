<?php
$eventId=$_REQUEST["eventId"];
$tableName=$_REQUEST["tableName"];

include("../../source/mysql_connecting.php");

$searchField="";
if($eventId!=0)	$searchField=" AND event_table.eventId='$eventId'";
if($tableName!="")	$searchField.=" AND table_table.tableName LIKE '%$tableName%'";


$sqlTable=mysql_query("SELECT * FROM table_table, event_table WHERE table_table.eventId=event_table.eventId AND eventDelete='0' AND tableDelete='0' $searchField ORDER BY tableId DESC");
if(mysql_num_rows($sqlTable)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th>Event Name</th>
				<th>Table Name</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>';
	while($rowTable=mysql_fetch_assoc($sqlTable))
	{
		echo'<tr id="table_'.$rowTable["tableId"].'">
				<td>'.$rowTable["eventName"].' '.$rowTable["eventDate"].'</td>
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
				</td>
			</tr>';
	}
	
		echo'</tbody>
        </table>';
	
}
else
{
	echo'<p style="text-align:center; color:#C00; margin-top:20px; font-size:16px;">There is not any table to show </p>';
	exit;
}
?>