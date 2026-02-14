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
$sql = "SELECT l.Titolo
        FROM libro l, editore e, nazione n
        WHERE l.idEditore=e.ID AND e.nazione=n.ID AND n.nome='Italia'";

$result = $cn->query($sql);

if ($result) {
    echo "<b>Libri Editori Italiani:</b><br>";
    while ($row = $result->fetch_array()) {
        echo $row['Titolo'] . "<br>";
    }
}
?>