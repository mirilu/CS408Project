<?php

$color = "yellow";
$fruit = "banana";
echo "A $color $fruit <br>"; // will print local variables

require 'IncludeSample.php';

echo "A $color $fruit <br>"; // will print variables defined in 
                            // sample php file
                            // 
// if file doesn't exist, will give warning
include 'include.php';       
echo "A $color $fruit <br>";


require_once 'IncludeSample.php';
echo "A $color $fruit";

