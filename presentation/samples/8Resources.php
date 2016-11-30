<?php
// prints: mysql link
$c = mysql_connect();
echo get_resource_type($c) . "<br>";

// prints: stream
$fp = fopen("foo", "w");
echo get_resource_type($fp) . "<br>";


