<ul class="menu1">
<?php
$query = "SELECT title from tfb_content where name != 'admin' AND menu = '0' OR active 
='0' ORDER by ref_id;"; 
$result = mysql_query($query);
// $res2 = mysql_fetch_assoc($result);
// $num = mysql_num_rows($result);
// echo "Result = " .$result . "<br>";
// echo "Associative = " . $res2 . "<br>";
// echo $num . "<br>";
while($row=mysql_fetch_assoc($result)) {
$title =$row['title'];
?>
<li><a href="index.php?target=<?php $strip = str_replace(" ", "", $title);echo
$strip;
?>"><?php echo ucwords($title); ?></a></li>
<?php
// echo ucwords($name) ."<br>";
} 
?>   
</ul>
