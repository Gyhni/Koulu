<?php


function lisaa($nimi, $hinta)

    {
        //lisäys koodi
        
    $urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus12/tuotteet.xml";
    
    $data = file_get_contents("php://input");
    
    $tuotetiedot = json_decode($data);
        
    $tiedostonimi = "tuotteet.xml";
    
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
    function muuta()
    {
        //muutos koodi
        
        $dom = new DOMDocument("1.0");
        $dom->encoding = "utf-8"; //määritellään merkistö
        $dom->preserveWhiteSpace = false; //siivoaa ja poistaa kaikki tarpeettomat merkit
        $dom->formatOutput = true; //sisennykset ja rivivaihdot käyttöön
        $dom->load($tiedostonimi);
        
        $tuote_id = $_REQUEST["tuote_id"];
        
        $tuote = $dom->getElementById($tuote_id);
        
        $tuote_nimi = $tuote->getElementsByTagName("nimi")->item(0)->textContent;
        $tuote_hinta = $tuote->getElementsByTagName("hinta")->item(0)->textContent;
        
        if($_REQUEST["nimi"])
        {
           $uusi_nimi =  $_REQUEST["nimi"];
        }
        else
        {
           $uusi_nimi = $tuote_nimi;
        }
        if($_REQUEST["hinta"])
        {
            $uusi_hinta = $_REQUEST["hinta"];
        }
        else
        {
            $uusi_hinta = $tuote_hinta;
        }
        
        $uusi_tuote = new DOMElement("tuote");
        //haetaan juuri
        $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        //lisätään juureen
        $juuri->appendChild($uusi_tuote);
        
        $uusi_tuote->appendChild(new DOMElement("nimi", $uusi_nimi));
        
        $uusi_tuote->appendChild(new DOMElement("hinta", $uusi_hinta));
        
        $uusi_tuote->setAttribute("xml:id", $tuote_id);
        
        $juuri->replaceChild($uusi_tuote,$tuote);
        
        $dom->save($tiedostonimi);
    }
    function poista($tuote_id)
    {
        //poisto koodi
        $tiedostonimi = "tuotteet.xml";
        
        $dom = new DOMDocument("1.0");
        
        $dom->load($tiedostonimi);
        
        //poimitaan juuri ja poistettava tuote
        
        $poistettava_tuote = $dom->getElementById($tuote_id);
        
        $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        
        $juuri->removeChild($poistettava_tuote);
        
        $dom->save($tiedostonimi);
        
    }
    
    

function haeTuotteet()
{
    $tiedostonimi = "tuotteet.xml";   

    $dom = new DOMDocument("1.0");

    $dom->load($tiedostonimi);

    $tuotteet = $dom->getElementsByTagName("tuote");
    
    $tuotteet_array = array();
    
    foreach ($tuotteet as $tuote)
    {
        $tuote_id = $tuote->getAttribute("xml:id");
        $nimi = $tuote->getElementsByTagName("nimi")->item(0)->textContent;
        $hinta = $tuote->getElementsByTagName("hinta")->item(0)->textContent;
        
        $tuotteet_array[] = array
            (
            "tuote_id"=>$tuote_id, 
            "nimi"=>$nimi, 
            "hinta"=>$hinta
            );
    }
    return json_encode($tuotteet_array);
}
$metodi = $_SERVER["REQUEST_METHOD"];

$data = file_get_contents("php://input");

$tuotetiedot = json_decode($data);

switch ($metodi) {
    
    case "GET" : $paluuviesti = haeTuotteet();
                 break;
    
    case "POST" : $paluuviesti = lisaa($tuotetiedot->nimi, $tuotetiedot->hinta);
                 break; 
             
    case "PUT" : $paluuviesti = muuta($tuotetiedot->tuote_id,$tuotetiedot->nimi, $tuotetiedot->hinta);
                 break;         

    case "DELETE" : $paluuviesti = poista($tuotetiedot->tuote_id);
                 break;  
             
    default: $paluuviesti = "Virhe: ei tuettu metodi (".$metodi.")";
                 break;  
             
             
} 
print $paluuviesti;
?>