<?php

if (isset($_REQUEST["studente"])) {
    $studente = $_REQUEST['studente'];
}
if (isset($_REQUEST["classe"])) {
    $classe = $_REQUEST['classe'];
}
if (isset($_REQUEST["materia"])) {
    $materia = $_REQUEST['materia'];
}

$separatori=";";
$file = fopen('random-grades.csv', 'r');

if($file){

    while( ($line=fgets($file)) !== false ){
          $campo=explode($separatori,$line);
          $cont=count(campo);
          echo $cont;
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
<p>Questo è il corpo della mia pagina web.</p>

<form method="request" action="esercitazione.php">

    <input type="text" name="studente"
    <input type="submit" value="inserisci studente">
    <br>

    <input type="text" name="classe">
    <input type="submit" value="inserisci classe">
    <br>

    <input type="text" name="materia">
    <input type="submit" value="inserisci mnateria">
</form>


</body>
</html>