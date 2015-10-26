<?php

/* session_start(); */

$dbhost = "localhost"; 
$dbname = "database"; // the name of the database
$dbuser = "username"; // username
$dbpass = "password"; // password 
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());


?>