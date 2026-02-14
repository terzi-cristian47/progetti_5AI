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
$sql = "SELECT a.Nome, a.Cognome
        FROM autore a, libro l, librogenere lg, genere g
        WHERE a.ID=l.id_autore AND l.ISBN=lg.idLibro 
        AND lg.idGenere=g.ID AND g.nome = 'Fantascienza'
        GROUP BY a.ID, a.Nome, a.Cognome
        HAVING COUNT(l.ISBN) >= 2";

$result = $cn->query($sql);

if ($result) {
    echo "<b>Autori Fantascienza (>1 libro):</b><br>";
    while ($row = $result->fetch_array()) {
        echo $row['Nome'] . " " . $row['Cognome'] . "<br>";
    }
}
?>