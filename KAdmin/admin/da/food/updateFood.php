<?php
$foodId=$_REQUEST["foodId"];
$eventId=$_REQUEST["eventId"];
$foodName=$_REQUEST["foodName"];
$foodComment=$_REQUEST["foodComment"];

include("../../source/mysql_connecting.php");

$sqlFood=mysql_query("SELECT foodId FROM food_table WHERE eventId='$eventId' AND foodName='$foodName' AND foodDelete='0' AND foodId!='$foodId'");
if(mysql_num_rows($sqlFood)>0)
{
	echo 'Duplicate';
	
}
else
{
	mysql_query("UPDATE food_table SET eventId='$eventId', foodName='$foodName', foodComment='$foodComment' WHERE foodId='$foodId'");
	echo'yes';
	exit;
}
?>