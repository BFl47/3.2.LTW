<?php
    session_start();
    if (isset($_SESSION['tipo_utente'])) {
        if ($_SESSION['tipo_utente'] == 'cliente')
            header("Location: /pg_personali/pg_cliente.php");
        elseif ($_SESSION['tipo_utente'] == 'trainer') 
            header("Location: /pg_personali/pg_allenatore.php");  
        exit;
    }
    else {
        header("Location: /login/form_signin.php");
        exit;
    }
?>