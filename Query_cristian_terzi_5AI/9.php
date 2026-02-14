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
$sql = "SELECT u.Nome, u.Cognome
        FROM utente u, prestito p, copia c, libro l
        WHERE u.c_f=p.c_f AND p.Num_copia=c.Numero_copia 
        AND c.ISBN_LIBRO=l.ISBN AND l.Titolo = ?";

$stmt = $cn->prepare($sql);
$titolo = 'I promessi sposi'; 

$stmt->bind_param('s', $titolo);
$stmt->execute();
$result = $stmt->get_result();

echo "<b>Utenti che hanno letto '$titolo':</b><br>";
while ($row = $result->fetch_array()) {
    echo $row['Nome'] . " " . $row['Cognome'] . "<br>";
}
$stmt->close();
?>