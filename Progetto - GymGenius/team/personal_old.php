<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.js"></script> 
    <script src="/jquery/jquery-3.7.1.js"></script>

    <title>PT</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

    <script>
        $(document).ready(function() {

            // per cambiare il font del contenuto di tutti gli iframe
            $('.myIframe').each(function() {
                var iframecont = $(this).contents();
                var pre = iframecont.find('pre');
                
                if (pre.length > 0) {
                    pre.css({
                        'font-family': 'Lato, sans-serif',
                        'font-size': '16px',
                    });
                }
            });
        });
    </script>

</head>
<body>
    <!-- Navbar -->
    <?php
        $pageTitle = "Personal trainers";
        session_start();
        if (isset($_SESSION['tipo_utente']))
            include '../navbar.php';
        else
            include '../navbar_senzapop.php';
    ?>

    <section class="main-content">
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                    or die('Could not connect: ' . pg_last_error());
            if ($dbconn) {
                # echo "connessione effettuata";
                $q = "select nome, cognome, img, txt from trainer where tipo = 'PT'";
                $result = pg_query_params($dbconn, $q, array());
            }
            
            $i = 1;
            
                while ($row = pg_fetch_assoc($result)) {
                    if ($i % 2 != 0) {
                        echo '
                        <div class="div-allenatori">
                            <div class="row justify-content-md-center">
                                <div class="col-sm-4" align="left">
                                    <p id="img_trainer_'. $i .'">
                                        <img class="img_trainer" src="' . $row['img'] . '" alt="&nbsp;pt" height="250px">
                                    </p>
                                </div>
                                <div class="col-sm-8" align="right">
                                    <div>&nbsp;</div>
                                    <div align="center"><h6><b> '. $row['nome'] . '&nbsp;' . $row['cognome'] . ' </b></h6></div>
                                    
                                    <div id="desc_trainer_'. $i .'">
                                        <iframe class="myIframe" src="' . $row['txt'] . '" width="100%" height="240"></iframe>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>&nbsp;</div>'; 
                    }
                    if ($i % 2 == 0) {
                        echo '
                        <div class="div-allenatori">
                            <div class="row justify-content-md-center" >
                                <div class="col-sm-8">
                                    <div>&nbsp;</div>
                                    <div align="center"><h6><b> '. $row['nome'] . '&nbsp;' . $row['cognome'] . ' </b></h6></div>
                                    
                                    <p id="desc_trainer_'. $i .'">
                                        <iframe class="myIframe" src="' . $row['txt'] . '" width="100%" height="240"></iframe>  
                                    </p>
                                </div>
                                <div class="col-sm-4">
                                    <p id="img_trainer_'. $i .'">
                                        <img class="img_trainer" src="' . $row['img'] . '" alt="&nbsp;pt" height="250px">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>&nbsp;</div>'; 
                    }
                    $i += 1;
                }
        ?>
        </div>
    </section>


    <!-- Footer -->
    <?php
        readFile('../footer.html');
    ?>
</body>
</html>