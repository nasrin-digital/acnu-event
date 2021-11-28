<?php
$officerInfo=$_REQUEST["officerInfo"];

include("../../source/mysql_connecting.php");

$searchField="  AND ( officer_table.officerFirstName LIKE '%$officerInfo%' OR officer_table.officerLastName LIKE '%$officerInfo%' OR officer_table.officerCellphone LIKE '%$officerInfo%' )";


$sqlOfficer=mysql_query("SELECT * FROM officer_table WHERE officerDelete='0' $searchField ORDER BY officerId DESC");
if(mysql_num_rows($sqlOfficer)>0)
{
	echo'<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			<thead>
			  <tr>
				<th class="col-xs-2">First Name</th>
				<th class="col-xs-2">Last Name</th>
				<th class="col-xs-2">Cellphone</th>
				<th class="col-xs-4">Comment</th>
				<th></th>
			  </tr>
			</thead>
			<tbody>';
	while($rowOfficer=mysql_fetch_assoc($sqlOfficer))
	{
		echo'<tr id="officer_'.$rowOfficer["officerId"].'">
				<td>'.$rowOfficer["officerFirstName"].'</td>
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
				</td>
			</tr>';
	}
	
		echo'</tbody>
        </table>';
	
}
else
{
	echo'<p style="text-align:center; color:#C00; margin-top:20px; font-size:16px;">There is not any officer to show </p>';
	exit;
}
?>