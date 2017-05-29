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
    var kuvanTeksti = this.rel;
    
    kuvaIkkuna.setAttribute("id", "kuvaIkkuna");
    //css manipulaatio
    kuvaIkkuna.style.border = "solid 1px black";
    kuvaIkkuna.style.width = "800px";
    kuvaIkkuna.style.height = "600px";
    kuvaIkkuna.style.position = "relative";
    

    //haetaan kuva boxiin
    var isoKuva = document.createElement("img");
    
    isoKuva.setAttribute("src", kuvanOsoite);
    isoKuva.setAttribute("width","800");
    isoKuva.setAttribute("height","600");
    
    
    var kuvaTeksti = document.createElement("div");

    kuvaTeksti.setAttribute("id","kuvaTeksti");

    kuvaTeksti.style.marginTop = "-30px";
    kuvaTeksti.style.border = "solid 1px #fff000";
    kuvaTeksti.style.borderRadius = "15px";
    kuvaTeksti.style.backgroundColor = "#fff000";
    kuvaTeksti.style.position = "relative";
    kuvaTeksti.style.opacity = "0.8";

    kuvaTeksti.innerHTML = kuvanTeksti;
    
    kuvaIkkuna.appendChild(isoKuva);
    kuvaIkkuna.appendChild(kuvaTeksti);
    //Korvaa vanhan ison kuvan jos se on luotu jo. Jos ei luo uuden.
    if (document.getElementById("kuvaIkkuna"))
    {
        document.body.replaceChild(kuvaIkkuna,document.getElementById("kuvaIkkuna"));
        
    }
    else
    {
        document.body.appendChild(kuvaIkkuna);
    
    }
    //Klikkaus valo
    keittio.style.boxShadow = "";
    makkari.style.boxShadow = "";
    makuuhuone.style.boxShadow = "";
    olkkari.style.boxShadow = "";
    talo.style.boxShadow = "";
    vessa.style.boxShadow = "";
    
    if(kuvanTeksti == "Keittiö")
    {
        keittio.style.boxShadow = "0px 0px 3px 3px red";
    }
    else if(kuvanTeksti == "Makkari")
    {
        makkari.style.boxShadow = "0px 0px 3px 3px red";
    }
    else if(kuvanTeksti == "Makuuhuone")
    {
        makuuhuone.style.boxShadow = "0px 0px 3px 3px red";
    }
    else if(kuvanTeksti == "Olkkari")
    {
        olkkari.style.boxShadow = "0px 0px 3px 3px red";
    }
    else if(kuvanTeksti == "Talo")
    {
        talo.style.boxShadow = "0px 0px 3px 3px red";
    }
    else if(kuvanTeksti == "Vessa")
    {
        vessa.style.boxShadow = "0px 0px 3px 3px red";
    }
    
}
