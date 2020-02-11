<html>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;

        }

        body {
            background-color: #d1cae3;
            color: #3e4444;
            font-family: "PT Sans", sans-serif;
            font-size: 20px;
        }

        .content {
            padding: 25px 50px;
        }

        .container {
            padding: 25px 25px;
            margin: 10px 0;
            background-color: #eaece5;
        }

        p,
        span {
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="container">
            <?php
            echo "<h2>1. Odrediti koliko elemenata u nizu celih brojeva ima maksimalnu vrednost.</h2><br>";
            $niz = [5, 14, 7, 1, 10, 14, 2, 8, 14];
            $max = $niz[0];
            for ($i = 1; $i < count($niz); $i++) {
                if ($niz[$i] >= $max) {
                    $max = $niz[$i];
                }
            }
            $brojac = 0;
            foreach($niz as $element){
                if( $element == $max){
                    $brojac++;
                }
            }
            echo "<span>Niz je: </span>";
            print_r($niz);
            echo "<p>Maksimalnu vrednost ima $brojac elementa.</p>";

            ?>
        </div>
        <hr>
        <div class="container">
            <?php
            echo "<h2>2. Odrediti indeks i vrednost prvog člana niza realnih brojeva koji je najbliži srednjoj vrednosti.</h2><br>";
            $niz = [15, 8, 7, 1, 10, 14, 2, 5, 7, 3];
            $suma = 0;
            foreach ($niz as $element) {
                $suma += $element;
            }
            $SV = $suma / count($niz);

            $minRazlika = abs($niz[0] - $SV);
            $najblizi = $niz[0];
            $index = 0;
            for ($i = 1; $i < count($niz); $i++) {
                $trenutnaRazlika = abs($niz[$i] - $SV);
                if ($trenutnaRazlika <  $minRazlika) {
                    $minRazlika = $trenutnaRazlika;
                    $najblizi = $niz[$i];
                    $index = $i;
                }
            }
            echo "<span>Niz je: </span>";
            print_r($niz);
            echo "<p>Srednja vrednost elementa niza je: $SV</p>";
            echo "<p>Najblizi element je: $najblizi </p>";
            echo "<p>Njegov index je: $index </p>";

            ?>
        </div>
    </div>

    <body>

</html>