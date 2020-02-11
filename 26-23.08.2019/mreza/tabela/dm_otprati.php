<?php require_once "../db.php"; ?>

<?php

$id = 4;

if (!isset($_GET["dodaj"])) {
    header("Location: dm_prijatelji_tabela.php");
}
$pid = $conn->real_escape_string($_GET["dodaj"]);
$query1 = "DELETE FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
$result = $conn->query($query1);
header("Location: dm_prijatelji_tabela.php");
