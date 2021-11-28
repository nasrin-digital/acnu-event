<?php
$eventId=$_REQUEST["eventId"];

include("../../source/mysql_connecting.php");

$sqlFood=mysql_query("SELECT * FROM food_table WHERE eventId='$eventId' AND foodDelete='0' ORDER BY foodId DESC");
	
if(mysql_num_rows($sqlFood)>0)
{
	echo'<select id="guestFood" class="form-control">
			<option>Select</option>';
	while($rowFood=mysql_fetch_assoc($sqlFood))
	{
		echo'<option value="'.$rowFood["foodId"].'">'.$rowFood["foodName"].'</option>';
	}
	echo'</select>';
	
}
else
{
	echo'<select id="guestFood" class="form-control"><option>Select</option></select>';
	exit;
}
?>