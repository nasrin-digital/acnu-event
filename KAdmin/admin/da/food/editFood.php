<?php
$foodId=$_REQUEST["foodId"];

include("../../source/mysql_connecting.php");

$sqlFood=mysql_query("SELECT * FROM food_table WHERE foodId='$foodId' AND foodDelete='0'");
if(mysql_num_rows($sqlFood)==1)
{
	$rowFood=mysql_fetch_assoc($sqlFood);
	echo'<td>
			<select id="foodEventUpdate_'.$rowFood["foodId"].'" class="form-control">';
			$sqlEvent=mysql_query("SELECT * FROM event_table WHERE eventDelete='0' ORDER BY eventId DESC");
			if(mysql_num_rows($sqlEvent)>0)
			{
				while($rowEvent=mysql_fetch_assoc($sqlEvent))
				{
					if($rowEvent["eventId"]==$rowFood["eventId"])
						echo'<option value="'.$rowEvent["eventId"].'" selected>'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
					else	
						echo'<option value="'.$rowEvent["eventId"].'">'.$rowEvent["eventName"].' '.$rowEvent["eventDate"].'</option>';
				}
			}
			echo'</select>
		</td>
		<td>
			<input type="text" class="form-control" id="foodNameUpdate_'.$rowFood["foodId"].'" value="'.$rowFood["foodName"].'">
		</td>
		<td>
			<input type="text" class="form-control" id="foodCommentUpdate_'.$rowFood["foodId"].'" value="'.$rowFood["foodComment"].'">
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
				<li><a href="#" onclick="updateFood('.$rowFood["foodId"].');">Update</a></li>
				<li><a href="#" onclick="cancelFood('.$rowFood["foodId"].');">Cancel</a></li>
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