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
    <link rel="stylesheet" href="/style.css">
    <script type="module" src="/JS/script.js"></script>
    <script type="module" src="/JS/flèche.js"></script>
    <!-- CONTACT -->
    <script type="module" src="/JS/flèche.js"></script>
    <link rel="stylesheet" href="/contact.css">
    <!-- LOGIN -->
    <link rel="stylesheet" href="/login.css">
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
                <!-- <img src="./images/icons8-profile-50.png" alt="Profil" id="profil"> -->
                <!-- From Uiverse.io by Lealdos --> 
<button class="Btn">
    <div class="sign">
        <svg viewBox="0 0 512 512">
            <path
            d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
            ></path>
        </svg>
    </div>
        <div class="text">Logout</div>
</button>

            <?php else: ?>
                <ul>
                    <li><a href="/home">Home</a></li>
                    <li><a href="/contact">Contact</a></li>
                    <li><a href="/login">Login</a></li>
                    <li><a href="/formation">Formations</a></li>
                </ul>
            <?php endif; ?>
        </div>
    </nav>
</div>
    </div>
</header>
<main>