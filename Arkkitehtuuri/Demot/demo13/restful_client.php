<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>RESTful Client</title>
    </head>
    <body>
     
        <?php
        $urli = "http://localhost/soa/demo13/henkilorekisteri/100";
        
        $metodi = "DELETE";
        
        $data = Array(
                        "etunimi" => "Janne",
                        "sukunimi" => "Turunen"
                    );
        
        $lahetettava_data = json_encode($data);
        
        $curl = curl_init($urli);
        
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $metodi);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $lahetettava_data);
        
        $palautettu_data = curl_exec($curl);
        
        print $palautettu_data;
        ?>
    </body>
</html>
