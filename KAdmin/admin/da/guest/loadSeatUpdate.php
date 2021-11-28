<?php
$tableId=$_REQUEST["tableId"];
$seatId=$_REQUEST["seatId"];


include("../../source/mysql_connecting.php");

$sqlSeat=mysql_query("SELECT * FROM seat_table WHERE tableId='$tableId' AND seatDelete='0' ORDER BY seatId DESC");
	
if(mysql_num_rows($sqlSeat)>0)
{
	echo'<select id="guestSeat" class="form-control">';
	while($rowSeat=mysql_fetch_assoc($sqlSeat))
	{
		if($rowSeat["seatId"]==$seatId)	echo'<option value="'.$rowSeat["seatId"].'" selected>'.$rowSeat["seatName"].'</option>';
		else	echo'<option value="'.$rowSeat["seatId"].'">'.$rowSeat["seatName"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="guestSeat" class="form-control"><option>Select</option></select>';
	exit;
}
?>