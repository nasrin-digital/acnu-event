<?php
$eventId=$_REQUEST["eventId"];
$tableName=$_REQUEST["tableName"];


include("../../source/mysql_connecting.php");

$sqlTable=mysql_query("SELECT tableId FROM table_table WHERE eventId='$eventId' AND tableName='$tableName' AND tableDelete='0'");
if(mysql_num_rows($sqlTable)>0)
{
	echo 'Duplicate';
	
}
else
{
	$currentDate=date("m/d/Y"); 
	mysql_query("INSERT INTO table_table (eventId, tableName, tableRegisterDate) VALUES ('$eventId', '$tableName', '$currentDate') ");
	echo'yes';
	exit;
}
?>