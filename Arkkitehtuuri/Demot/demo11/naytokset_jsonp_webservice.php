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

$naytokset_json = json_encode($kysely->fetchAll(PDO::FETCH_ASSOC));

if(isset($_REQUEST["callback"]))
{

	$callback = $_REQUEST["callback"];

}
else
{

	$callback = "naytokset";

}

print $callback."(".$naytokset_json.")";

?>