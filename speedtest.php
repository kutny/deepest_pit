<?php

include 'functions.php';

ini_set("memory_limit",-1);

foreach ([10, 10e2, 10e3, 10e4, 10e5, 10e6, 10e6*2] as $numberCount) {
    printLine(number_format($numberCount) . ' random numbers:');
    printLine('--');

    $a = generateRandomIntegers($numberCount);

    $startTime = microtime(true);

    deepest_pit($a);

    $endTime = microtime(true);

    printLine($endTime - $startTime);

    $startTime = microtime(true);

    deepest_pit_linear_faster($a);

    $endTime = microtime(true);

    printLine($endTime - $startTime);

    printLine('--------------------');
}
