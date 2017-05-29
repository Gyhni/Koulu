<?php

$dsn = "mysql:host=localhost;dbname=mamk";
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
if(isset($_REQUEST["tyyppi"]))
{
    if($_REQUEST["tyyppi"] == "seminaari")
    {
        $kysely = $yhteys->prepare("SELECT * FROM tiedotteet WHERE tyyppi = 'seminaari'");
    }
    if($_REQUEST["tyyppi"] == "tiedote")
    {
        $kysely = $yhteys->prepare("SELECT * FROM tiedotteet WHERE tyyppi = 'tiedote'");
    }
    if($_REQUEST["tyyppi"] == "tapahtuma")
    {
        $kysely = $yhteys->prepare("SELECT * FROM tiedotteet WHERE tyyppi = 'tapahtuma'");
    }
}
else 
{
$kysely = $yhteys->prepare("SELECT * FROM tiedotteet");
}
$kysely->execute();

$dom = new DOMDocument("1.0");

$dom->encoding = "utf-8";
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

$rss = $dom->appendChild(new DOMElement("rss"));
$rss->setAttribute("version","2.0");
$channel = $rss->appendChild(new DOMElement("channel"));
$channel->appendChild(new DOMElement ("title","MAMK title"));

while($tulosjoukko = $kysely->fetch())
{
    $pvm = strtotime($tulosjoukko["pvm"]);
    
    $tapahtuma = new DOMElement("item");
    
    $channel->appendChild($tapahtuma);
    
    $tapahtuma->appendChild(new DOMElement("title",$tulosjoukko["otsikko"]));
    $tapahtuma->appendChild(new DOMElement("description",$tulosjoukko["kuvausteksti"]));
    $tapahtuma->appendChild(new DOMElement("link",$tulosjoukko["linkki"]));
    $tapahtuma->appendChild(new DOMElement("pubDate",date("r",$pvm)));
}
header("Content-type: application/xml; charset=utf-8");
print $dom->saveXML();


?>