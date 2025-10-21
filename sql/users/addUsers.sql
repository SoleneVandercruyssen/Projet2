-- ajout de plusieurs utilisateurs avec des identifiants, noms d'utilisateur, emails et mots de passe. 

-- Jeu d’essai pour la table Users
INSERT INTO users (id, username, email, password, createdAt, editedAt)
VALUES
('6', 'Alice', 'alice@example.com', '$2y$10$abcdefghijklmNOPQRSTUVWXYZ1234567890abcdEfghijKLmnopqrstu', NOW(), NOW()),
('7', 'Bob', 'bob@example.com', '$2y$10$abcdefghijklmNOPQRSTUVWXYZ1234567890abcdEfghijKLmnopqrstu', NOW(), NOW()),
('8', 'Charlie', 'charlie@example.com', '$2y$10$abcdefghijklmNOPQRSTUVWXYZ1234567890abcdEfghijKLmnopqrstu', NOW(), NOW());
-- hash des mots de passe pour 'password123'

-- Jeu d’essai pour la table Messages
INSERT INTO messages (content, user_id, createdAt)
VALUES
('Bonjour à tous !', 4, NOW()),
('J`adore la plateforme Quanticode.', 6, NOW()),
('Prochaine session prévue demain.', 4, NOW()),
('Quelqu`un peut m`aider pour le module PHP ?', 6, NOW());