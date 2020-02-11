<?php

class Kompozicija
{
    private $nazivKompozicije;
    private $imeKompozitora;
    private $godinaIzlaska;

    function __construct($nazivKompozicije, $imeKompozitora, $godinaIzlaska)
    {
        $this->nazivKompozicije = $nazivKompozicije;
        $this->imeKompozitora = $imeKompozitora;
        $this->godinaIzlaska = $godinaIzlaska;
    }
    function info()
    {
        echo 'Naziv kompozicije: ' . $this->nazivKompozicije . '<br>';
        echo 'Ime kompozitora: ' . $this->imeKompozitora . '<br>';
        echo 'Godina izlaska: ' . $this->godinaIzlaska . '<br>';
    }
    function barok()
    {
        return $this->godinaIzlaska >= 1600 && $this->godinaIzlaska <= 1750;
    }
    function betoven()
    {
        return strpos($this->imeKompozitora, "Betoven") !== false;
    }
}
$kompozicija1 = new Kompozicija('Za Elizu', 'Ludvig van Betoven', 1810);
$kompozicija2 = new Kompozicija('Figarova zenidba', 'Volfgang Amadeus Mocart', 1786);
$kompozicija3 = new Kompozicija('4 godišnja doba', 'Antonio Vivaldi', 1725);
$kompozicije = [$kompozicija1, $kompozicija2, $kompozicija3];

foreach ($kompozicije as $kompozicija) {
    $kompozicija->info();
    echo $kompozicija->barok() ? 'Kompozicija je barokna<br>' : 'Kompozicija nije barokna<br>';
    echo $kompozicija->betoven() ? 'Kompozitor je Betoven<br>' : 'Kompozitor nije Betoven<br>';
    echo "<br>";
}
