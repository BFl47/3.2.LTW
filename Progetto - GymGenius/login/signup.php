<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
}
else {
    $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                or die('Could not connect: ' . pg_last_error());
}
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php
            session_start();
            if ($dbconn) {
                # echo "connessione effettuata";
                $email = $_POST['email'];
                $q1="select * from utente where email=$1";
                $p1="select * from trainer where email=$1";

                $result=pg_query_params($dbconn, $q1, array($email));
                $result2=pg_query_params($dbconn, $p1, array($email));
                
                if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC) || $tuple2=pg_fetch_array($result2, null, PGSQL_ASSOC)) {
                    $_SESSION['email_non_disponibile'] = true;
                    header('Location: /login/form_signup.php'); 
                    exit;
                }
                else {
                    $nome = $_POST['nome'];
                    $cognome = $_POST['cognome'];
                    $sesso = $_POST['sesso'];
                    $data_nascita = $_POST['data_nascita'];
                    $password = $_POST['pwd_1'];
                    $token = $_POST['token'];
                    $tipo = $_POST['tipo_trainer'];
                    if (empty($token)) {
                        $q2 = "insert into utente values ($1,$2,$3, $4,$5, $6)";
                        
                        $data = pg_query_params($dbconn, $q2,
                            array($email, $nome, $cognome, $sesso, $data_nascita, $password));

                        $to_email = "$email";
                        $subject = 'Benvenuto in GymGenius!';
                        
                        $message = file_get_contents('../email_reg.html');
                        $message = str_replace("[nome]", $nome, $message);

                        $headers = 'From: info.gymgenius@libero.it' . "\r\n" .
                                   'Content-type: text/html; charset=utf-8' . "\r\n" .
                                   'X-Mailer: PHP/' . phpversion();
                        
                        mail($to_email, $subject, $message, $headers);

                        // login diretto
                        $_SESSION['tipo_utente'] = 'cliente';
                    }
                    elseif ($token == 'xxx') {
                        $q3 = "insert into trainer values ($1,$2,$3, $4,$5, $6, $7)";
                        $data = pg_query_params($dbconn, $q3,
                            array($email, $nome, $cognome, $sesso, $data_nascita, $password, $tipo));
                        
                        // login diretto
                        $_SESSION['tipo_utente'] = 'trainer';
                        $_SESSION['tipo_trainer'] = $tipo;
                        
                        $_SESSION['file1'] = '/assets/uploads/profile.jpg';
                        $_SESSION['file2'] = '/assets/uploads/load.txt';
                    }
                    if ($data) {
                        $_SESSION['email'] = $email;
                        $_SESSION['nome'] = $nome;
                        $_SESSION['cognome'] = $cognome;
                        $_SESSION['sesso'] = $sesso;
                        $_SESSION['data_nascita'] = date('d/m/Y', strtotime($data_nascita));

                        $_SESSION['registrazione_completata'] = true;
                        header('Location: /pg_personali/verifica_accesso.php'); 
                        exit;
                    }
                    else {
                        echo "Registrazione non riuscita";
                    }
                }
            }
        ?> 
    </body>
</html>