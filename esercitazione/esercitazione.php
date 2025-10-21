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
if (isset($_REQUEST["campo"])) {
    $campo= $_POST["campo"];
}
if (isset($_REQUEST["somma"])){
    $somma = $_REQUEST["somma"];
}

$sommavoti=0;
$nvoti=0;
$separatori=",";
$file = fopen('random-grades.csv', 'r');

if($file){

    while( ($line=fgets($file)) !== false ){
        $campo=explode($separatori,$line);
        $rigaat=true;
        if($studente != "" ){
            if($campo[1] != $studente )
                $rigaat=false;
        }
        if($classe != ""){
            if($campo[2] != $classe )
                $rigaat=false;
        }
        if( $materia != ""){
            if($campo[3] != $materia){
                $rigaat=false;
            }
        }
        if($rigaat){
            $voto=$campo[5];
            $sommavoti=$sommavoti+$voto;
            $nvoti++;
        }
    }
    fclose($file);
}else{
    echo "file non aperto";
}
if($sommavoti>0) {
    $media = $sommavoti / $nvoti;
    echo "la media è ", $media;
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

<form method="request" action="esercitazione.php">

    <input type="text" name="studente"
    <br>

    <br>

    <input type="text" name="classe">

    <br>

    <input type="text" name="materia">
    <input type="submit" value="inserisci valori">
</form>


</body>
</html>