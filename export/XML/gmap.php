<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
    <body onunload="GUnload()">
        <div id="global">
            <div id="map" onClick="document.getElementById('lat').value=getCurrentLat();document.getElementById('lng').value=getCurrentLng();">
                <?php

                require('GoogleMapAPIv3.class.php');
				$xml = simplexml_load_file('mondial.xml');
				
                $gmap = new GoogleMapAPI('ABQIAAAAz7Xbm_WTkGpNU7kyMc1gghS3lcuyex_8Fgp7wndALVTrLQXUHBSpiUS5eUwxq6wOiCz4YtdnlMuOvA');
                $gmap->setCenter('Nantes France');
                $gmap->setEnableWindowZoom(false);
				$gmap->setEnableAutomaticCenterZoom(true);
                $gmap->setDisplayDirectionFields(false);
                $gmap->setSize(1000,600);
                $gmap->setZoom(4);
                // $gmap->setLang('en');
                $gmap->setDefaultHideMarker(false);
				// Ajout d'un marqueur manuellement
				// $gmap->addMarkerByCoords(41.3,19.8,'Tirane');
                // Parcourir
foreach($xml->country as $country){
	foreach($country->city as $city){
		if($city['is_country_cap'] == 'yes'){
			$capitale = $city->name;
			$longitude = $city->longitude;
			$latitude = $city->latitude;
			break;
		}
	}
	
	foreach($country->province as $province){
		foreach($province->city as $city){
			if($city['is_country_cap'] == 'yes'){
				$capitale = $city->name;
				$longitude = $city->longitude;
				$latitude = $city->latitude;
				break;
			}
		}
	}
	// Avant de passer au pays suivant, j'ajoute un marqueur
	$infobulle="<h1>".$country->name."</h1><h2>".$capitale."</h2>";
	
	$icone ="flags_iso_24/".strtolower($country['car_code']).".png";
	if(!file_exists($icone)){
		$icone='';
	}
	
	$gmap->addMarkerByCoords($latitude,$longitude,$capitale,$infobulle,'',$icone);
}
				// Affichage de la carte
				$gmap->generate();
                echo $gmap->getGoogleMap();

				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                ?>
            </div>
        </div>
    </body>
</html>