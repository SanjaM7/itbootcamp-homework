<?php

    echo "<br>";
    $suma = 0;
    $brojevi = [1,2,3,4,5];
    $len = count($brojevi);
    for ($i = 0; $i < $len; $i++) {
        $suma += $brojevi[$i];
    }
    $SR =  $suma/$len;
    echo "Srednja vrednost je: $SR";

    echo "<br>";
    $brojevi = [1,2,3,4,5];
    $len = count($brojevi);
    $max = $brojevi[0];
    for($i = 1; $i < $len; $i++){
        if($brojevi[$i] > $max){
            $max = $brojevi[$i];
        }
    }
    echo "Maksimalan broj je: $max";

    echo "<br>";
    $brojevi = [1,2,3,4,5];
    $len = count($brojevi);
    $min = $brojevi[0];
    for($i = 1; $i < $len; $i++){
        if($brojevi[$i] < $min){
            $min = $brojevi[$i];
        }
    }
    echo "Minimalan broj je: $min";
    ?>