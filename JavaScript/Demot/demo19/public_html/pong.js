$(function()
{
    
   var pelin_leveys = 600;
   var pelin_korkeus = 400;
   
   var pelitila;
   
   var napin_leveys;
   var napin_korkeus;
   
   var napin_x;
   var napin_y;
   
   var palikka_x = 10;
   var palikka_y = Math.floor(Math.random() * pelin_korkeus);
   var palikka_leveys = 10;
   var palikka_korkeus = 10;
   
   var maila_x = pelin_leveys - 15;
   var maila_y = pelin_korkeus/2;
   var maila_leveys = 10;
   var maila_korkeus = 40;
   
   var suunta_x = 1;
   var suunta_y = (Math.random() < 0.5) ?1:-1;
   var nopeus = 3;
   var alkunopeus = nopeus;
   
   var pisteet = 0;
   
   var elementti = $("#pelialusta").get(0);
   elementti.width = pelin_leveys;
   elementti.height = pelin_korkeus;
   var konteksti = elementti.getContext("2d");
   
   peli();
   
   function aloitus()
   {
       pelitila = "alku";
       
       konteksti.clearRect(0,0,pelin_leveys,pelin_korkeus);
       konteksti.fillStyle = "black";
       konteksti.fillRect(0,0,pelin_leveys,pelin_korkeus);
       
       var otsikko = "Über PONG v 1.3";
       konteksti.fillStyle = "white";
       konteksti.font = "30px Arial";
       var tekstin_leveys = konteksti.measureText(otsikko).width;
       konteksti.fillText(otsikko,(pelin_leveys/2 - tekstin_leveys/2),(pelin_korkeus/2),tekstin_leveys,30);
       
       var mini_teksti = "(Made with CryEngine 4)";
       konteksti.fillStyle = "white";
       konteksti.font = "10px Arial";
       var mini_leveys = konteksti.measureText(mini_teksti).width;
       konteksti.fillText(mini_teksti,(pelin_leveys/2 - mini_leveys/2),(pelin_korkeus/2)+30,mini_leveys,30);
       
       napin_leveys = 150;
       napin_korkeus = 30;
       
       napin_x = (pelin_leveys/2 - napin_leveys/2);
       napin_y = (pelin_korkeus/2 + 40);
       
       konteksti.fillRect(napin_x,napin_y,napin_leveys,napin_korkeus);
       
       konteksti.fillStyle = "black";
       konteksti.font = "20px Arial";
       konteksti.fillText("Aloita peli",napin_x+35,napin_y+22);
       
   }
    
   function peli()
   {
       pelitila = "peli";
       
       konteksti.clearRect(0,0,pelin_leveys,pelin_korkeus);
       konteksti.fillStyle = "black";
       konteksti.fillRect(0,0,pelin_leveys,pelin_korkeus);
       
       if(palikka_x > (maila_x - maila_leveys))
       {
           if(palikka_y > maila_y && palikka_y <= (maila_y + maila_korkeus) && (palikka_x + palikka_leveys) > (maila_x))
           {
           suunta_x = -1;
           
           pisteet = pisteet +1;
           
           nopeus = nopeus * 1.1;
           }
       }
       if(palikka_x <= 0)
       {
           suunta_x = 1;
       }
       if(palikka_y > pelin_korkeus - palikka_korkeus)
       {
           suunta_y = -1;
       }
       if(palikka_y <= 0)
       {
           suunta_y = 1;
       }
       
       palikka_x = palikka_x + (suunta_x * nopeus);
       palikka_y = palikka_y + (suunta_y * nopeus);
       
       konteksti.fillStyle = "white";
       konteksti.fillRect(palikka_x,palikka_y,palikka_leveys,palikka_korkeus);
       konteksti.fillRect(maila_x,maila_y,maila_leveys,maila_korkeus);
       
       konteksti.font = "20px Arial";
       konteksti.fillText(pisteet, pelin_leveys/2, 25);
       
       if(palikka_x <= pelin_leveys)
       {
          window.requestAnimationFrame(peli); 
       }
       else
       {
        loppu();   
       }       
   }
   
   function loppu()
   {
       pelitila = "loppu";
       
       konteksti.clearRect(0,0,pelin_leveys,pelin_korkeus);
       konteksti.fillStyle = "black";
       konteksti.fillRect(0,0,pelin_leveys,pelin_korkeus);
       
       var otsikko = "Hävisit pelin";
       konteksti.fillStyle = "white";
       konteksti.font = "30px Arial";
       var tekstin_leveys = konteksti.measureText(otsikko).width;
       konteksti.fillText(otsikko,(pelin_leveys/2 - tekstin_leveys/2),(pelin_korkeus/2),tekstin_leveys,30);
       
       var piste_teksti = "Pisteet: " + pisteet;
       konteksti.fillStyle = "white";
       konteksti.font = "10px Arial";
       var piste_leveys = konteksti.measureText(piste_teksti).width;
       konteksti.fillText(piste_teksti,(pelin_leveys/2 - piste_leveys/2),(pelin_korkeus/2)+30,piste_leveys,30);
       
       
       
   }
   
   $("#pelialusta").click(function(e)
   {
      if(pelitila == "alku")
      {
         
        var hiiren_x = e.pageX - this.offsetLeft;
        var hiiren_y = e.pageY - this.offsetTop;

        if(hiiren_x >= napin_x && hiiren_x <= (napin_x+napin_leveys) && hiiren_y >= napin_y && hiiren_y <= (napin_y+napin_korkeus))
          {
           peli(); 
          }
     }
     if(pelitila == "loppu")
     {
         pelitila = "alku";
         palikka_x= 10;
         pisteet = 0;
         nopeus = alkunopeus;
         aloitus()
     }
   });
   $("#pelialusta").mousemove(function(e)
   {
      maila_y = e.pageY - this.offsetTop; 
   });
   $(document).keydown(function(e)
    {
    if(e.keyCode === 35)
    {
        
        maila_korkeus = 100000;
        
    }
    });
});