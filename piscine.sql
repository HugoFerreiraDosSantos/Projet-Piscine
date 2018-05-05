-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Sam 05 Mai 2018 à 16:56
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.1.16-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `piscine`
--
CREATE DATABASE IF NOT EXISTS `piscine` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `piscine`;

-- --------------------------------------------------------

--
-- Structure de la table `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `album`
--

INSERT INTO `album` (`id_album`, `id_user`, `nom`) VALUES
(19, 43, 'Lapins'),
(20, 43, 'Koalas'),
(21, 45, 'Bonobos'),
(22, 45, 'Album_a_Supprimer');

-- --------------------------------------------------------

--
-- Structure de la table `album_media`
--

CREATE TABLE `album_media` (
  `id_album` int(11) NOT NULL,
  `id_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `album_media`
--

INSERT INTO `album_media` (`id_album`, `id_media`) VALUES
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(20, 17),
(20, 18),
(20, 19),
(21, 20),
(21, 21),
(21, 22);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_commentaire` datetime NOT NULL,
  `texte` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `id_publication`, `id_user`, `date_commentaire`, `texte`) VALUES
(1, 33, 1, '2018-05-05 00:00:00', 'Hello'),
(2, 39, 1, '2018-05-05 07:22:00', 'Je fais un test'),
(3, 33, 1, '2018-05-05 08:00:00', 'Coucou'),
(4, 33, 1, '2018-05-05 11:27:43', 'Salut'),
(5, 39, 1, '2018-05-05 11:28:59', 'Coucou'),
(6, 39, 43, '2018-05-05 11:29:23', 'Hello'),
(7, 36, 43, '2018-05-05 11:37:43', 'Jolie photo!'),
(8, 39, 45, '2018-05-05 15:40:09', 'Hey'),
(9, 40, 43, '2018-05-05 15:57:57', 'C\'est pas bien ! T\'as bÃ¢clÃ© xp'),
(10, 34, 43, '2018-05-05 15:58:39', 'Au fait, j\'ai oubliÃ© de prÃ©ciser mais j\'aime les lapins <3'),
(11, 32, 43, '2018-05-05 15:59:02', 'Youhou !!!');

-- --------------------------------------------------------

--
-- Structure de la table `emploi`
--

CREATE TABLE `emploi` (
  `id_emploi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `objet` varchar(1000) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `emploi`
--

INSERT INTO `emploi` (`id_emploi`, `id_admin`, `titre`, `objet`, `contact`) VALUES
(7, 1, 'Total', 'Nous recherchons un ingÃ©nieur majeure Ã©nergie pour faire un bilan de nos ressources et le pour dÃ©velopper les solutions de demain !', 'job@total.fr'),
(8, 1, 'EDF', 'La mission consiste Ã  participer au Pilotage et Ã  la supervision technico fonctionnelle de l\'infrastructure multicanal.\r\n\r\nPour cela, vous aurez en charge :\r\n\r\n    D\'analyser des solutions techniques reprises en MCO et d\'identifier les surveillances Ã  mettre en oeuvre pour garantir la dÃ©tection d\'incidents ou de dysfonctionnements.', 'contact@edf.fr');

-- --------------------------------------------------------

--
-- Structure de la table `like`
--

CREATE TABLE `like` (
  `id_publication` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `like`
--

INSERT INTO `like` (`id_publication`, `id_user`) VALUES
(32, 1),
(32, 43),
(32, 45),
(33, 1),
(33, 45),
(34, 43),
(36, 45),
(37, 1),
(38, 45),
(39, 45);

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id_user`, `pseudo`, `email`, `admin`) VALUES
(1, 'admin', 'admin@gmail.com', 'Admin'),
(43, 'Aude', 'aude@gmail.com', 'Admin'),
(45, 'Dodo', 'dodo@gmail.com', 'User'),
(46, 'JeanMichMich', 'jeanmich@gmail.com', 'User');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id_media` int(11) NOT NULL,
  `path` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id_media`, `path`, `nom`) VALUES
(-1, '-1.jpg', 'PPDefaut'),
(0, '0.png', 'BackDefaut'),
(2, '2.png', 'appareil.png'),
(3, '3.png', 'ledAllumee.png'),
(4, '4.png', 'voletOuvert.png'),
(5, '5.jpg', 'france5.jpg'),
(6, '6.jpg', 'Lapin1'),
(7, '7.jpg', 'Lapin2'),
(8, '8.jpg', 'LapinChou'),
(9, '9.jpg', 'Lapin4'),
(10, '10.jpg', 'france1.jpg'),
(11, '11.jpg', 'france3.jpg'),
(12, '12.jpeg', 'ville.jpeg'),
(13, '13.jpeg', 'ville.jpeg'),
(14, '14.jpg', 'moi184x184.jpg'),
(15, '15.jpg', 'kangou.jpg'),
(16, '16.jpg', 'lapin.jpg'),
(17, '17.jpg', 'Koala1'),
(18, '18.jpg', 'Koala2'),
(19, '19.jpg', 'Koala3'),
(20, '20.jpg', 'a'),
(21, '21.jpeg', 'B'),
(22, '22.jpg', 'C'),
(23, '23.jpg', 'issou.jpg'),
(24, '24.jpg', 'chitas14_1200x300_acf_cropped.jpg'),
(25, '25.jpg', 'getinvolved.jpg'),
(26, '26.jpg', '3030-Lapin-Extra-Nain-1373273932.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `media_publication`
--

CREATE TABLE `media_publication` (
  `id_publication` int(11) NOT NULL,
  `id_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `media_publication`
--

INSERT INTO `media_publication` (`id_publication`, `id_media`) VALUES
(32, 7),
(33, 7);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

CREATE TABLE `messagerie` (
  `id_message` int(11) NOT NULL,
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `messagerie`
--

INSERT INTO `messagerie` (`id_message`, `id_user1`, `id_user2`, `contenu`, `date`) VALUES
(149, 43, 1, 'Bonjour !', '2018-05-04 19:33:30'),
(150, 1, 43, 'Hello :) ', '2018-05-04 19:34:49'),
(151, 43, 45, 'Coucou dodo !!!', '2018-05-05 16:04:52'),
(152, 45, 43, 'Hey ! What\'s up? Il est super ce site !!', '2018-05-05 16:05:20'),
(153, 43, 45, 'Oui t\'as vu Ã§a ! Une semaine qu\'on est dessus!!', '2018-05-05 16:05:56');

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id_notification` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_source` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_notif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`id_notification`, `id_user`, `id_source`, `type`, `date_notif`) VALUES
(28, 46, 1, 'Invitation', '2018-05-05 16:52:08');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `visibilite` int(11) NOT NULL,
  `ressenti` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `texte` varchar(1000) NOT NULL,
  `partage` varchar(255) NOT NULL DEFAULT 'rien'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `id_user`, `date_publication`, `lieu`, `visibilite`, `ressenti`, `action`, `texte`, `partage`) VALUES
(32, 1, '2018-05-04 19:32:56', 'Corbeil', 0, 'Bien', 'Travaille', 'La publication fonctionne ! C\'est trop cool !', 'rien'),
(33, 1, '2018-05-04 20:27:15', 'Corbeil', 0, 'Bien', 'Travaille', 'La publication fonctionne ! C\'est trop cool !', 'Dorian Clisson'),
(34, 43, '2018-05-04 20:28:42', 'Paris', 0, 'Super', 'Mange', 'Bonsoir Ã  tous ! Ici c\'est notre site Social Media Professionnel !', 'rien'),
(40, 45, '2018-05-05 15:55:32', 'Nice', 2, 'Epuise', 'Dort', 'Je mets un message car on m\'a demandÃ© d\'en mettre un. Sinon j\'ai bien fait attention Ã  bien citer mes sources !', 'rien'),
(41, 43, '2018-05-05 16:02:05', 'Paris', 1, 'Super', 'Mange', 'Bonsoir Ã  tous ! Ici c\'est notre site Social Media Professionnel !', 'Jean Michel');

-- --------------------------------------------------------

--
-- Structure de la table `relation`
--

CREATE TABLE `relation` (
  `id_user` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `relation`
--

INSERT INTO `relation` (`id_user`, `id_friend`) VALUES
(1, 43),
(43, 1),
(43, 45),
(45, 43),
(45, 46),
(46, 45);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `statut` varchar(255) DEFAULT NULL,
  `formation` varchar(1000) DEFAULT NULL,
  `experience` varchar(1000) DEFAULT NULL,
  `competence` varchar(1000) DEFAULT NULL,
  `photo_profile` int(11) NOT NULL DEFAULT '-1',
  `photo_background` int(11) NOT NULL DEFAULT '0',
  `new_notif` int(1) DEFAULT NULL,
  `last_visit_notif` date DEFAULT NULL,
  `new_message` int(11) NOT NULL DEFAULT '0',
  `last_visit_messagerie` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `date_naissance`, `ville`, `statut`, `formation`, `experience`, `competence`, `photo_profile`, `photo_background`, `new_notif`, `last_visit_notif`, `new_message`, `last_visit_messagerie`) VALUES
(1, 'Ferreira Dos Santos', 'Hugo', '1997-05-22', 'Paris', 'Etudiant', 'ECE', 'crepes et pancakes', 'Programmation', 26, 25, 0, '2018-05-05', 0, '2018-05-05 16:49:14'),
(43, 'Le Breton', 'Aude', '2018-08-22', 'Paris', 'Etudiante', 'ECE Paris', 'Total Marketing France', 'Anglais C1', 16, 15, 0, '2018-05-05', 0, '2018-05-05 16:06:01'),
(45, 'Clisson', 'Dorian', '1997-11-26', 'Nice', 'Etudiant', 'Prof de math / Comment ne pas plagier?', 'Aucune / Ah si je sais cuisiner le couscous', 'Java / C++ / pas web', 14, 13, 0, '2018-05-05', 0, '2018-05-05 16:16:27'),
(46, 'Michel', 'Jean', NULL, NULL, NULL, NULL, NULL, NULL, 23, 24, 1, '2018-05-05', 0, '2018-05-05 16:52:31');

-- --------------------------------------------------------

--
-- Structure de la table `visibilite`
--

CREATE TABLE `visibilite` (
  `id_publication` int(11) NOT NULL,
  `id_friend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `visibilite`
--

INSERT INTO `visibilite` (`id_publication`, `id_friend`) VALUES
(40, 43);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Index pour la table `album_media`
--
ALTER TABLE `album_media`
  ADD PRIMARY KEY (`id_album`,`id_media`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`);

--
-- Index pour la table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id_emploi`);

--
-- Index pour la table `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id_publication`,`id_user`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id_media`);

--
-- Index pour la table `media_publication`
--
ALTER TABLE `media_publication`
  ADD PRIMARY KEY (`id_publication`,`id_media`);

--
-- Index pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id_notification`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`);

--
-- Index pour la table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`id_user`,`id_friend`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `visibilite`
--
ALTER TABLE `visibilite`
  ADD PRIMARY KEY (`id_publication`,`id_friend`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id_emploi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT pour la table `messagerie`
--
ALTER TABLE `messagerie`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id_notification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
