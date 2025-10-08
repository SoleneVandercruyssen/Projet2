SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Création de la base de données quanticode et de la table users si elles n'existent pas déjà

CREATE DATABASE IF NOT EXISTS `quanticode` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quanticode`;

-- ================================
-- Table USERS
-- ================================

CREATE TABLE IF NOT EXISTS `users` (
    -- Définition des colonnes de la table users
    -- Définition des clés primaires et uniques
    `id` int(1) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -- `username` est limité à 25 caractères, `email` à 255 caractères
    `username` varchar(25) NOT NULL,
    `email` varchar(255) NOT NULL UNIQUE,
    -- `password` stocke le mot de passe haché
    `password` varchar(255) NOT NULL,
    -- `createdAt` enregistre la date de création, `editedAt` la date de la dernière modification
    `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `editedAt` datetime DEFAULT NULL, 
    -- `type` indique si l'inscription est publique ou privée
    -- `type` ENUM('Public', 'Privé') NOT NULL
) 
-- Définition du moteur de stockage et du jeu de caractères de la table users 
ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ================================
-- Table MESSAGES
-- ================================

CREATE TABLE IF NOT EXISTS `messages` (
    -- Définition des colonnes de la table messages
    `id` INT(1) AUTO_INCREMENT PRIMARY KEY,
    -- `content` stocke le contenu du message
    `content` TEXT NOT NULL,
    -- `createdAt` enregistre la date de création du message 
    `createdAt` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    -- Clé étrangère liée à la table users
    `user_id` INT(1) NOT NULL,
    -- Définition de la contrainte de clé étrangère
    CONSTRAINT `fk_messages_users` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
        ON DELETE CASCADE ON UPDATE CASCADE
        -- Si un utilisateur est supprimé, tous ses messages le sont aussi
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

COMMIT;