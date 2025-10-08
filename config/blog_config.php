<?php 
/* 
    Je récupère dans mes variables d'environnement les informations de connexion à la BDD.
*/
return
[
    "host"=>$_ENV["DB_HOST"],
    "port"=>3306,
    "dbname"=>"quanticode", //$_ENV["DB_NAME"],
    "user"=>$_ENV["DB_USER"],
    "password"=>$_ENV["DB_PASSWORD"],
    "charset"=>"utf8mb4",
    "options"=>[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]
];

var_dump($_ENV["DB_NAME"]);
exit;