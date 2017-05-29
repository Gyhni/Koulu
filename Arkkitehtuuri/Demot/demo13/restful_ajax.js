$(function () {
    
   $("#nappi01").click(function() {
       
       var id = "123";
       
       var urli = "http://localhost/soa/demo13/henkilorekisteri/" + id; 

       var metodi = "PUT";
       
       var lahetettava_data = JSON.stringify({
                                                etunimi : "Janne",
                                                sukunimi: "Turunen"
                                             });
     
       $.ajax({
                url     : urli,
                type    : metodi,
                data    : lahetettava_data
              })
              .done(function (palautettu_data) {
                  
                  $("#info").html("Palautettu data: " + palautettu_data);
          
              })
              .fail(function () {
                  
                  $("#info").html("AJAX-kutsu epäonnistui!");
                  
              });

       
       /* Vanha tapa, voi olla että tuki loppuu!
       $.ajax({
                url     : urli,
                type    : metodi,
                data    : lahetettava_data,
                success : function (palautettu_data) {
                            
                            $("#info").html("Palautettu data: " + palautettu_data);
                            
                          },
                error   : function () {
                    
                            $("#info").html("AJAX-kutsu epäonnistui!");
                            
                    
                          }
              });
       */
   });
    
});