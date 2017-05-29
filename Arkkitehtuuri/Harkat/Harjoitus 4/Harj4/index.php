<?php
if(isset($_REQUEST["cancel"]))
{
    header("Location: index.php");
}

$tiedostonimi = "tuotteet.xml";

if(isset($_REQUEST["go"]))
{
    if($_REQUEST["do"] == "add")
    {
        //lisäys koodi
        
        if($_REQUEST["nimi"])
        {
           $nimi =  $_REQUEST["nimi"];
        }
        else
        {
           $nimi = "(nimetön tuote)";
        }
        
        if($_REQUEST["hinta"])
        {
            $hinta = $_REQUEST["hinta"];
        }
        else
        {
            $hinta = "0";
        }
        
        
        $dom = new DOMDocument("1.0");
        $dom->encoding = "utf-8"; //määritellään merkistö
        $dom->preserveWhiteSpace = false; //siivoaa ja poistaa kaikki tarpeettomat merkit
        $dom->formatOutput = true; //sisennykset ja rivivaihdot käyttöön
        $dom->load($tiedostonimi);
        
        $uusi_tuote = new DOMElement("tuote");
        //haetaan juuri
        $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        //lisätään juureen
        $juuri->appendChild($uusi_tuote);
        
        $uusi_tuote->appendChild(new DOMElement("nimi", "$nimi"));
        
        $uusi_tuote->appendChild(new DOMElement("hinta", "$hinta"));
        //asetetaan ID
        $tuote_id = "tuote_".time().rand(10000000,99999999);
        
        $uusi_tuote->setAttribute("xml:id", $tuote_id);
        //tallennetaan
        $dom->save($tiedostonimi);
        
    }
    if($_REQUEST["do"] == "upd")
    {
        //muutos koodi
        
        $dom = new DOMDocument("1.0");
        $dom->encoding = "utf-8"; //määritellään merkistö
        $dom->preserveWhiteSpace = false; //siivoaa ja poistaa kaikki tarpeettomat merkit
        $dom->formatOutput = true; //sisennykset ja rivivaihdot käyttöön
        $dom->load($tiedostonimi);
        
        $tuote_id = $_REQUEST["tuote_id"];
        
        $tuote = $dom->getElementById($tuote_id);
        
        $tuote_nimi = $tuote->getElementsByTagName("nimi")->item(0)->textContent;
        $tuote_hinta = $tuote->getElementsByTagName("hinta")->item(0)->textContent;
        
        if($_REQUEST["nimi"])
        {
           $uusi_nimi =  $_REQUEST["nimi"];
        }
        else
        {
           $uusi_nimi = $tuote_nimi;
        }
        if($_REQUEST["hinta"])
        {
            $uusi_hinta = $_REQUEST["hinta"];
        }
        else
        {
            $uusi_hinta = $tuote_hinta;
        }
        
        $uusi_tuote = new DOMElement("tuote");
        //haetaan juuri
        $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        //lisätään juureen
        $juuri->appendChild($uusi_tuote);
        
        $uusi_tuote->appendChild(new DOMElement("nimi", $uusi_nimi));
        
        $uusi_tuote->appendChild(new DOMElement("hinta", $uusi_hinta));
        
        $uusi_tuote->setAttribute("xml:id", $tuote_id);
        
        $juuri->replaceChild($uusi_tuote,$tuote);
        
        $dom->save($tiedostonimi);
    }
    if($_REQUEST["do"] == "del")
    {
        //poisto koodi
        $tuote_id = $_REQUEST["tuote_id"];
        
        $dom = new DOMDocument("1.0");
        
        $dom->load($tiedostonimi);
        
        //poimitaan juuri ja poistettava tuote
        
        $poistettava_tuote = $dom->getElementById($tuote_id);
        
        $juuri = $dom->getElementsByTagName("tuotteet")->item(0);
        
        $juuri->removeChild($poistettava_tuote);
        
        $dom->save($tiedostonimi);
        
    }
    
    
    header("Location: index.php");
}

$dom = new DOMDocument("1.0");

$dom->load($tiedostonimi);

$tuotteet = $dom->getElementsByTagName("tuote");

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
                
                <form action="index.php" method="get">
                    
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
                
                <form action="index.php" method="get">
                    
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
                
                     <form action="index.php" method="get">
                      
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
        
        <a href="index.php?do=add">Lisää uusi tuote</a>
        
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
            
            $nimi = $tuote->getElementsByTagName("nimi")->item(0)->textContent;
            $hinta = $tuote->getElementsByTagName("hinta")->item(0)->textContent;
            $tuote_id =$tuote->getAttribute("xml:id")
            
        ?>   
        
            <tr>
                <td><?php print $nimi?></td>
                <td><?php print $hinta?> &euro;</td>
                <td><a href="index.php?do=upd&tuote_id=<?php print $tuote_id?>">Muokkaa</a></td>
                <td><a href="index.php?do=del&tuote_id=<?php print $tuote_id?>">Boista</a></td>
            </tr>
        
        <?php } ?>
        </table>
        <?php } ?>
        
        </div>
    </body>
</html>