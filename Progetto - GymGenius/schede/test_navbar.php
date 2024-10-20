<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <!--<script src="/bootstrap/js/bootstrap.bundle.js"></script> -->  <!--teoricamente da rimuovere per il problema della navbar -->
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

    <!--per il font google Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <title>Schede</title>
</head>
<body>
    <!-- Navbar -->
    <?php
        $pageTitle = "Schede di allenamento";
        session_start();
        if (isset($_SESSION['tipo_utente']))
          include '../navbar.php';
        else
          include '../navbar_senzapop.php';
    ?>

    <div class="schede-gratis-body">
    <h2 class="schede-gratis-subtitle">Benvenuto nella sezione delle schede di allenamento di GymGenius!</h2>
    <p class="schede-gratis-main-text">
      Qui troverai una vasta selezione di schede gratuite per aiutarti a raggiungere i tuoi obiettivi di fitness! 
      Le nostre schede sono divise in quattro categorie principali: massa muscolare, forza, definizione e tonificazione. 
      Ogni categoria offre una varietà di esercizi semplici e efficaci adatti a tutti i livelli.<br>
      Le schede sono progettate per fornirti un punto di partenza solido nel tuo percorso di allenamento.<br>  
      Se desideri un programma più personalizzato, tagliato su misura per te, ti invitiamo a esplorare la sezione <a href=/coaching/coaching.php>coaching</a>. 
      Lì potrai prenotare un appuntamento con uno dei nostri personal trainer esperti, che saranno felici di creare un programma 
      adatto ai tuoi obiettivi e di fornirti tutto il supporto di cui hai bisogno. Cosa aspetti?</p>

        <div class="corpo_schede bg-transparent">
        <div class="album py-5 bg-transparent">
        <div class="container">
          
          <!--Massa-->
          <div class="row">

          <div class="titolo-tipo-scheda">MASSA</div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/massa.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Principiante</b></h6>
                <div class="card-body">
                  <p class="card-text">Scheda di massa gratuita per principianti impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/massa/massa-1.pdf" download="massa-principiante">Download</a>
                    </div>
                    <small class="text-muted">40 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/massa.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Intermedio</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di massa gratuita per intermedi impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/massa/massa-2.pdf" download="massa-intermedio">Download</a>
                    </div>
                    <small class="text-muted">60 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/massa.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Avanzato</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di massa gratuita per avanzati impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/massa/massa-3.pdf" download="massa-avanzato">Download</a>
                    </div>
                    <small class="text-muted">80 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="titolo-tipo-scheda">FORZA</div>

            <!--Forza-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/forza.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Principiante</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di forza gratuita per principianti impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/forza/forza-1.pdf" download="forza-principiante">Download</a>
                      </button>
                    </div>
                    <small class="text-muted">40 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/forza.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Intermedio</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di forza gratuita per intermedi impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/forza/forza-2.pdf" download="forza-intermedio">Download</a>
                    </div>
                    <small class="text-muted">60 mins</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/forza.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Avanzato</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di forza gratuita per avanzati impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/forza/forza-3.pdf" download="forza-avanzato">Download</a>
                    </div>
                    <small class="text-muted">80 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="titolo-tipo-scheda">DEFINIZIONE</div>
            
            <!--Definizione-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/definizione.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Principiante</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di definizione gratuita per principianti impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/definizione/definizione-1.pdf" download="definizione-principiante">Download</a>
                    </div>
                    <small class="text-muted">40 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/definizione.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Intermedio</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di definizione gratuita per intermedi impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/definizione/definizione-2.pdf" download="definizione-intermedio">Download</a>
                    </div>
                    <small class="text-muted">60 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/definizione.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Avanzato</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di definizione gratuita per avanzati impostata su 2 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/definizione/definizione-3.pdf" download="definizione-avanzato">Download</a>
                    </div>
                    <small class="text-muted">80 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="titolo-tipo-scheda">TONIFICAZIONE</div>

            <!--Tonificazione-->
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="../assets/schede/img/tonificazione.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Principiante</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di tonificazione gratuita per principianti impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/tonificazione/tonificazione-1.pdf" download="tonificazione-principiante">Download</a>
                    </div>
                    <small class="text-muted">40 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="../assets/schede/img/tonificazione.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Intermedio</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di tonificazione gratuita per intermedi impostata su 3 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/tonificazione/tonificazione-2.pdf" download="tonificazione-intermedio">Download</a>
                    </div>
                    <small class="text-muted">60 mins</small>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
              <img class="card-img-top" src="../assets/schede/img/tonificazione.jpg" alt="Card image cap">
                <h6 class="card-title"><b>Avanzato</b></h6>
                <div class="card-body">
                <p class="card-text">Scheda di tonificazione gratuita per avanzati impostata su 2 giorni a settimana per 4 settimane.</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a class="btn btn-sm btn-outline-secondary teal" href="../assets/schede/tonificazione/tonificazione-3.pdf" download="tonificazione-avanzato">Download</a>
                    </div>
                    <small class="text-muted">80 mins</small>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        </div>
        </div>
      </div>

    <!-- Footer 
    <?php
        include '../footer.html';
    ?>
</body>
</html>