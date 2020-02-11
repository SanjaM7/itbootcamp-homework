<html>

<head>
    <title>Basic PHP Calculator</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: "Montserrat", sans-serif !important;
            font-weight: bold !important;
            letter-spacing: 4px !important;
        }

        body {
            background-color: #8ca3a3;
            font-size: 18px !important;
            line-height: 1.5;
            text-align: center;
        }

        .calculator {
            background-color: #484f4f;
            text-align: center;
            padding: 25px 50px;
            margin: 100px auto;
            border-radius: 4px;
            max-width: 500px;
            word-wrap: break-word;
        }

        .title {
            color: #e7e7e7;
            margin: 25px 0;
        }

        input[type="number"],
        select {
            vertical-align: middle;
            width: 100%;
            padding: 8px 16px;
            border: 1px solid #d9dee4;
            border-radius: 4px;
            margin: 10px 0;

        }

        select {
            width: 75%;
            text-align-last: center;
        }

        .btn {
            background-color: #78e08f;
            color: black;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <?php
    $broj1 = "";
    $broj2 = "";
    function digitron($broj1, $broj2, $operacija)
    {
        switch ($operacija) {
            case '+':
                $rezultat = $broj1 + $broj2;
                break;
            case '-':
                $rezultat = $broj1 - $broj2;
                break;
            case '*':
                $rezultat = $broj1 * $broj2;
                break;
            case '/':
                $rezultat = $broj1 / $broj2;
                break;
        }
        return $rezultat;
    }
    if (isset($_POST['izracunaj']) && (!empty($_POST['broj1'])) && (!empty($_POST['broj2']))) {
        $broj1 = $_POST['broj1'];
        $broj2 = $_POST['broj2'];
        if (is_numeric($broj1) && is_numeric($broj2)) {
            $operacija = $_POST['operacija'];
            $rezultat = digitron($broj1, $broj2, $operacija);
        }
    }


    ?>
    <div class="calculator">
        <h1 class="title"><strong>CALCULATOR</strong></h1>
        <form method="post" action="index.php">
            <input type="number" name="broj1" class="num" autocomplete="off" placeholder="Unesite prvi broj" required>
            <select name="operacija" class="opt" required>
                <option value="">Izaberi operaciju: </option>
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
            </select>
            <input type="number" name="broj2" class="num" autocomplete="off" placeholder="Unesite drugi broj" required>
            <input type="submit" name="izracunaj" value="IZRACUNAJ" class="btn">

            <?php if (isset($rezultat)) {
                echo "<h1>$broj1 $operacija $broj2 = $rezultat</h1>";
            }
            ?>
        </form>
    </div>
</body>

</html>