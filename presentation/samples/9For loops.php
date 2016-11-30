<?php

//expr1 is evaluated(executed) once unconditionally
// expr 2: if condition true then loop continues
// expre3: is evlauted
for ($i = 1; $i <= 10; $i++) {
    echo $i;
}

echo "<p>";

// can have multiple expressions separated by commas
for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);


