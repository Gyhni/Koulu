$(function(){//lyhyempi tapa "$(document).ready -lohkolle

    $(".raahattava").draggable({
        
                                cursor: "move",
                                revert:"invalid"
        
                                });
    $("#pudotusalue3").droppable({
                                accept:"#muut",
                                hoverClass:"hohto",
                                drop: function()
                                {
                                
                                    $(this).append(" Hienoa!");
                                    
                                }
        
                                });
    $("#pudotusalue2").droppable({
                                accept:"#elain",
                                hoverClass:"hohto",
                                drop: function()
                                {
                                
                                    $(this).append(" Hienoa!");
                                    
                                }
        
                                });
    $("#pudotusalue1").droppable({
                                accept:"#kukka",
                                hoverClass:"hohto",
                                drop: function()
                                {
                                
                                    $(this).append(" Hienoa!");
                                    
                                }
        
                                });   
                                
    //Taulukko
    
    $("#tbody").sortable(
    {
                    
        
                    
    });
    $("#taulu").resizable(
            {
                
                maxWidth: 800
                
            });

});