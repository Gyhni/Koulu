<?php
$urli = "http://www.mtv.fi/api/feed/rss/urheilu_tennis"; 

$dom = new DOMDocument("1.0");

$dom->load($urli);

$itemelementit = $dom->getElementsByTagName("item");

$uutiset = array();
        foreach ($itemelementit as $itemelementti) {
            
            $otsikko = $itemelementti->getElementsByTagName("title")->item(0)->textContent;
            $sisalto = $itemelementti->getElementsByTagName("description")->item(0)->textContent;
            $linkki = $itemelementti->getElementsByTagName("link")->item(0)->textContent;
			$kuva = $itemelementti->getElementsByTagName("enclosure")->item(0)->getAttribute("url");
			$uutiset[] =array("Otsikko" => $otsikko,"Sisalto" => $sisalto,"Linkki" => $linkki,"Kuva" =>$kuva);
             }
			print json_encode($uutiset);
			 
			 
            ?>
        
