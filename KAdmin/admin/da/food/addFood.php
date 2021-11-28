<?php
$eventId=$_REQUEST["eventId"];
$foodName=$_REQUEST["foodName"];
$foodComment=$_REQUEST["foodComment"];

include("../../source/mysql_connecting.php");

$sqlFood=mysql_query("SELECT foodId FROM food_table WHERE eventId='$eventId' AND foodName='$foodName' AND foodDelete='0'");
if(mysql_num_rows($sqlFood)>0)
{
	echo 'Duplicate';
	
}
else
{
	$currentDate=date("m/d/Y"); 
	mysql_query("INSERT INTO food_table (eventId, foodName, foodComment, foodRegisterDate) VALUES ('$eventId', '$foodName', '$foodComment', '$currentDate') ");
	echo'yes';
	exit;
}
?>