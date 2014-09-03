<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css">
<?php 
// phpinfo();
include ("../config.php") ;
include ("func.php");
?>
<title>
<?php
echo ucwords("$title");
?></title></head>
<body>
<div class="main">
 <center><a href="index.php?target=admin"><img class ="logo" alt ="Fools Ball Logo" src ="../images/logo.jpg" border=0></a><br> 
<a href ="index.php?target=disabled">Disabled/Non-Menu</a> .:. <a 
href="index.php?target=imagelist">Image List</a> .:. <a 
href="index.php?target=contact">Contact</a> .:. <a href="index.php?target=dox">DOX</a> .:. <a href="index.php?target=links">Link Manager</a></center></div>
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
<center>
<h1 class="main">ADMIN</h1></center>
<div id="navbar">
<?php 
include("../nav.php");
?></div></div>
<?php 
// ** Begin Main Body Content
// ** Set Variables For Displaying Content
// ** Discovered minor bug : Leaving the name field blank essentially turns the page 
// ** off. This was fixed by re-entering the title directly in the db. Will need to 
// ** add error checking for next upgrade. 
$target = $_GET['target'];
if (!isset($target)) $target ="admin";
if ($target=="busterscorner") $target="news";
if($target=="dox" OR $target=="htmltags" OR $target=="nav" OR $target=="linkmanage" 
OR $target=="imglst") {
$query = "SELECT * from docs where name = '$target';";
}
else {
if ($target == "Welcome") {
$target = "home";
}
if ($target == "Administration") {
$target = "admin";
}
$query = "SELECT * from $table where name = '$target';";
}
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
if ($target=="dox" OR $target=="htmltags" OR $target=="nav" OR $target=="linkmanage"
OR $target=="imglst") {
echo $content;
exit;
}
if ($target =="disabled") {
include ('distpl.php');
exit;
}
if ($target =="links") {
include('linktpl.php');
exit;
}
if ($target=="imagelist") {
include ('imagelist.php');
exit;
}
if ($target=="update") {
include ('update.php');
exit;
}
if ($target=="add") {
include ('add.php');
exit;
}

if ($target=="admin") { 
echo $content;
}
elseif ($target!="admin") {
?>
<form action="index.php?target=update" method="post">
<table class= "main">
<tr><td align="right">Active: <input name ="active" type ="checkbox"
<?php
 if ($active=="1") {
$active="checked=\"checked\"";
}
else {
$active = "";
}
echo $active;?>"><br>Menu: <input name ="menu" type ="checkbox" 
<?php
 if ($menu=="1") {
$menu="checked=\"checked\"";
} 
else {
$menu = "";
}
echo $menu;?>"></td><td align="right">Select:<Select name="page">
<?php
if ($page == "") {
$set = "1";
?>
<option name ="type">Please Select 
<?php 
}
else { 
$set ="";
}
?>
<?php
$query1 = "SELECT title from $table where menu = '1' ORDER by 
ornum;"; $result1 = mysql_query($query1);
while($row1=mysql_fetch_assoc($result1)) {
$title2 =$row1['title'];
?>
<option name="type"><?php echo ucwords($title2);?>
<?php
}
if ($set !="1") {
?>
<option name="type">Un-link
<?php
}
?></select><br>
Order: <input name ="ornum" type ="INT" value="<?php echo $ornum;?>" size 
="5"></td></tr> <tr><td align=right>
<input name="ref_id" type="hidden"  value=<?php echo $ref;?>>Name: <input name ="name" type ="text" value="<?php echo $name;?>"></td><td align=right>Type: <input name ="type" type ="text" size =5  value="<?php echo $type;?>"></td></tr>
<tr><td align=right>
Title: <input name ="title" type ="text" value="<?php echo $title;?>"></td><td align=right>Style: <input name ="style" type ="text" size ="5" value="<?php echo $style;?>"></td></tr>
<tr><td colspan=2 valign="top">Content:<br>
<textarea id="content" cols="75" rows="20" name ="content">
<?php echo $content ;?>
</textarea><br><br>
Modified : <?php echo $modified;?><br>
Created : <?php echo $created;?><br><br>
<input type="submit" value="Edit"> <input type="reset"value="Reset">
<input type="hidden" name="modified" value="<?php echo $modified;?>">
<input type="hidden" name="created" value="<?php echo $created;?>"> 
</td></tr></table>
</form>
<?php
}
?>
</div>
</div>
</td></tr></table>
<?php
// ** End Main Body Content
// echo "!! $active !!";
?>
</body>
</html>
