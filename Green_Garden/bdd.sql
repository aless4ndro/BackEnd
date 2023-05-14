create table product (
    id int not null auto_increment,
    name varchar(255) not null,
    price decimal(10,2) not null,
    primary key (id)
) engine=InnoDB;

alter table product add description varchar(255) null;

SELECT * FROM products WHERE name LIKE '%exemple%';


INSERT INTO products (name, price, image) VALUES ('Produit 1', 19.99, 'https://www.meisterdrucke.fr/kunstwerke/500px/Frederick%20William%20Bond%20-%20Camel%20lawn-mower%20ridden%20by%20gardener%20Fred%20Perry%20at%20London%20Zoo%201913%20%20-%20%28MeisterDrucke-155733%29.jpg');
INSERT INTO products (name, price, image) VALUES ('Produit 2', 29.99, 'https://media.gettyimages.com/id/1279478271/fr/photo/jeune-femme-contr%C3%B4lant-la-tondeuse-de-pelouse-de-robot-dans-le-jardin-d%C3%A9t%C3%A9.jpg?s=170667a&w=gi&k=20&c=0Lc5rC0mvbhoJcV6589FU8yOo4ghj1pk2erJOGQYU0o=');
INSERT INTO products (name, price, image) VALUES ('Produit 3', 39.99, 'https://www.detentejardin.com/sites/art-de-vivre/files/dja-tondeuses-helicoidales-test_cll1.jpg');
INSERT INTO products (name, price, image) VALUES ('Produit 4', 49.99, 'https://www.univeco.com/img/magnalister/products/500px/39045.jpg');



---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : dim. 14 mai 2023 à 20:56
-- Version du serveur : 8.0.33
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `green_garden`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `description`) VALUES
(1, 'Produit 1', 19.99, 'https://www.meisterdrucke.fr/kunstwerke/500px/Frederick%20William%20Bond%20-%20Camel%20lawn-mower%20ridden%20by%20gardener%20Fred%20Perry%20at%20London%20Zoo%201913%20%20-%20%28MeisterDrucke-155733%29.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi in ex imperdiet, varius elit at, suscipit nisl. Curabitur consequat et sapien sit amet molestie. '),
(2, 'Produit 2', 29.99, 'https://media.gettyimages.com/id/1279478271/fr/photo/jeune-femme-contr%C3%B4lant-la-tondeuse-de-pelouse-de-robot-dans-le-jardin-d%C3%A9t%C3%A9.jpg?s=170667a&w=gi&k=20&c=0Lc5rC0mvbhoJcV6589FU8yOo4ghj1pk2erJOGQYU0o=', 'congue, mi nulla pharetra eros, et malesuada ex arcu nec dui. Quisque ut lectus id nisi tristique bibendum'),
(3, 'Produit 3', 39.99, 'https://www.detentejardin.com/sites/art-de-vivre/files/dja-tondeuses-helicoidales-test_cll1.jpg', ' Pellentesque et maximus felis. Etiam consectetur efficitur rhoncus. Nullam ultricies at quam et lobortis. Maecenas ultrices nisi eu enim vehicula accum'),
(4, 'Produit 4', 49.99, 'https://www.univeco.com/img/magnalister/products/500px/39045.jpg', 'efficitur rhoncus. Nullam ultricies at quam et lobortis. Maecenas ultrices nisi eu enim vehicula accum');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
