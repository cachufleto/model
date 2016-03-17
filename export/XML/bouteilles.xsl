<?xml version="1.0" encoding="UTF-8"?><xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> <xsl:template match="/">	<html>	<head>		<title>Exemple de sortie HTML</title>			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>	</head>	<body>			<xsl:apply-templates />	</body></html></xsl:template><xsl:template match="bouteille">		<h1>Bouteille de marque <xsl:value-of select="marque" /></h1>		<h2>Composition:</h2>		<p><xsl:value-of select="composition"/></p>		<h2>Lieu d'origine:</h2>		<p>Ville de <b><xsl:value-of select="source/ville" /></b>, dans le département<b><xsl:value-of select="source/departement" /></b></p>		<h2>Autres informations</h2>		<ul>			<li>Contenance: <xsl:value-of select="contenance"/></li>			<li>pH: <xsl:value-of select="ph"/></li>		</ul></xsl:template></xsl:stylesheet>