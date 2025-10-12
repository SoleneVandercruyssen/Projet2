<?php  

// Démarrer la session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Déconnexion de l'utilisateur
    session_unset();
    // Détruit la session et redirige vers la page de connexion
    session_destroy();
    session_start(); // Redémarrer la session pour ajouter le message
    $_SESSION['logout_message'] = "Vous avez été déconnecté avec succès.";
    // Redirige vers la page de connexion avec un message de déconnexion
    header('Location: /login');
    // exit : le script s'arrête ici
    exit;
} else {
    // Empêche un accès direct en GET
    header('Location: /login');
    exit;
}