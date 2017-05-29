$(function()
{
   $("#etsi").click(function()
   {
        var kunta = $("#kunta").val();
       
        var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus8/public_html/webservice.php?kunta=" + kunta;    
    
        $.get(urli, function(data)
       {
       
           var csv_data = data;
            
            var csv_rivit = csv_data.split(/\n/g);
            
            var taulu = "";
            
            
            for(var i=0 ; i < csv_rivit.length -1 ; i++)
            {
                
                var csv_tiedot = csv_rivit[i].split(";");
                
                taulu = taulu + "<tr>" + "<th>" + csv_tiedot[0] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[1] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[2] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[3] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[4] + "</th>"+"</tr>";
                
                
            }
           
           $("#taulu").html(taulu);
           
   }); 
   
       
   });
      $("#valikko").change(function()
   {
        var valinta = $("#valikko").val();
       
        var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus8/public_html/webservice.php?maakuntalistaus=" + valinta;    
    
        $.get(urli, function(data)
       {
       
           var csv_data = data;
            
            var csv_rivit = csv_data.split(/\n/g);
            
            var taulu = "";
            
            
            for(var i=0 ; i < csv_rivit.length -1 ; i++)
            {
                
                var csv_tiedot = csv_rivit[i].split(";");
                
                taulu = taulu + "<tr>" + "<th>" + csv_tiedot[0] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[1] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[2] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[3] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[4] + "</th>"+"</tr>";
                
                
            }
           
           $("#taulu").html(taulu);
           
   }); 

       
   });
        var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus8/public_html/webservice.php";
    
       $.get(urli, function(data)
       {
       
           var csv_data = data;
            
            var csv_rivit = csv_data.split(/\n/g);
            
            var taulu = "";

            
            for(var i=0 ; i < csv_rivit.length -1 ; i++)
            {
                
                var csv_tiedot = csv_rivit[i].split(";");
                
                taulu = taulu + "<tr>" + "<th>" + csv_tiedot[0] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[1] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[2] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[3] + "</th>";
                taulu = taulu + "<th>" + csv_tiedot[4] + "</th>"+"</tr>";

                
            }
           
           $("#taulu").html(taulu);

           
   }); 
   var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Harkat/Harjoitus8/public_html/webservice.php?maakunta";
   
   $.get(urli, function(data)
       {
       
           var csv_data = data;
            
            var csv_rivit = csv_data.split(/\n/g);
            
            
            var valikko = "";
            
            valikko = valikko + "<option>" + "Valitse Maakunta" + "</option>";
            
            for(var i=0 ; i < csv_rivit.length -1 ; i++)
            {
                
                var csv_tiedot = csv_rivit[i].split(";");
                
                
                valikko = valikko + "<option>" + csv_tiedot[0] + "</option>";
                
            }
           
           
           $("#valikko").html(valikko);
       });
});