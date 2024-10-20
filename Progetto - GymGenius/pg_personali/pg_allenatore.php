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

    <script>
        $(document).ready(function() {
            $('.nav-link').click(function() {
                $('.nav-link.active').removeClass('active'); 
                $(this).addClass('active'); 
            });

            $('.delete-button').click(function() {
                var panel_id = $(this).closest('.panel-richieste').attr('id');
                // console.log(panel_id);
                var panel = $(this).closest('.panel-richieste')
                
                $(this).closest('.panel-richieste').fadeOut();

                $.ajax({
                    url: 'aggiorna_dati.php',
                    method: 'POST',
                    data: { codice: panel_id, delete: true }
                });
            });

            $("span").click(function(){
                $(this).find("i.bi-square").removeClass('bi bi-square').addClass('bi-check2-square');
                var panel_id = $(this).closest('.panel-richieste').attr('id');
                var panelh_id = $(this).closest('.panel-heading').attr('id');

                // console.log(panel_id);
                // console.log(panelh_id);

                $.ajax({
                    url: 'aggiorna_dati.php',
                    method: 'POST',
                    data: { completa: panelh_id, codice: panel_id }
                });
            });

            // per cambiare il font del contenuto dell'iframe
            var iframe = $('.myIframe');
            var iframecont = iframe.contents();
            var pre = iframecont.find('pre');

            if (pre.length > 0) {
                pre.css( {
                    'font-family': 'Arial, sans-serif',
                    'font-size': '16px'
                });
            }

            $('#descrizione').change(function(){
                mostraAnteprimaIF(this);
            });

            function mostraAnteprimaIF(input) {
                var file = input.files[0];
                var iframe = document.getElementById('anteprimaIframe');
                
                if (file) {
                    iframe.src = URL.createObjectURL(file);
                }
            }
        });

        function mostraAnteprima() {
            var fileInput = document.getElementById('imgArticolo');
            var anteprima = document.getElementById('anteprimaImg');

            if (fileInput.files.length != 0) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    anteprima.src = e.target.result; // sorgente anteprima = url fileinput
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function aggiornaImg() {
            var fileInput = document.getElementById('imgProfilo');
            var anteprima = document.getElementById('anteprimaImgProf');

            if (fileInput.files.length != 0) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    anteprima.src = e.target.result; // sorgente anteprima = url fileinput
                };

                reader.readAsDataURL(fileInput.files[0]);
            }
        }  
    </script>
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

                $q1 = "select * from richiesta where email_allenatore = $1 and new = true";
                $result1 = pg_query_params($dbconn, $q1, array($email));
            }
            if (isset($_SESSION['articolo_caricato'])) {  //modified
                if (!$_SESSION['articolo_caricato']) {
                    $_SESSION['articolo1'] = '/assets/articoli/default.jpg';
                } else {
                    echo '
                        <script>
                            alert("Articolo caricato con successo");
                        </script>
                    ';
                    $_SESSION['articolo_caricato'] = false;
                    
                }
            } else {
                $_SESSION['articolo1'] = '/assets/articoli/default.jpg';
            }
            
            if ($_SESSION['tipo_trainer'] == 'N') {
                $tipo = 'Nutrizione';
            } else {
                $tipo = 'Allenamento';
            }
        
        echo '
        <div class="tab_pg_trainer">
            <ul class="nav nav-tabs" id="tabTrainer" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tab-profilo" data-bs-toggle="tab" data-bs-target="#profilo" type="button" role="tab" aria-controls="profilo" aria-selected="false">Profilo</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-richieste" data-bs-toggle="tab" data-bs-target="#richieste" type="button" role="tab" aria-controls="richieste" aria-selected="false">Richieste</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tab-articoli" data-bs-toggle="tab" data-bs-target="#articoli" type="button" role="tab" aria-controls="articoli" aria-selected="false">Pubblica un articolo</button>
                </li>
            </ul>

            <div class="tab-content" id="tabContent">   
                
                <!-- Tab profilo -->
                <div class="tab-pane fade show active" id="profilo" role="tabpanel" aria-labelledby="tab-profilo">
                    <form id="prof_form" action="/upload.php" method="POST" enctype="multipart/form-data" onsubmit="return validaForm_infopt();"></form>
                    <form id="cambiopsw_form2" name="cambiopsw_form"></form>

                    <div class="form_profilo">
                        <div name="prof_form_content">
                            <h5><b>Informazioni personali</b></h5>

                            <div class="row mb-3">
                                <div class="col">
                                    <label for="nome" class="form-label-sm">Nome</label>
                                    <input type="text" class="form-control" id="nome" value="' . $_SESSION['nome'] . '" disabled form="prof_form">
                                </div>
                                <div class="col">
                                    <label for="cognome" class="form-label-sm">Cognome</label>
                                    <input type="text" class="form-control" id="cognome" value="' . $_SESSION['cognome'] . '" disabled form="prof_form">
                                </div>
                                <div class="col">
                                    <label for="data_nascita" class="form-label-sm">Data di nascita</label>
                                    <input type="text" class="form-control" id="data_nascita" value="'. $_SESSION['data_nascita'] . '" disabled form="prof_form">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="sesso" class="form-label-sm">Sesso</label>
                                    <input type="text" class="form-control" id="sesso" value="' . $_SESSION['sesso'] . '" disabled form="prof_form">
                                </div>
                                <div class="col">
                                    <label for="tipo_trainer" class="form-label-sm">Team</label>
                                    <input type="text" class="form-control" id="tipo_trainer" value="' . $tipo . '" disabled form="prof_form">
                                </div>
                                <div class="col">
                                    <label for="email" class="form-label-sm">Email</label>
                                    <input type="email" class="form-control" id="email" value="' . $_SESSION['email'] . '" disabled form="prof_form">
                                </div>
                                
                            </div>
                            
                            <hr/>

                            <div class="row mb-3">
                                <div class="col-4">
                                    <p><img class="img-form-anteprima" id="anteprimaImgProf" src="' . $_SESSION['file1'] . '" alt="&nbsp;Inserire un\'immagine di profilo" height="200em"></p>
                                    <label for="imgProfilo" class="form-label-sm">Cambia immagine</label> 
                                    <p><input type="file" accept="image/png, image/jpeg" name="img" id="imgProfilo" onchange="return aggiornaImg();" form="prof_form"></p> 
                                </div>
                      
                                <div class="col-8" >
                                    <p class="descrizione descrizione-pt">
                                        <iframe class="myIframe myIframe-pt" id="anteprimaIframe" src="' . $_SESSION['file2'] . '" width="100%" height="190em"></iframe> 
                                    </p>
                                    <label for="descrizione" class="form-label-sm label-pt">Su di te</label>
                                    <br/>
                                    <input class="label-pt" type="file" accept=".txt" name="txt" id="descrizione" form="prof_form">
                                </div>
                            </div>
            
                            <hr/>';
                            
                            if ($_SESSION['tipo_trainer'] == 'PT') {
                                echo '
                                <div class="row mb-3">
                                    <h5><b>Specializzazioni</b></h5>
                                    <p>Selezionate: '. $_SESSION['specializzazione'] .' <br></p>
                                    
                                    &nbsp; &nbsp; Modifica: &nbsp; &nbsp; 
    
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox1" name="specializzazione[]" value="Powerlifting" form="prof_form">
                                        <label class="form-check-label" for="Checkbox1">Powerlifting</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox2" name="specializzazione[]" value="CrossFit" form="prof_form">
                                        <label class="form-check-label" for="Checkbox2">CrossFit</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox3" name="specializzazione[]" value="HIIT" form="prof_form">
                                        <label class="form-check-label" for="Checkbox3">HIIT</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox4" name="specializzazione[]" value="Yoga e Pilates" form="prof_form">
                                        <label class="form-check-label" for="Checkbox4">Yoga e Pilates</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox5" onchange="return gestisciAltro()" form="prof_form">
                                        <label class="form-check-label" for="Checkbox5"><input type="text" id="Checkbox5input" name="specializzazione[]" class="form-control input" placeholder="Altro" value="" disabled form="prof_form"></label>
                                    </div>
                                </div>';
                            } else if ($_SESSION['tipo_trainer'] == 'N') {
                                echo '
                                <div class="row mb-3">
                                    <h5><b>Specializzazioni</b></h5>
                                    <p>Selezionate: '. $_SESSION['specializzazione'] .' <br></p>
                                    
                                    &nbsp; &nbsp; Modifica: &nbsp; &nbsp; 
    
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox1" name="specializzazione[]" value="Dieta vegana" form="prof_form">
                                        <label class="form-check-label" for="Checkbox1">Dieta vegana</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox2" name="specializzazione[]" value="Dieta vegetariana" form="prof_form">
                                        <label class="form-check-label" for="Checkbox2">Dieta vegetariana</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox3" name="specializzazione[]" value="Dieta Chetogenica" form="prof_form">
                                        <label class="form-check-label" for="Checkbox3">Dieta Chetogenica</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox4" name="specializzazione[]" value="Integratori" form="prof_form">
                                        <label class="form-check-label" for="Checkbox4">Integratori</label>
                                    </div>
                                    <div class="form-check col">
                                        <input class="form-check-input" type="checkbox" id="Checkbox5" onchange="return gestisciAltro()" form="prof_form">
                                        <label class="form-check-label" for="Checkbox5"><input type="text" id="Checkbox5input" name="specializzazione[]" class="form-control input" placeholder="Altro" value="" disabled form="prof_form"></label>
                                    </div>
                                </div>';
                            }
                            
                              
                            echo '
                            <hr/>

                            <div class="form_cambio_psw col">
                                <div name="cambiopsw_content" >
                                    <h5><b>Aggiorna password</b></h5>
                                    <div class="row">
                                        <div class="col">
                                            <label for="vecchiapsw" class="form-label-sm">Password corrente</label>
                                            <input type="password" class="form-control" id="vecchiapsw" form="cambiopsw_form2">
                                        </div>    
                                        <div class="col">
                                            <label for="nuovapsw" class="form-label-sm">Nuova password</label>
                                            <input type="password" class="form-control" id="nuovapsw" form="cambiopsw_form2">
                                        </div>      
                                        <div class="col">
                                            <label for="confermapsw" class="form-label-sm">Conferma password</label>
                                            <input type="password" class="form-control" id="confermapsw" form="cambiopsw_form2">
                                        </div>                 
                                    </div>
                                </div>   
                            </div>

                            &nbsp; <br>
                            <hr/>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn bottone-form" id="changepsw" onclick="validaForm_cambiopsw();" style="width: 100%;">Salva password</button>
                                </div>    
                                <div class="col">
                                    <button type="submit" class="btn bottone-form" style="width: 100%;" form="prof_form">Salva profilo</button>
                                </div>              
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Tab richieste -->
                <div class="tab-pane fade" id="richieste" role="tabpanel" aria-labelledby="tab-richieste">
        
                    <div class="lista-richieste">
                        <div class="panel-container" >';
                            $i = 1;
                            while ($row = pg_fetch_assoc($result1)) {
                                $codice_stringa = $row['data'];
                                $codice_intero = intval($codice_stringa);
                                $data = date("d/m/Y H:i:s", $codice_intero); 

                                $q2 = "select * from utente where email=$1";
                                $result2 = pg_query_params($dbconn, $q2, array($row['email_richiedente']));
                                $row2 = pg_fetch_assoc($result2);

                                echo '
                                <div class="panel-richieste" id="'. $row['codice'] . '">
                                    <div class="panel-heading" id="'. $row['completa'] .'">';
                                    
                                        if ($row['completa'] == 't') {
                                            echo '<span style="display: inline-block;"><i class="bi-check2-square"></i></span>';
                                        }
                                        else {
                                            echo '<span style="display: inline-block;"><i class="bi bi-square"></i></span>';
                                        }
                                        echo '
                                        
                                        <h5 class="panel-title" style="display: inline-block;">Cliente: ' . $row2['nome'] . ' ' . $row2['cognome'] .'</h5>
                                        <p class="data-richiesta">'. $data  .' </p>
                                        <a href="mailto:' . $row['email_richiedente'] . '" target="_blank">
                                            <button class="send-email btn btn-outline-success btn-sm"><i class="bi bi-envelope-arrow-up"></i></button> 
                                        </a>
                                        <button class="delete-button btn btn-outline-danger btn-sm"> <i class="bi bi-trash "></i></button>
                                    </div>
                                    <hr/>
                                    <div class="panel-body">
                                        <p><strong>Cliente:</strong> '. $row['email_richiedente'] .'</p>
                                        <p><strong>Sesso:</strong> '. $row2['sesso'] .'</p>
                                        <p><strong>Data di nascita:</strong> '. $row2['data_nascita'] .'</p>
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
                

                <!-- Tab articoli -->
                <div class="tab-pane fade" id="articoli" role="tabpanel" aria-labelledby="tab-articoli">
                        
                        <form name="form_articolo" action="/upload_articolo.php" method="POST" enctype="multipart/form-data" onsubmit="return validaForm_articolo();">
                            <div class="form-articolo">
                                <div>
                                    <label for="autore_art" class="form-label-sm">Autore</label>
                                    <input type="text" class="form-control input input-articolo" id="autore_art" value="'. $_SESSION['nome'] .' '. $_SESSION['cognome'].'" disabled>
                                </div>
                                <br>
                                <div class="row-sm">
                                    <div class="col-sm">
                                        <label for="titolo" class="form-label-sm">Titolo</label>
                                        <input type="text" class="form-control input input-articolo" id="titolo" name="titolo">
                                    </div>
                                </div>
                                <hr/>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <h6>Scegliere il tipo di articolo</h6>
                                        <div class="form-check form-check">
                                            <input class="form-check-input" type="radio" name="tipo_art" id="radio_allenamento" value="Allenamento" checked>
                                            <label class="form-check-label" for="radio_allenamento">
                                                Allenamento
                                            </label>
                                        </div>
                                        <div class="form-check form-check">
                                            <input class="form-check-input" type="radio" name="tipo_art" id="radio_nutrizione" value="Nutrizione">
                                            <label class="form-check-label" for="radio_nutrizione">
                                                Nutrizione
                                            </label>
                                        </div>                               
                                    </div>
                                    <div class="col">
                                        <label for="intro" class="form-label">Introduzione (90 caratteri)</label>
                                        <textarea class="form-control input-articolo-intro" id="intro" name="intro" maxlength="100"></textarea>
                                    </div>
                                </div> 
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="imgArticolo" class="form-label-sm">Scegli un\'immagine</label> 
                                        <p><input type="file" accept="image/png, image/jpeg" name="imgArt" id="imgArticolo" onchange="mostraAnteprima()"></p>
                                        <p><img class="img-form-anteprima" id="anteprimaImg" src="' . $_SESSION['articolo1'] . '"  alt="&nbsp;anteprima" height="100px"></p>
                                    </div>
                                    <div class="col-8">
                                        <label for="txtArticolo" class="form-label-sm">Carica l\'articolo (400 parole)</label>
                                        <input type="file" accept=".txt" name="txtArt" id="txtArticolo">
                                    </div>
                                </div>
                                

                            </div>
                            <div class="art-footer">
                                <hr/>

                                <button type="submit" class="btn bottone-form">Pubblica</button>
                            </div>
                        </form>
                    
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