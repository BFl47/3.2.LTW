<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script> <!--teoricamente da rimuovere per il problema della navbar-->
    <script src="/jquery/jquery-3.7.1.js"></script>

    <title>Blog</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

    <script>
        $(document).ready(function() {
            $('.link-bar').click(function() {
                var categoria = $(this).attr('id');
                console.log(categoria);
                
                $('.cards-container-blog .card-blog').hide();

                if (categoria == 'tutti') {
                    $('.cards-container-blog .card-blog').show();
                } else {
                    $('.cards-container-blog .card-blog.' + categoria).show();
                }
            });
        
            // per cambiare il font del contenuto di tutti gli iframe
            $('.myIframeArt').each(function() {
                var iframecont = $(this).contents();
                var pre = iframecont.find('pre');

                if (pre.length > 0) {
                    pre.css({
                        'font-family': 'Arial, sans-serif',
                        'font-size': '20px'
                    });
                }
            });
        });
    </script>


</head>
<body>
    <!-- Navbar -->
    <?php
        $pageTitle = "Blog";
        session_start();
        if (isset($_SESSION['tipo_utente']))
            include '../navbar.php';
        else
            include '../navbar_senzapop.php';
    
        $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                or die('Could not connect: ' . pg_last_error());
        if ($dbconn) {
            # echo "connessione effettuata";

            $q = "select * from articolo join trainer on articolo.autore = trainer.email";
            $result = pg_query_params($dbconn, $q, array());
        }
    ?>

    <section class="main-content">
        <div class="blog-container">
            <div class="bar row">
                <div class="col bar-item"><a href="#" class="link-bar" id="tutti">Tutti i post</a></div>
                <div class="col bar-item"><a href="#" class="link-bar" id="allenamento">Allenamento</a></div>
                <div class="col bar-item"><a href="#" class="link-bar" id="nutrizione">Nutrizione</a></div>
            </div>
            <div class="cards-container-blog">
   
                <?php
                    $i = 1; 
                    while ($row = pg_fetch_assoc($result)) {
                        $tipo = strtolower($row['tipo_art']);
                        echo '
                            <div class="card card-blog '. $tipo .'">
                                <img src="'. $row['img_art'] .'" class="card-img card-img-blog" alt="immagine articolo">
                                <div class="card-body"> 
                                    <p></p>
                                    <h5 class="title-card title-card-blog">'. $row['titolo'] .'</h5>
                                    <p></p>
                                    <button class="btn btn-sm card-subtitle card-subtitle-blog" disabled>'. $row['tipo_art'] .'</button>
                                    <p></p>
                                    <p class="card-text card-text-blog">'. $row['intro'] .'</p>
                                    <a href="#" class="btn btn-secondary btn-continua" data-bs-toggle="modal" data-bs-target="#Articolo'. $i .'">Continua la lettura</a>
                                </div>
                            </div>
                            

                            <div class="modal fade" id="Articolo'. $i .'" tabindex="-1">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">'. $row['titolo'] .'</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="'. $row['img_art'] .'" class="modal-img" alt="immagine articolo">
                                            <iframe class="myIframeArt" src="' . $row['testo_art'] . '" width="100%" height="700px"></iframe>  

                                        </div>
                                        <div class="modal-footer">
                                            '. $row['nome'] . ' ' . $row['cognome'] .'  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                        $i += 1;
                    }
                ?>
                
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php
        include '../footer.html';
    ?>

</body>
</html>