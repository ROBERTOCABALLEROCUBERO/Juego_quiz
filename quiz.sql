-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 05:12:06
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quiz`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `texto` varchar(250) NOT NULL,
  `respuesta_bien` varchar(200) NOT NULL,
  `respuesta_mal1` varchar(200) NOT NULL,
  `respuesta_mal2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `tipo`, `texto`, `respuesta_bien`, `respuesta_mal1`, `respuesta_mal2`) VALUES
(1, 'textarea', '¿En que año ganó España el mundial?', '2010', '2014', '2008'),
(2, 'Checkbox', '¿En que ligas ha jugado Cristiano Ronaldo?', 'La liga', 'Liga de Portugal', 'Premier league'),
(3, 'RadioButton', '¿Dónde es el mundial en el año 2022?', 'Qatar', 'Argentina', 'Francia'),
(4, 'Button', '¿Cuál fue el campeón de la liga 2021/2022?', 'Real Madrid CF', 'Barcelona', 'Atlético de Madrid'),
(5, 'Select', '¿Quién es el máximo goleador de la historia del Real Madrid CF?', 'Cristiano Ronaldo', 'Di Stefano', 'Butragueño'),
(6, 'RadioButton', '¿Cómo se llama el estado del FC Barcelona?', 'Spotify Camp Nou', 'Camp nou', 'Nou Camp'),
(7, 'RadioButton', '¿Cuál es el apodo del entrenado del Atlético de Madrid?', 'Cholo Simeone', 'Loco Simeone', 'Mono Simeone');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `nombre_FK` varchar(100) NOT NULL,
  `puntuacion` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`nombre_FK`, `puntuacion`) VALUES
('roberto', 60),
('roberto', 72),
('juan', 53),
('pepito', 48),
('Ruby', 53),
('roberto', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `grado` int(20) NOT NULL,
  `foto` varchar(200) CHARACTER SET utf8 NOT NULL,
  `mensaje` varchar(250) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`grado`, `foto`, `mensaje`) VALUES
(1, 'Imagenes/muybien.gif', 'Lo has hecho muy bien'),
(2, 'Imagenes/ok.png', 'Lo has hecho bien'),
(3, 'Imagenes/mal.jpg', 'Lo has hecho regular'),
(4, 'Imagenes/muymal.jpg', 'Lo has hecho mal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `imagen` varchar(2000) NOT NULL DEFAULT 'Imagenes/predeterminado.webp'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `contrasena`, `imagen`) VALUES
('jose', 'nuncase', 'Imagenes/predeterminado.webp'),
('juan', 'juan123', 'Imagenes/predeterminado.webp'),
('pepito', '1234', 'Imagenes/predeterminado.webp'),
('roberto', 'gambita', 'Imagenes/goku.jpg'),
('Ruby', 'jamon', 'Imagenes/predeterminado.webp');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD KEY `nombre_FK` (`nombre_FK`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `puntuaciones_ibfk_1` FOREIGN KEY (`nombre_FK`) REFERENCES `usuarios` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
