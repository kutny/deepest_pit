<?php

function deepest_pit_linear(array $a) {
    $depth = -1;
    $pitIndex = 0;
    $previousPhase = null;

    $pValues = $qValues = $rValues = [];

    for ($i = 1; $i < count($a); $i++) {
        if ($a[$i - 1] > $a[$i]) { // teď je DOWN fáze
            if ($previousPhase === 'UP' || $previousPhase === null) {
                if (!array_key_exists($pitIndex, $pValues)) {
                    $pValues[$pitIndex] = $a[$i - 1];
                }
                else if (array_key_exists($pitIndex, $qValues)) {
                    $rValues[$pitIndex] = $a[$i - 1];

                    $pitIndex++;

                    $pValues[$pitIndex] = $a[$i - 1];
                }
            }

            $previousPhase = 'DOWN';
        }
        else if ($a[$i - 1] < $a[$i]) { // teď je UP fáze
            if ($previousPhase === 'DOWN') {
                $qValues[$pitIndex] = $a[$i - 1];
            }

            if ($i === (count($a) - 1)) {
                $rValues[$pitIndex] = $a[$i];
            }

            $previousPhase = 'UP';
        }
    }

    for ($i = 0; $i <= $pitIndex; $i++) {
        if (array_key_exists($i, $pValues) && array_key_exists($i, $qValues) && array_key_exists($i, $rValues)) {
            $z1 = $pValues[$i] - $qValues[$i];
            $z2 = $rValues[$i] - $qValues[$i];

            $depth = max(min([$z1, $z2]), $depth);
        }
    }

    return $depth;
}
