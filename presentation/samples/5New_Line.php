<?php


// Must use <br> or <p> to be able to echo 
// the next line in a new line in HTML
// otherwise use "\n" when writing to a txt file 

$hello_world = 'Hello World' . '<br>';
$number = 5;

echo $hello_world;
echo $number;

//or
?>

<p> <?php 
echo $hello_world;
?>
</p>
<?php

echo $number;

?>

<?php
//alternatively, you can just use "\n" and use the built in nl2br function
$hello_world = nl2br("\n\nHello world\n");
$number = 5;

echo $hello_world;
echo $number;

?>
