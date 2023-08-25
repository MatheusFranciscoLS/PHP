<?php

$farenheit = $_POST['farenheit'];
$celsius = $_POST['celsius'];

    echo "Celsius: " . ($farenheit - 32) * (5 / 9) . "<br>";
    echo "Farenheit: " . $celsius * (9 / 5) + 32;

?>