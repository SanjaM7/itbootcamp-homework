
<?php require_once "../header.php"; ?>

<div class="container padding-25">

<?php
    $id = 4;

    $query = "SELECT k.id as id, p.ime as ime, p.prezime as prezime, p.pol as pol, k.username as username
FROM korisnici as k
INNER JOIN profili as p
ON k.id = p.korisnik_id 
WHERE NOT k.id = $id;";

    $result = $conn->query($query);
    if (!$result) {
        echo "Greska: " . $conn->error;
        return;
    }
    if ($result->num_rows == 0) {
        echo "Nemate korisnike u bazi";
        return;
    }
    echo "<table class='table table-hover'>";
    echo " <thead><tr>";
    echo "<th scope='col'>Ime</th>";
    echo "<th scope='col'>Prezime</th>";
    echo "<th scope='col'>Pol</th>";
    echo "<th scope='col'>Korisnicko ime</th>";
    echo "<th scope='col'>Svojstvo</th>";
    echo "<th scope='col'>Akcija</th>";
    echo "</tr></thead>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr class='table-light'>";
        echo "<td scope='row'>" . $row["ime"] . "</td>";
        echo "<td scope='row'>" . $row["prezime"] . "</td>";
        echo "<td scope='row'>" . $row["pol"] . "</td>";
        echo "<td scope='row'>" . $row["username"] . "</td>";
        $pid = $row["id"];

        $query1 = "SELECT * FROM prijatelji WHERE korisnik_id = $id AND prijatelj_id = $pid";
        $result1 = $conn->query($query1);
        $jatebe = $result1->num_rows;

        $query2 = "SELECT * FROM prijatelji WHERE korisnik_id = $pid AND prijatelj_id = $id";
        $result2 = $conn->query($query2);
        $timene = $result2->num_rows;

        if($jatebe + $timene > 1){
            echo "<td>Uzajamni prijatelji</td>";
        }
        elseif($jatebe){
            echo "<td>Pratim korisnika</td>";
        }
        elseif($timene){
            echo "<td>Korisnik me prati</td>";
        }
        else {
            echo "<td>Nema konekcije</td>";
        }
        echo "<td>";
        if(!$jatebe){
        echo "<a href='dm_dodaj.php?dodaj=$pid'> Prati korisnika</a>";
        }       
        elseif($jatebe){
            echo "<a href='dm_otprati.php?dodaj=$pid'> Brisi pracenje</a>";
            }    
        echo "</td>";
    }
    echo "</table>";
    ?>

</div>

<?php require_once "../footer.php"; ?>