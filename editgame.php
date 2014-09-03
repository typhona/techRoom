<form>
<?php
$query = "SELECT * from $table2 ORDER by ref_id;"; 
$result = mysql_query($query);
// $res2 = mysql_fetch_assoc($result);
// $num = mysql_num_rows($result);
// echo "Result = " .$result . "<br>";
// echo "Associative = " . $res2 . "<br>";
// echo $num . "<br>";
while($row=mysql_fetch_assoc($result)) {
$title =$row['game_name'];
$ref =$row['ref_id'];

?>
<center><input type="text" value="<?php echo ucwords($title);?>"> <input type="submit" value="Edit"><br/></center>
<?php
//echo ucwords($title) ."<br>";
}
?>

