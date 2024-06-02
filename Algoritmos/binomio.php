<?php

function binomialCoefficient($n, $k) {
    if ($k == 0 || $k == $n) {
        return 1;
    }
    return binomialCoefficient($n - 1, $k - 1) + binomialCoefficient($n - 1, $k);
}

function binomialExpansion($n) {
    $result = [];
    for ($k = 0; $k <= $n; $k++) {
        $coef = binomialCoefficient($n, $k);
        $aExp = $n - $k;
        $bExp = $k;

        $term = "";
        if ($coef != 1) {
            $term .= $coef;
        }
        if ($aExp > 0) {
            $term .= "a";
            if ($aExp > 1) {
                $term .= "^" . $aExp;
            }
        }
        if ($bExp > 0) {
            $term .= "b";
            if ($bExp > 1) {
                $term .= "^" . $bExp;
            }
        }
        $result[] = $term;
    }

    return implode(" + ", $result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = intval($_POST["potencia"]);
    $expansion = binomialExpansion($n);
    echo "BInomio de Newton   ";
    echo "   (a + b)^$n = " . $expansion;
}
?>
