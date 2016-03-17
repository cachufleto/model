<?php

/*************************************************/
/* Manipulation pubmed_results.xml en php        */
/*************************************************/

$xml = simplexml_load_file('pubmed_result.xml');

foreach($xml->PubmedArticle as $PubmedArticle){
	echo $PubmedArticle->MedlineCitation[0]->PMID;
	
	// équivalent à 
	// echo $PubmedArticle->MedlineCitation->PMID;
	// où l'indice [0] est sous-entendu
	
	echo '<a href="http://www.ncbi.nlm.nih.gov/pubmed/'.$PubmedArticle->MedlineCitation[0]->PMID.'" >Lien PubMed</a>';
	
	echo "<h2>".$PubmedArticle->MedlineCitation[0]->Article->ArticleTitle."</h2>";
	
	echo'<p>'.$PubmedArticle->MedlineCitation[0]->Article->Abstract->AbstractText.'</p>';

	
	foreach($PubmedArticle->PubmedData->History->PubMedPubDate as $PubMedPubDate){
		if($PubMedPubDate['PubStatus'] == 'pubmed'){
			echo "Date de publication sur PubMed : ".$PubMedPubDate->Day.'-'.$PubMedPubDate->Month.'-'.$PubMedPubDate->Year;
		}
		
	}
		echo '<hr/>';

}