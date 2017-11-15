<?php

include 'functions.php';

$a = [7, 15, 12, 1, 11, 15, 85, 13, 13, 43, 30, 45, 30, 44]; // original task

$deepestPit = $deepestPitCalculatorOriginal->calculate($a);

var_dump($deepestPit);

$deepestPit = $deepestPitCalculator->calculate($a);

var_dump($deepestPit);
