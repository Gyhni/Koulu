if(window.addEventListener)
{
window.addEventListener("load", init);
}
else
{
    window.attachEvent("onload",init); //jos selain <IE 9.0
}
function init()
{
    var linkit = document.getElementsByTagName("a");
    var i = 0;
    
    for (i=0;i<linkit.length;i++)
    {
        linkit[i].addEventListener("click", naytaKuva);
    }
    
}

function naytaKuva(e)
{
    e.preventDefault();//estää linkkinen toimimisen normaalisti.
    
    var kuvanOsoite = this.href;
    var kuvaIkkuna = document.createElement("div");
    
    kuvaIkkuna.setAttribute("id", "kuvaIkkuna");
    //css manipulaatio
    kuvaIkkuna.style.border = "solid 1px black";
    kuvaIkkuna.style.backgroundColor = "white";
    kuvaIkkuna.style.width = "1024px";
    kuvaIkkuna.style.height = "768px";
    kuvaIkkuna.style.position = "absolute";
    kuvaIkkuna.style.top = "350px";
    kuvaIkkuna.style.left = "40px";
    kuvaIkkuna.style.boxShadow = "10px 10px 10px yellowgreen";
    //haetaan kuva boxiin
    var isoKuva = document.createElement("img");
    
    isoKuva.setAttribute("src", kuvanOsoite);
    isoKuva.setAttribute("width","1024");
    isoKuva.setAttribute("height","768");
    
    kuvaIkkuna.appendChild(isoKuva);
    
    document.body.appendChild(kuvaIkkuna);
    
    kuvaIkkuna.addEventListener("click", suljeKuva);
    
}
function suljeKuva()
{
    //this.parentNode.removeChild(this);
    //TAI vaihtoehtoisesti
    var kuvaIkkuna = document.getElementById("kuvaIkkuna");
    
    kuvaIkkuna.parentNode.removeChild(kuvaIkkuna);
}