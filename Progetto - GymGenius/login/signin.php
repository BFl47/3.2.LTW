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
    <head>
    </head>
    <body>
        <?php
            session_start();
            if ($dbconn) {
                $email = $_POST['email'];
                $q1 = "select * from utente where email= $1";
                $p1 = "select * from trainer where email = $1";

                $result1 = pg_query_params($dbconn, $q1, array($email));
                $result2 = pg_query_params($dbconn, $p1, array($email));
                
                $tuple1 = pg_fetch_array($result1, null, PGSQL_ASSOC);
                $tuple2 = pg_fetch_array($result2, null, PGSQL_ASSOC);

                if (pg_num_rows($result1) == 0 && pg_num_rows($result2) == 0) {
                    $_SESSION['utente_non_registrato'] = true;
                        header('Location: /login/form_signup.php');
                        exit;
                }
                else {
                    $password = $_POST['password'];
                    $q2 = "select * from utente where email = $1 and psw = $2";
                    $p2 = "select * from trainer where email = $1 and psw = $2";

                    $result1 = pg_query_params($dbconn, $q2, array($email, $password));
                    $result2 = pg_query_params($dbconn, $p2, array($email, $password));

                    $tuple1 = pg_fetch_array($result1, null, PGSQL_ASSOC);
                    $tuple2 = pg_fetch_array($result2, null, PGSQL_ASSOC);

                    if (pg_num_rows($result1) == 0 && pg_num_rows($result2) == 0) {
                        $_SESSION['psw_errata'] = true;
                        header('Location: /login/form_signin.php');
                        exit;
                    
                    }
                    else {
                        if (pg_num_rows($result2) == 0){
                            $_SESSION['tipo_utente'] = 'cliente';
                            $_SESSION['nome'] = $tuple1['nome'];
                            $_SESSION['cognome'] = $tuple1['cognome'];
                            $_SESSION['sesso'] = $tuple1['sesso'];
                            
                            $data = $tuple1['data_nascita'];
                            $_SESSION['data_nascita'] = date('d/m/Y', strtotime($data));
                        }
                        elseif (pg_num_rows($result1) == 0) {
                            $_SESSION['tipo_utente'] = 'trainer';
                            $_SESSION['tipo_trainer'] = $tuple2['tipo'];
                            
                            $_SESSION['nome'] = $tuple2['nome'];
                            $_SESSION['cognome'] = $tuple2['cognome'];
                            $_SESSION['sesso'] = $tuple2['sesso'];
                            $_SESSION['file1'] = $tuple2['img'];
                            $_SESSION['file2'] = $tuple2['txt'];
                            $_SESSION['specializzazione'] = $tuple2['specializzazione'];
                            
                            $data = $tuple2['data_nascita'];
                            $_SESSION['data_nascita'] = date('d/m/Y', strtotime($data));
                        }
                        $_SESSION['appena_loggato'] = true;
                        $_SESSION['email'] = $email;
                        

                        header('Location: /pg_personali/verifica_accesso.php');
                        exit;                        
                    }
                }
            }
        ?> 
    </body>
</html>