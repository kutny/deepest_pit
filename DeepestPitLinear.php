<?php

class DeepestPitLinear
{
    public function calculate(array $a) {
        $depth = -1;

        $formattedA = $this->formatInput($a);
        $startIndex = 0;

        if ($formattedA === []) {
            return $depth;
        }

        $countFormattedA = count($formattedA);

        do {
            try {
                $pitDetails = $this->readPit($formattedA, $startIndex, $countFormattedA);
            }
            catch (Exception $e) {
                echo stringifyArray($a) . PHP_EOL;
                echo stringifyArray($formattedA) . PHP_EOL;
                exit;
            }

            $depth = max($pitDetails['depth'], $depth);
            $startIndex = $pitDetails['newStartIndex'];
        }
        while ($startIndex < $countFormattedA - 1);

        return $depth;
    }

    public function formatInput(array $a) {
        $countA = count($a);

        $startIndex = 0;
        $endIndex = $countA;

        for ($i = 0; $i < $countA; $i++) {
            if ($a[$i + 1] >= $a[$i]) {
                $startIndex = $i + 1;
            }
            else {
                break;
            }
        }

        for ($i = $countA - 1; $i >= 0; $i--) {
            if ($a[$i - 1] >= $a[$i]) {
                $endIndex = $i - 1;
            }
            else {
                break;
            }
        }

        if ($startIndex == $endIndex || $startIndex === $countA - 1) {
            return [];
        }

        return array_slice($a, $startIndex, $endIndex + 1 - $startIndex);
    }

    private function readPit(array $a, $startIndex, $countA) {
        $pValue = $lowest = $a[$startIndex];

        for ($i = ($startIndex + 1); $i < $countA; $i++) {
            // aktuální hodnota je nižší, než původní nejnižší
            if ($a[$i] <= $lowest) {
                $lowest = $a[$i];

                if ($a[$i - 1] == $lowest) {
                    $pValue = $a[$i];
                }
            }
            else if ($a[$i] > $lowest) {
                if ($a[$i - 2] > $a[$i - 1]) { // hodnota předcházející pitu je vyšší, takže pit je reálný
                    $qValue = $a[$i - 1]; // našli jsme q

                    // hledáme konec pitu
                    $r = $i;
                    while ($r <= $countA - 2 && $a[$r + 1] > $a[$r]) {
                        $r++;
                    }

                    $rValue = $a[$r];

                    $depth = min([$pValue - $qValue, $rValue - $qValue]);

                    $newStartIndex = $r;

                    // po $rValue následuje stejná hodnota => musíme dál hledat $newStartIndex
                    if ($a[$r + 1] === $a[$r]) {
                        while ($newStartIndex <= $countA - 2 && $a[$newStartIndex + 1] >= $a[$newStartIndex]) {
                            $newStartIndex++;
                        }
                    }

                    return [
                        'depth' => $depth,
                        'newStartIndex' => $newStartIndex,
                    ];
                }
                else {
                    $r = $i;
                    while ($r <= $countA - 2 && $a[$r + 1] >= $a[$r]) {
                        $r++;
                    }

                    return [
                        'depth' => null,
                        'newStartIndex' => $r,
                    ];
                }
            }
        }

        throw new \Exception('This should never happen');
    }
}
