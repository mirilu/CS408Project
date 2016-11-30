<?php

function handler(){
    echo "x";
}
register_tick_function("handler");
$i = 0;
declare(ticks = 4) {
    while ($i < 9)
        echo ++$i;
}

