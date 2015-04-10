<?php 

	$xslt = new XSLTProcessor(); 

	$xslDoc = new DOMDocument(); 
	$xslDoc->load('accueil.xsl'); 
	$xslt->importStylesheet($xslDoc); 

	$xmlDoc = new DOMDocument(); 
	$xmlDoc->load('accueil.xml'); 
	echo $xslt->transformToXML($xmlDoc);

?>
