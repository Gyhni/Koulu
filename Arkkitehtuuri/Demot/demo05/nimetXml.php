<?php

$dom = new DOMDocument("1.0");

$dom->encoding = "utf-8"; //Määritellään merkistö
$dom->preserveWhiteSpace = false; //Poistaa kaikki tarpeettomat tyhjät merkit
$dom->formatOutput = true; //Rivinvaihdot ja sisennykset mukaan

$juurielementti = new DOMElement("nimet");

$juuri = $dom->appendChild($juurielementti);

$nimielementti = new DOMElement("nimi");

$juuri->appendChild($nimielementti);

$nimielementti->appendChild(new DOMElement("etunimi","Joonas"));
$nimielementti->appendChild(new DOMElement("etunimi","Santeri"));
$nimielementti->appendChild(new DOMElement("sukunimi","Kilpi"));

$nimielementti->appendChild(new DOMElement("etunimi","Urho"));
$nimielementti->appendChild(new DOMElement("etunimi","Kalevi"));
$nimielementti->appendChild(new DOMElement("sukunimi","Kekkonen"));

$nimielementti->appendChild(new DOMElement("etunimi","Masa"));
$nimielementti->appendChild(new DOMElement("etunimi","Mainio"));
$nimielementti->appendChild(new DOMElement("sukunimi","Merkillinen"));

header("Content-type: application/xml; charset=utf-8");
print $dom->saveXML();
?>