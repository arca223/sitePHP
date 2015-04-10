<?php

	$xslt = new XSLTProcessor();

	$xslDoc = new DOMDocument();
	$xslDoc->load('C:\Users\Max TOMPOUCE\git\sitePHP\vues\vueAccueil.xsl');
	$xslt->importStylesheet($xslDoc); 

	$xmlDoc = new DOMDocument(); 
	$xmlDoc->load('C:\Users\Max TOMPOUCE\git\sitePHP\vues\vueAccueil.xml');
	echo $xslt->transformToXML($xmlDoc);

?>
