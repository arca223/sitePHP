<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE xsl:stylesheet SYSTEM "xhtml-math11-f.dtd">
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:doc="espaceDoc"
xmlns:m="http://www.w3.org/1998/Math/MathML">

<xsl:template match="titre[@niveauOrig='1']">
	<h1>
		<xsl:call-template name="checkTitre"/>
	</h1>
</xsl:template>

<xsl:template match="description">
	<p>
		<xsl:apply-templates select="@*|text()"/>
	</p>
</xsl:template>
