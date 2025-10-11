<?php
session_start();

require_once __DIR__ . '/../_pdo.php';
require_once __DIR__ . '/../_shouldBeLogged.php'; // vérifie si l'utilisateur est connecté
shouldBeLogged(true, '/login');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset ($_POST['content']) && trim($_POST['content']) !== '') {
    // Connexion à la base de données
    $db = connexionPDO();

    $userId = (int)$_SESSION["user_id"];
    $content = trim($_POST['content']);

    if (!empty($cntent)) {
        $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
        // Préparation et exécution de la requête d'insertion
        $sql = $db->prepare("INSERT INTO messages (user_id, content, created_at) VALUES (?, ?, NOW())");
        $sql->execute([(int)$_SESSION["user_id"], cleanData($_POST['content'])]);
    } else {
        // Gérer le cas où le contenu est vide
        die('Le message ne peut pas être vide.');
        header('Location: /plateforme');
        exit;
    }
    // Redirection pour éviter la resoumission du formulaire
    header('Location: /plateforme');
    exit;
}