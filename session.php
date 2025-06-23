<?php 


/* 

    La session permet de stocker toute sortes d'informations (string, object, array...) d'une page à l'autre.
    Elle est stocké côté serveur, mais place un cookie contenant son identifiant afin de reconnaître quelle session appartient à quel utilisateur.

    session_status() permet de récupérer l'état actuel de la session. PHP_SESSION_NONE est le code indiquant que la session n'est pas démarré
*/


// if(session_status() === PHP_SESSION_NONE)
// {
//     session_start();
// }

// require "../ressources/template/_header.php";

// // Si on souhaite récupérer l'id de la session :
// var_dump($_COOKIE, session_id());

// /* 
//     Pour sauvegarder ou récupérer des données.
//     On utilisera la super global "$_SESSION" qui est un tableau associatif de base.
// */

// $_SESSION["logged"] = true;
// $_SESSION["username"] = "Solène";
?>