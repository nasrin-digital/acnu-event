<?php
$tableId=$_REQUEST["tableId"];

include("../../source/mysql_connecting.php");

mysql_query("UPDATE table_table SET tableDelete='1' WHERE tableId='$tableId'");
echo'yes';
exit;

?>