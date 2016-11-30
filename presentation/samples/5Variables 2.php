<?php

$a = "Hello";
$$a = "World";    // with the extra "$" Hello is now a variable name

echo "$a, $Hello" . "<br>";  

// use {} so that the string is printed,
// Or else will print the variable name $Hello
// instead

echo "$a, ${$a}";


