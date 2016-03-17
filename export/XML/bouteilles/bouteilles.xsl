<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="produits">
	<html>
	<head>
		<meta charset="Utf-8"/>
		<title>Mise en forme XML</title>
	</head>
	<body>
		<!-- Ici mon comptenue -->
		<xsl:apply-templates />
	</body>
	</html>
</xsl:template>

<xsl:template match="bouteille">
	<h1>Bouteille de marque: <xsl:value-of select="marque" /></h1>
	<h2>Composition</h2>
	<xsl:value-of select="composition" />
	<xsl:apply-templates select="source" />
	<h2>Autres informations</h2>
	<lu>
		<li><xsl:value-of select="contenance" /></li>
		<li><xsl:value-of select="ph" /></li>
	</lu>
</xsl:template>

<xsl:template match="carton">
<div style="color:red;">
	<h1>Carton de marque: <xsl:value-of select="marque" /></h1>
	<xsl:apply-templates select="source" />
	<h2>Autres informations</h2>
	<lu>
		<li><xsl:value-of select="contenance" /></li>
		<li><xsl:value-of select="ph" /></li>
	</lu>
	<h2>Composition</h2>
	6 bouteilles de <xsl:value-of select="composition" />
</div>
</xsl:template>
<xsl:template match="source">
	<div style="color:green">
	<h2>Lieu d'origine:</h2>
	<xsl:value-of select="ville" />
	</div>
</xsl:template>





</xsl:stylesheet>
