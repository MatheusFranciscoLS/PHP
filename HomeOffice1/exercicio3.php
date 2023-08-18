<?php

$numero = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
function par($numero){
    $par = $numero % 2;

    if ($par == 0) {
        echo $numero + " é par";
    } else {
        echo "não é par";
    }
    return $par;
}

echo par();