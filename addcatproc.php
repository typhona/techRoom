<?php 
include('config.php');
$ref = $_POST['ref_id'];
$cat_name = $_POST['cat_name'];
$cat_id = $_POST['cat_id'];
$created = $_POST['created'];
$modified = $_POST['modified'];
$current = date("Y-m-d");
if ($created=='') {
$created = "$current";
}
if ($modified != $current) {
 $modified = $current;
 }
echo "!@! $cat_id !@!";
?>
<br><br>
<?php
$query = "INSERT `cat_id` SET `cat_id` ='$cat_id', `cat_name` ='$cat_name', `ref_id` ='$ref', `created` ='$created', `modified` ='$modified';";
@mysql_select_db($db) or die( "Unable to select database");
mysql_query($query);
echo $query;
echo "!#! $cat_id !#!";
echo "Success! Record Updated<br>";
?>