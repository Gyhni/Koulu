<?php
$metodi = $_SERVER["REQUEST_METHOD"];

$id = $_SERVER["QUERY_STRING"];

switch ($metodi) {
    
    case "GET" : $paluuviesti = "Webservice vastaa: pyynnön metodi on GET (eli tarkoittaa tietojen lukemista)";
                 break;
    
    case "POST" : $paluuviesti = "Webservice vastaa: pyynnön metodi on POST (eli tarkoittaa tietojen lisäämistä)";
                 break; 
             
    case "PUT" : $paluuviesti = "Webservice vastaa: pyynnön metodi on PUT (eli tarkoittaa tietojen päivittämistä)";
                 break;         

    case "DELETE" : $paluuviesti = "Webservice vastaa: pyynnön metodi on DELETE (eli tarkoittaa tietojen poistamista)";
                 break;  
             
    default: $paluuviesti = "Webservice vastaa: ei tuettu metodi (".$metodi.")";
                 break;  
             
             
} 

$data = file_get_contents("php://input");

$henkilotiedot = json_decode($data);

print $paluuviesti;
if ($henkilotiedot) {
    print ", mukana tullut etunimi: ".$henkilotiedot->etunimi;
}
print " henkilön id: " . $id;

?>