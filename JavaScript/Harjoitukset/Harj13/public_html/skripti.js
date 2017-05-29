$(function() 
{    
    var pelin_leveys = 640;
    var pelin_korkeus = 480;
    var random_y = Math.floor(Math.random()* 440);
    var tila;
    var ammu = 0;
    var pisteet = 0;
    var ammukset = 30;
    var lataus = 516;
    var kombo = 0;
    
    var hiiriX;
    var hiiriY;
    
   var napin_leveys;
   var napin_korkeus;
   
   var napin_x;
   var napin_y;
    //äänet
    
    var aani = new Audio();
    aani.src = "haulikko2.mp3";
    aani.loop = false;
    
    var first = new Audio();
    first.src = "First.mp3";
    first.loop = false;
    
    var double = new Audio();
    double.src = "Double.mp3";
    double.loop = false;
    
    var triple = new Audio();
    triple.src = "Triple.mp3";
    triple.loop = false;
    
    var spree = new Audio();
    spree.src = "Spree.mp3";
    spree.loop = false;
    
    var unstop = new Audio();
    unstop.src = "Unstop.mp3";
    unstop.loop = false;
    
    var mega = new Audio();
    mega.src = "Mega.mp3";
    mega.loop = false;
    
    var sick = new Audio();
    sick.src = "Sick.mp3";
    sick.loop = false;
    
    var combo = new Audio();
    combo.src = "Combo.mp3";
    combo.loop = false;
    
    var monster = new Audio();
    monster.src = "Monster.mp3";
    monster.loop = false;
    
    
    
    var laskuri = 1;
    var laskuri2 = 1;
    var maksiminopeus = 10;
    var nopeus = 1;
    var alkunopeus = nopeus;
    var liikumisnopeus = 3;

    var animaatio_kaynnissa = false;
    
    var alusta = $("#alusta").get(0);
    alusta.width = pelin_leveys;
    alusta.height = pelin_korkeus;
    
    var konteksti = alusta.getContext("2d");
    
    //ase frame
    var aframe_x = 0;
    var aframe_y = 0;
    var aframe_leveys = 129;
    var aframe_korkeus = 196;
    var aframe_lkm = 6;
    
    var ase = new Image();
    ase.src = "ase.png";
    var vasenase = new Image();
    vasenase.src = "vasen.png";
    var oikeaase = new Image();
    oikeaase.src = "oikea.png";
    var suoraase = new Image();
    suoraase.src = "ase.png";
    var ase_koko = 1;
    var ase_x = 270;
    var ase_y = 300;
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
    var nsorsa = new Image();
    nsorsa.src = "sorsasprite.png";
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
            
            sorsa = nsorsa;
            
            }
            sorsa_koko = Math.floor(Math.random()* 4);
            if(sorsa_koko<=0)
            {
                sorsa_koko = 1.2
            }
            sorsa_x = (0 - (frame_leveys * sorsa_koko));
            var uusi_random_y = Math.floor(Math.random()* 440);
            
            sorsa_y = uusi_random_y;
            sorsa_leveys = (frame_leveys * sorsa_koko);
            sorsa_korkeus = (frame_korkeus * sorsa_koko);
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
        
        if(animaatio_kaynnissa === false)
        {
            animaatio_kaynnissa = true;
            
            sorsa_x = (sorsa_x - sorsa_leveys);
            sorsa_y = random_y;
            if(sorsa_y < (pelin_korkeus/2))
            {
                nousu = 1;
            }
            if(sorsa_y >= (pelin_korkeus/2))
            {
                nousu = -1;
            }
        }
        
       tila = "alku";
       pisteet = 0;
       
       konteksti.clearRect(0,0,pelin_leveys,pelin_korkeus);
       konteksti.fillStyle = "black";
       konteksti.fillRect(0,0,pelin_leveys,pelin_korkeus);
       
       var otsikko = "Awesome Duck Hunt v0.8";
       konteksti.fillStyle = "white";
       konteksti.font = "30px Arial";
       var tekstin_leveys = konteksti.measureText(otsikko).width;
       konteksti.fillText(otsikko,(pelin_leveys/2 - tekstin_leveys/2),(pelin_korkeus/2),tekstin_leveys,30);
       
       
       napin_leveys = 150;
       napin_korkeus = 30;
       
       napin_x = (pelin_leveys/2 - napin_leveys/2);
       napin_y = (pelin_korkeus/2 + 40);
       
       konteksti.fillRect(napin_x,napin_y,napin_leveys,napin_korkeus);
       
       konteksti.fillStyle = "black";
       konteksti.font = "20px Arial";
       konteksti.fillText("Aloita peli",napin_x+35,napin_y+22);
       
    }
    
    function animoi()
    {
    
        
    tila = "animoi";
    konteksti.clearRect(0,0, pelin_leveys, pelin_korkeus);
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
            if(ammukset == 0)
            {
                window.cancelAnimationFrame(animoi);
                loppu();
            }
            else
            {
            if(sorsa_x < (pelin_leveys))
            {
                konteksti.drawImage(sorsa, frame_x, frame_y, frame_leveys, frame_korkeus, sorsa_x, sorsa_y, sorsa_leveys, sorsa_korkeus);
                window.requestAnimationFrame(animoi);
            }
            else
            {   
                kombo = 0;
                uusi_sorsa();
                window.requestAnimationFrame(animoi);
            }
            }
            //ase animaatio
        if(ammu === 1)
            {
                if(laskuri2 === 12)
                {
                    if(aframe_x <= (aframe_leveys * (aframe_lkm - 1)))
                    {
                        
                        aframe_x += aframe_leveys;
                        if(aframe_x <= lataus && aframe_x !== 0)
                        {
                            ammu = 1;
                            
                        }
                        else
                        {
                            ammu = 0;
                        }
                        if(aframe_x == lataus)
                        {
                            ammukset--;
                        }
                        
                        
                    }
                    else
                    {
                        aframe_x = 0;
                    }
                    laskuri2 = 1;
                }
                else
                    {
                        laskuri2++;
                        
                    }
                    
            }
        else
        {
            aframe_x= 0;
        }

    konteksti.drawImage(ase, aframe_x, aframe_y, aframe_leveys, aframe_korkeus, ase_x, ase_y, ase_leveys, ase_korkeus);
    
        var otsikko = "Ammukset: " + ammukset;
        konteksti.fillStyle = "red";
        konteksti.font = "20px Arial";
        var tekstin_leveys = konteksti.measureText(otsikko).width;
        konteksti.fillText(otsikko,(pelin_leveys - tekstin_leveys),(pelin_korkeus),tekstin_leveys,30);
        $("#pisteet").html("Taso: " + pisteet + " Kombo: " + kombo);
        
        
            
    }
    $("#alusta").mousedown(function(e)
        {
                ammu = 1;
                
                
                aani.play();
                
                hiiriX = e.pageX - this.offsetLeft;
                hiiriY = e.pageY - this.offsetTop;
                
                
                if(hiiriX >= sorsa_x && hiiriX < (sorsa_x + sorsa_leveys) && hiiriY >= sorsa_y && hiiriY < (sorsa_y + sorsa_korkeus))
                {
                    liikumisnopeus = liikumisnopeus + (pisteet/4);
                    uusi_sorsa();
                    pisteet++;
                    kombo++;
                    if(pisteet == 1)
                    {
                       first.play();
                       
                    }
                    if(kombo == 2)
                    {
                       double.play();
                       
                    }
                    if(kombo == 3)
                    {
                       triple.play();
                       
                    }
                    if(kombo == 4)
                    {
                       spree.play();
                       
                    }
                    if(kombo == 5)
                    {
                       unstop.play();
                       
                    }
                    if(pisteet == 5)
                    {
                       mega.play();
                       
                    }
                    if(pisteet == 10)
                    {
                       sick.play();
                       
                    }
                    if(kombo == 10)
                    {
                       combo.play();
                       
                    }
                    if(pisteet == 15)
                    {
                       monster.play();
                       
                    }
                    
                    
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

        
       var otsikko = "Pisteet: " + pisteet;
       konteksti.fillStyle = "white";
       konteksti.font = "30px Arial";
       var tekstin_leveys = konteksti.measureText(otsikko).width;
       konteksti.fillText(otsikko,(pelin_leveys/2 - tekstin_leveys/2),(pelin_korkeus/2),tekstin_leveys,30);
        
        var mini_teksti = "(Aloita painamalla Entteriä)";
        konteksti.fillStyle = "white";
        konteksti.font = "10px Arial";
        var mini_leveys = konteksti.measureText(mini_teksti).width;
        konteksti.fillText(mini_teksti,(pelin_leveys/2 - mini_leveys/2),(pelin_korkeus/2)+30,mini_leveys,30);
    }

    // Spawnataan sorsa
    $("#alusta").click(function(e)
    {
    
    
    if(tila == "alku")
    {
        hiiriX = e.pageX - this.offsetLeft;
        hiiriY = e.pageY - this.offsetTop;

        if(hiiriX >= napin_x && hiiriX <= (napin_x+napin_leveys) && hiiriY >= napin_y && hiiriY <= (napin_y+napin_korkeus))
          {
           varmistin = 1;
           animoi(); 
          }
            
    }   
    
    });
    $(document).keydown(function(e)
    {
    if(e.keyCode === 13)
    {
        
        if(tila == "loppu")
        {
            tila === "alku";
            
            sorsa = nsorsa;
            sorsa_koko = 1.2;
            sorsa_x = 0;
            kombo = 0;
            liikumisnopeus = 3;
            laskuri = 1;
            maksiminopeus = 10;
            nopeus = alkunopeus;
            ammukset = 30;
            alku();       
        } 
        
    }
    });

});