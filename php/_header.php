<?php 
if(session_status() !== PHP_SESSION_ACTIVE)
{
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script type="module" src="./JS/script.js"></script>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Quanticode</title>
</head>

<body>
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