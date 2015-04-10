<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0" xmlns:accueil="accueil">

<xsl:output method="html"
encoding="UTF-8"
doctype-public="-//W3C//DTD XHTML 1.0 Transitional//EN"
doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"
indent="yes" />

	<xsl:template match="/">
		<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
				<title>Utilisation d'XSL</title>
				<link href="accueil.css" rel="stylesheet"/>
			</head>
			<body>
				<xsl:apply-templates select="*" />
			</body>
		</html>
	</xsl:template>

	<xsl:template match="accueil">
		<h1>Liste des features présentes sur le site :</h1>
		<xsl:for-each select="couple">
			<ul>
				<li><xsl:value-of select="."/></li>
			</ul>
		</xsl:for-each>
	</xsl:template>
</xsl:stylesheet>
