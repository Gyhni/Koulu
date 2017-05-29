<?php

$metodi = $_SERVER["REQUEST_METHOD"];

switch ($metodi)
{
    
case "GET" : luetiedot();
    break;
case "POST" : lisaa();
    break;
case "PUT" : muokkaa();
    break;
case "DELETE" : poista();
    break;
default : die();
}

function luetiedot()
{
        $tiedostonimi = "tuotteet.xml";
            
        $dom = new DOMDocument("1.0");

        $dom->load($tiedostonimi);

        $tuotteet = $dom->getElementsByTagName("tuote");
        foreach ($tuotteet as $tuote)
        {
            
            $nimi = $tuote->getElementsByTagName("nimi")->item(0)->textContent;
            $hinta = $tuote->getElementsByTagName("hinta")->item(0)->textContent;
            $tuote_id =$tuote->getAttribute("xml:id");
            
            print "<tr><td>" .$nimi. "</td>";
            print "<td>" .$hinta. "</td>" ;
            print "<td><a href='client.php?do=upd&tuote_id=".$tuote_id."'>Muokkaa</a></td>";
            print "<td><a href='client.php?do=del&tuote_id=".$tuote_id."'>Poista</a></td></tr>";
            
        }
        

}
function poista()
{
    $tiedostonimi = "tuotteet.xml";
            
    $dom = new DOMDocument("1.0");

    $dom->load($tiedostonimi);

    $tuotteet = $dom->getElementsByTagName("tuote");
        
    $data = file_get_contents("php://input");

    $tiedot = json_decode($data);
        
    $tuote_id = $tiedot->id;
                
    //poisto koodi
        
    //poimitaan juuri ja poistettava tuote
        
    $poistettava_tuote = $dom->getElementById($tuote_id);
        
    $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        
    $juuri->removeChild($poistettava_tuote);
        
    $dom->save($tiedostonimi);
    
        
        
          
}
function lisaa()
{
    //lisäys koodi
        
        $tiedostonimi = "tuotteet.xml";
            
        $dom = new DOMDocument("1.0");

        $dom->load($tiedostonimi);

        $tuotteet = $dom->getElementsByTagName("tuote");
        
        $data = file_get_contents("php://input");

        $tiedot = json_decode($data);
        
        $nimi = $tiedot->nimi;
        
        $hinta = $tiedot->hinta;
        
        $dom = new DOMDocument("1.0");
        $dom->encoding = "utf-8"; //määritellään merkistö
        $dom->preserveWhiteSpace = false; //siivoaa ja poistaa kaikki tarpeettomat merkit
        $dom->formatOutput = true; //sisennykset ja rivivaihdot käyttöön
        $dom->load($tiedostonimi);
        
        $uusi_tuote = new DOMElement("tuote");
        //haetaan juuri
        $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        //lisätään juureen
        $juuri->appendChild($uusi_tuote);
        
        $uusi_tuote->appendChild(new DOMElement("nimi", "$nimi"));
        
        $uusi_tuote->appendChild(new DOMElement("hinta", "$hinta"));
        //asetetaan ID
        $tuote_id = "tuote_".time().rand(10000000,99999999);
        
        $uusi_tuote->setAttribute("xml:id", $tuote_id);
        //tallennetaan
        $dom->save($tiedostonimi);
        
}
function muokkaa()
{
    $tiedostonimi = "tuotteet.xml";
            
    $dom = new DOMDocument("1.0");

    $dom->load($tiedostonimi);

    $tuotteet = $dom->getElementsByTagName("tuote");
        
    $data = file_get_contents("php://input");

    $tiedot = json_decode($data);
        
    $tuote_id = $tiedot->id;
                
    //poisto koodi
        
    //poimitaan juuri ja poistettava tuote
        
    $poistettava_tuote = $dom->getElementById($tuote_id);
        
    $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        
    $juuri->removeChild($poistettava_tuote);
    
    $nimi = $tiedot->nimi;
        
        $hinta = $tiedot->hinta;
        
        $dom = new DOMDocument("1.0");
        $dom->encoding = "utf-8"; //määritellään merkistö
        $dom->preserveWhiteSpace = false; //siivoaa ja poistaa kaikki tarpeettomat merkit
        $dom->formatOutput = true; //sisennykset ja rivivaihdot käyttöön
        $dom->load($tiedostonimi);
        
        $uusi_tuote = new DOMElement("tuote");
        //haetaan juuri
        $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        //lisätään juureen
        $juuri->appendChild($uusi_tuote);
        
        $uusi_tuote->appendChild(new DOMElement("nimi", "$nimi"));
        
        $uusi_tuote->appendChild(new DOMElement("hinta", "$hinta"));
        //asetetaan ID
        $tuote_id = "tuote_".time().rand(10000000,99999999);
        
        $uusi_tuote->setAttribute("xml:id", $tuote_id);
        //tallennetaan
        $dom->save($tiedostonimi);
}
?>