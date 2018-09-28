<?php
$host = 'localhost'; 
$user = 'root'; 
$pass = 'cahbagoes';
$dbname = 'medical_records';
$connect = mysql_connect($host, $user, $pass) or die(mysql_error());
$dbselect = mysql_select_db($dbname);
?>