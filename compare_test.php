<?php

include 'functions.php';

$testsNumber = 10e6;
$randomIntegers = 10;

for ($i = 0; $i < $testsNumber; $i++) {
    $a = generateRandomIntegers($randomIntegers);

    $deepestPit = $deepestPitCalculatorOriginal->calculate($a);
    $deepestPitLinear = $deepestPitCalculator->calculate($a);

    assertSame($deepestPit, $deepestPitLinear, $a);
}

echo "Test completed" . "\n";
