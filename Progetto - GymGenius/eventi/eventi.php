<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.js"></script> <!-- teoricamente da rimuovere per il problema della navbar -->

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css'/>

    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css" type="text/css">
    
    <title>Eventi</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

</head>
<body>
    <?php
        $pageTitle = "Eventi";
        session_start();
        if (isset($_SESSION['tipo_utente']))
            include '../navbar.php';
        else
            include '../navbar_senzapop.php';
    ?>
    <section class="main-content">
        <div class="contenitore_mappa">
            <div id ='map' style='width: 600px; height: 500px;'></div>
            <p></p>
            <button class="btn btn-secondary btn-sm" onclick="aggiungiPunto()">Aggiungi Punto</button>
            <button class="btn btn-secondary btn-sm" onclick="rimuoviPunto()">Rimuovi Punto</button>
        </div>

        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiYmZsNDciLCJhIjoiY2x2NHd4OGxpMGJ5eDJpbGI4ZTRlajQxZCJ9.jCPFND9H2JdseL5oRtaF7w';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [12.48, 41.88], //longitudine, latitudine
                zoom: 10
            });
            map.addControl(new mapboxgl.NavigationControl());
            /*
            map.on('click', function(e) {
                // Ottieni le coordinate del punto cliccato
                var lngLat = e.lngLat;

                // Aggiungi un marker sulla mappa nella posizione del clic
                new mapboxgl.Marker()
                    .setLngLat(lngLat)
                    .addTo(map);
            });
            */
            map.addControl(new mapboxgl.FullscreenControl( {container: document.querySelector('contenitore_mappa')} ));

            map.addControl(new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true,
                showUserHeading: true,
                showAccuracyCircle: false
            }));

            const search = new MapboxGeocoder({
                accessToken: mapboxgl.accessToken,
                marker: {
                    color: 'orange'
                },
                mapboxgl: mapboxgl,
                placeholder: 'Inserisci indirizzo'
            });

            map.addControl(search, 'top-left');

            const marker = new mapboxgl.Marker();

            function aggiungiPunto() {
            // Create a new marker.
                    marker
                    .setLngLat([12.48, 41.88])   //
                    .setPopup(new mapboxgl.Popup().setHTML("<h6>Hello World!</h6>")) // add popup
                    .addTo(map);
            }

            function rimuoviPunto() {
                marker.remove();

            }



            
        
        </script>

    </section>
    <?php
        # Footer
        include '../footer.html';
    ?>
        
    </section>
</body>
</html>