-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 17:37:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pt02_alfonso_delgado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Titol` varchar(40) NOT NULL,
  `Cos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`ID`, `user_id`, `Titol`, `Cos`) VALUES
(3, 0, 'Reciclaje Creativo', 'El reciclaje mejora la creatividad.'),
(18, 0, 'La Magia de la Fotografía', 'la fotografía transforma nuestra percepción del mundo.'),
(19, 0, 'Innovación en Medicina', 'Descubrimientos recientes que están cambiando la atención médica'),
(20, 0, 'El Poder de la Música', 'Cómo la música influye en nuestras emociones y mente.'),
(21, 0, 'Cocina Vegana Fácil', 'Recetas simples y deliciosas para el día a día.'),
(22, 0, 'Tecnología y Futuro', 'Impacto de la inteligencia artificial en la vida diaria.'),
(23, 0, 'Energía Solar: Futuro Brillante', 'Breve análisis de los avances en energías renovables.'),
(24, 0, 'Ciencia de los Sueños', 'Descubre cómo y por qué soñamos.'),
(25, 0, 'Naturaleza Salvaje', 'Los ecosistemas más impresionantes y peligrosos del planeta.'),
(26, 0, 'Lectura Digital', 'Ventajas y desafíos de los libros electrónicos.'),
(27, 0, 'Innovación en la Educación', 'Nuevas tecnologías y métodos en el aprendizaje.'),
(28, 0, 'Viajar en Solitario', 'Ventajas y consejos para disfrutar de un viaje en solitario.'),
(29, 0, 'El Misterio de la Antártida', 'Lo que se esconde en el continente más frío del mundo.'),
(30, 0, 'Psicología del Color', 'Cómo los colores influyen en nuestras emociones y decisiones.'),
(31, 0, 'El Renacer del Vinilo', 'El regreso de los discos de vinilo en la era digital.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `ID` int(11) NOT NULL,
  `usuari` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`ID`, `usuari`, `correo`, `contraseña`) VALUES
(1, 'adelgado', 'alfomso32@hotmail.es', '$2y$10$foLLfYXiLdpeT0JBD88s/OAlTy/pE8SBNe7OpOCZ/XYgiJ0gzIRzG'),
(3, 'adelgado2', 'alfomso3232@hotmail.es', '$2y$10$sLdaN1ncLRVQ7N1mO7ZHhu6QeFZP5EtdxNmEt2L7fQxvfDUbTP2MW'),
(5, 'adelgado1', 'alfomso32@hotmail.es', '$2y$10$nnWChd8AR9PMIIQJT7uA1OrkZnsmshv0vnObUmGGkOyaPkTKxtlMe');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `usuari` (`usuari`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
