<?php  

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_unset();
    session_destroy();
    header('Location: /login?logout=1');
    exit;
} else {
    // Empêche un accès direct en GET
    header('Location: /login?logout=1');
    exit;
}

// header('Location: /login');

?>