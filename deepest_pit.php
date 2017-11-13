<?php

/*
 * Given a zero-indexed array of integers A[N], we can define a "pit" (of
 * this array) a triplet of integers (P,Q,R) such that they follow these rules:
 *
 * 0 ≤ P < Q < R < N
 * A[P] > A[P+1] > ... > A[Q] (strictly decreasing) and
 * A[Q] < A[Q+1] < ... < A[R] (strictly increasing).
 *
 * We can also define the depth of this pit as the number
 * min{A[P] − A[Q], A[R] − A[Q]}.
 *
 * You should write a Java method (function) deepest_pit(int[] A) which
 * returns the depth of the deepest pit in array A or -1 if it does not exit.
 *
 * Costraints: N is an integer within the range [1..1,000,000]; each element
 * of array A is an integer within the range [−100,000,000..100,000,000].
 */

function deepest_pit(array $a) {
    $depth = -1;

    for ($i = 1; $i < count($a) - 1; $i++) {
        if ($a[$i - 1] > $a[$i] && $a[$i + 1] > $a[$i]) {
            $q = $i;

            $p = $q;
            while ($p > 0 && $a[$p-1] > $a[$p]) {
                $p--;
            }

            $r = $q;
            while ($r <= count($a)-2 && $a[$r+1] > $a[$r]) {
                $r++;
            }

            $z1 = $a[$p] - $a[$q];
            $z2 = $a[$r] - $a[$q];

//            var_dump('p=' . $p);
//            var_dump('q=' . $q);
//            var_dump('r=' . $r);
//            var_dump('----');

            $depth = max(min([$z1, $z2]), $depth);
        }
    }

    return $depth;
}
