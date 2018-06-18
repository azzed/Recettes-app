-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 juin 2018 à 15:09
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet5`
--

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `nom` varchar(350) NOT NULL,
  `ingredients` varchar(500) NOT NULL,
  `liens` varchar(250) NOT NULL,
  `description` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `recipe`
--

INSERT INTO `recipe` (`id`, `userId`, `nom`, `ingredients`, `liens`, `description`) VALUES
(14, 85, 'Tajine de poulet et citron confit', '- 4 Cuisses de poulet - 100 Gr d\'olives vertes - 2 Gousses d\'ails - 1 Oignon - 1 càc de gingembre - 1 càc cumin - 1 càc Raz el hanout - 1 càc de curcuma - 1 dose de safran (colorant alimentaire) - Sel et poivre - ½ botte de coriandre - 1 citron confit avec pulpe - 10 cl d\'huile d\'olive - Eau', 'https://www.youtube.com/watch?v=7ugUFYzG1HA', 'Un délicieux tajine marocain au poulet et citron confit auquel je rajoute des olives et champignons. J\'adore la saveur qu\'apporte le citron confit.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mail` varchar(400) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `mail`, `password`, `role`) VALUES
(85, 'azzedine', 'bouzelmad.azzedin@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'admin'),
(86, 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user'),
(87, 'karim', 'toto@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user'),
(88, 'toto', 'toto@mail.com', '159b0c4aee9a825be489507183f1cec03951da63', 'user');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
