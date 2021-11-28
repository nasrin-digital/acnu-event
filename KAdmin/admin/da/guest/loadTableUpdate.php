<?php
$eventId=$_REQUEST["eventId"];
$tableId=$_REQUEST["tableId"];

include("../../source/mysql_connecting.php");

$sqlTable=mysql_query("SELECT * FROM table_table WHERE eventId='$eventId' AND tableDelete='0' ORDER BY tableId DESC");
	
if(mysql_num_rows($sqlTable)>0)
{
	echo'<select id="guestTable" class="form-control" onchange="loadSeat();">';
	while($rowTable=mysql_fetch_assoc($sqlTable))
	{
		if($rowTable["tableId"]==$tableId)	echo'<option value="'.$rowTable["tableId"].'" selected>'.$rowTable["tableName"].'</option>';
		else	echo'<option value="'.$rowTable["tableId"].'">'.$rowTable["tableName"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="guestTable" class="form-control"><option>Select</option></select>';
	exit;
}
?>