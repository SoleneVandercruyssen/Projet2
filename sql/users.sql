SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Création de la base de données quanticode et de la table users si elles n'existent pas déjà

CREATE DATABASE IF NOT EXISTS `quanticode` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quanticode`;

CREATE TABLE IF NOT EXISTS `users` (
    -- Définition des colonnes de la table users
    `id` int(1) NOT NULL AUTO_INCREMENT,
    -- `username` est limité à 25 caractères, `email` à 255 caractères
    `username` varchar(25) NOT NULL,
    `email` varchar(255) NOT NULL,
    -- `password` stocke le mot de passe haché
    `password` text NOT NULL,
    -- `createdAt` enregistre la date de création, `editedAt` la date de la dernière modification
    `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `editedAt` datetime DEFAULT NULL,
    -- Définition des clés primaires et uniques
    PRIMARY KEY (`id`),
    -- Assurer l'unicité des champs `id` et `email`
    UNIQUE(id), 
    UNIQUE(email)
) 
-- Définition du moteur de stockage et du jeu de caractères de la table users 
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Requête préparée pour éviter les injections SQL

$stmt = $pdo->prepare("INSERT INTO users (id, username, email, password, createdAt, editedAt) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->execute([$id, $username, $email, $hashedPassword, $createdAt, $editedAt]);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

-- CREATE TABLE IF NOT EXISTS `messages`
