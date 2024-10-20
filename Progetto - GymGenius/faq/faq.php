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
    
    <script>
        $(document).ready(function(){
            $('.question').click(function(){
                $(this).toggleClass('active').next('.answer').slideToggle();
                /* eventualmente, per le icons, decommenta tutte le altre sezioni */
                /* $(this).find('.bi').toggleClass('bi-plus-circle bi-dash-circle'); */
            });
        });
    </script>

    <title>FAQ</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/png">

    <!--per il font google Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body class="bd-faq">
    <?php
        $pageTitle = "Domande frequenti";
        session_start();
        if (isset($_SESSION['tipo_utente'])) {   
            include '../navbar.php';
        }
        else {
            include '../navbar_senzapop.php';
        }
    ?>

    <section class="faq-body">
        <div class="faq-main-text">
            In questa sezione troverai le risposte alle domande più frequenti.<br>
            Vuoi chiederci altro? Non esitare a contattarci! È inoltre possibile contattare direttamente i nostri esperti nell'apposita sezione.
        </div>

        <div class="faq-item">
            <div class="question">
                <!--<i class="bi bi-plus-circle"></i> -->
                Come posso registrarmi sul sito?
            </div>
            <div class="answer">
                Ti basteranno pochi passi per <a href="/login/form_signup.php">registrarti</a> come cliente e richiedere subito il tuo primo appuntamento!
            </div>
        </div>

        <div class="faq-item">
            <div class="question">
                <!--<i class="bi bi-plus-circle"></i> -->
                Quali sono i vantaggi di registrarsi come cliente?
            </div>
            <div class="answer">
                Registrandoti come cliente, riuscirai ad effettuare e gestire le tue prenotazioni con i nostri 
                personal trainer e/o nutrizionisti in base ai tuoi obiettivi. Cosa aspetti? Basta un <a href="/login/form_signup.php">click!</a>
            </div>
        </div>

        <div class="faq-item">
            <div class="question">
                <!--<i class="bi bi-plus-circle"></i> -->
                Cosa posso aspettarmi dall'incontro con un nutrizionista o personal trainer online?
            </div>
            <div class="answer">
                Sei un principiante e vuoi iniziare a trasformare il tuo fisico? O magari sei un atleta esperto e hai deciso di affidarti 
                ad un team di coaching qualificato in grado di seguire i tuoi progressi?<br>
                I nostri esperti, dopo un primo incontro conoscitivo, saranno in grado di impostare un programma di allenamento o di 
                alimentazione a lungo termine fatto su misura per te. Non ti preoccupare, non sarai solo! Siamo qui per guidarti e supportarti 
                lungo ogni passo del tuo percorso, per offrirti non solo conoscenze approfondite e competenze specializzate, 
                ma anche un sostegno emotivo e motivazionale senza pari.
            </div>
        </div>

        <div class="faq-item">
            <div class="question">
                <!--<i class="bi bi-plus-circle"></i> -->
                Quali tipi di schede di allenamento gratuite vengono offerte?
            </div>
            <div class="answer">
                Puoi consultare le schede di allenamento messe da noi a disposizione nell’apposita <a href="/schede/schede.php">sezione</a>. 
                Scegli tra schede di massa, forza, definizione o tonificazione. Non essere timido, basta fare un click e potrai 
                immediatamente scaricare gli appositi file e provare i nostri allenamenti.<br>
                Troppo facili per te? Forse è ora di affidarti ad un personal trainer qualificato. Vai nella sezione 
                <a href="/coaching/coaching.php">Coaching</a> e prenota il tuo primo appuntamento per iniziare il tuo percorso di salute!
            </div>
        </div>
        
        <div class="faq-item">
            <div class="question">
                <!--<i class="bi bi-plus-circle"></i> --> 
                Posso personalizzare le schede di allenamento in base alle mie esigenze?
            </div>
            <div class="answer">
                Certamente! Se sei un atleta esperto, puoi scaricare le nostre schede gratuite e impostarle secondo 
                ciò che ritieni più opportuno.<br>
                Tuttavia, soprattutto nel caso in cui sei un atleta alle prime armi e hai fame di risultati, cambiare 
                l’impostazione delle schede, così come sostituire o modificare gli esercizi, non è consigliato.<br>
                Prova i nostri allenamenti! Ti sono piaciuti? Immagina come puoi trasformare il tuo fisico e ottenere 
                progressi su progressi grazie ad un programma personalizzato, fatto apposta per te. 
                Vai nella sezione <a href="/coaching/coaching.php">Coaching</a> e prenota il tuo primo appuntamento per iniziare il tuo percorso di salute!
            </div>
        </div>

        <div class="faq-item">
            <div class="question">
                <!--<i class="bi bi-plus-circle"></i> --> 
                Come vengono gestiti i pagamenti?
            </div>
            <div class="answer">
                I pagamenti sono gestiti direttamente durante i tuoi incontri con i nostri personal trainer o 
                nutrizionisti. Nonostante sia richiesto di lasciare i tuoi dati di fatturazione, questo serve soltanto come
                garanzia per il team GymGenius: tutto avviene in modo semplice e sicuro!
            </div>
        </div>

    </section>
    
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
        include '../footer.html';
    ?>
</body>
</html>