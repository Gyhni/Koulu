$(function()
{
    
    setInterval(function()
    {
       var urli = "https://api.flickr.com/services/feeds/photos_public.gne?format=json&jsoncallback=?";
       
       $.getJSON(urli, function(jsonData)
       {
           
                kuva = jsonData.items[0].media.m;
                
                tulos = "<img src='"+kuva+"'>";
                
                $("#laatikko").html(tulos);
                
       });
       
        
        
    }, 2000);
    
});