<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Libre Baskerville" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f1e3dd;
            font-family: 'Libre Baskerville', sans-serif;
            color: #454140;
        }

        .container {
            margin: 50px auto;
            padding: 25px;
            width: 80%;
            background-color: #daebe8;
            text-align: center;
        }

        .row:before,
        .row:after {
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
            .grid-col.l6 {
                width: 49.99999%
            }
        }

        .input-container {
            padding: 10px;
        }

        input[type='text'],
        input[type='number'] {
            vertical-align: middle;
            width: 100%;
            margin: 10px;
            padding: 8px 16px;
            border: 1px solid #d9dee4;
        }

        input[type='submit'] {
            background-color: #454140;
            color: white;
            vertical-align: middle;
            margin: 5px;
            padding: 8px 16px;
            border: none;
            letter-spacing: 4px;
            cursor: pointer;
        }

        input:hover[type="submit"] {
            background-color: #fefbd8;
            color: #454140;
        }

        .card-2 {
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12)
        }

        div .error,
        .red {
            color: #f94e3f !important;
        }

        table {
            display: table;
            border-collapse: collapse;
            border-spacing: 0px;
            text-align: left;
            margin : 0 auto;
        }

        table td {
            display: table-cell;
            padding: 0 12px;
        }

        .greska {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    require "index.inc.php";
    if ($conn) :
        ?>
        <div class="row">
            <div class="grid-col l6">
                <div class="container card-2">
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="GET">
                        <div class="input-container">
                            <h3><label>Ime: </label></h3>
                            <input type="text" name="ime" value="<?php echo !empty($_GET['ime']) ? $_GET['ime'] : ''; ?>">
                            <span class="greska"><?php echo $imeGreska; ?></span>
                        </div>
                        <div class="input-container">
                            <h3><label>Prezime: </label></h3>
                            <input type="text" name="prezime" value="<?php echo !empty($_GET['prezime']) ? $_GET['prezime'] : ''; ?>">
                            <span class="greska"><?php echo $prezimeGreska; ?></span>
                        </div>
                        <div class="input-container">
                            <h3><label>Godine: </label></h3>
                            <input type="number" name="godine" value="<?php echo !empty($_GET['godine']) ? $_GET['godine'] : ''; ?>">
                            <span class="greska"><?php echo  $godineGreska; ?></span>
                        </div>
                        <div class="input-container">
                            <h3><label>Prosecna ocena: </label></h3>
                            <input type="number" name="prosecnaOcena" step="any" value="<?php echo !empty($_GET['prosecnaOcena']) ? $_GET['prosecnaOcena'] : ''; ?>">
                            <span class="greska"><?php echo $prosecnaOcenaGreska; ?></span>
                        </div>
                        <input type="submit" value="Dodaj" name="dodaj" class="btn">
                    </form>
                </div>
            </div>
            <div class="grid-col l6">
                <div class="container card-2">
                    <table>
                        <?php
                        $rows = studenti();
                        foreach ($rows as $row) :
                            ?>
                            <tr>
                                <td><?php echo $row['ime']; ?></td>
                                <td><?php echo $row['prezime']; ?></td>
                                <td><?php echo $row['godine']; ?></td>
                                <td><?php echo $row['prosecnaOcena']; ?></td>
                                <td>
                                    <form action='<?php echo $_SERVER["PHP_SELF"]; ?>' method='post'>
                                        <input type='hidden' name='ponisti_id' value="<?php echo $row['id']; ?>">
                                        <input type='submit' name='ponisti' value='Ponisti'>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    <?php
    endif;
    ?>
</body>

</html>