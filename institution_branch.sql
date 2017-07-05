-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2017 a las 18:44:07
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simed`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `medico_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`id`, `nombre`, `created_at`, `updated_at`, `medico_id`) VALUES
(1, 'Agenda de Dr. Mario Palacios', '2017-02-07 16:28:48', '2017-02-07 16:28:48', 2),
(2, 'Agenda de Dra. Maria Palacios', '2017-02-14 14:59:53', '2017-02-14 14:59:53', 3),
(3, 'Agenda de Dr. Francisco Silva', '2017-02-14 15:16:27', '2017-02-14 15:16:27', 4),
(4, 'Agenda de Dr. Julio Jaramillo', '2017-02-16 21:21:57', '2017-02-16 21:21:57', 5),
(5, 'Agenda de Dra. Juana Herrera', '2017-02-16 21:22:33', '2017-02-16 21:22:33', 6),
(6, 'Agenda de Dra. Leti Santos', '2017-02-16 21:23:06', '2017-02-16 21:23:06', 7),
(7, 'Agenda de Dra. Celia Camaño', '2017-02-17 17:12:24', '2017-02-17 17:12:24', 8),
(8, 'Agenda de Dra. Carla Borja', '2017-02-21 15:23:36', '2017-02-21 15:23:36', 9),
(9, 'Agenda de Dr. Pepe Proaño', '2017-02-21 15:24:06', '2017-02-21 15:24:06', 10),
(10, 'Agenda de Dra. LUCY PEREZ', '2017-03-15 22:14:48', '2017-03-15 22:14:48', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_calendario`
--

CREATE TABLE `cita_calendario` (
  `id` int(10) UNSIGNED NOT NULL,
  `detalle_cita` text CHARACTER SET utf8,
  `estado_cita` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `end` varchar(150) CHARACTER SET utf8 DEFAULT NULL,
  `title` text CHARACTER SET utf8,
  `color` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agenda_id` int(10) UNSIGNED DEFAULT NULL,
  `paciente_id` int(10) UNSIGNED DEFAULT NULL,
  `trash` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cita_calendario`
--

INSERT INTO `cita_calendario` (`id`, `detalle_cita`, `estado_cita`, `created_at`, `updated_at`, `start`, `end`, `title`, `color`, `agenda_id`, `paciente_id`, `trash`) VALUES
(8, 'OTRA COSA', 0, '2017-02-10 16:04:34', '2017-02-13 17:37:01', '2017-02-09T08:45:00-05:00', '2017-02-09T09:00:00-05:00', 'Dr. Mario Palacios,Pablo Chamba', NULL, 1, 2, NULL),
(9, 'NOTA CAMBIADA DE FECHA', 0, '2017-02-10 16:08:54', '2017-02-17 22:26:35', '2017-02-17T06:15:00-05:00', '2017-02-17T06:30:00-05:00', 'Dr. Mario Palacios,Leonardo Armijos', NULL, 1, 1, NULL),
(10, 'OBSERVACION', 0, '2017-02-10 16:14:56', '2017-02-10 20:02:32', '2017-02-10T07:15:00-05:00', '2017-02-10T08:30:00-05:00', 'Dr. Mario Palacios,Leonardo Armijos', NULL, 1, 1, NULL),
(12, 'cita lesnier', 0, '2017-02-13 15:41:57', '2017-02-13 15:41:57', '2017-02-13T07:00:00-05:00', '2017-02-13T07:30:00-05:00', 'Dr. Mario Palacios,Leonardo Armijos', NULL, 1, 1, NULL),
(13, 'ALGO MAS', 0, '2017-02-13 15:42:45', '2017-02-13 17:14:00', '2017-02-13T07:30:00-05:00', '2017-02-13T07:45:00-05:00', 'Dr. Mario Palacios,Pablo Chamba', NULL, 1, 2, NULL),
(14, 'Observaciones del call center', 0, '2017-02-14 15:42:59', '2017-02-14 22:41:05', '2017-02-14T09:00:00-05:00', '2017-02-14T10:00:00-05:00', 'Dr. Francisco Silva,Leonardo Armijos', NULL, 3, 1, NULL),
(15, 'cita normal', 0, '2017-02-20 18:22:53', '2017-02-23 16:20:14', '2017-02-23T07:00:00-05:00', '2017-02-23T07:15:00-05:00', 'Dra. Celia Camaño,Leonardo Armijos', NULL, 7, 1, NULL),
(16, 'CITA CON PABLO', 0, '2017-02-20 19:06:02', '2017-02-23 16:20:09', '2017-02-23T07:15:00-05:00', '2017-02-23T07:30:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(17, 'Hola', 0, '2017-02-20 22:10:18', '2017-02-23 16:19:43', '2017-02-23T07:30:00-05:00', '2017-02-23T08:00:00-05:00', 'Dra. Celia Camaño,Juan jou', NULL, 7, 3, NULL),
(18, 'lesnier', 0, '2017-02-20 22:10:54', '2017-02-23 22:36:30', '2017-02-23T08:00:00-05:00', '2017-02-23T08:15:00-05:00', 'Dra. Celia Camaño,Lesnier Gonzalez', NULL, 7, 4, NULL),
(21, 'otra cita', 0, '2017-02-21 16:10:57', '2017-02-23 16:18:01', '2017-02-23T08:30:00-05:00', '2017-02-23T08:45:00-05:00', 'Dra. Celia Camaño,Leonardo Armijos', NULL, 7, 1, NULL),
(22, 'SIGUIENTE CITA EN EL DIA', 0, '2017-02-21 17:47:54', '2017-02-23 22:44:39', '2017-02-23T08:45:00-05:00', '2017-02-23T09:45:00-05:00', 'Dra. Celia Camaño,Juan jou', NULL, 7, 3, NULL),
(23, 'asldfahs', 0, '2017-02-21 20:32:52', '2017-02-23 22:44:00', '2017-02-23T08:15:00-05:00', '2017-02-23T08:30:00-05:00', 'Dra. Celia Camaño,Lesnier Gonzalez', NULL, 7, 4, NULL),
(25, 'otro evento', 0, '2017-02-22 23:12:16', '2017-02-23 15:38:31', '2017-02-23T13:00:00-05:00', '2017-02-23T13:15:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(26, 'cita de urgencia', 0, '2017-02-23 17:06:39', '2017-02-23 22:45:45', '2017-02-23T09:45:00-05:00', '2017-02-23T10:15:00-05:00', 'Dra. Celia Camaño,Lesnier Gonzalez', NULL, 7, 4, NULL),
(27, NULL, 0, '2017-02-24 20:56:23', '2017-02-24 20:56:23', '2017-02-24T07:00:00-05:00', '2017-02-24T07:15:00-05:00', 'Dra. Celia Camaño,Juan jou', NULL, NULL, 3, NULL),
(28, 'Realizado por el usuario', 0, '2017-02-24 21:02:55', '2017-02-24 21:02:55', '2017-02-24T07:00:00-05:00', '2017-02-24T07:15:00-05:00', 'Dra. Celia Camaño,Juan jou', NULL, NULL, 3, NULL),
(29, 'Realizado por el usuario', 0, '2017-03-01 16:00:06', '2017-03-01 16:00:06', '2017-03-01T07:00:00-05:00', '2017-03-01T07:15:00-05:00', 'Dr. Julio Jaramillo,Juan jou', NULL, NULL, 3, NULL),
(37, 'Realizado por el usuario', 0, '2017-03-03 18:32:18', '2017-03-03 18:32:18', '2017-03-03T07:00:00-05:00', '2017-03-03T07:15:00-05:00', 'Dra. Celia Camaño,Juanco ', NULL, 7, 10, NULL),
(38, 'Realizado por el usuario', 0, '2017-03-03 18:49:35', '2017-03-03 18:49:35', '2017-03-03T07:15:00-05:00', '2017-03-03T07:30:00-05:00', 'Dra. Celia Camaño,Diana ', NULL, 7, 11, NULL),
(40, 'Realizado por el usuario', 0, '2017-03-06 19:53:20', '2017-03-06 19:55:44', '2017-03-06T07:00:00-05:00', '2017-03-06T07:15:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(41, 'Realizado por el usuario', 0, '2017-03-07 17:30:09', '2017-03-07 17:30:09', '2017-03-07T07:15:00-05:00', '2017-03-07T07:30:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(43, 'call center', 0, '2017-03-07 17:40:55', '2017-03-07 17:40:55', '2017-03-07T07:30:00-05:00', '2017-03-07T07:45:00-05:00', 'Dra. Celia Camaño,Leonardo Armijos', NULL, 7, 1, NULL),
(44, 'desde medico', 0, '2017-03-07 17:42:08', '2017-03-07 18:05:07', '2017-03-07T07:45:00-05:00', '2017-03-07T08:00:00-05:00', 'Dra. Celia Camaño,Leonardo Armijos', NULL, 7, 1, NULL),
(45, 'Realizado por el usuario', 0, '2017-03-07 17:48:46', '2017-03-07 17:48:46', '2017-03-07T07:00:00-05:00', '2017-03-07T07:15:00-05:00', 'Dr. Francisco Silva,Pablo Chamba', NULL, 3, 2, NULL),
(46, 'Realizado por el usuario', 0, '2017-03-07 17:49:11', '2017-03-07 17:49:11', '2017-03-08T08:00:00-05:00', '2017-03-08T08:15:00-05:00', 'Dr. Mario Palacios,Pablo Chamba', NULL, 1, 2, NULL),
(48, 'Realizado por el usuario', 0, '2017-03-07 19:49:39', '2017-03-07 19:49:39', '2017-03-07T08:15:00-05:00', '2017-03-07T08:30:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(54, 'cadsfasd', 1, '2017-03-09 15:35:16', '2017-03-10 21:51:57', '2017-03-09T07:00:00-05:00', '2017-03-09T08:15:00-05:00', 'Dra. Leti Santos,Leonardo Armijos', '#7f8c8d', 6, 1, NULL),
(55, 'call center', 1, '2017-03-09 18:05:58', '2017-03-09 23:15:17', '2017-03-06T07:30:00-05:00', '2017-03-06T08:00:00-05:00', 'Dr. Pepe Proaño,Leonardo Armijos', '#7f8c8d', 9, 1, NULL),
(56, 'Realizado por el usuario', 1, '2017-03-09 18:39:51', '2017-03-09 23:10:21', '2017-03-09T07:45:00-05:00', '2017-03-09T08:00:00-05:00', 'Dr. Pepe Proaño,Pablo Chamba', '#7f8c8d', 9, 2, 1),
(63, '452342314132', 1, '2017-03-09 23:11:47', '2017-03-09 23:13:37', '2017-03-09T07:00:00-05:00', '2017-03-09T07:15:00-05:00', 'Dr. Pepe Proaño,Leonardo Armijos', '#7f8c8d', 9, 1, 1),
(65, 'Realizado por el usuario', 1, '2017-03-10 17:10:20', '2017-03-10 17:11:25', '2017-03-10T07:00:00-05:00', '2017-03-10T07:15:00-05:00', 'Dra. Leti Santos,Pablo Chamba', NULL, 6, 2, 1),
(66, 'call center', 1, '2017-03-10 17:16:26', '2017-03-10 17:16:40', '2017-03-10T07:00:00-05:00', '2017-03-10T07:15:00-05:00', 'Dra. Leti Santos,Juanco ', NULL, 6, 10, 1),
(67, 'call center', 1, '2017-03-10 17:17:34', '2017-03-10 20:23:04', '2017-03-10T07:45:00-05:00', '2017-03-10T08:00:00-05:00', 'Dra. Leti Santos,Diana ', '#7f8c8d', 6, 11, NULL),
(68, 'fasdfasdasdaa adsfasd afa233423f adsfasdasd asfas', 1, '2017-03-10 17:20:13', '2017-03-10 20:22:45', '2017-03-10T07:15:00-05:00', '2017-03-10T07:30:00-05:00', 'Dra. Leti Santos,Lesnier Gonzalez', '#7f8c8d', 6, 4, 1),
(69, 'Realizado por el usuario', 1, '2017-03-10 17:21:42', '2017-03-10 20:22:38', '2017-03-06T07:45:00-05:00', '2017-03-06T08:00:00-05:00', 'Dra. Leti Santos,Pablo Chamba', '#7f8c8d', 6, 2, 1),
(70, 'call center', 1, '2017-03-10 20:23:32', '2017-03-10 21:53:30', '2017-03-11T08:45:00-05:00', '2017-03-11T10:00:00-05:00', 'Dra. Leti Santos,Pablo Chamba', '#7f8c8d', 6, 2, NULL),
(71, 'call center', 1, '2017-03-10 20:25:29', '2017-03-10 21:54:09', '2017-03-11T11:15:00-05:00', '2017-03-11T12:00:00-05:00', 'Dra. Leti Santos,Gabriel Vanegas', '#7f8c8d', 6, 12, NULL),
(72, 'casadsfasd', 1, '2017-03-10 20:30:12', '2017-03-10 21:47:29', '2017-03-10T19:45:00-05:00', '2017-03-10T20:00:00-05:00', 'Dra. Leti Santos,Leonardo Armijos', NULL, 6, 1, NULL),
(73, NULL, 1, '2017-03-10 21:49:29', '2017-03-10 21:52:50', '2017-03-10T00:00:00-05:00', '2017-03-10T00:00:00-05:00', 'Dra. Leti Santos,Leonardo Armijos', NULL, 6, 1, 1),
(74, 'asdfasd', 1, '2017-03-10 21:53:52', '2017-03-10 21:53:52', '2017-03-11T10:15:00-05:00', '2017-03-11T11:15:00-05:00', 'Dra. Leti Santos,Pablo Chamba', NULL, 6, 2, NULL),
(75, NULL, 1, '2017-03-10 22:01:49', '2017-03-10 22:03:14', '2017-03-06T07:00:00-05:00', '2017-03-06T07:45:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(76, 'asdfasd', 1, '2017-03-10 22:03:37', '2017-03-10 22:03:41', '2017-03-07T07:00:00-05:00', '2017-03-07T07:45:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(77, 'caasdfasd', 1, '2017-03-10 22:04:10', '2017-03-10 22:04:26', '2017-03-08T07:00:00-05:00', '2017-03-08T07:45:00-05:00', 'Dra. Celia Camaño,Juanco ', NULL, 7, 10, NULL),
(78, 'dafsdafads', 1, '2017-03-10 22:05:02', '2017-03-10 22:05:02', '2017-03-09T07:00:00-05:00', '2017-03-09T07:45:00-05:00', 'Dra. Celia Camaño,Juanco ', NULL, 7, 10, NULL),
(79, 'dfasdfasdfas', 1, '2017-03-10 22:05:30', '2017-03-10 22:22:20', '2017-03-10T07:00:00-05:00', '2017-03-10T07:45:00-05:00', 'Dra. Celia Camaño,Juanco ', NULL, 7, 10, NULL),
(80, 'dafadsf', 1, '2017-03-10 22:07:47', '2017-03-10 22:24:07', '2017-03-11T07:00:00-05:00', '2017-03-11T07:45:00-05:00', 'Dra. Celia Camaño,Juanco ', NULL, 7, 10, NULL),
(81, 'Realizado por el usuario', 1, '2017-03-10 22:26:17', '2017-03-10 22:27:58', '2017-03-11T07:45:00-05:00', '2017-03-11T09:15:00-05:00', 'Dra. Celia Camaño,Pablo Chamba', NULL, 7, 2, NULL),
(82, 'asdfasd', 1, '2017-03-10 23:00:58', '2017-03-10 23:03:21', '2017-03-11T19:45:00-05:00', '2017-03-11T20:00:00-05:00', 'Dr. Pepe Proaño,Leonardo Armijos', NULL, 9, 1, 1),
(83, 'fsdgf', 1, '2017-03-10 23:04:10', '2017-03-10 23:05:29', '2017-03-10T14:15:00-05:00', '2017-03-10T14:30:00-05:00', 'Dr. Pepe Proaño,Leonardo Armijos', '#7f8c8d', 9, 1, 1),
(84, 'call center', 1, '2017-03-13 23:06:47', '2017-03-13 23:06:47', '2017-03-13T07:00:00-05:00', '2017-03-13T07:15:00-05:00', 'Dr. Pepe Proaño,Leonardo Armijos', NULL, 9, 1, NULL),
(85, 'call center', 1, '2017-03-14 19:14:32', '2017-03-14 19:14:32', '2017-03-14T07:00:00-05:00', '2017-03-14T07:15:00-05:00', 'Dr. Pepe Proaño,Pablo Chamba', NULL, 9, 2, NULL),
(86, 'call center', 1, '2017-03-14 19:40:05', '2017-03-14 19:40:05', '2017-03-14T07:30:00-05:00', '2017-03-14T07:45:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(87, 'cafasdfasdfas', 1, '2017-03-14 20:53:26', '2017-03-14 22:04:12', '2017-03-14T08:45:00-05:00', '2017-03-14T09:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, 1),
(88, 'dsfasdfa', 1, '2017-03-14 20:55:49', '2017-03-14 22:04:29', '2017-03-14T10:00:00-05:00', '2017-03-14T10:15:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, 1),
(89, 'sdasdafsd', 1, '2017-03-14 20:57:57', '2017-03-14 23:18:08', '2017-03-14T11:15:00-05:00', '2017-03-14T11:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(90, 'afdssdfasd', 1, '2017-03-14 21:02:07', '2017-03-14 21:02:07', '2017-03-14T14:45:00-05:00', '2017-03-14T15:00:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(91, 'asdfasd', 1, '2017-03-14 21:15:55', '2017-03-14 21:15:55', '2017-03-14T19:00:00-05:00', '2017-03-14T19:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(92, 'dsfasdfas', 1, '2017-03-14 21:17:18', '2017-03-14 22:04:18', '2017-03-14T09:30:00-05:00', '2017-03-14T10:00:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, 1),
(93, 'asdfasdf', 1, '2017-03-14 21:27:55', '2017-03-14 21:27:55', '2017-03-14T07:45:00-05:00', '2017-03-14T08:00:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(94, 'asdfads', 1, '2017-03-14 21:41:49', '2017-03-14 21:41:49', '2017-03-14T18:30:00-05:00', '2017-03-14T18:45:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(95, 'asdfasdfa', 1, '2017-03-14 21:42:34', '2017-03-14 22:04:08', '2017-03-14T08:15:00-05:00', '2017-03-14T08:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, 1),
(96, 'dsafasdfas', 1, '2017-03-14 22:04:56', '2017-03-14 23:07:55', '2017-03-14T09:30:00-05:00', '2017-03-14T10:00:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, 1),
(97, 'asdfasd', 1, '2017-03-14 22:12:56', '2017-03-14 23:19:24', '2017-03-14T10:00:00-05:00', '2017-03-14T11:15:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, 1),
(98, 'asdfasd', 1, '2017-03-14 22:13:57', '2017-03-14 22:13:57', '2017-03-14T08:30:00-05:00', '2017-03-14T08:45:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(99, 'asdfasdfa', 1, '2017-03-14 22:14:51', '2017-03-14 22:14:51', '2017-03-14T09:00:00-05:00', '2017-03-14T09:15:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(100, 'asdfasdfasd', 1, '2017-03-14 22:17:27', '2017-03-14 22:17:27', '2017-03-14T11:30:00-05:00', '2017-03-14T11:45:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(101, 'asdfasdfads', 1, '2017-03-14 22:25:43', '2017-03-14 22:25:43', '2017-03-14T13:30:00-05:00', '2017-03-14T13:45:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(102, 'dfsgdfgsdfg', 1, '2017-03-14 22:30:16', '2017-03-14 22:30:16', '2017-03-14T14:00:00-05:00', '2017-03-14T14:15:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(103, 'sdafadsfas', 1, '2017-03-14 22:34:24', '2017-03-14 22:34:24', '2017-03-14T12:00:00-05:00', '2017-03-14T12:15:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(104, 'asdfasdfa', 1, '2017-03-14 22:57:46', '2017-03-14 22:57:46', '2017-03-14T08:00:00-05:00', '2017-03-14T08:15:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(105, 'asdfasdfas', 1, '2017-03-14 23:03:46', '2017-03-15 22:57:30', '2017-03-14T14:15:00-05:00', '2017-03-14T14:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(106, 'asdfasdf', 1, '2017-03-14 23:08:12', '2017-03-14 23:08:12', '2017-03-14T09:30:00-05:00', '2017-03-14T10:00:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(107, 'asdfasdfa', 1, '2017-03-14 23:10:54', '2017-03-14 23:10:54', '2017-03-14T14:15:00-05:00', '2017-03-14T14:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(108, 'asdfasdfasd', 1, '2017-03-14 23:12:08', '2017-03-14 23:12:08', '2017-03-14T15:00:00-05:00', '2017-03-14T15:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(109, 'adfasd', 1, '2017-03-14 23:13:57', '2017-03-14 23:13:57', '2017-03-14T12:15:00-05:00', '2017-03-14T12:30:00-05:00', 'Dr. Pepe Proaño,PABLO DAVID', NULL, 9, 18, NULL),
(110, 'Realizado por el usuario', 1, '2017-03-15 16:26:36', '2017-03-15 16:26:36', '2017-03-06T17:00:00-05:00', '2017-03-06T17:15:00-05:00', 'Dra. Maria Palacios,Pablo Chamba', NULL, 2, 2, NULL),
(111, 'call center', 1, '2017-03-16 17:08:50', '2017-03-16 17:08:50', '2017-03-16T07:00:00-05:00', '2017-03-16T07:15:00-05:00', 'Dr. Julio Jaramillo,PABLO DAVID', NULL, 4, 18, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permalink` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci,
  `responses` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `screetkey` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci,
  `email_attachments` text COLLATE utf8mb4_unicode_ci,
  `is_sent` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_email_queues`
--

INSERT INTO `cms_email_queues` (`id`, `created_at`, `updated_at`, `send_at`, `email_recipient`, `email_from_email`, `email_from_name`, `email_cc_email`, `email_subject`, `email_content`, `email_attachments`, `is_sent`) VALUES
(1, NULL, NULL, '2017-03-08 14:37:46', 'pdavid211@hotmail.com', 'pablodc002@gmail.com', 'Agenda Medica', 'pdavid211@hotmail.com', 'Cita agendada satisfactoriamente', 'La cita se ha agendado satisfactoriamente', 'a:0:{}', 0),
(2, NULL, NULL, '2017-03-08 14:37:46', 'pdavid211@hotmail.com', 'gnsist.sa@gmail.com', 'Agenda Medica', 'pdavid211@hotmail.com', 'Cita agendada satisfactoriamente', 'La cita se ha agendado satisfactoriamente', 'a:0:{}', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2017-02-07 15:43:10', NULL),
(2, 'Cita agendada satisfactoriamente', 'cita_agendada', 'Cita agendada satisfactoriamente', 'La cita se ha agendado satisfactoriamente', 'Cita agendada satisfactoriamente', 'Agenda Medica', 'gnsist.sa@gmail.com', 'pdavid211@hotmail.com', '2017-03-13 22:11:30', '2017-03-14 22:02:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `created_at`, `updated_at`, `ipaddress`, `useragent`, `url`, `description`, `id_cms_users`) VALUES
(1, '2017-02-07 15:43:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(2, '2017-02-07 15:43:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(3, '2017-02-07 15:44:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(4, '2017-02-07 15:48:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(5, '2017-02-07 15:49:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(6, '2017-02-07 15:50:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', ' cerrar sesión', NULL),
(7, '2017-02-07 15:51:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(8, '2017-02-07 15:52:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(9, '2017-02-07 15:52:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(10, '2017-02-07 15:52:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(11, '2017-02-07 16:00:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(12, '2017-02-07 16:05:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(13, '2017-02-07 16:08:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Fernanda Pérez at Users', 1),
(14, '2017-02-07 16:09:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(15, '2017-02-07 16:10:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Pacientes at Menu Management', 1),
(16, '2017-02-07 16:11:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Pacientes at Menu Management', 1),
(17, '2017-02-07 16:12:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Medicos at Menu Management', 1),
(18, '2017-02-07 16:12:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/2', 'Actualizar datos Medicos at Menu Management', 1),
(19, '2017-02-07 16:13:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 1 at Médico', 2),
(20, '2017-02-07 16:16:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Medicos at Menu Management', 1),
(21, '2017-02-07 16:16:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/delete/1', 'Eliminar datos 1 at Médico', 1),
(22, '2017-02-07 16:18:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(23, '2017-02-07 16:26:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(24, '2017-02-07 16:28:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 2 at Médico', 2),
(25, '2017-02-07 16:29:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/delete/1', 'Eliminar datos 1 at Médico', 1),
(26, '2017-02-07 16:29:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/delete/2', 'Eliminar datos 2 at Médico', 1),
(27, '2017-02-07 16:29:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/delete/2', 'Eliminar datos 2 at Médico', 1),
(28, '2017-02-07 16:29:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/delete/2', 'Eliminar datos 2 at Médico', 1),
(29, '2017-02-07 16:34:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(30, '2017-02-07 16:35:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(31, '2017-02-07 16:37:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(32, '2017-02-07 16:37:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(33, '2017-02-07 16:39:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(34, '2017-02-07 16:39:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(35, '2017-02-07 16:48:39', NULL, '192.168.0.24', 'Mozilla/5.0 (iPhone; CPU iPhone OS 8_1_2 like Mac OS X) AppleWebKit/537.51.2 (KHTML, like Gecko) Version/7.0 Mobile/11D257 Safari/9537.53', 'http://192.168.0.4/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP 192.168.0.24', 2),
(36, '2017-02-07 16:51:21', NULL, '192.168.0.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.0.4/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP 192.168.0.6', 2),
(37, '2017-02-07 17:06:14', NULL, '192.168.0.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.0.4/MedicSystem/public/admin/paciente/add-save', 'Agregar nuevos datos 1 at Pacientes', 2),
(38, '2017-02-07 17:44:49', NULL, '192.168.0.27', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-J710MN Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.91 Mobile Safari/537.36', 'http://192.168.0.4/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP 192.168.0.27', 2),
(39, '2017-02-07 18:23:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(40, '2017-02-07 20:26:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(41, '2017-02-07 22:13:44', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add-save', 'Agregar nuevos datos 2 at Pacientes', 2),
(42, '2017-02-08 14:40:59', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(43, '2017-02-09 15:10:46', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', ' cerrar sesión', NULL),
(44, '2017-02-09 15:10:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(45, '2017-02-09 15:11:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(46, '2017-02-09 15:11:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(47, '2017-02-10 14:45:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(48, '2017-02-10 14:57:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(49, '2017-02-10 16:16:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(50, '2017-02-10 17:21:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/2', 'Actualizar datos Lista de médicos at Menu Management', 1),
(51, '2017-02-10 17:23:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Lista de pacientes at Menu Management', 1),
(52, '2017-02-10 22:10:52', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add-save', 'Agregar nuevos datos 3 at Lista de pacientes', 2),
(53, '2017-02-13 14:33:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(54, '2017-02-13 14:36:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(55, '2017-02-13 14:36:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(56, '2017-02-13 15:35:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add-save', 'Agregar nuevos datos 4 at Lista de pacientes', 2),
(57, '2017-02-13 17:17:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(58, '2017-02-13 22:28:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(59, '2017-02-14 14:59:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(60, '2017-02-14 14:59:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 3 at Lista de médicos', 2),
(61, '2017-02-14 15:05:50', NULL, '192.168.0.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.0.4/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP 192.168.0.6', 2),
(62, '2017-02-14 15:16:28', NULL, '192.168.0.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.0.4/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 4 at Lista de médicos', 2),
(63, '2017-02-14 17:23:28', NULL, '192.168.0.6', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.0.4/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(64, '2017-02-14 17:32:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(65, '2017-02-14 17:32:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(66, '2017-02-15 14:40:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(67, '2017-02-15 14:44:38', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Pablo at Users', 1),
(68, '2017-02-15 14:45:52', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(69, '2017-02-15 15:25:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/statistic_builder/add-save', 'Agregar nuevos datos Citas realizadas at Statistic Builder', 1),
(70, '2017-02-15 15:33:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(71, '2017-02-15 15:36:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Citas realizadas at Menu Management', 1),
(72, '2017-02-15 15:37:40', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/4', 'Actualizar datos Area de Cliente at Menu Management', 1),
(73, '2017-02-15 15:38:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/statistic_builder/edit-save/1', 'Actualizar datos Área de Cliente at Statistic Builder', 1),
(74, '2017-02-15 15:41:01', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/statistic_builder/add-save', 'Agregar nuevos datos Citas pendientes at Statistic Builder', 1),
(75, '2017-02-15 15:41:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/statistic_builder/delete/2', 'Eliminar datos Citas pendientes at Statistic Builder', 1),
(76, '2017-02-15 15:51:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/statistic_builder', 'Intente ver los datos :name at Statistic Builder', 3),
(77, '2017-02-15 21:09:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/statistic_builder/edit-save/1', 'Actualizar datos Panel de paciente at Statistic Builder', 1),
(78, '2017-02-15 21:23:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/4', 'Actualizar datos Area de Cliente at Menu Management', 1),
(79, '2017-02-15 21:24:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/4', 'Actualizar datos Area de Cliente at Menu Management', 1),
(80, '2017-02-15 21:25:01', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(81, '2017-02-15 21:25:01', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(82, '2017-02-15 21:25:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(83, '2017-02-15 21:25:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(84, '2017-02-15 21:25:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(85, '2017-02-15 21:25:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(86, '2017-02-15 21:25:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(87, '2017-02-15 21:25:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(88, '2017-02-15 21:25:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(89, '2017-02-15 21:25:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(90, '2017-02-15 21:25:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(91, '2017-02-15 21:25:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(92, '2017-02-15 21:25:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(93, '2017-02-15 21:25:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(94, '2017-02-15 21:25:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(95, '2017-02-15 21:25:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(96, '2017-02-15 21:25:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(97, '2017-02-15 21:25:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(98, '2017-02-15 21:25:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(99, '2017-02-15 21:25:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(100, '2017-02-15 21:25:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(101, '2017-02-15 21:25:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(102, '2017-02-15 21:25:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(103, '2017-02-15 21:25:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(104, '2017-02-15 21:25:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(105, '2017-02-15 21:25:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(106, '2017-02-15 21:25:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(107, '2017-02-15 21:25:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(108, '2017-02-15 21:25:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(109, '2017-02-15 21:25:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(110, '2017-02-15 21:25:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(111, '2017-02-15 21:25:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(112, '2017-02-16 16:16:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(113, '2017-02-16 16:21:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(114, '2017-02-16 16:22:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Lista de pacientes at Menu Management', 1),
(115, '2017-02-16 16:25:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Lista de pacientes at Menu Management', 1),
(116, '2017-02-16 16:25:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Lista de pacientes at Menu Management', 1),
(117, '2017-02-16 16:26:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Lista de pacientes at Menu Management', 1),
(118, '2017-02-16 16:26:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Lista de pacientes at Menu Management', 1),
(119, '2017-02-16 16:27:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/1', 'Actualizar datos Lista de pacientes at Menu Management', 1),
(120, '2017-02-16 16:32:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(121, '2017-02-16 16:32:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(122, '2017-02-16 16:32:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(123, '2017-02-16 16:32:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(124, '2017-02-16 16:32:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(125, '2017-02-16 16:32:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(126, '2017-02-16 16:32:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(127, '2017-02-16 16:32:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(128, '2017-02-16 16:32:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(129, '2017-02-16 16:32:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(130, '2017-02-16 16:32:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(131, '2017-02-16 16:32:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(132, '2017-02-16 16:32:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(133, '2017-02-16 16:32:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(134, '2017-02-16 16:32:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(135, '2017-02-16 16:32:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(136, '2017-02-16 16:32:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(137, '2017-02-16 16:32:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(138, '2017-02-16 16:32:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(139, '2017-02-16 16:32:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(140, '2017-02-16 16:32:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(141, '2017-02-16 16:32:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(142, '2017-02-16 16:32:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(143, '2017-02-16 16:32:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(144, '2017-02-16 16:32:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(145, '2017-02-16 16:32:44', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(146, '2017-02-16 16:32:44', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(147, '2017-02-16 16:32:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(148, '2017-02-16 16:32:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(149, '2017-02-16 16:32:46', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(150, '2017-02-16 16:32:46', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(151, '2017-02-16 16:33:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(152, '2017-02-16 16:33:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(153, '2017-02-16 16:33:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(154, '2017-02-16 16:33:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(155, '2017-02-16 16:33:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(156, '2017-02-16 16:33:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(157, '2017-02-16 16:33:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(158, '2017-02-16 16:33:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(159, '2017-02-16 16:33:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(160, '2017-02-16 16:33:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(161, '2017-02-16 16:33:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(162, '2017-02-16 16:33:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(163, '2017-02-16 16:33:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(164, '2017-02-16 16:33:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(165, '2017-02-16 16:33:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(166, '2017-02-16 16:33:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(167, '2017-02-16 16:33:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(168, '2017-02-16 16:33:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(169, '2017-02-16 16:33:15', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(170, '2017-02-16 16:33:15', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(171, '2017-02-16 16:33:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(172, '2017-02-16 16:33:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(173, '2017-02-16 16:33:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(174, '2017-02-16 16:33:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(175, '2017-02-16 16:33:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(176, '2017-02-16 16:33:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(177, '2017-02-16 16:33:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(178, '2017-02-16 16:33:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(179, '2017-02-16 16:33:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(180, '2017-02-16 16:33:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(181, '2017-02-16 16:33:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(182, '2017-02-16 16:33:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(183, '2017-02-16 16:33:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(184, '2017-02-16 16:33:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3);
INSERT INTO `cms_logs` (`id`, `created_at`, `updated_at`, `ipaddress`, `useragent`, `url`, `description`, `id_cms_users`) VALUES
(185, '2017-02-16 16:33:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(186, '2017-02-16 16:33:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(187, '2017-02-16 16:33:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(188, '2017-02-16 16:33:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(189, '2017-02-16 16:33:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(190, '2017-02-16 16:33:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(191, '2017-02-16 16:33:34', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(192, '2017-02-16 16:34:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(193, '2017-02-16 16:34:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(194, '2017-02-16 16:34:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(195, '2017-02-16 16:34:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(196, '2017-02-16 16:34:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente', 'Intente ver los datos :name at Lista de pacientes', 3),
(197, '2017-02-16 16:34:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/4', 'Actualizar datos Area de Cliente at Menu Management', 1),
(198, '2017-02-16 21:21:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 5 at Lista de médicos', 1),
(199, '2017-02-16 21:22:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 6 at Lista de médicos', 1),
(200, '2017-02-16 21:23:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 7 at Lista de médicos', 1),
(201, '2017-02-17 14:45:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(202, '2017-02-17 16:33:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(203, '2017-02-17 17:11:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(204, '2017-02-17 17:11:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(205, '2017-02-17 17:11:51', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(206, '2017-02-17 17:12:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 8 at Lista de médicos', 1),
(207, '2017-02-17 17:15:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(208, '2017-02-17 18:48:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(209, '2017-02-17 18:48:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(210, '2017-02-20 14:45:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(211, '2017-02-20 14:50:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(212, '2017-02-20 16:07:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(213, '2017-02-20 16:07:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(214, '2017-02-21 14:21:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(215, '2017-02-21 14:22:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(216, '2017-02-21 15:23:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 9 at Lista de médicos', 2),
(217, '2017-02-21 15:24:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 10 at Lista de médicos', 2),
(218, '2017-02-21 16:18:25', NULL, '192.168.100.4', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.100.6/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP 192.168.100.4', 3),
(219, '2017-02-21 16:59:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(220, '2017-02-21 16:59:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(221, '2017-02-21 17:00:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Historial de citas at Menu Management', 1),
(222, '2017-02-21 17:01:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/5', 'Actualizar datos Historial de citas at Menu Management', 1),
(223, '2017-02-21 17:27:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(224, '2017-02-21 17:27:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(225, '2017-02-21 21:51:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(226, '2017-02-21 21:52:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(227, '2017-02-22 14:51:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(228, '2017-02-22 14:51:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(229, '2017-02-22 14:51:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(230, '2017-02-22 15:36:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(231, '2017-02-22 15:36:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(232, '2017-02-22 15:37:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(233, '2017-02-22 15:37:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 3),
(234, '2017-02-22 15:37:34', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(235, '2017-02-22 16:14:52', NULL, '192.168.100.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.100.7/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP 192.168.100.14', 3),
(236, '2017-02-22 17:58:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(237, '2017-02-22 22:19:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(238, '2017-02-23 14:38:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(239, '2017-02-23 14:51:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(240, '2017-02-23 15:19:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico', 'Intente ver los datos :name at Lista de médicos', 3),
(241, '2017-02-23 15:28:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(242, '2017-02-23 15:30:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(243, '2017-02-23 17:02:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(244, '2017-02-23 17:03:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(245, '2017-02-23 17:03:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(246, '2017-02-23 17:03:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(247, '2017-02-23 17:09:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(248, '2017-02-23 17:09:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(249, '2017-02-23 17:55:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(250, '2017-02-23 17:55:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(251, '2017-02-23 18:38:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(252, '2017-02-23 18:43:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(253, '2017-02-23 18:44:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(254, '2017-02-23 18:46:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 3),
(255, '2017-02-23 18:46:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(256, '2017-02-23 18:52:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(257, '2017-02-23 18:52:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(258, '2017-02-23 21:18:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(259, '2017-02-23 22:34:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(260, '2017-02-23 22:34:35', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(261, '2017-02-23 22:34:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(262, '2017-02-24 14:55:38', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(263, '2017-02-24 14:55:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(264, '2017-02-24 15:28:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(265, '2017-02-24 21:03:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(266, '2017-02-24 21:07:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(267, '2017-02-24 21:32:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(268, '2017-02-24 21:36:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(269, '2017-02-24 21:44:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(270, '2017-02-24 22:15:51', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(271, '2017-02-24 22:15:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(272, '2017-02-24 22:22:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(273, '2017-02-24 22:23:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(274, '2017-02-24 22:56:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(275, '2017-02-24 22:57:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(276, '2017-02-24 22:57:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', ' cerrar sesión', NULL),
(277, '2017-02-25 14:22:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(278, '2017-02-25 14:23:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 3),
(279, '2017-02-25 17:03:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(280, '2017-02-25 17:04:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(281, '2017-03-01 15:52:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(282, '2017-03-01 15:54:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(283, '2017-03-01 15:57:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(284, '2017-03-01 15:57:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(285, '2017-03-01 15:58:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(286, '2017-03-03 17:35:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'juan@correo.com Inicia sesión con la dirección IP ::1', 11),
(287, '2017-03-03 18:00:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(288, '2017-03-03 18:39:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(289, '2017-03-03 18:39:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(290, '2017-03-03 18:44:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(291, '2017-03-03 18:44:15', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(292, '2017-03-03 18:46:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'juan@correo.com cerrar sesión', 11),
(293, '2017-03-03 18:48:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'diana@gmail.com Inicia sesión con la dirección IP ::1', 12),
(294, '2017-03-03 18:54:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(295, '2017-03-03 18:54:35', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(296, '2017-03-03 18:55:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'diana@gmail.com cerrar sesión', 12),
(297, '2017-03-03 18:56:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Javier at Users', 1),
(298, '2017-03-03 18:57:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'javier@correo.com Inicia sesión con la dirección IP ::1', 13),
(299, '2017-03-03 18:58:59', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Medicos at Menu Management', 1),
(300, '2017-03-03 18:59:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Listado médicos at Menu Management', 1),
(301, '2017-03-03 18:59:59', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Agregar médico at Menu Management', 1),
(302, '2017-03-03 19:01:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Pacientes at Menu Management', 1),
(303, '2017-03-03 19:01:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Agregar paciente at Menu Management', 1),
(304, '2017-03-03 19:02:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Listado pacientes at Menu Management', 1),
(305, '2017-03-03 19:03:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Usuarios at Menu Management', 1),
(306, '2017-03-03 19:04:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Listado usuarios at Menu Management', 1),
(307, '2017-03-03 19:47:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/13', 'Actualizar datos Listado usuarios at Menu Management', 1),
(308, '2017-03-03 19:49:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/13', 'Actualizar datos Listado usuarios at Menu Management', 1),
(309, '2017-03-03 19:50:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Agregar usuario at Menu Management', 1),
(310, '2017-03-03 19:52:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'javier@correo.com cerrar sesión', 13),
(311, '2017-03-03 19:53:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'javier@correo.com Inicia sesión con la dirección IP ::1', 13),
(312, '2017-03-03 19:54:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/11', 'Actualizar datos Listado pacientes at Menu Management', 1),
(313, '2017-03-03 19:55:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/8', 'Actualizar datos Agregar médico at Menu Management', 1),
(314, '2017-03-03 19:55:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/7', 'Actualizar datos Listado médicos at Menu Management', 1),
(315, '2017-03-03 19:55:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/10', 'Actualizar datos Agregar paciente at Menu Management', 1),
(316, '2017-03-03 19:55:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/11', 'Actualizar datos Listado pacientes at Menu Management', 1),
(317, '2017-03-03 20:36:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'javier@correo.com cerrar sesión', 13),
(318, '2017-03-03 20:42:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'javier@correo.com Inicia sesión con la dirección IP ::1', 13),
(319, '2017-03-03 22:08:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Leti Santos at Users', 13),
(320, '2017-03-03 22:09:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Leti Santos at Users', 13),
(321, '2017-03-03 22:09:52', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Leti Santos at Users', 13),
(322, '2017-03-03 22:09:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Leti Santos at Users', 13),
(323, '2017-03-03 22:10:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Leti Santos at Users', 13),
(324, '2017-03-03 22:10:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Leti Santos at Users', 13),
(325, '2017-03-03 22:11:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Juana Herrera at Users', 13),
(326, '2017-03-03 22:11:34', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Juana Herrera at Users', 13),
(327, '2017-03-03 22:12:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Leti Santos at Users', 13),
(328, '2017-03-03 22:12:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Leti Santos at Users', 13),
(329, '2017-03-03 22:14:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Juana Herrera at Users', 13),
(330, '2017-03-03 22:18:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Juana Herrera at Users', 13),
(331, '2017-03-03 22:21:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Francisco Silva at Users', 13),
(332, '2017-03-03 22:21:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Francisco Silva at Users', 13),
(333, '2017-03-03 22:22:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Julio Jaramillo at Users', 13),
(334, '2017-03-03 22:23:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Julio Jaramillo at Users', 13),
(335, '2017-03-03 22:29:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Francisco Silva at Users', 13),
(336, '2017-03-03 22:30:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Francisco Silva at Users', 13),
(337, '2017-03-03 22:31:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Francisco Silva at Users', 13),
(338, '2017-03-03 22:32:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Francisco Silva at Users', 13),
(339, '2017-03-03 22:34:35', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Juana Herrera at Users', 13),
(340, '2017-03-03 22:53:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Maria Palacios at Users', 13),
(341, '2017-03-03 22:55:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Maria Palacios at Users', 13),
(342, '2017-03-03 22:55:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Maria Palacios at Users', 13),
(343, '2017-03-06 15:13:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(344, '2017-03-06 15:43:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/action-selected', 'Eliminar datos 16,15,14 at Users', 1),
(345, '2017-03-06 15:49:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Mario Palacios at Users', 1),
(346, '2017-03-06 15:51:52', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Mario Palacios at Users', 1),
(347, '2017-03-06 15:52:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Mario Palacios at Users', 1),
(348, '2017-03-06 15:53:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Mario Palacios at Users', 1),
(349, '2017-03-06 15:54:01', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Mario Palacios at Users', 1),
(350, '2017-03-06 15:55:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Mario Palacios at Users', 1),
(351, '2017-03-06 15:57:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Mario Palacios at Users', 1),
(352, '2017-03-06 15:57:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Mario Palacios at Users', 1),
(353, '2017-03-06 15:58:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Mario Palacios at Users', 1),
(354, '2017-03-06 16:07:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Francisco Silva at Users', 1),
(355, '2017-03-06 16:07:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'franc@correo.com Inicia sesión con la dirección IP ::1', 14),
(356, '2017-03-06 16:08:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico', 'Intente ver los datos :name at Lista de médicos', 14),
(357, '2017-03-06 16:14:01', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(358, '2017-03-06 16:14:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(359, '2017-03-06 16:15:38', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(360, '2017-03-06 16:15:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(361, '2017-03-06 16:40:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Agendar Cita at Menu Management', 1),
(362, '2017-03-06 16:51:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/15', 'Actualizar datos Agendar Cita at Menu Management', 1),
(363, '2017-03-06 16:52:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/15', 'Actualizar datos Agendar Cita at Menu Management', 1),
(364, '2017-03-06 16:54:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'franc@correo.com cerrar sesión', 14),
(365, '2017-03-06 16:56:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(366, '2017-03-06 16:57:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Celia Camaño at Users', 1),
(367, '2017-03-06 16:59:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(368, '2017-03-06 17:00:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Celia Camaño at Users', 1),
(369, '2017-03-06 17:01:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Celia Camaño at Users', 1);
INSERT INTO `cms_logs` (`id`, `created_at`, `updated_at`, `ipaddress`, `useragent`, `url`, `description`, `id_cms_users`) VALUES
(370, '2017-03-06 17:05:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Celia Camaño at Users', 1),
(371, '2017-03-06 17:06:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Celia Camaño at Users', 1),
(372, '2017-03-06 17:06:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Celia Camaño at Users', 1),
(373, '2017-03-06 17:10:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/15', 'Eliminar datos Celia Camaño at Users', 1),
(374, '2017-03-06 17:14:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Francisco Silva at Users', 1),
(375, '2017-03-06 17:15:46', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(376, '2017-03-06 17:16:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(377, '2017-03-06 17:17:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(378, '2017-03-06 17:18:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(379, '2017-03-06 17:19:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(380, '2017-03-06 17:20:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(381, '2017-03-06 17:21:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(382, '2017-03-06 17:23:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(383, '2017-03-06 17:24:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(384, '2017-03-06 17:25:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(385, '2017-03-06 17:25:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(386, '2017-03-06 17:26:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(387, '2017-03-06 17:26:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos  at Users', 1),
(388, '2017-03-06 17:30:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(389, '2017-03-06 17:30:35', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(390, '2017-03-06 17:31:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(391, '2017-03-06 17:32:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(392, '2017-03-06 17:32:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(393, '2017-03-06 17:34:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(394, '2017-03-06 17:35:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(395, '2017-03-06 17:35:59', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(396, '2017-03-06 17:36:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(397, '2017-03-06 17:37:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(398, '2017-03-06 17:39:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(399, '2017-03-06 17:40:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(400, '2017-03-06 17:40:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(401, '2017-03-06 17:41:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(402, '2017-03-06 17:41:44', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(403, '2017-03-06 17:50:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(404, '2017-03-06 17:53:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(405, '2017-03-06 17:54:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(406, '2017-03-06 17:55:17', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/14', 'Eliminar datos Celia Camaño at Users', 1),
(407, '2017-03-06 17:56:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Celia Camaño at Users', 1),
(408, '2017-03-06 17:57:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(409, '2017-03-06 17:57:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', ' cerrar sesión', NULL),
(410, '2017-03-06 17:57:42', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(411, '2017-03-06 17:58:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'celia@correo.com cerrar sesión', 14),
(412, '2017-03-06 17:58:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(413, '2017-03-06 18:00:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 3),
(414, '2017-03-06 19:06:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(415, '2017-03-06 19:08:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico', 'Intente ver los datos :name at Lista de médicos', 14),
(416, '2017-03-06 19:11:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 3),
(417, '2017-03-06 19:11:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 3),
(418, '2017-03-06 19:12:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(419, '2017-03-06 19:31:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/3', 'Eliminar datos Pablo at Users', 1),
(420, '2017-03-06 19:32:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/3', 'Eliminar datos Pablo at Users', 1),
(421, '2017-03-06 19:32:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/3', 'Eliminar datos Pablo at Users', 1),
(422, '2017-03-06 19:42:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(423, '2017-03-06 19:52:51', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(424, '2017-03-06 19:57:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:51.0) Gecko/20100101 Firefox/51.0', 'http://localhost/MedicSystem/public/admin/logout', ' cerrar sesión', NULL),
(425, '2017-03-06 20:02:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add', 'Intente agregar datos en Lista de pacientes', 14),
(426, '2017-03-06 20:02:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add', 'Intente agregar datos en Lista de pacientes', 14),
(427, '2017-03-06 21:53:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(428, '2017-03-06 21:54:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(429, '2017-03-06 21:55:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(430, '2017-03-06 21:57:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(431, '2017-03-07 14:41:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(432, '2017-03-07 17:29:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(433, '2017-03-07 17:31:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(434, '2017-03-07 17:31:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(435, '2017-03-07 17:32:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(436, '2017-03-07 17:36:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(437, '2017-03-07 17:37:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(438, '2017-03-07 17:37:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(439, '2017-03-07 17:37:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico', 'Intente ver los datos :name at Lista de médicos', 14),
(440, '2017-03-07 17:48:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'celia@correo.com cerrar sesión', 14),
(441, '2017-03-07 17:48:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(442, '2017-03-07 17:49:46', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(443, '2017-03-07 17:49:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(444, '2017-03-07 18:00:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add', 'Intente agregar datos en Lista de pacientes', 14),
(445, '2017-03-07 18:04:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(446, '2017-03-07 18:07:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add', 'Intente agregar datos en Lista de pacientes', 14),
(447, '2017-03-07 18:07:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(448, '2017-03-07 18:48:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'javier@correo.com Inicia sesión con la dirección IP ::1', 13),
(449, '2017-03-07 18:49:34', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'javier@correo.com cerrar sesión', 13),
(450, '2017-03-07 18:53:15', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(451, '2017-03-07 18:53:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(452, '2017-03-07 18:59:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(453, '2017-03-07 19:12:18', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(454, '2017-03-07 19:12:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(455, '2017-03-07 19:15:16', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP 192.168.4.106', 2),
(456, '2017-03-07 19:22:31', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/paciente/add-save', 'Agregar nuevos datos 12 at Lista de pacientes', 2),
(457, '2017-03-07 19:27:41', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/medico/edit-save/10', 'Actualizar datos  at Lista de médicos', 2),
(458, '2017-03-07 19:27:55', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/medico/edit-save/10', 'Actualizar datos  at Lista de médicos', 2),
(459, '2017-03-07 19:28:07', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(460, '2017-03-07 19:31:20', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP 192.168.4.106', 19),
(461, '2017-03-07 19:50:41', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(462, '2017-03-07 19:55:13', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/login', 'javier@correo.com Inicia sesión con la dirección IP 192.168.4.106', 13),
(463, '2017-03-07 20:39:02', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/logout', 'javier@correo.com cerrar sesión', 13),
(464, '2017-03-07 20:40:00', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP 192.168.4.106', 14),
(465, '2017-03-07 20:41:59', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/medico', 'Intente ver los datos :name at Lista de médicos', 14),
(466, '2017-03-07 20:47:39', NULL, '192.168.4.106', 'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'http://192.168.4.101/MedicSystem/public/admin/logout', 'celia@correo.com cerrar sesión', 14),
(467, '2017-03-07 21:20:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(468, '2017-03-07 22:18:40', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(469, '2017-03-07 22:18:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(470, '2017-03-08 14:53:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(471, '2017-03-08 14:59:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(472, '2017-03-08 15:04:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(473, '2017-03-08 15:31:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/20', 'Eliminar datos Pablo at Users', 1),
(474, '2017-03-08 15:34:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/20', 'Eliminar datos Pablo at Users', 1),
(475, '2017-03-08 15:36:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/20', 'Eliminar datos Pablo at Users', 1),
(476, '2017-03-08 15:38:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/19', 'Eliminar datos Pablo David at Users', 1),
(477, '2017-03-08 15:48:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/21', 'Eliminar datos Pablo at Users', 1),
(478, '2017-03-08 15:49:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/21', 'Eliminar datos Pablo at Users', 1),
(479, '2017-03-08 15:50:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/21', 'Eliminar datos Pablo at Users', 1),
(480, '2017-03-08 15:51:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/21', 'Eliminar datos Pablo at Users', 1),
(481, '2017-03-08 19:19:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/58', 'Eliminar datos adsafsd at Users', 1),
(482, '2017-03-08 19:19:44', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/57', 'Eliminar datos asdfasd at Users', 1),
(483, '2017-03-08 19:19:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/54', 'Eliminar datos pablo at Users', 1),
(484, '2017-03-08 19:19:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/43', 'Eliminar datos afsdfa at Users', 1),
(485, '2017-03-08 19:29:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/60', 'Eliminar datos juan at Users', 1),
(486, '2017-03-08 19:38:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.coma Inicia sesión con la dirección IP ::1', 65),
(487, '2017-03-08 20:14:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.coma cerrar sesión', 65),
(488, '2017-03-08 20:20:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/71', 'Eliminar datos Gabriel at Users', 1),
(489, '2017-03-08 20:23:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/delete/65', 'Eliminar datos PABLO at Users', 1),
(490, '2017-03-08 20:23:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(491, '2017-03-08 21:14:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(492, '2017-03-08 21:16:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(493, '2017-03-08 22:49:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(494, '2017-03-08 22:55:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(495, '2017-03-09 14:40:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(496, '2017-03-09 14:40:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(497, '2017-03-09 16:26:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(498, '2017-03-09 16:26:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(499, '2017-03-09 16:27:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(500, '2017-03-09 16:33:15', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(501, '2017-03-09 16:42:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(502, '2017-03-09 16:42:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(503, '2017-03-09 16:43:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(504, '2017-03-09 17:13:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(505, '2017-03-09 17:22:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(506, '2017-03-09 17:32:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(507, '2017-03-09 18:01:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(508, '2017-03-09 18:05:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(509, '2017-03-09 18:29:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(510, '2017-03-09 18:30:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(511, '2017-03-09 20:50:33', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(512, '2017-03-09 20:51:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(513, '2017-03-10 15:04:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(514, '2017-03-10 15:19:08', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(515, '2017-03-10 15:55:28', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(516, '2017-03-10 15:55:35', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(517, '2017-03-10 16:01:00', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(518, '2017-03-10 16:01:29', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(519, '2017-03-10 16:02:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(520, '2017-03-10 16:03:19', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(521, '2017-03-10 22:31:40', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(522, '2017-03-10 22:31:44', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(523, '2017-03-10 22:34:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/5', 'Actualizar datos Historial de citas at Menu Management', 1),
(524, '2017-03-10 22:35:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/cita_calendario', 'Intente ver los datos :name at Historial citas', 19),
(525, '2017-03-10 22:35:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/cita_calendario', 'Intente ver los datos :name at Historial citas', 19),
(526, '2017-03-10 22:35:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/cita_calendario', 'Intente ver los datos :name at Historial citas', 19),
(527, '2017-03-10 22:36:52', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(528, '2017-03-10 22:37:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(529, '2017-03-10 22:39:45', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(530, '2017-03-10 22:39:53', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(531, '2017-03-10 22:43:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/5', 'Actualizar datos Historial de citas at Menu Management', 1),
(532, '2017-03-10 22:43:27', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(533, '2017-03-10 22:43:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(534, '2017-03-10 22:47:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/5', 'Actualizar datos Historial de citas at Menu Management', 1),
(535, '2017-03-10 22:58:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(536, '2017-03-10 22:58:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(537, '2017-03-13 15:39:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(538, '2017-03-13 15:46:06', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(539, '2017-03-13 22:11:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/email_templates/add-save', 'Agregar nuevos datos Cita agendada satisfactoriamente at Email Template', 1),
(540, '2017-03-13 22:25:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(541, '2017-03-13 22:26:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(542, '2017-03-13 22:34:14', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(543, '2017-03-13 22:34:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(544, '2017-03-13 22:40:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(545, '2017-03-13 22:40:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(546, '2017-03-14 15:41:55', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP ::1', 19),
(547, '2017-03-14 16:28:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(548, '2017-03-14 19:07:15', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/edit-save/18', 'Actualizar datos  at Lista de pacientes', 2),
(549, '2017-03-14 19:13:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/edit-save/2', 'Actualizar datos  at Lista de pacientes', 2),
(550, '2017-03-14 20:48:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(551, '2017-03-14 20:48:07', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(552, '2017-03-14 22:02:58', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/email_templates/edit-save/2', 'Actualizar datos Cita agendada satisfactoriamente at Email Template', 1),
(553, '2017-03-15 16:25:40', NULL, '192.168.0.104', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.0.103/MedicSystem/public/admin/login', 'pablo@correo.com Inicia sesión con la dirección IP 192.168.0.104', 19),
(554, '2017-03-15 16:27:04', NULL, '192.168.0.104', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://192.168.0.103/MedicSystem/public/admin/logout', 'pablo@correo.com cerrar sesión', 19),
(555, '2017-03-15 17:04:03', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(556, '2017-03-15 17:26:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(557, '2017-03-15 17:26:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(558, '2017-03-15 18:50:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(559, '2017-03-15 18:51:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1);
INSERT INTO `cms_logs` (`id`, `created_at`, `updated_at`, `ipaddress`, `useragent`, `url`, `description`, `id_cms_users`) VALUES
(560, '2017-03-15 18:57:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Instituciones at Menu Management', 1),
(561, '2017-03-15 18:58:23', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Agregar institución at Menu Management', 1),
(562, '2017-03-15 18:58:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Listado instituciones at Menu Management', 1),
(563, '2017-03-15 18:59:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(564, '2017-03-15 18:59:39', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'javier@correo.com Inicia sesión con la dirección IP ::1', 13),
(565, '2017-03-15 19:00:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(566, '2017-03-15 19:11:20', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/institucion/add-save', 'Agregar nuevos datos 1 at Instituciónes', 13),
(567, '2017-03-15 20:47:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(568, '2017-03-15 20:47:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(569, '2017-03-15 20:48:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'celia@correo.com cerrar sesión', 14),
(570, '2017-03-15 20:48:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(571, '2017-03-15 21:18:09', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/module_generator/delete/16', 'Eliminar datos Instituciónes at Module Generator', 1),
(572, '2017-03-15 21:18:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/delete/16', 'Eliminar datos Instituciones at Menu Management', 1),
(573, '2017-03-15 21:37:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Instituciones at Menu Management', 1),
(574, '2017-03-15 21:38:43', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Agregar institución at Menu Management', 1),
(575, '2017-03-15 21:38:59', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Listado instituciones at Menu Management', 1),
(576, '2017-03-15 21:39:36', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/institucion/add-save', 'Agregar nuevos datos 1 at Instituciones', 13),
(577, '2017-03-15 22:14:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico/add-save', 'Agregar nuevos datos 11 at Lista de médicos', 13),
(578, '2017-03-15 23:26:24', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'javier@correo.com cerrar sesión', 13),
(579, '2017-03-15 23:27:59', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(580, '2017-03-15 23:28:40', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add', 'Intente agregar datos en Lista de pacientes', 14),
(581, '2017-03-15 23:30:31', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'celia@correo.com cerrar sesión', 14),
(582, '2017-03-15 23:33:41', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(583, '2017-03-15 23:34:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'celia@correo.com cerrar sesión', 14),
(584, '2017-03-15 23:34:13', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(585, '2017-03-15 23:34:22', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(586, '2017-03-15 23:34:37', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'javier@correo.com Inicia sesión con la dirección IP ::1', 13),
(587, '2017-03-16 15:04:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(588, '2017-03-16 15:21:32', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(589, '2017-03-16 15:33:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'celia@correo.com Inicia sesión con la dirección IP ::1', 14),
(590, '2017-03-16 15:34:04', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/medico', 'Intente ver los datos :name at Lista de médicos', 14),
(591, '2017-03-16 15:38:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(592, '2017-03-16 15:59:56', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Calendario at Menu Management', 1),
(593, '2017-03-16 16:02:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/19', 'Actualizar datos Calendario at Menu Management', 1),
(594, '2017-03-16 16:06:50', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/19', 'Actualizar datos Calendario at Menu Management', 1),
(595, '2017-03-16 16:14:57', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/19', 'Actualizar datos Calendario at Menu Management', 1),
(596, '2017-03-16 17:03:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'celia@correo.com cerrar sesión', 14),
(597, '2017-03-16 17:07:54', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/users/add-save', 'Agregar nuevos datos Julio Jaramillo at Users', 1),
(598, '2017-03-16 17:08:10', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'julio@correo.com Inicia sesión con la dirección IP ::1', 20),
(599, '2017-03-16 17:08:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'admin@crudbooster.com cerrar sesión', 1),
(600, '2017-03-16 17:08:26', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'fer@correo.com Inicia sesión con la dirección IP ::1', 2),
(601, '2017-03-16 17:18:02', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/paciente/add', 'Intente agregar datos en Lista de pacientes', 20),
(602, '2017-03-16 17:18:16', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'fer@correo.com cerrar sesión', 2),
(603, '2017-03-16 17:20:11', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'admin@crudbooster.com Inicia sesión con la dirección IP ::1', 1),
(604, '2017-03-16 17:24:48', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Pacientes at Menu Management', 1),
(605, '2017-03-16 17:25:21', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Agregar paciente at Menu Management', 1),
(606, '2017-03-16 17:25:38', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/add-save', 'Agregar nuevos datos Listado pacientes at Menu Management', 1),
(607, '2017-03-16 17:25:52', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/logout', 'julio@correo.com cerrar sesión', 20),
(608, '2017-03-16 17:26:05', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/login', 'julio@correo.com Inicia sesión con la dirección IP ::1', 20),
(609, '2017-03-16 17:26:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/22', 'Actualizar datos Listado pacientes at Menu Management', 1),
(610, '2017-03-16 17:27:25', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/22', 'Actualizar datos Listado pacientes at Menu Management', 1),
(611, '2017-03-16 17:27:47', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/22', 'Actualizar datos Listado pacientes at Menu Management', 1),
(612, '2017-03-16 17:28:30', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/11', 'Actualizar datos Listado pacientes at Menu Management', 1),
(613, '2017-03-16 17:28:40', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/22', 'Actualizar datos Listado pacientes at Menu Management', 1),
(614, '2017-03-16 17:28:49', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/21', 'Actualizar datos Agregar paciente at Menu Management', 1),
(615, '2017-03-16 17:29:12', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36', 'http://localhost/MedicSystem/public/admin/menu_management/edit-save/21', 'Actualizar datos Agregar paciente at Menu Management', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_dashboard` tinyint(1) NOT NULL DEFAULT '0',
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Lista de pacientes', 'Route', 'AdminPaciente1ControllerGetIndex', 'normal', 'fa fa-user-md', 0, 1, 0, 2, NULL, '2017-02-07 16:10:33', '2017-02-16 16:27:24'),
(2, 'Lista de médicos', 'Route', 'AdminMedico1ControllerGetIndex', 'normal', 'fa fa-user-md', 0, 1, 0, 2, NULL, '2017-02-07 16:12:07', '2017-02-10 17:21:10'),
(3, 'Medicos', 'Route', 'AdminMedico1ControllerGetIndex', 'normal', 'fa fa-user-md', 0, 1, 0, 1, NULL, '2017-02-07 16:16:07', NULL),
(4, 'Area de Cliente', 'Admin Path', 'pacientes', 'normal', 'fa fa-user-md', 0, 1, 1, 3, NULL, '2017-02-15 15:36:41', '2017-02-16 16:34:06'),
(5, 'Historial de citas', 'Route', 'AdminCitaCalendarioControllerGetIndex', 'normal', 'fa fa-history', 0, 1, 0, 3, NULL, '2017-02-21 17:00:57', '2017-03-10 22:47:13'),
(6, 'Medicos', 'URL External', '#', 'normal', 'fa fa-user-md', 0, 1, 0, 5, 2, '2017-03-03 18:58:59', NULL),
(7, 'Listado médicos', 'Route', 'AdminMedico1ControllerGetIndex', 'normal', 'fa fa-plus-circle', 6, 1, 0, 5, 2, '2017-03-03 18:59:37', '2017-03-03 19:55:18'),
(8, 'Agregar médico', 'Route', 'AdminMedico1ControllerGetAdd', 'normal', 'fa fa-plus-circle', 6, 1, 0, 5, 1, '2017-03-03 18:59:59', '2017-03-03 19:55:07'),
(9, 'Pacientes', 'URL External', '#', 'normal', 'fa fa-male', 0, 1, 0, 5, 3, '2017-03-03 19:01:29', NULL),
(10, 'Agregar paciente', 'Route', 'AdminPaciente1ControllerGetAdd', 'normal', 'fa fa-plus-circle', 9, 1, 0, 5, 1, '2017-03-03 19:01:58', '2017-03-03 19:55:39'),
(11, 'Listado pacientes', 'Route', 'AdminPaciente1ControllerGetIndex', 'normal', 'fa fa-bars', 9, 1, 0, 5, 2, '2017-03-03 19:02:19', '2017-03-16 17:28:30'),
(12, 'Usuarios', 'URL External', '#', 'normal', 'fa fa-users', 0, 1, 0, 5, 4, '2017-03-03 19:03:32', NULL),
(13, 'Listado usuarios', 'Route', 'AdminCmsUsersControllerGetIndex', 'normal', 'fa fa-bars', 12, 1, 0, 5, 2, '2017-03-03 19:04:32', '2017-03-03 19:49:27'),
(14, 'Agregar usuario', 'Route', 'AdminCmsUsersControllerGetAdd', 'normal', 'fa fa-plus-circle', 12, 1, 0, 5, 1, '2017-03-03 19:50:27', NULL),
(15, 'Agendar Cita', 'Admin Path', 'medico/agenda', 'normal', 'fa fa-plus-circle', 0, 1, 0, 4, 2, '2017-03-06 16:40:05', '2017-03-06 16:52:14'),
(16, 'Instituciones', 'URL External', '#', 'normal', 'fa fa-industry', 0, 1, 0, 5, 1, '2017-03-15 21:37:49', NULL),
(17, 'Agregar institución', 'Route', 'AdminInstitucionControllerGetAdd', 'normal', 'fa fa-plus', 16, 1, 0, 5, 1, '2017-03-15 21:38:43', NULL),
(18, 'Listado instituciones', 'Route', 'AdminInstitucionControllerGetIndex', 'normal', 'fa fa-bars', 16, 1, 0, 5, 2, '2017-03-15 21:38:59', NULL),
(19, 'Calendario', 'Admin Path', 'medico/dashboard', 'normal', 'fa fa-plus-circle', 0, 1, 1, 4, 1, '2017-03-16 15:59:56', '2017-03-16 16:14:57'),
(20, 'Pacientes', 'URL External', '#', 'normal', 'fa fa-male', 0, 1, 0, 4, 3, '2017-03-16 17:24:48', NULL),
(21, 'Agregar paciente', 'Route', 'AdminPaciente1ControllerGetAdd', 'normal', 'fa fa-plus', 20, 1, 0, 4, 1, '2017-03-16 17:25:21', '2017-03-16 17:29:12'),
(22, 'Listado pacientes', 'Route', 'AdminPaciente1ControllerGetIndex', 'normal', 'fa fa-bars', 20, 1, 0, 4, 2, '2017-03-16 17:25:38', '2017-03-16 17:28:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `created_at`, `updated_at`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`) VALUES
(1, '2017-02-07 15:43:08', NULL, 'Notifications', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1),
(2, '2017-02-07 15:43:08', NULL, 'Privileges', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1),
(3, '2017-02-07 15:43:08', NULL, 'Privileges Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1),
(4, '2017-02-07 15:43:08', NULL, 'Users', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1),
(5, '2017-02-07 15:43:08', NULL, 'Settings', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1),
(6, '2017-02-07 15:43:08', NULL, 'Module Generator', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1),
(7, '2017-02-07 15:43:08', NULL, 'Menu Management', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1),
(8, '2017-02-07 15:43:08', NULL, 'Email Template', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1),
(9, '2017-02-07 15:43:08', NULL, 'Statistic Builder', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1),
(10, '2017-02-07 15:43:08', NULL, 'API Generator', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1),
(11, '2017-02-07 15:43:08', NULL, 'Logs', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1),
(12, '2017-02-07 15:58:26', NULL, 'Lista de pacientes', 'fa fa-cog', 'paciente', 'paciente', 'AdminPaciente1Controller', 0, 0),
(13, '2017-02-07 15:59:41', NULL, 'Lista de médicos', 'fa fa-user-md', 'medico', 'medico', 'AdminMedico1Controller', 0, 0),
(14, '2017-03-10 22:34:04', NULL, 'Historial citas', 'fa fa-bars', 'cita_calendario', 'cita_calendario', 'AdminCitaCalendarioController', 0, 0),
(15, '2017-03-10 22:42:10', NULL, 'Historial', 'fa fa-history', 'agenda', 'agenda', 'AdminAgenda1Controller', 0, 0),
(16, '2017-03-15 21:37:05', NULL, 'Instituciones', 'fa fa-industry', 'institucion', 'institucion', 'AdminInstitucionController', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `created_at`, `updated_at`, `name`, `is_superadmin`, `theme_color`) VALUES
(1, '2017-02-07 15:43:08', NULL, 'Super Administrator', 1, 'skin-red'),
(2, NULL, NULL, 'Call Center', 0, 'skin-blue'),
(3, NULL, NULL, 'Paciente', 0, 'skin-purple'),
(4, NULL, NULL, 'Medico', 0, 'skin-green-light'),
(5, NULL, NULL, 'Administrador', 0, 'skin-yellow');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `created_at`, `updated_at`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`) VALUES
(1, '2017-02-07 15:43:08', NULL, 1, 0, 0, 0, 0, 1, 1),
(2, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 2),
(3, '2017-02-07 15:43:08', NULL, 0, 1, 1, 1, 1, 1, 3),
(4, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 4),
(5, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 5),
(6, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 6),
(7, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 7),
(8, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 8),
(9, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 9),
(10, '2017-02-07 15:43:08', NULL, 1, 1, 1, 1, 1, 1, 10),
(11, '2017-02-07 15:43:08', NULL, 1, 0, 1, 0, 1, 1, 11),
(12, NULL, NULL, 1, 1, 1, 1, 1, 1, 12),
(13, NULL, NULL, 1, 1, 1, 1, 1, 1, 13),
(14, NULL, NULL, 1, 1, 1, 1, 0, 2, 13),
(15, NULL, NULL, 1, 1, 1, 1, 1, 2, 12),
(19, NULL, NULL, 1, 1, 1, 1, 1, 1, 14),
(21, NULL, NULL, 1, 1, 1, 1, 1, 1, 15),
(22, NULL, NULL, 1, 0, 1, 0, 0, 3, 15),
(23, NULL, NULL, 1, 0, 1, 0, 0, 3, 14),
(24, NULL, NULL, 1, 1, 1, 1, 1, 1, 16),
(25, NULL, NULL, 1, 1, 1, 1, 1, 5, 16),
(26, NULL, NULL, 1, 1, 1, 1, 1, 5, 13),
(27, NULL, NULL, 1, 1, 1, 1, 1, 5, 12),
(28, NULL, NULL, 1, 1, 1, 1, 1, 5, 4),
(29, NULL, NULL, 1, 1, 1, 1, 1, 1, 16),
(30, NULL, NULL, 1, 1, 1, 1, 0, 4, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `content_input_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_setting` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `created_at`, `updated_at`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `group_setting`, `label`) VALUES
(1, '2017-02-07 15:43:09', NULL, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Background Color'),
(2, '2017-02-07 15:43:09', NULL, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', 'Login Register Style', 'Login Font Color'),
(3, '2017-02-07 15:43:09', NULL, 'login_background_image', 'uploads/2017-02/3ff1afc6fbc8e9b73ae647c29e797d86.png', 'upload_image', NULL, NULL, 'Login Register Style', 'Login Background Image'),
(4, '2017-02-07 15:43:09', NULL, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, 'Email Setting', 'Email Sender'),
(5, '2017-02-07 15:43:09', NULL, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, 'Email Setting', 'Mail Driver'),
(6, '2017-02-07 15:43:09', NULL, 'smtp_host', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Host'),
(7, '2017-02-07 15:43:09', NULL, 'smtp_port', '25', 'text', NULL, 'default 25', 'Email Setting', 'SMTP Port'),
(8, '2017-02-07 15:43:09', NULL, 'smtp_username', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Username'),
(9, '2017-02-07 15:43:09', NULL, 'smtp_password', '', 'text', NULL, NULL, 'Email Setting', 'SMTP Password'),
(10, '2017-02-07 15:43:09', NULL, 'appname', 'Agenda Médica', 'text', NULL, NULL, 'Application Setting', 'Application Name'),
(11, '2017-02-07 15:43:09', NULL, 'default_paper_size', 'A4', 'text', NULL, 'Paper size, ex : A4, Legal, etc', 'Application Setting', 'Default Paper Print Size'),
(12, '2017-02-07 15:43:09', NULL, 'logo', 'uploads/2017-03/de886a158089703308ed56f72cd741b6.jpg', 'upload_image', NULL, NULL, 'Application Setting', 'Logo'),
(13, '2017-02-07 15:43:09', NULL, 'favicon', 'uploads/2017-02/955a91c65623000bd6232030d2cbf273.png', 'upload_image', NULL, NULL, 'Application Setting', 'Favicon'),
(14, '2017-02-07 15:43:09', NULL, 'api_debug_mode', 'true', 'select', 'true,false', NULL, 'Application Setting', 'API Debug Mode'),
(15, '2017-02-07 15:43:09', NULL, 'google_api_key', NULL, 'text', NULL, NULL, 'Application Setting', 'Google API Key'),
(16, '2017-02-07 15:43:09', NULL, 'google_fcm_key', NULL, 'text', NULL, NULL, 'Application Setting', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_statistics`
--

INSERT INTO `cms_statistics` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Panel de paciente', 'citas-realizadas', '2017-02-15 15:25:14', '2017-02-15 21:09:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_users`
--

INSERT INTO `cms_users` (`id`, `created_at`, `updated_at`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `status`) VALUES
(1, '2017-02-07 15:43:07', NULL, 'Super Admin', NULL, 'admin@crudbooster.com', '$2y$10$nDiNC6mPBtEavlgOtfLLlOlYvOBVmvnjEIiu2l0esZyNxRvfqHRX2', 1, 'Active'),
(2, '2017-02-07 16:08:35', NULL, 'Fernanda Pérez', 'uploads/2017-02/b2f1b6f7c72d3941b4a6233918b13c4f.jpg', 'fer@correo.com', '$2y$10$Ja6y.ufwyTHCfHqlNjtpo.q6UV0khTfEs0OrRFW88TJ1nHBaQcMZ.', 2, NULL),
(11, '2017-03-03 17:35:44', '2017-03-03 17:35:44', 'Juanco', NULL, 'juan@correo.com', '$2y$10$nAZ/mD/gOZzSf4bI6wAn...pA246juyFuyPkHkpG/JE8Mi8T3WCb6', 3, NULL),
(12, '2017-03-03 18:48:19', '2017-03-03 18:48:19', 'Diana', NULL, 'diana@gmail.com', '$2y$10$mxgAFlE2ybSnsSKQCtRSCuKKHdd/zU0cdhQfzgL59wFRSLetKciNC', 3, NULL),
(13, '2017-03-03 18:56:56', NULL, 'Javier', 'uploads/2017-03/365ba2ddc481a9c736268ee85e8a6236.jpg', 'javier@correo.com', '$2y$10$SV.080NIoZFiMj46OgdWg.FH3LepAPOFjc7Ag2kBU3INdxl8n5EkS', 5, NULL),
(14, '2017-03-06 17:56:48', NULL, 'Celia Camaño', '', 'celia@correo.com', '$2y$10$VzAqvHCSmC/p36XAoQIILOD/LOexwT.HiRmJlPY.cTBpl.kMhTrde', 4, NULL),
(19, '2017-03-06 19:51:26', '2017-03-06 19:51:26', 'Pablo David', NULL, 'pablo@correo.com', '$2y$10$J86alU0EfO91/q3iKg5AKOWz6Pj4RvTRwxzZfEjFeIKZwIysu8A3e', 3, NULL),
(20, '2017-03-16 17:07:54', NULL, 'Julio Jaramillo', '', 'julio@correo.com', '$2y$10$B0MTcX7ZQ/3fR2jCWizHfuZw0jT8DRSzdvNXcdnSCqipxrbGhMXFO', 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `provincia` varchar(80) DEFAULT NULL,
  `ciudad` varchar(80) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`id`, `nombre`, `provincia`, `ciudad`, `telefono`) VALUES
(1, 'CEMOPLAF 1', 'PICHINCHA', 'QUITO', '2333344');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(10) UNSIGNED NOT NULL,
  `titulo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cms_user_id` int(11) DEFAULT NULL,
  `institucion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `titulo`, `especialidad`, `nombre`, `apellido`, `telefono`, `created_at`, `updated_at`, `cms_user_id`, `institucion_id`) VALUES
(2, 'Dr.', 'Odontólogo', 'Mario', 'Palacios', '2333444', '2017-02-07 16:28:48', '2017-03-06 17:00:16', NULL, NULL),
(3, 'Dra.', 'Cirugia', 'Maria', 'Palacios', '2333999', '2017-02-14 14:59:53', '2017-03-06 17:01:12', NULL, NULL),
(4, 'Dr.', 'Traumatologìa', 'Francisco', 'Silva', '2555666', '2017-02-14 15:16:27', '2017-03-03 22:53:12', NULL, NULL),
(5, 'Dr.', 'Urologo', 'Julio', 'Jaramillo', '2333444', '2017-02-16 21:21:57', '2017-03-16 17:07:54', 20, NULL),
(6, 'Dra.', 'Cirugia', 'Juana', 'Herrera', '2333444', '2017-02-16 21:22:33', '2017-03-03 22:34:34', 13, NULL),
(7, 'Dra.', 'Laboratorio', 'Leti', 'Santos', '2556666', '2017-02-16 21:23:06', NULL, NULL, NULL),
(8, 'Dra.', 'Odontología', 'Celia', 'Camaño', '2333444', '2017-02-17 17:12:24', '2017-03-06 17:56:48', 14, NULL),
(9, 'Dra.', 'Traumatologia', 'Carla', 'Borja', '2333444', '2017-02-21 15:23:36', NULL, NULL, NULL),
(10, 'Dr.', 'Cardiología', 'Pepe', 'Proaño', '2444556', '2017-02-21 15:24:06', '2017-03-07 19:27:55', NULL, NULL),
(11, 'Dra.', 'Odontología', 'LUCY', 'PEREZ', '2333444', '2017-03-15 22:14:48', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2016_08_07_145904_add_table_cms_apicustom', 1),
(28, '2016_08_07_150834_add_table_cms_dashboard', 1),
(29, '2016_08_07_151210_add_table_cms_logs', 1),
(30, '2016_08_07_152014_add_table_cms_privileges', 1),
(31, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(32, '2016_08_07_152320_add_table_cms_settings', 1),
(33, '2016_08_07_152421_add_table_cms_users', 1),
(34, '2016_08_07_154624_add_table_cms_moduls', 1),
(35, '2016_08_17_225409_add_status_cms_users', 1),
(36, '2016_08_20_125418_add_table_cms_notifications', 1),
(37, '2016_09_04_033706_add_table_cms_email_queues', 1),
(38, '2016_09_16_035347_add_group_setting', 1),
(39, '2016_09_16_045425_add_label_setting', 1),
(40, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(41, '2016_10_01_141740_add_method_type_apicustom', 1),
(42, '2016_10_01_141846_add_parameters_apicustom', 1),
(43, '2016_10_01_141934_add_responses_apicustom', 1),
(44, '2016_10_01_144826_add_table_apikey', 1),
(45, '2016_11_14_141657_create_cms_menus', 1),
(46, '2016_11_15_132350_create_cms_email_templates', 1),
(47, '2016_11_15_190410_create_cms_statistics', 1),
(48, '2016_11_17_102740_create_cms_statistic_components', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(10) UNSIGNED NOT NULL,
  `cedula` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pasaporte` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `otro` text COLLATE utf8_unicode_ci,
  `num_historia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `lugar_nac` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lugar_resid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado_civil` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instruccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `autorizacion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_v` date DEFAULT NULL,
  `condicion_paciente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telf_domicilio` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telf_trabajo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `celular` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `referencia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telf_referencia` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cms_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `cedula`, `nombre`, `apellido`, `email`, `created_at`, `updated_at`, `pasaporte`, `medico_id`, `otro`, `num_historia`, `fecha_nac`, `lugar_nac`, `lugar_resid`, `sexo`, `estado_civil`, `instruccion`, `autorizacion`, `fecha`, `fecha_v`, `condicion_paciente`, `direccion`, `telf_domicilio`, `telf_trabajo`, `celular`, `referencia`, `telf_referencia`, `cms_user_id`) VALUES
(1, '1103187710', 'Leonardo', 'Armijos', 'nicorex_arm@hotmail.com', '2017-02-07 17:06:14', NULL, 'yyy', NULL, 'yyyuuuutttrr', 'yyy', '1980-05-07', 'yyyyyy', 'yyyy', 'yyyy', 'yyy', 'yyyy', 'yyyy', '2017-02-07', '2017-02-16', 'yyyy', 'yyy', '777777777', '6566666', '777777777', 'ytui', '65477', NULL),
(2, '1732229900', 'Pablo', 'Chamba', 'pablodc002@gmail.com', '2017-02-07 22:13:44', '2017-03-14 19:13:54', '1777222', NULL, 'asdfasd', 'asdfasd', NULL, 'kjh', 'kjh', 'kjh', 'kjhkjh', 'kljhk', 'ljh', NULL, NULL, 'kljh', 'kjfdsasdsda', 'hkasdfasd', 'jhasdfasd', 'kjh', 'kljhkjh', 'kjhkjhk', 19),
(4, '1723445567', 'Lesnier', 'Gonzalez', 'lesnier@gmail.com', '2017-02-13 15:35:24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'FEMENINO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '1721326754', 'Juanco', NULL, 'juan@correo.com', '2017-03-03 17:35:43', '2017-03-03 17:35:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11),
(11, '1728990088', 'Diana', NULL, 'diana@gmail.com', '2017-03-03 18:48:19', '2017-03-03 18:48:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12),
(12, '2100369863', 'Gabriel', 'Vanegas', 'gdvanegas@hotmail.com', '2017-03-07 19:22:31', '2017-03-08 20:20:20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SOLTERO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 71),
(18, '1732229901', 'PABLO', 'DAVID', 'pdavid211@hotmail.com', '2017-03-08 19:37:46', '2017-03-14 19:07:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 65);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agenda_medico_id_unique` (`medico_id`);

--
-- Indices de la tabla `cita_calendario`
--
ALTER TABLE `cita_calendario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cita_calendario_agenda_idx` (`agenda_id`);

--
-- Indices de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula_UNIQUE` (`cedula`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `cita_calendario`
--
ALTER TABLE `cita_calendario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;
--
-- AUTO_INCREMENT de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_medico` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cita_calendario`
--
ALTER TABLE `cita_calendario`
  ADD CONSTRAINT `cita_calendario_agenda` FOREIGN KEY (`agenda_id`) REFERENCES `agenda` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
