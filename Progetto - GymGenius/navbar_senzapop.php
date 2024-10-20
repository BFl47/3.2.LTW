<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="/style.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <!--font google Lato-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    
</head>
<body>
    <div class="header">        
        <?php
            if ($pageTitle != '') {
                echo '<div class="background-image">
                <h1>'.$pageTitle .'</h1>
            </div>';
            }
        ?>
        <div class="navbar-container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-light">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="/assets/imgs/gymgenius.png" alt="Logo" style="height: 50px;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/home.php"><i class="bi bi-house"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/schede/schede.php">Schede</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/coaching/coaching.php">Coaching</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Team</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="/team/personal.php">Personal trainers</a></li>
                                    <li><a class="dropdown-item" href="/team/nutrizionisti.php">Nutrizionisti</a></li>
                                </ul>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" href="/eventi/eventi.php">Eventi</a>
                            </li>
                            -->
                            <li class="nav-item">
                                <a class="nav-link" href="/blog/blog.php">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/faq/faq.php">FAQ</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#contatti">Contatti</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pg_personali/verifica_accesso.php"><i class="bi bi-person-fill"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>