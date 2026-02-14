<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "libreria";

$cn = new mysqli($hostname, $username, $password, $database);

if ($cn->connect_errno) {
    die("Connessione fallita: " . $cn->connect_error);
}

$sql = "SELECT u.Nome, u.Cognome, c.Numero_copia, sc.nome as scaffale, 
        ar.nome as armadio, st.nome as stanza, l.Titolo, 
        a.nome as autore, e.nome as editore, n.nome as nazione
        FROM utente u 
        JOIN prestito p ON u.c_f=p.c_f 
        JOIN copia c ON p.Num_copia=c.Numero_copia 
        JOIN libro l ON c.ISBN_LIBRO=l.ISBN
        JOIN autore a ON l.id_autore=a.ID
        JOIN editore e ON e.ID=l.idEditore
        JOIN scaffale sc ON c.Num_scaffale=sc.Num
        JOIN armadio ar ON sc.ID_Armadio=ar.ID
        JOIN stanza st ON ar.num_stanza=st.ID
        JOIN nazione n ON e.nazione=n.ID";

$result = $cn->query($sql);

if ($result) {
    // MODIFICA QUI: Ho tolto border='1'
    echo "<table>"; 
    echo "<tr><th>Utente</th><th>Libro</th><th>Posizione</th></tr>";
    
    while ($row = $result->fetch_array()) {
        echo "<tr>";
        echo "<td>" . $row['Nome'] . " " . $row['Cognome'] . "</td>";
        echo "<td>" . $row['Titolo'] . "</td>";
        echo "<td>" . $row['stanza'] . " (" . $row['scaffale'] . ")</td>";
        echo "</tr>";
    }
    echo "</table>";
}

$cn->close();
?>