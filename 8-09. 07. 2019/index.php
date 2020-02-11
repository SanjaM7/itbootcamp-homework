<html>

<head>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #8ca3a3;
            color: #485460;
        }

        .img-container {
            max-width: 300px;
        }

        img {
            width: 100%;
        }

        .container {
            padding: 50px;
            margin: 20px auto;
            background-color: #f1f1f1;
            border-radius: 4px;
            max-width: 600px;
        }

        .input-container {
            max-width: 200px;
            display: inline-block;
        }

        input[type=number],
        input[type=text] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 10px 0;
        }

        button {
            background-color: #bc5a45;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 0;
        }

        .font {
            font-size: 20px;
            font-weight: bold;
            color: #c1502e;
        }
    </style>
</head>

<body>
    <div>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <h2>Odredjivanje agregatnog stanja vode</h2>
                <label>Unesite temperaturu: </label>
                <div class="input-container">
                    <input name="temperature" type="number" step="any">
                </div>
                <button type="submit">Odredi</button>

                <?php
                if (!isset($_POST['temperature']) || $_POST['temperature'] == '') {
                    $temperature = null;
                } else {
                    $temperature = $_POST['temperature'];
                    if ($temperature >= 100) {
                        echo "<p class='font'>Voda kljuca.</p>";
                    } elseif ($temperature <= 0) {
                        echo "<p class='font'>Voda se ledi.</p>";
                    } else {
                        echo "<p class='font'>Voda je u tecnom stanju.</p>";
                    }
                }
                ?>
            </form>
        </div>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <h2>Saznajte karakteristike vaseg tipa licnosti</h2>
                <label>Unesite jedan od sledecih tipova licnosti: </label>
                <p>(sangvinik / melanholik / flegmatik / kolerik)</p>
                <div class="input-container">
                    <input name="tipLicnosti" type="text">
                </div>
                <button type="submit">Unesi</button>

                <?php
                if (!isset($_POST['tipLicnosti']) || $_POST['tipLicnosti'] == '') {
                    $tipLicnosti = null;
                } else {
                    $tipLicnosti = $_POST['tipLicnosti'];
                    $sangvinik = "images/Sanguine.png";
                    $melanholik = "images/Melancholy.png";
                    $flegmatik = "images/Phlegmatic.png";
                    $kolerik = "images/Choleric.png";
                    if ($tipLicnosti == "sangvinik") {
                        echo "<div class='img-container'><img src='$sangvinik'></div>";
                    } elseif ($tipLicnosti == "melanholik") {
                        echo "<div class='img-container'><img src='$melanholik'></div>";
                    } elseif ($tipLicnosti == "flegmatik") {
                        echo "<div class='img-container'><img src='$flegmatik'></div>";
                    } elseif ($tipLicnosti == "kolerik") {
                        echo "<div class='img-container'><img src='$kolerik'></div>";
                    } else {
                        echo "<p class='font'>Unesite jedan od ponudjenih tipova licnosti</p>";
                    }
                } ?>
            </form>
        </div>
        <div class="container">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <h2>Da li zadovoljavate dnevni unos kalorija</h2>
                <label>Unesite broj kalorija (kcal): </label>
                <div class="input-container">
                    <input name="kcal" type="number" step="any">
                </div>
                <button type="submit">Unesi</button>

                <?php
                if (!isset($_POST['kcal']) || $_POST['kcal'] == '') {
                    $kcal = null;
                } else {
                    $kcal = $_POST['kcal'];
                    $kJ = 4.1868 * $kcal;
                    if ($kJ < 2000) {
                        echo "<p class='font'>Povećajte dnevni unos.</p>";
                    } elseif ($kJ > 4000) {
                        echo "<p class='font'>Smanjite dnevni unos.</p>";
                    } else {
                        echo "<p class='font'>Dnevni unos je u redu.</p>";
                    }
                } ?>
            </form>
        </div>
    </div>



</body>

</html>