-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  Dim 06 déc. 2020 à 20:11
-- Version du serveur :  5.7.31-0ubuntu0.18.04.1
-- Version de PHP :  7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `SportNautique`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`) VALUES
(1, 'Subaquatique'),
(2, 'Sports de glisse'),
(3, 'Loisirs nautique'),
(4, 'Navigation');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_personne` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `prix_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE `ligne_commande` (
  `id_commande` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  `qte_sport` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_personne` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `mot_de_passe` varchar(128) NOT NULL,
  `civilite` varchar(3) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `ville` varchar(64) NOT NULL,
  `pays` varchar(64) NOT NULL,
  `telephone` int(10) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_personne`, `email`, `mot_de_passe`, `civilite`, `nom`, `prenom`, `adresse`, `code_postal`, `ville`, `pays`, `telephone`, `admin`) VALUES
(1, 'tiphaine_r17@live.fr', '110812f67fa1e1f0117f6f3d70241c1a42a7b07711a93c2477cc516d9042f9db', 'Mme', 'Renouf', 'Tiphaine', '17 rue truc', 17340, 'Chatelaillon-Plage', 'France', 658759348, 1),
(2, 'per@gmail.com', '110812f67fa1e1f0117f6f3d70241c1a42a7b07711a93c2477cc516d9042f9db', 'M', 'Per', 'Nic', '78 rue machin', 17000, 'La Rochelle', 'France', 641812642, 0);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

CREATE TABLE `sport` (
  `id_sport` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(50) NOT NULL,
  `prix` decimal(6,0) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id_sport`, `id_categorie`, `nom`, `description`, `lieu`, `prix`, `img`) VALUES
(1, 1, 'Plongée sous-marine', 'La plongée sous-marine est une activité consistant à rester sous l\'eau marine soit en apnée, soit en respirant à l\'aide d\'un narguilé (tuyau apportant de l\'air depuis la surface) ou le plus souvent en s\'équipant d\'une bouteille de plongée.', 'Subaqua Club La Rochelle', '25', 'img/act/plongee.jpg'),
(2, 1, 'Exploration d\'épave', 'Dans le domaine maritime, une épave est ce qui reste d\'un navire en mer, sur le rivage ou au fond de la mer, après avoir été abandonné, s’être échoué ou avoir coulé à la suite d\'un événement de mer ou d\'un sabordage.', 'Phare des Baleines - Île de Ré', '50', 'img/act/epave.jpg'),
(3, 1, 'Apnée sportive', 'L\'apnée est une dicipline sportive non sans danger, car elle expose le pratiquant à un certain nombre de risques potentiellement grave. Cette pratique consiste à suspendre de manière volontaire la ventilation sous l\'eau.', 'Subaqua Club La Rochelle', '12', 'img/act/apnee.jpg'),
(4, 1, 'Exploration de réserve maritime', 'Les réserves maritime sont des aires protégée qui sont des outils de conservations efficace des ressources halieutiques (poissons, mollusques ect..)', 'Cerbère-Banyuls', '39', 'img/act/reserve.jpg'),
(5, 2, 'Surf', 'Le surf est une action ou une pratique physique de glisse sur les vagues, au bord de l\'océan. Il est pratiqué debout sur une planche.', 'Ptit Bec - Île de Ré', '30', 'img/act/surf.jpg'),
(6, 2, 'Kitesurf', 'Le kitesurf est un sport de glisse consistant à évoluer avec une planche à la surface d\'une étendue d\'eau en étant tracté par un cerf-volant spécialement adapté, nommé aile ou voile.', 'Chatel Kite School', '45', 'img/act/kitesurf.jpg'),
(7, 2, 'Planche à voile', 'La planche à voile est un type d\'embarcation à voile minimaliste, c\'est aussi le sport de glisse pratiqué avec cette embarcation. Elle est constituée d\'une simple planche ou flotteur, et d\'un gréement articulé à la planche par la base du mât.', 'Club Nautique Châtelaillon-Plage', '59', 'img/act/voile.jpg'),
(8, 2, 'Paddle', 'Le paddle est un sport de glisse nautique où le pratiquant se tient debout sur une planche plus longue qu\'une planche de surf classique, se propulsant à l\'aide d\'une pagaie.', 'Week\'n GO Base Nautique Les Minimes', '11', 'img/act/paddle.jpg'),
(9, 3, 'Bouée tractée', 'La bouée tractée est une activité nautique qui fait sensation sur les plages en été. L\'appellation regroupe aussi bien les bouées individuelle, pour plusieurs personnes ou les fameuses bouées banane', 'Plage des Minimes', '15', 'img/act/bouee.jpg'),
(10, 3, 'Ski nautique', 'Le ski nautique est un sport nautique soncistant à se faire tracter par un bateau à moteur en étant sur des ski. Il comporte quatres diciplines :le slalom, les figures, et saut et le combiné.', 'Ré-Glisse Île de Ré', '20', 'img/act/ski.jpg'),
(11, 3, 'Wakeboard', 'Le wakeboard est un sport nautique. Le pratiquant de wakeboard est relié par un palonnier à un bateau à moteur qui le tracte, glisse sur l\'eu en se maintenant ssur une planche de type surf ou skate.', 'Wake Surf Ré', '20', 'img/act/wakeboard.jpg'),
(12, 3, 'Jet ski', 'Sur un plan d\'eau, l\'océan ou la mer, et au départ d\'une plage, d\'un port ou d\'une base de loisirs, le jetski est une activité aquatique saisonnière très appréciée. Combinant vitesse, découverte et adrénaline dans les vagues, il est idéal pour une sortie nautique et ludique.', 'Jet Sensation - Les Minimes', '80', 'img/act/jetski.jpg'),
(13, 4, 'Croisière Fort Boyard', 'Cette croisière commentée vous fera passer un agréable moment à l\'ombre de ce majestueux édifice. Elle comprend : approche du Fort Enet, tour complet du Fort Boyard et un tour de l\'île d\'Aix.', 'Fouras', '14', 'img/act/fortboyard.jpg'),
(14, 4, 'Promenade en canoë/kayak', 'Le canoë-kayak et ses activités associées se pratiquent à bord d\'une embarcation propulsée à la pagaie, en eau calme, en mer et en eau vive. La pagaie est un instrument à une ou deux pales permettant de propulser une embarcation sans point d\'appui sur le flotteur', 'Maison Eclusière La Rochelle', '15', 'img/act/kayak.jpg'),
(15, 4, 'Location de bâteau', 'Elle comprend le Pertuis d’Antioche et le Pertuis Breton, sa plus grande partie est située à l’abri des îles de Ré et d’Oléron. Quelque soit le temps, il y a toujours la possibilité d’y effectuer une navigation très agréable et de trouver des ports charmants ou des mouillages tranquilles. Deux jours de navigation ne suffiront pas pour explorer un tel périmètre !', 'La Rochelle', '100', 'img/act/bateau.jpg'),
(16, 4, '4', '4', '4', '4', 'img/act/.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_personne` (`id_personne`);

--
-- Index pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_personne`);

--
-- Index pour la table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id_sport`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ligne_commande`
--
ALTER TABLE `ligne_commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_personne` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `sport`
--
ALTER TABLE `sport`
  MODIFY `id_sport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`);

--
-- Contraintes pour la table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
