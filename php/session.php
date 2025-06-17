<?php 
if(session_status() === PHP_SESSION_NONE)
{
    session_start();
}

// Si on souhaite récupérer l'id de la session :
var_dump($_COOKIE, session_id());

$_SESSION['identifiant'] = "utilisateur";
?>