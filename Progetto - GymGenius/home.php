<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!--<script src="/bootstrap/js/bootstrap.bundle.min.js"></script>-->
    <script src="../script.js"></script>
    <script src="/jquery/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css'/>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">
    <title>Home</title>

    <script>      
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.vision, .mission, .motivation');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    } else {
                        entry.target.classList.remove('visible');
                    }
                });
            });
            elements.forEach(element => {
                observer.observe(element);
            });
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
<body id="home">
    <!-- Navbar -->
    <?php
        if (isset($_SESSION['tipo_utente']))
          include 'navbar.php';
        else
          include 'navbar_senzapop.php';          
    ?>

    <div class="h-section" id="hs1">
        <img src="/assets/imgs/gymgenius.png" alt="GymGenius" class="logo">
        <h1>GYMGENIUS COACHING</h1>
        <h3>La tua piattaforma di coaching online</h3>
    </div>

    <div class="h-section" id="vision-mission">
        <div class="vision">
            <h2>Vision</h2>
            <p>Sogniamo un mondo in cui ogni persona possa realizzare il 
                proprio potenziale fisico e mentale, superando i propri limiti 
                e raggiungendo traguardi che mai avrebbero immaginato possibili. 
                Con il nostro impegno e la nostra dedizione, vogliamo essere il 
                motore del cambiamento positivo nella vita di coloro che ci scelgono 
                come partner nel loro percorso di trasformazione.</p>
        </div>
        <div class="mission">
            <h2>Mission</h2>
            <p>Vogliamo ispirare e guidare ogni individuo nel loro viaggio verso una 
                vita più sana, più forte e più felice attraverso l'allenamento personalizzato, 
                la nutrizione consapevole e il supporto motivazionale costante.</p>
        </div>
    </div>
    
    
    
    <div class="hs2" id="hs2">
        <h1 class="motivation">Tutto sta nel cominciare...</h1>
    </div>

    
    
    <div class="services_sg" id="services">
        <h2>I Nostri Servizi</h2>
        <div class="services-container_sg">
            <div class="sottoservizio" >
                <a href="coaching/coaching.php" style='text-decoration: none' >
                    <img src="assets/imgs/home/coaching.jpg" alt="Coaching Online" >
                    <div class="servizio_txt">
                        <h3>Coaching Online</h3>
                        <p>Ottieni programmi di allenamento personalizzati e supporto continuo dai nostri esperti, direttamente online.</p>
                    </div>
                </a>
            </div>
            <div class="sottoservizio" >
                <a href="schede/schede.php" style='text-decoration: none'>
                    <img src="assets/imgs/home/schede.jpg" alt="Schede Gratuite">
                    <h3>Schede Gratuite</h3>
                    <p>Accedi a una varietà di schede di allenamento gratuite per ogni livello e obiettivo, dalla massa alla definizione.</p>
                </a>
            </div>
            <div class="sottoservizio" >
                <a href="blog/blog.php" style='text-decoration: none'>
                    <img src="assets/imgs/home/blog.jpg" alt="Articoli dal Blog">
                    <h3>Articoli dal Blog</h3>
                    <p>Scopri consigli, approfondimenti, curiosità e molto altro su allenamento e nutrizione dai nostri esperti attraverso il nostro blog.</p>
                </a>
                </div>
        </div>
    </div>
    
    <div class="testimonials" id="testimonials">
        <h2>Dicono di Noi</h2>
        <div class="container-carousel">
            <div class="row">
                <div class="col-md-6" id="car">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#testimonialCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/imgs/home/carousel-1.jpg" class="d-block w-100 carousel-image" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/imgs/home/carousel-2.jpg" class="d-block w-100 carousel-image" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/imgs/home/carousel-3.jpg" class="d-block w-100 carousel-image" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/imgs/home/carousel-4.jpg" class="d-block w-100 carousel-image" alt="Fourth slide">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/imgs/home/carousel-5.jpg" class="d-block w-100 carousel-image" alt="Fifth slide">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <div class="testimonial-text">
                        <h5 id="testimonialName">Mario R.</h5>
                        <p id="testimonialQuote">"GymGenius ha completamente trasformato il mio modo di allenarmi. I programmi sono fantastici e il supporto è impareggiabile!"</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Per fare lo scrolling delle testimonianze ogni volta che cambia l'immagine nel carosello-->
    <script>
        const testimonials = [
            {
                name: "Mario R.",
                quote: '"GymGenius ha completamente trasformato il mio modo di allenarmi. I programmi sono fantastici e il supporto è impareggiabile!"'
            },
            {
                name: "Tiziana B.",
                quote: '"I nutrizionisti di GymGenius mi hanno aiutato a raggiungere i miei obiettivi di perdita di peso in modo sano e sostenibile."'
            },
            {
                name: "Marco V.",
                quote: '"Adoro le schede di allenamento gratuite! Sono perfette per chi vuole iniziare a fare esercizio senza spendere troppo."'
            },
            {
                name: "Giacomo N.",
                quote: '"Grazie a GymGenius ho trovato la motivazione per allenarmi regolarmente e sento di avere un vero supporto professionale."'
            },
            {
                name: "Giovanni B.",
                quote: '"I programmi di coaching online sono ben strutturati e facili da seguire. Ho visto miglioramenti notevoli in poche settimane."'
            }
        ];

        const carousel = document.querySelector('#testimonialCarousel');
        carousel.addEventListener('slid.bs.carousel', function (event) {
            const index = event.to;
            document.getElementById('testimonialName').innerText = testimonials[index].name;
            document.getElementById('testimonialQuote').innerText = testimonials[index].quote;
        });
    </script>
    
    <!-- Footer -->
    <div class="footer_div_ext">
        <div class="footer_img">
            <img  src="/assets/imgs/gymgenius.png" width: auto; height="200" >
        </div>
        <div class="footer_socials">
            GYMGENIUS COACHING
            <p>
                <a class="text-white-50 bg-dark" href="https://www.facebook.com/" target="_blank"><i class="bi bi-facebook"></i></a>
                <a class="text-white-50 bg-dark" href="https://twitter.com/" target="_blank"><i class="bi bi-twitter-x"></i></a>
                <a class="text-white-50 bg-dark" href="https://www.instagram.com/" target="_blank"><i class="bi bi-instagram"></i></a>
            </p>
        </div>
        <div class="footer_contacts" id="contatti">
              <h6>CONTATTI</h6>  
              <p><i class="bi bi-telephone-fill"> &nbsp;</i> 555-0123</p>
              <p>
                <i class="bi bi-envelope-fill"></i> &nbsp;<a href="mailto:info.gymgenius@libero.it" target="_blank">info.gymgenius@libero.it</a>
              </p>
              <p>
                <i class="bi bi-geo-alt-fill"></i> &nbsp;<a href="https://www.google.com/maps/place//data=!4m2!3m1!1s0x132f6185205c9bfd:0x773e8360f9a9e5e?sa=X&ved=1t:8290&ictx=111" target="_blank">
                 Viale dello Scalo S. Lorenzo, 82 00159 Roma RM
                </a>
              </p>
        </div>
        <div class="contenitore_mappa">
            <div id ='map' style='width: 300px; height: 200px;'></div>
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
                .setPopup(new mapboxgl.Popup().setHTML('<h6 style="color:black;">Siamo qui!</h6>')) // add popup
                .addTo(map);
            
        </script>

</body>
</html>
