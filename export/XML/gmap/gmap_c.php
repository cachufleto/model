<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
    <body onunload="GUnload()">
        <div id="global">
		GoogleMap API v3
            <div id="map" onClick="document.getElementById('lat').value=getCurrentLat();document.getElementById('lng').value=getCurrentLng();">
                <?php

                require('GoogleMapAPIv3.class.php');
				$myXml = simplexml_load_file('../mondial/mondial.xml');
				
                $gmap = new GoogleMapAPI('ABQIAAAAz7Xbm_WTkGpNU7kyMc1gghS3lcuyex_8Fgp7wndALVTrLQXUHBSpiUS5eUwxq6wOiCz4YtdnlMuOvA');
                //$gmap->setCenter('Nantes France');
                $gmap->setEnableWindowZoom(false);
				$gmap->setEnableAutomaticCenterZoom(true);
                $gmap->setDisplayDirectionFields(true);
                $gmap->setSize(800,800);
                $gmap->setZoom(4);
                // $gmap->setLang('en');
                $gmap->setDefaultHideMarker(false);
				// Ajout d'un marqueur manuellement
				/*
				      <city id="cty-cid-cia-Albania-Tirane" is_country_cap="yes" country="AL">
					 <name>Tirane</name>
					 <longitude>19.8</longitude>
					 <latitude>41.3</latitude>
*/				
				foreach($myXml->country as $country ){

					// $gmap->addMarkerByCoords(41.327727, 19.818563,'Tirane');
					$info = capitalCoordonnes($country);
					$gmap->addMarkerByCoords($info['latitude'],$info['longitude'],$info['name']);
                }
				$gmap->generate();
                echo $gmap->getGoogleMap();

				
				
function capitalCoordonnes($country){
	
	$coordonnes = '';
	foreach($country->city as $city)
		if($city['is_country_cap'] == 'yes')
			$coordonnes = array('latitude'=>$city->latitude, 'longitude'=>$city->longitude, 'name'=>$city->name);

	foreach($country->province as $province)
		foreach($province->city as $city)
			if($city['is_country_cap'] == 'yes')
				$coordonnes = array('latitude'=>$city->latitude, 'longitude'=>$city->longitude, 'name'=>$city->name);

	return $coordonnes;
}

                ?>
            </div>
        </div>
    </body>
</html>