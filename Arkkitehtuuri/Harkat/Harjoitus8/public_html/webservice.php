<?php
$dsn = "mysql:host=localhost;dbname=soademot";
$kayttaja = "root";
$salasana = "";

try
{
  $yhteys = new PDO ($dsn, $kayttaja,$salasana);
  
    
} catch (PDOException $e) 
{
    die("Tietokantayhteyden avaaminen ei onnistu. Virhe: ".$e);
}

$yhteys->exec("SET CHARACTER SET utf8");

$sql = "SELECT * FROM alueet";

$kysely = $yhteys->prepare($sql);

if (isset($_REQUEST["kunta"])) 
{
    $sql = "SELECT * FROM alueet WHERE kunta = :kunta";
    $kysely = $yhteys->prepare($sql);
    $kysely->bindParam(":kunta",$_REQUEST["kunta"]);
    
}
if (isset($_REQUEST["maakuntalistaus"])) 
{
    $sql = "SELECT * FROM alueet WHERE maakunta = :maakunta";
    $kysely = $yhteys->prepare($sql);
    $kysely->bindParam(":maakunta",$_REQUEST["maakuntalistaus"]);
    
}
if (isset($_REQUEST["maakunta"])) 
{
    $sql = "SELECT DISTINCT maakunta FROM alueet";
    $kysely = $yhteys->prepare($sql);
    $kysely->execute(); 
    while ($tulosjoukko = $kysely->fetch())
{

    echo $tulosjoukko["maakunta"].";";

    echo "\n";

}
}
else
{
$kysely->execute();
if($kysely->rowCount() > 0)
{
while ($tulosjoukko = $kysely->fetch())
{

    echo $tulosjoukko["alue_id"].";";
    echo $tulosjoukko["kunta"].";";
    echo $tulosjoukko["laani"].";";
    echo $tulosjoukko["maakunta"].";";
    echo $tulosjoukko["seutukunta"].";";
    echo "\n";

}
}
else
{
   echo "kalkkuna";
}
}
?>