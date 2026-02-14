<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$database = "libreria";


$cn = new mysqli($hostname, $username, $password, $database); 

if ($cn->connect_errno) {
    echo "Connessione al database fallita, la causa è: " . $cn->connect_error; 
    exit(); 
}
?>


<?php
$sql = "SELECT DISTINCT a.Nome, a.Cognome
        FROM autore a, libro l, editore e
        WHERE a.ID=l.id_autore AND l.idEditore=e.ID 
        AND a.id_nazione=e.nazione";

$result = $cn->query($sql);

if ($result) {
    echo "<b>Autori stessa nazione editore:</b><br>";
    while ($row = $result->fetch_array()) {
        echo $row['Nome'] . " " . $row['Cognome'] . "<br>";
    }
}
?>