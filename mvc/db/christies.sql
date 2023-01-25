-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2023 a las 23:37:27
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
(1, 'virtual_trips', 'A virtual tour is a simulation of an existing location, usually composed of a sequence of videos, still images or 360-degree images. It may also use other multimedia elements such as sound effects, music, narration, text and floor map. It is distinguished from the use of live television to affect tele-tourism.', 'http://localhost/christies-meta/mvc/view/categories-images/1/main.jpg', NULL),
(2, 'virtual_gastronomy', 'By using advanced technology, we are able to recreate the experience of eating by hacking vision, gustation, olfaction, audition and touch thus tricking people’s senses into believing that the false food that it has being eated is a gourmet meal. ', 'http://localhost/christies-meta/mvc/view/categories-images/2/main.jpg', NULL),
(3, 'impossible_sports', 'Exploring the most extreme and innovative sports from around the world. Here you can find stories of athletes pushing their limits in disciplines such as skateboarding, snowboarding, mountain biking, rock climbing, surfing and more. Whether it\'s trying out an unorthodox trick or finding new ways to break records - Impossible Sports will bring you closer to some of the wildest action on two wheels or four!', 'http://localhost/christies-meta/mvc/view/categories-images/3/main.webp', NULL),
(4, 'virtual_clothes', 'What is a virtual clothing?\r\nDigital fashion is 3D-designed, virtual clothing made with both humans and our digital avatars in mind. Instead of using physical fabric and textiles, digital clothes are designed on 3D computer software to be worn by your online avatars or edited onto your body using augmented reality.', 'http://localhost/christies-meta/mvc/view/categories-images/4/main.jpg', NULL);

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
(5, 'Morbi a ipsum. Integer a nibh. In quis justo.', '2023-01-23', 4, 4),
(18, 'asfdasdfasdfasdfa', '2023-01-23', 3, 1),
(19, 'sadfasdfasdfasdf', '2023-01-24', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `content` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `name`, `email`, `content`, `date`) VALUES
(1, 'Aitor', 'aitor@mail.com', 'dfaiosusdiofuaoisdfu', '2023-01-25 19:32:57');

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
  `img1` varchar(900) DEFAULT NULL,
  `img2` varchar(900) DEFAULT NULL,
  `img3` varchar(900) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `object`
--

INSERT INTO `object` (`object_id`, `name`, `lat`, `lon`, `price`, `img1`, `img2`, `img3`, `cat_id`) VALUES
(3, 'Dehe Now trip', '33.73192600', '67.06815300', '713.6173', 'https://img.freepik.com/foto-gratis/collage-concepto-experiencia-inmersiva_23-2149498347.jpg?w=1380&t=st=1674681969~exp=1674682569~hmac=f89b4967a248bdcf701efb626a6eb35c3e3a58128ad171418d256a1d48a4f514', 'https://img.freepik.com/foto-gratis/hombre-auriculares-vr-tocando-pantalla_53876-98069.jpg?w=1380&t=st=1674681994~exp=1674682594~hmac=280c5cfe06c27a98c8569ab0c0f107c0ded5ce69029cd9d79ff93ccff2d62334', NULL, 1),
(4, 'Norrkoping trip', '58.89650660', '15.43235070', '864.5667', 'https://img.freepik.com/foto-gratis/camino-medio-desierto-magnificas-montanas-california_181624-26966.jpg?w=1380&t=st=1674682070~exp=1674682670~hmac=4db7c34a06da72bd55360284b373b46bd2b0e4e56c44fead543c120b6341ea24', 'https://img.freepik.com/foto-gratis/viajar-montanas-anaga_1182-1077.jpg?w=1380&t=st=1674682088~exp=1674682688~hmac=f2e80796e69813525e6ca8f95203045e785fe0d1aafa1133465ea9f757ecd7de', 'https://img.freepik.com/foto-gratis/vista-panoramica-pico-roys-nueva-zelanda-montanas-bajas-distancia-celaje_181624-29300.jpg?w=1380&t=st=1674682111~exp=1674682711~hmac=5f88a419fdce600ac8c280c062e1a4cfa7c1b3ebc9e4f4e1bdd6503ffabada6d', 1),
(5, 'Sao Sepe trip', '-30.16478070', '-53.56082750', '998.4541', 'https://img.freepik.com/foto-gratis/enfoque-selectivo-joven-mochilero-sosteniendo-mapa-papel-mujer-bonita-sombrero-sostiene-telefono-inteligente-muestra-tarjeta-credito-mano-usan-pagar-viaje-felicidad-vacaciones_1150-46951.jpg?w=1380&t=st=1674682284~exp=1', 'https://img.freepik.com/foto-gratis/concepto-telefono-viaje-navegacion-viaje-viaje-vacaciones_53876-127696.jpg?w=1380&t=st=1674682646~exp=1674683246~hmac=24032f9a840f0675eae82944088989363d13749f9992529213f967cc9cc90713', NULL, 1),
(6, 'Sidamukti', '-6.85892500', '108.20809730', '645.0036', 'https://img.freepik.com/foto-gratis/varon-barbudo-joven-que-trabaja-computadora-portatil-viaje_23-2148154958.jpg?w=1380&t=st=1674682397~exp=1674682997~hmac=070cca7304aafc0fc8b0db2f7022a8f451e5aeef6d5433efc797f0095994dfd1', 'https://img.freepik.com/vector-gratis/viaje-aventura-viajes-destinos-viajar-alrededor-mundo-viaje-plan-viaje-turistas-consejos-turismo-vector-ilustracion_460848-15104.jpg?w=1380&t=st=1674682716~exp=1674683316~hmac=f13f646fe2c1709f300651d7c5e28051e8b3e8985587af00df539818d1e384ef', NULL, 1),
(7, 'Concepcion', '-34.63109230', '-58.88014990', '881.5191', 'https://img.freepik.com/vector-gratis/carteles-dibujos-animados-caminatas-extremas-hombre-viajero-mapa-viaje-montana-xtreme-travel-turismo-aventura-soporte-mochila-paisaje-rocoso-mirar-puente-colgante-sobre-picos_107791-6863.jpg?w=1380&t=st=1674682723~exp=1674683323~hmac=49146ccc23b1d9001c4f2b93093ed51baa831cb1d3ba8a537414ab99b4277ced', 'https://img.freepik.com/foto-gratis/grupo-jovenes-levantar-mano-significado-aventura-exitosa-terminada-senderismo-camping-viaje-al-aire-libre-bosque-viajes-concepto-vacaciones-verano_640221-149.jpg?w=1380&t=st=1674682739~exp=1674683339~hmac=63678723eaf965ead0f7e9a80c50e6721e7fb6fa613bb5e1bdefc9315df22a50', NULL, 1),
(9, 'Mandala', '-7.34775600', '108.88188590', '814.4871', 'https://img.freepik.com/vector-gratis/pagina-inicio-dibujos-animados-viajes-galaxias-planetas-espacio-exterior-objetos-cosmicos-oscuro-cielo-estrellado-cosmos-exploracion-universo-aventura-viaje-cientifico-fantasia-futurista-banner-web_107791-5920.jpg?w=1380&t=st=1674682707~exp=1674683307~hmac=490272037aa3aaacf8f5b6907f274ce77577d5d072ad959840bed4e5f6b496dc', 'https://img.freepik.com/foto-gratis/joven-viajero-mochila-relajante-al-aire-libre_1421-190.jpg?w=1380&t=st=1674683386~exp=1674683986~hmac=b65c5f4c520d4cf5fae1b11c941ba178df677064da1cb4acdea50cfba2692afd', NULL, 1),
(10, 'Tabunny', '52.77498700', '78.80887400', '39.2620', 'https://img.freepik.com/vector-gratis/viaje-familiar-carretera-furgoneta-ilustracion-vectorial-plana-madre-padre-e-hijos-viajando-camion-o-camper-vacaciones-verano-pasando-tiempo-juntos-divirtiendose-aventura-concepto-viaje_74855-24111.jpg?w=1380&t=st=1674682732~exp=1674683332~hmac=30b9345881e7062e307d52a1dd2f91f16ef238449090da8a065f90d12ffc29bb', 'https://img.freepik.com/foto-gratis/viaje-avion-avion-viaje_53876-30273.jpg?w=1380&t=st=1674683359~exp=1674683959~hmac=752547b7f5b8d7d0db41e6b60d47a2cee706d371369593ce6d258e87b047dd30', NULL, 1),
(12, 'Catfish Fillets', NULL, NULL, '524.4215', 'https://img.freepik.com/vector-gratis/rebanadas-pizza-ilustracion-vector-plano-pantalla-tableta-hombre-pidiendo-comida-rapida-linea-usando-dispositivo-digital-aplicacion-telefonica-comida-concepto-entrega-banner-diseno-sitio-web-o-pagina-web-inicio_74855-25260.jpg?w=1380&t=st=1674683516~exp=1674684116~hmac=a6dddd3372005b0c2eb477917d21125513fd7c923c2bfbed454acd85edb557d5', 'https://img.freepik.com/foto-gratis/alimentos-frescos-estilo-vida-saludable-organico_53876-123820.jpg?w=996&t=st=1674683535~exp=1674684135~hmac=cb9e805501519d77b8da45095bca57dc649a10933745976c909d6c2117bb6950', NULL, 2),
(13, 'Tea Darjeeling Azzura', NULL, NULL, '471.3322', 'https://images.unsplash.com/photo-1523920290228-4f321a939b4c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1176&q=80', 'https://images.unsplash.com/photo-1484501893812-f1923a3dd028?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80', NULL, 2),
(14, 'Turkey', NULL, NULL, '991.6976', 'http://localhost/christies-meta/mvc/view/categories-images/2/14_1.jpg', 'https://images.unsplash.com/photo-1574672281194-db420378032d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', '', 2),
(15, 'Ice Cream', NULL, NULL, '524.0855', 'https://images.unsplash.com/photo-1654010178325-1aac33b42833?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', 'https://images.unsplash.com/photo-1631700611307-37dbcb89ef7e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', NULL, 2),
(16, 'Apple', NULL, NULL, '687.3253', 'https://images.unsplash.com/photo-1662144374212-75bf8d6f9995?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', 'https://images.unsplash.com/photo-1667946702353-5af3b5a51bc1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80', NULL, 2),
(17, 'Pastry Donnut', NULL, NULL, '688.4255', 'https://images.unsplash.com/flagged/photo-1621757458931-a1b076e5a8bb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', 'https://images.unsplash.com/photo-1670307335853-a3f0b0fe87b2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', NULL, 2),
(18, 'Birthday Party', NULL, NULL, '812.4875', 'https://img.freepik.com/foto-gratis/celebracion-cumpleanos-virtual-nueva-vida-normal_53876-167267.jpg?w=1380&t=st=1674683649~exp=1674684249~hmac=b4dc5498fc97a26ea736060410eca65f7ccfb24c186965107c8c861d3e62f43e', 'https://images.unsplash.com/photo-1513151233558-d860c5398176?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', NULL, 2),
(19, 'Digital Giveaway', NULL, NULL, '238.9256', 'https://img.freepik.com/foto-gratis/scooter-entrega-fuera-telefono-inteligente-puntero-ubicacion-concepto-comercio-electronico-entrega-linea-sobre-fondo-azul-ilustracion-3d_56104-1806.jpg?w=996&t=st=1674683638~exp=1674684238~hmac=9b970ecaf34bad8ad229980e659a32e7aab9906ca2ee132717382dc23109073f', 'https://images.unsplash.com/photo-1647221598398-934ed5cb0e4f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', NULL, 2),
(20, 'Blue Orange', NULL, NULL, '47.3239', 'https://images.unsplash.com/photo-1494253109108-2e30c049369b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', NULL, NULL, 2),
(21, 'Impossible Driving', NULL, NULL, '690.4258', 'https://images.unsplash.com/photo-1638305451837-4a2417378fb5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1934&q=80', 'https://images.unsplash.com/photo-1638305452015-01a9b23d3dc0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80', 'https://images.unsplash.com/photo-1638305451920-78f2bdb87c9c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1267&q=80', 3),
(22, 'Digital Skating', NULL, NULL, '165.4140', 'https://images.unsplash.com/photo-1655611586746-85ebbfc63f92?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80', 'https://images.unsplash.com/photo-1646124714039-cce1291c4ff1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', NULL, 3),
(23, 'Cubic Golf', NULL, NULL, '355.9375', 'https://images.unsplash.com/photo-1662131885200-8de2b3a1b924?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1331&q=80', NULL, NULL, 3),
(24, 'Astro Football', NULL, NULL, '150.7528', 'https://images.unsplash.com/photo-1655609080543-52b53d026c6a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', NULL, NULL, 3),
(25, 'Tennis Two', NULL, NULL, '960.4815', 'https://images.unsplash.com/photo-1659318006095-4d44845f3a1b?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2110&q=80', NULL, NULL, 3),
(26, 'Threebasketball', NULL, NULL, '379.7887', 'https://images.unsplash.com/photo-1653712746236-1e921698ea05?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', 'https://images.unsplash.com/photo-1653145723706-84337058fc10?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1932&q=80', NULL, 3),
(27, 'Swimming impossible', NULL, NULL, '743.1056', 'https://images.unsplash.com/photo-1660000770692-2e8b0c376ae1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1333&q=80', NULL, NULL, 3),
(28, 'Digital cycling', NULL, NULL, '268.6949', 'https://images.unsplash.com/photo-1646124714049-a17451968045?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', NULL, NULL, 3),
(29, 'Hockey impossible', NULL, NULL, '179.4869', 'https://images.unsplash.com/photo-1626890631686-0b3113188c48?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', NULL, NULL, 3),
(30, 'Rugby impossible', NULL, NULL, '863.4162', 'https://images.unsplash.com/photo-1673305414273-307a1fe7e959?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80', 'https://plus.unsplash.com/premium_photo-1672051626570-f7e28735bac0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1332&q=80', NULL, 3),
(31, 'Skirt', NULL, NULL, '813.9486', 'https://cdn3d.iconscout.com/3d/premium/thumb/skirt-6014282-4980192.png', NULL, NULL, 4),
(32, 'Tshirt', NULL, NULL, '611.3767', 'https://cdn3d.iconscout.com/3d/premium/thumb/tshirt-4408273-3663978.png', 'https://cdn3d.iconscout.com/3d/premium/thumb/t-shirt-rating-4031646-3345769@0.png', NULL, 4),
(33, 'Shoes', NULL, NULL, '131.7869', 'https://cdn.dribbble.com/users/1279240/screenshots/6858359/shot_pablo_vargas_dribbble_4x.png?compress=1&resize=400x300&vertical=top', 'https://cdn.dribbble.com/users/2117898/screenshots/11959426/media/402df3d790b35427b2d3d3d67a45ee8c.png?compress=1&resize=400x300', NULL, 4),
(34, 'Tracksuit', NULL, NULL, '920.1979', 'https://cdn.dribbble.com/users/156486/screenshots/5024028/media/0f2434c45605f614ddff2eb62b9536a7.jpg?compress=1&resize=400x300', NULL, NULL, 4),
(35, 'Jeans_virtual', NULL, NULL, '18.8810', 'https://cdn3d.iconscout.com/3d/premium/thumb/jeans-pant-6468039-5350181.png', NULL, NULL, 4),
(36, 'Hoodie', NULL, NULL, '590.8842', 'https://cdn3d.iconscout.com/3d/premium/thumb/hoodie-6354584-5229812.png', NULL, NULL, 4);

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

--
-- Volcado de datos para la tabla `purchases`
--

INSERT INTO `purchases` (`purch_id`, `date`, `object_id`, `user_id`) VALUES
(2, '2023-01-23', 3, 1),
(3, '2023-01-23', 4, 1),
(4, '2023-01-24', 5, 1),
(5, '2023-01-25', 31, 1);

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
(1, 3, 2),
(2, 7, 1),
(3, 33, 1);

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
(1, 'admin@mail.com', '0acc00bf8abac7533d0e07b01b8079fb6ec4b4c5', 'admin', '96609.4133', '+34 677599796'),
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
-- Indices de la tabla `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `object`
--
ALTER TABLE `object`
  MODIFY `object_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

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
