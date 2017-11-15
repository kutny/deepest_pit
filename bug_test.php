<?php

include 'functions.php';

$a = [688, 59, 466, 513, 758, 260, 21, 21, 814, 806];

$deepestPit = $deepestPitCalculatorOriginal->calculate($a);
$deepestPitLinear = $deepestPitCalculator->calculate($a);

assertSame($deepestPit, $deepestPitLinear, $a);

echo "Test completed" . "\n";
