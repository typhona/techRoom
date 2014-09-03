<?php
function add_3dots($string,$repl,$start,$limit) {
   if(strlen($string) > $limit) {
       return substr_replace(strip_tags($string),$repl,$start,$limit);
   } else {
       return $string;
   };
};
?>