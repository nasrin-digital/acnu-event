<?php
$officerId=$_REQUEST["officerId"];

include("../../source/mysql_connecting.php");

mysql_query("UPDATE officer_table SET officerDelete='1' WHERE officerId='$officerId'");
echo'yes';
exit;

?>