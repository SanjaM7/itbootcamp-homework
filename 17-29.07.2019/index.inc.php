<?php

$servername = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "itbootcamp";

$conn = @mysqli_connect($servername, $dBUserName, $dBPassword, $dBName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($conn) {
    $ime = $prezime = $godine = $prosecnaOcena = '';
    $imeGreska = $prezimeGreska = $godineGreska =  $prosecnaOcenaGreska = '';
    if (isset($_GET['dodaj'])) {

        if (empty($_GET["ime"])) {
            $imeGreska = "Ime je obavezno!";
        } elseif (!preg_match("/^[a-zA-Z\\s]*$/", $_GET["ime"])) {
            $imeGreska = "Ime moze da sadrzi samo slova";
        } else {
            $ime = $_GET['ime'];
        }
        if (empty($_GET["prezime"])) {
            $prezimeGreska = "Prezime je obavezno!";
        } elseif (!preg_match("/^[a-zA-Z\\s]*$/", $_GET["prezime"])) {
            $prezimeGreska = "Prezime moze da sadrzi samo slova";
        } else {
            $prezime = $_GET['prezime'];
        }

        if (empty($_GET["godine"])) {
            $godineGreska = "Godine su obavezne!";
        } elseif (!preg_match("/^[1-9\\s-]*$/", $_GET["godine"])) {
            $godineGreska = "Godine mogu da sadrze samo brojeve";
        } elseif ($_GET["godine"] < 0 || $_GET["godine"] > 150){
            $godineGreska = "Godine moraju da budu od 0 do 150";
        } else {
            $godine = $_GET['godine'];
        }

        if (empty($_GET["prosecnaOcena"])) {
            $prosecnaOcenaGreska = "Prosecna ocena je obavezna!";
        } elseif (!preg_match("/^[0-9\\.-]*$/", $_GET["prosecnaOcena"])) {
            $prosecnaOcenaGreska = "Prosecna ocena moze da sadrzi samo brojeve i .";
        } elseif ($_GET["prosecnaOcena"] < 0 || $_GET["prosecnaOcena"] > 10 ){
            $prosecnaOcenaGreska = "Prosecna ocena mora da bude od 0 do 10";
        } else {
            $prosecnaOcena = $_GET['prosecnaOcena'];
        }

        if (!empty($ime) && !empty($prezime) && !empty($godine) && !empty($prosecnaOcena)) {
            $sql = "INSERT INTO studenti (ime, prezime, godine, prosecnaOcena) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: index.php?greska=sqlgreska");
                $greska = mysqli_error($conn);
                exit();
            }

            mysqli_stmt_bind_param($stmt, "ssss", $ime, $prezime, $godine, $prosecnaOcena);
            mysqli_stmt_execute($stmt);

        }
    }
    function studenti()
    {
        $conn = @mysqli_connect("localhost", "root", "", "itbootcamp");
        $sql = "SELECT * FROM studenti";
        if ($result = mysqli_query($conn, $sql)) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
            mysqli_free_result($result);
        } else {
            $greska = mysqli_error($conn);
            return $greska;
        }
    }
    if (isset($_POST['ponisti'])) {
        $ponisti_id = $_POST['ponisti_id'];
        $sql = "DELETE FROM studenti WHERE id = $ponisti_id";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $greska = mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
