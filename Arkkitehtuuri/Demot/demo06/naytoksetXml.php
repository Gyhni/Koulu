<?php

$dsn = "mysql:host=localhost;dbname=soademot";
$kayttajatunnus = "root";
$salasana = "";

try
{
    $yhteys = new PDO($dsn, $kayttajatunnus, $salasana);
}
catch (PDOException $e)
{
die("Tietokantayhteys ei onnistunut. Virhe:" .$e);
}

$yhteys->exec("SET CHARACTER SET utf8");//Varmistetaan merkistö utf-8


$kysely = $yhteys->prepare("SELECT * FROM naytokset");

$kysely->execute();

$dom = new DOMDocument("1.0");

$dom->encoding = "utf-8";
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

$juuri = $dom->appendChild(new DOMElement("naytokset"));

while($tulosjoukko = $kysely->fetch())
{
    
    $naytoselementti = new DOMElement("naytos");
    
    $juuri->appendChild($naytoselementti);
    
    $naytoselementti->appendChild(new DOMElement("naytos_id",$tulosjoukko["tapahtuma_id"]));
    $naytoselementti->appendChild(new DOMElement("tilaisuus_id",$tulosjoukko["tilaisuus_id"]));
    $naytoselementti->appendChild(new DOMElement("jarjestaja",$tulosjoukko["tapahtuman_jarjestaja"]));
    $naytoselementti->appendChild(new DOMElement("tilaisuus",$tulosjoukko["tilaisuuden_nimi"]));
    $naytoselementti->appendChild(new DOMElement("pvm",$tulosjoukko["pvm"]));
    $naytoselementti->appendChild(new DOMElement("viikonpaiva",$tulosjoukko["viikonpaiva"]));
    $naytoselementti->appendChild(new DOMElement("klo",$tulosjoukko["klo"]));
    $naytoselementti->appendChild(new DOMElement("esityspaikka",$tulosjoukko["esityspaikka"]));
    $naytoselementti->appendChild(new DOMElement("tilaisuuden_tyyppi",$tulosjoukko["tilaisuuden_tyyppi"]));
    $naytoselementti->appendChild(new DOMElement("lippupiste_url",  urlencode($tulosjoukko["lippupiste_url"])));
    $naytoselementti->appendChild(new DOMElement("aikaleima",$tulosjoukko["aikaleima"]));
    
}

header("Content-type: application/xml; charset=utf-8");
print $dom->saveXML();

?>