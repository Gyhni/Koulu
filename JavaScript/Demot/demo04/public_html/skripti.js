function vaihdaVari()
{
    var vari = document.getElementById("vari").value;
    
    document.getElementById("tekstialue").style.backgroundColor = vari;
}
function piilota()
{
    var tekstialue =  document.getElementById("tekstialue");
    
    tekstialue.style.display = "none";
    
    // tai vaitoehtoisesti
    
    //tekstialue.style.visibility = "hidden";
    //laatikko jää elementtinä
}
function nayta()
{
    var tekstialue =  document.getElementById("tekstialue");
    
    tekstialue.style.display = "block";
    
    // tai vaitoehtoisesti
    
    //tekstialue.style.visibility = "visible";
}
function vaihdaKuva()
{
    var hover_kuva = new Image();//Kuvan esilataus
    
    hover_kuva.src = "koala2.jpg";//nopeuttaa kuvan vaihtamista
    
    document.getElementById("kuva").src = hover_kuva.src;
}
function vaihdaKuvaTakas()
{
    var hover_kuva = new Image();//Kuvan esilataus
    
    hover_kuva.src = "koala.jpg";//nopeuttaa kuvan vaihtamista
    
    document.getElementById("kuva").src = hover_kuva.src;
}