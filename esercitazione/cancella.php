<?php
if (isset($_POST["id"])) {
    $id_del = $_POST["id"];

    $file = fopen("random-grades.csv", "r");
    $righe = [];
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $campo = explode(",", $line);
            if ($campo[0] != $id_del) {
                $righe[] = $line;
            }
        }
        fclose($file);

        $file = fopen("random-grades.csv", "w");
        for ($i=0; $i<count($righe); $i++) {
            fwrite($file, $righe[$i]);
        }
        fclose($file);
        echo "Valutazione cancellata!";
    }
}
?>

<form method="post" action="cancella.php">
    ID del voto da cancellare: <input type="text" name="id"><br><br>
    <input type="submit" value="Cancella">
</form>