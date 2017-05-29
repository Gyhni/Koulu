<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Ryhmän keski-ikä-demo(SOA)</title>
    </head>
    <body>
        
        <h1>Ryhmän keski-ikä-demo(SOA)</h1>
        
        <?php
       
        $osoitteet = file("http://172.20.41.109/soa/osoitteet.txt");
        $laskuri = 0;
        $iat_yhteensa = 0;
        foreach ($osoitteet as $osoite)
        {
            $urli = "http://".trim($osoite)."/soa/annatiedot.php?data=nimi";
            $nimi = file_get_contents($urli);
            
            $urli = "http://".trim($osoite)."/soa/annatiedot.php?data=ika";
            $ika = file_get_contents($urli);
            
            echo $nimi." ".$ika." vee<br>";
            
            $iat_yhteensa = $iat_yhteensa + $ika;
            $laskuri++;
        }
        echo "<br>Ryhmä keski-ikä:".($iat_yhteensa/$laskuri)."vuotta<br>";
       
                
        ?>
        
    </body>
</html>
