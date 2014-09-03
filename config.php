<?php
$host="localhost";
$user="redacted";
$pass="**********";
$db="redacted";
$default ="home";
$table="games";
$table2="game_id";
// makes the database connection or reports an error if it fails to connect
$connection = mysql_connect($host,$user,$pass) or die ("Error: Could not connect to Server  -- check config.php");
// if conection is made continue to the template for the site.
mysql_select_db($db) or die ("Error: Could not connect to database -- check config.php");
?>
