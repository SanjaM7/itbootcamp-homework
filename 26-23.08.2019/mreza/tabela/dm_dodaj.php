
<?php require_once "../db.php"; ?>

<?php

$id = 4;

if (!isset($_GET["dodaj"])) {
    header("Location: dm_prijatelji_tabela.php");
}
$pid = $conn->real_escape_string($_GET["dodaj"]);
$query = "SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
$result = $conn->query($query);
if ($result->num_rows == 0) {
    $query1 = "INSERT INTO prijatelji (korisnik_id, prijatelj_id) VALUES ($id, $pid)";
    $conn->query($query1);
}
header("Location: dm_prijatelji_tabela.php");

?>