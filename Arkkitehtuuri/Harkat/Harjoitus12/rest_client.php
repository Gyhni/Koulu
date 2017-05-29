<?php
if(isset($_REQUEST["cancel"]))
{
    header("Location: rest_client.php");
}

if(isset($_REQUEST["go"]))
{
    $urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus12/rest_service.php";
    if($_REQUEST["do"] == "add")
    {
        
        $metodi = "POST";
        
        $data = Array(
                        "nimi" => $_REQUEST["nimi"],
                        "hinta" => $_REQUEST["hinta"]
                    );
        
        $lahetettava_data = json_encode($data);
        
        $curl = curl_init($urli);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $metodi);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $lahetettava_data);
        
        $palautettu_data = curl_exec($curl);        
    }
    if($_REQUEST["do"] == "upd")
    {
        
    }
    if($_REQUEST["do"] == "del")
    { 
               $metodi = "DELETE";
        
        $data = Array(
                        "tuote_id" => $_REQUEST["tuote_id"]
                    );
        
        $lahetettava_data = json_encode($data);
        
        $curl = curl_init($urli);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $metodi);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $lahetettava_data);
        
        $palautettu_data = curl_exec($curl);     
    }
    
    
    header("Location: rest_client.php");
}
$urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus12/rest_service.php";

    $metodi = "GET";
        
        $curl = curl_init($urli);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $metodi);

        
        $palautettu_data = curl_exec($curl); 
        
        $tuotteet = json_decode($palautettu_data);


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
                
                <form action="rest_client.php" method="get">
                    
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
                
                $dom = new DOMDocument("1.0");
                
                $dom->load($tiedostonimi);
                
                $tuote = $dom->getElementById($tuote_id);
                
                $nimi = $tuote->getElementsByTagName("nimi")->item(0)->textContent;
                
                ?>
                <h2>Muokkaa tuotteen tietoja</h2>
                
                <form action="rest_client.php" method="get">
                    
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
                
                $dom = new DOMDocument("1.0");
                
                $dom->load($tiedostonimi);
                
                $tuote = $dom->getElementById($tuote_id);
                
                $nimi = $tuote->getElementsByTagName("nimi")->item(0)->textContent;
                
                ?>
                
                
                <h2>Tuotteen poisto</h2>
                
                        
                <h2>Muokkaa tuotteen tietoja</h2>
                
                     <form action="rest_client.php" method="get">
                      
                         <p>
                       Haluatko varmasti poistaa tuotteen:&nbsp;<?php print $nimi?>
                      
                         </p>
                         
                    <input type="hidden" name="tuote_id" value="<?php print $tuote_id?>">
                    <input type="hidden" name="do" value="del">
                    <input type="submit" name="go" value="Boista">
                    <input type="submit" name="cancel" value="Kankeli">
                    
                </form>
        
        <?php } ?>

        <?php } else { ?>
        
        <a href="rest_client.php?do=add">Lisää uusi tuote</a>
        
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
            
            $nimi = $tuote->nimi;
            $hinta = $tuote->hinta;
            $tuote_id =$tuote->tuote_id;
            
        ?>   
        
            <tr>
                <td><?php print $nimi?></td>
                <td><?php print $hinta?> &euro;</td>
                <td><a href="rest_client.php?do=upd&tuote_id=<?php print $tuote_id?>">Muokkaa</a></td>
                <td><a href="rest_client.php?do=del&tuote_id=<?php print $tuote_id?>">Boista</a></td>
            </tr>
        
        <?php } ?>
        </table>
        <?php } ?>
        
        </div>
    </body>
</html>