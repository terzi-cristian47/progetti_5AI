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
$sql = "SELECT l.Titolo, c.Numero_copia
        FROM libro l, copia c, scaffale s, armadio a, stanza st
        WHERE l.ISBN=c.ISBN_LIBRO AND c.Num_scaffale=s.Num 
        AND s.ID_Armadio=a.ID AND a.num_stanza=st.ID AND st.nome = ?";

$stmt = $cn->prepare($sql);
$stanza = 'archivio'; 

$stmt->bind_param('s', $stanza);
$stmt->execute();
$result = $stmt->get_result();

echo "<b>Libri in stanza '$stanza':</b><br>";
while ($row = $result->fetch_array()) {
    echo $row['Titolo'] . " (Copia: " . $row['Numero_copia'] . ")<br>";
}
$stmt->close();
?>