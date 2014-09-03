<?php
$current = date("Y-m-d");
if ($created=='') {
$created = "$current";
}
if ($modified != $current) {
$modified = $current;
 }
?>
<form action="index.php?target=additemsproc" method="post">
<table class= "main">
<tr><td align="right" bgcolor=#898989>Part #: <input size ="10" name ="part_num" type ="text" value="<?php echo $part_num;?>"><br></td><td align=right  bgcolor=#898989>Description: <input name ="desc" type ="text" value="<?php echo $desc;?>"><br></td><td align=right bgcolor=#898989>
In Stock: <input name ="instock" type ="text" value="<?php echo $instock;?>" size="5"><br></td><td align=right bgcolor=#898989>Game: <input name ="game_name" type ="text" value="<?php echo $game_name;?>"><br></td></tr>
<tr>
<td colspan=2 valign="top" bgcolor=#565656>Created : <?php echo $created;?><br>
</td><td colspan=2 valign="top" bgcolor=#565656>Modified: <?php echo $modified;?><br>
</td></tr>
<tr><td colspan=4><input type="submit" value="Edit"> <input type="reset"value="Reset">
<input type="hidden" name="modified" value="<?php echo $modified;?>">
<input type="hidden" name="created" value="<?php echo $created;?>"></td></tr></table</form>
