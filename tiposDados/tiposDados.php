<?php

//string
$str = "Olá Mundo em php.";
var_dump($str);

echo "<br>";

if (is_string($str)) {
    echo "É uma variável String";
} else {
    echo "Não é uma variável String";
}
echo "<hr>";

//int
$numero = 4;
var_dump($numero);

echo "<br>";

if (is_int($numero)) {
    echo "É uma variável Inteira";
} else {
    echo "Não é uma variável Inteira";
}

echo "<hr>";
?>