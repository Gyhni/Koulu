<?php

$metodi = $_SERVER["REQUEST_METHOD"];

switch ($metodi)
{
    
case "GET" : $paluuviesti = "Webservice vastaa: pyynnön metodi on GET (tarkoittaa tietojen lukemista)";
    break;

case "POST" : $paluuviesti = "Webservice vastaa: pyynnön metodi on POST (tarkoittaa tietojen lisäämistä)";
    break;
case "PUT" : $paluuviesti = "Webservice vastaa: pyynnön metodi on PUT (tarkoittaa tietojen päivittämistä)";
    break;
case "DELETE" : $paluuviesti = "Webservice vastaa: pyynnön metodi on DELETE (tarkoittaa tietojen poistamista)";
    break;
default : $paluuviesti = "Ei tuettu metodi";
}

$data = file_get_contents("php://input");

$henkilotiedot = json_decode($data);

print $paluuviesti;
print "Mukaan tullut data: ".$henkilotiedot->etunimi;

?>