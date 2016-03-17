<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<!-- Création d'un templete global pour l'enssamble du document -->
<xsl:template match="/">
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



<xsl:template match="country">
	<p>
	<xsl:value-of select="name" /> : 
	<xsl:apply-templates select="city" />
	</p>
</xsl:template>

<xsl:template match="city">
	<xsl:value-of select="name" />,
</xsl:template>

<xsl:template match="mondial">
	<xsl:apply-templates select="country" /> : 
</xsl:template>

</xsl:stylesheet>
