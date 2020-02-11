<html>

<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
    <style>
        .grid-row:before,
        .grid-row:after {
            content: "";
            clear: both;
            display: table;
        }

        .grid-col {
            float: left;
            width: 100%;
        }

        /*desktop*/
        @media (min-width:993px) {
            .grid-col.l4 {
                width: 33.33333%
            }

            .grid-col.l8 {
                width: 66.66666%
            }
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: "Open Sans", sans-serif;
            background-color: #b1cbbb;;
            color: #034f84;
        }

        .container {
            padding: 50px;
            margin: 20px auto;
            background-color: #deeaee;
            border-radius: 4px;
            max-width: 800px;
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

        .flex-container {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            flex-wrap: wrap;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="index.php" method="POST">
            <h3><b>1. Za tri uneta broja ispisati koji od njih je najveći, koji od njih je srednji, a koji od nih je najmanji.</b></h3>
            <div class="grid-row flex-container">
                <div class="grid-col l4">
                    <label>Unesite prvi broj: </label>
                </div>
                <div class="grid-col l8">
                    <div class="input-container">
                        <input name="broj1" type="number" required>
                    </div>
                </div>
            </div>
            <div class="grid-row flex-container">
                <div class="grid-col l4">
                    <label>Unesite drugi broj: </label>
                </div>
                <div class="grid-col l8">
                    <div class="input-container">
                        <input name="broj2" type="number" required>
                    </div>
                </div>
            </div>
            <div class="grid-row flex-container">
                <div class="grid-col l4">
                    <label>Unesite treci broj: </label>
                </div>
                <div class="grid-col l8">
                    <div class="input-container">
                        <input name="broj3" type="number" required>
                    </div>
                </div>
            </div>
            <button type="submit">Odredi</button>

            <?php
            if (
                !isset($_POST['broj1']) || !isset($_POST['broj2']) || !isset($_POST['broj3'])
                || $_POST['broj1'] == '' || $_POST['broj2'] == '' || $_POST['broj3'] == ''
            ) {
                $broj1 = null;
                $broj2 = null;
                $broj3 = null;
            } else {
                $broj1 = $_POST['broj1'];
                $broj2 = $_POST['broj2'];
                $broj3 = $_POST['broj3'];
                $max = $broj1;
                if ($broj2 > $max) {
                    $max = $broj2;
                }
                if ($broj3 > $max) {
                    $max = $broj3;
                }
                $min = $broj1;
                if ($broj2 < $min) {
                    $min = $broj2;
                }
                if ($broj3 < $min) {
                    $min = $broj3;
                }
                $mid = ($broj1 + $broj2 + $broj3) - $max - $min;

                echo "<p class='font'>Najveci broj je $max, srednji broj je $mid, najmanji broj je $min.</p>";
            }
            ?>
        </form>
    </div>

    <div class="container">
        <form action="index.php" method="POST">
            <h3><b>2. Učitati dva cela broja i ispitati da li je veći od njih paran.</b></h3>
            <div class="grid-row flex-container">
                <div class="grid-col l4">
                    <label>Unesite prvi broj: </label>
                </div>
                <div class="grid-col l8">
                    <div class="input-container">
                        <input name="num1" type="number" required>
                    </div>
                </div>
            </div>
            <div class="grid-row flex-container">
                <div class="grid-col l4">
                    <label>Unesite drugi broj: </label>
                </div>
                <div class="grid-col l8">
                    <div class="input-container">
                        <input name="num2" type="number" required>
                    </div>
                </div>
            </div>
            <button type="submit">Odredi</button>


            <?php
            if (
                !isset($_POST['num1']) || !isset($_POST['num2'])
                || $_POST['num1'] == '' || $_POST['num2'] == ''
            ) {
                $num1 = null;
                $num2 = null;
            } else {
                $num1 = $_POST['num1'];
                $num2 = $_POST['num2'];
                if ($num1 > $num2 && $num1 % 2 == 0 || $num2 > $num1 && $num2 % 2 == 0) {
                    echo "<p class='font'>Veci broj je paran</p>";
                } elseif ($num1 == $num2) {
                    echo "<p class='font'>Brojevi su jednaki. </p>";
                } else {
                    echo "<p class='font'>Veci broj nije paran</p>";
                }
            }
            ?>
        </form>
    </div>
    <div class="container">
        <h3><b>3. Jedan butik ima radno vreme od 9h do 20h radnim danima, a vikendom od 10h do 18h.
                Preuzeti dan i vreme sa računara i ispitati da li je butik trenutno otvoren.</b></h3>
        <?php
        $vreme = date("G");
        $dan = date("N");
        if ($dan <= 5 && $vreme >= 9 && $vreme <= 20 || $dan > 5 && $vreme >= 10 && $vreme <= 18) {
            echo "<p class='font'>Butik je otvoren. </p>";
        } else {
            echo "<p class='font'>Butik je zatvoren. </p>";
        }
        ?>
    </div>

    <div class="container">
        <h3><b>4. Na osnovu unete boje na engleskom jeziku obojiti tekst
                paragrafa u crveno, zeleno ili plavo. Ukoliko nije uneta
                ni jedna od ove tri boje, tekst paragrafa obojiti u žuto.</b></h3>
        <form action="index.php" method="POST">
            <div class="grid-row flex-container">
                <div class="grid-col l4">
                    <label>Unesite jednu od sledecih boja: </label>
                    <p>(red / green / blue)</p>
                </div>
                <div class="grid-col l8">
                    <div class="input-container">
                        <input name="color" type="text" required>
                    </div>
                </div>
            </div>
            <button type="submit">Odredi</button>
        </form>
        <?php

        if (!isset($_POST['color']) || $_POST['color'] == '') {
            $color = null;
        } else {
            $color = $_POST['color'];
            switch ($color) {
                case "red":
                    echo "<p style='color: red'>Odabrali ste crvenu boju.</p>";
                    break;

                case "blue":
                    echo "<p style='color: blue'>Odabrali ste plavu boju.</p>";
                    break;

                case "green":
                    echo "<p style='color: green'>Odabrali ste zelenu boju.</p>";
                    break;

                default:
                    echo "<p style='color: yellow'>Niste odabrali crvenu, plavu ili zelenu boju.</p>";
            }
        }
        ?>
    </div>
</body>
<html>