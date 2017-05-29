$(document).ready(function ()
{
    $("#nappi01").click(function() 
    {
        
        var euro = $("#euro").val();
        
        var kerroin = $("#valuutta").val();
        
        var tulo = euro * kerroin;
        
        $("#valmis").html(tulo);
        
    });
    $("h2").click(function()
    {
        
        $(this).next().slideDown(2000); //Luku aika millisekunteina 

        
    });
    $(".nappi02").click(function()
    {
        
        $(this).parent().slideUp(2000); //Luku aika millisekunteina 

        
    });

    
});