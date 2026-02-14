<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "libreria";

$cn = new mysqli($hostname, $username, $password, $database);

if ($cn->connect_errno) {
    die("Connessione fallita: " . $cn->connect_error);
}


$sql = "SELECT * FROM prestito p WHERE p.Data_prestito BETWEEN ? AND ?";

$stmt = $cn->prepare($sql);

$data_inizio = '2025-01-01'; 
$data_fine = '2025-01-10';   

$stmt->bind_param('ss', $data_inizio, $data_fine); 
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_array()) {
    echo "Prestito del: " . $row['Data_prestito'] . "<br>";
}

$stmt->close();
?>