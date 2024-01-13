-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 oct. 2022 à 15:08
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `les_employes`
--

-- --------------------------------------------------------

--
-- Structure de la table `aal`
--

CREATE TABLE `aal` (
  `nom_aal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `aal`
--

INSERT INTO `aal` (`nom_aal`) VALUES
('CAIDAT ADAGHAS'),
('CAIDAT AQUERMOUD'),
('CAIDAT ARGANE'),
('CAIDAT BIZDAD'),
('CAIDAT CHIADMA CHAMALIYA'),
('CAIDAT CHIADMA JANOUBIA'),
('CAIDAT EL HANCHANE'),
('CAIDAT IDA OU TGHOUMA'),
('CAIDAT M\'RAMER'),
('CAIDAT OUNAGHA'),
('CAIDAT REGRAGA'),
('CAIDAT SMIMOU'),
('CAIDAT TAMENT'),
('CAIDAT TIDZI'),
('CERCLE AIT DAOUD'),
('CERCLE EL HANCHANE'),
('CERCLE ESSAOUIRA'),
('CERCLE TMANAR'),
('CIADAT MESKALA'),
('PACHALIK AIT DAOUD'),
('PACHALIK EL HANCHANE'),
('PACHALIK ESSAOUIRA'),
('PACHALIK TALMEST'),
('PACHALIK TMANR');

-- --------------------------------------------------------

--
-- Structure de la table `budget`
--

CREATE TABLE `budget` (
  `nom_bdg` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `budget`
--

INSERT INTO `budget` (`nom_bdg`) VALUES
('BC'),
('BG'),
('BP');

-- --------------------------------------------------------

--
-- Structure de la table `division`
--

CREATE TABLE `division` (
  `nom_div` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `division`
--

INSERT INTO `division` (`nom_div`) VALUES
('cabinet'),
('division de l\'action sociale'),
('division de l\'urbanisme, de l\'amenagement du territoire, de la gestion des risques naturels et de l\'envirenment'),
('division des affaires administratives'),
('division des affaires economiques et de la coordination'),
('division des affaires interieurs'),
('division des affaires rurales'),
('division des collectivites territoriales'),
('division des equipment et de la coordination technique');

-- --------------------------------------------------------

--
-- Structure de la table `echelle`
--

CREATE TABLE `echelle` (
  `nom_ech` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `echelle`
--

INSERT INTO `echelle` (`nom_ech`) VALUES
('336-01'),
('369-02'),
('403-03'),
('436-04'),
('472-05'),
('509-06'),
('542-07'),
('574-08'),
('606-09'),
('639-10');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `cin` varchar(12) DEFAULT NULL,
  `date_nais` date DEFAULT NULL,
  `date_aff` date DEFAULT NULL,
  `budget` varchar(2) DEFAULT NULL,
  `ppr` int(11) DEFAULT NULL,
  `grade` varchar(40) DEFAULT NULL,
  `echelle` varchar(6) DEFAULT NULL,
  `aff_div` varchar(255) DEFAULT NULL,
  `aff_aal` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id`, `nom`, `prenom`, `cin`, `date_nais`, `date_aff`, `budget`, `ppr`, `grade`, `echelle`, `aff_div`, `aff_aal`) VALUES
(3, 'zaid', 'mouad', 'H37624', '2002-12-06', '2020-07-01', 'BG', 98076, 'architecte premiere grade', '542-07', NULL, 'PACHALIK ESSAOUIRA'),
(4, 'bassim', 'ahmed', 'J571237', '2001-01-01', '2022-01-12', 'BP', NULL, 'architecte en chef premiere grade', '436-04', 'cabinet', NULL),
(5, 'said', 'yassin', 'N43527', '2002-11-09', '2021-05-19', 'BC', NULL, 'ingenieur d\'etat premiere grade ', '542-07', NULL, 'CAIDAT ADAGHAS'),
(6, 'abdelilah', 'elgallati', 'N471892', '2003-12-06', '2022-06-01', 'BC', NULL, 'ingenieur en chef grade principale', '606-09', 'division de l\'action sociale', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `grade`
--

CREATE TABLE `grade` (
  `nom_grd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `grade`
--

INSERT INTO `grade` (`nom_grd`) VALUES
('administrateurs de 1er grade'),
('administrateurs de 2eme grade'),
('administrateurs de 3eme grade'),
('architecte en chef grade principale'),
('architecte en chef premiere grade'),
('architecte grade principale'),
('architecte premiere grade'),
('ingenieur d\'etat grade principale'),
('ingenieur d\'etat premiere grade '),
('ingenieur en chef grade principale'),
('ingenieur en chef premiere grade ');

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `mot_passe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`email`, `mot_passe`) VALUES
('abdelilah@gmail.com', 'abdelilah');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `aal`
--
ALTER TABLE `aal`
  ADD PRIMARY KEY (`nom_aal`);

--
-- Index pour la table `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`nom_bdg`);

--
-- Index pour la table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`nom_div`);

--
-- Index pour la table `echelle`
--
ALTER TABLE `echelle`
  ADD PRIMARY KEY (`nom_ech`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `budget` (`budget`),
  ADD KEY `grade` (`grade`),
  ADD KEY `echelle` (`echelle`),
  ADD KEY `aff_div` (`aff_div`),
  ADD KEY `aff_aal` (`aff_aal`);

--
-- Index pour la table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`nom_grd`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`budget`) REFERENCES `budget` (`nom_bdg`),
  ADD CONSTRAINT `employe_ibfk_2` FOREIGN KEY (`grade`) REFERENCES `grade` (`nom_grd`),
  ADD CONSTRAINT `employe_ibfk_3` FOREIGN KEY (`echelle`) REFERENCES `echelle` (`nom_ech`),
  ADD CONSTRAINT `employe_ibfk_4` FOREIGN KEY (`aff_div`) REFERENCES `division` (`nom_div`),
  ADD CONSTRAINT `employe_ibfk_5` FOREIGN KEY (`aff_aal`) REFERENCES `aal` (`nom_aal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
