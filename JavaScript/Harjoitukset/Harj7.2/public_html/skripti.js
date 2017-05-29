$(function() {
    var progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" );
 
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( progressbar.progressbar( "value" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Valamis!" );
      }
    });
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + 2 );
 
      if ( val < 99 ) {
        setTimeout( progress, 90 );
      }
    }
 
    setTimeout( progress, 50 );
    
    var dialogi = '<div id="dialogi">'+
                    'Sivu on latautunut'+
                    '</div>';
            
    $(dialogi).dialog({
        
                                autoOpen: false,
                                title:"Lataus",
                                modal:true
                            
                        });
    progressbar.progressbar({
            complete: function() {
                                    $("#dialogi").dialog("open");
        
                                  }
                              });
  });