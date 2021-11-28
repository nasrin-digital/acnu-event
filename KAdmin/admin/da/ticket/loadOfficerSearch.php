<?php
include("../../source/mysql_connecting.php");

$sqlOfficer=mysql_query("SELECT * FROM officer_table WHERE officerDelete='0' ORDER BY officerId DESC");
if(mysql_num_rows($sqlOfficer)>0)
{
	echo'<select id="ticketOfficerSearch" class="form-control">
			<option>Select</option>';
	while($rowOfficer=mysql_fetch_assoc($sqlOfficer))
	{
		echo'<option value="'.$rowOfficer["officerId"].'">'.$rowOfficer["officerFirstName"].' '.$rowOfficer["officerLastName"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="ticketOfficerSearch" class="form-control"><option>Select</option></select>';
	exit;
}
?>