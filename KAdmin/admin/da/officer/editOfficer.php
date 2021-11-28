<?php
$officerId=$_REQUEST["officerId"];

include("../../source/mysql_connecting.php");

$sqlOfficer=mysql_query("SELECT * FROM officer_table WHERE officerId='$officerId' AND officerDelete='0'");
if(mysql_num_rows($sqlOfficer)==1)
{
	$rowOfficer=mysql_fetch_assoc($sqlOfficer);
	echo'<td>
			<input type="text" class="form-control" id="officerFirstNameUpdate_'.$rowOfficer["officerId"].'" value="'.$rowOfficer["officerFirstName"].'">
		</td>
		<td>
			<input type="text" class="form-control" id="officerLastNameUpdate_'.$rowOfficer["officerId"].'" value="'.$rowOfficer["officerLastName"].'">	
		</td>
		<td>
			<input type="text" class="form-control" id="officerCellphoneUpdate_'.$rowOfficer["officerId"].'" value="'.$rowOfficer["officerCellphone"].'">
		</td>
		<td>
			<input type="text" class="form-control" id="officerCommentUpdate_'.$rowOfficer["officerId"].'" value="'.$rowOfficer["officerComment"].'">
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
				<li><a href="#" onclick="updateOfficer('.$rowOfficer["officerId"].');">Update</a></li>
				<li><a href="#" onclick="cancelOfficer('.$rowOfficer["officerId"].');">Cancel</a></li>
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