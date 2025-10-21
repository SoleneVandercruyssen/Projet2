<?php 
/*
 * Retourne une instance de connexion PDO pour se connecter à la BDD "quanticode"
 * * PDO = (PHP Data Object)
 * Pour se connecter, PDO demande un DSN (Data Source Name)
 * @return \PDO
 */
function connexionPDO(): \PDO
{
    try
    {
        // Je récupère ma configuration :
        $config = require $_SERVER['DOCUMENT_ROOT']."/config/blog_config.php";
        // Je construit mon DSN :
        /* 
        C'est un string contenant toute les informations pour localiser la BDD.
        * {pilote}:host={adresse};port={port de connexion};dbname={nom de la bdd};charset={charset à utiliser}
        */
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        // Je crée mon instance de PDO :
        $pdo = new \PDO($dsn, $config["user"], $config["password"], $config["options"]);
        // je retourne mon instance :
        return $pdo;
    }
    // En cas d'erreur de connexion, on attrape l'exception et on la relance
    catch(\PDOException $e)
    {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}