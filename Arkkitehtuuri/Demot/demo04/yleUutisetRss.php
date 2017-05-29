<?php
$urli = "http://www.iltalehti.fi/rss/uutiset.xml"; 

$dom = new DOMDocument("1.0");

$dom->load($urli);

$itemelementit = $dom->getElementsByTagName("item");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ylen tuoreimmat uutiset (RSS)</title>
    </head>
    <body>
        
        <h1>Ylen tuoreimmat uutiset (RSS)</h1>
        
        <?php
        foreach ($itemelementit as $itemelementti) {
            
            $otsikko = $itemelementti->getElementsByTagName("title")->item(0)->textContent;
            $sisalto = $itemelementti->getElementsByTagName("description")->item(0)->textContent;
            $linkki = $itemelementti->getElementsByTagName("link")->item(0)->textContent;
            
            ?>
        
            <h2><?php print $otsikko?></h2>
            
            <?php print $sisalto?>
            
            <br/><br/>
            <a href="<?php print $linkki?>">Lue lisää</a>
        
            <?php
            
        }
        ?>
    </body>
</html>
