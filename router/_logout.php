<?php  

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_unset();
    session_destroy();
    header('Location: /login?logout=1');
    exit;
} else {
    // Empêche un accès direct en GET si tu veux
    header('Location: /login');
    exit;
}


// session_start();
// session_unset();
// session_destroy();
// J'ajoute un paramèrte en get pour pouvoir afficher un message de déconnexion sur la page login
// header('Location: /login?logout=1');
// exit;

?>