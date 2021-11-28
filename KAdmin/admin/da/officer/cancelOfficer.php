<?php
$officerId=$_REQUEST["officerId"];

include("../../source/mysql_connecting.php");

$sqlOfficer=mysql_query("SELECT * FROM officer_table WHERE officerId='$officerId' AND officerDelete='0'");
if(mysql_num_rows($sqlOfficer)==1)
{
	$rowOfficer=mysql_fetch_assoc($sqlOfficer);
	echo'<td>'.$rowOfficer["officerFirstName"].'</td>
		<td>'.$rowOfficer["officerLastName"].'</td>
		<td>'.$rowOfficer["officerCellphone"].'</td>
		<td>'.$rowOfficer["officerComment"].'</td>
		<td style="text-align:center;">
			<div class="btn-group">
			  <button type="button" class="btn btn-danger btn-xs">Action</button>
			  <button type="button" class="btn btn-danger dropdown-toggle btn-xs" data-toggle="dropdown" aria-expanded="false">
				<span class="caret"></span>
				<span class="sr-only">Toggle Dropdown</span>
			  </button>
			  <ul class="dropdown-menu" role="menu">
				<li><a href="#" onclick="editOfficer('.$rowOfficer["officerId"].');">Edit</a></li>
				<li><a href="#" onclick="deleteOfficer('.$rowOfficer["officerId"].');">Delete</a></li>
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