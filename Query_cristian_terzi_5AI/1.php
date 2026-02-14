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

$sql = "SELECT g.nome, a.nome, l.Titolo
        FROM autore a, libro l, librogenere lg, genere g
        WHERE a.ID=l.id_autore AND l.ISBN=lg.idLibro 
        AND lg.idGenere=g.ID AND a.cognome = ?";

$stmt = $cn->prepare($sql); 
$autore = 'Manzoni';

$stmt->bind_param('s', $autore);
$stmt->execute();               
$result = $stmt->get_result();   

while ($row = $result->fetch_array()) { 
    echo "Genere: " . $row['nome'] . "  Titolo: " . $row['Titolo'] . "<br>";
}
$stmt->close();
?>