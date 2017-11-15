<?php

include 'functions.php';

$testCases = [
    [688, 59, 466, 513, 758, 260, 21, 814, 806],
    [688, 59, 466, 513, 758, 260, 21, 21, 814, 806],

    [711, 428, 960, 100, 139, 660, 660, 799, 508, 269],
    [711, 428, 1024, 960, 960, 100, 139, 660, 660, 799, 508, 269],
    [711, 428, 960, 960, 100, 139, 660, 660, 799, 508, 269],
    [711, 428, 1000, 960, 960, 100, 139, 660, 660, 799, 508, 269],
    [711, 428, 960, 100, 100, 139, 660, 660, 799, 508, 269],
    [711, 428, 960, 960, 100, 100, 139, 660, 660, 799, 508, 269],

    [919, 922, 691, 355, 355, 90, 5, 517, 675, 304],

    [82, 101, 101, 521, 572, 924, 352, 571, 496, 726],

    [332, 438, 280, 280, 420, 889, 974, 592, 886, 716]
];

for ($i = 0; $i < count($testCases); $i++) {
    $a = $testCases[$i];

    $deepestPit = $deepestPitCalculatorOriginal->calculate($a);
    $deepestPitLinear = $deepestPitCalculator->calculate($a);

    assertSame($deepestPit, $deepestPitLinear, $a);
}

echo "Test completed" . "\n";