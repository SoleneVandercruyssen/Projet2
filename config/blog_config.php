<?php 
/* 
    Je récupère dans mes variables d'environnement les informations de connexion à la BDD.
*/
return
[
    "host"=>$_ENV["DB_HOST"], //adresse du serveur MySQL
    "port"=>3306, //port de connexion (3306 par défaut)
    "dbname"=>"quanticode", //$_ENV["DB_NAME"], nom de la base de données
    "user"=>$_ENV["DB_USER"], //identifiant de connexion
    "password"=>$_ENV["DB_PASSWORD"], //mot de passe de connexion
    "charset"=>"utf8mb4", //encodage des échanges avec la BDD
    "options"=>[
        //  configuration avancée de PDO (mode d’erreur, fetch, etc.)
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //mode de gestion des erreurs
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, //mode de récupération des résultats
        PDO::ATTR_EMULATE_PREPARES => false //désactive l’émulation des requêtes préparées
    ]
];

// test
var_dump($_ENV["DB_NAME"]);
exit;