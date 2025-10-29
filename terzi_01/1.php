<?php

if(isset($_REQUEST["testo"])){
    $testo=$_REQUEST["testo"];
}
if(isset($_REQUEST["scelta"])) {
    $scelta = $_REQUEST["scelta"];


    if ($scelta == "contaparole") {
        $contp = 0;

        $parole = array();
        $separatore = "";


        $parola = explode(" ", $testo);
        for ($i = 0; $i < count($parola); $i++) {
            $parole[$i] = $parola;
            $contp++;


        }


        echo "il numero di parole è " . $contp;
    }
    if ($scelta == "contacaratteri") {


        echo strlen($testo);



    }


}

?>





<html>
<head>
</head>

<body>

<h>è il mio programma  </h>
<p>inserire </p>
</body>
<form method="get" action="1.php">

    <input type="radio" id="contacaratteri" name="scelta" value="contacaratteri">
    <label for="contacaratteri">  inserisci conta caratteri  </label> <br><br>

    <input type="radio" id="contaparole" name="scelta" value="contaparole">
    <label for="contaparole"> inserisci conta parole   </label> <br><br>

    <label for="testo"> inserisci testo</label>
    <input type="text" name="testo"> <br><br>

    <input type="submit" value="clicca">

</form>
</html>


