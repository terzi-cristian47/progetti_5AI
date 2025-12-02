<?php
session_start();

// Nome del gioco
echo "<h1>Sminatore Matematico Base</h1>";

// Numeri fissi
$array = [30, 35, 60, 13, 5, 77];

// Inizializza mosse
if (!isset($_SESSION['mosse'])) {
    $_SESSION['mosse'] = 0;
}

// Input utente
$scelta = $_GET['scelta'] ?? null;
$n = isset($_GET['n']) ? (int)$_GET['n'] : 0;

// Mostra numeri iniziali
echo "<h3>Numeri iniziali:</h3>";
echo implode(", ", $array) . "<br><br>";

// Azione: cancella divisibili
if ($scelta === "cancellato" && $n > 0) {
    echo "<h3>Numeri non divisibili per $n:</h3>";
    $nuovoArray = [];
    foreach ($array as $val) {
        if ($val % $n !== 0) {
            echo "$val ";
            $nuovoArray[] = $val;
        }
    }
    $_SESSION['mosse']++;
    echo "<br><br>✅ Mossa effettuata. Mosse totali: " . $_SESSION['mosse'];
}

// Azione: nuova partita
elseif ($scelta === "nuovi") {
    $_SESSION['mosse'] = 0;
    echo "<h3>Nuova partita con numeri fissi:</h3>";
    echo implode(", ", $array);
}

// Nessuna scelta valida
elseif ($scelta !== null) {
    echo "<br> Inserisci un numero valido per cancellare.";
}
?>

<hr>
<form method="get" action="sminatore.php">
    <label for="nd">Inserisci un numero:</label>
    <input type="number" name="n" id="nd"> <br><br>

    <input type="radio" name="scelta" id="cancellato" value="cancellato">
    <label for="cancellato">Cancella divisibili</label><br><br>

    <input type="radio" name="scelta" id="nuovi" value="nuovi">
    <label for="nuovi">Nuova partita</label><br><br>

    <button type="submit">Invia</button>
</form>

<p><strong>Mosse effettuate:</strong> <?php echo $_SESSION['mosse']; ?></p>