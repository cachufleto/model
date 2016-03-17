<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<!-- Création d'un templete global pour l'enssamble du document -->
<xsl:template match="contenu">
	<html>
	<head>
		<meta charset="Utf-8"/>
		<title>Mise en forme XML</title>
	</head>
	<body>
		<!-- Ici mon comptenue -->
		<h1><xsl:value-of select="titre" /></h1>
		<xsl:apply-templates />
	</body>
	</html>
</xsl:template>

<!-- Creation template pour les villes -->
<xsl:template match="titre">
</xsl:template>

<!-- Creation template pour les villes -->
<xsl:template match="ville">
	<h2>Ville: <xsl:value-of select="nom" /></h2>
</xsl:template>

<!-- Creation template pour les port -->
<xsl:template match="port">
	<h3>Ville: <xsl:value-of select="nom" /></h3>
</xsl:template>

</xsl:stylesheet>
