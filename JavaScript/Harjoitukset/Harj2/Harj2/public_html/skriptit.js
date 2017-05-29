var tulos = 0;

function laske()
{
    
        var hinta1 = document.getElementById("hinta1").value;
        var hinta2 = document.getElementById("hinta2").value;
        var hinta3 = document.getElementById("hinta3").value;
        var hinta4 = document.getElementById("hinta4").value;
        
       

    tulos = Number(hinta1)+Number(hinta2)+Number(hinta3)+Number(hinta4);

    var loppusumma = "Lopullinen hinta:" + tulos + "€";
    document.getElementById("summa").innerHTML = loppusumma;
}

function tayta()
{
    var nimi = document.getElementById("nimi").value;
    if (nimi.lenght == 0)
    {
        alert("Täytyä nimi");
    }
}