<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                or die('Could not connect: ' . pg_last_error());

    if($_SESSION['tipo_utente'] == 'trainer') {
        $q = "select psw from trainer where email=$1";
    } 
    elseif ($_SESSION['tipo_utente'] == 'cliente') {
        $q = "select psw from utente where email=$1";
    }

    $email = $_SESSION['email'];
    $result = pg_query_params($dbconn, $q, array($email));
    $row = pg_fetch_assoc($result);

    $vecchiapsw = $_POST['vecchiapsw'];
    if ($row['psw'] != $vecchiapsw) {
        echo 'false';
        exit;
    }

    $nuovapsw = $_POST['nuovapsw'];

    if($_SESSION['tipo_utente'] == 'trainer') {
        $q2 = "update trainer set psw=$1 where email=$2";
    } 
    elseif ($_SESSION['tipo_utente'] == 'cliente') {
        $q2 = "update utente set psw=$1 where email=$2";
    }
    $result2 = pg_query_params($dbconn, $q2, array($nuovapsw, $email));
    $_SESSION['cambio_psw'] = true;
    echo 'true';
    exit;
?>