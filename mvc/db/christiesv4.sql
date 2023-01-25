-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-01-2023 a las 14:13:15
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
  `img` varchar(600) NOT NULL,
  `upper_cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`cat_id`, `name`, `description`, `img`, `upper_cat_id`) VALUES
(1, 'virtual_trips', 'A virtual tour is a simulation of an existing location, usually composed of a sequence of videos, still images or 360-degree images. It may also use other multimedia elements such as sound effects, music, narration, text and floor map. It is distinguished from the use of live television to affect tele-tourism.', 'https://localhost/christies-meta/mvc/repositories/categories-images/1/main.jpg', NULL),
(2, 'virtual_gastronomy', 'By using advanced technology, we are able to recreate the experience of eating by hacking vision, gustation, olfaction, audition and touch thus tricking people’s senses into believing that the false food that it has being eated is a gourmet meal. ', 'https://localhost/christies-meta/mvc/repositories/categories-images/2/main.jpg', NULL),
(3, 'impossible_sports', 'Exploring the most extreme and innovative sports from around the world. Here you can find stories of athletes pushing their limits in disciplines such as skateboarding, snowboarding, mountain biking, rock climbing, surfing and more. Whether it\'s trying out an unorthodox trick or finding new ways to break records - Impossible Sports will bring you closer to some of the wildest action on two wheels or four!', 'http://localhost/christies-meta/mvc/view/categories-images/3/main.png', NULL),
(4, 'virtual_clothes', 'What is a virtual clothing?\r\nDigital fashion is 3D-designed, virtual clothing made with both humans and our digital avatars in mind. Instead of using physical fabric and textiles, digital clothes are designed on 3D computer software to be worn by your online avatars or edited onto your body using augmented reality.', 'https://localhost/christies-meta/mvc/repositories/categories-images/main.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `object_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`com_id`, `content`, `date`, `object_id`, `user_id`) VALUES
(4, 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.', '2023-01-23', 3, 3),
(5, 'Morbi a ipsum. Integer a nibh. In quis justo.', '2023-01-23', 4, 4);

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
(3, 'Deh-e Now_trip', '33.73192600', '67.06815300', '713.6173', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 1),
(4, 'Norrköping_trip', '58.89650660', '15.43235070', '864.5667', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 1),
(5, 'São Sepé_trip', '-30.16478070', '-53.56082750', '998.4541', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 1),
(6, 'Sidamukti_trip', '-6.85892500', '108.20809730', '645.0036', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 1),
(7, 'Concepción_trip', '-34.63109230', '-58.88014990', '881.5191', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 1),
(9, 'Mandala_trip', '-7.34775600', '108.88188590', '814.4871', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 1),
(10, 'Tabuny_trip', '52.77498700', '78.80887400', '39.2620', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 1),
(12, 'Catfish - Fillets_gastronomy', NULL, NULL, '524.4215', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(13, 'Tea - Darjeeling, Azzura_gastronomy', NULL, NULL, '471.3322', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(14, 'Soap - Hand Soap_gastronomy', NULL, NULL, '991.6976', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(15, 'Ice Cream - Life Savers_gastronomy', NULL, NULL, '524.0855', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(16, 'Grapefruit - Pink_gastronomy', NULL, NULL, '687.3253', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(17, 'Pastry - Plain Baked Croissant_gastronomy', NULL, NULL, '688.4255', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(18, 'Cheese - Romano, Grated_gastronomy', NULL, NULL, '812.4875', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(19, 'Soup - Chicken And Wild Rice_gastronomy', NULL, NULL, '238.9256', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(20, 'Wine - Lamancha Do Crianza_gastronomy', NULL, NULL, '47.3239', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 2),
(21, 'Hockey_impossible', NULL, NULL, '690.4258', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(22, 'Rugby_impossible', NULL, NULL, '165.4140', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(23, 'Bowling_impossible', NULL, NULL, '355.9375', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(24, 'Lacrosse_impossible', NULL, NULL, '150.7528', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(25, 'Snowboarding_impossible', NULL, NULL, '960.4815', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(26, 'Lacrosse_impossible', NULL, NULL, '379.7887', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(27, 'Swimming_impossible', NULL, NULL, '743.1056', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(28, 'Hockey_impossible', NULL, NULL, '268.6949', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(29, 'Hockey_impossible', NULL, NULL, '179.4869', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(30, 'Rugby_impossible', NULL, NULL, '863.4162', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 3),
(31, 'Skirt_virtual', NULL, NULL, '813.9486', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(32, 'Skirt_virtual', NULL, NULL, '611.3767', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(33, 'Leggings_virtual', NULL, NULL, '131.7869', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(34, 'Sweatshirt_virtual', NULL, NULL, '920.1979', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(35, 'Jeans_virtual', NULL, NULL, '18.8810', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(36, 'Romper_virtual', NULL, NULL, '590.8842', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(37, 'Blouse_virtual', NULL, NULL, '970.7202', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(38, 'Sweatshirt_virtual', NULL, NULL, '713.0241', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(39, 'Jumpsuit_virtual', NULL, NULL, '302.4276', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4),
(40, 'Skirt_virtual', NULL, NULL, '750.5215', 'https://user-images.githubusercontent.com/43302778/106805462-7a908400-6645-11eb-958f-cd72b74a17b3.jpg', NULL, NULL, 4);

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
-- Estructura de tabla para la tabla `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `score_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `score`
--

INSERT INTO `score` (`id`, `object_id`, `score_points`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','user') NOT NULL DEFAULT 'user',
  `tokens` decimal(64,4) NOT NULL DEFAULT 100.0000,
  `telph` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `rol`, `tokens`, `telph`) VALUES
(1, 'admin@mail.com', '0acc00bf8abac7533d0e07b01b8079fb6ec4b4c5', 'admin', '100000.0000', '+34 677599796'),
(3, 'jshropshire2@europa.eu', '62c3727faaa92a3938fd9acec3f13a18dd99c1da', 'user', '1001.4500', '+7 896 112 7308'),
(4, 'iroe3@apple.com', '96a7ab99c61294e2b26f4f946834fcfa7dcfc924', 'user', '100.0000', '+63 161 543 7458'),
(6, 'bblewmen5@hugedomains.com', '6af62e0c3092c2b8b4d4e9fdc2373b2af4556920', 'user', '100.0000', '+7 898 390 0903'),
(7, 'wbourgaize6@pbs.org', 'bcb2cf3dcc70fbd440c50178a0ea817537f7d3b0', 'user', '100.0000', '+591 136 809 3655'),
(8, 'jharlock7@intel.com', 'e2dddda2ba20295c2442c85b2fce410a8fe46895', 'user', '100.0000', '+268 191 858 7596'),
(10, 'rdrury9@ft.com', 'f06399fbd273a85f3de40b6e64074c144cc7232e', 'user', '100.0000', '+66 623 602 5905'),
(11, 'sdanisa@desdev.cn', 'd42e9aa7542aa3d55dc8004d1704c19e18305dc6', 'user', '100.0000', '+7 101 146 9330'),
(12, 'iadamekb@altervista.org', 'ae8a251a7c077a7f86ac3d02ea581d98781939bf', 'user', '100.0000', '+86 906 125 3593'),
(13, 'rseawrightc@apple.com', '88910f694912650bdc05469de8e054095d4bb4a7', 'user', '100.0000', '+420 879 666 9874'),
(14, 'agortond@netscape.com', '2a0b1404d063cdbf5127bb867c345b291161e126', 'user', '100.0000', '+48 286 526 1417'),
(15, 'llorineze@mediafire.com', 'b41e275280639a6daa25ef8d3696ded30b9d400f', 'user', '100.0000', '+55 482 264 1252'),
(16, 'jgniewoszf@ebay.co.uk', '7abd7afa87eed2c18f284098e247229e33c4ef6c', 'user', '100.0000', '+960 968 527 4947'),
(17, 'jginng@home.pl', '27f4572df05d223a480194bc3af3b2f10c9668de', 'user', '100.0000', '+62 746 232 2940'),
(52, 'ai123@gmail.com', '06be76627be3d077f8a7594bd2475a1efc01577e', 'user', '100.0000', '+34 123'),
(53, 'user@user.com', 'a436a1a995752293411fbe82516058f729c4b4cf', 'user', '100.0000', '+334 123123'),
(54, 'example@mail.com', 'a436a1a995752293411fbe82516058f729c4b4cf', 'user', '100.0000', '+34 123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD KEY `upper_cat_id` (`upper_cat_id`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
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
-- Indices de la tabla `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`),
  ADD KEY `object_id` (`object_id`);

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
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `object`
--
ALTER TABLE `object`
  MODIFY `object_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`upper_cat_id`) REFERENCES `categories` (`cat_id`);

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

--
-- Filtros para la tabla `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`object_id`) REFERENCES `object` (`object_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
