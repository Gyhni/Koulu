<?php
$urli = "elokuvat.xml";

$dom = new DOMDocument("1.0");

$dom->load($urli);

$xpath = new DOMXPath($dom); // Luodaan xpath-olio ja kytketään se domiin

//$lauseke= "/elokuvat/elokuva"; // Haetaan kaikki elokuvat

//$lauseke= "/elokuvat/elokuva[100]"; // Haetaan sadas elokuva

//$lauseke= "/elokuvat/elokuva[last() - 1]"; // Haetaan viimeistä edellinen elokuva

//$lauseke= "/elokuvat/elokuva[valmistumisvuosi = '2010']"; // Vuonna 2010 valmistuneet elokuvat

//$lauseke= "/elokuvat/elokuva[nayttelijat/nayttelija = 'Bruce Willis']"; // Kaikki Bruce Willisin elokuvat

//$lauseke= "/elokuvat/elokuva[nayttelijat/nayttelija = 'Bruce Willis' and kategoria = 'Komedia']"; // Kaikki Bruce Willisin komediat

$lauseke= "/elokuvat/elokuva[@id = '1573']"; // Elokuva jonka id = 1573


$elokuvat = $xpath->query($lauseke);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>XML-tietojen hakuja (XPath)</title>
    </head>
    <body>
        
        <h1>XML-tietojen hakuja (XPath)</h1>
        
        <p>Alla oleva listaus on XPath kyselyn tulos. 
            Katso lausekkeet suoraan PHP-lähdekoodista</p>
        
        <ol>
        <?php
        foreach ($elokuvat as $elokuva) {
                        
            $elokuvan_nimi = $elokuva->getElementsByTagName("elokuvan_nimi")->item(0)->textContent;

            $valmistumisvuosi = $elokuva->getElementsByTagName("valmistumisvuosi")->item(0)->textContent;

            
            echo "<li>".$elokuvan_nimi." (".$valmistumisvuosi.")</li>";
            
        }
        ?>
        </ol>
        
    </body>
</html>
