<?php
$urli = "http://www.mtv.fi/api/feed/rss/uutiset_uusimmat"; 

$dom = new DOMDocument("1.0");

$dom->load($urli);

$itemelementit = $dom->getElementsByTagName("item");

$uutiset = array();
        foreach ($itemelementit as $itemelementti) 
		{
            
            $otsikko = $itemelementti->getElementsByTagName("title")->item(0)->textContent;
            $sisalto = $itemelementti->getElementsByTagName("description")->item(0)->textContent;
            $linkki = $itemelementti->getElementsByTagName("link")->item(0)->textContent;
			if($kuva = $itemelementti->getElementsByTagName("enclosure")->item(0) != null)
			{
			$kuva = $itemelementti->getElementsByTagName("enclosure")->item(0)->getAttribute("url");
			}
			else
			{
			$kuva = "asd.jpg";
			}
			$uutiset[] =array("otsikko" => $otsikko,"sisalto" => $sisalto,"linkki" => $linkki,"kuva" =>$kuva);
        }
			print json_encode($uutiset);
			 
			 
            ?>
        
