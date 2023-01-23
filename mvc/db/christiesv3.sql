-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-01-2023 a las 14:07:20
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `christies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `description`, `img`) VALUES
(1, 'virtual_trips', 'A virtual tour is a simulation of an existing location, usually composed of a sequence of videos, still images or 360-degree images. It may also use other multimedia elements such as sound effects, music, narration, text and floor map. It is distinguished from the use of live television to affect tele-tourism.', 'https://localhost/christies-meta/mvc/repositories/categories-images/1/main.jpg'),
(2, 'virtual_gastronomy', 'By using advanced technology, we are able to recreate the experience of eating by hacking vision, gustation, olfaction, audition and touch thus tricking people’s senses into believing that the false food that it has being eated is a gourmet meal. ', 'https://localhost/christies-meta/mvc/repositories/categories-images/2/main.jpg'),
(3, 'impossible_sports', 'Exploring the most extreme and innovative sports from around the world. Here you can find stories of athletes pushing their limits in disciplines such as skateboarding, snowboarding, mountain biking, rock climbing, surfing and more. Whether it\'s trying out an unorthodox trick or finding new ways to break records - Impossible Sports will bring you closer to some of the wildest action on two wheels or four!', 'https://christies-meta/mvc/repositories/categories-images/3/main.jpg'),
(4, 'virtual_clothes', 'What is a virtual clothing?\r\nDigital fashion is 3D-designed, virtual clothing made with both humans and our digital avatars in mind. Instead of using physical fabric and textiles, digital clothes are designed on 3D computer software to be worn by your online avatars or edited onto your body using augmented reality.', 'https://localhost/christies-meta/mvc/repositories/categories-images/main.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_com` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `object_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `object`
--

CREATE TABLE `object` (
  `object_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lat` decimal(20,8) DEFAULT NULL,
  `lon` decimal(20,8) DEFAULT NULL,
  `price` decimal(64,4) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `object`
--

INSERT INTO `object` (`object_id`, `name`, `lat`, `lon`, `price`, `img1`, `img2`, `img3`, `cat_id`) VALUES
(1, 'Pandasan_trip', '14.59397500', '121.00386310', '868.0171', 'default', NULL, NULL, 1),
(2, 'Waitakere_trip', '-36.81890730', '174.55366780', '49.3542', 'default', NULL, NULL, 1),
(3, 'Deh-e Now_trip', '33.73192600', '67.06815300', '713.6173', 'default', NULL, NULL, 1),
(4, 'Norrköping_trip', '58.89650660', '15.43235070', '864.5667', 'default', NULL, NULL, 1),
(5, 'São Sepé_trip', '-30.16478070', '-53.56082750', '998.4541', 'default', NULL, NULL, 1),
(6, 'Sidamukti_trip', '-6.85892500', '108.20809730', '645.0036', 'default', NULL, NULL, 1),
(7, 'Concepción_trip', '-34.63109230', '-58.88014990', '881.5191', 'default', NULL, NULL, 1),
(8, 'Whitegate_trip', '53.36663380', '-6.35394240', '706.8659', 'default', NULL, NULL, 1),
(9, 'Mandala_trip', '-7.34775600', '108.88188590', '814.4871', 'default', NULL, NULL, 1),
(10, 'Tabuny_trip', '52.77498700', '78.80887400', '39.2620', 'default', NULL, NULL, 1),
(11, 'Appetizer - Veg Assortment_gastronomy', NULL, NULL, '318.7608', 'default', NULL, NULL, 2),
(12, 'Catfish - Fillets_gastronomy', NULL, NULL, '524.4215', 'default', NULL, NULL, 2),
(13, 'Tea - Darjeeling, Azzura_gastronomy', NULL, NULL, '471.3322', 'default', NULL, NULL, 2),
(14, 'Soap - Hand Soap_gastronomy', NULL, NULL, '991.6976', 'default', NULL, NULL, 2),
(15, 'Ice Cream - Life Savers_gastronomy', NULL, NULL, '524.0855', 'default', NULL, NULL, 2),
(16, 'Grapefruit - Pink_gastronomy', NULL, NULL, '687.3253', 'default', NULL, NULL, 2),
(17, 'Pastry - Plain Baked Croissant_gastronomy', NULL, NULL, '688.4255', 'default', NULL, NULL, 2),
(18, 'Cheese - Romano, Grated_gastronomy', NULL, NULL, '812.4875', 'default', NULL, NULL, 2),
(19, 'Soup - Chicken And Wild Rice_gastronomy', NULL, NULL, '238.9256', 'default', NULL, NULL, 2),
(20, 'Wine - Lamancha Do Crianza_gastronomy', NULL, NULL, '47.3239', 'default', NULL, NULL, 2),
(21, 'Hockey_impossible', NULL, NULL, '690.4258', 'default', NULL, NULL, 3),
(22, 'Rugby_impossible', NULL, NULL, '165.4140', 'default', NULL, NULL, 3),
(23, 'Bowling_impossible', NULL, NULL, '355.9375', 'default', NULL, NULL, 3),
(24, 'Lacrosse_impossible', NULL, NULL, '150.7528', 'default', NULL, NULL, 3),
(25, 'Snowboarding_impossible', NULL, NULL, '960.4815', 'default', NULL, NULL, 3),
(26, 'Lacrosse_impossible', NULL, NULL, '379.7887', 'default', NULL, NULL, 3),
(27, 'Swimming_impossible', NULL, NULL, '743.1056', 'default', NULL, NULL, 3),
(28, 'Hockey_impossible', NULL, NULL, '268.6949', 'default', NULL, NULL, 3),
(29, 'Hockey_impossible', NULL, NULL, '179.4869', 'default', NULL, NULL, 3),
(30, 'Rugby_impossible', NULL, NULL, '863.4162', 'default', NULL, NULL, 3),
(31, 'Skirt_virtual', NULL, NULL, '813.9486', 'default', NULL, NULL, 4),
(32, 'Skirt_virtual', NULL, NULL, '611.3767', 'default', NULL, NULL, 4),
(33, 'Leggings_virtual', NULL, NULL, '131.7869', 'default', NULL, NULL, 4),
(34, 'Sweatshirt_virtual', NULL, NULL, '920.1979', 'default', NULL, NULL, 4),
(35, 'Jeans_virtual', NULL, NULL, '18.8810', 'default', NULL, NULL, 4),
(36, 'Romper_virtual', NULL, NULL, '590.8842', 'default', NULL, NULL, 4),
(37, 'Blouse_virtual', NULL, NULL, '970.7202', 'default', NULL, NULL, 4),
(38, 'Sweatshirt_virtual', NULL, NULL, '713.0241', 'default', NULL, NULL, 4),
(39, 'Jumpsuit_virtual', NULL, NULL, '302.4276', 'default', NULL, NULL, 4),
(40, 'Skirt_virtual', NULL, NULL, '750.5215', 'default', NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `purchases`
--

CREATE TABLE `purchases` (
  `purch_id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `object_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','user') NOT NULL,
  `tokens` decimal(64,4) NOT NULL DEFAULT 100.0000,
  `telph` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `rol`, `tokens`, `telph`) VALUES
(1, 'admin@mail.com', '0acc00bf8abac7533d0e07b01b8079fb6ec4b4c5', 'admin', '100000.0000', '677599796'),
(2, 'ewillcox1@msu.edu', '105c9063c5ea3a613a40590c821d23c5f5a86914', 'user', '100.0000', '+62 447 319 6820'),
(3, 'jshropshire2@europa.eu', '22092f7d8d26e545eb75e8ef1ea2c3f850c484a2', 'user', '100.0000', '+7 896 112 7308'),
(4, 'iroe3@apple.com', '96a7ab99c61294e2b26f4f946834fcfa7dcfc924', 'user', '100.0000', '+63 161 543 7458'),
(5, 'rstollenhof4@wisc.edu', '642690ff4fdb34e66c1d441a3f51ce72eb30b076', 'user', '100.0000', '+62 444 230 7085'),
(6, 'bblewmen5@hugedomains.com', '6af62e0c3092c2b8b4d4e9fdc2373b2af4556920', 'user', '100.0000', '+7 898 390 0903'),
(7, 'wbourgaize6@pbs.org', 'bcb2cf3dcc70fbd440c50178a0ea817537f7d3b0', 'user', '100.0000', '+591 136 809 3655'),
(8, 'jharlock7@intel.com', 'e2dddda2ba20295c2442c85b2fce410a8fe46895', 'user', '100.0000', '+268 191 858 7596'),
(9, 'lbiaggetti8@mit.edu', '0b880b62dd3c5c2c9e4bf9733c72193d2686cad9', 'user', '100.0000', '+53 792 766 0034'),
(10, 'rdrury9@ft.com', 'f06399fbd273a85f3de40b6e64074c144cc7232e', 'user', '100.0000', '+66 623 602 5905'),
(11, 'sdanisa@desdev.cn', 'd42e9aa7542aa3d55dc8004d1704c19e18305dc6', 'user', '100.0000', '+7 101 146 9330'),
(12, 'iadamekb@altervista.org', 'ae8a251a7c077a7f86ac3d02ea581d98781939bf', 'user', '100.0000', '+86 906 125 3593'),
(13, 'rseawrightc@apple.com', '88910f694912650bdc05469de8e054095d4bb4a7', 'user', '100.0000', '+420 879 666 9874'),
(14, 'agortond@netscape.com', '2a0b1404d063cdbf5127bb867c345b291161e126', 'user', '100.0000', '+48 286 526 1417'),
(15, 'llorineze@mediafire.com', 'b41e275280639a6daa25ef8d3696ded30b9d400f', 'user', '100.0000', '+55 482 264 1252'),
(16, 'jgniewoszf@ebay.co.uk', '7abd7afa87eed2c18f284098e247229e33c4ef6c', 'user', '100.0000', '+960 968 527 4947'),
(17, 'jginng@home.pl', '27f4572df05d223a480194bc3af3b2f10c9668de', 'user', '100.0000', '+62 746 232 2940'),
(18, 'lhowseleeh@ameblo.jp', '8fea0bac413c283393aca3452aca2ae2bbdb9b94', 'user', '100.0000', '+351 138 266 4305'),
(19, 'vphelipsi@latimes.com', '221fc4371800166c25baccb45870dcd3a50a70c2', 'user', '100.0000', '+504 966 346 6175');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `comentarios_ibfk_1` (`object_id`),
  ADD KEY `comentarios_ibfk_2` (`user_id`);

--
-- Indices de la tabla `object`
--
ALTER TABLE `object`
  ADD PRIMARY KEY (`object_id`),
  ADD KEY `id_cat` (`cat_id`);

--
-- Indices de la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purch_id`),
  ADD KEY `compras_ibfk_1` (`object_id`),
  ADD KEY `compras_ibfk_2` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `object`
--
ALTER TABLE `object`
  MODIFY `object_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purch_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`object_id`) REFERENCES `object` (`object_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `object`
--
ALTER TABLE `object`
  ADD CONSTRAINT `object_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`object_id`) REFERENCES `object` (`object_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
