<htmL>

<head>
    <title>Student</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <?php
    require "index.inc.php";
    if ($conn) :
    ?>

    <div class="form-container card-2">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <div class="row">
                <div class="grid-col l6 input-container">
                    <h3><label>Predmet: </label></h3>
                    <input type="text" name="predmet" autocomplete="off">
                </div>
                <div class="grid-col l6 input-container">
                    <h3><label>Ocena: </label></h3>
                    <input type="number" name="ocena" min="6" max="10" autocomplete="off">
                </div>
            </div>
            <div class="error"><?php echo $greska; ?></div>
            <input type="submit" value="Dodaj" name="dodaj" class="btn">
        </form>
    </div>
    <div class="row">
        <div class="grid-col l6">
            <div class="container card-2">
                <h3>Najveca ocena studenta je: <span class='red'><?php echo maxGrade(); ?></span></h3>
                <h3>Student ima najvecu ocenu iz sledecih predmeta: </h3>
                <p class='red'><?php echo maxGradeSubjects(); ?></p>
            </div>
            <div class="container card-2">
                <h3>Prosecna ocena studenta je: <span class='red'><?php echo avgGrade(); ?></span></h3>
                <h3>Student ima ocenu vecu od prosecne iz sledecih predmeta: </h3>
                <p class='red'><?php echo avgGradeSubjects(); ?></p>
            </div>
        </div>
        <div class="grid-col l6">
            <table class="card-2">
                <?php
                $rows = subjectGrade();
                foreach ($rows as $row) :
                    ?>
                    <tr>
                        <td><?php echo $row['predmet']; ?></td>
                        <td><?php echo $row['ocena']; ?></td>
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
    <?php
    endif;
    ?>
</body>

</html>