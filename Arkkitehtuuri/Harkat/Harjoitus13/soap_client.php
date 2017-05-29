<?php
$asetukset = Array
    (
        "location" => "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/demo14/soap_server.php",
        "uri" => "http://localhost/soap",
        "encoding" => "UTF-8"
    );
$testi = new SoapClient(null,$asetukset);
if(isset($_REQUEST["cancel"]))
{
    header("Location: soap_client.php");
}

if(isset($_REQUEST["go"]))
{
    
    if($_REQUEST["do"] == "add")
    {
       
        $nimi = $_REQUEST["nimi"];
        $hinta = $_REQUEST["hinta"];
                    
        $testi->lisaaUusiTuote($nimi,$hinta);
    }
    if($_REQUEST["do"] == "upd")
    {
        $tuote_id = $_REQUEST["tuote_id"];
        $nimi = $_REQUEST["nimi"];
        $hinta = $_REQUEST["hinta"];
                    
        $testi->muokkaaTuotetta($tuote_id,$nimi,$hinta);
    }
    if($_REQUEST["do"] == "del")
    { 
        $tuote_id = $_REQUEST["tuote_id"]; 
        
        $testi->poistaTuote($tuote_id);
    }
    
    
    header("Location: soap_client.php");
}


    $tuotteet = $testi->haeKaikkiTuotteet();


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="tyylit.css">
        <title>Harjoitus 4</title>
    </head>
    <body>
        <div id="container">
        <h1>Tuoterekisteri</h1>
        
        <?php if(isset($_REQUEST["do"])) { ?>
        
        <?php if ($_REQUEST["do"] == "add") { ?>   
          
        <h2>Lisää uusi tuote &hearts;</h2>
                
                <form action="soap_client.php" method="get">
                    
                    <fieldset>
                        <legend>Tuotetiedot</legend>
                    <div>
                    <label for="nimi">Tuotteen nimi:</label>
                    <input id="nimi" type="text" name="nimi" size="30">
                    </div>
                    
                    <div>
                    <label for="hinta">Tuotteen hinta:</label>
                    <input id="hinta" type="text" name="hinta" size="7"> &euro;
                    </div>
                    
                    </fieldset>    
                    <input type="hidden" name="do" value="add">
                    <input type="submit" name="go" value="Tallenna">
                    <input type="submit" name="cancel" value="Kankeli">
                    
                </form>
        
        <?php } ?>
        <?php if ($_REQUEST["do"] == "upd") { ?> 
                
                <?php
                
                $tuote_id = $_REQUEST["tuote_id"];
                
                
                ?>
                <h2>Muokkaa tuotteen tietoja</h2>
                
                <form action="soap_client.php" method="get">
                    
                    <fieldset>
                        <legend>Tuotetiedot</legend>
                    <div>
                    <label for="nimi">Tuotteen nimi:</label>
                    <input id="nimi" type="text" name="nimi" size="30">
                    </div>
                    
                    <div>
                    <label for="hinta">Tuotteen hinta:</label>
                    <input id="hinta" type="text" name="hinta" size="7"> &euro;
                    </div>
                    
                    </fieldset> 
                    <input type="hidden" name="tuote_id" value="<?php print $tuote_id?>">
                    <input type="hidden" name="do" value="upd">
                    <input type="submit" name="go" value="Tallenna muutokset">
                    <input type="submit" name="cancel" value="Kankeli">
                    
                </form>
        
        <?php } ?>
        
        <?php if ($_REQUEST["do"] == "del"){?> 
        
                <?php
                
                $tuote_id = $_REQUEST["tuote_id"];
                $nimi = $_REQUEST["nimi"];
                ?>
                
                
                <h2>Tuotteen poisto</h2>
                
                        
                <h2>Poista</h2>
                
                    <form action="soap_client.php" method="get">
                      
                         <p>
                       Haluatko varmasti poistaa tuotteen <?php print $nimi ?>
                      
                         </p>
                         
                    <input type="hidden" name="tuote_id" value="<?php print $tuote_id?>">
                    <input type="hidden" name="do" value="del">
                    <input type="submit" name="go" value="Boista">
                    <input type="submit" name="cancel" value="Kankeli">
                    
                </form>
        
        <?php } ?>

        <?php } else { ?>
        
                <a href="soap_client.php?do=add">Lisää uusi tuote</a>
        
        <table>
            <tr>
                <th>Tuotteen nimi</th>
                <th>Hinta</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        <?php
        foreach ($tuotteet as $tuote)
        {
            $tuote_id = $tuote["tuote_id"];
            $nimi = $tuote["nimi"];
            $hinta = $tuote["hinta"];
        
            
        ?>   
        
            <tr>
                <td><?php print $nimi?></td>
                <td><?php print $hinta?> &euro;</td>
                <td><a href="soap_client.php?do=upd&tuote_id=<?php print $tuote_id?>">Muokkaa</a></td>
                <td><a href="soap_client.php?do=del&tuote_id=<?php print $tuote_id?>&nimi=<?php print $nimi?>">Boista</a></td>
            </tr>
        
        <?php } ?>
        </table>
        <?php } ?>
        
        </div>
    </body>
</html>