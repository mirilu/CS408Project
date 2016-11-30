<?php
// two ways to set an array
$arr1 = array(1, 2, 3);

// key can either be an integer or a string
$arr2 = array(  
    2 => "a",
    "3" => "b",
    5.4 => "c",
    true => "d",
);

var_dump($arr2);    // var_dump used to print type and data
// as you see : "3", 5.4, and true are cast
//to integers
echo "<p>";

$arr2["3"] = "f";

var_dump($arr2);
echo "<p>";

//also acceptable, after the value with the key 6, 
//the next value's key will be 7
$array = array(
         "a",
         "b",
    6 => "c",
         "d",
);
var_dump($array);
echo "<p>";





