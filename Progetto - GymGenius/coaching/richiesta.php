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
                $uuid = md5(uniqid('', true));  
                $richiedente = $_SESSION['email'];
                $allenatore = $_POST['allenatore'];
                $altezza = $_POST['altezza'];
                $peso = $_POST['peso'];
                $frequenza = $_POST['frequenza'];
                $obiettivi = $_POST['obiettivi'];
                $date = time();


                $q = "insert into richiesta values ($1, $2, $3, $4, $5, $6, $7, $8)";
                $data = pg_query_params($dbconn, $q, array($uuid, $richiedente, $allenatore, $altezza, $peso, $frequenza, $obiettivi, $date));
                echo "session: " . $_SESSION['nome'] . " post: " . $_POST['email'];
                if ($data) {
                    header("Location: /pg_personali/pg_cliente.php");
                    exit;
                }
                else {
                    echo "inserimento non riuscito";
                }
            }
        ?> 
    </body>
</html>