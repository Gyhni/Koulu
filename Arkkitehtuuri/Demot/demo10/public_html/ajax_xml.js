$(function()
{
    
    $("#nappi01").click(function()
    {
       
        var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/demo10/rss.php";
        
        $.get(urli, function(xmlData)
        {
            
            var itemit = xmlData.getElementsByTagName("item");
            
            var uutiset = "";
            
            for(var i = 0; i < itemit.length; i++)
            {
                
                var otsikko = itemit[i].getElementsByTagName("title")[0].firstChild.nodeValue;
                
               uutiset = uutiset + "<li>" + otsikko + "</li>";
                
            }
            $("#uutiset").html(uutiset);
        },"xml");
        
    });
    
});