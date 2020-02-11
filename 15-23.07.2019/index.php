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
            background-color: #ddeedd;
            color: #3b3a30;
            font-family: "PT Sans", sans-serif;
            font-size: 20px;
        }

        .content {
            padding: 25px 50px;
        }

        .container {
            padding: 25px 25px;
            margin: 10px 0;
            background-color: #96ceb4;
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
            echo "<h2>Na osnovu celobrojnog niza a formirati niz b koji sadrži samo pozitivne brojeve.</h2>";
            echo "<br>";
            $brojevi = [5, -9, 0, -1, 3, -6];
            print_r($brojevi);
            $i = 0;
            echo "<br>";
            echo "<span>Novi niz je: </span>";
            foreach ($brojevi as $broj) {
                if ($broj > 0) {
                    $pozBrojevi[$i] = $broj;
                    echo "$pozBrojevi[$i]\n";
                    $i++;
                }
            }
            ?>
        </div>
        <hr>
        <div class="container">
            <?php
            echo "<h2>Niz c je proizvod nizova a i b </h2>";
            echo "<br>";
            $a = [5, -9, 0, -1, 3, -6];
            print_r($a);
            echo "<br>";
            $b = [3, 7, 0, -1, 3, 5];
            print_r($b);
            echo "<br>";
            $c = [];
            echo "<br>";
            echo "<span>Novi niz je: </span>";
            for ($i = 0; $i < count($a); $i++) {
                $c[$i] = $a[$i] * $b[$i];
                echo "$c[$i]\n";
            }
            ?>
        </div>
        <div>

</body>

</html>