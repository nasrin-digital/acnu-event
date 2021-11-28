<?php
$officerFirstName=$_REQUEST["officerFirstName"];
$officerLastName=$_REQUEST["officerLastName"];
$officerCellphone=$_REQUEST["officerCellphone"];
$officerComment=$_REQUEST["officerComment"];

include("../../source/mysql_connecting.php");

$sqlOfficer=mysql_query("SELECT officerId FROM officer_table WHERE officerFirstName='$officerFirstName' AND officerLastName='$officerLastName' AND officerDelete='0'");
if(mysql_num_rows($sqlOfficer)>0)
{
	echo 'Duplicate';
	
}
else
{
	$currentDate=date("m/d/Y"); 
	mysql_query("INSERT INTO officer_table (officerFirstName, officerLastName, officerCellphone, officerComment, officerRegisterDate) VALUES ('$officerFirstName', '$officerLastName', '$officerCellphone', '$officerComment', '$currentDate') ");
	echo'yes';
	exit;
}
?>