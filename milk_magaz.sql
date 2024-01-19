-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 19, 2024 at 10:31 AM
-- Server version: 11.2.2-MariaDB-1:11.2.2+maria~ubu2204
-- PHP Version: 8.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `disponibilitate`
--

CREATE TABLE `disponibilitate` (
  `id_disp` int(11) NOT NULL,
  `nume_disp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disponibilitate`
--

INSERT INTO `disponibilitate` (`id_disp`, `nume_disp`) VALUES
(1, '<span style=\"color: green;\"><b>În stoc</b></span>'),
(2, '<span style=\"color: red;\"><b>Indisponibil</b></span>');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `id_cump` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fname`, `lname`, `tel`, `id_cump`) VALUES
(1, 'sadf', 'asdf', '067208737', 12),
(2, 'sadf', 'asdf', '067208737', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_products`
--

INSERT INTO `orders_products` (`id_order`, `id_product`, `cantitate`) VALUES
(2, 6, 1),
(2, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_produs` int(11) NOT NULL,
  `data_fabr` varchar(20) NOT NULL,
  `pret` float NOT NULL,
  `id_unit` int(11) DEFAULT NULL,
  `term_val` int(11) NOT NULL,
  `id_producator` int(11) NOT NULL,
  `data_adaug` date NOT NULL DEFAULT current_timestamp(),
  `denumire_prod` varchar(30) NOT NULL,
  `prod_img` varchar(30) NOT NULL DEFAULT '/upload/defaultProduct.png',
  `description` text NOT NULL DEFAULT 'No text added',
  `id_disp` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_produs`, `data_fabr`, `pret`, `id_unit`, `term_val`, `id_producator`, `data_adaug`, `denumire_prod`, `prod_img`, `description`, `id_disp`) VALUES
(6, '2022-01-21', 45, 2, 10, 5, '2022-01-11', 'Lapte', '/upload/220px-Milk_glass.jpg', 'lapte de vaci dulce', 1),
(7, '2022-01-28', 70, 1, 10, 5, '2022-01-11', 'Branza de vaci', '/upload/4406981.jpg', 'Branza de vaci proaspata', 1),
(8, '2022-01-21', 45, 1, 10, 5, '2022-01-11', 'Cascaval', '/upload/cascaval.jpg', 'Cascaval descriere', 1),
(9, '2022-01-26', 89, 1, 365, 9, '2022-01-12', 'Branza de oi', '/upload/20876.jpg', 'Branza de oi de munte', 1);

-- --------------------------------------------------------

--
-- Table structure for table `unitati_mas`
--

CREATE TABLE `unitati_mas` (
  `id_unit` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unitati_mas`
--

INSERT INTO `unitati_mas` (`id_unit`, `unit`) VALUES
(1, 'Kg'),
(2, 'Litru');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `adress` varchar(20) NOT NULL,
  `type` int(11) NOT NULL,
  `contact_nr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `fname`, `lname`, `adress`, `type`, `contact_nr`) VALUES
(4, 'virgiliu.plesca@iis.utm.md', 'sfgsgfdsfgsdfgsdfg', 'Virgiliu', 'Plesca', 'Varatic', 1, '1616516216'),
(5, 'plesca.virgiliu@gmail.com', '123456789', 'Ion', 'Plesca', 'Edinetdfgh', 2, '067208737'),
(7, 'v.ungureanu@gmail.com', 'qwertyui', 'Vasile', 'Ungureanu', 'Lapusna', 2, '067854156'),
(8, 'Iorga@gmail.com', 'qwertyui', 'Nicolae ', 'Iorga', 'Muntenegru', 2, '078546159'),
(9, 'marc@mail.ru', 'qwertyui', 'Burunduc', 'Marc', 'Sarmisegetusa', 2, '097548159'),
(10, 'minulescu@mail.ru', 'qwertyui', 'Marin', 'Minulescu', 'Chisinau', 2, '097846178'),
(11, 'germer90@mail.ru', 'qwertyui', 'Cosmin', 'Chiriac', 'Comrat', 1, '076478492'),
(12, 'virgiliu.plesca@infigo.net', '123', 'sadf', 'asdf', 'asdf', 1, '067208737');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id_type`, `type`) VALUES
(1, 'Cumparator'),
(2, 'Vanzator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disponibilitate`
--
ALTER TABLE `disponibilitate`
  ADD PRIMARY KEY (`id_disp`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_produs`),
  ADD KEY `id_prod_constr` (`id_producator`),
  ADD KEY `id_unit_constr` (`id_unit`);

--
-- Indexes for table `unitati_mas`
--
ALTER TABLE `unitati_mas`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email` (`email`),
  ADD KEY `user_type_constr` (`type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disponibilitate`
--
ALTER TABLE `disponibilitate`
  MODIFY `id_disp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_produs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `unitati_mas`
--
ALTER TABLE `unitati_mas`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `id_prod_constr` FOREIGN KEY (`id_producator`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_unit_constr` FOREIGN KEY (`id_unit`) REFERENCES `unitati_mas` (`id_unit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_type_constr` FOREIGN KEY (`type`) REFERENCES `user_type` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
