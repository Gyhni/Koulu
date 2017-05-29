<?php
$xml_tiedosto = "elokuvat.xml";
$dom_xml = new DOMDocument("1.0");

$dom_xml->load($xml_tiedosto);

$xsl_tiedosto = "elokuvat.xsl";
$dom_xsl = new DOMDocument("1.0");

$dom_xsl->load($xsl_tiedosto);

$xslt_prosessori = new XSLTProcessor();

$xslt_prosessori->importStylesheet($dom_xsl);

print $xslt_prosessori->transformToXml($dom_xml);
?>