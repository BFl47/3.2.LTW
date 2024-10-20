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
            if ($_SESSION['utente_non_registrato']) {
                echo "alert('Utente non registrato. Si prega di effettuare la registrazione');";
                $_SESSION['utente_non_registrato'] = false;
                unset($_SESSION['utente_non registrato']);
            }

            if ($_SESSION['utente_non_registrato2']) {
                echo "alert('Utente non registrato. Si prega di effettuare la registrazione');";
                $_SESSION['utente_non registrato2'] = false;
                unset($_SESSION['utente_non_registrato2']);
            }
            if (isset($_SESSION['email_non_disponibile'])) {
                echo 'alert("Spiacente, l\'indirizzo email non é disponibile")';
                $_SESSION['email_non_disponibile'] = false;
                unset( $_SESSION['email_non_disponibile']);
            }
        ?>

        function handleSelectChange(selectElement) {
            selectElement.classList.add('selected');
        }
    </script>
    
    <title>Registrazione</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/jpeg">

    <!--per il font google Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    
    <video autoplay muted loop id="background-video">
        <source src="../assets/videos/background-2.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
   
    <div class="signup-container">
        <div class="slider-up">
            <form class="form" name="signup_form" action="signup.php" method="POST" onsubmit="return validaForm_signup()">
                <div class="logo-container">
                    <a href="../home.php">
                        <img src="../assets/imgs/gymgenius.png" alt="Logo">
                    </a>
                </div>
                <span class="title" id="signup">Sign Up</span>

                <div class="form_control">
                    <input type="text" class="input" name="nome" placeholder="Nome">
                    <label class="label">Nome</label>
                </div>
                <div class="form_control">
                    <input type="text" class="input" name="cognome" placeholder="Cognome">
                    <label class="label">Cognome</label>
                </div>

                <div class="form_control">
                    <input type="text" class="input_data" onfocus="(this.type='date')" onblur="(this.type='text')" name="data_nascita" placeholder="Data di nascita">
                </div>

                <div class="form_control">
                    <select class="input_select" name="sesso" size="1" cols="2" onchange="handleSelectChange(this)">
                        <option value="nulla" disabled selected hidden>Sesso</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="form_control">
                    <input type="text" class="input" name="email" placeholder="Email">
                    <label class="label">Email</label>
                </div>
                <div class="form_control">
                    <input type="password" class="input" name="pwd_1" placeholder="Password">
                    <label class="label">Password</label>
                </div>
                <div class="form_control">
                    <input type="password" class="input" name="pwd_2" placeholder="Conferma password">
                    <label class="label">Conferma password</label>
                </div>
                <div class="form_control">
                    <label class="answ">Sei un allenatore?</label>
                </div>
                <div class="form_control">
                    <select class="input_select" name="tipo_trainer" size="1" cols="2" onchange="handleSelectChange(this)">
                        <option value="nulla" disabled selected hidden>Team</option>
                        <option value="PT">Personal trainer</option>
                        <option value="N">Nutrizionista</option>
                    </select>
                </div>
                <div class="form_control">
                    <input type="password" class="input" name="token" placeholder="Token">
                    <label class="label">Token</label>
                </div>
                <button type="submit" value="Submit">Registrati</button>
                <button type="reset" value="Reset" id="signup_reset">Reset</button>

                <span class="bottom_text">Hai già un account? <label class="swtich"><a href="form_signin.php">Accedi!</a></label> </span>
            </form>    
        </div>
    </div>
    
    <div class="empty">&nbsp;&nbsp;<br></div>

    
</body>
</html>
