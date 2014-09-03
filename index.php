<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" type="text/css" href="style.css">
<?php 
// phpinfo();
include ("config.php") ;
// include ("func.php");
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
 <center><a href="index.php?target=home"><img class ="logo" alt ="<?php echo ucwords($title); ?>" src ="images/logo.gif" border=0>
</a></center><br> 
<?php
?>
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
if (is_numeric($target)) {
include ('edit.php');
exit;
}
if ($target=="edititems") {
include ('edititems.php');
exit;
}
if ($target=="update") {
include ('update.php');
exit;
}
if ($target=="addi") {
include ('additems.php');
exit;
}
if ($target=="additemsproc") {
include ('additemsproc.php');
exit;
}
if ($target=="addc") {
include ('addgame.php');
exit;
}
if ($target=="addgameproc") {
include ('addgameproc.php');
exit;
}
if ($target=="editc") {
include ('editgame.php');
exit;
}
if ($target=="home") {
include ('home.txt');
}
else {
include ('gamedisptpl.php');
}
?>
<center>
<?php
include ('footer.php');
?>
</center>
</div>
</div>
</td></tr></table>
<?php
// ** End Main Body Content
// echo "!! $active !!";
?>
</div>
</body>
</html>
