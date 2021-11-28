<?php
$guestId=$_REQUEST["guestId"];
$guestCheckIn=(int)$_REQUEST["guestCheckIn"];

echo $guestCheckIn;
echo $guestId;
include("../../source/mysql_connecting.php");

mysql_query("UPDATE  guest_table  SET guestCheckIn='$guestCheckIn' WHERE guestId='$guestId'");


echo'yes';
exit;

?>