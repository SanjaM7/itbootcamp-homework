<html>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Orbitron">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
          
        }

        body {
            background-image: url(bohemian-rhapsody.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            text-align: center;
        }

        ul {
            list-style-position: inside;
            padding: 40px 0 20px 0;
            font-family: "Kaushan Script", sans-serif;
        }

        table {
            display: table;
            background-color: #4b4b4b;
            border: 1px solid #762782;
            border-collapse: collapse;
            margin: 0 auto;
            font-size: 18px;
            position:absolute;
            left:50%;
            bottom: 20px;
            transform:translate(-50%,0%);
            font-family: "Orbitron", sans-serif;
        }

        table td {
            color: #fff200;
            display: table-cell;
            border: 1px solid #762782;
            padding: 8px;
        }

    </style>
</head>

<body>
    <?php
    function lista($bojaTeksa, $velicinaTeksta, $tekst)
    {
        echo "<li style='color:$bojaTeksa;font-size:$velicinaTeksta;'>$tekst</li>";
    }
    function tabela($logickaPromenljiva, $tekst)
    {
        $logickaPromenljiva = $logickaPromenljiva ? "italic" : "normal";
        echo "<td style='font-style:$logickaPromenljiva'>$tekst</td>";
    }
    ?>
    <ul>
        <?php
        lista("#18dcff", 25, "I see a little silhouetto of a man");
        lista("#32ff7e", 30, "Scaramouch, scaramouch will you do the fandango");
        lista("#fff200", 40, "Thunderbolt and lightning - very very frightening me");
        ?>
    </ul>
    <table>
        <tr>
            <?php
            tabela(false, "Gallileo");
            tabela(true, "Gallileo");
            tabela(false, "Gallileo");
            ?>
        </tr>
        <tr>
            <?php
            tabela(true, "Gallileo");
            tabela(false, "Gallileo");
            tabela(true, "Gallileo Figaro - magnifico");
            ?>
        </tr>
    </table>

    <body>

</html>