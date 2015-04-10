<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE xsl:stylesheet SYSTEM "xhtml-math11-f.dtd">
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
xmlns:doc="espaceDoc"
xmlns:m="http://www.w3.org/1998/Math/MathML">

<xsl:output 
  method="html"
  encoding="UTF-8"
  doctype-public="-//W3C//DTD XHTML 1.1 plus MathML 2.0//EN"
  doctype-system="xhtml-math11-f.dtd"
  indent="yes" />
  
<xsl:template match="/">
	<html><body>
	<xsl:apply-templates select="@*|*|text()|processing-instruction()" />
	</body></html>
</xsl:template>

<h1>Liste des features présentes sur le site</h1>
<ul>
<xsl:for-each select="titre[@niveauOrig='1']">
	<li>
	<xsl:call-template name="titreMath"/>
	<xsl:if test="following-sibling::titre/@niveauOrig='2'">
		<ul>
			<!-- Nombre de titres de niveau 1 suivant ce titre de niveau 1 -->
			<xsl:variable name="posSuiv" select="count(following-sibling::titre[@niveauOrig='1'])"/>
			<!-- Sous-liste de titres de niveau 2 ayant le même nombre de titre de niveau 1 qui suivent que le titre de niveau un père (valeur de $posSuiv)-->
			<xsl:for-each select="following-sibling::titre[@niveauOrig='2' and count(following-sibling::titre[@niveauOrig='1'])=$posSuiv]">
				<li><xsl:call-template name="titreMath"/></li>
			</xsl:for-each>
		</ul>
	</xsl:if>
	</li>
</xsl:for-each>
<xsl:template name="checkTitre">
	<xsl:variable name="valeur" select="."/>
	<xsl:for-each select="*">
		<xsl:choose>
			<xsl:when test="local-name(.)='math'">
				<xsl:copy-of select="."/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:value-of select="translate(., 'abcdefghijklmnopqrstuvwxyzàâéèêëîïôùûüáíóúñìòäö', 'ABCDEFGHIJKLMNOPQRSTUVWXYZÀÂÉÈÊËÎÏÔÙÛÜÁÍÓÚÑÌÒÄÖ')"/>
			</xsl:otherwise>
		</xsl:choose>
		<xsl:text> </xsl:text>
	</xsl:for-each>

	<xsl:if test="preceding-sibling::titre[.=$valeur]">
		<xsl:value-of select="'(#2)'"/>
	</xsl:if>
</xsl:template>

<xsl:template name="titreMath">
	<xsl:for-each select="*">
		<xsl:choose>
			<xsl:when test="local-name(.)='math'">
				<xsl:copy-of select="."/>
			</xsl:when>
			<xsl:otherwise>
				<xsl:value-of select="."/>
			</xsl:otherwise>
		</xsl:choose>
		<xsl:text> </xsl:text>
	</xsl:for-each>
</xsl:template>

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
