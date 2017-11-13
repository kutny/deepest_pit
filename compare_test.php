<?php

include 'functions.php';

$testsNumber = 1000;
$randomIntegers = 1000;

for ($i = 0; $i < $testsNumber; $i++) {
    $a = generateRandomIntegers($randomIntegers);

    $deepestPit = deepest_pit($a);
    $deepestPitLinear = deepest_pit_linear($a);

    assertSame($deepestPit, $deepestPitLinear, $a);
}

echo "Test completed" . "\n";
