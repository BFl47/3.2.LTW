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

    <title>Nutrizionisti</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

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
<body class="bd-nutrizionisti">
    <!-- Navbar -->
    <?php
        $pageTitle = "Nutrizionisti";
        session_start();
        if (isset($_SESSION['tipo_utente']))
            include '../navbar.php';
        else
            include '../navbar_senzapop.php';
    ?>

    <section class="team-body">
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                    or die('Could not connect: ' . pg_last_error());
            if ($dbconn) {
                # echo "connessione effettuata";
                $q = "select nome, cognome, email, img, txt, specializzazione from trainer where tipo = 'N'";
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