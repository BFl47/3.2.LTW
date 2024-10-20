<?php
    session_start();
    if (isset($_SESSION['tipo_utente'])) {
        session_unset();
        session_destroy();
        header("Location: /home.php");
        exit;
    }
?>