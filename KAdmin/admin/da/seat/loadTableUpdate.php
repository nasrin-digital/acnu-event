<?php
$eventId=$_REQUEST["eventId"];
$seatId=$_REQUEST["seatId"];

include("../../source/mysql_connecting.php");

$sqlTable=mysql_query("SELECT * FROM table_table WHERE eventId='$eventId' AND tableDelete='0' ORDER BY tableId DESC");
if(mysql_num_rows($sqlTable)>0)
{
	echo'<select id="seatTableUpdate_'.$seatId.'" class="form-control">';
	while($rowTable=mysql_fetch_assoc($sqlTable))
	{
		echo'<option value="'.$rowTable["tableId"].'">'.$rowTable["tableName"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="seatTableUpdate_'.$seatId.'" class="form-control"><option>Select</option></select>';
	exit;
}
?>