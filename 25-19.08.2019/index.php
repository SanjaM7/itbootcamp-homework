<?php

class Osoba
{
    private $ime;
    private $prezime;
    private $godRodjenja;

    public function __construct($ime, $prezime, $godRodjenja)
    {
        $this->setIme($ime);
        $this->setPrezime($prezime);
        $this->setGodRodjenja($godRodjenja);
    }

    public function setIme($ime)
    {
        $this->ime = $ime;
    }

    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }

    public function setGodRodjenja($godRodjenja)
    {
        $this->godRodjenja = $godRodjenja;
    }

    public function getIme()
    {
        return $this->ime;
    }

    public function getPrezime()
    {
        return $this->prezime;
    }

    public function getGodRodjenja()
    {
        return $this->godRodjenja;
    }

    public function ispisiOsobu(){
        echo $this->getIme() . " " . $this->getPrezime() ." ". $this->getGodRodjenja() . " ";
    }
}

class Zaposleni extends Osoba
{ 
    private $plata;
    private $pozicija;

    public function __construct($ime, $prezime, $godRodjenja, $plata, $pozicija){    
        parent::__construct($ime, $prezime, $godRodjenja);
        $this->setPlata($plata);
        $this->setPozicija($pozicija);
        
    }

    public function setPlata($plata){
        $this->plata = $plata;
    }

    public function setPozicija($pozicija){
        $this->pozicija = $pozicija;
    }

    public function getPlata(){
        return $this->plata;
    }

    public function getPozicija(){
        return $this->pozicija;
    }

    public function ispisiZaposlenog(){
        $this->ispisiOsobu();
        echo " " . $this->getPlata() . " " . $this->getPozicija() . " ";
    }
}
$osoba1 = new Osoba('Marko', 'Markovic', 1898);
$osoba1->ispisiOsobu();
echo "<br>";
$zaposleni1 = new Zaposleni('Petar','Peric',1990, 120000, 'ekonomista');
$zaposleni2 = new Zaposleni('Marija','Jovic', 1985, 80000, 'pravnica');

function ekonomista($zaposleni){
    if(strpos($zaposleni->getPozicija(),"ekonomista") !== false){
        echo "zaposlen u ekonomskom sektoru";
    }
}
$zaposleni1->ispisiZaposlenog();
ekonomista($zaposleni1);
echo "<br>";
$zaposleni2->ispisiZaposlenog();
ekonomista($zaposleni2);
