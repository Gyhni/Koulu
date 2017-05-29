<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ylläpito</title>
    </head>
    <body>
        <h1>Ylläpitotyökalu</h1>
        <form action="lisaatiedot.php">
           
            <select name="tyyppi">
                <option value="tiedote">Tiedote</option>
                <option value="tapahtuma">Tapahtuma</option>
                <option value="seminaari">Seminaari</option>
            </select>
            <h2>Otsikko</h2>
            <input type="text" name="otsikko">
            <h2>Päivämäärä</h2>
            <input type="text" name="pvm">
            <h2>Kuvaus</h2>
            <input type="text" name="kuvaus">
            <h2>Linkki</h2>
            <input type="text" name="linkki">
            <input type="submit" name="aja" value="Lähetä">
        </form>
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
if(isset($_REQUEST["aja"]))
{
$sql = 'INSERT INTO tiedotteet (tyyppi,otsikko,pvm,kuvausteksti,linkki) VALUES (:tyyppi,:otsikko,:pvm,:kuvausteksti,:linkki)';
$kysely = $yhteys->prepare($sql);
$kysely->bindParam(":tyyppi", $_REQUEST["tyyppi"]);
$kysely->bindParam(":otsikko", $_REQUEST["otsikko"]);
$kysely->bindParam(":pvm", $_REQUEST["pvm"]);
$kysely->bindParam(":kuvausteksti", $_REQUEST["kuvaus"]);
$kysely->bindParam(":linkki", $_REQUEST["linkki"]);
$kysely->execute();
}
?>
    </body>
</html>
