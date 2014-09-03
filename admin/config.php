<?php
$host="localhost";
$user="golfandg_buster";
$pass="40acresoffun";
$db="golfandg_puttputt";
$default="home";
$table="tfb_content";
// makes the database connection or reports an error if it fails to connect
$connection = mysql_connect($host,$user,$pass) or die ("Error: Could not connect to Server");
// if conection is made continue to the template for the site.
mysql_select_db($db) or die ("Error: Could not connect to database");
?>