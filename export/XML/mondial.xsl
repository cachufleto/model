<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


<xsl:template match="/">

	<html>
		<head>
			<meta charset="utf8"/>
			<title>Pays</title>
		</head>
		<body>
			<!-- On donne l'instruction apply-templates pour appliquer les templates spécifiques définis -->
			<xsl:apply-templates />
		</body>

	</html>
</xsl:template>
<!-- Création d'un template spécifique pour les villes -->
<xsl:template match="country">
	<h2>Pays : <xsl:value-of select="name" /></h2>
</xsl:template>

<!-- On crée un template VIDE pour masquer les éléments non désirés -->
<xsl:template match="continent"></xsl:template>
<xsl:template match="organization"></xsl:template>
<xsl:template match="sea"></xsl:template>
<xsl:template match="desert"></xsl:template>
<xsl:template match="island"></xsl:template>
<xsl:template match="river"></xsl:template>
<xsl:template match="mountain"></xsl:template>
<xsl:template match="lake"></xsl:template>




</xsl:stylesheet>