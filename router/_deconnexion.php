<?php 
$pageBodyClass = 'white'; 
require "./_header.php";

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION["logged"]) || $_SESSION["logged"] != true) {
    header('Location : ./login.php');
    exit;
}

unset($_SESSION);
session_destroy();
// Supprime le cookie de session
setcookie('PHPSESSID', "", time()-3600);
header('Location : ./login.php');
exit;

?>












<?php  
require "./_footer.php";
?>