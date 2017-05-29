function sanoHeippa() {
    
    var nimi = document.getElementById("nimi").value;
    
    var tervehdysteksti = "Tervehdys, " + nimi + "!";
    
    document.getElementById("tervehdys").innerHTML = tervehdysteksti;
    
}

function laske() {

    var luku1 = document.getElementById("luku1").value;
    var luku2 = document.getElementById("luku2").value;
    
    var laskutoimitus = document.getElementById("laskutoimitus").value;
    
    var tulos = 0;
    
    if (laskutoimitus === "plussa") {
        
        tulos = Number(luku1) + Number(luku2);
        
    }
    
    if (laskutoimitus === "miinus") {
        
        tulos = Number(luku1) - Number(luku2);
        
    }

    if (laskutoimitus === "kerto") {
        
        tulos = Number(luku1) * Number(luku2);
        
    }    
    
    if (laskutoimitus === "jako") {
        
        tulos = Number(luku1) / Number(luku2);
        
    }    
    
    document.getElementById("tulos").innerHTML = "Tulos: " + tulos;
    
    
}