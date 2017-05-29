<?php

if (isset($_REQUEST["data"])){
    $data = $_REQUEST["data"];
    if ($data == "nimi") {
        print "Santeri";
        
    }
    if ($data == "ika"){
        
        print "21";
    }
    
}

else {
    print "Virheellinen pyyntö";
}
?>