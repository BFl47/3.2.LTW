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
            if ($dbconn) {
                echo "connessione effettuata";
                $email = $_POST['inputEmail'];
                $q1="select * from utente2 where email= $1";
                $result=pg_query_params($dbconn, $q1, array($email));
                if ($tuple=pg_fetch_array($result, null, PGSQL_ASSOC)) {
                    print_r($tuple);
                    echo "<h1> Spiacente, l'indirizzo email non e' disponibile</h1>
                        Se vuoi, <a href=../login> clicca qui per loggarti </a>";
                }
                else {
                    $nome = $_POST['inputName'];
                    $cognome = $_POST['inputSurname'];
                    $cap = $_POST['inputCap'];
                    $password = $_POST['inputPassword'];
                    $q2 = "insert into utente2 values ($1,$2,$3,$4,$5)";
                    $data = pg_query_params($dbconn, $q2,
                        array($email, $nome, $cognome, $password, $cap));
                    if ($data) {
                        echo "<h1> Registrazione completata. 
                            Puoi iniziare a usare il sito <br/></h1>";
                        echo "<a href=/login> Clicca qui </a>
                            per loggarti!";
                    }
                }
            }
        ?> 
    </body>
</html>