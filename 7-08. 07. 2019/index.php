<html>

<head>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        .grid-col {
            float: left;
            width: 100%;
        }

        /*mobile*/
        .grid-col.s1 {
            width: 8.33333%
        }

        .grid-col.s2 {
            width: 16.66666%
        }

        .grid-col.s3 {
            width: 24.99999%
        }

        .grid-col.s4 {
            width: 33.33333%
        }

        .grid-col.s5 {
            width: 41.66666%
        }

        .grid-col.s6 {
            width: 49.99999%
        }

        .grid-col.s7 {
            width: 58.33333%
        }

        .grid-col.s8 {
            width: 66.66666%
        }

        .grid-col.s9 {
            width: 74.99999%
        }

        .grid-col.s10 {
            width: 83.33333%
        }

        .grid-col.s11 {
            width: 91.66666%
        }

        .grid-col.s12 {
            width: 99.99999%
        }

        /*tablet*/
        @media (min-width:601px) {
            .grid-col.m1 {
                width: 8.33333%
            }

            .grid-col.m2 {
                width: 16.66666%
            }

            .grid-col.m3,
            .quarter {
                width: 24.99999%
            }

            .grid-col.m4,
            .third {
                width: 33.33333%
            }

            .grid-col.m5 {
                width: 41.66666%
            }

            .grid-col.m6,
            .half {
                width: 49.99999%
            }

            .grid-col.m7 {
                width: 58.33333%
            }

            .grid-col.m8,
            .twothird {
                width: 66.66666%
            }

            .grid-col.m9,
            .threequarter {
                width: 74.99999%
            }

            .grid-col.m10 {
                width: 83.33333%
            }

            .grid-col.m11 {
                width: 91.66666%
            }

            .grid-col.m12 {
                width: 99.99999%
            }
        }

        /*desktop*/
        @media (min-width:993px) {
            .grid-col.l1 {
                width: 8.33333%
            }

            .grid-col.l2 {
                width: 16.66666%
            }

            .grid-col.l3 {
                width: 24.99999%
            }

            .grid-col.l4 {
                width: 33.33333%
            }

            .grid-col.l5 {
                width: 41.66666%
            }

            .grid-col.l6 {
                width: 49.99999%
            }

            .grid-col.l7 {
                width: 58.33333%
            }

            .grid-col.l8 {
                width: 66.66666%
            }

            .grid-col.l9 {
                width: 74.99999%
            }

            .grid-col.l10 {
                width: 83.33333%
            }

            .grid-col.l11 {
                width: 91.66666%
            }

            .grid-col.l12 {
                width: 99.99999%
            }
        }

        .grid-row:before,
        .grid-row:after,
        .container:before,
        .container:after {
            content: "";
            clear: both;
            display: table;
        }

        body {
            background-color: #f5e1da;
            color: #5588a3;
        }

        .content {
            text-align: center;
            margin: 20px 20px;
        }

        .container {
            padding: 50px;
            margin: 20px 20px;
            background-color: #f1f1f1;
            border-radius: 4px;
        }

        .input-container {
            max-width: 200px;
            margin: 0 auto;
            display: inline-block;
        }

        input[type=number] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin: 10px 0;
        }


        button {
            background-color: #5588a3;
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
            color: #5588a3;
        }
    </style>
</head>

<body>
    <div class="grid-row content">
        <div class="grid-col l6">
            <div class="container">
                <form action="index.php" method="POST">
                    <h2>Fahrenheit to Kelvin converter</h2>
                    <label>Fahrenheit: </label>
                    <div class="input-container">
                        <input name="fahrenheit" type="number" step="any">
                    </div>
                    <br />
                    <button type="submit">Convert</button>

                    <?php
                    if (isset($_POST['fahrenheit']) && $_POST['fahrenheit'] !== '') {
                        $fahrenheit = $_POST['fahrenheit'];
                        $kelvin = ($fahrenheit -32)*5/9 +273.15;
                        echo "<p class='font'>$fahrenheit F = $kelvin K</p>";
                    } else {
                        $fahrenheit = null;
                    }
                    ?>
                </form>
            </div>
        </div>
        <div class="grid-col l6">
            <div class="container">
                <form action="index.php" method="POST">
                    <h2>Kelvin to Fahrenheit converter</h2>
                    <label>Kelvin: </label>
                    <div class="input-container">
                        <input name="kelvin" type="number" step="any">
                    </div>
                    <br />
                    <button type="submit">Convert</button>

                    <?php
                    if (isset($_POST['kelvin']) && $_POST['kelvin'] !== '') {
                        $kelvin = $_POST['kelvin'];
                        $fahrenheit = ($kelvin -273.15)*9/5 + 32;
                        echo "<p class='font'>$kelvin K =  $fahrenheit F</p>";
                    } else {
                        $farenheit = null;
                    }
                    ?>
                </form>
            </div>
        </div>


    </div>

    <div class="grid-row content">
        <div class="grid-col l6">
            <div class="container">
                <form action="index.php" method="POST">
                    <h2>Liters to Gallons converter</h2>
                    <label>Liters: </label>
                    <div class="input-container">
                        <input name="liters" type="number" step="any">
                    </div>
                    <br />
                    <button type="submit">Convert</button>

                    <?php
                    if (isset($_POST['liters']) && $_POST['liters'] !== '') {
                        $liters = $_POST['liters'];
                        $gallons = $liters / 3.785;
                        echo "<p class='font'>$liters liters = $gallons gallons</p>";
                    } else {
                        $liters = null;
                    }
                    ?>
                </form>
            </div>
        </div>

        <div class="grid-col l6">
            <div class="container">
                <form action="index.php" method="POST">
                    <h2>Gallons to Liters converter</h2>
                    <label>Gallons: </label>
                    <div class="input-container">
                        <input name="gallons" type="number" step="any">
                    </div>
                    <br />
                    <button type="submit">Convert</button>

                    <?php
                    if (isset($_POST['gallons']) && $_POST['gallons'] !== '') {
                        $gallons = $_POST['gallons'];
                        $liters = $gallons * 3.785;
                        echo "<p class='font'>$gallons gallons =  $liters liters</p>";
                    } else {
                        $gallons = null;
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>

</body>

</html>