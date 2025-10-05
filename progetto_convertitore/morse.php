<!DOCTYPE html>
<html>
<head>
    <title>traduttore morse</title>
</head>
<body>

<form method="get" action="morse.php">
    <input type="text" name="text">
    <input type="submit" value="inserisci testo">
    <br>
</form>

</body>
</html>

<?php

$text = $_GET["text"];
$textM = strtoupper($text);

$testomorse = array(
        'A' => '.-',    'B' => '-...',  'C' => '-.-.',
        'D' => '-..',   'E' => '.',     'F' => '..-.',
        'G' => '--.',   'H' => '....',  'I' => '..',
        'J' => '.---',  'K' => '-.-',   'L' => '.-..',
        'M' => '--',    'N' => '-.',    'O' => '---',
        'P' => '.--.',  'Q' => '--.-',  'R' => '.-.',
        'S' => '...',   'T' => '-',     'U' => '..-',
        'V' => '...-',  'W' => '.--',   'X' => '-..-',
        'Y' => '-.--',  'Z' => '--..',  ' ' => '/'
);

$morsetesto = array(
        '.-'    => 'A', '-...'  => 'B', '-.-.' => 'C',
        '-..'   => 'D', '.'     => 'E', '..-.' => 'F',
        '--.'   => 'G', '....'  => 'H', '..'   => 'I',
        '.---'  => 'J', '-.-'   => 'K', '.-..' => 'L',
        '--'    => 'M', '-.'    => 'N', '---'  => 'O',
        '.--.'  => 'P', '--.-'  => 'Q', '.-.'  => 'R',
        '...'   => 'S', '-'     => 'T', '..-'  => 'U',
        '...-'  => 'V', '.--'   => 'W', '-..-' => 'X',
        '-.--'  => 'Y', '--..'  => 'Z', '/'    => ' '
);


for ($i = 0; $i < strlen($textM); $i++) {
    if (isset($testomorse[$textM[$i]])) {
        echo $testomorse[$textM[$i]] . " ";
    }
}

echo "<br><br>";


$morseArray = explode(" ", $text);
for ($i = 0; $i < count($morseArray); $i++) {
    if (isset($morsetesto[$morseArray[$i]])) {
        echo $morsetesto[$morseArray[$i]];
    }
}

?>

<a href="morse.php">torna indietro</a>
