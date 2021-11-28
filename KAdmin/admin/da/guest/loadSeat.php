<?php
$tableId=$_REQUEST["tableId"];

include("../../source/mysql_connecting.php");

$sqlSeat=mysql_query("SELECT * FROM seat_table WHERE tableId='$tableId' AND seatDelete='0' ORDER BY seatId DESC");
	
if(mysql_num_rows($sqlSeat)>0)
{
	echo'<select id="guestSeat" class="form-control">
			<option>Select</option>';
	while($rowSeat=mysql_fetch_assoc($sqlSeat))
	{
		echo'<option value="'.$rowSeat["seatId"].'">'.$rowSeat["seatName"].'</option>';
	}
	
	echo'</select>';
	
}
else
{
	echo'<select id="guestSeat" class="form-control"><option>Select</option></select>';
	exit;
}
?>