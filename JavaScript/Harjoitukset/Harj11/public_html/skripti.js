$(function()
{
    var elementti = $("#alusta").get(0);    
    var konteksti = $("#alusta").get(0).getContext("2d");
    
    var hiiriX;
    var hiiriY;
    
    var piirra = false;
    
    var koko = 5;
    var vari = "red";
    var vanhavari = vari;
    
    var canvas_width = elementti.width;
    var canvas_lenght = elementti.height;
    
    $("#koko1").click(function()
    {
        koko = 5;
    });
    $("#koko2").click(function()
    {
        koko = 10;
    });
    $("#koko3").click(function()
    {
        koko = 20;
    });
    $("#vari1").click(function()
    {
        vari = "red";
    });
    $("#vari2").click(function()
    {
        vari = "blue";
    });    
    $(document).keydown(function(e)
    {  
        if(e.keyCode === 17)
        {
            vari = "white";
        }
    });
    $(document).keyup(function(e)
    {  
        if(e.keyCode === 17)
        {
            vari = vanhavari;
        }
    });
    $("#alusta").mousemove(function(e)
    {
        
        if(piirra === true)
        {
        hiiriX = e.pageX - this.offsetLeft;
        hiiriY = e.pageY - this.offsetTop;
        
        konteksti.beginPath();
        konteksti.arc(hiiriX,hiiriY,koko,(0*Math.PI),(2*Math.PI),true);
        konteksti.fillStyle = vari;
        konteksti.fill();
        
        $("#info").html("X: " + hiiriX + " Y: " + hiiriY);
        }
    });
    $("#alusta").mousedown(function()
    {
       
        piirra = true;
        
    });
        $("#alusta").mouseup(function()
    {
       
        piirra = false;
        
    });
    $("#tyhjenna").click(function()
    {
        konteksti.clearRect(0,0,canvas_width,canvas_lenght);
    });
});