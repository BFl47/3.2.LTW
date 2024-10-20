<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.bundle.js"></script>
    <script type="application/javascript" src="/script.js"></script>
    <script>
        <?php
            session_start();
            if (isset($_SESSION['utente_non_registrato'])) {
                echo "alert('Utente non registrato. Si prega di effettuare la registrazione');";
                unset($_SESSION['utente_non registrato']);
            }
        ?>
    </script>
    
    <title>Registrazione</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/jpeg">
</head>
<body>
    <a class="link" href="/home.php">
        <div class="bott_indietro">
            <button type="button" class="btn btn-dark" margin><i class="bi bi-arrow-left"></i> </i> Home</button>
        </div>
    </a>
    <div class="grid_signup">
        <!--<img class= "c1" src="../assets/_fdcbb69f-8be2-4777-ba21-462d2f07b9db.jpeg" width: auto; height="100" >
        <div class="c3"></div>-->
        <form class="c2" name="signup_form" action="signup.php" method="POST" onsubmit="return validaForm_signup()" >
            <table>
                <tr>
                    <td align="center">
                        <b>SIGN UP</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="nome" style="width: 20em;" placeholder="nome">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="cognome" style="width: 20em;" placeholder="cognome">
                    </td>
                </tr>
                <tr>
                    <td>
                        <select name="sesso" size="1" cols="2"  style="width: 20em;" >
                            <option value="nulla">...</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="date" name="data_nascita" style="width: 12.5em;" placeholder="data nascita">
                        &nbsp; data di nascita
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--tipo text per verificare la correttezza dell'indirizzo email con js-->
                        <input type="text" name="email" style="width: 20em;" placeholder="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pwd_1" style="width: 20em;" placeholder="password" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="pwd_2" style="width: 20em;" placeholder="ripeti password" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="radio" id="pt" name="tipo_trainer" value="PT"> PT
                        <input type="radio" id="n" name="tipo_trainer" value="N"> N
                        &nbsp;&nbsp;
                        <input type="text" name="token" style="width: 7em;" placeholder="token">
                        &nbsp; token allenatori
                    </td>
                   
                </tr>
                <tr>
                    <td align="center">
                        <input type="submit" value="Submit">
                        <input type="reset" value="Reset">
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        Sei già registrato?
                    <a class="link" href="form_signin.php">Accedi!</a>
                    </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
</body>
</html>
