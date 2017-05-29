<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
            $urli="http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/dmeo12/rest_webservice.php";
            
            $metodi = "DELETE";
            
            $data = Array
                (
                
                    "etunimi" => "Hermanni",
                    "sukunimi" => "Hattu"
                
                );
            
            $lahetettava_data = json_encode($data);
            
            $curl = curl_init($urli);
            
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl,CURLOPT_CUSTOMREQUEST, $metodi);
            curl_setopt($curl,CURLOPT_POSTFIELDS, $lahetettava_data);
            
            $palautettu_data = curl_exec($curl);
            
            print $palautettu_data
        ?>
    </body>
</html>
