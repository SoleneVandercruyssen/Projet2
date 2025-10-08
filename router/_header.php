<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name= "description" content="Quanticode">
    <meta name="type" content="site web">
    <meta name="keywords" content="développement web, Quanticode, numérique, formations numériques, IA, Design">
    <meta name="author" content="Solène Vandercruyssen">
    <meta name="og:title" content="Quanticode">
    <meta name="og:site_name" content="Quanticode">
    <link rel="icon" type="image/png" href="./images/logo.png">
    <meta name="robots" content="noindex, nofollow">
    <title>Quanticode</title>
    <!-- HEADER + HOME -->
    <link rel="stylesheet" href="/style.css">
    <script type="module" src="/JS/script.js"></script>
    <script type="module" src="/JS/flèche.js"></script>
    <!-- CONTACT -->
    <script type="module" src="/JS/flèche.js"></script>
    <link rel="stylesheet" href="/contact.css">
    <!-- LOGIN -->
    <link rel="stylesheet" href="/login.css">
    <!-- INSCRIPTION -->
    <link rel="stylesheet" href="/inscription.css">
    <!-- PLATEFORME -->
    <script type="module"  src="/JS/calendar.js"></script>
    <script type="module" src="/JS/date.js"></script>
    <script type="module" src="/JS/flèche.js"></script>
    <link rel="stylesheet" href="/plateforme.css" >
    <script rel="stylesheet" src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- FORMATIONS -->
    <link rel="stylesheet" href="/formations.css">
    <script type="module" src="/JS/flèche.js"></script>
    <script src="/JS/formations.js" defer></script>
    <script src="/JS/cards.js" defer></script>
</head>

<!-- Ajout d'une classe qui contient une variable "$pageBodyClass" -->
<body class="<?php echo ($pageBodyClass ?? 'white') . (!empty($isPlateforme)); ?>">
<!-- ! Menu burger  -->
<header>
    <div id="flex">
        <div class="logo">
            <img src="/images/logo.png" alt="Logo de l'entreprise" class="logo_img">
        </div>
    </div>
    <input type="checkbox" id="burger-toggle" hidden>
    
    <label for="burger-toggle" class="burger-container">
        <div class="burger-line"></div>
        <div class="burger-line"></div>
        <div class="burger-line"></div>
    </label>
    <div class="nav">
    <nav>
        <div class="nav-menu">
            <?php if (!empty($isPlateforme)): ?>
                <!-- <img src="/images/icons8-profile-50.png" alt="Profil" id="profil"> -->
                <!-- From Uiverse.io by Lealdos --> 

                <form action="/logout" method="post" style="display:inline;">
                <button type="submit" id="disconnect"> 
                    <span class="icon"> </span>
                    <span class="text">Logout</span>                     
                </button>
                </form>

            <?php else: ?>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/formations">Formations</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
</div>
    </div>
</header>
<main>