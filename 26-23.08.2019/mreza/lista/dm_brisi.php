<?php require_once "../db.php"; ?>

<?php

$id = 4;

if (isset($_GET["brisi"])) {
    header("Location: dm_prijatelji_lista.php");

    $pid = $conn->real_escape_string($_GET["brisi"]);
    $query = "SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $query1 = "DELETE FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
        $result = $conn->query($query1);    
    }
    header("Location: dm_prijatelji_lista.php");
}
