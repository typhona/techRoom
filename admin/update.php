<?php 
include('../config.php');
$active = $_POST['active'];
$ornum = $_POST['ornum'];
// $page = $_POST['page'];
$nav =$_POST['menu'];
$ref = $_POST['ref_id'];
$name = $_POST['name'];
$type = $_POST['type'];
$title = $_POST['title'];
$style = $_POST['style'];
$content = $_POST['content'];
$created = $_POST['created'];
$modified = $_POST['modified'];
$current = date("Y-m-d");
if ($modified != $current) {
// echo "Today is different from the last time this file was modified ";
// echo $modified;
// echo "<br><br>";
 $modified = $current;
// echo "The new modified date is --> " . $modified;
 }
?>
<br><br>
<?php
// echo "!!! $ref !!! "; 
// echo "!! $name !! ";
// echo $content;
if ($nav == "on") {
$nav = "1";
}
if ($active == "on") {
$active = "1";
}
if ($page == "Please Select" OR $page == "Un-link") {
$page = "";
}
$query = "UPDATE tfb_content SET active = '$active', menu = '$nav', ornum = '$ornum', name ='$name', title = '$title', content = '$content', ref_id ='$ref', created ='$created', modified ='$modified', type ='NULL', style ='NULL' WHERE ref_id ='$ref';";
@mysql_select_db($db) or die( "Unable to select database");
mysql_query($query);
echo "Success! Record Updated<br>";
echo "!! $active !! !! $ornum !!";
?>
