<?php

include 'functions.php';

$testCases = [
    [
        [50, 100, 1, 90, 675],
        [100, 1, 90, 675],
    ],
    [
        [50, 60, 100, 1, 90, 675],
        [100, 1, 90, 675],
    ],
    [
        [919, 922, 691, 355, 355, 90, 5, 517, 675, 304],
        [922, 691, 355, 355, 90, 5, 517, 675],
    ],
    [
        [1, 2, 3, 2, 1],
        []
    ],
    [
        [1, 2, 1],
        []
    ],
    [
        [1, 2],
        []
    ],
    [
        [1, 2, 3],
        []
    ],
    [
        [2, 1],
        []
    ],
    [
        [3, 2, 1],
        []
    ],
];

$deepestPitLinear = new DeepestPitLinear();

for ($i = 0; $i < count($testCases); $i++) {
    $result = $deepestPitLinear->formatInput($testCases[$i][0]);

    if ($result !== $testCases[$i][1]) {
        echo 'Arrays do not equal:' . PHP_EOL;
        echo stringifyArray($result) . ' != ' . stringifyArray($testCases[$i][0]) . PHP_EOL;
    }
}

echo "Test completed" . "\n";
