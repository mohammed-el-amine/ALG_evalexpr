<?php

/**
 * Gestion des opérations .
 */
function addition($a, $b, &$result)
{
    $result += $a + $b;
}

function soustration($a, $b, &$result)
{
    $result += $a - $b;
}

function division($a, $b, &$result)
{
    $result += $a / $b;
}

function multiplication($a, $b, &$result)
{
    $result += $a * $b;
}

function modulo($a, $b, &$result)
{
    $result += $a % $b;
}



/**
 * Fonction main .
 */
function eval_expr(string $expr)
{
    $result = 0;
    //contenue de la recherche regex
    $matches = [];

    //regex servant a récuperer toutes les valeurs numerique y compris les decimaux compris entre les symbole de calcule
    preg_match_all("/(?<!\d)[-]?\d*\.?\d+|[\\%\\+\\-\\/\\*\\(\\)]/", $expr, $matches);
    //reinitialisation du tableau matches .
    $matches = $matches[0];
    //print_r($matches);

    foreach ($matches as $index => $res) {
        if (!is_numeric($res)) {
            //echo $index . " " . $res . "\n";
            if ($res == "+") {
                addition($matches[$index - 1], $matches[$index + 1], $result);
            } elseif ($res == "-") {
                soustration($matches[$index - 1], $matches[$index + 1], $result);
            } elseif ($res == "/") {
                division($matches[$index - 1], $matches[$index + 1], $result);
            } elseif ($res == "*") {
                multiplication($matches[$index - 1], $matches[$index + 1], $result);
            } elseif ($res == "%") {
                modulo($matches[$index - 1], $matches[$index + 1], $result);
            }
            echo $result . "\n";
        }
    }
}
