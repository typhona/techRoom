<?php
function list()
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
<li class ="main"><a href="index.php?target=<?php $strip = str_replace(" ", "%20", $title);echo 
$strip;
?>"><?php echo ucwords($title); ?></a></li>
<?php
// echo ucwords($title) ."<br>";
}
?>
</ul>