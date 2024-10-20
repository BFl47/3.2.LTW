<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.js"></script> <!-- teoricamente da rimuovere per il problema della navbar -->
    <script src="/jquery/jquery-3.7.1.js"></script>

    <title>PT</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

    <!--per il font google Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <script>
        
        $(document).ready(function() {

            // per cambiare il font del contenuto di tutti gli iframe
            $('.myIframe').each(function() {
                var iframecont = $(this).contents();
                var pre = iframecont.find('pre');
                
                if (pre.length > 0) {
                    pre.css({
                        'font-family': 'Arial, sans-serif',
                        'font-size': '16px',
                        'line-height': '1.5'
                    });
                }
            });
        });
        
    </script>

</head>
<body class="bd-personal">
    <!-- Navbar -->
    <?php
        $pageTitle = "Personal trainers";
        session_start();
        if (isset($_SESSION['tipo_utente']))
            include '../navbar.php';
        else
            include '../navbar_senzapop.php';
    ?>

    <section class="team-body">
        <div class="team-main-text">
            <!--
            Se sei alla ricerca di <b>professionisti</b> altamente qualificati e appassionati pronti ad aiutarti a raggiungere i 
            tuoi obiettivi fitness, sei nel posto giusto. Qui su GymGenius, ci impegniamo a offrirti accesso ai migliori 
            <b>personal trainers</b> disponibili, pronti a guidarti lungo il percorso del fitness e del benessere.<br>
            I nostri personal trainers non sono solo esperti nell'ambito dell'allenamento fisico, ma sono anche motivatori, 
            mentori e guide personalizzate. Sia che tu stia cercando di perdere peso, costruire muscoli, migliorare la tua 
            resistenza o raggiungere qualsiasi altro obiettivo, i nostri trainer sono qui per aiutarti a realizzare il tuo 
            pieno potenziale.<br>
            Scegli subito il tuo personal trainers e inizia la scalata verso il fisico dei tuoi sogni!
            -->
        </div>
        
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                    or die('Could not connect: ' . pg_last_error());
            if ($dbconn) {
                # echo "connessione effettuata";
                $q = "select nome, cognome, email, img, txt, specializzazione from trainer where tipo = 'PT'";
                $result = pg_query_params($dbconn, $q, array());
            }
            
            $i = 1;
                while ($row = pg_fetch_assoc($result)) {
                    $specializzazione = explode(', ', $row['specializzazione']);
                    if ($i % 2 != 0) {
                        echo '
                        <div class="card-allenatori">
                            <div class="card-allenatori-2"> 
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-4 col-md-12" align="left">
                                        <p id="img_trainer_'. $i .'" align="center">
                                            <img class="foto-trainer" src="' . $row['img'] . '" alt="&nbsp;pt" height="300px">
                                        </p>
                                    </div>
                                    <div class="col-lg-8 col-md-12">
                                    <div class="card-name" align="center"> '. $row['nome'] . '&nbsp;' . $row['cognome'] . '</div>
                                    <div class="row-email" align="center"><i class="bi bi-envelope-at no-pointer">'. '&nbsp;' . $row['email'] . '</i></div>    
                                        <p id="desc_trainer_'. $i .'" class="desc_trainer">
                                            <iframe class="myIframe" src="' . $row['txt'] . '" width="100%" height="250px"></iframe>  
                                        </p>
                                        <div class="specializzazioni" align="center">';
                                            if (!empty($row['specializzazione'])) {
                                                foreach($specializzazione as $val) {
                                                    echo '<button class="btn btn-sm card-subtitle card-subtitle-team" disabled>'. $val .'</button>';
                                                }
                                            }
                                        echo '
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        '; 
                    }
                    if ($i % 2 == 0) {
                        echo '
                        <div class="card-allenatori">
                            <div class="card-allenatori-2">
                                <div class="row justify-content-md-center" >
                                    <div class="col-lg-8 col-md-12 order-2 order-lg-1" align="center">
                                        <div class="card-name" align="center">'. $row['nome'] . '&nbsp;' . $row['cognome'] . '</div>
                                        <div class="row-email" align"center"><i class="bi bi-envelope-at no-pointer">'. '&nbsp;' . $row['email'] . '</i></div>    
                                            <p id="desc_trainer_'. $i .'" class="desc_trainer2">
                                                <iframe class="myIframe" src="' . $row['txt'] . '" width="100%" height="250px"></iframe>  
                                            </p>
                                            <div class="specializzazioni" align="center">';
                                            if (!empty($row['specializzazione'])) {
                                                foreach($specializzazione as $val) {
                                                    echo '<button class="btn btn-sm card-subtitle card-subtitle-team" disabled>'. $val .'</button>';
                                                }
                                            }
                                        echo '
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 order-1 order-lg-2 center-middle">
                                        <p id="img_trainer_'. $i .'" align="center">
                                            <img class="foto-trainer-2" src="' . $row['img'] . '" alt="&nbsp;pt" height="300px">
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        '; 
                    }
                    $i += 1;
                }
        ?>
    </section>


    <!-- Footer -->
    <?php
        include '../footer.html';
    ?>
</body>
</html>