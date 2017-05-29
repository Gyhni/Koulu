function haeJSONP()
{
    var urli = "http://127.0.0.1//Santeri_Kilpi/Arkkitehtuuri/Demot/demo11/jsonp_webservice.php";
    
    var skriptitagi = document.createElement("script");
    skriptitagi.setAttribute("src", urli);
    document.getElementsByTagName("head")[0].appendChild(skriptitagi);
    
}

function sanoHeippa(jsondata)
{
    
    alert("Heippa " + jsondata.nimi + "!");
    
}