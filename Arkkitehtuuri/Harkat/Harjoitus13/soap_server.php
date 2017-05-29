<?php
class tuoterekisteri
{
    
    private $dsn = "mysql:host=localhost;dbname=tuoterekisteri";
    private $tunnus = "root";
    private $salasana = "";
    
    private $yhteys;
    
    public function __construct() 
    {//Suoritetaan aina olion luonnin yhteydessä
        try
        {
            $this->yhteys = new PDO($this->dsn, $this->tunnus, $this->salasana);
        }
        catch (PDOException $e) 
        {
            die("Virhe: ".$e->getMessage());
        }
        
        $this->yhteys->exec("SET CHARACTER SET utf8");
    }
    public function __destruct() 
    {//Suoritetaan olion tuhoutuessa
        unset($this->yhteys);
    }
    public function haeKaikkiTuotteet() 
    {
     $kysely = $this->yhteys->prepare("SELECT * FROM tuotteet");
     $kysely->execute();
     return $kysely->fetchAll();
    }
    public function lisaaUusiTuote($nimi, $hinta) 
    {
     $kysely = $this->yhteys->prepare("INSERT INTO tuotteet (nimi,hinta) VALUES(:nimi, :hinta)");
     $kysely->bindParam(":nimi", $nimi);
     $kysely->bindParam(":hinta", $hinta);
     $kysely->execute();
     
     return true;
    }
    public function poistaTuote($tuote_id) 
    {
     $kysely = $this->yhteys->prepare("DELETE FROM tuotteet WHERE tuote_id = :tuote_id");
     $kysely->bindParam(":tuote_id", $tuote_id);
     $kysely->execute();
     
     return true;
    }
    public function muokkaaTuotetta($tuote_id, $nimi, $hinta) 
    {
     $kysely = $this->yhteys->prepare("UPDATE tuotteet SET nimi=:nimi , hinta=:hinta WHERE tuote_id=:tuote_id");
     $kysely->bindParam(":tuote_id", $tuote_id);
     $kysely->bindParam(":nimi", $nimi);
     $kysely->bindParam(":hinta", $hinta);
     $kysely->execute();
     
     return true;
    }
}
$asetukset = Array
    (
        "uri" => "http://localhost/soap",
        "encoding" => "UTF-8"
    );

$serveri = new SoapServer(null, $asetukset);

$serveri->setClass("tuoterekisteri");

$serveri->handle();

?>