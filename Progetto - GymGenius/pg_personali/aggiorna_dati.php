<?php
    $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
    or die('Could not connect: ' . pg_last_error());
    $codice = $_POST['codice'];
   
    if (isset($_POST['completa'])) {
        $completa = $_POST['completa'];
        # echo $completa;

        $q2 = "update richiesta set completa=true where codice = $1";
        $result2 = pg_query_params($dbconn, $q2, array($codice));
    }
    if ($_POST['delete']) {
        $q = "update richiesta set new=false where codice = $1";
        $result = pg_query_params($dbconn, $q, array($codice));
        header('Location: /pg_personali/pg_allenatore.php'); 
    }
    
?>