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
$sql = "SELECT DISTINCT u.Cognome, p.Data_prestito, c.Numero_copia, l.Titolo
        FROM utente u, prestito p, copia c, libro l
        WHERE u.c_f=p.c_f AND p.Num_copia=c.Numero_copia 
        AND c.ISBN_LIBRO=l.ISBN AND u.Cognome = ?
        ORDER BY u.Cognome";

$stmt = $cn->prepare($sql);
$cognome = 'Bianchi'; // Valore XXX

$stmt->bind_param('s', $cognome);
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_array()) {
    echo "Utente: " . $row['Cognome'] . "  " . " Libro: " . $row['Titolo'] . "<br>";
}
$stmt->close();
?>