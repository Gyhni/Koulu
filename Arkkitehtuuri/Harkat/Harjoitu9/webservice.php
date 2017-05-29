<?php

$dsn = "mysql:host=localhost;dbname=videovuokraamo";
$tunnus = "root";
$salasana = "";

try
{

	$yhteys = new PDO($dsn, $tunnus, $salasana);

}
catch(PDOException $e)
{

	die("Virhe".$e->getMessage());

}

$yhteys->exec("SET NAMES utf8");

if (isset($_REQUEST["k"]))
{
	$k = intval($_REQUEST["k"]);
}
else
{
	$k=0;
}
$kysely = $yhteys->prepare("SELECT * FROM elokuvat ORDER BY valmistumisvuosi ASC LIMIT :k,200");
$kysely->bindValue(":k",$k, PDO::PARAM_INT);

if(isset($_REQUEST["maara"]))
{

	$kysely = $yhteys->prepare("SELECT COUNT(elokuva_id) as maara FROM elokuvat");

}
$kysely->execute();

header("Content-type: application/json");

echo json_encode($kysely->fetchAll(PDO::FETCH_ASSOC));


?>