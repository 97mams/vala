-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 03 oct. 2025 à 10:38
-- Version du serveur : 9.1.0
-- Version de PHP : 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `fiompina`
--

-- --------------------------------------------------------

--
-- Structure de la table `animale`
--

DROP TABLE IF EXISTS `animale`;
CREATE TABLE IF NOT EXISTS `animale` (
  `id_animale` int NOT NULL AUTO_INCREMENT,
  `nom_animale` varchar(255) NOT NULL,
  `id_genre` int NOT NULL,
  `age` int NOT NULL,
  `id_type` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_animale`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

DROP TABLE IF EXISTS `genre`;
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_genre`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`id_genre`, `nom_genre`, `created_at`, `updated_at`) VALUES
(13, 'femelle', '2025-05-14 18:05:50', '2025-05-14 18:05:50'),
(12, 'male', '2025-05-14 18:05:50', '2025-05-14 18:05:50');

-- --------------------------------------------------------

--
-- Structure de la table `historiques`
--

DROP TABLE IF EXISTS `historiques`;
CREATE TABLE IF NOT EXISTS `historiques` (
  `id_historiques` int NOT NULL AUTO_INCREMENT,
  `nom_traitement` varchar(255) NOT NULL,
  `id_animale` int DEFAULT NULL,
  `date_traiter` timestamp NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `type_traitement` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id_historiques`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `historiques`
--

INSERT INTO `historiques` (`id_historiques`, `nom_traitement`, `id_animale`, `date_traiter`, `created_at`, `updated_at`, `type_traitement`, `description`) VALUES
(1, '', 21, '2025-06-03 21:06:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'fdfsdf'),
(2, 'vaccin', 21, '2025-07-01 01:23:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'vakisiny vaovao'),
(3, 'vaccin', 21, '2025-07-01 01:23:49', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'vakisiny vaovao'),
(4, 'vaccin', 22, '2025-07-01 01:06:24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'vakisiny vaovao'),
(5, 'vaccin', 23, '2025-07-01 01:06:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'vakisiny vaovao'),
(6, 'vaccin', 23, '2025-07-02 01:15:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'andarana eh');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `date_rappel` timestamp NOT NULL,
  PRIMARY KEY (`id_notification`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id_notification`, `titre`, `description`, `status`, `created_at`, `updated_at`, `date_rappel`) VALUES
(40, 'vaccin', ' peut faire du vaccin le 25-06-07 14:06:31', 0, '2025-06-05 00:06:53', '2025-06-05 00:06:53', '2025-06-07 21:06:31'),
(39, 'vaccin', ' peut faire du vaccin le 25-07-14 14:07:14', 0, '2025-06-05 00:06:53', '2025-06-05 00:06:53', '2025-07-14 21:07:14'),
(38, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-06-07 14:06:31', 0, '2025-06-05 00:06:53', '2025-06-05 00:06:53', '2025-06-07 21:06:31'),
(37, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-07-14 14:07:14', 0, '2025-06-05 00:06:53', '2025-06-05 00:06:53', '2025-07-14 21:07:14'),
(36, 'vaccin', ' peut faire du vaccin le 25-06-07 14:06:31', 0, '2025-06-05 00:06:44', '2025-06-05 00:06:44', '2025-06-07 21:06:31'),
(35, 'vaccin', ' peut faire du vaccin le 25-07-14 14:07:14', 0, '2025-06-05 00:06:44', '2025-06-05 00:06:44', '2025-07-14 21:07:14'),
(34, 'vaccin', ' peut faire du vaccin le 25-07-14 14:07:45', 0, '2025-06-05 00:06:43', '2025-06-05 00:06:43', '2025-07-14 21:07:45'),
(33, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-06-07 14:06:31', 0, '2025-06-05 00:06:43', '2025-06-05 00:06:43', '2025-06-07 21:06:31'),
(32, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-07-14 14:07:14', 0, '2025-06-05 00:06:43', '2025-06-05 00:06:43', '2025-07-14 21:07:14'),
(31, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-07-14 14:07:45', 0, '2025-06-05 00:06:43', '2025-06-05 00:06:43', '2025-07-14 21:07:45'),
(30, 'vaccin', ' peut faire du vaccin le 25-06-07 14:06:31', 0, '2025-06-04 00:06:46', '2025-06-04 00:06:46', '2025-06-07 21:06:31'),
(29, 'vaccin', ' peut faire du vaccin le 25-07-14 14:07:14', 0, '2025-06-04 00:06:46', '2025-06-04 00:06:46', '2025-07-14 21:07:14'),
(28, 'vaccin', ' peut faire du vaccin le 25-07-14 14:07:45', 0, '2025-06-04 00:06:46', '2025-06-04 00:06:46', '2025-07-14 21:07:45'),
(27, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-06-07 14:06:31', 0, '2025-06-04 00:06:46', '2025-06-04 00:06:46', '2025-06-07 21:06:31'),
(26, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-07-14 14:07:14', 0, '2025-06-04 00:06:46', '2025-06-04 00:06:46', '2025-07-14 21:07:14'),
(25, 'vaccin', 'Mamisoa b peut faire du vaccin le 25-07-14 14:07:45', 0, '2025-06-04 00:06:46', '2025-06-04 00:06:46', '2025-07-14 21:07:45');

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

DROP TABLE IF EXISTS `traitement`;
CREATE TABLE IF NOT EXISTS `traitement` (
  `id_traitement` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `nom_traitement` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duree` int NOT NULL,
  `id_type` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_traitement`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `traitement`
--

INSERT INTO `traitement` (`id_traitement`, `type`, `nom_traitement`, `description`, `duree`, `id_type`, `created_at`, `updated_at`) VALUES
(24, 'B8', 'vaccin', 'vakisiny vaovao', 15, 8, '2025-07-01 01:23:49', '2025-07-02 01:07:11'),
(25, 'vita Puls', 'vaccin', 'andarana eh', 30, 8, '2025-07-02 01:15:38', '2025-07-02 01:07:35');

-- --------------------------------------------------------

--
-- Structure de la table `traiter`
--

DROP TABLE IF EXISTS `traiter`;
CREATE TABLE IF NOT EXISTS `traiter` (
  `id_traiter` int NOT NULL AUTO_INCREMENT,
  `id_animale` int NOT NULL,
  `id_traitement` int NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_traiter`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `traiter`
--

INSERT INTO `traiter` (`id_traiter`, `id_animale`, `id_traitement`, `status`, `created_at`, `updated_at`) VALUES
(93, 23, 25, 0, '2025-07-02 01:07:35', '2025-07-02 01:07:35'),
(92, 23, 25, 1, '2025-07-02 01:07:38', '2025-07-02 01:07:35'),
(91, 23, 24, 0, '2025-07-02 01:07:11', '2025-07-02 01:07:11'),
(90, 23, 24, 1, '2025-07-02 01:07:50', '2025-07-02 01:07:11'),
(89, 22, 24, 0, '2025-07-01 01:06:41', '2025-07-01 01:06:41'),
(88, 22, 24, 1, '2025-07-01 01:06:33', '2025-07-01 01:06:41'),
(87, 21, 24, 0, '2025-07-01 01:06:24', '2025-07-01 01:06:24'),
(86, 21, 24, 1, '2025-07-01 01:06:50', '2025-07-01 01:06:24'),
(85, 21, 22, 0, '2025-06-25 01:06:30', '2025-06-25 01:06:30'),
(84, 21, 21, 0, '2025-06-05 00:06:52', '2025-06-05 00:06:52'),
(83, 21, 21, 1, '2025-06-03 21:06:24', '2025-06-05 00:06:52'),
(82, 21, 22, 1, '2025-06-03 21:06:24', '2025-06-25 01:06:31'),
(81, 21, 23, 0, '2025-06-03 21:06:24', '2025-06-03 21:06:24'),
(80, 20, 23, 0, '2025-06-03 21:06:31', '2025-06-03 21:06:31'),
(79, 20, 22, 0, '2025-05-30 21:05:14', '2025-05-30 21:05:14'),
(78, 20, 23, 1, '2025-05-30 21:05:48', '2025-06-03 21:06:31'),
(77, 20, 23, 1, '2025-05-30 21:05:20', '2025-05-30 21:05:48'),
(76, 20, 21, 0, '2025-05-30 21:05:46', '2025-05-30 21:05:46'),
(75, 20, 22, 1, '2025-05-30 21:05:40', '2025-05-30 21:05:14'),
(74, 20, 21, 1, '2025-05-30 21:05:47', '2025-05-30 21:05:46'),
(73, 20, 21, 1, '2025-05-30 21:05:40', '2025-05-30 21:05:47');

-- --------------------------------------------------------

--
-- Structure de la table `type_elevage`
--

DROP TABLE IF EXISTS `type_elevage`;
CREATE TABLE IF NOT EXISTS `type_elevage` (
  `id_type` int NOT NULL AUTO_INCREMENT,
  `nom_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `type_elevage`
--

INSERT INTO `type_elevage` (`id_type`, `nom_type`, `created_at`, `updated_at`) VALUES
(8, 'bovin', '2025-05-29 01:21:19', '2025-05-29 01:21:19');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
