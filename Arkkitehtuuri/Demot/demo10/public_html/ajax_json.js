$(function()
{
   
    $("#nappi01").click(function()
    {
       
        var henkilot = [
                        {
                            etunimi : "Janne",
                            sukunimi : "Turunen"
                        },
                        {
                            etunimi : "Matti",
                            sukunimi : "Nykänen"
                        }
                       ]
                       
        alert ("Tervehdys " + henkilot[1].etunimi + " " + henkilot[1].sukunimi);
        
    });
    $("#nappi02").click(function()
    {
       
        $("#nappi02").click(function()
        {
           
            var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/demo10/naytokset_json.php";
            
            $.get(urli, function(jsonData) 
            {
                
                var naytokset = jsonData;
                
                var rivit = "";
                
                for (var i = 0 ; i < naytokset.length; i++)
                {
                    
                    var nimi = naytokset[i].tilaisuuden_nimi;
                    
                    rivit +="<li>" + nimi + "</li>";
                    
                }
                
                $("#lista").html(rivit);
                
            }, "json");
            
        });
        
    });
    
});