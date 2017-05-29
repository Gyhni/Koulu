$(function() 
{    
    var pelin_leveys = 640;
    var pelin_korkeus = 480;
    var random_y = Math.floor(Math.random()* 440);
    var tila;
    var ammu = 0;
    var pisteet = 0;
    
    var hiiriX;
    var hiiriY;
    
    var laskuri = 1;
    var maksiminopeus = 10;
    var nopeus = 4;
    var liikumisnopeus = 3;

    var animaatio_kaynnissa = false;
    
    var alusta = $("#alusta").get(0);
    alusta.width = pelin_leveys;
    alusta.height = pelin_korkeus;
    
    var konteksti = alusta.getContext("2d");
    
    //ase frame
    var aframe_x = 0;
    var aframe_y = 0;
    var aframe_leveys = 96;
    var aframe_korkeus = 114;
    var aframe_lkm = 3;
    
    var ase = new Image();
    ase.src = "suora.png";
    var vasenase = new Image();
    vasenase.src = "vasen.png";
    var oikeaase = new Image();
    oikeaase.src = "oikea.png";
    var suoraase = new Image();
    suoraase.src = "suora.png";
    var ase_koko = 1;
    var ase_x = 270;
    var ase_y = 370;
    var ase_leveys = (aframe_leveys * ase_koko);
    var ase_korkeus = (aframe_korkeus * ase_koko);
     
    
    
    //sorsa framet
    var frame_x = 0;
    var frame_y = 0;
    var frame_leveys = 77;
    var frame_korkeus = 40;
    var frame_lkm = 2;
    
    var sorsa = new Image();
    sorsa.src = "sorsasprite.png";
    var sorsa_koko = 1.2;
    var sorsa_x = 0;
    var sorsa_y = 480;
    var sorsa_leveys = (frame_leveys * sorsa_koko);
    var sorsa_korkeus = (frame_korkeus * sorsa_koko);
    
    var raketti = new Image();
    raketti.src = "rocket.png";
    
    var nousu = 1;
    
    function uusi_sorsa()
        {
            
            if(pisteet >= 10)
            {
            
            sorsa = raketti;
            
            }
            else
            {
            
            sorsa = sorsa;
            
            }
            sorsa_koko = Math.floor(Math.random()* 4);
            if(sorsa_koko<=0)
            {
                sorsa_koko = 1.2
            }
            sorsa_x = 0 - 100;
            var uusi_random_y = Math.floor(Math.random()* 440);
            
            sorsa_y = uusi_random_y;
            sorsa_leveys = (frame_leveys * sorsa_koko);
            sorsa_korkeus = (frame_korkeus * sorsa_koko);
            konteksti.clearRect(0,0,pelin_leveys,pelin_korkeus);
            konteksti.drawImage(sorsa, frame_x, frame_y, frame_leveys, frame_korkeus, sorsa_x, sorsa_y, sorsa_leveys, sorsa_korkeus);
            
            
            if(sorsa_y < (pelin_korkeus/2))
            {
                nousu = 1;
            }
            if(sorsa_y >= (pelin_korkeus/2))
            {
                nousu = -1;
            }
        };
    
    alku();
    

    
    function alku()
    {
        tila = "alku";
        pisteet = 0;
        //Alku kuva
        var naytto = new Image();
        naytto.src = "Naytto.png";
        naytto.onload = function ()
        {
        konteksti.drawImage(naytto,0,0);
        };
        
    }
    
    function animoi()
    {
    konteksti.clearRect(0,0, pelin_leveys, pelin_korkeus);
    konteksti.drawImage(ase, aframe_x, aframe_y, aframe_leveys, aframe_korkeus, ase_x, ase_y, ase_leveys, ase_korkeus);
        if(laskuri === (maksiminopeus - nopeus))
            {
                if(frame_x < (frame_leveys * (frame_lkm - 1)))
                {
                    frame_x += frame_leveys;

                }
                else
                {
                    frame_x = 0;
                }
                laskuri = 1;
            }
            else
            {
                laskuri++;
            }

            sorsa_x += liikumisnopeus;
            sorsa_y += nousu;

            if(sorsa_x < (pelin_leveys))
            {
                
                konteksti.drawImage(sorsa, frame_x, frame_y, frame_leveys, frame_korkeus, sorsa_x, sorsa_y, sorsa_leveys, sorsa_korkeus);
                
                window.requestAnimationFrame(animoi);
            }
            else
            {
                
                uusi_sorsa();
                 
                window.requestAnimationFrame(animoi);
                
            }
            if(pisteet == 15)
            {
                loppu();
            }
            
            $("#pisteet").html("Taso: " + pisteet);
    }

    $("#alusta").mousedown(function(e)
        {
                ammu = 1;
                
                hiiriX = e.pageX - this.offsetLeft;
                hiiriY = e.pageY - this.offsetTop;
                
                if(hiiriX >= sorsa_x && hiiriX < (sorsa_x + sorsa_leveys) && hiiriY >= sorsa_y && hiiriY < (sorsa_y + sorsa_korkeus))
                {
                    liikumisnopeus = liikumisnopeus + (pisteet/4);
                    uusi_sorsa();
                    pisteet ++;
                }
                
        });
    $("#alusta").mousemove(function(e)
        {
                
                hiiriX = e.pageX - this.offsetLeft;
                
                if(hiiriX < (pelin_leveys/3))
                {
                   ase = vasenase; 
                }
                if(hiiriX >= (pelin_leveys/3) && hiiriX <= ((pelin_leveys/3)*2))
                {
                    ase = suoraase;  
                }
                if(hiiriX > ((pelin_leveys/3)*2))
                {
                   ase = oikeaase;  
                }
                     
        });
    function loppu()
    {
        tila = "loppu";
        konteksti.clearRect(0,0,pelin_leveys,pelin_korkeus);
        konteksti.fillStyle = "black";
        konteksti.fillRect(0,0,pelin_leveys,pelin_korkeus);
        
        var piste_teksti = "Pisteet: " + pisteet;
        konteksti.fillStyle = "white";
        konteksti.font = "10px Arial";
        var piste_leveys = konteksti.measureText(piste_teksti).width;
        konteksti.fillText(piste_teksti,(pelin_leveys/2 - piste_leveys/2),(pelin_korkeus/2)+30,piste_leveys,30);
    }

    // Spawnataan sorsa
    $(document).keydown(function(e)
    {
    
    if(e.keyCode === 13)
    {
        
        if(animaatio_kaynnissa === false)
        {
            animaatio_kaynnissa = true;
            animoi();
            sorsa_x = (sorsa_x - sorsa_leveys);
            sorsa_y = random_y;
        }
            if(sorsa_y < (pelin_korkeus/2))
            {
                nousu = 1;
            }
            if(sorsa_y >= (pelin_korkeus/2))
            {
                nousu = -1;
            }
        
        
    }
    });
   $("#pelialusta").click(function(e)
   {
       if(tila == "loppu")
     {
         tila = "alku";
     }
   });
});