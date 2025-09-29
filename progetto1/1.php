<?php

$n = $_GET["n"];
$scelta = $_GET["scelta"];

if($scelta=="triangolo") {

    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            echo " *";
        }
        echo "<br>";
    }
}

if($scelta=="quadrato") {

    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo " *";
        }
        echo "<br>";
    }
}

if($scelta=="triangolo2") {

    for ($i = $n; $i >= 1; $i--) {

        for ($s = 0; $s < $n - $i; $s++) {
            echo "&nbsp;&nbsp;";
        }

        for ($j = 1; $j <= $i; $j++) {
            echo " *";
        }
        echo "<br>";
    }
}

if($scelta=="quadrato2") {

    for ($i = 1; $i <= $n; $i++) {
        for ($j = 1; $j <= $n; $j++) {
            if ($i == 1 || $i == $n || $j == 1 || $j == $n) {
                echo " *";
            } else {
                echo " &nbsp;&nbsp;";
            }
        }
        echo "<br>";
    }
}
?>

<html>
<a href="2.html">torna indietro</a>
</html>
