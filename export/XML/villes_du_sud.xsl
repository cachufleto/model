<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<!-- Création d'un template global pour l'ensemble du document -->
<xsl:template match="/">

	<html>
		<head>
			<meta charset="utf8"/>
			<title>Mise en forme XSL</title>
		</head>
		<body>
			<!-- On donne l'instruction apply-templates pour appliquer les templates spécifiques définis -->
			<xsl:apply-templates />
		</body>

	</html>
</xsl:template>
<!-- Création d'un template spécifique pour les villes -->
<xsl:template match="ville">
	<h2>Ville : <xsl:value-of select="nom" /></h2>
</xsl:template>

<!-- On crée un template VIDE pour masquer les éléments non désirés -->
<xsl:template match="port">
	
</xsl:template>













</xsl:stylesheet>