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
    var h1OtsikkoSisalto = document.createTextNode("Harjoitus 4");
    var kuva = document.createElement("img");
    var leipaTeksti1Elementti = document.createElement("p");
    var leipaTeksti1Sisalto = document.createTextNode("Tähän nyt jotain tekstiä");
    var leipaTeksti2Elementti = document.createElement("p");
    var leipaTeksti2Sisalto = document.createTextNode("Ladalla pääsee mutta kuinka pitkälle?");
    
    //h1 Otsikko
    
    //Elementtiin lisätään sisältö
    h1OtsikkoElementti.appendChild(h1OtsikkoSisalto);
    //Elementti kirjoitetaan bodyyn
    document.body.appendChild(h1OtsikkoElementti);

    //kuva

    //kuvalle annetaan ominaisuuksi
    
    kuva.setAttribute("src", "gandalf.gif");

    //kuva tulostetaan
    document.body.appendChild(kuva);
    
    //p1
    
       //Elementtiiin lisätään sisältö
    leipaTeksti1Elementti.appendChild(leipaTeksti1Sisalto);
    //Elementti kirjoitetaan bodyyn
    document.body.appendChild(leipaTeksti1Elementti);
    
        //p2
    
       //Elementtiiin lisätään sisältö
    leipaTeksti2Elementti.appendChild(leipaTeksti2Sisalto);
    //Elementti kirjoitetaan bodyyn
    document.body.appendChild(leipaTeksti2Elementti);
    
    
}