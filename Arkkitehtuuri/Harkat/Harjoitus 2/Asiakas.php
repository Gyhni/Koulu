<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Harjoitus 2</title>
    </head>
    <body>
        <h1>Harjoitus 2</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Alue ID</th>
                <th>Kunta</th>
                <th>Lääni</th>
                <th>Maakunta</th>
                <th>Seutukunta</th>
            </tr>
            <form action="Asiakas.php" method="get">
            Syötä kunnan nimi:<input type="text" name="kunta"/>
            <input type="submit" name="nappi" value="Nappi"/>
            </form>
        <?php
        
        if(isset($_REQUEST["nappi"]))
        {
            $kunta = $_REQUEST["kunta"];
            
            $urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus%202/webservice.php?kunta=".$kunta;
        }
        else
        {
            
        $urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus%202/webservice.php";
        
        
        }
       
        $alueet = file($urli);
        
        foreach($alueet as $alue)
        {
            $alue_tiedot = explode(";",$alue);
            if($alue != "kalkkuna")
            {
            ?>
            
            <tr>
                <td><?php echo $alue_tiedot[0] ?></td>
                <td><?php echo $alue_tiedot[1] ?></td>
                <td><?php echo $alue_tiedot[2] ?></td>
                <td><?php echo $alue_tiedot[3] ?></td>
                <td><?php echo $alue_tiedot[4] ?></td>
            </tr>
            <?php
            }
            else
            {
                echo "<h1>Kuntaa ei löydy</h1>";
            }
        }
       
        ?>
    </body>
</html>