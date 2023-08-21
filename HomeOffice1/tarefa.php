<?php

function adicao($a, $b)
{
    $retorno = ($a + $b);
    return $retorno;
}

function subtracao($a, $b)
{
    $retorno = ($a - $b);
    return $retorno;
}

function multiplica($a, $b)
{
    $retorno = ($a * $b);
    return $retorno;
}

function divisao($a, $b)
{
    if ($a == 0 || $b == 0) {
        echo "Não pode ser feito divisão por 0";
    }else {
        $retorno = ($a / $b);
        return $retorno;
    }
}

echo adicao(10, 5);
echo "<hr>";
echo subtracao(10, 5);
echo "<hr>";
echo multiplica(10, 5);
echo "<hr>";
echo divisao(10, 2);
