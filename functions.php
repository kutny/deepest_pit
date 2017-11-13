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
        echo '$a = ' . stringifyArray($a);
        exit;
    }
}

function printLine($string) {
    echo $string . PHP_EOL;
}

function stringifyArray(array $a) {
    return '[' . implode(', ', $a) . '];' . PHP_EOL;
}

require 'deepest_pit.php';
require 'deepest_pit_linear.php';
require 'deepest_pit_linear_faster.php';
