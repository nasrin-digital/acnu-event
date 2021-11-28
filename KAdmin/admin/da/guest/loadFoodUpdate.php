<?php
$eventId=$_REQUEST["eventId"];
$foodId=$_REQUEST["foodId"];

include("../../source/mysql_connecting.php");

$sqlFood=mysql_query("SELECT * FROM food_table WHERE eventId='$eventId' AND foodDelete='0' ORDER BY foodId DESC");
	
if(mysql_num_rows($sqlFood)>0)
{
	echo'<select id="guestFood" class="form-control">';
	while($rowFood=mysql_fetch_assoc($sqlFood))
	{
		if($rowFood["foodId"]==$foodId)	echo'<option id="'.$rowFood["foodId"].'" selected="selected">'.$rowFood["foodName"].'</option>';
		else	echo'<option value="'.$rowFood["foodId"].'">'.$rowFood["foodName"].'</option>';
	}
	echo'</select>';
	
}
else
{
	echo'<select id="guestFood" class="form-control"><option>Select</option></select>';
	exit;
}
?>