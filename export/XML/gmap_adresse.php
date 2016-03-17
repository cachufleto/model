<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    </head>
    <body onunload="GUnload()">
        <div id="global">
            <div id="map" onClick="document.getElementById('lat').value=getCurrentLat();document.getElementById('lng').value=getCurrentLng();">
                <?php

                require('GoogleMapAPIv3.class.php');
				
                $gmap = new GoogleMapAPI('ABQIAAAAz7Xbm_WTkGpNU7kyMc1gghS3lcuyex_8Fgp7wndALVTrLQXUHBSpiUS5eUwxq6wOiCz4YtdnlMuOvA');
                $gmap->setCenter('Nantes France');
                $gmap->setEnableWindowZoom(false);
				$gmap->setEnableAutomaticCenterZoom(true);
                $gmap->setDisplayDirectionFields(false);
                $gmap->setSize(1000,600);
                $gmap->setZoom(4);
                // $gmap->setLang('en');
                $gmap->setDefaultHideMarker(false);
				
				// Ajout d'un marqueur à partir d'une adresse physique
				$adresse ="37 rue Saint Sébastien, 75011 Paris";
				//$gmap->addMarkerByAddress($adresse);
 
				// Le service de géocodage de Google est gratuit jusqu'à une certaine limite.
				
				$coords = $gmap->geocoding($adresse);
				print_r($coords);
				
				$latitude = $coords[2];
				$longitude = $coords[3];
				
				$gmap->addMarkerByCoords($latitude, $longitude,'IFOCOP','<h3>IFOCOP</h3>');
 
				// Affichage de la carte
				$gmap->generate();
                echo $gmap->getGoogleMap();

				
				
				
				

				
				
                ?>
            </div>
        </div>
    </body>
</html>