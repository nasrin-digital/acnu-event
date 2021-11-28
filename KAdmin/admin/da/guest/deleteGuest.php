<?php
$guestId=$_REQUEST["guestId"];

include("../../source/mysql_connecting.php");

mysql_query("UPDATE guest_table SET guestDelete='1' WHERE guestId='$guestId'");
echo'yes';
exit;

?>