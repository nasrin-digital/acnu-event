<?php
$ticketId=$_REQUEST["ticketId"];

include("../../source/mysql_connecting.php");

mysql_query("UPDATE ticket_table SET ticketDelete='1' WHERE ticketId='$ticketId'");
echo'yes';
exit;

?>