<?php

function deepest_pit_linear_faster(array $a) {
    $depth = -1;
    $pitIndex = 0;
    $previousPhase = null;
    $countA = count($a);

    $pValues = $qValues = $rValues = [];

    $latestPValue = $latestQValue = $latestRValue = null;

    for ($i = 1; $i < $countA; $i++) {
        if ($a[$i - 1] > $a[$i]) { // teď je DOWN fáze
            if ($previousPhase === 'UP' || $previousPhase === null) {
                if (!array_key_exists($pitIndex, $pValues)) {
                    $pValues[$pitIndex] = $latestPValue = $a[$i - 1];
                }
                else if (array_key_exists($pitIndex, $qValues)) {
                    $rValues[$pitIndex] = $latestRValue = $a[$i - 1];

                    $newDepth = min([$latestPValue - $latestQValue, $latestRValue - $latestQValue]);

                    if ($newDepth > $depth) {
                        $depth = $newDepth;
                    }

                    $pitIndex++;

                    $pValues[$pitIndex] = $latestPValue = $a[$i - 1];
                }
            }

            $previousPhase = 'DOWN';
        }
        else if ($a[$i - 1] < $a[$i]) { // teď je UP fáze
            if ($previousPhase === 'DOWN') {
                $qValues[$pitIndex] = $latestQValue = $a[$i - 1];
            }

            if ($i === ($countA - 1)) {
                $rValues[$pitIndex] = $latestRValue = $a[$i];

                $newDepth = min([$latestPValue - $latestQValue, $latestRValue - $latestQValue]);

                if ($newDepth > $depth) {
                    $depth = $newDepth;
                }
            }

            $previousPhase = 'UP';
        }
    }

    return $depth;
}
