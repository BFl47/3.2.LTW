<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../script.js"></script>
    <script src="/jquery/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css'/>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">
    <title>Home</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

    <script> 



       

        function load_resource(e){
            
            var httpRequest = new XMLHttpRequest();
            httpRequest.onreadystatechange = manage_response;
            httpRequest.open("GET", "/assets/infopagine/"+e.target.innerHTML+".txt", true);
            httpRequest.send();
            reset_buttons(e);
            toggle_button(e);
        }

        function manage_response(e){
            if (e.target.readyState == 4 && e.target.status == 200) {
                document.getElementById("dynamic_info").innerHTML= e.target.responseText;   
            }
        }

        function reset_buttons(e){
            var lista_bottoni_info = document.getElementsByClassName("bottone_info");

            for (var i = 0; i < lista_bottoni_info.length; i++) {
                    lista_bottoni_info[i].style.backgroundColor='rgb(33, 37, 41)';
                    lista_bottoni_info[i].style.color='white'
            }
        }

        function toggle_button(e){
            document.getElementById("bottone"+e.target.innerHTML+"").style.backgroundColor='white';
            document.getElementById("bottone"+e.target.innerHTML+"").style.color='black';
        }

        
        $(document).ready(function(){
            var iframe = $('.myIframe');
            var iframecont = iframe.contents();
            var pre = iframecont.find('pre');
            var lista_bottoni_info = document.getElementsByClassName("bottone_info");
            var defaultButton = document.getElementById("bottoneAbout");
            

            for (var i = 0; i < lista_bottoni_info.length; i++) {
                    lista_bottoni_info[i].onclick = load_resource;
            }

            defaultButton.click();

            if (pre.length > 0) {
                pre.css( {
                    'font-family': 'Arial, sans-serif',
                    'font-size': '16px',
                    'color': 'white'
                });
            }



            
            
        });

        

        

        

        <?php
        session_start();
        if ($_SESSION['registrazione_completata']) {
            echo 'alert("Registrazione completata\nDati inseriti correttamente")';
            $_SESSION['registrazione_completata'] = false;
            unset( $_SESSION['registrazione_completata']);
        }
        ?>
    </script>
</head>
<body>
    <!-- Navbar -->
    <?php
        if (isset($_SESSION['tipo_utente']))
          readFile('navbar.html');
        else
          readFile('navbar_senzapop.html');          
    ?>

    <section class="main-content">
    <div class=container_home>
        <div class=greet_home>
            <h1 align=left style="color:rgb(7, 171, 171)" ><b>TI DIAMO IL BENVENUTO SU GYMGENIUS!<b></h1>
           

            <p>Il tuo viaggio verso la salute e il benessere comincia qui. Siamo lieti di darti il benvenuto nella tua nuova casa per il fitness intelligente e personalizzato.</p>
            <p>GymGenius è più di un semplice sito web. È il tuo compagno di allenamento, il tuo consulente nutrizionale e il tuo motivatore personale, tutto in uno. Connettiti con esperti del settore, personal trainer e nutrizionisti altamente qualificati pronti a guidarti verso i tuoi obiettivi di salute e fitness.</p>
            <p>Unisciti a noi e sblocca una vasta gamma di strumenti e risorse per ottimizzare il tuo percorso verso una vita più sana e più felice. Che tu stia cercando di aumentare la tua forza, migliorare la tua flessibilità o semplicemente sentirti meglio ogni giorno, siamo qui per aiutarti ad ottenere risultati tangibili e duraturi.</p>
            <p>Unisciti alla nostra comunità di appassionati di fitness e inizia a trasformare il tuo corpo e la tua mente oggi stesso. Benvenuto su GymGenius, dove la migliore versione di te ti sta aspettando.</p>
            
        </div>  
        
        <div class=container_carousel_map_home>

                <div class=contenitore_carosello>
                    <h3 style="color: white">Dicono di noi</h3>
                    <div id="carosello_home" class="carousel slide" data-ride="carousel" width=auto heigth=auto data-interval="3000" data-switch="false">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="3" aria-label="Slide 4"></button>
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="5" aria-label="Slide 6"></button>
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="6" aria-label="Slide 7"></button>
                        <button type="button" data-bs-target="#carosello_home" data-bs-slide-to="7" aria-label="Slide 8"></button>

                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" width="300" height="300">
                            <img class="d-block w-100" width="300" height="300" src="/assets/imgs/grey.png">
                            <div class="carousel-caption">
                                <h5>Alice A.</h5>
                                <h3>★★★★☆<h3>
                                <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec1.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item" width="300" height="300" >
                            <img class="d-block w-100" width="300" height="300" src="/assets/imgs/grey.png" >
                            <div class="carousel-caption">
                                <h5>Marco C.</h5>
                                <h3>★★★★★<h3>
                                    <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec2.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                    </p>
                            </div>
                        </div>
                        <div class="carousel-item" width="300" height="300">
                            <img class="d-block w-100" width="300" height="300" src="/assets/imgs/grey.png" >
                            <div class="carousel-caption">
                                <h5>Sara C.</h5>
                                <h3>★★★☆☆<h3>
                                    <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec3.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                    </p>
                            </div>
                        </div>
                        <div class="carousel-item" width="300" height="300">
                            <img class="d-block w-100" width="300" height="300" src="/assets/imgs/grey.png" >
                            <div class="carousel-caption">
                                <h5>Luca B.</h5>
                                <h3>★★★★☆<h3>
                                    <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec4.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                    </p>
                            </div>
                        </div>
                        <div class="carousel-item" width="300" height="300">
                            <img class="d-block w-100" width="300" height="300"  src="/assets/imgs/grey.png">
                            <div class="carousel-caption">
                                <h5>Marta G.</h5>
                                <h3>★★★☆☆<h3>
                                    <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec5.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                    </p>
                            </div>
                        </div>
                        <div class="carousel-item" width="300" height="300">
                            <img class="d-block w-100" width="300" height="300" src="/assets/imgs/grey.png">
                            <div class="carousel-caption">
                                <h5>Giovanni S.</h5>
                                <h3>★★★★☆<h3>
                                    <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec6.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                    </p>
                            </div>
                        </div>
                        <div class="carousel-item" width="300" height="300">
                            <img class="d-block w-100" width="300" height="300" src="/assets/imgs/grey.png">
                            <div class="carousel-caption">
                                <h5>Anna I.</h5>
                                <h3>★★★★☆<h3>
                                    <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec7.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                    </p>
                            </div>
                        </div>
                        <div class="carousel-item" >
                            <img class="d-block w-100" width="300" height="300" src="/assets/imgs/grey.png">
                            <div class="carousel-caption">
                                <h5>Cristina C.</h5>
                                <h3>★★★★★<h3>
                                    <p>
                                    <iframe class="myIframe" src="/assets/recensioni/rec8.txt" width="auto" height="auto"  scrolling="no"></iframe>
                                    </p>
                            </div>
                        </div>
                       
                        

                    </div>
                    <a class="carousel-control-prev" href="#carosello_home" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    <a class="carousel-control-next" href="#carosello_home" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only"></span>
                    </a>
                    </div>
                </div>
                <div></div>
                <div class="contenitore_mappa">
                    <h3 style="color: white">Dove trovarci</h3>
                    <div id ='map' style='width: 400px; height: 300px;'></div>
                </div>
        </div>
        
        <div class="container_meteo">
            <div class="primo_meteo" >
                <h2 style="color: black;">Meteo GymGenius</h2>
                <input type="text" id="city" placeholder="Inserisci una località">
                <button onclick="getWeather()">Cerca</button>
            </div>
            <div class="sottogriglia_meteo">
                <div  class="secondo_meteo" >
                    <h4 style="color: black;" id="h4_secmeteo">Lo sapevi?</h4>
                    
                    <p  style="color: black;" id="text_secmeteo"> L'allenamento all'aperto offre benefici tangibili per la salute. L'aria fresca e la luce solare aumentano il benessere mentale, mentre l'ambiente naturale stimola la creatività e riduce lo stress. La socializzazione è favorita, e la varietà del terreno aggiunge sfide che potenziano la resistenza e l'equilibrio.
                    <p> 
                    <img id="weather-icon" >
                    <div id="temp-div"></div>
                    <div id="weather-info"></div>
                </div>
                <div></div>
                <div class="terzo_meteo">
                    <div id="hourly-forecast">
                    </div>
                               
                </div>
            </div>
        </div>


        <div class="container_informazioni_pagine">
            <div class="dashboard_bottoni">
                <button id="bottoneAbout" class="bottone_info">About</button>
                <button id="bottoneVision" class="bottone_info" clicked>Vision</button>
                <button id="bottoneMission" class="bottone_info">Mission</button>
                
            </div>
            <div id="dynamic_info" class="dynamic_info">
                
            </div>
        </div>  
        </div> 
                
        <script>
            mapboxgl.accessToken = 'pk.eyJ1IjoiYmZsNDciLCJhIjoiY2x2NHd4OGxpMGJ5eDJpbGI4ZTRlajQxZCJ9.jCPFND9H2JdseL5oRtaF7w';
            var map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v11',
                center: [12.51, 41.90], //longitudine, latitudine
                zoom: 12
            });
            map.addControl(new mapboxgl.NavigationControl());

            map.addControl(new mapboxgl.GeolocateControl({
                positionOptions: {
                    enableHighAccuracy: true
                },
                trackUserLocation: true,
                showUserHeading: true,
                showAccuracyCircle: false
            }));

            const marker = new mapboxgl.Marker()
                .setLngLat([12.5196749, 41.8964103])
                .setPopup(new mapboxgl.Popup().setHTML("<h6>Siamo qui!</h6>")) // add popup
                .addTo(map);
            
        </script>
        
    </section>
    
    <!-- Footer -->
    <?php
        readFile('footer.html');
    ?>

</body>
</html>
        
