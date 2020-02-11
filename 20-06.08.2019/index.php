<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "videoteka";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Neuspela konekcija. Razlog: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="list_table.css">
</head>

<body>
    <?php

    echo "<h3><b>1.	Tabelarno prikazati sve informacije o svim filmovima iz tabele filmovi, abecedno po nazivu filma.</b></h3>";
    $sql = 'SELECT * FROM filmovi ORDER BY naslov;';
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Upit nije uspesno izvrsen") . "</body></html>";
    }
    if (mysqli_num_rows($result) == 0) {
        die("Ne postoje filmovi u bazi") . "</body></html>";
    }
    echo "<table>";
    echo "<tr>";
    echo "<th>NASLOV</th>";
    echo "<th>REZISER</th>";
    echo "<th>GOD_IZDAVANJA</th>";
    echo "<th>ZANR</th>";
    echo "<th>OCENA</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['naslov'] . "</td>";
        echo "<td>" . $row['reziser'] . "</td>";
        echo "<td>" . $row['god_izdavanja'] . "</td>";
        echo "<td>" . $row['zanr'] . "</td>";
        echo "<td>" . $row['ocena'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<h3><b>2.	Tabelarno prikazati sve informacije o najbolje rangiranim filovima, abecedno po nazivu filma.</b></h3>";
    $sql = 'SELECT * FROM filmovi WHERE ocena = (SELECT MAX(ocena) FROM filmovi) ORDER BY naslov;';
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Upit nije uspesno izvrsen") . "</body></html>";
    }
    if (mysqli_num_rows($result) == 0) {
        die("Ne postoje filmovi u bazi") . "</body></html>";
    }
    echo "<table>";
    echo "<tr>";
    echo "<th>NASLOV</th>";
    echo "<th>REZISER</th>";
    echo "<th>GOD_IZDAVANJA</th>";
    echo "<th>ZANR</th>";
    echo "<th>OCENA</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['naslov'] . "</td>";
        echo "<td>" . $row['reziser'] . "</td>";
        echo "<td>" . $row['god_izdavanja'] . "</td>";
        echo "<td>" . $row['zanr'] . "</td>";
        echo "<td>" . $row['ocena'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";

    echo "<h3><b>3. Za svaki žanr koji postoji u bazi prikazati po jednu tabelu, a u svakoj tabeli informacije o filmovima koji pripadaju tom žanru, abecedno po nazivu filma.</b></h3>";
    $sql = "SELECT DISTINCT zanr FROM filmovi";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Upit nije uspesno izvrsen") . "</body></html>";
    }
    if (mysqli_num_rows($result) == 0) {
        die("Nema zanrova u tabeli filmovi") . "</body></html>";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $zanr = $row['zanr'];
        $sql1 = "SELECT * FROM filmovi WHERE zanr='$zanr' ORDER BY naslov;";
        $result1 = mysqli_query($conn, $sql1);
        if (!$result1) {
            die("Upit nije uspesno izvrsen") . "</body></html>";
        }
        echo "<h4>Filmovi koji pripaju zanru: " . $zanr . "</h4>";
        echo "<table>";
        echo "<tr>";
        echo "<th>NASLOV</th>";
        echo "<th>REZISER</th>";
        echo "<th>GOD_IZDAVANJA</th>";
        echo "<th>ZANR</th>";
        echo "<th>OCENA</th>";
        echo "</tr>";
        while ($row1 = mysqli_fetch_assoc($result1)) {
            echo "<tr>";
            echo "<td>" . $row1['naslov'] . "</td>";
            echo "<td>" . $row1['reziser'] . "</td>";
            echo "<td>" . $row1['god_izdavanja'] . "</td>";
            echo "<td>" . $row1['zanr'] . "</td>";
            echo "<td>" . $row1['ocena'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    ?>
</body>

</html>