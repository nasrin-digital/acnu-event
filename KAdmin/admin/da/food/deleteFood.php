<?php
$foodId=$_REQUEST["foodId"];

include("../../source/mysql_connecting.php");

mysql_query("UPDATE food_table SET foodDelete='1' WHERE foodId='$foodId'");
echo'yes';
exit;

?>