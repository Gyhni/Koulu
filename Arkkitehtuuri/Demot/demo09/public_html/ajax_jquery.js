$(function()
{
    
   $("#nappi01").click(function()
   {
        var nimi = $("#nimi").val();
       
        var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/demo09/heippa.php?nimi=" + nimi;    
    
        $("#tervehdys").load(urli);
       
   });
   
   $("#nappi02").click(function()
   {
   
        var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/demo09/naytokset.csv";
    
       $.get(urli, function(data)
       {
       
           var csv_data = data;
            
            var csv_rivit = csv_data.split(/\n/g);
            
            var lista = "";
            
            for(var i=0 ; i < csv_rivit.length -1 ; i++)
            {
                
                var csv_tiedot = csv_rivit[i].split(";");
                
                lista = lista + "<li>" + csv_tiedot[3] + "</li>";
                
            }
           
           $("#lista").html(lista);
           
       });
   });   
});