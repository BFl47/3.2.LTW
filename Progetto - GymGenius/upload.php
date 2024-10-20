<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                or die('Could not connect: ' . pg_last_error());
    # echo "connessione effettuata";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $upload_path = "assets/uploads/";
        $email = $_SESSION['email'];

        if ($_FILES['img']['name'] != '') {
            # echo 'settata post[img]';
            $filename1 = basename($_FILES['img']['name']);
            $target_file1 = $upload_path . $filename1;

            if (!move_uploaded_file($_FILES['img']['tmp_name'], $target_file1)) {
                echo "Upload fallito";
            } else {
                $img = "/" . $target_file1;
                $q1 = "update trainer set img=$2 where email=$1";
                $result1 = pg_query_params($dbconn, $q1, array($email, $img));

                $_SESSION['file1'] = "/" . $target_file1;
                # echo "Immagine caricata con successo\n";
            }
        }

        if ($_FILES['txt']['name'] != '') {
            # echo 'settata post[txt]';
            $filename2 = basename($_FILES['txt']['name']);
            $target_file2 = $upload_path . $filename2;

            if (!move_uploaded_file($_FILES['txt']['tmp_name'], $target_file2)) {
                echo "Upload fallito";
            } else {
                $txt = "/" . $target_file2;
                $q2 = "update trainer set txt=$2 where email=$1";
                $result2 = pg_query_params($dbconn, $q2, array($email, $txt));

                $_SESSION['file2'] = "/" . $target_file2;
                # echo "Testo caricato con successo\n";
            }
        }
        $specializzazioni = $_POST['specializzazione'];
        #print_r($specializzazioni);
        
        if (!empty($specializzazioni)) {
            $sp = implode(", ", $specializzazioni);
             #echo $sp;
             $q3 = "update trainer set specializzazione=$2 where email=$1";
             $result3 = pg_query_params($dbconn, $q3, array($email, $sp));
             $_SESSION['specializzazione'] = $sp;
        }

        header('Location: /pg_personali/pg_allenatore.php');
    }
?>