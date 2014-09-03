<?php 
include('config.php');
$ref = $_POST['ref_id'];
$part_num = $_POST['part_num'];
$desc = $_POST['desc'];
$instock = $_POST['instock'];
$game_name = $_POST['game_name'];
$change = $_POST['change'];
$change2 = $_POST['change2'];
$created = $_POST['created'];
$modified = $_POST['modified'];
$current = date("Y-m-d");
$min = $_POST['min'];
$location = $_POST['location'];
// echo $change;
if ($created=='') {
$created = "$current";
}
if ($modified != $current) {
 $modified = $current;
}
if ($change=="add"){
$instock2 =($instock+$change2);
 }
if ($change=="use"){
$instock2 =($instock-$change2);
   if ($instock2=='0') {
       $instock2 = "0";
}}
if ($instock2=='') {
$instock2 = "$instock";
 }
// echo "!!Test!! $instock2 !!";echo "!! $ref !!";
?>
<br><br>
<?php
$query = "UPDATE `games` SET `part_num` = '$part_num', `desc` = '$desc', `instock` = '$instock2', `game_name` ='$game_name', `ref_id` ='$ref', `created` ='$created', `modified` ='$modified',`min` ='$min', `location` ='$location' WHERE `ref_id`='$ref';";
@mysql_select_db($db) or die( "Unable to select database");
mysql_query($query);
// echo $query;
echo $desc." Updated!!<br>";
$target = $game_name;
include ('gamedisptpl.php');
?>