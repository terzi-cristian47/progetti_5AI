<?php
if (isset($_POST["studente"]) && isset($_POST["classe"]) && isset($_POST["materia"]) && isset($_POST["voto"])) {
    $studente = $_POST["studente"];
    $classe = $_POST["classe"];
    $materia = $_POST["materia"];
    $voto = $_POST["voto"];
    $id = rand(1000,9999);

    $file = fopen("random-grades.csv", "a");
    if ($file) {
        fwrite($file, $id . "," . $studente . "," . $classe . "," . $materia . ",data," . $voto . "\n");
        fclose($file);
        echo "Valutazione inserita!";
    } else {
        echo "Impossibile aprire il file.";
    }
}
?>

<form method="post" action="inserisci.php">
    Studente: <input type="text" name="studente"><br>
    Classe: <input type="text" name="classe"><br>
    Materia: <input type="text" name="materia"><br>
    Voto: <input type="text" name="voto"><br><br>
    <input type="submit" value="Inserisci">
</form>