<?php

	$xslt = new XSLTProcessor();

	$xslDoc = new DOMDocument();
	$xslDoc->load('vueAccueil.xsl');
	$xslt->importStylesheet($xslDoc); 

	$xmlDoc = new DOMDocument(); 
	$xmlDoc->load('vueAccueil.xml');
	echo $xslt->transformToXML($xmlDoc);

?>
