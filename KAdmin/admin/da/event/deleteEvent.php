<?php
$eventId=$_REQUEST["eventId"];

include("../../source/mysql_connecting.php");

mysql_query("UPDATE event_table SET eventDelete='1' WHERE eventId='$eventId'");
echo'yes';
exit;

?>