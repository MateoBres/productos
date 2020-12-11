-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2020 a las 17:51:27
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_integrador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(1, 'TV'),
(2, 'Tablet'),
(3, 'Notebook'),
(4, 'Smartwatch'),
(5, 'Drone'),
(6, 'Software'),
(7, 'Smartphone'),
(8, 'Parlantes'),
(9, 'Microondas'),
(10, 'Microondas'),
(11, 'Lavarropas'),
(12, 'Secarropas'),
(13, 'Lavasecarropas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `sitio_web` varchar(150) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `observaciones` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `sitio_web`, `telefono`, `observaciones`) VALUES
(1, 'LG', 'https://lg.com', '0800-888-5454', NULL),
(2, 'Samsung', 'https://samsung.com', '011-4109-4000', 'Creador de la línea Galaxy de celulares'),
(3, 'Apple', 'https://apple.com', '1-800-275-2273', 'Tel de Estados Unidos'),
(4, 'DJI', 'https://dji.com', '+86 (0)755 26656677', 'Número 1 en drones'),
(5, 'JBL', 'https://jbl.com', '(800) 336-4525', ''),
(6, 'Logitech', 'https://logitech.com', '+1 510-795-8500', NULL),
(7, 'Microsoft', 'https://microsoft.com', '(800) 642 7676', 'Creadora de Windows y Office'),
(8, 'Sony', 'https://www.sony.com.ar', '011 4896-5200', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `id_marca` int(11) NOT NULL,
  `precio` decimal(8,2) UNSIGNED NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `garantia` tinyint(3) UNSIGNED NOT NULL,
  `detalles` varchar(3000) DEFAULT NULL,
  `envio` tinyint(1) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `id_categoria`, `id_marca`, `precio`, `stock`, `garantia`, `detalles`, `envio`, `foto`) VALUES
(3, 'Galaxy S9 64GB', 1, 1, '54725.00', 1, 3, 'Oferta! Samsung Galaxy S9 con 64GB de RAM', 1, 'jpg'),
(5, 'Mavic Mini', 5, 4, '54450.00', 50, 24, 'Con tan solo 249 g, Mavic Mini ofrece 30 min de vuelo, transmisión HD de 2 km y un estabilizador en 3 ejes con una cámara 2.7K.', 1, 'jpg'),
(32, 'Galaxy S10 128GB', 7, 2, '100100.00', 234, 6, 'Pantalla Dynamic AMOLED con bordes minimizados y QuadHQ+ para una vista cinemática. 4 cámaras de nivel profesional. Teleobjetivo para primeros planos, lente ultra gran angular, lente para fotos nocturnas y cámara frontal con enfoque ultra rápido. Carga inalámbrica compartida con Wireless Powershare.', 1, 'jpg'),
(34, 'Mavic 2 Pro', 5, 4, '350900.00', 100, 6, 'El Mavic 2 Pro viene equipado con la nueva cámara Hasselblad L1D-20c, que posee la tecnología Hasselblad Natural Color Solution (HNCS), exclusiva de Hasselblad, que ayuda a los usuarios a capturar magníficas tomas aéreas de 20 megapíxeles con detalles de color asombrosos.', 1, 'jpg'),
(35, 'Series 5 Ultra', 3, 2, '63800.00', 90, 24, 'Ultrabook superdelgada y liviana con menos de 1,5kg de peso.', 0, 'jpg'),
(36, 'Microsoft Windows 10 Pro', 6, 7, '13970.00', 138, 12, 'Sistema operativo Windows 10 Pro', 1, 'jpg'),
(37, 'SmartTV 42', 1, 1, '40920.00', 8, 12, 'Excelente calidad de imagen. Apps: Netflix, entre otras.', 1, 'jpg'),
(78, 'Office Professional 2019', 6, 7, '30140.00', 970, 24, 'Incluye Word, Excel, PowerPoint, Outlook, Publisher y Access. Licencia para uso doméstico y comercial del producto estrella de Microsoft.', 1, 'jpg'),
(79, 'X72F LED 4K Ultra', 1, 8, '75900.00', 15, 24, 'X72F| LED | 4K Ultra HD | Alto rango dinámico (HDR) | Smart TV', 1, 'jpg'),
(80, 'TV X85F', 1, 8, '126500.00', 3, 24, 'Una imagen más clara y colorida. Un chip increíblemente realista. Con la tecnología Object-based HDR remaster y Super Bit Mapping 4K HDR, nuestro 4K HDR Processor X1™ reproduce una profundidad y unas texturas mejoradas, además de unos colores naturales. Disfruta de colores puros y un mayor nivel de brillo en imágenes ultrarrealistas.', 1, 'jpg'),
(81, 'Parlante JBL Flip 5', 8, 5, '15730.00', 72, 6, 'Portátil inalámbrico blue', 1, 'jpg'),
(82, 'Parlante Bluetooth JBL GO 2 Red', 8, 5, '5564.90', 153, 6, 'El parlante Bluetooth JBL GO 2 cuenta con un diseño ultra compacto de forma cuadrada y viene en llamativos colores. Gracias a sus medidas (7,1 cm de alto x 8,6 cm de ancho x 3,1 cm de profundidad) y a su peso, de tan solo 130 gramos, vas a poder transportarlo fácilmente y llevar tu música favorita a donde vayas. Ademas, es resistente al agua IPX7, lo cual te permitira llevar tu música llevar a la pileta o a la playa.', 1, 'jpg'),
(84, 'Apple Watch Series 5', 4, 3, '130900.00', 33, 12, 'Un reloj como nunca antes viste. Con la pantalla Retina siempre activa, puedes ver la hora y la carátula todo el tiempo. Monitorea rápidamente tu frecuencia cardiaca y recibe notificaciones si parece estar demasiado alta o baja.', 1, 'jpg'),
(117, 'Drone XLR40 cámara con autofoco', 5, 4, '103092.00', 0, 12, 'Drone con cámara con autofoco y estabilizador de 3 ejes', 1, 'jpg'),
(118, 'Drone Mavic 2', 5, 4, '88499.40', 3, 12, 'Drone ultra liviano con buen alcance', 1, 'jpg'),
(119, 'Drone Mavic 2 b', 5, 4, '88644.60', 5, 24, 'Otro drone ultra liviano con buen alcance', 1, 'jpg'),
(120, 'Drone Mavic 2 b', 5, 4, '88644.60', 5, 24, 'Drone con control remoto de repuesto', 1, 'jpg'),
(122, 'Windows 10 pro', 6, 7, '8844.00', 5, 12, 'licencia digital', 1, 'jpg'),
(123, 'Office 2019 Home & Student', 6, 12, '20152.00', 5, 24, 'word, excel, powerpoint', 1, 'jpg'),
(124, 'Windows 7 oferta', 6, 7, '2240.00', 4, 12, 'Con soporte por 2 años', 1, 'jpg'),
(125, 'Otro Drone super fast', 5, 4, '39627.50', 40, 12, NULL, 1, 'jpg'),
(126, 'Otro Drone chiquito', 5, 4, '32670.00', 0, 24, NULL, 1, 'jpg'),
(127, 'Drone Mavic Mini 2', 5, 4, '95920.00', 5, 12, 'Nuevo modelo 2020', 1, 'jpg'),
(129, 'Drone Mavic Mini 2', 5, 4, '95920.00', 5, 12, NULL, 1, 'jpg'),
(130, 'Drone Mavic Mini 2', 5, 4, '8800.00', 5, 12, NULL, 1, 'jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `username` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_de_alta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `username`, `nombre`, `apellido`, `password`, `fecha_de_alta`) VALUES
(1, 'mperez', 'Mariana', 'Pérez', '$2y$10$0jzTrzP0vxGTwyRBYGsuZ.ATPV10ufIqj5LI8m9XEYG8jn2D/j8a6', '2009-07-01 00:00:00'),
(2, 'cgarcia', 'Claudio', 'García', 'cla111', NULL),
(3, 'jromero', 'Juan', 'Romero', 'abc123', '2020-01-08 10:37:14'),
(4, 'glopez', 'Gustavo', 'López', 'abcabcabc', '2004-08-19 09:30:17'),
(5, 'ugarcia', 'Úrsula', 'García', '333444', '2019-04-30 02:58:57'),
(6, 'vperalta', 'Valeria', 'Peralta', '$2y$10$fRsFgvxqHIfmhdCTLF4Sa.qisw7mZllgirIWcn6VHuOI3ng86HEte', '2020-02-18 08:14:36'),
(7, 'vlopez', 'Valeria', 'López', '7863adg4h5n64855', NULL),
(8, 'atorres', 'Ana', 'Torres', '!holahola!', NULL),
(9, 'cperez', 'Carla', 'Pérez', 'adfa435634adf', '2019-11-01 11:23:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
