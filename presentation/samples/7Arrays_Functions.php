<?php
$arr1 = array(1, 2, 3);
// removes element at index 1
unset($arr1[1]);
print_r($arr1);    //use print_r to get information on variable
echo "<p>";

//reindexs the array
$b = array_values($arr1);
print_r($b);
