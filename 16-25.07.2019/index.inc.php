<?php
require "database.php";
if ($conn) {
    if (isset($_POST['dodaj'])) {

        if (empty($_POST['predmet']) || empty($_POST['ocena'])) {
            header("Location: index.php?greska=praznapolja");
            exit();
        }
        if (!preg_match("/^[a-zA-Z0-9\\s]*$/", $_POST['predmet'])) {
            header("Location: index.php?greska=nevazecipredmet");
            exit();
        }

        $predmet = $_POST['predmet'];
        $ocena = $_POST['ocena'];

        $sql = "SELECT predmet FROM student WHERE predmet = ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?greska=sqlgreska");
            $greska = mysqli_error($conn);
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $predmet);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            header("Location: index.php?greska=postojipredmet");
            exit();
        }
        $sql = "INSERT INTO student (predmet, ocena) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: index.php?greska=sqlgreska");
            $greska = mysqli_error($conn);
            exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $predmet, $ocena);
        mysqli_stmt_execute($stmt);

        header("Location: index.php?izvrsenje=uspesno");
    }
    $greska = "";
    if (isset($_GET['greska'])) {
        if ($_GET['greska'] == "praznapolja") {
            $greska = "Popunite sva polja!";
        } elseif ($_GET['greska'] == "nevazecipredmet") {
            $greska = "Nevazeci predmet!";
        } elseif ($_GET['greska'] == "postojipredmet") {
            $greska = "Postoji predmet!";
        }
    }
    if (isset($_POST['ponisti'])) {
        $ponisti_id = $_POST['ponisti_id'];
        $sql = "DELETE FROM student WHERE id = $ponisti_id";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $greska = mysqli_error($conn);
        }
    }
    function maxGrade()
    {
        require "database.php";
        $sql = "SELECT MAX(ocena) FROM student";
        if ($result = mysqli_query($conn, $sql)) {
            $row = mysqli_fetch_assoc($result);
            $max = $row['MAX(ocena)'];
            return $max;
            mysqli_free_result($result);
        } else {
            $greska = mysqli_error($conn);
            return $greska;
        }
    }
    function maxGradeSubjects()
    {
        require "database.php";
        $sql = "SELECT * FROM student WHERE ocena = (SELECT MAX(ocena) FROM student)";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_row($result)) {
                printf("%s \n", $row[1]);
                echo "<br>";
            }
            mysqli_free_result($result);
        } else {
            $greska = mysqli_error($conn);
            return $greska;
        }
    }
    function avgGrade()
    {
        require "database.php";
        $sql = "SELECT AVG(ocena) FROM student";
        if ($result = mysqli_query($conn, $sql)) {
            $row = mysqli_fetch_assoc($result);
            $avg = $row['AVG(ocena)'];
            return $avg;
            mysqli_free_result($result);
        } else {
            $greska = mysqli_error($conn);
            return $greska;
        }
    }
    function avgGradeSubjects()
    {
        require "database.php";
        $sql = "SELECT * FROM student WHERE ocena > (SELECT AVG(ocena) FROM student)";
        if ($result = mysqli_query($conn, $sql)) {
            while ($row = mysqli_fetch_row($result)) {
                printf("%s \n", $row[1]);
                echo "<br>";
            }
            mysqli_free_result($result);
        } else {
            $greska = mysqli_error($conn);
            return $greska;
        }
    }
    function subjectGrade()
    {
        require "database.php";
        $sql = "SELECT * FROM student";
        if ($result = mysqli_query($conn, $sql)) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            return $rows;
            mysqli_free_result($result);
        } else {
            $greska = mysqli_error($conn);
            return $greska;
        }
    }
    mysqli_close($conn);
}
