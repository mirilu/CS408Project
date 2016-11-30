<?php

$i = 1;
while ($i <= 10) {
    echo $i++ . "\n";  /* the printed value would be
                   $i before the increment
                   (post-increment) */
}

echo "<p>";

$i = 0;
do {
    echo $i;
} while ($i > 0);

