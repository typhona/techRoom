<ul class="main">
<?php
$query = "SELECT * from $table2 ORDER by ref_id;"; 
$result = mysql_query($query);
// $res2 = mysql_fetch_assoc($result);
// $num = mysql_num_rows($result);
// echo "Result = " .$result . "<br>";
// echo "Associative = " . $res2 . "<br>";
// echo $num . "<br>";
while($row=mysql_fetch_assoc($result)) {
$title =$row['cat_name'];
$ref =$row['ref_id'];

?>
<li class ="main"><a href="index.php?target=<?php echo $ref;
?>"><?php echo ucwords($title); ?></a></li>
<?php
//echo ucwords($title) ."<br>";
}
?>
</ul>

