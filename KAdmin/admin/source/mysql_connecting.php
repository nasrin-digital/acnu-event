<?php
 $db_host='localhost';
 $db_name='ACNU';
 $db_username='root';
 $db_pass='root';
 
 

 mysql_connect("$db_host","$db_username","$db_pass")or die("could not connect to mysql");
 mysql_select_db("$db_name")or die("No database");
 mysql_query("SET NAMES utf8");
 mysql_set_charset("utf8");
?>