<?php

function primi($num){
    $divisore = 0;

    if ($num < 2) {
        return false;
    }

    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $divisore++;
        }
    }

    if ($divisore == 2) {
        return true;  // primo
    } else {
        return false; // non primo
    }
}

$n = $_GET["n"];

$nprimo = 0;
$current = 2;

while ($nprimo < $n) {
    if (primi($current)) {
        echo $current . "<br>";
        $nprimo++;
    }
    $current++;
}
?>
<html lang="it">
<a href="4.html">torna indietro</a>
</html>
