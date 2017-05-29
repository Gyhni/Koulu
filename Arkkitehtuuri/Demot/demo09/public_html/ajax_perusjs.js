var xhr;

if (window.XMLHttpRequest)
{
    
    xhr = new XMLHttpRequest();
    
}
else if (window.ActiveXObject)//Jos selain on IE 7 tai aikaisempi
{
    
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
    
}

function sanoHeippa()
{
    var nimi = document.getElementById("nimi").value;
    
    var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/demo09/heippa.php?nimi=" + nimi;
    
    xhr.onreadystatechange = function() 
    {
        
        // alert(xhr.readyState + ":" + xhr.responseText);
        
        if (xhr.readyState== 4)
        {
            
            var tervehdys = xhr.responseText;
            
            document.getElementById("tervehdys").innerHTML = tervehdys;
            
        }
        
    };
    
    xhr.open("GET", urli, true);
    
    xhr.send(null);
    
}
function haeTiedot()
{

    
    var urli = "http://localhost/Santeri_Kilpi/Arkkitehtuuri/Demot/demo09/naytokset.csv";
    
    xhr.onreadystatechange = function() 
    {
        
        if (xhr.readyState== 4)
        {
            
            var csv_data = xhr.responseText;
            
            var csv_rivit = csv_data.split(/\n/g);
            
            var lista = "";
            
            for(var i=0 ; i < csv_rivit.length -1 ; i++)
            {
                
                var csv_tiedot = csv_rivit[i].split(";");
                
                lista = lista + "<li>" + csv_tiedot[3] + "</li>";
                
            }
            
            document.getElementById("lista").innerHTML = lista;
            
            //document.getElementById("tervehdys").innerHTML = tervehdys;
            
        }
        
    };
    
    xhr.open("GET", urli, true);
    
    xhr.send(null);
    
}