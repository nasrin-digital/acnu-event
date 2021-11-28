<?php
$seatId=$_REQUEST["seatId"];

include("../../source/mysql_connecting.php");

mysql_query("UPDATE seat_table SET seatDelete='1' WHERE seatId='$seatId'");
echo'yes';
exit;

?>