<?php

$file = 'pubmed_result.xml';
$xml = simplexml_load_file($file);

/*
- le PMID
<MedlineCitation Owner="NLM" Status="MEDLINE">
    <PMID Version="1">26735326</PMID>

- le lien vers l'articcle sur le site PubMed
	http://www.ncbi.nlm.nih.gov/pubmed/ + PMID

- le titre de l'article
<MedlineCitation Owner="NLM" Status="MEDLINE">
	<Article PubModel="Print">
		<ArticleTitle>[Radiation-induced aneurysm of the cavernous internal carotid artery].</ArticleTitle>

- le résumé de l'article
 <MedlineCitation Owner="NLM" Status="MEDLINE">
	<Article PubModel="Print">
	   <Abstract>
			<AbstractText>
- le journal/revue  où est paru l'article
 <MedlineCitation Owner="NLM" Status="MEDLINE">
	<Article PubModel="Print">
		<Journal>
			<Title>Revue neurologique</Title>

- la date de publication sur PubMed
    <PubmedData>
        <History>
            <PubMedPubDate PubStatus="pubmed">
                <Year>2016</Year>
                <Month>1</Month>
                <Day>7</Day>
                <Hour>6</Hour>
                <Minute>0</Minute>
*/

foreach($xml->PubmedArticle as $PubmedArticle){

	$PMID = $PubmedArticle->MedlineCitation->PMID;
	$link = 'http://www.ncbi.nlm.nih.gov/pubmed/'.$PMID;
	$titre = $PubmedArticle->MedlineCitation->Article->ArticleTitle;
	$resume = $PubmedArticle->MedlineCitation->Article->Abstract->AbstractText;
	$journal = $PubmedArticle->MedlineCitation->Article->Journal->Title;

	foreach($PubmedArticle->PubmedData->History->PubMedPubDate as $PubMedPubDate)
		if($PubMedPubDate['PubStatus'] == 'pubmed')
			$datePub = $PubMedPubDate->Day." ".$PubMedPubDate->Month." ".$PubMedPubDate->Year;
	
	echo '<br>'.$PMID;
	echo ' : <a href="'.$link.'">'.$titre.'</a>';
	echo '<br>'.$resume;
	echo '<br>'.$journal;
	echo '['.$datePub.']<hr/>';
	
}

?>