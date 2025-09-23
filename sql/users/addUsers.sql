-- ajout de plusieurs utilisateurs avec des identifiants, noms d'utilisateur, emails et mots de passe. 
INSERT INTO users (username, email, password) 
VALUES 
('Basile', 'basilic@laposte.net', 'detective'),
('Cécilius', 'rome@gmail.com', 'salade'),
('Alcédias', 'alc@gmail.com', 'asdepic'),
('Florestan', 'flo@outlook.fr', 'restant'),
('Elzemond', 'elze@laposte.net', 'banane'),
('Dulmène', 'dudu@outlook.fr', 'banane'),
('Ildéric', 'deric@gmail.com', 'inspecteur'),
('Hypolite', 'polite@gmail.com', 'hippopotame'),
('Olivia', 'oliviadesmont@gmail.com', 'olives50O');
-- uniquement pour les tests, à supprimer en production

-- Jeu d’essai pour la table Users
INSERT INTO users (username, email, password, createdAt)
VALUES
('Alice', 'alice@example.com', '$2y$10$abcdefghijklmNOPQRSTUVWXYZ1234567890abcdEfghijKLmnopqrstu', NOW()),
('Bob', 'bob@example.com', '$2y$10$abcdefghijklmNOPQRSTUVWXYZ1234567890abcdEfghijKLmnopqrstu', NOW()),
('Charlie', 'charlie@example.com', '$2y$10$abcdefghijklmNOPQRSTUVWXYZ1234567890abcdEfghijKLmnopqrstu', NOW());


-- Jeu d’essai pour la table Messages
INSERT INTO messages (content, user_id, createdAt)
VALUES
('Bonjour à tous !', 1, NOW()),
('J`adore la plateforme Quanticode.', 2, NOW()),
('Prochaine session prévue demain.', 1, NOW()),
('Quelqu`un peut m`aider pour le module PHP ?', 3, NOW());

-- Jeu d’essai pour la table Inscriptions
INSERT INTO inscriptions (dateInscription, type, user_id)
VALUES
(NOW(), 'Public', 1),
(NOW(), 'Privé', 1),
(NOW(), 'Public', 2),
(NOW(), 'Privé', 3);