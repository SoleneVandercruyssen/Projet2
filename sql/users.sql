-- base de donnée "QUANTICODE"

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `quanticode` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `quanticode`;

CREATE TABLE IF NOT EXIST "users" (
`idUser` int(11) NOT NULL AUTO_INCREMENT,
`username` varchar(25) NOT NULL,
`email` varchar(255) NOT NULL,
`password` text NOT NULL,
`createdAt` datetime NOT NULL DEFAULT current_timestamp(),
`editedAt` datetime DEFAULT NULL,
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;