<?php
$officerId=$_REQUEST["officerId"];
$officerFirstName=$_REQUEST["officerFirstName"];
$officerLastName=$_REQUEST["officerLastName"];
$officerCellphone=$_REQUEST["officerCellphone"];
$officerComment=$_REQUEST["officerComment"];

include("../../source/mysql_connecting.php");

$sqlOfficer=mysql_query("SELECT officerId FROM officer_table WHERE officerFirstName='$officerFirstName' AND officerLastName='$officerLastName' AND officerDelete='0' AND officerId!='$officerId'");
if(mysql_num_rows($sqlOfficer)>0)
{
	echo 'Duplicate';
	
}
else
{
	mysql_query("UPDATE officer_table SET officerFirstName='$officerFirstName', officerLastName='$officerLastName', officerCellphone='$officerCellphone', officerComment='$officerComment' WHERE officerId='$officerId'");
	echo'yes';
	exit;
}
?>