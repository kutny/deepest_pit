<?php

class DeepestPitLinearFaster
{
    public function calculate(array $a)
    {
        $depth = -1;
        $countA = count($a);

        $startIndex = 0;
        $endIndex = $countA;

        // ořízneme levý okraj pole, pokud není klesající
        for ($i = 0; $i < $countA; $i++) {
            if ($a[$i + 1] >= $a[$i]) {
                $startIndex = $i + 1;
            }
            else {
                break;
            }
        }

        // ořízneme pravý okraj pole, pokud není rostoucí
        for ($i = $countA - 1; $i >= 0; $i--) {
            if ($a[$i - 1] >= $a[$i]) {
                $endIndex = $i - 1;
            }
            else {
                break;
            }
        }

        if ($startIndex == $endIndex || $startIndex === $countA - 1 || $startIndex > $endIndex) {
            return -1;
        }

        do {
            $pValue = $lowest = $a[$startIndex];

            for ($i = ($startIndex + 1); $i < $countA; $i++) {
                // aktuální hodnota je nižší, než původní nejnižší
                if ($a[$i] <= $lowest) {
                    $lowest = $a[$i];

                    if ($a[$i - 1] == $lowest) {
                        $pValue = $a[$i];
                    }
                }
                else {
                    if ($a[$i] > $lowest) {
                        if ($a[$i - 2] > $a[$i - 1]) { // hodnota předcházející pitu je vyšší, takže pit je reálný
                            $qValue = $a[$i - 1]; // našli jsme q

                            // hledáme konec pitu
                            $r = $i;
                            while ($r <= $countA - 2 && $a[$r + 1] > $a[$r]) {
                                $r++;
                            }

                            $rValue = $a[$r];

                            $localDepth = min([$pValue - $qValue, $rValue - $qValue]);

                            $newStartIndex = $r;

                            // po $rValue následuje stejná hodnota => musíme dál hledat $newStartIndex
                            if ($a[$r + 1] === $a[$r]) {
                                while ($newStartIndex <= $countA - 2 && $a[$newStartIndex + 1] >= $a[$newStartIndex]) {
                                    $newStartIndex++;
                                }
                            }

                            $depth = max($localDepth, $depth);
                            $startIndex = $newStartIndex;
                            continue 2;

                        }
                        else {
                            $r = $i;
                            while ($r <= $countA - 2 && $a[$r + 1] >= $a[$r]) {
                                $r++;
                            }

                            $startIndex = $r;
                            continue 2;
                        }
                    }
                }
            }
        }
        while ($startIndex < $endIndex - 1);

        return $depth;
    }
}
