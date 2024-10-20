<?php
    session_start();
    $dbconn = pg_connect("host=localhost port=5432 dbname=GymGenius user=postgres password=password") 
                or die('Could not connect: ' . pg_last_error());
    # echo "connessione effettuata";
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $upload_path = "assets/articoli/";

        $titolo = strtoupper($_POST['titolo']);
        $autore = $_SESSION['email'];
        $tipo = $_POST['tipo_art'];
        $intro = $_POST['intro'];
        $check = true;

        # echo $titolo, $autore, $tipo, $intro;

        if ($_FILES['imgArt']['name'] != '') {
            # echo 'settata post[imgArt]';
            $filename1 = basename($_FILES['imgArt']['name']);
            $target_file1 = $upload_path . $filename1;

            if (!move_uploaded_file($_FILES['imgArt']['tmp_name'], $target_file1)) {
                $check = false;
                echo "Upload fallito";
            } else {
                $img_art = "/" . $target_file1;
                $_SESSION['articolo1'] = "/" . $target_file1;
                # echo "Immagine caricata con successo\n";
            }
        }

        if ($_FILES['txtArt']['name'] != '') {
            # echo 'settata post[txtArt]';
            $filename2 = basename($_FILES['txtArt']['name']);
            $target_file2 = $upload_path . $filename2;

            if (!move_uploaded_file($_FILES['txtArt']['tmp_name'], $target_file2)) {
                $check = false;
                echo "Upload fallito";
            } else {
                $txt_art = "/" . $target_file2;
                $_SESSION['articolo2'] = "/" . $target_file2;
                # echo "Testo caricato con successo\n";
            }
        }
        if ($check) {
            $q1 = "insert into articolo values ($1,$2,$3, $4,$5, $6)";
            # echo "$q1<br> $titolo, $autore, $tipo, $intro, $txt_art, $img_art";
            $data = pg_query_params($dbconn, $q1,
                array($titolo, $autore, $tipo, $intro, $txt_art, $img_art));
            $_SESSION['articolo_caricato'] = true;
        } else {
            # echo "inserimento non riuscito";
        }
        header('Location: /pg_personali/pg_allenatore.php');
    }
?>