-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3307
-- Généré le : dim. 15 déc. 2024 à 12:25
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_academie`
--

-- --------------------------------------------------------

--
-- Structure de la table `creature`
--

CREATE TABLE `creature` (
  `id_creature` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_creature` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `creature`
--

INSERT INTO `creature` (`id_creature`, `nom`, `description`, `image_creature`, `id_user`, `id_type`) VALUES
(17, 'Eclair', 'n sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme ', '1734256824761', 8, 0);

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

CREATE TABLE `element` (
  `id_element` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `element`
--

INSERT INTO `element` (`id_element`, `nom`) VALUES
(1, 'Lumière'),
(2, 'Eau'),
(3, 'Air'),
(4, 'Feu');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nomrole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id_role`, `nomrole`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `sort`
--

CREATE TABLE `sort` (
  `id_sort` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image_sort` text NOT NULL,
  `id_element` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sort`
--

INSERT INTO `sort` (`id_sort`, `nom`, `image_sort`, `id_element`, `id_user`) VALUES
(27, 'Eclair', '173425373648.webp', 0, 8),
(28, 'Eclair', '1734255247752.webp', 0, 8),
(29, 'Eclair', '1734256709451.webp', 0, 8),
(30, 'Elementaire d\'air', '1734260171131.webp', 0, 8),
(31, 'Eclair', '1734260406749.webp', 0, 8),
(32, 'Eclair', '1734261531710.webp', 0, 8);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `nom`) VALUES
(1, 'Aquatique'),
(2, 'Demoniaque'),
(3, 'Mort-Vivant'),
(4, 'Mi-bête');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `id_role`) VALUES
(8, 'anastasya', '$2y$10$Ve/hDjiGLW6Eng7.6jd2f.MNTHu.x0mKd62QKAbkAw1ntOR5gQGbS', 1),
(9, 'kiril', '$2y$10$cCTAkST0m0er0Qyf8NAWau9EUyrF4e0dHkEkZs1MTReRx7.FgFqKi', 1),
(10, 'anton', '$2y$10$Rex4tHZJAUExurBMxsVstetc945v3yxe/Zh9jjHU.qJgae65./F/i', 1),
(11, 'irina', '$2y$10$lkZsC8wc4d7j9yTUT6zcIO259heUqabbftNUTnxkJ6PXS8OwCX.kK', 1),
(12, 'jorgen', '$2y$10$p3j8MwboIwJAHDElysVrU.DPjUJYaIk9euVS4Y9yY28/Qt9Jx8I9K', 1),
(13, 'kalindra', '$2y$10$sGrpa6gU.IcVjTM3T8zqXe/TLaRKwAJCn/peIc7hHLqyI3UjLPWtW', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_element`
--

CREATE TABLE `user_element` (
  `id_user_element` int(11) NOT NULL,
  `id_element` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `creature`
--
ALTER TABLE `creature`
  ADD PRIMARY KEY (`id_creature`);

--
-- Index pour la table `element`
--
ALTER TABLE `element`
  ADD PRIMARY KEY (`id_element`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `sort`
--
ALTER TABLE `sort`
  ADD PRIMARY KEY (`id_sort`);

--
-- Index pour la table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `user_element`
--
ALTER TABLE `user_element`
  ADD PRIMARY KEY (`id_user_element`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `creature`
--
ALTER TABLE `creature`
  MODIFY `id_creature` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `element`
--
ALTER TABLE `element`
  MODIFY `id_element` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `sort`
--
ALTER TABLE `sort`
  MODIFY `id_sort` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `user_element`
--
ALTER TABLE `user_element`
  MODIFY `id_user_element` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
