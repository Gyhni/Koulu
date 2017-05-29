function sanoHeippa(){
    
        var nimi = document.getElementById("tekstikentta").value;
        var tervehdysteksti = "Tervehdys, " + nimi + "!";
    document.getElementById("tervehdys").innerHTML = tervehdysteksti;
}
