<?php
$query = "SELECT game_id from $table2;";
$result = mysql_query($query);
$current = date("Y-m-d");
if ($created=='') {
$created = "$current";
}
if ($modified != $current) {
 $modified = $current;
 }
mysql_query($query);
while($row=mysql_fetch_assoc($result)) {
$max =$row['game_id'];
$max2 = max($row);
}
// echo "!! $max2 !!";
$max3 = ($max2+1);
// echo $max;
// echo $result;
?>
<form action="index.php?target=addgameproc" method="post">
<table class= "main">
<tr><td align=left bgcolor=#898989>New Game: <input name ="game_name" type ="text" value="<?php echo $game_name;?>"><br></td><td align=left bgcolor=#898989>Game # <?php echo $max3;?><br></td>
<td valign="top" bgcolor=#565656>Created : <?php echo $created;?><br>
</td></tr>
<tr><td colspan=2><input type="submit" value="Add"> <input type="reset"value="Reset">

<input type="hidden" name="game_id" value="<?php echo $max3;?>">
<input type="hidden" name="modified" value="<?php echo $modified;?>">
<input type="hidden" name="created" value="<?php echo $created;?>"></td></tr></table></form>