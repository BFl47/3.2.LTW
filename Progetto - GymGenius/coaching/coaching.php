<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.js"></script> <!-- teoricamente da rimuovere per il problema della navbar -->
    <script type="application/javascript" src="/script.js"></script>

    <title>Coaching</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

    <script src="/jquery/jquery-3.7.1.js"></script>
    <script>
        $(document).ready(function() {
            $("#data_scadenza").on("input", function() {
                var input = $(this).val();
                if (input.length === 2 && input.indexOf("/") === -1) {
                    $(this).val(input + "/");
                }
            });
            $("#card").on("input", function() {
                var input = $(this).val().replace(/\s/g, '');
                if (input.length > 0) {
                    input = input.match(new RegExp('.{1,4}', 'g')).join(' ');
                }
                $(this).val(input);
            });
        });
    </script>   
</head>
<body>
    <!-- Navbar -->
    <?php
        $pageTitle = "Coaching";
        session_start();
        if (isset($_SESSION['tipo_utente']) && $_SESSION['tipo_utente'] == 'trainer') {
            header("Location: /pg_personali/pg_allenatore.php");
            exit;
        }
        if (isset($_SESSION['tipo_utente']))
            include '../navbar.php';
        else {
            include '../navbar_senzapop.php';
        }
    ?>

    <section class="coaching-body">
        <div class="coaching-main-text">
            <?php
                if(isset($_SESSION['tipo_utente'])==false){
                    echo '<div class="avviso"><i class="bi bi-exclamation-triangle-fill"></i>  Si prega di effettuare <a href="/login/form_signin.php">l\'accesso<a> prima di continuare!  <i class="bi bi-exclamation-triangle-fill"></i></div>';
                }
            ?>
            
            Per richiedere un appuntamento con uno dei nostri esperti, compila il seguente modulo. 
            Proceduto con l'acquisto, sarai contattato entro 48 ore per confermare la data e l'orario dell'appuntamento.<br>
            La carta inserita come metodo di pagamento viene utilizzata esclusivamente come garanzia per GymGenius, per cui
            <b>non verrà addebitato nessun importo automaticamente</b>. Il pagamento avviene di persona, direttamente durante il tuo 
            incontro con i nostri professionisti.<br>
            Per ulteriori domande o informazioni, non esitare a contattarci. Grazie per aver scelto il nostro servizio di coaching online.
        </div>
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                    or die('Could not connect: ' . pg_last_error());

            if ($dbconn) {
                # echo "connessione effettuata";
                $q1 = "select email from trainer where tipo = 'PT'";
                $result1 = pg_query_params($dbconn, $q1, array());

                $q2 = "select email from trainer where tipo = 'N'";
                $result2 = pg_query_params($dbconn, $q2, array());
            }
            
            echo '
                <div class="form_coaching">
                    <form name="coach_form" action="richiesta.php" method="POST" onsubmit="return validaForm_coach();">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="nome" class="form-label-sm">Nome</label>
                                <input type="text" class="form-control" id="nome" value="' . (isset($_SESSION['nome']) ? $_SESSION['nome'] : '') . '" disabled>
                            </div>
                            <div class="col">
                                <label for="cognome" class="form-label-sm">Cognome</label>
                                <input type="text" class="form-control" id="cognome" value="' . (isset($_SESSION['cognome']) ? $_SESSION['cognome'] : '') . '" disabled>
                            </div>
                            <div class="col">
                                <label for="data_nascita" class="form-label-sm">Data di nascita</label>
                                <input type="text" class="form-control" id="data_nascita" value="'. (isset($_SESSION['data_nascita']) ? $_SESSION['data_nascita'] : '') . '" disabled>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col">
                                <label for="email" class="form-label-sm">Email</label>
                                <input type="email" class="form-control" id="email" value="' . (isset($_SESSION['email']) ? $_SESSION['email'] : '') . '" disabled>
                            </div>
                            <div class="col">
                                <label for="allenatore" class="form-label-sm">Scegli allenatore</label>
                                <select class="form-select" id="allenatore" name="allenatore">
                                    <option value="nulla"></option>
                                    <optgroup label="Personal trainer">';
                                        while ($row = pg_fetch_assoc($result1)) {
                                            echo '<option value="' . $row['email'] . '">' . $row['email'] . '</option>';
                                        }
                                echo '</optgroup>
                                    <optgroup label="Nutrizionisti">';
                                        while ($row = pg_fetch_assoc($result2)) {
                                            echo '<option value="' . $row['email'] . '">' . $row['email'] . '</option>';
                                        }
                                echo '</optgroup>
                                </select>
                            </div>
                            
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="altezza" class="form-label-sm">Altezza (cm)</label>
                                <input type="number" class="form-control" id="altezza" name="altezza">
                            </div>
                            <div class="col">
                                <label for="peso" class="form-label-sm">Peso (kg)</label>
                                <input type="number" class="form-control" id="peso" name="peso">
                            </div>
                            <div class="col">
                                <label for="frequenza" class="form-label-sm">Frequenza di allenamento</label>
                                <select class="form-select" id="frequenza" name="frequenza">
                                    <option value="nulla"></option>
                                    <option value="1-2 volte a settimana">1-2 volte a settimana</option>
                                    <option value="3-4 volte a settimana">3-4 volte a settimana</option>
                                    <option value="ogni giorno">ogni giorno</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="obiettivi" class="form-label-sm">Parlaci dei tuoi obiettivi</label>
                            <textarea class="form-control" id="obiettivi" name="obiettivi" rows="3" maxlength="600"></textarea>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="dichiarazione" name="dichiarazione">
                            <label class="form-check-label-sm" for="dichiarazione"> Dichiaro di godere di una solida e robusta costituzione fisica e sollevo il team di Gym Genius da ogni responsabilità</label>
                        </div>

                        <hr/>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="card" class="form-label-sm">Numero di carta</label>&nbsp;&nbsp;<i class="bi bi-credit-card fa-3x"></i>
                                <input type="text" class="form-control" id="card" name="card" maxlength="19" placeholder="5555-1234-1234-1234">
                            </div>
                            <div class="col">
                                <label class="form-label-sm">Data di scadenza</label>&nbsp;&nbsp;<i class="bi bi-calendar-event"></i>
                                <input type="text" class="form-control" id="data_scadenza" name="data_scadenza" maxlength="5" placeholder="MM / YY">
                            </div>
                            <div class="col">
                                <label class="form-label-sm">CVV/CVC</label>&nbsp;&nbsp;<i class="bi bi-lock"></i>
                                <input type="text" class="form-control" id="cvc" name="cvc" maxlength="3" placeholder="000">
                            </div>
                        </div>

                        <hr/>

                        <div class="row">
                            <div class="col">
                            <button type="submit" class="btn bottone-form">Acquista</button>
                            </div>    
                            <div class="col">
                            <button type="reset" id="rst" class="btn bottone-form">Reset</button>
                            </div>              
                        </div>
                    </form>
                </div>
            ';
        ?>
    </section>

    <!-- Footer -->  
    <?php
        include '../footer.html';
    ?>
    
</body>
</html>