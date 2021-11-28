<?php
$officerId=$_REQUEST["officerId"];

include("../../source/mysql_connecting.php");

$sqlOfficer=mysql_query("SELECT * FROM officer_table WHERE officerDelete='0' ORDER BY officerId DESC");
if(mysql_num_rows($sqlOfficer)>0)
{
	echo'<select id="guestOfficer" class="form-control" onChange="loadTicket();>';
	while($rowOfficer=mysql_fetch_assoc($sqlOfficer))
	{
		if($rowOfficer["officerId"]==$officerId)
			echo'<option value="'.$rowOfficer["officerId"].'" selected>'.$rowOfficer["officerFirstName"].' '.$rowOfficer["officerLastName"].'</option>';
		else	echo'<option value="'.$rowOfficer["officerId"].'">'.$rowOfficer["officerFirstName"].' '.$rowOfficer["officerLastName"].'</option>';
			
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="guestOfficer" class="form-control"><option>Select</option></select>';
	exit;
}
?>