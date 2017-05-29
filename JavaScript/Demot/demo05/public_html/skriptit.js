var vasen = 0;
var suunta = 1;

function kellonaika()
{
    var aika_nyt = new Date();
    var tunnit = aika_nyt.getHours();
    var minuutit = aika_nyt.getMinutes();
    var sekunnit = aika_nyt.getSeconds();
        if (tunnit < 10)
    {
        tunnit = "0" + tunnit;
    }
    if (minuutit < 10)
    {
        minuutit = "0" + minuutit;
    }
    if (sekunnit < 10)
    {
        sekunnit = "0" + sekunnit;
    }
    var kello = tunnit + ":" + minuutit + ":" + sekunnit;
    
    document.getElementById("kello").innerHTML = kello;
    
    var ajastin = setTimeout("kellonaika()", 10);
}

function liiku()
{
    vasen = vasen + (suunta * 1);
    if(vasen > 800)
    {
        suunta = -1;
    }
    if(vasen < 0)
    {
        suunta =  1;
    }
    document.getElementById("ympyra").style.left =vasen + "px";
    
    //var ajastin = setTimeout("liiku()",1);
    requestAnimationFrame(liiku); //vaihtoehtoinen tapa
}