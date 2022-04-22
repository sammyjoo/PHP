-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 11 jan. 2022 à 17:04
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bijouterie`
--

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `statut` int(1) NOT NULL,
  `date_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `email`, `mdp`, `nom`, `prenom`, `statut`, `date_register`) VALUES
(2, 'bldlr170289@gmail.com', '$2y$10$hNH/zeI/U0/39m0zq3kqBeDcPbSRBpKr6uqWdp2BiLVd1vJGIVn8O', 'lord', 'bart', 1, '2022-01-10 16:56:00'),
(10, 'jean@gmail.com', '$2y$10$LsUgeXptXag2atn1JdSOq.Mmsori8gysP6RiheZeLC4a6.piAtMw6', 'lord', 'bart', 0, '2022-01-11 10:13:40'),
(11, 'intellagence2020@gmail.com', '$2y$10$DAb8iJwcr8FHKMkUuw5lhuZA6aBNps9qu9YdUABvtXLI34SCV0/X.', 'lord', 'bart', 0, '2022-01-11 15:10:24');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` double NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date_register` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre`, `prix`, `image`, `date_register`) VALUES
(1, 'bracelet', 10, NULL, '2022-01-11 16:50:50'),
(2, 'Bague en or', 699, NULL, '2022-01-11 16:51:19'),
(3, 'bague', 99.99, NULL, '2022-01-11 16:51:55'),
(4, 'bague n°1', 1200, NULL, '2022-01-11 16:53:20'),
(5, 'montre', 1000, NULL, '2022-01-11 16:53:50'),
(6, 'montre', 230, NULL, '2022-01-11 17:02:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
