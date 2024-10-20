<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PostgreSQL</title>
</head>
<body>
    <?php
        $dbconn = pg_connect("host=localhost port=5432 dbname=EsempioConnessionePHP user=postgres password=password") or die('Errore: ' . pg_last_error());
        $query ='SELECT * FROM utente';
        
        $result = pg_query($dbconn, $query) or die('Query fallita');

        echo "<table>\n";
        while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
            echo "\t<tr>\n";
            foreach ($line as $col_value) {
                echo "\t\t<td>$col_value</td>";
            }
            echo "\t</tr>\n";
        }
        echo "</table>\n";
        pg_free_result($result);
        pg_close($dbconn);
    ?>
    
</body>
</html>