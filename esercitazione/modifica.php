<?php
if (isset($_POST["id"]) && isset($_POST["voto"])) {
    $id_mod = $_POST["id"];
    $voto_mod = $_POST["voto"];

    $file = fopen("random-grades.csv", "r");
    $righe = [];
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $campo = explode(",", $line);
            if ($campo[0] == $id_mod) {
                $campo[5] = $voto_mod;
                $line = $campo[0].','.$campo[1].','.$campo[2].','.$campo[3].','.$campo[4].','.$campo[5]."\n";
            }
            $righe[] = $line;
        }
        fclose($file);

        $file = fopen("random-grades.csv", "w");
        for ($i=0; $i<count($righe); $i++) {
            fwrite($file, $righe[$i]);
        }
        fclose($file);
        echo "Valutazione modificata!";
    }
}
?>

<form method="post" action="modifica.php">
    ID del voto da modificare: <input type="text" name="id"><br>
    Nuovo voto: <input type="text" name="voto"><br><br>
    <input type="submit" value="Modifica">
</form>