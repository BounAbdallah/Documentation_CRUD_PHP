CREATE DATABASE IF NOT EXISTS gestion_des_Etudiant DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

USE gestion_des_Etudiant;

-- Structure de la table `universite`
CREATE TABLE IF NOT EXISTS `universite` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `lieu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Structure de la table `Etudiant`
CREATE TABLE IF NOT EXISTS `Etudiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `INE` varchar(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `id_université` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `INE` (`INE`),
  KEY `id_université` (`id_université`),
  CONSTRAINT `Etudiant_ibfk_1` FOREIGN KEY (`id_université`) REFERENCES `universite` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
