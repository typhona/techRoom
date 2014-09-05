<?php 
include('config.php');

$ref = $_POST['ref_id'];
$part_num = $_POST['part_num'];
$desc = $_POST['desc'];
$instock = $_POST['instock'];
$game_name = $_POST['game_name'];
$created = $_POST['created'];
$modified = $_POST['modified'];
$current = date("Y-m-d");
if ($created=='') {
$created = "$current";
}
if ($modified != $current) {
// echo "Today is different from the last time this file was modified ";
// echo $modified;
// echo "<br><br>";
 $modified = $current;
// echo "The new modified date is --> " . $modified;
 }
// if ($ref ==''){
// $ref="1";
//  }
?>
<br><br>
<?php
// echo "!!! $ref !!! "; 
// echo "!! $name !! ";
// echo $content;
// if ($nav == "on") {
// $nav = "1";
// }
// if ($active == "on") {
// $active = "1";
// }
// if ($page == "Please Select" OR $page == "Un-link") {
// $page = "";
// }
$query = "INSERT `$table` SET `part_num` = '$part_num', `desc` = '$desc', `instock` = '$instock', `game_name` ='$game_name', `ref_id` ='$ref', `created` ='$created', `modified` ='$modified';";
@mysql_select_db($db) or die( "Unable to select database");
mysql_query($query);
// echo $query;
echo "Success! ";
if ($part_num != '') echo  "PN - $part_num "; echo " $desc Added<br>";
$current = date("Y-m-d");
if ($created=='') {
$created = "$current";
}
if ($modified != $current) {
// echo "Today is different from the last time this file was modified ";
// echo $modified;
// echo "<br><br>";
 $modified = $current;
// echo "The new modified date is --> " . $modified;
 }
 ?>
 <?php
 $ref = "";
$part_num = "";
$desc = "";
$instock = "";
$cat_name = "";
$created = "";
$modified = "";
$current = date("Y-m-d");
?>
<form action="index.php?target=additemsproc" method="post">
<table class= "main">
<tr><td align="right" bgcolor=#898989>Part #: <input size ="10" name ="part_num" type ="text" value="<?php echo $part_num;?>"><br></td><td align=right  bgcolor=#898989>Description: <input name ="desc" type ="text" value="<?php echo $desc;?>"><br></td><td align=right bgcolor=#898989>
In Stock: <input name ="instock" type ="text" value="<?php echo $instock;?>" size="5"><br></td><td align=right bgcolor=#898989>Game: <select name="game_name">
<?php
$query = "SELECT game_name from $table2 ORDER by game_name;"; 
$result = mysql_query($query);
 $res2 = mysql_fetch_assoc($result);
 $num = mysql_num_rows($result);
// echo "Result = " .$result . "<br>";
// echo "Associative = " . $res2 . "<br>";
// echo $num . "<br>";
while($row=mysql_fetch_assoc($result)) {
$title =$row['game_name'];
?>
<option><a href="index.php?target=<?php $strip = str_replace(" ", "%20", $title);echo 
$strip;
?>"><?php echo ucwords($title); ?></a></option>
<?php
// echo ucwords($title) ."<br>";
}
?>
</select></td></tr>
<tr>
<td colspan=2 valign="top" bgcolor=#565656>Created : <?php echo $created;?><br>
</td><td colspan=2 valign="top" bgcolor=#565656>Modified: <?php echo $modified;?><br>
</td></tr>
<tr><td colspan=4><input type="submit" value="Add"> <input type="reset"value="Reset">
<input type="hidden" name="modified" value="<?php echo $modified;?>">
<input type="hidden" name="created" value="<?php echo $created;?>"></td></tr></table</form>
