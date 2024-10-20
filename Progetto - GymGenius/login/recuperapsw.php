<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                or die('Could not connect: ' . pg_last_error());


    $email = $_POST['email'];
    $q = "select * from utente where email= $1";
    $result = pg_query_params($dbconn, $q, array($email));
    $tuple = pg_fetch_array($result, null, PGSQL_ASSOC);

    if (pg_num_rows($result) == 0) {
        $_SESSION['utente_non_registrato2'] = true;
            header('Location: /login/form_signup.php');
            exit;
    }
    
    $psw = $tuple['psw'];
    $nome = $tuple['nome'];

    $to_email = "$email";
    $subject = 'Recupero password';
                        
    $message = file_get_contents('../email_psw.html');
    $message = str_replace("[nome]", $nome, $message);
    $message = str_replace("[password]", $psw, $message);

    $headers = 'From: info.gymgenius@libero.it' . "\r\n" .
                'Content-type: text/html; charset=utf-8' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
                        
    mail($to_email, $subject, $message, $headers);

    $_SESSION['psw_recuperata'] = true;

    header('Location: /login/form_signin.php'); 
    exit;
?>