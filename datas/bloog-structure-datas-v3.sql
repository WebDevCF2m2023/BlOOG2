-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 24 juin 2024 à 10:03
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `bloog`
--
DROP DATABASE IF EXISTS `bloog`;
CREATE DATABASE IF NOT EXISTS `bloog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bloog`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
                                         `article_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `article_title` varchar(160) NOT NULL,
                                         `article_slug` varchar(165) NOT NULL,
                                         `article_text` text NOT NULL,
                                         `article_date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                         `article_date_update` timestamp NULL DEFAULT NULL,
                                         `article_date_publish` timestamp NULL DEFAULT NULL,
                                         `article_is_published` tinyint UNSIGNED NOT NULL DEFAULT '0',
                                         `user_user_id` int UNSIGNED NOT NULL,
                                         PRIMARY KEY (`article_id`),
                                         UNIQUE KEY `article_slug_UNIQUE` (`article_slug`),
                                         KEY `fk_article_user1_idx` (`user_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`article_id`, `article_title`, `article_slug`, `article_text`, `article_date_create`, `article_date_update`, `article_date_publish`, `article_is_published`, `user_user_id`) VALUES
    (1, 'Quelle est la base de données de TikTok ?', 'quelle-est-la-base-de-donnees-de-tiktok', 'C’est l’application la plus téléchargée de 2023. Avec plus de 1,2 milliard d’utilisateurs et 1 milliard d’utilisateurs actifs chaque mois, les chiffres de l’ex plateforme de vidéos de danse a des chiffres impressionnants. \r\n\r\nEssentiellement basée sur le format vidéo, l’application TikTok doit gérer la diffusion de données vidéos sans que l’internaute ne subisse de latence ou de coupure dans son visionnage même avec une connexion de qualité variable. TikTok doit aussi gérer les interactions des utilisateurs avec les publications.\r\n\r\nSuite :\r\n<a href=\"https://www.base-de-donnees.com/base-de-donnees-tiktok/\" target=\"_blank\">https://www.base-de-donnees.com/base-de-donnees-tiktok/</a>', '2024-06-24 07:52:50', '2024-06-24 07:49:40', '2024-06-24 07:49:40', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `article_has_category`
--

DROP TABLE IF EXISTS `article_has_category`;
CREATE TABLE IF NOT EXISTS `article_has_category` (
                                                      `article_article_id` int UNSIGNED NOT NULL,
                                                      `category_category_id` int UNSIGNED NOT NULL,
                                                      PRIMARY KEY (`article_article_id`,`category_category_id`),
                                                      KEY `fk_article_has_category_category1_idx` (`category_category_id`),
                                                      KEY `fk_article_has_category_article1_idx` (`article_article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article_has_category`
--

INSERT INTO `article_has_category` (`article_article_id`, `category_category_id`) VALUES
                                                                                      (1, 1),
                                                                                      (1, 2),
                                                                                      (1, 3);

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
                                          `category_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                          `category_name` varchar(100) NOT NULL,
                                          `category_slug` varchar(105) NOT NULL,
                                          `category_description` varchar(500) DEFAULT NULL,
                                          `category_parent` int UNSIGNED DEFAULT '0',
                                          PRIMARY KEY (`category_id`),
                                          UNIQUE KEY `category_slug_UNIQUE` (`category_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_slug`, `category_description`, `category_parent`) VALUES
                                                                                                                        (1, 'SQL', 'sql', 'SQL (sigle pour Structured Query Language, « langage de requêtes structurées ») est un langage informatique normalisé servant à exploiter des bases de données relationnelles. La partie langage de manipulation des données de SQL permet de rechercher, d\'ajouter, de modifier ou de supprimer des données dans les bases de données relationnelles.', 0),
                                                                                                                        (2, 'NoSQL', 'nosql', 'En informatique et en bases de données, NoSQL désigne une famille de systèmes de gestion de base de données (SGBD) qui s\'écarte du paradigme classique des bases relationnelles. L\'explicitation la plus populaire de l\'acronyme est Not only SQL (« pas seulement SQL » en anglais) même si cette interprétation peut être discutée', 0),
                                                                                                                        (3, 'MySQL', 'mysql', 'MySQL est un système de gestion de bases de données relationnelles (SGBDR). Il est distribué sous une double licence GPL et propriétaire. Il fait partie des logiciels de gestion de base de données les plus utilisés au monde, autant par le grand public (applications web principalement) que par des professionnels, en concurrence avec Oracle, PostgreSQL et Microsoft SQL Server.', 1),
                                                                                                                        (4, 'PostgreSQL', 'postgresql', 'PostgreSQL est un système de gestion de base de données relationnelle et objet (SGBDRO). C\'est un outil libre disponible selon les termes d\'une licence de type BSD.', 1),
                                                                                                                        (5, 'MariaDB', 'mariadb', 'MariaDB est un système de gestion de base de données édité sous licence GPL. Il s\'agit d\'un embranchement communautaire de MySQL : la gouvernance du projet est assurée par la fondation MariaDB, et sa maintenance par la société Monty Program AB, créateur du projet. Cette gouvernance confère au logiciel l’assurance de rester libre.', 1),
                                                                                                                        (6, 'MongoDB', 'mongodb', 'MongoDB (de l\'anglais humongous qui peut être traduit par « énorme ») est un système de gestion de base de données orienté documents, répartissable sur un nombre quelconque d\'ordinateurs et ne nécessitant pas de schéma prédéfini des données. Il fait partie de la mouvance NoSQL.', 2);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
                                         `comment_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                         `comment_text` varchar(500) NOT NULL,
                                         `comment_parent` int UNSIGNED DEFAULT '0',
                                         `comment_date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                                         `comment_date_update` timestamp NULL DEFAULT NULL,
                                         `comment_date_publish` timestamp NULL DEFAULT NULL,
                                         `comment_is_published` tinyint UNSIGNED NOT NULL DEFAULT '0',
                                         `user_user_id` int UNSIGNED NOT NULL,
                                         `article_article_id` int UNSIGNED NOT NULL,
                                         PRIMARY KEY (`comment_id`),
                                         KEY `fk_comment_user1_idx` (`user_user_id`),
                                         KEY `fk_comment_article1_idx` (`article_article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_text`, `comment_parent`, `comment_date_create`, `comment_date_update`, `comment_date_publish`, `comment_is_published`, `user_user_id`, `article_article_id`) VALUES
    (1, 'Pour les bases NoSQL je pense que c\'est Cassandra qui est utilisée', 0, '2024-06-24 07:54:35', NULL, '2024-06-24 07:54:35', 1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
                                      `file_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                      `file_url` varchar(120) NOT NULL,
                                      `file_description` varchar(150) DEFAULT NULL,
                                      `file_type` varchar(10) NOT NULL,
                                      PRIMARY KEY (`file_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`file_id`, `file_url`, `file_description`, `file_type`) VALUES
    (1, 'img/upload/2024.06.24-09_56_48.png', 'DB de TikTok', 'png');

-- --------------------------------------------------------

--
-- Structure de la table `file_has_article`
--

DROP TABLE IF EXISTS `file_has_article`;
CREATE TABLE IF NOT EXISTS `file_has_article` (
                                                  `file_file_id` int UNSIGNED NOT NULL,
                                                  `article_article_id` int UNSIGNED NOT NULL,
                                                  PRIMARY KEY (`file_file_id`,`article_article_id`),
                                                  KEY `fk_file_has_article_article1_idx` (`article_article_id`),
                                                  KEY `fk_file_has_article_file1_idx` (`file_file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `file_has_article`
--

INSERT INTO `file_has_article` (`file_file_id`, `article_article_id`) VALUES
    (1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `permission`
--

DROP TABLE IF EXISTS `permission`;
CREATE TABLE IF NOT EXISTS `permission` (
                                            `permission_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                            `permission_name` varchar(45) NOT NULL,
                                            `permission_description` varchar(300) DEFAULT NULL,
                                            PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `permission`
--

INSERT INTO `permission` (`permission_id`, `permission_name`, `permission_description`) VALUES
                                                                                            (1, 'Administrateur', 'Administrateur du site'),
                                                                                            (2, 'Modérateur', 'Modérateur du site'),
                                                                                            (3, 'Auteur', 'Auteur d\'articles dans le site'),
                                                                                            (4, 'Utilisateur', 'Utilisateur du site');

-- --------------------------------------------------------

--
-- Structure de la table `tag`
--

DROP TABLE IF EXISTS `tag`;
CREATE TABLE IF NOT EXISTS `tag` (
                                     `tag_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                     `tag_slug` varchar(100) NOT NULL,
                                     PRIMARY KEY (`tag_id`),
                                     UNIQUE KEY `tag_slug_UNIQUE` (`tag_slug`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag_slug`) VALUES
                                             (4, 'CDN'),
                                             (3, 'cloud'),
                                             (5, 'IA'),
                                             (1, 'MySQL'),
                                             (2, 'NoSQL'),
                                             (6, 'Vidéos');

-- --------------------------------------------------------

--
-- Structure de la table `tag_has_article`
--

DROP TABLE IF EXISTS `tag_has_article`;
CREATE TABLE IF NOT EXISTS `tag_has_article` (
                                                 `tag_tag_id` int UNSIGNED NOT NULL,
                                                 `article_article_id` int UNSIGNED NOT NULL,
                                                 PRIMARY KEY (`tag_tag_id`,`article_article_id`),
                                                 KEY `fk_tag_has_article_article1_idx` (`article_article_id`),
                                                 KEY `fk_tag_has_article_tag1_idx` (`tag_tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `tag_has_article`
--

INSERT INTO `tag_has_article` (`tag_tag_id`, `article_article_id`) VALUES
                                                                       (1, 1),
                                                                       (2, 1),
                                                                       (4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
                                      `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
                                      `user_login` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'case sensitive',
                                      `user_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'case sensitive',
                                      `user_full_name` varchar(160) DEFAULT NULL,
                                      `user_mail` varchar(180) NOT NULL,
                                      `user_status` tinyint UNSIGNED NOT NULL DEFAULT '0' COMMENT '0 pas actif\n1 actif\n2 banni',
                                      `user_secret_key` varchar(80) NOT NULL,
                                      `permission_permission_id` int UNSIGNED NOT NULL,
                                      PRIMARY KEY (`user_id`),
                                      UNIQUE KEY `user_login_UNIQUE` (`user_login`),
                                      UNIQUE KEY `user_mail_UNIQUE` (`user_mail`),
                                      KEY `fk_user_permission_idx` (`permission_permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_password`, `user_full_name`, `user_mail`, `user_status`, `user_secret_key`, `permission_permission_id`) VALUES
                                                                                                                                                               (1, 'admin', '$2y$10$K1FVlryoR5QGEf8KInuRxeTA/0Z2FVUHV4/lSPiHP/XsvsLo1MAWi', 'Pierre Le Grand', 'p.le.grand@cf2m.be', 1, '66791df3805863.73506421', 1),
                                                                                                                                                               (2, 'modo', '$2y$10$mElscwKW4nBURLrrxv3E0O.tKUhKGNTx3l3GQS0MkIP5eOt13HJqe', 'Marco Poulos', 'poulos@cf2m.be', 1, '66791f189a00c5.03750196', 2),
                                                                                                                                                               (3, 'mikhawa', '$2y$10$HtmWCMS8eq032pdhU3CooeGxCp8XPnEQDInZFI/hLfFODTPJA5MDK', 'Mike Awah', 'm.awah@cf2m.be', 1, '66791fce9ab881.94347892', 3),
                                                                                                                                                               (4, 'celia.v', '$2y$10$MP5zOLw1oDkK4LU5.fyAoexQaWtRxj7qR08X7eElVGVBXfSIEu3nq', 'Célia Van Horbs', 'van.horbs@cf2m.be', 1, '66792041cfeb00.00758689', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
    ADD CONSTRAINT `fk_article_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`);

--
-- Contraintes pour la table `article_has_category`
--
ALTER TABLE `article_has_category`
    ADD CONSTRAINT `fk_article_has_category_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`),
    ADD CONSTRAINT `fk_article_has_category_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
    ADD CONSTRAINT `fk_comment_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `file_has_article`
--
ALTER TABLE `file_has_article`
    ADD CONSTRAINT `fk_file_has_article_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`),
    ADD CONSTRAINT `fk_file_has_article_file1` FOREIGN KEY (`file_file_id`) REFERENCES `file` (`file_id`);

--
-- Contraintes pour la table `tag_has_article`
--
ALTER TABLE `tag_has_article`
    ADD CONSTRAINT `fk_tag_has_article_article1` FOREIGN KEY (`article_article_id`) REFERENCES `article` (`article_id`),
    ADD CONSTRAINT `fk_tag_has_article_tag1` FOREIGN KEY (`tag_tag_id`) REFERENCES `tag` (`tag_id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
    ADD CONSTRAINT `fk_user_permission` FOREIGN KEY (`permission_permission_id`) REFERENCES `permission` (`permission_id`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;
