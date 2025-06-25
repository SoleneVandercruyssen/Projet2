<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, 
    initial-scale=1.0">
    <meta >
    <title>Quanticode</title>
    <!-- HEADER + HOME -->
    <link rel="stylesheet" href="style.css">
    <script type="module" src="./JS/script.js"></script>
    <script type="module" src="./JS/flèche.js"></script>
    <!-- CONTACT -->
    <script type="module" src="./JS/flèche.js"></script>
    <link rel="stylesheet" href="./contact.css">
    <!-- LOGIN -->
    <link rel="stylesheet" href="./login.css">
    <!-- FORMATIONS -->
    <link rel="stylesheet" href="./formations.css">
    <script type="module" src="./JS/flèche.js"></script>
    <script src="./JS/formations.js" defer></script>
    <!-- PLATEFORME -->
    <script type="module"  src="./JS/calendar.js"></script>
    <script type="module" src="./JS/date.js"></script>
    <script type="module" src="./JS/flèche.js"></script>
    <link rel="stylesheet" href="./plateforme.css" >
    <script rel="stylesheet" src='https://cdn.jsdelivr.net/npm/fullcalendar/index.global.min.js'></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
</head>

<!-- Ajout d'une classe qui contient une variable "$pageBodyClass" -->
<body class="<?php echo $pageBodyClass ?? 'white'; ?>">
<!-- ! Menu burger  -->
<header>
    <div id="flex">
        <div class="logo">
            <img src="./images/logo.png" alt="Logo de l'entreprise" class="logo_img">
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
                <ul>
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="./contact.html">Contact</a></li>
                    <li><a href="./login.html">Login</a></li>
                    <li><a href="./formations.html">Formations</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<main>