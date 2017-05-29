<?php
$urli1 = "http://yle.fi/uutiset/rss/uutiset.rss";
$urli2 = "http://www.hs.fi/uutiset/rss/";
$urli3 = "http://www.mtv.fi/api/feed/rss/uutiset_uusimmat";

$dom1 = new DOMDocument("1.0");
$dom2 = new DOMDocument("1.0");
$dom3 = new DOMDocument("1.0");

$dom1->load($urli1);
$dom2->load($urli2);
$dom3->load($urli3);

$itemelementit1 = $dom1->getElementsByTagName("item");
$itemelementit2 = $dom2->getElementsByTagName("item");
$itemelementit3 = $dom3->getElementsByTagName("item");

$dom = new DOMDocument("1.0");
$dom->encoding = "utf-8";
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;

$uutiset = $dom->appendChild(new DOMElement("uutiset"));
?>

        
        <!--Ylen tuoreimmat uutiset RSS!-->
        
        <?php
        foreach ($itemelementit1 as $itemelementti1) {
            
            $otsikko = $itemelementti1->getElementsByTagName("title")->item(0)->textContent;
            $linkki = $itemelementti1->getElementsByTagName("link")->item(0)->textContent;
            $aika = $itemelementti1->getElementsByTagName("pubDate")->item(0)->textContent;
            $lahde = "Yle";
            $aika2 = strtotime($aika);
            $pvm = date("d.m H.i",$aika2);
                    
            $uutinen = $uutiset->appendChild(new DOMElement("uutinen"));
            
            $uutinen->appendChild(new DOMElement("otsikko",$otsikko));
            $uutinen->appendChild(new DOMElement("lahde",$lahde));
            $uutinen->appendChild(new DOMElement("linkki",$linkki));
            $uutinen->appendChild(new DOMElement("aika2",$aika2));
            $uutinen->appendChild(new DOMElement("aika",$pvm));

        }
        ?>
                    
        <!--HS uutiset RSS!-->
        
        <?php
        foreach ($itemelementit2 as $itemelementti2) {
            
            $otsikko = $itemelementti2->getElementsByTagName("title")->item(0)->textContent;
            $linkki = $itemelementti2->getElementsByTagName("link")->item(0)->textContent;
            $aika = $itemelementti2->getElementsByTagName("pubDate")->item(0)->textContent;
            $lahde = "Hesari";
            $aika2 = strtotime($aika);
            $pvm = date("d.m H.i",$aika2);
            
            $uutinen = $uutiset->appendChild(new DOMElement("uutinen"));
            
            $uutinen->appendChild(new DOMElement("otsikko",$otsikko));
            $uutinen->appendChild(new DOMElement("lahde",$lahde));
            $uutinen->appendChild(new DOMElement("linkki",$linkki));
            $uutinen->appendChild(new DOMElement("aika2",$aika2));
            $uutinen->appendChild(new DOMElement("aika",$pvm));
            
        }
        ?>
                    
        <!--MTV3 (RSS)!-->
        
        <?php
        foreach ($itemelementit3 as $itemelementti3) {
            
            $otsikko = $itemelementti3->getElementsByTagName("title")->item(0)->textContent;
            $linkki = $itemelementti3->getElementsByTagName("link")->item(0)->textContent;
            $aika = $itemelementti3->getElementsByTagName("pubDate")->item(0)->textContent;
            $lahde = "Maikkari";
            $aika2 = strtotime($aika);
            $pvm = date("d.m H.i",$aika2);
            
            $uutinen = $uutiset->appendChild(new DOMElement("uutinen"));
            
            $uutinen->appendChild(new DOMElement("otsikko",$otsikko));
            $uutinen->appendChild(new DOMElement("lahde",$lahde));
            $uutinen->appendChild(new DOMElement("linkki",$linkki));
            $uutinen->appendChild(new DOMElement("aika2",$aika2));
            $uutinen->appendChild(new DOMElement("aika",$pvm));
            
        }
        
        if(isset ($_REQUEST["tyylit"]))
        {
           
                $tyylit = "uutiset2.xsl";
            }
            else 
            {
                $tyylit = "uutiset.xsl";
            }

        
     
        
$xsl_tiedosto = $tyylit;
$dom_xsl = new DOMDocument("1.0");

$dom_xsl->load($xsl_tiedosto);

$xslt_prosessori = new XSLTProcessor();

$xslt_prosessori->importStylesheet($dom_xsl);

print $xslt_prosessori->transformToXml($dom);
?>
