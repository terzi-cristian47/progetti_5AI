<?php

if (isset($_REQUEST["studente"])) {
    $studente = $_REQUEST['studente'];
} else { $studente = ""; }

if (isset($_REQUEST["classe"])) {
    $classe = $_REQUEST['classe'];
} else { $classe = ""; }

if (isset($_REQUEST["materia"])) {
    $materia = $_REQUEST['materia'];
} else { $materia = ""; }

if(isset($_REQUEST["scelta"])){
    $scelta=$_REQUEST["scelta"];
} else { $scelta = ""; }

$sommavoti=0;
$nvoti=0;
$separatori=",";
$sommam=0;
$nmedia=0;
$arraymat = [];
$file = fopen('random-grades.csv', 'r');

if($file){

    if($scelta=="studente") {
        while (($line = fgets($file)) !== false) {
            $campo = explode($separatori, $line);

            if ($studente != "" && $materia != "") {
                if ($studente == $campo[1] && $materia == $campo[3]) {
                    $sommam = $sommam + $campo[5];
                    $nmedia++;
                    $arraymat[] = $campo[5];
                }
            }
        }
    }

    fclose($file);
}else{
    echo "file non aperto";
}

if($sommam>0) {
    $mediag = $sommam / $nmedia;
    echo "la media generale è ", $mediag, "<br>";
    echo "invece la media delle altre materie è:<br>";
    for($i=0; $i<count($arraymat); $i++){
        echo $arraymat[$i], "<br>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Esempio di Pagina</title>
</head>
<body>
<h1>Benvenuto!</h1>
<p>Questo è il corpo della mia pagina web. inserire nome studente, classe e materia</p>

<form method="get" action="esercitazione.php">

    Studente: <input type="text" name="studente" /> <br><br>
    Classe: <input type="text" name="classe" /><br><br>
    Materia: <input type="text" name="materia" /><br><br>

    <input type="radio" id="studente" name="scelta" value="studente"/>
    <label for="studente">scegli studente</label><br>

    <input type="radio" id="classe" name="scelta" value="classe"/>
    <label for="classe">scegli classe</label><br>

    <input type="radio" id="materia" name="scelta" value="materia"/>
    <label for="materia">scegli materia</label><br><br>

    <input type="submit" value="inserisci valori">

</form>

<!-- Link semplici per inserire/modificare/cancellare voti -->
<a href="inserisci.php">Inserisci nuova valutazione</a><br>
<a href="modifica.php">Modifica valutazione</a><br>
<a href="cancella.php">Cancella valutazione</a><br>

<a href="inserisci.php">Inserisci nuova valutazione</a><br>
<a href="modifica.php">Modifica valutazione</a><br>
<a href="cancella.php">Cancella valutazione</a><br>


</body>
</html>

