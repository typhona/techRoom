<table class= "main">
<tr>
<td colspan=5 bgcolor=#565656 align=center><?php echo ucwords($target);?></td></tr>
<tr>
<td align=center bgcolor=#898989>Part #</td>
<td align=center bgcolor=#898989>Description</td>
<td align=center bgcolor=#898989>In Stock</td>
<td align=center bgcolor=#898989>Modified</td>
<td align=center bgcolor=#898989>Location</td></tr>
<?php 
include ('config.php');
$query = "SELECT * from `$table` WHERE game_name = '$target';"; 
$result = mysql_query($query);
// $res2 = mysql_fetch_assoc($query);
$num = mysql_num_rows($result);
// echo "Result = " .$result . "<br>";
// echo $query;
// echo "Associative = " . $res2 . "<br>";
// echo "There are " .$num . " parts total.<br>";
// echo "!! $title !!";
while($row=mysql_fetch_assoc($result)) {
$ref = $row['ref_id'];
$part_num =$row['part_num'];
$desc =$row['desc'];
$instock =$row['instock'];
$game_name =$row['game_name'];
$modified =$row['modified'];
$created =$row['created'];
$min = $row['min'];
$location =$row['location'];
?>
<tr>
<td align=left bgcolor=#898989 <?php if ($instock <= $min) { echo " class =\"low\""; }?>><?php echo $part_num;?><br></td>
<td align=left  bgcolor=#898989 <?php if ($instock <= $min) { echo " class =\"low\""; }?>><a href="index.php?target=<?php echo $ref;?>"><?php echo ucwords($desc);?></a><br></td>
<td align=left bgcolor=#898989 <?php if ($instock <= $min) { echo " class =\"low\""; }?>><?php echo $instock;?><br></td>
<td  valign="top" bgcolor=#565656 <?php if ($instock <= $min) { echo " class =\"low\""; }?>><?php echo $modified;?><br></td><td valign="top" bgcolor=#565656 <?php if ($instock <= $min) { echo " class =\"low\""; }?>><?php echo $location;?><br></td></tr>
<?php
}
// echo "!! $ref !!";
// echo "!! $part_num !!";
// echo "!!$desc !!";
// echo "!! $instock !!";
// echo "!! $game_name !!";
?>
</table>
