<?php
$query = "SELECT * FROM $table where ref_id = $target;";
$result = mysql_query($query);
while($row=mysql_fetch_assoc($result)) {
$ref = $row['ref_id'];
$part_num =$row['part_num'];
$desc =$row['desc'];
$instock =$row['instock'];
$game_name =$row['game_name'];
$modified =$row['modified'];
$created =$row['created'];
$min =$row['min'];
$location =$row['location'];

// checking to see what the $ref was being set to
// echo "!! $ref !!";

?>
<form action="index.php?target=edititems" method="post">
<table class= "main">
<tr><td align="right" bgcolor=#898989>Part #: <input size ="10" name ="part_num" type ="text" value="<?php echo $part_num;?>"><br></td><td align=right  bgcolor=#898989>Description: <input name ="desc" type ="text" value="<?php echo $desc;?>"><br></td><td align=right bgcolor=#898989>
In Stock: <?php echo $instock;?><br></td><td align=right bgcolor=#898989>Game: <input name ="game_name" type ="text" value="<?php echo $game_name;?>"><br></td></tr>
<tr><td bgcolor=#898989><input type="radio" name="change" value="add">Add/<input type="radio" name="change" value="use">Use <input size ="5" name ="change2" type ="text"></td><td bgcolor=#898989>Minimum #:<input size ="5" name ="min" type ="text" value="<?php echo $min;?>"></td><td colspan=2 
bgcolor=#898989>Location:<input size ="10" name ="location" type ="text" value="<?php echo $location;?>"></td></tr>
<tr>
<td colspan=2 valign="top" bgcolor=#565656>Created : <?php echo $created;?><br>
</td><td colspan=2 valign="top" bgcolor=#565656>Modified: <?php echo $modified;?><br>
</td></tr>
<tr><td colspan=4><input type="submit" value="Edit"> <input type="reset"value="Reset">
<input type="hidden" name="ref_id" value="<?php echo $ref;?>">
<input type="hidden" name="instock" value="<?php echo $instock;?>">
<input type="hidden" name="modified" value="<?php echo $modified;?>">
<input type="hidden" name="created" value="<?php echo $created;?>"></td></tr></table</form>
<?php
}
?>