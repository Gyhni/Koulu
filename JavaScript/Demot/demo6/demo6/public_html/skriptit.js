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
    
    var h1OtsikkoElementti = document.createElement("h1");
    var h1OtsikkoSisalto = document.createTextNode("Javascript ja HTML-DOM");
    var h2OtsikkoElementti = document.createElement("h1");
    var h2OtsikkoSisalto = document.createTextNode("Hello world, puhdas DOM toteutus");
    var inputKentta = document.createElement("input");
    var painoNappi = document.createElement("button");
   
    h1OtsikkoElementti.appendChild(h1OtsikkoSisalto);
    
    document.body.appendChild(h1OtsikkoElementti);
    //document.body.insertBefore(h1OtsikkoElementti, document.body.childNodes[0]); //varma tapa saada teksti sivun alkuun

    
    h2OtsikkoElementti.appendChild(h2OtsikkoSisalto);
    
    document.body.appendChild(h2OtsikkoElementti);
    
    document.body.appendChild(document.createTextNode("Anna Nimesi:"));
    
    inputKentta.setAttribute("type", "text");//Asettaa ominaisuuksia
    inputKentta.setAttribute("size", "10");
    inputKentta.setAttribute("id", "tekstikentta");
    
    painoNappi.appendChild(document.createTextNode("Sano Heippa!"));
    
    document.body.appendChild(inputKentta);
    
    document.body.appendChild(painoNappi);
    
    painoNappi.addEventListener("click",sanoHeippa);
    //TAI vaihto ehtoisesti
   // painoNappi.setAttribute("onCLick", "sanoHeippa()");

}

function sanoHeippa()
{
    var nimi = document.getElementById("tekstikentta").value;
    var tervehdys = "Heippa " + nimi + "!!!!!!! XD :D LOLOLOLOLO SCRUB";
    
    var divTervehdys = document.createElement("div");
    
    divTervehdys.setAttribute("id","tervehdys");
    
    divTervehdys.appendChild(document.createTextNode(tervehdys));
    
    if(document.getElementById("tervehdys"))//Jos DIV elementti on jo olemassa
    {
        var divVanha = document.getElementById("tervehdys");
        
        document.body.replaceChild(divTervehdys, divVanha);//oikeampi tapa
        //TAI vaihtoehtoisesti
        //document.getElementById("tervehdys").innerHTML = tervehdys;//Mahdollistaa nimen vaihtamisen
    }
    else//muuten luodaan uusi
    {
        document.body.appendChild(divTervehdys);
    }
    
   // alert (tervehdys);
}