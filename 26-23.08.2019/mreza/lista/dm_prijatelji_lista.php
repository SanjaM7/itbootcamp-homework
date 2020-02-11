<?php require_once "../header.php"; ?>

<?php

$id = 4;

// if(!empty($_GET['id']))
if (isset($_GET['id'])) {
    $pid = $conn->real_escape_string($_GET['id']);
    // $id = logovan korisnik (koji salje zahtev)
    // $pid - korisnik kome se salje zahtev
    // provera nema li vec prijateljstvo
    $sql = "SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql1 = "INSERT INTO prijatelji (korisnik_id, prijatelj_id) VALUES ($id, $pid)";
        $conn->query($sql1);
    }
}

?>
    <div class="container padding-25">
    <?php
    $sql = "SELECT k.id AS id, k.username AS username, p.ime AS ime, p.prezime AS prezime, p.pol AS pol
    FROM korisnici AS k 
    INNER JOIN profili AS p 
    ON k.id = p.korisnik_id
    WHERE k.id != $id
    ORDER BY p.ime, p.prezime
    ";
    $result = $conn->query($sql);
    if (!$result) {
        echo "<p>Greska! Razlog: ";
        echo $conn->error;
        echo "</p>";
    } else {
        if ($result->num_rows == 0) {
            echo "<p>Nemate nijednog korisnika u mrezi: </p>";
        } else {
            echo "<p>Korisnici: </p>";
            echo "<ul class='list-group'>";
            while ($row = $result->fetch_assoc()) {
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                echo $row["ime"];
                echo " ";
                echo $row["prezime"];
                if ($row["pol"] == "Z") {
                    echo "<span style='color:red'>";
                    echo " (".$row["username"].") ";
                    echo "</span>";
                } elseif ($row["pol"] == "M") {
                    echo "<span style='color:blue'>";
                    echo " (".$row["username"].") ";
                    echo "</span>";
                }
                $pid = $row["id"];
                $sql1 = "SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
                $result1 = $conn->query($sql1);
                $jatebe = $result1->num_rows; // 0 ili 1

                $sql2 = "SELECT * FROM prijatelji WHERE korisnik_id = $pid AND prijatelj_id = $id";
                $result2 = $conn->query($sql2);
                $timene = $result2->num_rows; // 0 ili 1

                if ($jatebe + $timene > 1) {
                    echo " uzajamni prijatelji ";
                } elseif ($jatebe) {
                    echo " pratim korisnika ";
                } elseif ($timene) {
                    echo " korisnik mene prati ";
                } else {
                    echo "<td>nema konekcije</td>";
                }

                if (!$jatebe) {
                    echo "<a href='dm_prijatelji_lista.php?id=$pid'>";
                    echo " Prati korisnika";
                    echo "</a>";
                } elseif ($jatebe) {
                    echo "<a href='dm_brisi.php?brisi=$pid'>";
                    echo " Brisi pracenje";
                    echo "</a>";
                }
                echo "</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</div>

<?php require_once "../footer.php"; ?>