$(function () 
{
    var i = -1;
    
    setInterval(function()
    {
        if(i < 5 )
        {  
        var url = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harj10/webservice.php";
        
        $.getJSON(url, function(jsonData)
        {
           
            var uutiset = jsonData;
            
            var rivi = "";
            
            i++
            
                var otsikko = uutiset[i].otsikko;
                var sisalto = uutiset[i].sisalto;
                var linkki = uutiset[i].linkki;
                var kuva = uutiset[i].kuva;
                
                
                rivi += "<h3>" + otsikko + "</h3>";
                rivi += sisalto + "</br>";
                rivi += "<a href='"+linkki+"' target='_blank'>Lue lisää</a><br>";
                rivi += "<img src='"+kuva+"'</img>";
                                
            
            
            $("#uutiset").html(rivi);
            
        });
        }
        else
        {
            i=-1;
        }
    },5000);    
});