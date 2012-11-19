<?php
$hostname = "localhost";
$username = "feedsw";
$password = "45pop1";
$database = "feeds";

$link = mysql_connect($hostname, $username, $password) or die("Cannot connect to the database!");
mysql_select_db($database) or die("Cannot select database!");
?>
