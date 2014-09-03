<?php 
include('config.php');
$ref = $_POST['ref_id'];
$game_name = $_POST['game_name'];
$game_id = $_POST['game_id'];
$created = $_POST['created'];
$modified = $_POST['modified'];
$current = date("Y-m-d");
if ($created=='') {
$created = "$current";
}
if ($modified != $current) {
 $modified = $current;
 }
// echo "!@! $game_id !@!";
?>
<br><br>
<?php
$query = "INSERT `game_id` SET `game_id` ='$game_id', `game_name` ='$game_name', `ref_id` ='$ref', `created` ='$created', `modified` ='$modified';";
@mysql_select_db($db) or die( "Unable to select database");
mysql_query($query);
// echo $query;
// echo "!#! $game_id !#! <br><br>";
echo "Success! $game_name Added<br>";
?>