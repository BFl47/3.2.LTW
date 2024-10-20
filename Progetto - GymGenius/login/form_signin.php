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
            if (isset($_SESSION['psw_errata'])) {
                echo "alert('Password errata. Si prega di reinserirla');";
                unset($_SESSION['psw_errata']);
            }

            if (isset($_SESSION['psw_recuperata'])) {
                echo 'alert("Email di recupero password inviata con successo")';
                unset($_SESSION['psw_recuperata']);
            }
        ?>
    </script>

    <title>Login</title>
    <link rel="icon" href="/assets/imgs/gymgenius.png" type="image/jpeg">

    <!--per il font google Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <video autoplay muted loop id="background-video">
        <source src="../assets/videos/background-1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="signin-container">
        <div class="slider">
            <form class="form" name="signin_form" action="signin.php" method="POST" onsubmit="return validaForm_signin()">
                <div class="logo-container">
                    <a href="../home.php">
                        <img src="../assets/imgs/gymgenius.png" alt="Logo">
                    </a>
                </div>
                <span class="title" id="signin">Login</span>
                <div class="form_control">
                    <input type="text" class="input" name="email" placeholder="Email">
                    <label class="label">Email</label>
                </div>
                <div class="form_control">
                    <input type="password" class="input" name="password" placeholder="Password">
                    <label class="label">Password</label>
                </div>
                <button type="submit">Login</button>

                <span class="bottom_text">Non hai un account? <label class="swtich"> <a href="form_signup.php">Sign up!</a></label> </span>
                <span class="bottom_text" onclickid="bot_2"><a href="form_recuperapsw.php">Password dimenticata?</a></span> <!-- da modificare il link-->
            </form>
        </div>
    </div>
</body>
</html>



