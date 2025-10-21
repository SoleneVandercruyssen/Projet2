<?php 

require __DIR__ . "/_routes.php";
// Permet de récupérer l'url qui a été demandé par l'utilisateur :
$url = $_SERVER["REQUEST_URI"];
// On sanitize l'url pour éviter les failles XSS
$url = filter_var($url, FILTER_SANITIZE_URL);

/* 
    explode découpe un string en tableau, en utilisant le premier paramètre comme séparateur.
    Ici on lui indique de découper le string à chaque "?" et de récupérer uniquement le premier élément "[0]"
    Cela afin de se débarasser de possible paramètre en get
*/

$url = explode("?", $url)[0];

// trim permet de retirer au debut et à la fin, des caractères différent
$url = trim($url, "/");


if ($url === "") $url = "home"; // Pour la racine


// Si l'url existe dans les routes

if (array_key_exists($url, ROUTES)) {

    // Récupérer le nom de la page associée à l'url
    $page = ROUTES[$url];
    // Construire le chemin vers le fichier de la page
    $path = __DIR__ . "/pages/$page";

    // Si le fichier existe, on le require
    if(is_file($path))
    {
        require $path;
    }
    else{
        require __DIR__ . "/pages/404.php";
    }
}
else{
    // Si l'url n'existe pas, on require à nouveau la page 404.php
    require __DIR__ . "/pages/404.php";
}


?>