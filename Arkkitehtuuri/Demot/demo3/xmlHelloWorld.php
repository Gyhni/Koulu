<?php
//Määritellään xml-tiedoston sijainti
$urli = "http://localhost/Santeri_Kilpi/demo3/nimet.xml";
//luodaan uusi DOM-olio XML:n käsittelyyn
$dom = new DOMDocument("1.0");

// ladataan xml-sisältö DOM-olioon
$dom->load($urli);

//haetaan ensimmäinen (item = 0) nimielementti
$nimielementti = $dom->getElementsByTagName("nimi")->item(0);
//haetaan ensimmäisen etunimi valitusta elementistä
$etunimi = $nimielementti->getElementsByTagName("etunimi")->item(0)->textContent;
//haetaan ensimmäinen sukunimi valitusta elementistä
$sukunimi = $nimielementti->getElementsByTagName("sukunimi")->item(0)->textContent;
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>XML Hello World</title>
    </head>
    <body>
        <h1>XML Hello World</h1>
        <?php
        print "Tervehdys ". $etunimi. " ".$sukunimi."!";
        ?>
    </body>
</html>
