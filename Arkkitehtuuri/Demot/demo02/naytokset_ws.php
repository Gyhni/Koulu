<?php
$dsn = "mysql:host=localhost;dbname=soademot";
$kayttaja = "root";
$salasana = "";

try {
    $yhteys = new PDO($dsn, $kayttaja, $salasana);
} catch (PDOException $e) {
    die("Tietokantayhteyden avaaminen ei onnistunut. Virhe: ".$e); 
}

$yhteys->exec("SET CHARACTER SET utf8");

$sql = "SELECT * FROM naytokset";

$kysely = $yhteys->prepare($sql);

if (isset($_REQUEST["tapahtuma_id"])) {

    $sql = "SELECT * FROM naytokset WHERE tapahtuma_id = :tapahtuma_id";
    $kysely = $yhteys->prepare($sql);
    $kysely->bindParam(":tapahtuma_id", $_REQUEST["tapahtuma_id"]);
    
}

if (isset($_REQUEST["tilaisuuden_nimi"])) {

    $sql = "SELECT * FROM naytokset WHERE tilaisuuden_nimi = :tilaisuuden_nimi";
    $kysely = $yhteys->prepare($sql);
    $kysely->bindParam(":tilaisuuden_nimi", $_REQUEST["tilaisuuden_nimi"]);
    
}



$kysely->execute();

while ($tulosjoukko = $kysely->fetch()) {
    
    echo $tulosjoukko["tapahtuma_id"].";";
    echo $tulosjoukko["tilaisuus_id"].";";
    echo $tulosjoukko["tapahtuman_jarjestaja"].";";
    echo $tulosjoukko["tilaisuuden_nimi"].";";
    echo $tulosjoukko["pvm"].";";
    echo $tulosjoukko["viikonpaiva"].";";
    echo $tulosjoukko["klo"].";";
    echo $tulosjoukko["esityspaikka"].";";
    echo $tulosjoukko["tilaisuuden_tyyppi"].";";
    echo $tulosjoukko["lippupiste_url"].";";
    echo "\n";
     
}

?>
