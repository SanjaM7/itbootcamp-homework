<?php

$servername = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "domaci16";

$conn = @mysqli_connect($servername, $dBUserName, $dBPassword, $dBName);

if (!$conn) {
    //die("Connection failed: ".mysqli_connect_error());
    echo "<div class='container'>";
    echo "<br>";
    echo "<h3><b>3. Dat je niz elemenata u obliku NazivPredmeta/Ocena koju student ima.Ispisati sve predmete i ocene studenta.</b></h3>";
    echo "<br>";
    $predmeti = ["matematika" => "9", "srpski" => "8", "fizika" => "10", "filozofija" => "6", "istorija" => "7", "hemija" => "10"];
    foreach ($predmeti as $predmet => $ocena) {
        echo "Predmet je: $predmet, ocena je: $ocena<br>";
    }
    echo "<b>Odrediti najveću ocenu studenta koju ima, i ispisati predmete na kojima je dobio najveću ocenu.</b><br>";
    $max = $predmeti["matematika"];
    foreach ($predmeti as $predmet => $ocena) {
        if ($ocena > $max) {
            $max = $ocena;
        }
    }
    echo "<b>Najveca ocena je: </b>$max<br>";
    echo "<b>Student ima najvecu ocenu iz sledecih predmeta: </b><br>";
    foreach ($predmeti as $predmet => $ocena) {
        if ($ocena == $max) {
            echo "$predmet<br>";
        }
    }
    echo "<b>Odrediti prosečnu ocenu studenta i ispisati predmete na kojima je dobio ocenu veću od prosečne.</b><br>";
    $suma = 0;
    foreach ($predmeti as $predmet => $ocena) {
        $suma += $ocena;
    }
    $SR = $suma / count($predmeti);
    echo "<b>Prosecna ocena je:</b> $SR<br>";
    echo "<b>Predmeti na kojima je student dobio ocenu vecu od prosecne su: </b><br>";
    foreach ($predmeti as $predmet => $ocena) {
        if ($ocena > $SR) {
            echo "$predmet<br>";
        }
    }
    echo "</div>";
}
