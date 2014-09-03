<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css">
<?php 
// phpinfo();
include ("config.php") ;
include ("func.php");
?>
<title>
<?php
if (!isset ($title)) {
$title="inventory manager v.01 beta";
}
echo ucwords($title);
?></title></head>
<body>
<div class="main">
 <center><a href="index.php?target=home"><?php echo ucwords($title); ?></a></center><br> 
<?php
// <img class ="logo" alt ="Inventory " src ="../images/logo.jpg" border=0>
?>
</div>
<table width="100%"><tr><td>
<?php 
// $login = $_GET['$login'];
// echo "!! $login !!";
// if (!$login) {
// include ("login.php");
// exit;
// }
// elseif ($login=="1"); {
// ** Begin sidebar navigation
?>
<div id="sidebar">
<?php 
include("nav.php");
?></div>
<?php 
// ** Begin Main Body Content
// ** Set Variables For Displaying Content
// ** Discovered minor bug : Leaving the name field blank essentially turns the page 
// ** off. This was fixed by re-entering the title directly in the db. Will need to 
// ** add error checking for next upgrade. 
$target = $_GET['target'];
if (!isset($target)) $target ="home";
// if($target=="dox" OR $target=="htmltags" OR $target=="nav" OR $target=="linkmanage" 
// OR $target=="imglst") {
// $query = "SELECT * from docs where name = '$target';";
//}
// else {
// $query = "SELECT * from $table where name = '$target';";
// }
$result = mysql_query($query);
while ($row = mysql_fetch_assoc($result)) {
$page = $row['page'];
$ornum = $row['ornum'];
$active = $row['active'];
$menu = $row['menu'];
$ref= $row['ref_id'];
$name = $row['name'];
$title = $row['title'];
$content = $row['content'];
$created = $row['created'];
$modified = $row['modified'];
}
?>
<div id="articles">
<div class="main">
<?php 
if ($target=="update") {
include ('update.php');
exit;
}
if ($target=="additems") {
include ('additems.php');
exit;
}
if ($target=="home") {
include ('home.txt');
}
else {
?>
<form action="index.php?target=additems" method="post">
<table class= "main">
<tr><td align="right" bgcolor=#898989>Part #: <input size ="10" name ="part_num" type ="text" value="<?php echo $part_num;?>"><br></td><td align=right  bgcolor=#898989>Description: <input name ="desc" type ="text" value="<?php echo $desc;?>"><br></td><td align=right bgcolor=#898989>
In Stock: <input name ="instock" type ="text" value="<?php echo $instock;?>" size="5"><br></td><td align=right bgcolor=#898989>Category: <input name ="cat_name" type ="text" value="<?php echo $cat_name;?>"><br></td></tr>
<tr><td colspan=2 valign="top" bgcolor=#565656>
Modified : <?php echo $modified;?><br>
</td>
<td colspan=2 valign="top" bgcolor=#565656>Created : <?php echo $created;?><br>
</td></tr>
<tr><td colspan=4><input type="submit" value="Edit"> <input type="reset"value="Reset">
<input type="hidden" name="modified" value="<?php echo $modified;?>">
<input type="hidden" name="created" value="<?php echo $created;?>"></td></tr></table</form>
<?php
}
?>
<center>
<?php
// include ('footer.php');
?>
</center>
</div>
</div>
</td></tr></table>
<?php
// ** End Main Body Content
// echo "!! $active !!";
?>
</body>
</html>
