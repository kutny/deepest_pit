<?php

include 'functions.php';

$a = [7, 15, 12, 1, 11, 15, 85, 13, 13, 43, 30, 45, 30, 44]; // original task

$deepestPit = deepest_pit($a);

var_dump($deepestPit);

$deepestPit = deepest_pit_linear_faster($a);

var_dump($deepestPit);
