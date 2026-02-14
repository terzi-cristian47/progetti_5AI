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
$sql = "SELECT a.id, a.nome, a.cognome FROM autore a 
        WHERE a.id NOT IN (
            SELECT l.id_autore FROM libro l 
            JOIN librogenere lg ON l.ISBN = lg.idLibro 
            JOIN genere g ON lg.idGenere = g.ID 
            WHERE g.nome = 'Fantascienza'
        )";

$result = $cn->query($sql);

if ($result) {
    echo "<b>Autori NO Fantascienza:</b><br>";
    while ($row = $result->fetch_array()) {
        echo $row['nome'] . " " . $row['cognome'] . "<br>";
    }
}
?>

