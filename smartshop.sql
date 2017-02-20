-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 20 Février 2017 à 11:57
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `smartshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `icon` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `category`
--

INSERT INTO `category` (`id`, `name`, `icon`) VALUES
(1, 'Smartphone', 'phone'),
(2, 'Smartcam', 'cam'),
(3, 'Laptop', 'laptop'),
(4, 'Smartwatch', 'watch'),
(5, 'Smartspeaker', 'speaker'),
(6, 'SmartVR', 'vr');

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

CREATE TABLE `command` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `dat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statut` varchar(1000) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `command`
--

INSERT INTO `command` (`id`, `id_produit`, `quantity`, `dat`, `statut`, `id_user`) VALUES
(41, 1, 1, '2017-02-06 13:58:34', 'paid', 7),
(61, 11, 1, '2017-02-07 16:21:05', 'paid', 8),
(63, 9, 1, '2017-02-07 16:28:20', 'paid', 8),
(64, 12, 1, '2017-02-07 16:30:14', 'paid', 8),
(66, 13, 1, '2017-02-07 16:33:19', 'paid', 8),
(67, 13, 1, '2017-02-07 16:34:20', 'paid', 8),
(69, 14, 1, '2017-02-07 19:14:55', 'paid', 5),
(70, 14, 1, '2017-02-08 12:09:02', 'paid', 11),
(71, 12, 1, '2017-02-08 15:13:03', 'paid', 11),
(72, 14, 1, '2017-02-08 15:16:07', 'paid', 11),
(73, 11, 2, '2017-02-08 15:55:35', 'paid', 11),
(74, 14, 1, '2017-02-08 16:14:00', 'paid', 11),
(75, 7, 1, '2017-02-08 16:18:22', 'paid', 11),
(76, 12, 1, '2017-02-08 16:34:58', 'paid', 11),
(77, 9, 1, '2017-02-08 16:46:32', 'paid', 11),
(78, 9, 1, '2017-02-09 13:53:03', 'paid', 11),
(80, 9, 1, '2017-02-11 09:12:00', 'paid', 8),
(81, 12, 1, '2017-02-11 17:18:30', 'paid', 8),
(82, 14, 1, '2017-02-12 07:48:51', 'paid', 8),
(83, 16, 1, '2017-02-12 07:53:37', 'paid', 8),
(84, 12, 1, '2017-02-14 08:20:56', 'paid', 8),
(86, 12, 1, '2017-02-14 09:15:08', 'paid', 8),
(87, 14, 1, '2017-02-15 13:36:42', 'paid', 8),
(88, 9, 1, '2017-02-15 13:36:42', 'paid', 8),
(89, 12, 1, '2017-02-15 13:45:26', 'paid', 8),
(90, 14, 1, '2017-02-15 15:01:27', 'paid', 8),
(91, 12, 1, '2017-02-15 15:01:27', 'paid', 8),
(92, 13, 1, '2017-02-15 15:05:20', 'paid', 8),
(93, 11, 1, '2017-02-15 15:05:20', 'paid', 8),
(99, 13, 1, '2017-02-15 15:48:25', 'paid', 8),
(101, 13, 1, '2017-02-15 17:10:14', 'paid', 11),
(111, 12, 1, '2017-02-19 22:16:32', 'paid', 8),
(112, 13, 1, '2017-02-19 22:16:32', 'paid', 8),
(113, 12, 1, '2017-02-19 22:22:05', 'paid', 8),
(114, 13, 1, '2017-02-19 22:22:05', 'paid', 8),
(115, 14, 1, '2017-02-19 22:26:43', 'paid', 8),
(116, 16, 1, '2017-02-19 22:26:43', 'paid', 8),
(117, 11, 1, '2017-02-19 22:27:39', 'paid', 8),
(118, 9, 1, '2017-02-19 22:27:39', 'paid', 8),
(119, 9, 1, '2017-02-19 22:29:15', 'paid', 8),
(120, 13, 1, '2017-02-19 22:29:15', 'paid', 8),
(121, 14, 1, '2017-02-19 22:45:27', 'paid', 8),
(125, 13, 2, '2017-02-20 10:49:00', 'paid', 8);

-- --------------------------------------------------------

--
-- Structure de la table `details_command`
--

CREATE TABLE `details_command` (
  `id` int(11) NOT NULL,
  `product` varchar(1000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `id_command` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `statut` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `details_command`
--

INSERT INTO `details_command` (`id`, `product`, `quantity`, `price`, `id_command`, `id_user`, `user`, `address`, `country`, `city`, `statut`) VALUES
(1, 'MSI GP62 Leopard Pro', 1, 839, 71, 11, 'ali ghallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(3, 'Oculus rift', 2, 1200, 73, 11, 'ali ghallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(4, 'Apple Watch', 1, 349, 74, 11, 'alighallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(5, 'Samsung s7 edge', 1, 560, 75, 11, 'alighallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(6, 'MSI GP62 Leopard Pro', 1, 839, 76, 11, 'alighallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(7, 'Gopro Hero 5', 1, 450, 77, 11, 'alighallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(8, 'Gopro Hero 5', 1, 450, 78, 11, 'alighallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(9, 'Gopro Hero 5', 1, 450, 80, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(10, 'MSI GP62 Leopard Pro', 1, 839, 81, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(11, 'Apple Watch', 1, 349, 82, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(12, 'Canon EOS 7D', 1, 889, 83, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(13, 'MSI GP62 Leopard Pro', 1, 839, 84, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(14, 'MSI GP62 Leopard Pro', 1, 839, 86, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(16, 'MSI GP62 Leopard Pro', 1, 839, 89, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(17, 'MSI GP62 Leopard Pro', 1, 839, 91, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(18, 'Oculus rift', 1, 600, 93, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(19, 'Amazon Echo', 1, 179, 99, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(20, 'Amazon Echo', 1, 179, 101, 11, 'alighallou', 'N 23 Lot El Waha Errachidia', 'Morocco', 'Errachidia', 'done'),
(21, 'Amazon Echo', 1, 179, 112, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(22, 'MSI GP62 Leopard Pro', 1, 839, 113, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(23, 'Amazon Echo', 1, 179, 114, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(24, 'Apple Watch', 1, 349, 115, 8, 'anas mazouni', 'N 20 Lot El dunno Cairo', 'Egypt', 'Cairo', 'done'),
(25, 'Canon EOS 7D', 1, 889, 116, 8, 'anas mazouni', 'N 20 Lot El dunno Cairo', 'Egypt', 'Cairo', 'done'),
(26, 'Oculus rift', 1, 600, 117, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Egypt', 'Cairo', 'done'),
(27, 'Gopro Hero 5', 1, 450, 118, 8, 'anasmazouni', 'N 20 Lot El dunno Cairo', 'Egypt', 'Cairo', 'done'),
(28, 'Gopro Hero 5', 1, 450, 119, 8, 'anas mazouni', 'N 20 Lot El dunno Cairo', 'Algeria', 'Cairo', 'done'),
(29, 'Amazon Echo', 1, 179, 120, 8, 'anas mazouni', 'N 20 Lot El dunno Cairo', 'Algeria', 'Cairo', 'done'),
(30, 'Apple Watch', 1, 349, 121, 8, 'anas mazouni', 'N 20 Lot El dunno Cairo', 'Morocco', 'Cairo', 'done'),
(31, 'Amazon Echo', 2, 358, 125, 8, 'anas mazouni', 'N 20 Lot El dunno Cairo', 'Egypt', 'Cairo', 'done');

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `picture` varchar(1000) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pictures`
--

INSERT INTO `pictures` (`id`, `picture`, `id_produit`) VALUES
(13, 'Samsung-Galaxy-S6-edge-Gold-Platinum..jpg', 2),
(14, 'samsung-galaxy-s7-edge.jpg', 2),
(15, 'galaxy-s7-edge-black.png', 2),
(16, 'MMY72_AV2.jpg', 8),
(17, 'iphone7-plus-rosegold-select-2016.jpg', 8),
(18, 'blue-iphone.jpg', 8),
(19, 'Hero5-Black-Carousel-3.png', 9),
(20, 'gopro-hero-5-release-date-price-frame.jpg', 9),
(21, 'gopro_hero_5_black_review_display.jpg', 9),
(25, 'oculus_rift_1.jpg', 10),
(26, 'OculusRift.jpg', 10),
(27, '61EsR4QA0PL._SL1500_.jpg', 10),
(28, 'five_pictures1_100259_201506200523405584885cedd68.png', 12),
(29, 'pi_ms-gp622qe-035za1.jpg', 12),
(30, 'pi_ms-gp622qe-035za3.jpg', 12),
(31, 'amazon_b00x4whp5e_echo_1187819.jpg', 13),
(32, 'amazonecho_4-100599473-orig.jpg', 13),
(33, 'amazon-echo-part-1-a-consumer-pr.jpg', 13),
(34, 'og-img.png', 14),
(35, 'h_51561794.jpg', 14),
(36, 'apple-watch-thumbnail-100571651-orig.jpg', 14),
(37, 'pixel.png', 15),
(38, 'GoogleBlue.jpg', 15),
(39, 'etui-diztronic-matte-tpu-google-pixel-xl-alloy-grey.jpg', 15),
(40, 'D3S_4695-1200.jpg', 16),
(41, 'highres-Canon-EOS-7D-MarkII-8_1417776370.jpg', 16),
(42, 'highres-Canon-EOS-7D-Mark-II-with-lens-1_1411133185.jpg', 16),
(43, 'nexus-6p-9444.0.jpg', 17),
(44, 'nexus-6p-9693.0.jpg', 17),
(45, 'Google-Nexus-6P-Review-Conc.jpg', 17);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `id_picture` int(11) NOT NULL,
  `thumbnail` varchar(1000) NOT NULL,
  `promo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `product`
--

INSERT INTO `product` (`id`, `id_category`, `name`, `description`, `price`, `id_picture`, `thumbnail`, `promo`) VALUES
(7, 1, 'Samsung s7 edge', '5.50-inch 1440x2560 display powered by 1.6GHz octa-core processor alongside 4GB of RAM and 12-megapixel', 560, 2, 'galaxy-s7-edge-black.png', ''),
(8, 1, 'Iphone 7', 'Features 3G, 4.7â€³ LED-backlit IPS LCD display, 12 MP camera, Wi-Fi, GPS, Bluetooth', 700, 8, 'rsz_iphone-7-jet-black.jpg', ''),
(9, 2, 'Gopro Hero 5', ' GoPro HERO5 Black features Supports 4K30, 2.7K60, 1080p120 Video, Capture 12MP Photos at 30fps', 450, 9, 'gopro5.png', '1'),
(11, 6, 'Oculus rift', 'The Oculus Rift is a virtual reality system that completely immerses you inside virtual worlds', 600, 10, 'Oculus_Product_Dynamic 45.jpg', '1'),
(12, 3, 'MSI GP62 Leopard Pro', 'In-depth review of the MSI GP62-2QEi781FD (Intel Core i7 5700HQ, NVIDIA GeForce GTX 950M, 15.6", 2.3 kg) ... The MSI GE series is already the manufacturer''s entry-level gaming series. ..... ', 839, 12, 'msi-gp62-6qf-product_pictures-3d1.png', ''),
(13, 5, 'Amazon Echo', 'Amazon Echo is a hands-free speaker you control with your voice. Echo connects to the Alexa Voice Service to play music, provide information, news, sports ...', 179, 13, 'amazon-echo-image.jpg', ''),
(14, 4, 'Apple Watch', 'The new Apple Watch is the ultimate device for your healthy life. Choose from a range of models including Apple Watch Series 2 and Apple Watch Nike+', 349, 14, 'apple-watch-premium-design-vs-pebble-time-round-classic-design.jpg', ''),
(15, 1, 'Google Pixel XL', 'XL 5.5" Phone 128GB Quite Black Cell Smart. GOOGLE PIXEL XL 5.5" Black 32GB TRUE ANDROID PHONE CDMA+GSM WORLD UNLOCKED', 649, 15, 'pixel.png', ''),
(16, 2, 'Canon EOS 7D', 'The EOS 7D features a Canon-designed 18.0 Megapixel APS-C size CMOS sensor that captures such a high level of resolution it''s easy to crop images for ...', 889, 16, 'EOS 7D Mark II Hero.jpg', ''),
(17, 1, 'Nexus 6P', 'All-metal design Unlocked, LTE smartphone with a powerful 2GHz Snapdragon 810 V2.1 Processor and the newest Android software, Android 6.0 marshmallow.', 499, 17, 'nexus-6p-topic-full.png', '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(1000) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `password`, `address`, `city`, `country`, `role`) VALUES
(5, 'ismailghallou@hotmail.com', 'Ismail', 'Ghallou', 'f3b32717d5322d7ba7c505c230785468', 'N 23 Lot El Waha Errachidia', 'Errachidia', 'Morocco', 'admin'),
(6, 'ismail16smakosh23@gmail.com', 'ahmed', 'ali', '9193ce3b31332b03f7d8af056c692b84', 'N 26 Lot El Waha Errachidia', 'Errachidia', 'Morocco', 'client'),
(7, 'ismail@hotmail.com', 'omar', 'ahmed', 'd4466cce49457cfea18222f5a7cd3573', 'N 22 Lot El Waha Errachidia', 'Errachidia', 'Morocco', 'client'),
(8, 'anas@anas.com', 'anas', 'mazouni', '76eb649c047cbecad7c36e71374bc9a5', 'N 20 Lot El dunno Cairo', 'Cairo', 'Morocco', 'client'),
(9, 'badris@hotmail.com', 'abdo', 'badris', '267c88a9c130619b5e8fe370c0ae7730', 'N 48 Lot El Waha Errachidia', 'Errachidia', 'Morocco', 'client'),
(10, 'mus@hotmail.com', 'mus', 'ghallou', 'd62ec24d065e424dd816ce7828f62584', 'N 102 Cairo', 'Cairo', 'Egypt', 'client'),
(11, 'ali@ali.com', 'ali', 'ghallou', '86318e52f5ed4801abe1d13d509443de', 'N 23 Lot El Waha Errachidia', 'Errachidia', 'Morocco', 'client');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `command`
--
ALTER TABLE `command`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `details_command`
--
ALTER TABLE `details_command`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `command`
--
ALTER TABLE `command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT pour la table `details_command`
--
ALTER TABLE `details_command`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
