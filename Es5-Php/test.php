<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <?php
        # esempio1
        echo "<h1> Ciao. Sono un semplice script PHP </h1> <br/>\n";
        echo "\t<h2> Vengo convertito in codice HTML dall’interprete PHP</h2>\n";
        
        # esempio2
        $a = array('foo' => 'pippo', 'bar' => 'pluto', 'altro' => 'paperino');
        foreach($a as $index => $var) {
            echo "Valore associato all'indice $index: $var <br/>\n";
        }

        # esempio 3
        function somma($a, $b) {
            return $a + $b;
        }
        function printRandomValue() {
            $firstValue = 10;
            $secondValue = 20;
            echo "<h1>" . somma($firstValue, $secondValue) . "</h1>\n"; 
        }
        printRandomValue();
    ?>
</body>
</html>