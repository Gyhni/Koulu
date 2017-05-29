<?php
$dom = new DOMDocument("1.0");

$dom->encoding = "utf-8";
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

$kunnat = $dom->appendChild(new DOMElement("kunnat"));


$urli = "Kunnat.csv";
$urlifilu = file($urli);

foreach ($urlifilu as $kunta)
{
    $nimi = $kunnat->appendChild(new DOMElement("kunta"));
    
    $inffo = explode(";", $kunta);
    
    $nimi->appendChild(new DOMElement("id",$inffo[0]));
    $nimi->appendChild(new DOMElement("nimi",$inffo[1]));
    $nimi->appendChild(new DOMElement("ruotsi",$inffo[2]));
    $nimi->appendChild(new DOMElement("miehia",$inffo[3]));
    $nimi->appendChild(new DOMElement("naisia",$inffo[4]));
    $nimi->appendChild(new DOMElement("yhteensa",trim($inffo[5])));

    
}


header("Content-type: application/xml; charset=utf-8");
print $dom->saveXML();
        

?>