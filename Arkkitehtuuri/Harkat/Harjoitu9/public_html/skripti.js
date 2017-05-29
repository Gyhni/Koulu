$(function()
{

var j = 0;
var yhteensa = 0;

    $.get("http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitu9/webservice.php?maara",function(jsonData)
    {
        
        yhteensa = Number(jsonData[0].maara);
        
    var sivu = "";
    
    for(var i = 0; i <(yhteensa/200); i++)
    {
        
        sivu +="<option val="+i+">" + i  + "</option>";
        
    }
    $("#numero").html(sivu);
    $("#numero").change(function()
   {
        if(j>yhteensa-400)
        {

            $("#seuraavat").css("display", "none");

        }
        if(j<=200)
        {

            $("#edelliset").css("display", "none");

        }
        else
        {

            $("#seuraavat").css("display", "block");
            $("#edelliset").css("display", "block");

        }   
            j = $("#numero").val() * 200;
       
       var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitu9/webservice.php?k="+j;

       $.get(urli, function(jsonData) 
            {
                
                var elokuvat = jsonData;
                var rivit = "";
                
                for (var i = 0 ; i < elokuvat.length; i++)
                {
 
                    rivit +="<tr>" + "<th>" + elokuvat[i].elokuva_id  + "</th>";
                    rivit +="<th>" + elokuvat[i].elokuvan_nimi  + "</th>";
                    rivit +="<th>" + elokuvat[i].valmistumisvuosi  + "</th>";
                    rivit +="<th>" + elokuvat[i].kategoria + "</th>";
                    rivit +="<th>" + elokuvat[i].ohjaajat + "</th>";
                    rivit +="<th>" + elokuvat[i].nayttelijat + "</th>" + "</tr>";
                        
                }
                
                $("#lista").html(rivit);
                
                
            }, "json");
   });
    });
    
    
        
    
    var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitu9/webservice.php";
        
            $.get(urli, function(jsonData) 
            {
                
                var elokuvat = jsonData;
                
                var rivit = "";
                
                
                for (var i = 0 ; i < elokuvat.length; i++)
                {
                    
                    
                    rivit +="<tr>" + "<th>" + elokuvat[i].elokuva_id  + "</th>";
                    rivit +="<th>" + elokuvat[i].elokuvan_nimi  + "</th>";
                    rivit +="<th>" + elokuvat[i].valmistumisvuosi  + "</th>";
                    rivit +="<th>" + elokuvat[i].kategoria + "</th>";
                    rivit +="<th>" + elokuvat[i].ohjaajat + "</th>";
                    rivit +="<th>" + elokuvat[i].nayttelijat + "</th>" + "</tr>";
                    
                    
                }
                
                $("#lista").html(rivit);
                
                
            }, "json");
            
   $("#seuraavat").click(function()
   {
        if(j>yhteensa-400)
        {

            $("#seuraavat").css("display", "none");

        }
        else
        {

            $("#seuraavat").css("display", "block");
            $("#edelliset").css("display", "block");

        }   
            j = j + 200;
       
       var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitu9/webservice.php?k="+j;

       $.get(urli, function(jsonData) 
            {
                
                var elokuvat = jsonData;
                var rivit = "";
                
                for (var i = 0 ; i < elokuvat.length; i++)
                {
 
                    rivit +="<tr>" + "<th>" + elokuvat[i].elokuva_id  + "</th>";
                    rivit +="<th>" + elokuvat[i].elokuvan_nimi  + "</th>";
                    rivit +="<th>" + elokuvat[i].valmistumisvuosi  + "</th>";
                    rivit +="<th>" + elokuvat[i].kategoria + "</th>";
                    rivit +="<th>" + elokuvat[i].ohjaajat + "</th>";
                    rivit +="<th>" + elokuvat[i].nayttelijat + "</th>" + "</tr>";
                        
                }
                
                $("#lista").html(rivit);
                
                
            }, "json");
   });
   
   $("#edelliset").click(function()
   {
        if(j<=200)
        {

            $("#edelliset").css("display", "none");

        }
        else
        {
            $("#seuraavat").css("display", "block");
            $("#edelliset").css("display", "block");

        }  
            j = j - 200;
       
       var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitu9/webservice.php?k="+j;

       $.get(urli, function(jsonData) 
            {
                
                var elokuvat = jsonData;
                var rivit = "";
                
                for (var i = 0 ; i < elokuvat.length; i++)
                {
 
                    rivit +="<tr>" + "<th>" + elokuvat[i].elokuva_id  + "</th>";
                    rivit +="<th>" + elokuvat[i].elokuvan_nimi  + "</th>";
                    rivit +="<th>" + elokuvat[i].valmistumisvuosi  + "</th>";
                    rivit +="<th>" + elokuvat[i].kategoria + "</th>";
                    rivit +="<th>" + elokuvat[i].ohjaajat + "</th>";
                    rivit +="<th>" + elokuvat[i].nayttelijat + "</th>" + "</tr>";
                        
                }
                
                $("#lista").html(rivit);
                
                
            }, "json");
   });
   


});