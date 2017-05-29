<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Mikkelin Teatterin ohjelmisto, syksy 2009</title>
    </head>
    <body>
        <h1>Mikkelin Teatterin ohjelmisto, syksy 2009</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Tapahtuma ID</th>
                <th>Tapahtuma ID</th>
                <th>Järjestäjä</th>
                <th>Tilaisuuden nimi</th>
                <th>PVM</th>
                <th>Viikonpäivä</th>
                <th>Klo</th>
                <th>Esityspaikka</th>
                <th>Tilaisuuden tyyppi</th>
                <th>Linkki</th>
            </tr>
        <?php
        //$urli = "http://localhost/Santeri_Kilpi/Demot/demo02/naytokset_ws.php";
        //$urli = "http://localhost/Santeri_Kilpi/Demot/demo02/naytokset_ws.php?tapahtuma_id=18717";
        $urli = "http://localhost/Santeri_Kilpi/Demot/demo02/naytokset_ws.php?tilaisuuden_nimi=".urlencode("Naisten juomaa");
        $naytokset = file($urli);
        
        foreach($naytokset as $naytos)
        {
            $naytoksen_tiedot = explode(";",$naytos);
            
            ?>
            <tr>
                <td><?php echo $naytoksen_tiedot[0] ?></td>
                <td><?php echo $naytoksen_tiedot[1] ?></td>
                <td><?php echo $naytoksen_tiedot[2] ?></td>
                <td><?php echo $naytoksen_tiedot[3] ?></td>
                <td><?php echo $naytoksen_tiedot[4] ?></td>
                <td><?php echo $naytoksen_tiedot[5] ?></td>
                <td><?php echo $naytoksen_tiedot[6] ?></td>
                <td><?php echo $naytoksen_tiedot[7] ?></td>
                <td><?php echo $naytoksen_tiedot[8] ?></td>
                <td><?php echo $naytoksen_tiedot[9] ?></td>
            </tr>
            <?php
        }
        
        ?>
    </body>
</html>
