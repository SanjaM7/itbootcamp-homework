<?php require_once "header.php"; ?>

<?php

if (!empty($_POST)) {
    $ime = $conn->real_escape_string($_POST["ime"]);
    $prezime = $conn->real_escape_string($_POST["prezime"]);
    $pol = $conn->real_escape_string($_POST["pol"]);

    if ($ime == " " || empty($ime)) {
        echo "Morate uneti ime";
    }
    echo "Zdravo " . $ime . " " . $prezime . " " . $pol;

    $id = 6;
    $query = "INSERT INTO profili (korisnik_id, ime, prezime, pol) 
    VALUES ('$id', '$ime', '$prezime', '$pol')";
    $conn->query($query);
}
?>

<div class="container padding-25">
    <div class="col-lg-6">
        <div class="jumbotron text-center">
            <form action="forma_tabela.php" method="POST">
                Ime:
                <input type="text" name="ime"><br><br>
                Prezime:
                <input type="text" name="prezime"><br><br>
                Pol:<br><br>
                Zenski <input type="radio" name="pol" value="Z"><br>
                Muski <input type="radio" name="pol" value="M"><br>
                Ostalo <input type="radio" name="pol" value="O" checked><br><br>
                <input type="submit" value="Potvrdi">
            </form>
        </div>
    </div>
    <div class="col-lg-6">
    </div>
</div>

<?php require_once "footer.php"; ?>