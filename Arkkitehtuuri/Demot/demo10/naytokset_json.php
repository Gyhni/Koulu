<?php

$dsn = "mysql:host=localhost;dbname=soademot";
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

$kysely = $yhteys->prepare("SELECT * FROM naytokset");

$kysely->execute();

header("Content-type: application/json");

echo json_encode($kysely->fetchAll(PDO::FETCH_ASSOC));


?>