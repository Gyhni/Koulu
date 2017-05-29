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
?>