<?php
// Indirizzo email del destinatario
$to_email = 'makabo6733@lewenbo.com';

// Oggetto dell'email
$subject = 'Prova invio email';
$nome = 'Benny';

// Contenuto dell'email
// $message = 'Questo è un test per verificare l\'invio di email con sendmail.';
$message = file_get_contents('email_reg.html');
$message = str_replace("[nome]", $nome, $message);

// Intestazioni dell'email
$headers = 'From: info.gymgenius@libero.it' . "\r\n" .
           'Content-type: text/html; charset=utf-8' . "\r\n" .
           'X-Mailer: PHP/' . phpversion();

// Invio dell'email
if (mail($to_email, $subject, $message, $headers)) {
    echo 'Email inviata con successo a ' . $to_email;
} else {
    echo 'Errore nell\'invio dell\'email. Controlla la configurazione di sendmail.';
}
?>