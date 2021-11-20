SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



-- Base de datos: `notas` jhon anderson

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint(12) NOT NULL,
  `nombre` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `grado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `grado`) VALUES
(71, '701', 'Septimo'),
(72, '702', 'Septimo'),
(73, '703', 'Septimo'),
(81, '801', 'Octavo'),
(82, '802', 'Octavo'),
(83, '803', 'Octavo'),
(91, '901', 'Noveno'),
(92, '902', 'Noveno'),
(93, '903', 'Noveno'),
(1001, '1001', 'Decimo'),
(1002, '1002', 'Decimo'),
(1003, '1003', 'Decimo'),
(1101, '1101', 'Once'),
(1102, '1102', 'Once');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` bigint(12) NOT NULL,
  `nombre1` varchar(20) NOT NULL,
  `nombre2` varchar(20) NOT NULL,
  `apellido1` varchar(20) NOT NULL,
  `apellido2` varchar(20) NOT NULL,
  `grado` varchar(10) NOT NULL,
  `curso` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `grado`, `curso`) VALUES
(123, 'jhon', 'ass', 'Medina', 'Tovar', 'Octavo', 802),
(456, 'homero', 'homex', 'Falla', 'garza', 'Decimo', 1001),
(789, 'Ana', 'Maria', 'Arias', 'Atahualpa', 'Noveno', 902);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

DROP TABLE IF EXISTS `grados`;
CREATE TABLE IF NOT EXISTS `grados` (
  `id` bigint(12) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id`, `nombre`) VALUES
(7, 'Septimo'),
(8, 'Octavo'),
(9, 'Noveno'),
(10, 'Decimo'),
(11, 'Once');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`) VALUES
(123, 'calculo'),
(456, 'Ingles'),
(789, 'Matemáticas'),
(147, 'quimica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas_estudiantes_materias`
--

DROP TABLE IF EXISTS `notas_estudiantes_materias`;
CREATE TABLE IF NOT EXISTS `notas_estudiantes_materias` (
  `id_estudiante` bigint(12) NOT NULL,
  `id_materia` bigint(10) NOT NULL,
  `puntaje` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas_estudiantes_materias`
--

INSERT INTO `notas_estudiantes_materias` (`id_estudiante`, `id_materia`, `puntaje`) VALUES
(123, 123, '3.00'),
(123, 789, '2.50'),
(123, 456, '4.00'),
(456, 123, '4.00'),
(456, 456, '3.00'),
(123, 147, '3.00'),
(456, 789, '0.00'),
(456, 147, '0.00'),
(1010115909, 123, '3.50');
COMMIT;

