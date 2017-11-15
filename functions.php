<?php

function vd($data) {
    var_dump($data);
}

function generateRandomIntegers($count) {
    $output = [];

    for ($i = 0; $i < $count; $i++) {
        $output[] = rand(1, 1000);
    }

    return $output;
}

function assertSame($pit1, $pit2, array $a) {
    if ($pit1 !== $pit2) {
        echo 'Pits do not equal (' . $pit1 . ' !== ' . $pit2 . ')' . PHP_EOL;
        echo '$a = ' . stringifyArray($a) . PHP_EOL;
        exit;
    }
}

function printLine($string) {
    echo $string . PHP_EOL;
}

function stringifyArray(array $a) {
    return '[' . implode(', ', $a) . ']';
}

require 'DeepestPitOriginal.php';
require 'DeepestPitLinear.php';
require 'DeepestPitLinearFaster.php';

ini_set('display_errors', '1');
error_reporting(E_ALL);

$deepestPitCalculatorOriginal = new DeepestPitOriginal();
$deepestPitCalculator = new DeepestPitLinearFaster();
