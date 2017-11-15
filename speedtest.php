<?php

include 'functions.php';

ini_set("memory_limit",-1);

foreach ([10, 10e2, 10e3, 10e4, 10e5, 10e6, 10e6*2, 10e6*4] as $numberCount) {
    printLine(number_format($numberCount) . ' random numbers:');
    printLine('--');

    $a = generateRandomIntegers($numberCount);

    $startTime = microtime(true);

    $deepestPitCalculatorOriginal->calculate($a);

    $endTime = microtime(true);

    printLine($endTime - $startTime);

    $startTime = microtime(true);

    $deepestPitCalculator->calculate($a);

    $endTime = microtime(true);

    printLine($endTime - $startTime);

    printLine('--------------------');
}
