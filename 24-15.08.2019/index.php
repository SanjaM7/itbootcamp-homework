<?php
class Pacijent
{
    private $ime;
    private $prezime;
    private $visina;
    private $tezina;

    public function __construct($ime, $prezime, $visina, $tezina)
    {
        $this->setIme($ime);
        $this->setPrezime($prezime);
        $this->setVisina($visina);
        $this->setTezina($tezina);
    }

    public function setIme($ime)
    {
        $this->ime = $ime;
    }
    public function setPrezime($prezime)
    {
        $this->prezime = $prezime;
    }
    public function setVisina($visina)
    {
        $this->visina = $visina;
    }
    public function setTezina($tezina)
    {
        $this->tezina = $tezina;
    }

    public function getIme()
    {
        return $this->ime;
    }
    public function getPrezime()
    {
        return $this->prezime;
    }
    public function getVisina()
    {
        return $this->visina;
    }
    public function getTezina()
    {
        return $this->tezina;
    }

    public function ispisPacijenta()
    {
        echo $this->ime . " ";
        echo $this->prezime . " ";
        echo $this->visina . " ";
        echo $this->tezina . " ";
    }

    public function getBMI()
    {
        $BMI = (10000 * $this->tezina) / pow($this->visina, 2);
        return $BMI;
    }
}
$pacijent1 = new Pacijent('Stephen', 'Hawking', 169, 61);
$pacijent2 = new Pacijent('Mike', 'Tyson', 178, 109);
$pacijent3 = new Pacijent('Sarah', 'Hyland', 157, 46);

$pacijenti = [$pacijent1, $pacijent2, $pacijent3];

function minTezina($pacijenti)
{
    $minTezinaPacijent = $pacijenti[0];
    foreach ($pacijenti as $pacijent) {
        if ($pacijent->getTezina() < $minTezinaPacijent->getTezina()) {
            $minTezinaPacijent = $pacijent;
        }
    }
    $minTezinaPacijent->ispisPacijenta();
}

echo "Pacijent sa najmanjom tezinom je: ";
minTezina($pacijenti);
echo "<br>";

function maxBMI($pacijenti)
{
    $maxBMIPacijent = $pacijenti[0];
    foreach ($pacijenti as $pacijent) {
        if ($pacijent->getBMI() > $maxBMIPacijent->getBMI()) {
            $maxBMIPacijent = $pacijent;
        }
    }
    $maxBMIPacijent->ispisPacijenta();
}

echo "Pacijent sa najvecim BMI je: ";
maxBMI($pacijenti);
echo "<br>";

function imeSadrziA($pacijenti)
{
    foreach ($pacijenti as $pacijent) {
        if (stripos($pacijent->getIme(), 'a') !== false) {
            $pacijent->ispisPacijenta();
        }
    }
}

echo "Pacijenti cije ime sadrzi slovo a: ";
imeSadrziA($pacijenti);
echo "<br>";
