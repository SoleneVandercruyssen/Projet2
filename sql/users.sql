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
    `password` varchar(255) NOT NULL,
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

-- Création des tables messages et inscriptions avec des clés étrangères liées à la table users
-- Table Messages
CREATE TABLE IF NOT EXISTS messages (
    -- Définition des colonnes de la table messages
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- `content` stocke le contenu du message
    content TEXT NOT NULL,
    -- `createdAt` enregistre la date de création du message 
    createdAt DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    -- Clé étrangère liée à la table users
    user_id INT NOT NULL,
    -- Définition de la contrainte de clé étrangère
    CONSTRAINT fk_messages_users FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
        -- Si un utilisateur est supprimé, tous ses messages le sont aussi
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- Table Inscriptions
CREATE TABLE IF NOT EXISTS inscriptions (
    -- Définition des colonnes de la table inscriptions
    -- `id` est la clé primaire auto-incrémentée
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- `dateInscription` enregistre la date d'inscription
    dateInscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    -- `type` indique si l'inscription est publique ou privée
    type ENUM('Public', 'Privé') NOT NULL,
    user_id INT NOT NULL,
    -- Définition de la contrainte de clé étrangère
    CONSTRAINT fk_inscriptions_users FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE ON UPDATE CASCADE
        -- Si un utilisateur est supprimé, toutes ses inscriptions le sont aussi
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;