<?php
class Knjiga
{
    private $naslov;
    private $autor;
    private $godIzdanja;
    private $brojStrana;
    private $cena = 2500;
    public function __construct($naslov, $autor, $godIzdanja, $brojStrana, $cena = 2500)
    {
        $this->naslov = $naslov;
        $this->autor = $autor;
        $this->godIzdanja = $godIzdanja;
        $this->brojStrana = $brojStrana;
        $this->cena  = $cena;
    }
    /*
    public function setNaslov($naslov)
    {
        $this->naslov = $naslov;
    }
    public function setAutor($autor)
    {
        $this->autor = $autor;
    }
    public function setGodIzdanja($godIzdanja)
    {
        $this->godIzdanja = $godIzdanja;
    }
    public function setBrojStrana($brojStrana)
    {
        $this->brojStrana = $brojStrana;
    }
    public function setCena($cena)
    {
        $this->cena = $cena;
    }
    public function getNaslov()
    {
        return $this->naslov;
    }
    public function getAutor()
    {
        return $this->autor;
    }
    public function getGodIzdanja()
    {
        return $this->godIzdanja;
    }
    public function getBrojStrana()
    {
        return $this->brojStrana;
    }
    public function getCena()
    {
        return $this->cena;
    }
    */
    public function stampaj()
    {
        echo "<b>Naslov: </b>" . $this->naslov . " ";
        echo "<b>Autor: </b>" . $this->autor . " ";
        echo "<b>Godina izdanja: </b>" . $this->godIzdanja . " ";
        echo "<b>Broj strana: </b>" . $this->brojStrana . " ";
        echo "<b>Cena: </b>" . $this->cena . " ";
    }
    public function debela()
    {
        return $this->brojStrana > 600;
    }
    public function skupa()
    {
        return $this->cena > 8000;
    }
    public function duzinaImena()
    {
        return strlen($this->autor) > 18;
    }
}
$knjiga1 = new Knjiga('Uliks', 'Dzejms Dzojs', 1922, 732, 8500);
$knjiga2 = new Knjiga('Proces', 'Franc Kafka', 1925, 322, 699);
$knjiga3 = new Knjiga('Mali Princ', 'Antoan de Sent Egziperi', 1943, 150);

$knjige = [$knjiga1, $knjiga2, $knjiga3];
foreach ($knjige as $knjiga) {
    $knjiga->stampaj();
    echo $knjiga->debela() ? "Knjiga je debela. " : "Knjiga nije debela. ";
    echo $knjiga->skupa() ? "Knjiga je skupa. " : "Knjiga nije skupa. ";
    echo $knjiga->duzinaImena() ? "Ime autora je dugacko. " : "Ime autora je dovoljne duzine. ";
    echo "<hr>";
}
