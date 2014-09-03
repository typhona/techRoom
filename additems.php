<?php
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