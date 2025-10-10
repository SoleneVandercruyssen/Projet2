<?php
session_start();

require_once __DIR__ . '/../_pdo.php';
require_once __DIR__ . '/../_shouldBeLogged.php'; // vérifie si l'utilisateur est connecté
shouldBeLogged(true, '/login');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['content']) && trim($_POST['content']) !== '') {
    // Connexion à la base de données
    $db = connexionPDO();
    // Préparation et exécution de la requête d'insertion
    $sql = $db->prepare("INSERT INTO messages (user_id, content, created_at) VALUES (?, ?, NOW())");
    $sql->execute([(int)$_SESSION["user_id"], cleanData($_POST['content'])]);
    // Redirection pour éviter la resoumission du formulaire
    header('Location: /plateforme');
    exit;
}