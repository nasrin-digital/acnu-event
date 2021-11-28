<?php
$guestId=$_REQUEST["guestId"];
$guestRaffle=(int)$_REQUEST["guestRaffle"];

echo $guestCheckIn;
echo $guestId;
include("../../source/mysql_connecting.php");

mysql_query("UPDATE  guest_table  SET guestRaffle='$guestRaffle' WHERE guestId='$guestId'");


echo'yes';
exit;

?>