<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mikkelin teatterin ohjelmisto, syksy 2009</title>
    </head>
    <body>
        
        <h1>Mikkelin teatterin ohjelmisto, syksy 2009</h1>
        
        <table border="1" cellpadding="5" cellspacing="0">
        
            <tr>
                <th>Tapahtuma ID</th>
                <th>Tilaisuus ID</th>
                <th>Järjestäjä</th>
                <th>Tilaisuuden nimi</th>
                <th>Pvm</th>
                <th>Viikonpäivä</th>
                <th>Klo</th>
                <th>Esityspaikka</th>
                <th>Tilaisuuden tyyppi</th>
                <th>Linkki</th>
            </tr>
            
        <?php
        // erilaisten webservice-kutusujen kokeiluja:
        
        //$urli = "http://localhost/soa/demo02/naytokset_ws.php";
        //$urli = "http://localhost/soa/demo02/naytokset_ws.php?tapahtuma_id=18717";
        $urli = "http://localhost/soa/demo02/naytokset_ws.php?tilaisuuden_nimi=".urlencode("Naisten juomaa");
        
        $naytokset = file($urli);
        
        foreach ($naytokset as $naytos) {
            
            $naytoksen_tiedot = explode(";", $naytos);

        ?>
            
            <tr>
                <td><?php echo $naytoksen_tiedot[0]?></td>
                <td><?php echo $naytoksen_tiedot[1]?></td>
                <td><?php echo $naytoksen_tiedot[2]?></td>
                <td><?php echo $naytoksen_tiedot[3]?></td>
                <td><?php echo $naytoksen_tiedot[4]?></td>
                <td><?php echo $naytoksen_tiedot[5]?></td>
                <td><?php echo $naytoksen_tiedot[6]?></td>
                <td><?php echo $naytoksen_tiedot[7]?></td>
                <td><?php echo $naytoksen_tiedot[8]?></td>
                <td><?php echo $naytoksen_tiedot[9]?></td>
            </tr>
            
        <?php
        }
        ?>
            
        </table>
            
    </body>
</html>
