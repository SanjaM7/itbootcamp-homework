<html>

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <style>
        body {
            background-color: #e6ddde;
            color: #654a4e;
            font-family: "Roboto";
            letter-spacing: 2px;
        }
    </style>
</head>

<body>
    <h2>1. Zadatak</h2>
    <h3>Odrediti proizvod brojeva od 1 do 20, a potom od njega oduzeti zbir brojeva od 1 do 30.</h3>
    <h4>a) Koristeći while petlju</h4>
    <?php
    $i = 1;
    $proizvod = 1;
    while ($i <= 20) {
        $proizvod *= $i;
        $i++;
    }
    $i = 1;
    $suma = 0;
    while ($i <= 30) {
        $suma += $i;
        $i++;
    }
    $rezultat = $proizvod - $suma;
    echo "Rezultat je: $rezultat";
    ?>
    <h4>b) Koristeći for petlju</h4>
    <?php
    $proizvod = 1;
    for ($i = 1; $i <= 20; $i++) {
        $proizvod *= $i;
    }
    $suma = 0;
    for ($i = 1; $i <= 30; $i++) {
        $suma += $i;
    }
    $rezultat = $proizvod - $suma;
    echo "Rezultat je: $rezultat";
    ?>
    
    <h2>2. Zadatak</h2>
    <h3>Odrediti sumu kubova brojeva od n do m.</h3>
    <h4>a) Koristeći while petlju</h4>
    <?php
    $n = 1;
    $m = 5;
    $suma = 0;
    if($m > $n){
        $i = $n;
        while($i <= $m)
        {
            $suma += pow($i, 3);
            $i++;
        }
    }
    else {
        $i = $m;
        while($i <= $n)
        {
            $suma += pow($i, 3);
            $i++;
        }
    }
    echo $suma;
    
    ?>
    <h4>b) Koristeći for petlju</h4>
    <?php
    $n = 1;
    $m = 5;
    $suma = 0;
    if ($n > $m) {
        $pom = $n;
        $n = $m;
        $m = $pom;
    }
    for ($i = $n; $i <= $m; $i++) {
        $suma += pow($i, 3);
    }
    echo $suma;
    ?>
</body>

</html>