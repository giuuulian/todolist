-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 09 jan. 2025 à 03:43
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `todolist`
--

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `id_task` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `date_fin` date DEFAULT NULL,
  `is_completed` tinyint(1) DEFAULT '0',
  `save` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_task`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `email`, `mdp`) VALUES
(1, 'perrin', '', '$2y$10$xTp0AsyTtlmzECS9joARb.xYI34mdeyzlOELnJZegD9ovIzdORbPK'),
(2, 'charles', 'charle@gmail.com', '$2y$10$TgV9hdfVGMTXeL5VK26.iuk0q4mUBYaxyF26BJ74OQ17tUtviSm4G'),
(3, 'giulian', 'giulian@gmail.com', '$2y$10$IW3sX.YTAtTsUqiPoJkS4Otk7tGX/oR3mhspdcIYy1PD6PkJ2FvTu'),
(4, 'poire', 'poireee', '$2y$10$ntV/lVrzXXaenACHy1Mhgev4UL73n40T2NTQb5zinzMjvCY5Jvthe'),
(5, 'giulian', 'pppejf', '$2y$10$RisSHFGiCUS.8KvCVBXq0O4FrVgFFQgw6RuFa7GJghlolSyrCAPAO'),
(6, 'ezeze', 'e', '$2y$10$G6tBCrJCBfgo8mekZROjyODGlQE.z3odNOBVCsvSCYHGlA9lx4kWe'),
(7, 'jean', 'jean@gmail.com', '$2y$10$UcLj3rUNYFS9.rdX6g566ORntCQhCANxg0U56sMlopHBq.5./Q/my'),
(8, 'jean', 'jean@gmail.co', '$2y$10$9req/ZpPwpsTGXPds6TrbeT0kTXX3q7Xx2gm1jhxuHEjradtUBs2m'),
(9, 'chef', 'chef', '$2y$10$rkv7/Z5.TGnCKKpkb4gj/uFhMfaEK44ZN8UEBprvZhD7qUlE2mVeK');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
