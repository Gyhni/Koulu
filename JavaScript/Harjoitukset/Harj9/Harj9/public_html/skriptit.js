$(function()
{
    $("#nappi").css("display","none");
    
    $("#laatikko").selectable(
        {
                
                stop: function()
            {
          
                $("#nappi").css("display","block");
                    
            }
                
        });
        
    $("#nappi").click(function()
        {
        $("<div>" + "Haluatko varmasti poistaa" + "</div>").dialog(
            {
                    
                title:"Oletko varma",
                modal: true,
                buttons: 
                        {
                            "Kyllä": function()
                            {
                        
                                $("#laatikko > .ui-selected").each(function()
                                {
            
                                    $(".ui-selected").remove();
                                    $("#nappi").css("display","none");
                                    
                                });
                                $(this).dialog("close");
                        
                            },
                            "Peruuta": function()
                            {
                                
                                $(this).dialog("close");
                                
                            } 
                        }
            });
        }); 
   //Käyttäjä laskuri
    $("#divi01, #divi02").sortable(
    {
                    
        connectWith: '.divit',
        update: function()
        {
            var j = 0;
            var i = 0;
        $("#divi01 > .laatikot").each(function()//kaikki divi01 sisällä olevat .laatikot elementit
        {
            i++;
            
        });
        
        $("#vinfo").html("Vasemmalla on: " + i);
        
        $("#divi02 > .laatikot").each(function()//kaikki divi01 sisällä olevat .laatikot elementit
        {
            j++;
            
        });
        
        $("#oinfo").html("Oikealla on: " + j);
        
        }  

    });   
});