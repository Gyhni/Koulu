<?php

$urli = "http://www.suomenpankki.fi/fi/_layouts/BOF/RSS.ashx/tilastot/Valuutta/fi";

$dom = new DOMDocument("1.0");

$dom->load($urli);

$itemelementti = $dom->getElementsByTagName("item");

?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Valuuttamuunnin</title>
    </head>
    <body>
        <h1>Valuuttamuunnin</h1>
    <form method="get">
        Syötä euromäärä:<input type="text" name="euro"/>
        <select name="valuutta">
            
        <?php
        
        foreach ($itemelementti as $itemelementit)
        {
            
            $maa = $itemelementit->getElementsByTagName("title")->item(0)->textContent;
            $joku = explode(": ",$maa);
            
            
        ?>
            <option value="<?php echo $joku[1];?>">
            <?php print $joku[0]?>
            </option>  
        <?php
        
        }
        
        ?>
        
              
        </select>
        <input type="submit" name="aja" value="Muunna">
    </form>
        <!--Lasku toimitus!-->
        <?php
        
        if(isset($_REQUEST["aja"]))
        {
            $kerroin =$_REQUEST["valuutta"];
            $valuutta = str_replace(',', '.', $kerroin);
            $euro = $_REQUEST["euro"];
            $tulo = $euro * $valuutta;
            echo $tulo;
            
        }
       
        ?>
    </body>
</html>