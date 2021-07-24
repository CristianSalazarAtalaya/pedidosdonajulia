-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2021 a las 03:09:10
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_dna_julia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlatives`
--

CREATE TABLE `correlatives` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `code` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `correlatives`
--

INSERT INTO `correlatives` (`id`, `type`, `code`, `number`, `date_created`, `date_updated`, `user_created`) VALUES
(1, 'BOLETA', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directions`
--

CREATE TABLE `directions` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `department` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `province` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `district` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `direction` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `reference_dir` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `directions`
--

INSERT INTO `directions` (`id`, `id_user`, `department`, `province`, `district`, `direction`, `reference_dir`, `date_created`, `date_updated`) VALUES
(2, 1, 'LIMA', 'LIMA', 'LIMA', 'AV LIMA 1', 'AV LIMA 1', '2021-07-18 22:59:32', '2021-07-19 03:59:32'),
(3, 15, 'LIMA', 'LIMA', 'LIMA', 'AV LIMA', 'LIMA PLAZA', '2021-07-18 23:16:35', '2021-07-19 04:17:26'),
(4, 18, 'LIMA', 'LIMA', 'LIMA', 'SJL1', 'PARQUE', '2021-07-22 02:17:27', '2021-07-22 07:17:27'),
(5, 19, 'LIMA', 'LIMA', 'LIMA', 'AV 1', 'AV 1', '2021-07-22 02:20:44', '2021-07-22 07:20:44'),
(6, 20, 'LIMA', 'LIMA', 'LIMA', 'av 1', 'av 2', '2021-07-23 19:02:28', '2021-07-24 00:02:28'),
(7, 21, 'LIMA', 'LIMA', 'LIMA', 'av 1', 'av 1', '2021-07-23 19:34:35', '2021-07-24 00:34:35'),
(8, 22, 'LIMA', 'LIMA', 'LIMA', 'av 1', 'av 2', '2021-07-23 19:47:09', '2021-07-24 00:47:09'),
(9, 23, 'LIMA', 'LIMA', 'LIMA', 'av1', 'av 2', '2021-07-23 19:59:23', '2021-07-24 00:59:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `direction` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `reference_dir` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `date_order` datetime DEFAULT NULL,
  `date_delivery` datetime DEFAULT NULL,
  `notes` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `type_pay` int(11) NOT NULL,
  `date_getorder` datetime DEFAULT NULL,
  `date_deliveredorder` datetime DEFAULT NULL,
  `type_doc` int(20) NOT NULL,
  `num_doc` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_fac` int(11) DEFAULT NULL,
  `num_fac` int(11) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `invoice`
--

INSERT INTO `invoice` (`id`, `id_user`, `direction`, `reference_dir`, `total_price`, `date_order`, `date_delivery`, `notes`, `type_pay`, `date_getorder`, `date_deliveredorder`, `type_doc`, `num_doc`, `cod_fac`, `num_fac`, `date_created`, `date_updated`) VALUES
(1, 13, '', NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, 0, '', NULL, NULL, '2021-07-19 00:15:01', '2021-07-19 05:15:01'),
(2, 15, '', NULL, '0', NULL, NULL, NULL, 0, NULL, NULL, 0, '', NULL, NULL, '2021-07-19 00:31:02', '2021-07-19 05:31:02'),
(3, 13, '', NULL, '0', NULL, NULL, NULL, 1, NULL, NULL, 1, '', NULL, NULL, '2021-07-19 00:31:31', '2021-07-19 05:31:31'),
(7, 15, '', NULL, '0', NULL, NULL, NULL, 1, NULL, NULL, 1, '', NULL, NULL, '2021-07-19 00:34:25', '2021-07-19 05:34:25'),
(8, 15, '', NULL, '0', NULL, NULL, NULL, 1, NULL, NULL, 1, '', NULL, NULL, '2021-07-19 00:34:32', '2021-07-19 05:34:32'),
(9, 15, '', NULL, '0', NULL, NULL, NULL, 1, NULL, NULL, 1, '', NULL, NULL, '2021-07-19 00:34:34', '2021-07-19 05:34:34'),
(10, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '0', NULL, NULL, NULL, 1, NULL, NULL, 1, '', NULL, NULL, '2021-07-19 00:35:06', '2021-07-19 05:35:06'),
(11, 15, '', NULL, '0', NULL, NULL, NULL, 1, NULL, NULL, 1, '', NULL, NULL, '2021-07-19 00:38:22', '2021-07-19 05:38:22'),
(12, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '0', '2021-07-19 00:38:44', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:38:44', '2021-07-19 05:38:44'),
(13, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '0', '2021-07-19 00:38:56', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:38:56', '2021-07-19 05:38:56'),
(14, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '0', '2021-07-19 00:40:45', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:40:45', '2021-07-19 05:40:45'),
(15, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '86', '2021-07-19 00:42:42', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:42:42', '2021-07-19 05:42:42'),
(16, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '86', '2021-07-19 00:43:30', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:43:30', '2021-07-19 05:43:30'),
(17, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '86', '2021-07-19 00:46:37', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:46:37', '2021-07-19 05:46:37'),
(18, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '86', '2021-07-19 00:48:05', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:48:05', '2021-07-19 05:48:05'),
(19, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '86', '2021-07-19 00:48:42', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:48:42', '2021-07-19 05:48:42'),
(20, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '106', '2021-07-19 00:48:52', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:48:52', '2021-07-19 05:48:52'),
(21, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '126', '2021-07-19 00:51:05', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 00:51:05', '2021-07-19 05:51:05'),
(22, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '86', '2021-07-19 20:16:38', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 20:16:38', '2021-07-20 01:16:38'),
(23, 15, 'LIMA-LIMA-LIMA-AV LIMA', 'LIMA PLAZA', '86', '2021-07-19 20:18:10', NULL, NULL, 1, NULL, NULL, 1, '72839620', NULL, NULL, '2021-07-19 20:18:10', '2021-07-20 01:18:10'),
(24, 15, 'LIMA-LIMA-LIMA-AV 1', 'AV 1', '73', '2021-07-22 02:22:09', NULL, NULL, 1, NULL, NULL, 1, '72839625', NULL, NULL, '2021-07-22 02:22:09', '2021-07-22 07:22:09'),
(25, 15, 'LIMA-LIMA-LIMA-av 1', 'av 2', '106', '2021-07-23 19:02:42', NULL, NULL, 1, NULL, NULL, 1, '12457898', NULL, NULL, '2021-07-23 19:02:42', '2021-07-24 00:02:42'),
(26, 15, 'LIMA-LIMA-LIMA-AV 1', 'AV 1', '106', '2021-07-23 19:42:48', NULL, NULL, 1, NULL, NULL, 1, '72839625', NULL, NULL, '2021-07-23 19:42:48', '2021-07-24 00:42:48'),
(27, 15, 'LIMA-LIMA-LIMA-AV 1', 'AV 1', '86', '2021-07-23 19:43:12', NULL, NULL, 1, NULL, NULL, 1, '72839625', NULL, NULL, '2021-07-23 19:43:12', '2021-07-24 00:43:12'),
(28, 15, 'LIMA-LIMA-LIMA-av 1', 'av 2', '106', '2021-07-23 19:47:15', NULL, NULL, 1, NULL, NULL, 1, '12457898', NULL, NULL, '2021-07-23 19:47:15', '2021-07-24 00:47:15'),
(29, 15, 'LIMA-LIMA-LIMA-av1', 'av 2', '86', '2021-07-23 20:00:21', NULL, NULL, 1, NULL, NULL, 1, '1254879865', NULL, NULL, '2021-07-23 20:00:21', '2021-07-24 01:00:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_product` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `final_price` decimal(10,0) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `id_invoice`, `id_product`, `name_product`, `amount`, `price`, `discount`, `final_price`, `date_created`, `date_updated`) VALUES
(1, 17, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-19 00:46:37', '2021-07-19 05:46:37'),
(2, 17, 1, 'Anticucho de corazon', 1, '30', '10', '20', '2021-07-19 00:46:37', '2021-07-19 05:46:37'),
(3, 18, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-19 00:48:05', '2021-07-19 05:48:05'),
(4, 18, 1, 'Anticucho de corazon', 1, '30', '10', '20', '2021-07-19 00:48:05', '2021-07-19 05:48:05'),
(5, 19, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-19 00:48:42', '2021-07-19 05:48:42'),
(6, 19, 1, 'Anticucho de corazon', 1, '30', '10', '20', '2021-07-19 00:48:42', '2021-07-19 05:48:42'),
(7, 20, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-19 00:48:52', '2021-07-19 05:48:52'),
(8, 20, 1, 'Anticucho de corazon', 2, '30', '10', '20', '2021-07-19 00:48:52', '2021-07-19 05:48:52'),
(9, 21, 1, 'Anticucho de corazon', 3, '30', '10', '20', '2021-07-19 00:51:05', '2021-07-19 05:51:05'),
(10, 21, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-19 00:51:05', '2021-07-19 05:51:05'),
(11, 22, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-19 20:16:38', '2021-07-20 01:16:38'),
(12, 22, 1, 'Anticucho de corazon', 1, '30', '10', '20', '2021-07-19 20:16:38', '2021-07-20 01:16:38'),
(13, 23, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-19 20:18:10', '2021-07-20 01:18:10'),
(14, 23, 1, 'Anticucho de corazon', 1, '30', '10', '20', '2021-07-19 20:18:10', '2021-07-20 01:18:10'),
(15, 24, 1, 'Anticucho de corazon', 2, '30', '10', '20', '2021-07-22 02:22:09', '2021-07-22 07:22:09'),
(16, 24, 2, 'Anticucho de molleja', 1, '38', '5', '33', '2021-07-22 02:22:09', '2021-07-22 07:22:09'),
(17, 25, 1, 'Anticucho de corazon', 2, '30', '10', '20', '2021-07-23 19:02:42', '2021-07-24 00:02:42'),
(18, 25, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-23 19:02:42', '2021-07-24 00:02:42'),
(19, 26, 1, 'Anticucho de corazon', 2, '30', '10', '20', '2021-07-23 19:42:48', '2021-07-24 00:42:48'),
(20, 26, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-23 19:42:48', '2021-07-24 00:42:48'),
(21, 27, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-23 19:43:12', '2021-07-24 00:43:12'),
(22, 27, 1, 'Anticucho de corazon', 1, '30', '10', '20', '2021-07-23 19:43:12', '2021-07-24 00:43:12'),
(23, 28, 1, 'Anticucho de corazon', 2, '30', '10', '20', '2021-07-23 19:47:15', '2021-07-24 00:47:15'),
(24, 28, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-23 19:47:15', '2021-07-24 00:47:15'),
(25, 29, 2, 'Anticucho de molleja', 2, '38', '5', '33', '2021-07-23 20:00:21', '2021-07-24 01:00:21'),
(26, 29, 1, 'Anticucho de corazon', 1, '30', '10', '20', '2021-07-23 20:00:21', '2021-07-24 01:00:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `names` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `surnames` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `age` int(3) NOT NULL,
  `sex` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ruc` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `id_user`, `names`, `surnames`, `age`, `sex`, `dni`, `ruc`, `date_created`, `date_updated`, `user_created`) VALUES
(2, 15, 'CRISTIAN ALEXANDER', 'SALAZAR', 27, 'M', '72839620', '', '2021-07-19 00:19:23', '2021-07-19 05:19:31', 1),
(3, 18, 'cristian', 'salazar', 27, 'M', '72839620', '', '2021-07-22 02:17:27', '2021-07-22 07:17:27', 18),
(4, 19, 'asd', 'asd', 27, 'M', '72839625', '', '2021-07-22 02:20:44', '2021-07-22 07:20:44', 19),
(5, 20, 'user', 'user', 20, 'M', '12457898', '', '2021-07-23 19:02:28', '2021-07-24 00:02:28', 20),
(6, 21, 'user5', 'user5', 20, 'M', '12457898', '', '2021-07-23 19:34:35', '2021-07-24 00:34:35', 21),
(7, 22, 'user6', 'user6', 20, 'M', '12457898', '', '2021-07-23 19:47:09', '2021-07-24 00:47:09', 22),
(8, 23, 'user8', 'user8', 20, 'F', '1254879865', '', '2021-07-23 19:59:23', '2021-07-24 00:59:23', 23);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `categorie` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `names` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `description` text COLLATE utf8_spanish_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` decimal(10,0) NOT NULL,
  `stock` int(11) NOT NULL,
  `enabled` bit(1) NOT NULL,
  `img` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_update` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `categorie`, `names`, `description`, `price`, `discount`, `stock`, `enabled`, `img`, `date_created`, `date_update`, `user_created`) VALUES
(1, 'FRIOS', 'Anticucho de corazon', 'Anticucho de corazon', '30', '10', 50, b'1', 'anticucho-corazon.jpg', '2021-06-03 00:39:49', '2021-06-03 05:39:49', 1),
(2, 'TIBIO', 'Anticucho de molleja', 'Anticucho de molleja', '38', '5', 50, b'1', 'anticucho-molleja.jpg', '2021-06-03 00:39:49', '2021-06-03 05:39:49', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `type` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login_date` datetime DEFAULT NULL,
  `last_login_host` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `last_login_sessionid` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `user_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`, `date_created`, `date_updated`, `last_login_date`, `last_login_host`, `last_login_sessionid`, `user_created`) VALUES
(1, 'admin', '$2y$10$X4uvZanE098TzRN2.iTx9Ou4qEWeItywK8TaTPOQouxsCCrLM2/ce', 'admin', 3, '2021-05-13 01:09:09', '2021-07-10 09:45:18', '2021-07-23 20:00:47', '::1', 't9a365r0qdmacbpedpsucnvh6a1oi97c', 1),
(10, 'admin4', '$2y$10$q/QK8T513P3lXCJrmwXq6OOppg2nY71cX4EoSCW7hZvhA2gXkZGi.', 'hola@hola.con', 3, '2021-06-18 19:52:08', '2021-06-19 00:52:08', '2021-07-10 01:50:22', '::1', 'lrs5n2dad3h7a8egkdehc15q38b9qotg', 1),
(13, 'adm', '$2y$10$USu5RIw3Mzf3lwuDOYBxl.oibCB1sg.bEbt1KeMrzWeCBTtEXHnJW', 'admasd@adm.com', 3, '2021-07-06 01:13:57', '2021-07-06 06:13:57', '2021-07-10 01:49:36', '::1', 'at66beirvvpt80ugdmb5qpue8pobvbs1', 13),
(15, 'user', '$2y$10$0Fh8kGGmangJLEp2LRXHY.jlt2bGoRnBXDnNHP2D02F3mtj9Xxh86', 'user@user.com', 1, '2021-07-06 01:46:05', '2021-07-06 06:46:05', '2021-07-19 20:16:00', '::1', 'g47l2q2baotvdv0p3tet8djpeornj9ov', 13),
(16, 'admin5', '$2y$10$ADzlaForT3QyNpCBf10Vv.6lvpeQ4THNNfVlDXUkgfmo.Ql41kaQe', 'admin5@gmail.com', 3, '2021-07-19 19:27:14', '2021-07-20 00:29:26', NULL, NULL, '', 1),
(18, 'user2', '$2y$10$69Xffb92gLoPvdFA8MXgGe2tdWpCZPKrM9o8BByr82T70Bh5Y0FPq', 'user2@gmail.com', 1, '2021-07-22 02:17:27', '2021-07-22 07:18:22', '2021-07-23 19:12:38', '::1', '', 1),
(19, 'user3', '$2y$10$hHDCecRkFQYYpRKIY/E1/OAd6eFrxVltWf5gBeGGzvyslUebH/.f6', 'user3@gmail.com', 1, '2021-07-22 02:20:44', '2021-07-22 07:20:44', '2021-07-23 19:42:32', '::1', '', 1),
(20, 'user4', '$2y$10$u5LIhwyPI0E606qg2dBFDen9cfrFBu9NubRklGcWJu5994sgCfjhK', 'user4@gmail.com', 1, '2021-07-23 19:02:28', '2021-07-24 00:02:28', '2021-07-23 19:12:24', '::1', '', 1),
(21, 'user5', '$2y$10$AD3titL37QdBnqoSUGP8rul0TZJFOAJpG9xhK3x8kCMHEwkCwTTGC', 'user589@gmail.com', 1, '2021-07-23 19:34:35', '2021-07-24 00:45:41', '2021-07-23 19:34:55', '::1', '', 1),
(22, 'user6', '$2y$10$NvD.upaygvvurD4VEY66XOwEsjt2aym3z7HpigT8kYJXbeNNIcZBe', 'user6@gmail.com', 1, '2021-07-23 19:47:09', '2021-07-24 00:47:09', NULL, '::1', '', 1),
(23, 'user8', '$2y$10$JpVcTamA7InVq1LXkyujbOVUaQH/aYoFKtS4JUHjck5uy6SRmOO52', 'user8@gmail.com', 1, '2021-07-23 19:59:23', '2021-07-24 00:59:23', NULL, '::1', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variables`
--

CREATE TABLE `variables` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `condition_var` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `value` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_created` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `variables`
--

INSERT INTO `variables` (`id`, `type`, `condition_var`, `value`, `date_created`, `date_updated`, `user_created`) VALUES
(2, 'DEPARTAMENTO', '', 'LIMA', '2021-07-22 01:34:47', '2021-07-22 06:34:47', 1),
(3, 'PROVINCIA', 'LIMA', 'LIMA', '2021-07-22 01:34:47', '2021-07-22 06:34:47', 1),
(4, 'DISTRITO', 'LIMA-LIMA', 'LIMA', '2021-07-22 01:43:27', '2021-07-22 06:49:51', 1),
(5, 'DISTRITO', 'LIMA-LIMA', 'BREÑA', '2021-07-22 01:43:27', '2021-07-22 06:43:27', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `correlatives`
--
ALTER TABLE `correlatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_created` (`user_created`);

--
-- Indices de la tabla `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_invoice` (`id_invoice`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `user_created` (`user_created`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_created` (`user_created`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_created` (`user_created`);

--
-- Indices de la tabla `variables`
--
ALTER TABLE `variables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_created` (`user_created`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `correlatives`
--
ALTER TABLE `correlatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `directions`
--
ALTER TABLE `directions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `variables`
--
ALTER TABLE `variables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `correlatives`
--
ALTER TABLE `correlatives`
  ADD CONSTRAINT `correlatives_ibfk_1` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `directions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`id_invoice`) REFERENCES `invoice` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_ibfk_1` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `variables`
--
ALTER TABLE `variables`
  ADD CONSTRAINT `variables_ibfk_1` FOREIGN KEY (`user_created`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
