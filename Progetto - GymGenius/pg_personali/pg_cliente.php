<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.js"></script> <!-- teoricamente da rimuovere per il problema della navbar -->
    <script type="application/javascript" src="/script.js"></script>
    <script src="/jquery/jquery-3.7.1.js"></script>


    <title>Pagina personale</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png"> 
</head>
<body>
    <!-- Navbar -->
    <?php
        $pageTitle = "Pagina personale";
        session_start();
        if (isset($_SESSION['tipo_utente']))
            include '../navbar.php';
        else
            include '../navbar_senzapop.php';
    ?>

    <section class="main-content">
        <?php
            if ($_SESSION['cambio_psw']) {
                echo '<script>alert("Cambio password eseguito con successo");</script>';
                $_SESSION['cambio_psw'] = false;
                unset($_SESSION['cambio_psw']);
            }
            $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                    or die('Could not connect: ' . pg_last_error());
            if ($dbconn) {
                # echo "connessione effettuata";
                $email = $_SESSION['email'];

                $q1 = "select * from richiesta where email_richiedente = $1";
                $result1 = pg_query_params($dbconn, $q1, array($email));
            }
        
        echo '
        <div class="tab_pg_trainer" id="tab-cliente">
            <ul class="nav nav-tabs" id="tabCliente" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-profilo-cliente" data-bs-toggle="tab" data-bs-target="#profilo_cliente" type="button" role="tab" aria-controls="profilo_cliente" aria-selected="false">Profilo</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-richieste-cliente" data-bs-toggle="tab" data-bs-target="#richieste_cliente" type="button" role="tab" aria-controls="richieste_cliente" aria-selected="false">Richieste</button>
                </li>
            </ul>

            <div class="tab-content" id="tabContent">   
                <!-- Tab profilo -->
                <div class="tab-pane fade show active" id="profilo_cliente" role="tabpanel" aria-labelledby="tab-profilo">
                        <div class="form_profilo_cliente col">
                            <form name="profcliente_form" action="" enctype="multipart/form-data">
                                <h5><b>Informazioni personali</b></h5>
                
                                <div class="row mb-3 ">  <!--justify-content-md-center-->
                                    <div class="col">
                                        <label for="nome" class="form-label-sm">Nome</label>
                                        <input type="text" class="form-control" id="nome" value="' . $_SESSION['nome'] . '" disabled>
                                    </div> 
                                    <div class="col">
                                        <label for="cognome" class="form-label-sm">Cognome</label>
                                        <input type="text" class="form-control" id="cognome" value="' . $_SESSION['cognome'] . '" disabled>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-3">
                                        <label for="data_nascita" class="form-label-sm">Data di nascita</label>
                                        <input type="text" class="form-control" id="data_nascita" value="'. $_SESSION['data_nascita'] . '" disabled>
                                    </div>                     
                                    <div class="col-3">
                                        <label for="sesso" class="form-label-sm">Sesso</label>
                                        <input type="text" class="form-control" id="sesso" value="' . $_SESSION['sesso'] . '" disabled>
                                    </div>   
                                    <div class="col">
                                        <label for="email" class="form-label-sm">Email</label>
                                        <input type="email" class="form-control" id="email" value="' . $_SESSION['email'] . '" disabled>
                                    </div>     
                                </div>

                            </form>
                        </div>
                        <hr/>

                        

                        <div class="form_cambio_psw col">
                            <form name="cambiopsw_form">
                                <h5><b>Aggiorna password</b></h5>
                                <div class="row row-cliente">
                                    <div class="col-5">
                                        <label for="vecchiapsw" class="form-label-sm">Password corrente</label>
                                        <input type="password" class="form-control" id="vecchiapsw">
                                    </div>                         
                                </div>
                                <div class="row row-cliente">
                                    <div class="col-5">
                                        <label for="nuovapsw" class="form-label-sm">Nuova password</label>
                                        <input type="password" class="form-control" id="nuovapsw">
                                    </div>                         
                                </div>
                                <div class="row row-cliente">
                                    <div class="col-5">
                                        <label for="confermapsw" class="form-label-sm">Conferma password</label>
                                        <input type="password" class="form-control" id="confermapsw">
                                    </div>                    
                                </div>
                            </form>

                        </div>
                        <hr/>
                        <button type="button" class="btn bottone-form" id="changepsw" onclick="return validaForm_cambiopsw();">Salva password</button>
  
                </div>

                <!-- Tab richieste -->
                <div class="tab-pane fade" id="richieste_cliente" role="tabpanel" aria-labelledby="tab-richieste">
        
                    <div class="lista-richieste">
                        <div class="panel-container" >';
                            $i = 1;
                            while ($row = pg_fetch_assoc($result1)) {
                                $codice_stringa = $row['data'];
                                $codice_intero = intval($codice_stringa);
                                $data = date("d/m/Y H:i:s", $codice_intero); 

                                $q2 = "select * from trainer where email=$1";
                                $result2 = pg_query_params($dbconn, $q2, array($row['email_allenatore']));
                                $row2 = pg_fetch_assoc($result2);

                                echo '
                                <div class="panel-richieste" id="'. $row['codice'] . '">
                                    <div class="panel-heading" id="'. $row['completa'] .'">';
                                    
                                        if ($row['completa'] == 't') {
                                            echo '<span style="display: inline-block;"><i class="bi-check2-square no-pointer"></i></span>';
                                        } else {
                                            echo '<span style="display: inline-block;"><i class="bi bi-square no-pointer"></i></span>';
                                        }

                                        if ($row2['tipo'] == 'N') {
                                            $tipo = 'Nutrizionista';
                                        } else {
                                            $tipo = 'Allenatore';
                                        }
                                        echo '
                                        
                                        <h5 class="panel-title" style="display: inline-block;">'. $tipo .': ' . $row2['nome'] .' '. $row2['cognome'] .'</h5>
                                        <p class="data-richiesta-cliente">'. $data  .' </p>
                                        <a href="mailto:' . $row['email_allenatore'] . '" target="_blank">
                                            <button class="send-email-cliente btn btn-outline-warning btn-sm"><i class="bi bi-envelope-arrow-up"></i></button> 
                                        </a> 
                                    </div>
                                    <hr/>
                                    <div class="panel-body">
                                        <p><strong>Dati inviati:</strong></p>
                                        <p><strong>Altezza:</strong> '. $row['altezza'] .' cm</p>
                                        <p><strong>Peso:</strong> '. $row['peso'] .' kg</p>
                                        <p><strong>Frequenza di allenamento:</strong> '. $row['frequenza'] .'</p>
                                        <p><strong>Obiettivi:</strong> '. $row['obiettivi'] .'</p>
                                    </div>
                                </div>';
                                
                            }
                            $i += 1;
                        echo ' 
                        </div>               
                    </div>
                </div>  
            </div>
        </div>
        
    </section>';
    ?>
    
    <!-- Footer -->
    <?php
        include '../footer.html';
    ?>

</body>
</html>