<?php
$tableId=$_REQUEST["tableId"];
$eventId=$_REQUEST["eventId"];
$tableName=$_REQUEST["tableName"];

include("../../source/mysql_connecting.php");

$sqlTable=mysql_query("SELECT tableId FROM table_table WHERE eventId='$eventId' AND tableName='$tableName' AND tableDelete='0' AND tableId!='$tableId'");
if(mysql_num_rows($sqlTable)>0)
{
	echo 'Duplicate';
	
}
else
{
	mysql_query("UPDATE table_table SET eventId='$eventId', tableName='$tableName' WHERE tableId='$tableId'");
	echo'yes';
	exit;
}
?>