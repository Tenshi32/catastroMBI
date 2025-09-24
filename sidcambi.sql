-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-09-2025 a las 16:30:10
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
-- Base de datos: `sidcambi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abogado`
--

CREATE TABLE `abogado` (
  `id_abogado` bigint(12) NOT NULL,
  `nombre_abogado` varchar(50) NOT NULL,
  `apellido_abogado` varchar(50) NOT NULL,
  `inpre_abogado` varchar(8) NOT NULL,
  `cedula_abogado` varchar(12) NOT NULL,
  `telefono_abogado` int(11) NOT NULL,
  `corre_abogado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `abogado`
--

INSERT INTO `abogado` (`id_abogado`, `nombre_abogado`, `apellido_abogado`, `inpre_abogado`, `cedula_abogado`, `telefono_abogado`, `corre_abogado`) VALUES
(13614338, 'rwerwqerwer', 'werweqrqwer', '2312', '3213123', 2147483647, 'angel@gmail.com'),
(32368324, '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta_matrinomio`
--

CREATE TABLE `acta_matrinomio` (
  `id_acta_matrimonio` bigint(12) NOT NULL,
  `n_am` int(11) NOT NULL,
  `tomo_am` varchar(11) NOT NULL,
  `folio_am` varchar(11) NOT NULL,
  `fecha_am` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `acta_matrinomio`
--

INSERT INTO `acta_matrinomio` (`id_acta_matrimonio`, `n_am`, `tomo_am`, `folio_am`, `fecha_am`) VALUES
(12735771, 0, '', '', ''),
(18659368, 0, '', '', ''),
(62496446, 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor2`
--

CREATE TABLE `actor2` (
  `id_actor2` bigint(12) NOT NULL,
  `cedula_actor` int(12) NOT NULL,
  `nombre_actor` varchar(20) NOT NULL,
  `apellido_actor` varchar(20) NOT NULL,
  `telefono_actor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `actor2`
--

INSERT INTO `actor2` (`id_actor2`, `cedula_actor`, `nombre_actor`, `apellido_actor`, `telefono_actor`) VALUES
(13614338, 122133, 'wqewqewqe', 'qweqweqwe', '04263321074'),
(32368324, 0, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprobacion_contrato`
--

CREATE TABLE `aprobacion_contrato` (
  `id_aprobacion` bigint(12) NOT NULL,
  `id_contrato` bigint(12) NOT NULL,
  `fecha_otorgada` varchar(20) NOT NULL,
  `registro_autorizado` varchar(30) NOT NULL,
  `timbre_fiscal` varchar(20) NOT NULL,
  `monto_pago` float NOT NULL,
  `cuotas` float NOT NULL,
  `periodo_r` int(11) NOT NULL,
  `clausulas` varchar(250) NOT NULL,
  `v_inmueble` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `aprobacion_contrato`
--

INSERT INTO `aprobacion_contrato` (`id_aprobacion`, `id_contrato`, `fecha_otorgada`, `registro_autorizado`, `timbre_fiscal`, `monto_pago`, `cuotas`, `periodo_r`, `clausulas`, `v_inmueble`) VALUES
(17072550, 32368324, '2025-12-23', '', '', 0, 12, 2, '017072550', 34567),
(80203668, 13614338, '2004-02-12', '', '', 569547, 0, 0, '080203668', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_usuario`
--

CREATE TABLE `auditoria_usuario` (
  `id_auditoria` bigint(20) NOT NULL,
  `id_usuario` bigint(12) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `accion` varchar(200) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `auditoria_usuario`
--

INSERT INTO `auditoria_usuario` (`id_auditoria`, `id_usuario`, `fecha`, `hora`, `accion`, `descripcion`) VALUES
(674, 297722942, '07-03-2025', '02:55', 'Solicitud de Evacuación de Titulo Supletorio', 'Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 31'),
(675, 297722942, '07-03-2025', '02:59', 'Solicitud de Evacuación de Titulo Supletorio', 'Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 31'),
(676, 297722942, '07-03-2025', '03:02', 'Solicitud de Evacuación de Titulo Supletorio', 'Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 31'),
(677, 0, '07-03-2025', '04:10', 'Inspeccion Registrada', 'Inspeccion Registrada del inmueble con el codigo C.E 047664099'),
(678, 297722942, '06-03-2025', '04:31', 'Avaluo Realizado', 'Avaluo Realizado al Inmueble con el codigo C.E076629948'),
(679, 297722942, '07-03-2025', '05:25', 'Solicitud de Empadronamiento', 'Solicitud de Empadronamiento Registrada con el Codigo C.E 081572019'),
(680, 297722942, '07-03-2025', '05:28', 'Solicitud de Evacuación de Titulo Supletorio', 'Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 32'),
(682, 297722942, '07-03-2025', '05:48', 'Inspeccion Registrada', 'Inspeccion Registrada del inmueble con el codigo C.E 096122583'),
(683, 297722942, '07-03-2025', '05:49', 'Avaluo Realizado', 'Avaluo Realizado al Inmueble con el codigo C.E074505712'),
(684, 297722942, '07-03-2025', '06:35', 'Solicitud de Contrato', 'Solicitud de Contrato Registrada con el codigo C.E 32'),
(685, 297722942, '07-03-2025', '06:39', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(686, 297722942, '07-03-2025', '15:49', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(687, 297722942, '07-03-2025', '17:23', 'Certificacion de Contrato', 'Certificacion de Contrato Registrada con el codigo C.E 017072550'),
(688, 297722942, '07-03-2025', '19:26', 'Solicitud de Contrato', 'Solicitud de Contrato Registrada con el codigo C.E 31'),
(689, 297722942, '07-03-2025', '19:27', 'Certificacion de Contrato', 'Certificacion de Contrato Registrada con el codigo C.E 080203668'),
(690, 297722942, '08-03-2025', '15:46', 'Solicitado una Rectificacion de Medidas y Linderos', 'Sea Solicitado una Rectificacion de Medidas y Linderos al inmueble con el codigo C.E 32'),
(691, 297722942, '08-03-2025', '16:02', 'Solicitado una Rectificacion de Medidas y Linderos', 'Sea Solicitado una Rectificacion de Medidas y Linderos al inmueble con el codigo C.E 31'),
(692, 297722942, '08-03-2025', '16:03', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E065491220'),
(693, 297722942, '05-03-2025', '11:13', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E054262613'),
(694, 297722942, '08-03-2025', '11:16', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E026251498'),
(695, 297722942, '08-03-2025', '11:42', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E063820122'),
(696, 297722942, '08-03-2025', '16:59', 'Solicitado una Regulación de la Tenencia de la Tierra', 'Sea Solicitado una Regulación de la Tenencia de la Tierra al inmueble con el codigo C.E 31'),
(697, 297722942, '08-03-2025', '18:44', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(698, 21272431, '08-03-2025', '18:44', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(699, 21272431, '08-03-2025', '13:46', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E081225758'),
(700, 21272431, '08-03-2025', '18:46', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(701, 297722942, '08-03-2025', '18:46', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(702, 297722942, '08-03-2025', '19:16', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(703, 297722942, '08-03-2025', '19:16', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(704, 297722942, '08-03-2025', '19:20', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(705, 297722942, '08-03-2025', '19:34', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(706, 297722942, '08-03-2025', '19:34', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(707, 297722942, '08-03-2025', '19:38', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(708, 297722942, '08-03-2025', '19:38', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(709, 297722942, '08-03-2025', '19:38', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(710, 297722942, '08-03-2025', '19:38', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(711, 297722942, '08-03-2025', '19:40', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(712, 297722942, '08-03-2025', '19:40', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(713, 297722942, '08-03-2025', '19:41', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(714, 297722942, '08-03-2025', '19:41', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(715, 297722942, '08-03-2025', '19:47', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(716, 297722942, '08-03-2025', '19:47', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(717, 297722942, '08-03-2025', '19:47', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(718, 297722942, '08-03-2025', '19:47', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(719, 297722942, '08-03-2025', '19:47', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(720, 297722942, '08-03-2025', '19:47', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(721, 297722942, '08-03-2025', '19:50', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(722, 297722942, '08-03-2025', '19:50', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(723, 297722942, '08-03-2025', '19:50', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(724, 297722942, '08-03-2025', '19:50', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(725, 297722942, '08-03-2025', '19:51', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(726, 297722942, '08-03-2025', '19:51', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(727, 297722942, '08-03-2025', '19:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(728, 297722942, '08-03-2025', '19:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(729, 297722942, '08-03-2025', '19:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(730, 297722942, '08-03-2025', '19:54', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(731, 297722942, '08-03-2025', '20:07', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(732, 297722942, '08-03-2025', '20:07', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(733, 297722942, '08-03-2025', '20:07', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(734, 297722942, '08-03-2025', '20:08', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(735, 297722942, '08-03-2025', '20:08', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(736, 297722942, '08-03-2025', '20:08', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(737, 297722942, '08-03-2025', '20:19', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(738, 297722942, '08-03-2025', '20:20', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(739, 297722942, '08-03-2025', '20:28', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(740, 297722942, '08-03-2025', '20:29', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(741, 297722942, '08-03-2025', '20:30', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(742, 297722942, '08-03-2025', '20:31', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(743, 297722942, '08-03-2025', '20:33', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(744, 297722942, '08-03-2025', '20:37', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(745, 297722942, '08-03-2025', '20:40', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(746, 297722942, '08-03-2025', '20:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(747, 297722942, '08-03-2025', '20:47', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(748, 297722942, '08-03-2025', '20:48', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(749, 297722942, '08-03-2025', '20:49', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(750, 297722942, '08-03-2025', '20:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(751, 297722942, '08-03-2025', '20:54', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(752, 297722942, '08-03-2025', '20:55', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(753, 297722942, '08-03-2025', '20:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(754, 297722942, '08-03-2025', '20:58', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(755, 297722942, '08-03-2025', '22:53', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(756, 297722942, '09-03-2025', '01:06', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(757, 297722942, '09-03-2025', '01:06', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(758, 21272431, '09-03-2025', '01:06', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(759, 0, '09-03-2025', '01:07', 'Inscripcion del Inmueble', 'Sea Inscrito el Inmueble del codigo C.E 33'),
(760, 21272431, '09-03-2025', '01:07', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(761, 297722942, '09-03-2025', '01:07', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(762, 297722942, '09-03-2025', '01:36', 'Inspeccion Registrada', 'Inspeccion Registrada del inmueble con el codigo C.E 032518192'),
(763, 297722942, '09-03-2025', '01:41', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(764, 297722942, '09-03-2025', '01:49', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(765, 297722942, '09-03-2025', '01:51', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(766, 297722942, '09-03-2025', '01:52', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(767, 297722942, '09-03-2025', '01:52', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(768, 297722942, '09-03-2025', '01:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(769, 297722942, '09-03-2025', '01:54', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(770, 297722942, '09-03-2025', '01:55', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(771, 297722942, '09-03-2025', '02:00', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(772, 297722942, '09-03-2025', '02:00', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(773, 297722942, '09-03-2025', '02:05', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(774, 297722942, '09-03-2025', '02:05', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(775, 297722942, '09-03-2025', '02:11', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(776, 297722942, '09-03-2025', '03:10', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(777, 297722942, '09-03-2025', '03:13', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(778, 297722942, '09-03-2025', '03:49', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(779, 21272431, '10-03-2025', '14:32', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(780, 21272431, '10-03-2025', '10:18', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E061308783'),
(781, 297722942, '10-03-2025', '15:36', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(782, 297722942, '10-03-2025', '16:17', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(783, 297722942, '10-03-2025', '16:18', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(784, 297722942, '10-03-2025', '16:21', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(785, 297722942, '10-03-2025', '16:38', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(786, 297722942, '10-03-2025', '17:11', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(787, 297722942, '10-03-2025', '19:05', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(788, 297722942, '10-03-2025', '19:07', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(789, 21272431, '10-03-2025', '19:31', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(790, 21272431, '10-03-2025', '19:31', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(791, 297722942, '10-03-2025', '19:31', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(792, 297722942, '10-03-2025', '19:32', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(793, 29772294, '10-03-2025', '19:39', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(794, 29772294, '10-03-2025', '19:39', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(795, 297722942, '10-03-2025', '19:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(796, 297722942, '10-03-2025', '20:52', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(797, 21272431, '10-03-2025', '20:56', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(798, 21272431, '10-03-2025', '20:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(799, 297722942, '10-03-2025', '20:57', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(800, 297722942, '10-03-2025', '21:10', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(801, 297722942, '10-03-2025', '21:27', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(802, 297722942, '10-03-2025', '21:43', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(803, 297722942, '10-03-2025', '21:47', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(804, 297722942, '10-03-2025', '22:11', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(805, 21272431, '10-03-2025', '22:26', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(806, 21272431, '10-03-2025', '22:38', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(807, 297722942, '10-03-2025', '23:27', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(808, 297722942, '10-03-2025', '23:57', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(809, 297722942, '10-03-2025', '23:58', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(810, 297722942, '11-03-2025', '21:00', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(811, 297722942, '11-03-2025', '21:25', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(812, 297722942, '11-03-2025', '21:30', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(813, 297722942, '11-03-2025', '21:40', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(814, 297722942, '11-03-2025', '21:41', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(815, 297722942, '11-03-2025', '21:52', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(816, 297722942, '11-03-2025', '21:52', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(817, 297722942, '13-03-2025', '02:40', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(818, 297722942, '13-03-2025', '02:51', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(819, 297722942, '13-03-2025', '02:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(820, 297722942, '13-03-2025', '03:00', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(821, 297722942, '13-03-2025', '03:01', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(822, 297722942, '13-03-2025', '03:01', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(823, 297722942, '13-03-2025', '03:01', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(824, 297722942, '13-03-2025', '03:07', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(825, 297722942, '13-03-2025', '03:24', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(826, 297722942, '13-03-2025', '04:09', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(827, 297722942, '13-03-2025', '04:17', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(828, 297722942, '13-03-2025', '04:33', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(829, 297722942, '13-03-2025', '04:38', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(830, 297722942, '13-03-2025', '16:17', 'Registrado de Usuario', 'Sea actualizado los datos del usuario con el codigo CI-297722942'),
(831, 297722942, '13-03-2025', '16:18', 'Registrado de Usuario', 'Sea actualizado los datos del usuario con el codigo CI-297722942'),
(832, 297722942, '13-03-2025', '16:42', 'Negacion Registrada', 'Negacion Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E13614338'),
(833, 297722942, '13-03-2025', '16:44', 'Negacion Registrada', 'Negacion Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E13614338'),
(834, 297722942, '13-03-2025', '16:45', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(835, 297722942, '14-03-2025', '03:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(836, 297722942, '14-03-2025', '04:37', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(837, 297722942, '14-03-2025', '18:10', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(838, 297722942, '14-03-2025', '18:13', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(839, 297722942, '14-03-2025', '19:08', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(840, 297722942, '14-03-2025', '19:57', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(841, 297722942, '16-03-2025', '18:23', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(842, 297722942, '16-03-2025', '18:50', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(843, 297722942, '16-03-2025', '18:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(844, 297722942, '16-03-2025', '18:55', 'Negacion Registrada', 'Negacion Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E26251498'),
(845, 297722942, '16-03-2025', '19:16', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E'),
(846, 297722942, '16-03-2025', '14:16', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E63820122'),
(847, 297722942, '16-03-2025', '19:22', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E37859269'),
(848, 297722942, '16-03-2025', '19:26', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E54944398'),
(849, 297722942, '16-03-2025', '19:27', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E056444374'),
(850, 297722942, '16-03-2025', '14:37', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E56444374'),
(851, 297722942, '16-03-2025', '14:44', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E63820122'),
(852, 297722942, '16-03-2025', '20:52', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(853, 297722942, '16-03-2025', '21:44', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(854, 297722942, '16-03-2025', '21:46', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(855, 297722942, '16-03-2025', '21:46', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(856, 275631092, '16-03-2025', '22:06', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(857, 275631092, '16-03-2025', '22:12', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(858, 297722942, '16-03-2025', '22:12', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(859, 297722942, '16-03-2025', '22:13', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(860, 12523580, '16-03-2025', '22:38', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(861, 12523580, '16-03-2025', '22:38', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(862, 297722942, '16-03-2025', '22:45', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(863, 297722942, '16-03-2025', '23:04', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(864, 297722942, '17-03-2025', '14:28', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(865, 297722942, '17-03-2025', '15:16', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E068458810'),
(866, 297722942, '17-03-2025', '15:18', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(867, 297722942, '17-03-2025', '15:33', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(868, 297722942, '17-03-2025', '15:34', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(869, 297722942, '17-03-2025', '15:35', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(870, 297722942, '17-03-2025', '15:51', 'Solicitud Registrada', 'Solicitud Cita Registrada con el codigo C.E012064752'),
(871, 297722942, '17-03-2025', '16:15', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(872, 297722942, '17-03-2025', '16:19', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(873, 297722942, '17-03-2025', '16:53', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(874, 297722942, '17-03-2025', '16:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(875, 3212323, '17-03-2025', '17:51', 'Registrado de Usuario', 'Sea Registrado un usuario con el codigo CI-3212323'),
(876, 297722942, '17-03-2025', '20:19', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(877, 297722942, '17-03-2025', '20:20', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(878, 297722942, '17-03-2025', '20:21', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(879, 297722942, '17-03-2025', '20:21', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(880, 297722942, '17-03-2025', '20:21', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(881, 297722942, '17-03-2025', '20:21', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(882, 297722942, '17-03-2025', '20:21', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(883, 297722942, '17-03-2025', '20:27', 'Solicitud Registrada', 'Solicitud Tipo 6 Registrada con el codigo C.E048041817'),
(884, 297722942, '17-03-2025', '20:36', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(885, 297722942, '17-03-2025', '20:39', 'Solicitud Registrada', 'Solicitud Tipo 1 Registrada con el codigo C.E087049755'),
(886, 297722942, '17-03-2025', '16:06', 'Solicitud Registrada', 'Solicitud Tipo 1 Registrada con el codigo C.E077799743'),
(887, 297722942, '17-03-2025', '16:08', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E87049755'),
(888, 297722942, '17-03-2025', '16:10', 'Solicitud Registrada', 'Solicitud Tipo 1 Registrada con el codigo C.E032706519'),
(889, 297722942, '17-03-2025', '21:35', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(890, 297722942, '17-03-2025', '21:35', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(891, 297722942, '17-03-2025', '21:55', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(892, 297722942, '17-03-2025', '22:30', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(893, 297722942, '17-03-2025', '22:45', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(894, 297722942, '17-03-2025', '22:46', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(895, 297722942, '17-03-2025', '22:51', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(896, 297722942, '17-03-2025', '22:51', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(897, 297722942, '17-03-2025', '22:52', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(898, 297722942, '17-03-2025', '22:52', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(899, 297722942, '17-03-2025', '22:54', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(900, 21272431, '17-03-2025', '22:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(901, 21272431, '17-03-2025', '22:54', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(902, 297722942, '17-03-2025', '22:56', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(903, 297722942, '17-03-2025', '18:14', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(904, 297722942, '17-03-2025', '18:14', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(905, 12523579, '18-03-2025', '01:00', 'Registrado de Usuario', 'Sea Registrado un usuario con el codigo CI-12523579'),
(906, 12523579, '17-03-2025', '20:02', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(907, 297722942, '17-03-2025', '20:20', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(908, 297722942, '17-03-2025', '20:33', 'Solicitud Registrada', 'Solicitud Tipo 1 Registrada con el codigo C.E019796958'),
(909, 297722942, '17-03-2025', '20:37', 'Solicitud Registrada', 'Solicitud Tipo 6 Registrada con el codigo C.E061850134'),
(910, 297722942, '17-03-2025', '20:49', 'Solicitado una Regulación de la Tenencia de la Tierra', 'Sea Solicitado una Regulación de la Tenencia de la Tierra al inmueble con el codigo C.E 018659368'),
(911, 297722942, '17-03-2025', '21:03', 'Solicitado una Rectificacion de Medidas y Linderos', 'Sea Solicitado una Rectificacion de Medidas y Linderos al inmueble con el codigo C.E 043285035'),
(912, 297722942, '17-03-2025', '21:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(913, 297722942, '17-03-2025', '22:03', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(914, 297722942, '17-03-2025', '22:06', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(915, 297722942, '17-03-2025', '22:35', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(916, 297722942, '17-03-2025', '22:38', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(917, 297722942, '17-03-2025', '23:28', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(918, 297722942, '17-03-2025', '23:31', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(919, 297722942, '17-03-2025', '23:58', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E68458810'),
(920, 297722942, '17-03-2025', '23:58', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E77799743'),
(921, 297722942, '17-03-2025', '23:58', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E19796958'),
(922, 297722942, '17-03-2025', '23:58', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E32706519'),
(923, 297722942, '17-03-2025', '23:58', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E12064752'),
(924, 297722942, '17-03-2025', '23:58', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E61308783'),
(925, 297722942, '17-03-2025', '23:58', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E81225758'),
(926, 297722942, '18-03-2025', '00:41', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(927, 297722942, '18-03-2025', '16:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(928, 297722942, '18-03-2025', '16:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(929, 297722942, '18-03-2025', '17:31', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(930, 297722942, '18-03-2025', '18:02', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(931, 297722942, '18-03-2025', '18:02', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(932, 297722942, '18-03-2025', '18:12', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(933, 24551683, '18-03-2025', '23:15', 'Registrado de Usuario', 'Sea Registrado un usuario con el codigo CI-24551683'),
(934, 297722942, '18-03-2025', '18:16', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(935, 297722942, '18-03-2025', '19:16', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(936, 297722942, '18-03-2025', '21:30', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(937, 297722942, '18-03-2025', '21:30', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(938, 0, '18-03-2025', '21:54', 'Certificacion de Empadronamiento', 'Empadronamiento Solicitado con el Codigo C.E 074970741 Certificado por el funcionario del codigo '),
(939, 0, '18-03-2025', '21:56', 'Certificacion de Empadronamiento', 'Empadronamiento Solicitado con el Codigo C.E 090319370 Certificado por el funcionario del codigo '),
(940, 297722942, '18-03-2025', '22:52', 'Avaluo Actualizado', 'Avaluo Actualizado al Inmueble con el codigo C.E090861750'),
(941, 297722942, '18-03-2025', '22:53', 'Avaluo Actualizado', 'Avaluo Actualizado al Inmueble con el codigo C.E090861750'),
(942, 297722942, '18-03-2025', '22:53', 'Avaluo Actualizado', 'Avaluo Actualizado al Inmueble con el codigo C.E090861750'),
(943, 297722942, '18-03-2025', '22:57', 'Avaluo Actualizado', 'Avaluo Actualizado al Inmueble con el codigo C.E012740539'),
(944, 297722942, '18-03-2025', '22:57', 'Avaluo Actualizado', 'Avaluo Actualizado al Inmueble con el codigo C.E082413357'),
(945, 297722942, '18-03-2025', '23:02', 'Avaluo Actualizado', 'Avaluo Actualizado al Inmueble con el codigo C.E060821590'),
(946, 297722942, '18-03-2025', '23:32', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(947, 21272431, '18-03-2025', '23:32', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(948, 21272431, '18-03-2025', '23:52', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(949, 21272431, '18-03-2025', '23:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(950, 21272431, '19-03-2025', '00:14', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(951, 3212323, '19-03-2025', '00:15', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(952, 3212323, '19-03-2025', '00:23', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(953, 12523580, '19-03-2025', '00:23', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(954, 12523580, '19-03-2025', '00:28', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(955, 297722942, '19-03-2025', '00:37', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(956, 297722942, '19-03-2025', '00:57', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(957, 297722942, '19-03-2025', '09:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(958, 297722942, '19-03-2025', '09:54', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E81572019'),
(959, 297722942, '19-03-2025', '10:02', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E54944398'),
(960, 297722942, '19-03-2025', '10:02', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E37859269'),
(961, 297722942, '19-03-2025', '10:02', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E48041817'),
(962, 297722942, '19-03-2025', '10:03', 'Solicitud Registrada', 'Solicitud de Cita Registrada con el codigo C.E047351638'),
(963, 297722942, '19-03-2025', '10:04', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E47351638'),
(964, 297722942, '19-03-2025', '10:24', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(965, 297722942, '19-03-2025', '10:39', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(966, 297722942, '19-03-2025', '10:39', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(967, 297722942, '19-03-2025', '10:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(968, 297722942, '19-03-2025', '10:42', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(969, 297722942, '19-03-2025', '10:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(970, 297722942, '19-03-2025', '10:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(971, 297722942, '19-03-2025', '10:49', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(972, 297722942, '19-03-2025', '10:49', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(973, 297722942, '19-03-2025', '10:54', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(974, 297722942, '19-03-2025', '10:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(975, 297722942, '19-03-2025', '10:55', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(976, 297722942, '19-03-2025', '10:55', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(977, 297722942, '19-03-2025', '10:55', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(978, 297722942, '19-03-2025', '10:56', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(979, 297722942, '19-03-2025', '10:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(980, 297722942, '19-03-2025', '10:56', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(981, 297722942, '19-03-2025', '10:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(982, 297722942, '19-03-2025', '10:57', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(983, 297722942, '19-03-2025', '10:57', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(984, 297722942, '19-03-2025', '10:58', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(985, 297722942, '19-03-2025', '10:59', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(986, 297722942, '19-03-2025', '10:59', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(987, 297722942, '19-03-2025', '10:59', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(988, 297722942, '19-03-2025', '11:48', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(989, 0, '19-03-2025', '12:07', 'Inscripcion del Inmueble', 'Sea Inscrito el Inmueble del codigo C.E 37'),
(990, 297722942, '19-03-2025', '13:15', 'Avaluo Realizado', 'Avaluo Realizado por el Funcionario 297722942, al Inmueble con el codigo C.E056963412'),
(991, 297722942, '19-03-2025', '13:18', 'Avaluo Realizado', 'Avaluo Realizado por el Funcionario 297722942, al Inmueble con el codigo C.E040554178'),
(992, 297722942, '19-03-2025', '13:21', 'Avaluo Realizado', 'Avaluo Realizado por el Funcionario 297722942, al Inmueble con el codigo C.E072434894'),
(993, 297722942, '19-03-2025', '13:22', 'Avaluo Realizado', 'Avaluo Realizado por el Funcionario 297722942, al Inmueble con el codigo C.E076829418'),
(994, 297722942, '19-03-2025', '13:26', 'Avaluo Realizado', 'Avaluo Realizado por el Funcionario 297722942, al Inmueble con el codigo C.E067158229'),
(995, 297722942, '19-03-2025', '14:48', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(996, 297722942, '19-03-2025', '14:51', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(997, 297722942, '19-03-2025', '14:53', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(998, 297722942, '19-03-2025', '14:55', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(999, 297722942, '19-03-2025', '15:00', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1000, 297722942, '19-03-2025', '15:13', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1001, 297722942, '19-03-2025', '16:02', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1002, 21272431, '19-03-2025', '16:02', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1003, 21272431, '19-03-2025', '16:36', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1004, 297722942, '19-03-2025', '16:36', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1005, 297722942, '19-03-2025', '16:36', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1006, 297722942, '19-03-2025', '16:36', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1007, 297722942, '19-03-2025', '16:37', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1008, 297722942, '19-03-2025', '16:37', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1009, 297722942, '19-03-2025', '16:58', 'Solicitado una Regulación de la Tenencia de la Tierra', 'Sea Solicitado una Regulación de la Tenencia de la Tierra al inmueble con el codigo C.E 012735771'),
(1010, 297722942, '19-03-2025', '17:19', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E12735771'),
(1011, 297722942, '19-03-2025', '17:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1012, 297722942, '19-03-2025', '20:08', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1013, 297722942, '19-03-2025', '20:08', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1014, 297722942, '19-03-2025', '20:29', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1015, 297722942, '20-03-2025', '08:41', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1016, 297722942, '20-03-2025', '08:41', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1017, 297722942, '20-03-2025', '08:41', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1018, 297722942, '21-03-2025', '21:32', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1019, 297722942, '21-03-2025', '21:41', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1020, 297722942, '28-03-2025', '16:32', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1021, 297722942, '28-03-2025', '19:22', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1022, 297722942, '29-03-2025', '22:49', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1023, 297722942, '29-03-2025', '22:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1024, 297722942, '29-03-2025', '22:56', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1025, 297722942, '29-03-2025', '22:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1026, 297722942, '29-03-2025', '22:56', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1027, 297722942, '29-03-2025', '22:58', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1028, 297722942, '29-03-2025', '22:59', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1029, 297722942, '29-03-2025', '23:33', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1030, 297722942, '29-03-2025', '23:34', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1031, 297722942, '29-03-2025', '23:45', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1032, 297722942, '29-03-2025', '23:45', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1033, 297722942, '29-03-2025', '23:49', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1034, 297722942, '29-03-2025', '23:50', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1035, 297722942, '29-03-2025', '23:50', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1036, 297722942, '29-03-2025', '23:50', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1037, 297722942, '29-03-2025', '23:50', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1038, 297722942, '29-03-2025', '23:51', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1039, 297722942, '29-03-2025', '23:53', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1040, 297722942, '29-03-2025', '23:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1041, 297722942, '30-03-2025', '08:17', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1042, 297722942, '30-03-2025', '15:29', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1043, 297722942, '31-03-2025', '14:20', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1044, 297722942, '31-03-2025', '15:09', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1045, 297722942, '31-03-2025', '15:09', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1046, 297722942, '31-03-2025', '15:09', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1047, 297722942, '31-03-2025', '15:10', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1048, 297722942, '31-03-2025', '16:26', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1049, 297722942, '31-03-2025', '16:26', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1050, 297722942, '01-04-2025', '10:17', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1051, 297722942, '01-04-2025', '14:09', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1052, 297722942, '01-04-2025', '14:09', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1053, 297722942, '01-04-2025', '14:09', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1054, 297722942, '01-04-2025', '14:10', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1055, 297722942, '01-04-2025', '14:11', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1056, 297722942, '01-04-2025', '14:11', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1057, 297722942, '01-04-2025', '14:11', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1058, 297722942, '01-04-2025', '14:12', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1059, 297722942, '01-04-2025', '14:14', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E61850134'),
(1060, 297722942, '01-04-2025', '14:14', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E65491220'),
(1061, 297722942, '01-04-2025', '14:14', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E43285035'),
(1062, 297722942, '01-04-2025', '18:58', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1063, 297722942, '01-04-2025', '19:03', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1064, 297722942, '01-04-2025', '19:03', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1065, 297722942, '01-04-2025', '19:03', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1066, 297722942, '01-04-2025', '19:03', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1067, 297722942, '01-04-2025', '19:20', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1068, 297722942, '01-04-2025', '19:20', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1069, 297722942, '01-04-2025', '19:20', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1070, 297722942, '01-04-2025', '19:20', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1071, 297722942, '01-04-2025', '19:20', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1072, 297722942, '02-04-2025', '11:32', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1073, 297722942, '02-04-2025', '11:34', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1074, 297722942, '02-04-2025', '11:34', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1075, 297722942, '02-04-2025', '11:34', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1076, 297722942, '02-04-2025', '11:36', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1077, 297722942, '02-04-2025', '11:36', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1078, 297722942, '02-04-2025', '11:37', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1079, 297722942, '02-04-2025', '11:37', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1080, 297722942, '02-04-2025', '11:37', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1081, 297722942, '02-04-2025', '11:37', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1082, 297722942, '02-04-2025', '11:39', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1083, 297722942, '02-04-2025', '11:39', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1084, 297722942, '02-04-2025', '11:39', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1085, 297722942, '02-04-2025', '11:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1086, 297722942, '02-04-2025', '11:42', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1087, 297722942, '02-04-2025', '12:10', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1088, 297722942, '02-04-2025', '12:15', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1089, 297722942, '02-04-2025', '12:15', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1090, 297722942, '02-04-2025', '12:18', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1091, 297722942, '02-04-2025', '12:20', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1092, 297722942, '02-04-2025', '12:25', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1093, 297722942, '02-04-2025', '12:26', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1094, 297722942, '02-04-2025', '12:28', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1095, 297722942, '02-04-2025', '12:28', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1096, 297722942, '02-04-2025', '12:28', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1097, 297722942, '02-04-2025', '12:28', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1098, 297722942, '02-04-2025', '12:30', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1099, 297722942, '02-04-2025', '12:30', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1100, 297722942, '02-04-2025', '12:31', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1101, 297722942, '02-04-2025', '12:31', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1102, 297722942, '02-04-2025', '12:32', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1103, 297722942, '02-04-2025', '12:32', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1104, 297722942, '02-04-2025', '12:32', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1105, 297722942, '02-04-2025', '12:32', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1106, 297722942, '02-04-2025', '12:32', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1107, 297722942, '02-04-2025', '12:33', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1108, 297722942, '02-04-2025', '12:33', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1109, 297722942, '02-04-2025', '12:35', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1110, 297722942, '02-04-2025', '12:43', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1111, 297722942, '02-04-2025', '12:43', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1112, 297722942, '02-04-2025', '12:44', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1113, 297722942, '02-04-2025', '12:46', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1114, 297722942, '02-04-2025', '12:46', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1115, 297722942, '02-04-2025', '12:46', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1116, 297722942, '02-04-2025', '12:46', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1117, 297722942, '02-04-2025', '12:47', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1118, 297722942, '02-04-2025', '12:47', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1119, 297722942, '02-04-2025', '12:54', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1120, 297722942, '02-04-2025', '12:54', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1121, 297722942, '02-04-2025', '12:55', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1122, 297722942, '02-04-2025', '12:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1123, 297722942, '02-04-2025', '12:56', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1124, 297722942, '02-04-2025', '13:37', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1125, 297722942, '02-04-2025', '13:40', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1126, 297722942, '02-04-2025', '14:13', 'Solicitud Registrada', 'Solicitud de Cita Registrada con el codigo C.E022160158'),
(1127, 297722942, '02-04-2025', '14:14', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E22160158'),
(1128, 297722942, '02-04-2025', '14:53', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1129, 297722942, '02-04-2025', '14:53', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1130, 297722942, '02-04-2025', '14:56', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1131, 21272431, '02-04-2025', '14:57', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1132, 21272431, '02-04-2025', '14:58', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1133, 297722942, '02-04-2025', '14:58', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1134, 297722942, '02-04-2025', '15:52', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1135, 297722942, '02-04-2025', '15:52', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1136, 297722942, '02-04-2025', '16:18', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1137, 297722942, '02-04-2025', '16:42', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1138, 297722942, '02-04-2025', '16:43', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1139, 297722942, '02-04-2025', '18:39', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1140, 297722942, '06-04-2025', '11:04', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1141, 297722942, '06-04-2025', '12:33', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1142, 297722942, '06-04-2025', '13:41', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1143, 297722942, '06-04-2025', '17:55', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1144, 297722942, '10-04-2025', '11:52', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1145, 297722942, '10-04-2025', '11:52', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1146, 297722942, '10-04-2025', '11:55', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1147, 297722942, '20-04-2025', '15:22', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1148, 297722942, '20-04-2025', '15:22', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1149, 297722942, '20-04-2025', '15:22', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1150, 297722942, '20-04-2025', '15:23', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1151, 297722942, '20-04-2025', '15:24', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1152, 297722942, '09-05-2025', '21:02', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1153, 297722942, '09-05-2025', '21:04', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1154, 297722942, '12-05-2025', '10:35', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1155, 297722942, '12-05-2025', '11:08', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1156, 297722942, '12-05-2025', '13:26', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1157, 297722942, '12-05-2025', '13:27', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1158, 297722942, '12-05-2025', '13:45', 'Solicitud Registrada', 'Solicitud de Cita Registrada con el codigo C.E079766934'),
(1159, 297722942, '12-05-2025', '13:45', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E79766934'),
(1160, 297722942, '12-05-2025', '14:31', 'Solicitud Registrada', 'Solicitud de Cita Registrada con el codigo C.E059911412'),
(1161, 297722942, '12-05-2025', '14:42', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1162, 3255334, '12-05-2025', '20:51', 'Registrado de Usuario', 'Sea Registrado un usuario con el codigo CI-3255334'),
(1163, 3255334, '12-05-2025', '14:52', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1164, 3255334, '12-05-2025', '14:53', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1165, 297722942, '12-05-2025', '14:58', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1166, 297722942, '12-05-2025', '14:59', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1167, 297722942, '12-05-2025', '14:59', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1168, 297722942, '12-05-2025', '15:20', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E59911412'),
(1169, 297722942, '13-05-2025', '08:46', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1170, 297722942, '13-05-2025', '10:26', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1171, 297722942, '13-05-2025', '10:30', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1172, 297722942, '13-05-2025', '10:31', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1173, 297722942, '13-05-2025', '15:14', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1174, 297722942, '13-05-2025', '15:16', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1175, 297722942, '13-05-2025', '15:16', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1176, 297722942, '13-05-2025', '21:18', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1177, 297722942, '30-05-2025', '20:49', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1178, 297722942, '03-06-2025', '17:39', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1179, 297722942, '03-06-2025', '17:40', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1180, 297722942, '03-06-2025', '18:32', 'Solicitud Registrada', 'Solicitud de Cita Registrada con el codigo C.E094314095'),
(1181, 297722942, '03-06-2025', '18:35', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E94314095'),
(1182, 297722942, '03-06-2025', '18:42', 'Solicitud de Empadronamiento', 'Solicitud de Empadronamiento Registrada con el Codigo C.E 063757038'),
(1183, 297722942, '03-06-2025', '18:42', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E63757038'),
(1184, 297722942, '03-06-2025', '18:42', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1185, 297722942, '03-06-2025', '18:44', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1186, 297722942, '04-06-2025', '00:18', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1187, 297722942, '04-06-2025', '14:46', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1188, 297722942, '04-06-2025', '15:35', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1189, 297722942, '10-06-2025', '13:43', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1190, 297722942, '10-06-2025', '13:51', 'Sesion Cerrada', 'Ha Cerrado Sesion'),
(1191, 297722942, '19-07-2025', '22:03', 'Sesion Iniciada', 'Ha Iniciado Sesion'),
(1192, 297722942, '19-07-2025', '22:07', 'Solicitud Registrada', 'Solicitud de Cita Registrada con el codigo C.E021576873'),
(1193, 297722942, '19-07-2025', '22:07', 'Aprobación Registrada', 'Aprobación Hecha por el funcionario de ID 297722942 a la Solicitud de con el codigo C.E21576873');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avaluo`
--

CREATE TABLE `avaluo` (
  `id_valoracion_economica` bigint(12) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `id_valoracion_terreno` bigint(12) NOT NULL,
  `id_valoracion_construccion` bigint(12) NOT NULL,
  `depresiacion` varchar(20) NOT NULL,
  `fecha_avaluo` date NOT NULL,
  `observacion_avaluo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `avaluo`
--

INSERT INTO `avaluo` (`id_valoracion_economica`, `id_inmueble_usuario`, `id_valoracion_terreno`, `id_valoracion_construccion`, `depresiacion`, `fecha_avaluo`, `observacion_avaluo`) VALUES
(76629948, 31, 76629948, 76629948, '8', '2025-02-10', 'wqerwqe464646846465werqwerqwer'),
(76829418, 32, 76829418, 76829418, '7', '2025-03-19', 'fgfdagsdfgsdfgsdfgsdfggsdfgsdfgdgdsg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banno`
--

CREATE TABLE `banno` (
  `id_banno` bigint(12) NOT NULL,
  `total_banno` int(11) NOT NULL,
  `x_piso_banno` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `banno`
--

INSERT INTO `banno` (`id_banno`, `total_banno`, `x_piso_banno`) VALUES
(39261115, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambio_estructura`
--

CREATE TABLE `cambio_estructura` (
  `id_cambio_estructura` bigint(12) NOT NULL,
  `id_inmueble_integracion` bigint(12) NOT NULL,
  `tipo_escala_lote` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `razon` varchar(200) NOT NULL,
  `lote_cantidad` int(11) NOT NULL,
  `n_civico` varchar(200) NOT NULL,
  `tipo_cambio` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta_residencia`
--

CREATE TABLE `carta_residencia` (
  `id_cr` bigint(12) NOT NULL,
  `nombre_cr` varchar(50) NOT NULL,
  `direccion_cr` varchar(200) NOT NULL,
  `telf_cr` int(12) NOT NULL,
  `fecha_cr` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `carta_residencia`
--

INSERT INTO `carta_residencia` (`id_cr`, `nombre_cr`, `direccion_cr`, `telf_cr`, `fecha_cr`) VALUES
(12735771, 'fdsfasdf', 'sdfasdfasdfwerwerf234', 2147483647, '2025-07-15'),
(18659368, 'parque aragua', 'asdsadasd', 2147483647, '0005-02-01'),
(62496446, 'parque aragua', 'en mi calle ', 2147483647, '2012-05-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_citas` bigint(12) NOT NULL,
  `id_solicitud` bigint(12) NOT NULL,
  `id_representante` bigint(12) NOT NULL,
  `id_motivo` bigint(12) NOT NULL,
  `fecha_otorgada` date NOT NULL,
  `razon_negacion` varchar(300) NOT NULL,
  `estado_cita` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_citas`, `id_solicitud`, `id_representante`, `id_motivo`, `fecha_otorgada`, `razon_negacion`, `estado_cita`) VALUES
(12064752, 12064752, 12064752, 12064752, '2025-03-18', '', 1),
(19796958, 19796958, 19796958, 19796958, '2025-03-18', '', 1),
(21576873, 21576873, 21576873, 21576873, '2025-07-20', '', 1),
(22160158, 22160158, 22160158, 22160158, '2025-04-03', '', 1),
(26251498, 26251498, 26251498, 26251498, '2025-03-09', '', 1),
(32706519, 32706519, 32706519, 32706519, '2025-03-18', '', 1),
(47351638, 47351638, 47351638, 47351638, '2025-03-20', '', 1),
(56444374, 56444374, 56444374, 56444374, '0000-00-00', '', 1),
(59911412, 59911412, 59911412, 59911412, '2025-05-13', '', 1),
(61308783, 61308783, 61308783, 61308783, '2025-03-18', '', 1),
(63820122, 63820122, 63820122, 63820122, '2025-03-17', '', 1),
(68458810, 68458810, 68458810, 68458810, '2025-03-18', '', 1),
(77799743, 77799743, 77799743, 77799743, '2025-03-18', '', 1),
(79766934, 79766934, 79766934, 79766934, '2025-05-13', '', 1),
(81225758, 81225758, 81225758, 81225758, '2025-03-18', '', 1),
(87049755, 87049755, 87049755, 87049755, '2025-03-18', '', 1),
(94314095, 94314095, 94314095, 94314095, '2025-06-04', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clausulas`
--

CREATE TABLE `clausulas` (
  `id_clausulas` bigint(20) NOT NULL,
  `cantidad_clausulas` varchar(50) NOT NULL,
  `texto_clausulas` varchar(200) NOT NULL,
  `total_clausulas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clausulas`
--

INSERT INTO `clausulas` (`id_clausulas`, `cantidad_clausulas`, `texto_clausulas`, `total_clausulas`) VALUES
(17072550, '2', '2# Descripción del inmueble<br> 4# Plazo del contrato', '2, 4'),
(80203668, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cocina`
--

CREATE TABLE `cocina` (
  `id_cocina` bigint(12) NOT NULL,
  `total_cocina` int(11) NOT NULL,
  `x_piso_cocina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cocina`
--

INSERT INTO `cocina` (`id_cocina`, `total_cocina`, `x_piso_cocina`) VALUES
(39261115, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_catastral`
--

CREATE TABLE `codigo_catastral` (
  `id_codigo_catastral` bigint(12) NOT NULL,
  `parcela_catastral` varchar(3) NOT NULL,
  `nivel_catastral` int(3) NOT NULL,
  `ambito_catastral` varchar(3) NOT NULL,
  `parroquia_catastral` varchar(3) NOT NULL,
  `municipio_catastral` varchar(3) NOT NULL,
  `estado_catastral` varchar(3) NOT NULL,
  `unidad_catastral` varchar(3) NOT NULL,
  `manzana_catastral` varchar(3) NOT NULL,
  `sector_catastral` varchar(3) NOT NULL,
  `subparcela_catastral` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `codigo_catastral`
--

INSERT INTO `codigo_catastral` (`id_codigo_catastral`, `parcela_catastral`, `nivel_catastral`, `ambito_catastral`, `parroquia_catastral`, `municipio_catastral`, `estado_catastral`, `unidad_catastral`, `manzana_catastral`, `sector_catastral`, `subparcela_catastral`) VALUES
(27174894, '001', 1, 'U01', '001', '008', '005', '001', '12', '3', '001'),
(74970741, '001', 1, 'U01', '002', '008', '005', '', '32', '29', '001'),
(87935569, '001', 1, 'U01', '002', '008', '005', '001', '44', '27', '001'),
(90319370, '001', 1, 'U01', '001', '008', '005', '', '21', '13', '001'),
(96998602, '001', 1, 'U01', '002', '008', '005', '001', '78', '29', '001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigo_expediente`
--

CREATE TABLE `codigo_expediente` (
  `id_codigo_expendiente` bigint(12) NOT NULL,
  `unidad_expe` varchar(3) NOT NULL,
  `nivel_expe` int(3) NOT NULL,
  `parcela_expe` varchar(3) NOT NULL,
  `manzana_expe` varchar(3) NOT NULL,
  `sector_expe` varchar(3) NOT NULL,
  `subparcela_expe` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comedor`
--

CREATE TABLE `comedor` (
  `id_comedor` bigint(12) NOT NULL,
  `total_comedor` int(11) NOT NULL,
  `x_piso_comedor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comedor`
--

INSERT INTO `comedor` (`id_comedor`, `total_comedor`, `x_piso_comedor`) VALUES
(39261115, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementario`
--

CREATE TABLE `complementario` (
  `id_complementario` bigint(12) NOT NULL,
  `complementario_totales` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_complementario` int(20) NOT NULL,
  `codigo_complementario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_ficha`
--

CREATE TABLE `componente_ficha` (
  `id_componente` bigint(12) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `id_codigo_catastral` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `componente_ficha`
--

INSERT INTO `componente_ficha` (`id_componente`, `id_inmueble_usuario`, `id_codigo_catastral`) VALUES
(27174894, 33, 27174894),
(87935569, 31, 87935569),
(90319370, 32, 90319370),
(96998602, 37, 96998602);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constacia_catastral`
--

CREATE TABLE `constacia_catastral` (
  `id_ficha` bigint(12) NOT NULL,
  `id_componentes` bigint(12) NOT NULL,
  `fecha_inscripcion` varchar(20) NOT NULL,
  `nro_inscripcion` varchar(100) NOT NULL,
  `fecha_actualizacion` varchar(20) NOT NULL,
  `clase_operacion` varchar(100) NOT NULL,
  `valor_inmueble` float NOT NULL,
  `estado_ficha` int(5) NOT NULL,
  `control_archivo` enum('si','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `constacia_catastral`
--

INSERT INTO `constacia_catastral` (`id_ficha`, `id_componentes`, `fecha_inscripcion`, `nro_inscripcion`, `fecha_actualizacion`, `clase_operacion`, `valor_inmueble`, `estado_ficha`, `control_archivo`) VALUES
(57, 87935569, '2025-03-06', '087935569', '2025-03-06', 'Herencia', 2312320, 1, 'si'),
(58, 27174894, '2025-03-08', '027174894', '2025-03-08', 'Donacion', 34567, 1, 'si'),
(59, 96998602, '2025-03-19', '096998602', '2025-03-19', 'Herencia', 325500, 1, 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `id_contrato` bigint(12) NOT NULL,
  `id_contrato_datos` bigint(12) NOT NULL,
  `fecha_entrega` varchar(50) NOT NULL,
  `metodo_pago` varchar(20) NOT NULL,
  `monto_pagar` varchar(12) NOT NULL,
  `codig_gmv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`id_contrato`, `id_contrato_datos`, `fecha_entrega`, `metodo_pago`, `monto_pagar`, `codig_gmv`) VALUES
(13614338, 13614338, '12/02/2025', '', '2312', ''),
(32368324, 32368324, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato_datos`
--

CREATE TABLE `contrato_datos` (
  `id_contrato_datos` bigint(12) NOT NULL,
  `id_actor1` bigint(12) NOT NULL,
  `id_actor2` bigint(12) NOT NULL,
  `id_inmueble` bigint(12) NOT NULL,
  `id_funcionario` int(12) NOT NULL,
  `id_tipo_contrato` int(11) NOT NULL,
  `id_abobogado` bigint(12) NOT NULL,
  `id_gravament` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `contrato_datos`
--

INSERT INTO `contrato_datos` (`id_contrato_datos`, `id_actor1`, `id_actor2`, `id_inmueble`, `id_funcionario`, `id_tipo_contrato`, `id_abobogado`, `id_gravament`) VALUES
(13614338, 297722942, 13614338, 31, 0, 1, 13614338, 0),
(32368324, 297722942, 32368324, 32, 0, 2, 32368324, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_ambiente`
--

CREATE TABLE `datos_ambiente` (
  `id_ambientes` bigint(12) NOT NULL,
  `dormitorios` bigint(12) NOT NULL,
  `cocina` bigint(12) NOT NULL,
  `sala` bigint(12) NOT NULL,
  `banno` bigint(12) NOT NULL,
  `comedor` bigint(12) NOT NULL,
  `oficina` bigint(12) NOT NULL,
  `garaje` bigint(12) NOT NULL,
  `servicio` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_declaracion_ocupante`
--

CREATE TABLE `datos_declaracion_ocupante` (
  `id_declaracion_ocupante` bigint(12) NOT NULL,
  `habitacion_propietario` varchar(20) NOT NULL,
  `habitacion_inquilino` varchar(20) NOT NULL,
  `renta_mensual` float NOT NULL,
  `fecha_contrato` varchar(20) NOT NULL,
  `n_habitaciones` int(11) NOT NULL,
  `ingreso_familiar` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_generales`
--

CREATE TABLE `datos_generales` (
  `id_datos_generales` bigint(11) NOT NULL,
  `control_archivo` enum('si','no') NOT NULL,
  `n_ficha` bigint(11) NOT NULL,
  `fecha_inscripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_inspeccion`
--

CREATE TABLE `datos_inspeccion` (
  `id_datos_inspeccion` bigint(12) NOT NULL,
  `id_escala` int(11) NOT NULL,
  `id_datos_complementario` bigint(12) NOT NULL,
  `id_datos_otros` bigint(12) NOT NULL,
  `id_datos_estructurales` bigint(12) NOT NULL,
  `id_datos_terreno` bigint(12) NOT NULL,
  `id_datos_ambiente` bigint(12) NOT NULL,
  `id_datos_dimensiones` bigint(12) NOT NULL,
  `id_datos_declaracion_ocupantes` bigint(12) NOT NULL,
  `id_datos_generales` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datos_inspeccion`
--

INSERT INTO `datos_inspeccion` (`id_datos_inspeccion`, `id_escala`, `id_datos_complementario`, `id_datos_otros`, `id_datos_estructurales`, `id_datos_terreno`, `id_datos_ambiente`, `id_datos_dimensiones`, `id_datos_declaracion_ocupantes`, `id_datos_generales`) VALUES
(23448489, 9, 23448489, 23448489, 23448489, 23448489, 23448489, 23448489, 23448489, 23448489),
(39261115, 6, 39261115, 39261115, 39261115, 39261115, 39261115, 39261115, 39261115, 39261115);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_ocupantes`
--

CREATE TABLE `datos_ocupantes` (
  `id_datos_ocupantes` bigint(12) NOT NULL,
  `ci_rif` bigint(12) NOT NULL,
  `nombre_ocupante` varchar(20) NOT NULL,
  `apellido_ocupante` varchar(20) NOT NULL,
  `telefono_ocupante` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_ocupantes`
--

INSERT INTO `datos_ocupantes` (`id_datos_ocupantes`, `ci_rif`, `nombre_ocupante`, `apellido_ocupante`, `telefono_ocupante`) VALUES
(63757038, 4234234, 'asdf', 'sdf', '04263321074'),
(81572019, 4124243, 'werwqer', 'werqwerw', '04263321074');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_rtt`
--

CREATE TABLE `datos_rtt` (
  `id_datos_rtt` bigint(12) NOT NULL,
  `id_usurio_inmueble` bigint(12) NOT NULL,
  `id_am` bigint(12) NOT NULL,
  `id_cr` bigint(12) NOT NULL,
  `id_sd` bigint(12) NOT NULL,
  `id_ds` bigint(12) NOT NULL,
  `id_uh` bigint(12) NOT NULL,
  `id_funcionario` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `datos_rtt`
--

INSERT INTO `datos_rtt` (`id_datos_rtt`, `id_usurio_inmueble`, `id_am`, `id_cr`, `id_sd`, `id_ds`, `id_uh`, `id_funcionario`) VALUES
(12735771, 32, 12735771, 12735771, 12735771, 12735771, 12735771, 12735771),
(62496446, 31, 62496446, 62496446, 62496446, 62496446, 0, 62496446);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_terreno`
--

CREATE TABLE `datos_terreno` (
  `id_datos_terreno` bigint(12) NOT NULL,
  `id_topografia` int(11) NOT NULL,
  `id_acceso` int(11) NOT NULL,
  `id_forma` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `id_entorno_fisico` int(11) NOT NULL,
  `id_mejora_terreno` int(11) NOT NULL,
  `id_tenencia_terreno` int(200) NOT NULL,
  `id_regimen_propiedad` int(20) NOT NULL,
  `id_servicios_publicos` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_terreno`
--

INSERT INTO `datos_terreno` (`id_datos_terreno`, `id_topografia`, `id_acceso`, `id_forma`, `id_ubicacion`, `id_entorno_fisico`, `id_mejora_terreno`, `id_tenencia_terreno`, `id_regimen_propiedad`, `id_servicios_publicos`) VALUES
(23448489, 7, 1, 1, 1, 1, 1, 1, 1, 23448489),
(39261115, 3, 2, 3, 2, 1, 2, 1, 1, 39261115),
(90278483, 1, 1, 1, 1, 1, 1, 1, 1, 90278483);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_ubicacion`
--

CREATE TABLE `datos_ubicacion` (
  `id_datos_ubicacion` bigint(11) NOT NULL,
  `id_codigo_ambito` bigint(11) NOT NULL,
  `id_linderos_actuales` bigint(11) NOT NULL,
  `coordenadas_utm` varchar(200) NOT NULL,
  `id_levantamiento_p` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato_complementario_construccion`
--

CREATE TABLE `dato_complementario_construccion` (
  `id_dato_complementario_construccion` bigint(12) NOT NULL,
  `id_paredes_complementario` bigint(12) NOT NULL,
  `id_piso_complementario` int(11) NOT NULL,
  `id_bano_complementario` bigint(12) NOT NULL,
  `id_puerta_complementario` bigint(12) NOT NULL,
  `id_ventana_complementario` bigint(12) NOT NULL,
  `id_adicional_complementario` bigint(12) NOT NULL,
  `id_conservacion_complementario` int(11) NOT NULL,
  `sotano_complementario` enum('si','no') NOT NULL,
  `ascensor_complementario` enum('si','no') NOT NULL,
  `observacion_complementario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dato_complementario_construccion`
--

INSERT INTO `dato_complementario_construccion` (`id_dato_complementario_construccion`, `id_paredes_complementario`, `id_piso_complementario`, `id_bano_complementario`, `id_puerta_complementario`, `id_ventana_complementario`, `id_adicional_complementario`, `id_conservacion_complementario`, `sotano_complementario`, `ascensor_complementario`, `observacion_complementario`) VALUES
(23448489, 23448489, 1, 1, 23448489, 23448489, 1, 1, 'no', 'no', 'fasdfasdfasdf'),
(39261115, 39261115, 1, 1, 39261115, 39261115, 1, 1, 'no', 'no', 'weqerwqerqwerqwerqwerqwer'),
(90278483, 90278483, 2, 1, 90278483, 90278483, 1, 1, 'no', 'no', 'ewqeweqwewqe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato_estructural_construccion`
--

CREATE TABLE `dato_estructural_construccion` (
  `id_dato_estructural_construccion` bigint(12) NOT NULL,
  `id_tipo_cubierta` int(11) NOT NULL,
  `id_tipo_techo` int(11) NOT NULL,
  `id_tipo_estructura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dato_estructural_construccion`
--

INSERT INTO `dato_estructural_construccion` (`id_dato_estructural_construccion`, `id_tipo_cubierta`, `id_tipo_techo`, `id_tipo_estructura`) VALUES
(23448489, 1, 1, 1),
(39261115, 3, 2, 2),
(90278483, 2, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato_general_construccion`
--

CREATE TABLE `dato_general_construccion` (
  `id_dato_general_construccion` bigint(12) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_regimen_prioridad` int(11) NOT NULL,
  `id_tipo_construccion_general` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dato_general_construccion`
--

INSERT INTO `dato_general_construccion` (`id_dato_general_construccion`, `id_destino`, `id_regimen_prioridad`, `id_tipo_construccion_general`) VALUES
(23448489, 1, 1, 3),
(39261115, 2, 2, 7),
(90278483, 3, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `declaracion_sucesoral`
--

CREATE TABLE `declaracion_sucesoral` (
  `id_ds` bigint(12) NOT NULL,
  `rif_sucesoral` varchar(12) NOT NULL,
  `descripcion_ds` varchar(400) NOT NULL,
  `fecha_ds` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `declaracion_sucesoral`
--

INSERT INTO `declaracion_sucesoral` (`id_ds`, `rif_sucesoral`, `descripcion_ds`, `fecha_ds`) VALUES
(12735771, '', '', ''),
(18659368, '', '', ''),
(62496446, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denegacion`
--

CREATE TABLE `denegacion` (
  `id_denegacion` bigint(11) NOT NULL,
  `id_funcionario` bigint(11) NOT NULL,
  `id_solicitud` bigint(11) NOT NULL,
  `motivo_denegar` varchar(50) NOT NULL,
  `descripcion_denegar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones`
--

CREATE TABLE `dimensiones` (
  `id_datos_dimension` bigint(12) NOT NULL,
  `frente` varchar(100) NOT NULL,
  `profundidad` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `tipo_frente` varchar(100) NOT NULL,
  `tipo_profundidad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `dimensiones`
--

INSERT INTO `dimensiones` (`id_datos_dimension`, `frente`, `profundidad`, `area`, `tipo_frente`, `tipo_profundidad`) VALUES
(1, 'Frente', '', '', '', ''),
(2, 'Pofundidad', '', '', '', ''),
(3, 'Area', '', '', '', ''),
(4, 'Fren. tipo', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_inmueble`
--

CREATE TABLE `direccion_inmueble` (
  `id_direccion_inmueble` bigint(12) NOT NULL,
  `id_lugar_inmueble` int(11) NOT NULL,
  `id_ubicacion_inmueble_entre` int(11) NOT NULL,
  `id_ubicacion_inmueble_y` int(11) NOT NULL,
  `id_tipo_construccion` int(11) NOT NULL,
  `lugar_inmueble` varchar(20) NOT NULL,
  `ubicacion_inmueble_entre` varchar(20) NOT NULL,
  `ubicacion_inmueble_y` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `direccion_inmueble`
--

INSERT INTO `direccion_inmueble` (`id_direccion_inmueble`, `id_lugar_inmueble`, `id_ubicacion_inmueble_entre`, `id_ubicacion_inmueble_y`, `id_tipo_construccion`, `lugar_inmueble`, `ubicacion_inmueble_entre`, `ubicacion_inmueble_y`) VALUES
(23448489, 1, 1, 1, 4, 'Los Cocos', 'Universidad', 'Caracas'),
(26344221, 4, 4, 9, 8, 'rtjktyy', 'kuyfgpuiñ', 'kyit'),
(39261115, 4, 1, 1, 4, 'Sector 4', 'Caña de azucar', 'Universidad'),
(53832933, 3, 2, 4, 3, 'wkejfw', 'iwdjn', 'wkejrw'),
(58889972, 1, 10, 10, 2, 'Caña de Azucar', '58 651456', '61465645'),
(90278483, 1, 1, 1, 4, 'Caña de azucar', 'Caña de azucar', 'Universidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dormitorio`
--

CREATE TABLE `dormitorio` (
  `id_dormitorio` bigint(12) NOT NULL,
  `total_dormitorio` int(11) NOT NULL,
  `x_piso_dormitorio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dormitorio`
--

INSERT INTO `dormitorio` (`id_dormitorio`, `total_dormitorio`, `x_piso_dormitorio`) VALUES
(32518192, 2, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empadronamiento`
--

CREATE TABLE `empadronamiento` (
  `id_empadronamiento` bigint(12) NOT NULL,
  `id_componentes` bigint(12) NOT NULL,
  `id_datos_ocupante` bigint(12) NOT NULL,
  `estado_empadronamiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empadronamiento`
--

INSERT INTO `empadronamiento` (`id_empadronamiento`, `id_componentes`, `id_datos_ocupante`, `estado_empadronamiento`) VALUES
(63757038, 63757038, 63757038, 1),
(81572019, 81572019, 81572019, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garage`
--

CREATE TABLE `garage` (
  `id_garage` bigint(12) NOT NULL,
  `total_garage` int(11) NOT NULL,
  `x_piso_garage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `garage`
--

INSERT INTO `garage` (`id_garage`, `total_garage`, `x_piso_garage`) VALUES
(39261115, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_social`
--

CREATE TABLE `gestion_social` (
  `id_gestion` bigint(11) NOT NULL,
  `id_concejo` bigint(11) NOT NULL,
  `id_usuario` bigint(11) NOT NULL,
  `carga_familiar` varchar(200) NOT NULL,
  `1x10` varchar(50) NOT NULL,
  `emprendimiento` varchar(200) NOT NULL,
  `nivel_estudio` int(11) NOT NULL,
  `sistema_patria` int(11) NOT NULL,
  `ayuda_social` int(11) NOT NULL,
  `pago_servcio` int(11) NOT NULL,
  `estado_gestion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gravament`
--

CREATE TABLE `gravament` (
  `id_gravament` bigint(12) NOT NULL,
  `cantidad_gravament` varchar(50) NOT NULL,
  `total_gravament` varchar(100) NOT NULL,
  `texto_gravament` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inmueble` bigint(12) NOT NULL,
  `id_direccion_inmueble` bigint(12) NOT NULL,
  `parroquia` varchar(50) NOT NULL,
  `residencia` varchar(50) NOT NULL,
  `nombre_inmueble` varchar(50) NOT NULL,
  `n_civico` varchar(10) NOT NULL,
  `telefono_inmueble` varchar(20) NOT NULL,
  `medida_inmueble` float NOT NULL,
  `valor_inmueble` float NOT NULL,
  `punto_referencia` varchar(200) NOT NULL,
  `tenencia_inmueble` enum('1','2') NOT NULL,
  `descripcion_inmueble` varchar(200) NOT NULL,
  `estado_inmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inmueble`, `id_direccion_inmueble`, `parroquia`, `residencia`, `nombre_inmueble`, `n_civico`, `telefono_inmueble`, `medida_inmueble`, `valor_inmueble`, `punto_referencia`, `tenencia_inmueble`, `descripcion_inmueble`, `estado_inmueble`) VALUES
(23448489, 23448489, '001', 'Los Cocos', 'Los Tesoros', '2354', '04263321074', 2341.34, 21342100, 'dfasdfdfasdfasdf', '2', 'efasfdasfasdfasfsadfadsfasdf', 4),
(26344221, 26344221, '002', 'ythdklj', 'ñiugpu', '58468', '04144134005', 65465, 75687, 'iputpukñ', '2', 'khgcvkufv', 2),
(39261115, 39261115, '002', 'Caña de azucar', 'Los Angeles', '2323', '04263321074', 770000, 32000, 'Avenida 6 Casa 20A', '1', 'En buen Estado', 4),
(53832933, 53832933, '001', 'quinta', 'leyend', '15', '04144734005', 110, 151355, 'rio buei', '1', 'optimo', 1),
(58889972, 58889972, '002', 'sector 4', 'ARTURO', '20-A', '04269339570', 800000, 16000, 'av principal de cañ ', '2', ' platabanda, 3 pisos, 6 habitaciones y 4 baños ', 2),
(90278483, 90278483, '002', 'Caña de azucar', 'Los Alpes', '3425', '04263321074', 23145, 31232, 'Sector 12 calle 6', '1', 'todo de chill', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble_integracion`
--

CREATE TABLE `inmueble_integracion` (
  `id_inmueble_integracion` bigint(12) NOT NULL,
  `total_integracion` varchar(200) NOT NULL,
  `cantidad_integracion` int(20) NOT NULL,
  `codigo_integracion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble_usuario`
--

CREATE TABLE `inmueble_usuario` (
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `id_usuario` bigint(12) NOT NULL,
  `id_inmueble` bigint(12) NOT NULL,
  `id_linderos` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inmueble_usuario`
--

INSERT INTO `inmueble_usuario` (`id_inmueble_usuario`, `id_usuario`, `id_inmueble`, `id_linderos`) VALUES
(31, 297722942, 39261115, 39261115),
(32, 297722942, 23448489, 23448489),
(33, 21272431, 90278483, 90278483),
(35, 21272431, 53832933, 53832933),
(36, 297722942, 26344221, 26344221),
(37, 297722942, 58889972, 58889972);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspeccion`
--

CREATE TABLE `inspeccion` (
  `id_inspeccion` bigint(12) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `id_funcionario` bigint(12) NOT NULL,
  `clase_inmueble` enum('Residencial','Comercial','Mixto') NOT NULL,
  `fecha_inspeccion` date NOT NULL,
  `superficie_c` float NOT NULL,
  `superficie_t` float NOT NULL,
  `area_cr` float NOT NULL,
  `area_tr` float NOT NULL,
  `area_cc` float NOT NULL,
  `area_tc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inspeccion`
--

INSERT INTO `inspeccion` (`id_inspeccion`, `id_inmueble_usuario`, `id_funcionario`, `clase_inmueble`, `fecha_inspeccion`, `superficie_c`, `superficie_t`, `area_cr`, `area_tr`, `area_cc`, `area_tc`) VALUES
(12, 31, 297722942, 'Comercial', '2025-03-03', 231.23, 12323.3, 0, 0, 0, 0),
(13, 32, 297722942, 'Comercial', '2025-02-11', 213123, 12323.3, 0, 0, 0, 0),
(14, 33, 297722942, 'Comercial', '2025-01-06', 3212, 3212, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linderos`
--

CREATE TABLE `linderos` (
  `id_linderos` bigint(12) NOT NULL,
  `norte_lindero` varchar(20) NOT NULL,
  `norte_medida` float NOT NULL,
  `este_lindero` varchar(20) NOT NULL,
  `este_medida` float NOT NULL,
  `oeste_lindero` varchar(20) NOT NULL,
  `oeste_medida` float NOT NULL,
  `sur_lindero` varchar(20) NOT NULL,
  `sur_medida` float NOT NULL,
  `entrada_lindero` enum('Norte','Sur','Este','Oeste') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `linderos`
--

INSERT INTO `linderos` (`id_linderos`, `norte_lindero`, `norte_medida`, `este_lindero`, `este_medida`, `oeste_lindero`, `oeste_medida`, `sur_lindero`, `sur_medida`, `entrada_lindero`) VALUES
(23448489, 'dfasdfasdf', 123.23, 'ewrqwer', 123.12, 'wqeewrq', 213.12, 'sdfasdfasdf', 231.23, 'Este'),
(26344221, 'oyteity', 365.1, 'oytfph', 545.6, 'khgck', 684.98, 'louyfoluh', 546.5, 'Norte'),
(39261115, 'wqeqwe', 213.12, 'wqeqwe', 123.12, 'qweqwe', 123.12, 'eqwewq', 123.12, 'Sur'),
(53832933, 'piyty', 516.54, 'ñljjhfgouy', 654.94, 'iutyf9td', 654.98, 'oijipj0poij', 546.87, 'Sur'),
(58889972, 'plaza', 0, 'vda 61', 0, 'casa 20', 0, 'casa de evangelicos', 0, 'Norte'),
(90278483, 'werqwr', 423.44, 'ewrqwer', 343.4, 'wqerwqer', 421.34, 'wqerqwer', 234, 'Sur');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo_cita`
--

CREATE TABLE `motivo_cita` (
  `id_motivo_cita` bigint(12) NOT NULL,
  `cita_totales` varchar(200) NOT NULL,
  `cantidad_cita` varchar(1000) NOT NULL,
  `codigo_cita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motivo_cita`
--

INSERT INTO `motivo_cita` (`id_motivo_cita`, `cita_totales`, `cantidad_cita`, `codigo_cita`) VALUES
(12064752, '4', '541# Solicitud de Regularización de la Tenencia de la Tierra (Parcela Desarrollada).<br>542# Solicitud de Compra de Terreno Municipal (Compra Ordinaria).<br>543# Solicitud de Traspaso de Terreno.<br>544# Contrato de Arrendamiento de Terreno (Parcela sin Desarrollar por M2).', '541, 542, 543, 544'),
(19796958, '2', '17# Contrato de Consecución de Uso Gratuito de Parcela de Terreno Municipal.<br>20# Otros', '17, 20'),
(21576873, '4', '17# Contrato de Consecución de Uso Gratuito de Parcela de Terreno Municipal.<br> 20# Otros<br> 21# Audiencia con el Director<br> 533# Tasa Por Cambio de Propiedad (Constancia de Inscripción y Plano Mensura).', '17, 20, 21, 533'),
(22160158, '1', '20# Otros', '20'),
(26251498, '1', '2# Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.', '2'),
(32706519, '1', '20# Otros', '20'),
(47351638, '1', '18# Adjudicaciones de Arrendamiento con Opcion a Compra por M2.', '18'),
(56444374, '3', '18# Adjudicaciones de Arrendamiento con Opcion a Compra por M2.<br>54# Contrato de Compra-Venta de Terreno (Parcela sin Desarrollar Compra Ordinaria por M2).<br>543# Solicitud de Traspaso de Terreno.', '18, 54, 543'),
(59911412, '1', '21# Audiencia con el Director', '21'),
(61308783, '2', '3# Plano Mensura.<br>5# Tasa Por Cambio de Propiedad (Constancia de Inscripción y Plano Mensura).', '3, 5'),
(63820122, '3', '2# Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.<br>4# Certificado de Empadronamiento.<br>5# Tasa Por Cambio de Propiedad (Constancia de Inscripción y Plano Mensura).', '20, 541, 542'),
(68458810, '3', '21# Audiencia con el Director<br>541# Solicitud de Regularización de la Tenencia de la Tierra (Parcela Desarrollada).<br>542# Solicitud de Compra de Terreno Municipal (Compra Ordinaria).', '21, 541, 542'),
(77799743, '2', '20# Otros<br>54# Contrato de Compra-Venta de Terreno (Parcela sin Desarrollar Compra Ordinaria por M2).', '20, 54'),
(79766934, '2', '20# Otros<br> 54# Contrato de Compra-Venta de Terreno (Parcela sin Desarrollar Compra Ordinaria por M2).', '20, 54'),
(81225758, '2', '2# Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.<br>3# Plano Mensura.', '2, 3'),
(87049755, '2', '20# Otros<br>54# Contrato de Compra-Venta de Terreno (Parcela sin Desarrollar Compra Ordinaria por M2).', '20, 54'),
(94314095, '1', '21# Audiencia con el Director', '21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL,
  `niveles` varchar(50) NOT NULL,
  `descripcion_nivel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `niveles`, `descripcion_nivel`) VALUES
(1, 'SuperAdmin', 'Nivel especial de Dev´s '),
(2, 'Admin', 'Nivel Especial del Director de la Direcciòn de Catastro'),
(3, 'Secretaria', 'Nivel para la Secretaria del Director'),
(4, 'Fiscal-Inspector', 'Nivel para el Fiscal que realiza inspecciones'),
(7, 'Usuario', 'Usuario ó Propietario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE `oficina` (
  `id_oficina` int(12) NOT NULL,
  `total_oficina` int(11) NOT NULL,
  `x_piso_oficina` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`id_oficina`, `total_oficina`, `x_piso_oficina`) VALUES
(39261115, 2, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otro_datos`
--

CREATE TABLE `otro_datos` (
  `id_otro_datos` bigint(11) NOT NULL,
  `year_construccion` varchar(20) NOT NULL,
  `year_refaccion` varchar(20) NOT NULL,
  `edad_efectiva` varchar(100) NOT NULL,
  `n_edificaciones` int(10) NOT NULL,
  `porcentage_refaccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `otro_datos`
--

INSERT INTO `otro_datos` (`id_otro_datos`, `year_construccion`, `year_refaccion`, `edad_efectiva`, `n_edificaciones`, `porcentage_refaccion`) VALUES
(23448489, '12', '12', '43', 2, '3'),
(39261115, '1', '2', '12', 1, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paredes`
--

CREATE TABLE `paredes` (
  `id_paredes` bigint(12) NOT NULL,
  `id_tipo_pared` int(11) NOT NULL,
  `id_tipo_acabado` int(11) NOT NULL,
  `id_tipo_pintura` int(11) NOT NULL,
  `id_tipo_instalacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paredes`
--

INSERT INTO `paredes` (`id_paredes`, `id_tipo_pared`, `id_tipo_acabado`, `id_tipo_pintura`, `id_tipo_instalacion`) VALUES
(23448489, 3, 1, 1, 1),
(39261115, 5, 3, 2, 2),
(90278483, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parroquia` int(11) NOT NULL,
  `parroquia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parroquia`, `parroquia`) VALUES
(1, 'El Limon'),
(2, 'Caña de Azucar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas_sanitaria`
--

CREATE TABLE `piezas_sanitaria` (
  `id_pieza_sanitaria` int(11) NOT NULL,
  `pieza_sanitaria_totales` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad_pieza_sanitaria` int(20) NOT NULL,
  `codigo_pieza_sanitaria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_seguridad`
--

CREATE TABLE `pregunta_seguridad` (
  `id_seguridad` bigint(12) NOT NULL,
  `pregunta_1` varchar(11) NOT NULL,
  `repuesta_1` varchar(100) NOT NULL,
  `pregunta_2` varchar(11) NOT NULL,
  `repuesta_2` varchar(100) NOT NULL,
  `pregunta_3` varchar(11) NOT NULL,
  `repuesta_3` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pregunta_seguridad`
--

INSERT INTO `pregunta_seguridad` (`id_seguridad`, `pregunta_1`, `repuesta_1`, `pregunta_2`, `repuesta_2`, `pregunta_3`, `repuesta_3`) VALUES
(3212323, '1', '123123', '3', '123123', '6', '123123'),
(3255334, '1', '123123', '3', '123123', '5', '123123'),
(12523579, '1', 'ninguno', '2', 'ninguna', '6', 'ningun'),
(12523580, '1', '123123', '2', '123123', '3', '123123'),
(21272431, '2', 'perro', '3', 'caracas', '6', 'azul'),
(24551683, '5', 'dfasdfad', '6', 'asdfasdfsdf', '5', 'asdfasdf'),
(29772294, '4', '1', '6', '2', '2', '3'),
(275631092, '1', '1', '4', '2', '6', '3'),
(297722942, '1', '1', '4', '2', '6', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puerta`
--

CREATE TABLE `puerta` (
  `id_puerta` bigint(12) NOT NULL,
  `puerta_totales` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_puerta` int(11) NOT NULL,
  `codigo_puerta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `puerta`
--

INSERT INTO `puerta` (`id_puerta`, `puerta_totales`, `cantidad_puerta`, `codigo_puerta`) VALUES
(23448489, '2# Entamborada Fina<br> 3# Metalica', 2, 2),
(39261115, '2# Entamborada Fina', 1, 2),
(90278483, '3# Metalica', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regulacion_tt`
--

CREATE TABLE `regulacion_tt` (
  `id_regulacion_tt` bigint(12) NOT NULL,
  `id_datos_rtt` bigint(12) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `razon` varchar(200) NOT NULL,
  `estado_rtt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `regulacion_tt`
--

INSERT INTO `regulacion_tt` (`id_regulacion_tt`, `id_datos_rtt`, `estado_civil`, `fecha`, `razon`, `estado_rtt`) VALUES
(12735771, 12735771, 'soltero(a)', '2025-03-19', 'sjdfhsdjksdkjlfsdkjfhaskdjfhalskdjfhasldkjfhasldkfhasdlkjfhsadkfhalsdkf', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `id_representante` int(11) NOT NULL,
  `cedula_representante` bigint(12) NOT NULL,
  `id_propietario` bigint(12) NOT NULL,
  `tipo_representante` varchar(100) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `apellido_completo` varchar(100) NOT NULL,
  `numero_representante` varchar(20) NOT NULL,
  `estado_representante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`id_representante`, `cedula_representante`, `id_propietario`, `tipo_representante`, `nombre_completo`, `apellido_completo`, `numero_representante`, `estado_representante`) VALUES
(12064752, 0, 297722942, 'Titular', '', '', '', 1),
(19796958, 0, 297722942, 'Titular', '', '', '', 1),
(21576873, 0, 297722942, 'Titular', '', '', '', 1),
(22160158, 0, 297722942, 'Titular', '', '', '', 1),
(26251498, 0, 297722942, 'Titular', '', '', '', 1),
(32706519, 0, 297722942, 'Titular', '', '', '', 1),
(47351638, 0, 297722942, 'Titular', '', '', '', 1),
(56444374, 0, 297722942, 'Titular', '', '', '', 1),
(59911412, 0, 297722942, 'Titular', '', '', '', 1),
(61308783, 0, 21272431, 'Titular', '', '', '', 1),
(63820122, 0, 297722942, 'Titular', '', '', '', 1),
(68458810, 0, 297722942, 'Titular', '', '', '', 1),
(77799743, 0, 297722942, 'Titular', '', '', '', 1),
(79766934, 0, 297722942, 'Titular', '', '', '', 1),
(81225758, 0, 21272431, 'Titular', '', '', '', 1),
(87049755, 0, 297722942, 'Titular', '', '', '', 1),
(94314095, 0, 297722942, 'Titular', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id_sala` bigint(12) NOT NULL,
  `total_sala` int(11) NOT NULL,
  `x_piso_sala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id_sala`, `total_sala`, `x_piso_sala`) VALUES
(39261115, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id_sectores` int(11) NOT NULL,
  `sectores` varchar(100) NOT NULL,
  `id_parroquia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id_sectores`, `sectores`, `id_parroquia`) VALUES
(1, 'Arias Blanco', 1),
(2, 'El Progreso', 1),
(3, 'El Piñal', 1),
(4, 'Mata Seca', 1),
(5, 'Valle Verde', 1),
(6, 'Corral de Piedra', 1),
(7, 'Los Capuchino', 1),
(8, 'Niño Jesús', 1),
(9, 'Tejerías', 1),
(10, 'Agropecuaria', 1),
(11, 'El Paseo Casa', 1),
(12, 'El Paseo Bloque', 1),
(13, 'Caja de Agua', 1),
(14, 'Los Rauseos', 1),
(15, 'Los Mayas', 1),
(16, 'Alma Mater I', 1),
(17, 'Alma Mater II', 1),
(18, '#1', 2),
(19, '#2', 2),
(20, '#3', 2),
(21, '#4', 2),
(22, '#5', 2),
(23, '#6', 2),
(24, '#7 - La Trinidad', 2),
(25, '#8', 2),
(26, '#9', 2),
(27, '#10', 2),
(28, '#11', 2),
(29, '#12', 2),
(30, '#13', 2),
(31, 'Jose Felix Ribas 2', 2),
(32, 'Jose Felix Ribas 3', 2),
(33, 'Jose Felix Ribas 4', 2),
(34, 'Jose Felix Ribas 5', 2),
(35, 'La Candelaria I', 2),
(36, 'La Candelaria II', 2),
(37, 'Arsenal Sector A', 2),
(38, 'Arsenal Sector B', 2),
(39, 'Arsenal Sector C', 2),
(40, 'Arsenal Valle de Aragua', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sentencia_divorcio`
--

CREATE TABLE `sentencia_divorcio` (
  `id_sentencia_divorcio` bigint(12) NOT NULL,
  `n_sd` varchar(11) NOT NULL,
  `tomo_sd` varchar(11) NOT NULL,
  `folio_sd` varchar(11) NOT NULL,
  `fecha_sd` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sentencia_divorcio`
--

INSERT INTO `sentencia_divorcio` (`id_sentencia_divorcio`, `n_sd`, `tomo_sd`, `folio_sd`, `fecha_sd`) VALUES
(12735771, '', '', '', ''),
(18659368, '', '', '', ''),
(62496446, '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` bigint(12) NOT NULL,
  `total_servicio` int(11) NOT NULL,
  `x_piso_servicio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `total_servicio`, `x_piso_servicio`) VALUES
(39261115, 0, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_publico`
--

CREATE TABLE `servicio_publico` (
  `id_servicio_publico` bigint(12) NOT NULL,
  `servicio_publico_totales` varchar(500) NOT NULL,
  `cantidad_servicio_publico` int(20) NOT NULL,
  `codigo_servicio_publico` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio_publico`
--

INSERT INTO `servicio_publico` (`id_servicio_publico`, `servicio_publico_totales`, `cantidad_servicio_publico`, `codigo_servicio_publico`) VALUES
(23448489, '3# Drenaje Artificial<br> 5# Acera', 2, '3, 5'),
(39261115, '3# Drenaje Artificial<br> 5# Acera', 2, '3, 5'),
(90278483, '3# Drenaje Artificial<br> 5# Acera', 2, '3, 5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `size_terreno`
--

CREATE TABLE `size_terreno` (
  `id_size_terreno` int(12) NOT NULL,
  `tipo_size` varchar(12) NOT NULL,
  `info_size` varchar(200) NOT NULL,
  `rule_size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `size_terreno`
--

INSERT INTO `size_terreno` (`id_size_terreno`, `tipo_size`, `info_size`, `rule_size`) VALUES
(1, 'D1', 'Terreno Urbanizable hasta 5.000,00 M2', 5000),
(2, 'D2', 'Terreno Urbanizable desde 5.000,01 M2 hasta 50.000,00 M2', 0),
(3, 'D3', 'Terreno Urbanizable desde 50.000,01 M2, en adelante', 50000),
(4, 'E1', 'Terreno Rural hasta 5.000,00 M2, incluido en la Poligonal Urbana', 5000),
(5, 'E2', 'Terreno Rural desde 5.000,01 M2 hasta 50.000,00 M2, incluido en la Poligonal Urbana', 0),
(6, 'E3', 'Terreno Rural desde 50.000,01 M2, incluido en la Poligonal Urbana', 50000),
(7, 'A', 'Uso Recidencial o Comercial con todos los Servicios de Urbanismo Tipo A', 1),
(8, 'B', 'Uso Recidencial o Comercial con todos los Servicios de Urbanismo Tipo B', 1),
(9, 'C', 'Uso Recidencial o Comercial con todos los Servicios de Urbanismo Tipo C', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` bigint(11) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `razon_inmueble` varchar(200) NOT NULL,
  `razon_negar` varchar(200) NOT NULL,
  `tipo_solicitud` int(11) NOT NULL,
  `estado_solicitud` int(11) NOT NULL,
  `leida_estado` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `id_inmueble_usuario`, `fecha_solicitud`, `razon_inmueble`, `razon_negar`, `tipo_solicitud`, `estado_solicitud`, `leida_estado`) VALUES
(12064752, 37, '2025-03-17', 'vender', '', 1, 4, '1'),
(12735771, 32, '2025-03-19', 'sjdfhsdjksdkjlfsdkjfhaskdjfhalskdjfhasldkjfhasldkfhasdlkjfhsadkfhalsdkf', '', 7, 2, '1'),
(13614338, 31, '2025-03-07', '', 'asdfsdafasdfasdf', 4, 3, '1'),
(19796958, 36, '2025-03-17', 'VENTA', '', 1, 4, '1'),
(21576873, 31, '2025-07-19', 'audiencia con el director', '', 1, 2, '1'),
(22160158, 31, '2025-04-02', 'sdfafasdf', '', 1, 4, '1'),
(26251498, 32, '2025-03-08', 'sadadASDASDasd', 'sdfasdfasdfsadfasdfsadf', 1, 3, '1'),
(32706519, 32, '2025-03-17', 'AASFASDFASDFASDFSDF', '', 1, 4, '1'),
(37859269, 31, '2025-03-08', 'dsfasdfasdfasdfsadfasdfsdafsfasdfasdffasdfasdfasdfasdfa', '', 5, 2, '1'),
(43285035, 32, '2025-03-17', '4154654', '', 5, 2, '1'),
(47351638, 31, '2025-03-19', 'sdasdasdasdasd', '', 1, 4, '1'),
(48041817, 32, '2025-03-17', 'fgsdfadsfsdfasdf', '', 6, 2, '3'),
(54944398, 32, '2025-03-08', 'erwerwqerwerwqerqwer', '', 3, 2, '3'),
(56444374, 32, '2025-03-16', 'sdasdfasdfasdfasdfasdf', '', 1, 4, '1'),
(59911412, 36, '2025-05-12', 'hbjkbjhbkjhbkjh', '', 1, 4, '3'),
(61308783, 35, '2025-03-10', 'kñhvñhk', '', 1, 4, '3'),
(61850134, 37, '2025-03-17', 'VENTA', '', 6, 2, '3'),
(63757038, 36, '2025-06-03', 'dfasdfasdfasdfasdfsadfsadfasfdasdfsadfd', '', 2, 2, '1'),
(63820122, 32, '2025-03-08', 'sadadASDASDasd', '', 1, 4, '3'),
(65491220, 32, '2025-03-08', 'sdfsadfasdfasdfasdfasdfasdfad', '', 6, 2, '3'),
(68458810, 37, '2025-03-17', '54564645', '', 1, 4, '3'),
(77799743, 32, '2025-03-17', 'dfasdfasdfsadfasdfasdf', '', 1, 4, '3'),
(79766934, 31, '2025-05-12', 'fasfasdfasdfasdfasdfasdfsadf', '', 1, 4, '2'),
(81225758, 33, '2025-03-08', 'dsfasdfasdfsdfsdafasdfasdfsadf', '', 1, 4, '3'),
(81572019, 32, '2025-03-07', 'fasdfasdfasdfsadfasdfdsfasfasdfsdfsdfdfasdf', '', 2, 2, '3'),
(87049755, 32, '2025-03-17', 'dsfasdfasdfasdfasdfsadfasdfasdfasdfasdfasdfasdfasd', '', 1, 4, '1'),
(94314095, 31, '2025-06-03', 'fsadfasdfasdfasdfasdfasdfasdfasdfasdf', '', 1, 4, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solvencia`
--

CREATE TABLE `solvencia` (
  `id_solvencia` bigint(11) NOT NULL,
  `id_dollar` bigint(11) NOT NULL,
  `codigo_comprobante` bigint(12) NOT NULL,
  `fecha_comprobante` varchar(20) NOT NULL,
  `fecha_v` varchar(20) NOT NULL,
  `fecha_e` varchar(20) NOT NULL,
  `id_usuario` bigint(11) NOT NULL,
  `motivo` varchar(20) NOT NULL,
  `monto_total` float NOT NULL,
  `estado_solvencia` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencia`
--

CREATE TABLE `sugerencia` (
  `id_sugerencia` bigint(12) NOT NULL,
  `id_usuario` bigint(12) NOT NULL,
  `sugerencia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sugerencia`
--

INSERT INTO `sugerencia` (`id_sugerencia`, `id_usuario`, `sugerencia`) VALUES
(1, 297722942, 'fhsdhñajhñsadfhñlfjslfjñaslfjñsjfslkfjañsldkfjñalkdfj\r\n'),
(2, 297722942, 'excelente gracias '),
(3, 297722942, 'indique el motivo por el cual no posee algunos de los requisitos pero '),
(4, 297722942, 'fasdfsadfasdfasd'),
(5, 297722942, 'asdfasdfasdf'),
(6, 297722942, 'ñdfhsñaldjkfhñldsfk\r\n'),
(7, 297722942, 'aqui puede comentar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasa_moneda`
--

CREATE TABLE `tasa_moneda` (
  `id_tasa_moneda` bigint(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `valor` float NOT NULL,
  `estado_moneda` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tasa_moneda`
--

INSERT INTO `tasa_moneda` (`id_tasa_moneda`, `fecha`, `valor`, `estado_moneda`) VALUES
(1, '15-08-2024', 45, 2),
(2, '15-08-2024', 54.56, 2),
(3, '23-02-2025', 45.8, 2),
(4, '09-03-2025', 23.45, 2),
(5, '19-03-2025', 46.87, 2),
(6, '20-Apr-2025', 92, 2),
(7, '09-05-2025', 104, 2),
(8, '12-05-2025', 104, 2),
(9, '12-05-2025', 104, 2),
(10, '12-05-2025', 104, 2),
(11, '13-05-2025', 103, 2),
(12, '13-05-2025', 103, 2),
(13, '13-05-2025', 103, 2),
(14, '13-05-2025', 103, 2),
(15, '30-05-2025', 110, 2),
(16, '03-06-2025', 110, 2),
(17, '03-06-2025', 110, 2),
(18, '04-06-2025', 110, 2),
(19, '10-06-2025', 113, 2),
(20, '19-07-2025', 138, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acabado`
--

CREATE TABLE `tipo_acabado` (
  `id_tipo_acabado` int(11) NOT NULL,
  `tipo_acabado` varchar(20) NOT NULL,
  `descripcion_acabado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_acabado`
--

INSERT INTO `tipo_acabado` (`id_tipo_acabado`, `tipo_acabado`, `descripcion_acabado`) VALUES
(1, 'Sin Friso', 'Las Paredes no presenta friso.'),
(2, 'Friso Liso', 'Las Paredes presenta un friso liso.'),
(3, 'Friso Rustico', 'Las Paredes presenta un friso con variaciones en la textura debido al uso del cepillo de madera o rodillo de textura.'),
(4, 'Obra Limpia', 'Los elementos integrantes del acabado de la obra son de primera, no requiriendo agregados adicionales.'),
(6, 'Lujoso', 'Las Paredes presenta cerámica.'),
(9, 'Otros', 'Cualquier Otro tipo de acabado no señalado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_acceso`
--

CREATE TABLE `tipo_acceso` (
  `id_tipo_acceso` int(11) NOT NULL,
  `tipo_acceso` varchar(20) NOT NULL,
  `descripcion_acceso` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_acceso`
--

INSERT INTO `tipo_acceso` (`id_tipo_acceso`, `tipo_acceso`, `descripcion_acceso`) VALUES
(1, 'Calle Pavimentada', 'Acceso al inmueble es una calle que esta pavimentada y es transitable.'),
(2, 'Calle Engranzonada', 'Calle presenta una capa uniforme de material de relleno, sin paviemnto.'),
(3, 'Calle de Tierra', 'Calle es de tierra, sin relleno; pero transitable.'),
(4, 'Escalera Pavimento', 'Acceso al inmueble es una escalera comun pavimentada.'),
(5, 'Escalera de Tierra', 'Acceso al inmueble es una escalera comun de tierra (sin paviemento)'),
(6, 'Otros', 'Otro tipo de acceso no señalado en los puntos anteriores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carga`
--

CREATE TABLE `tipo_carga` (
  `id_tipo_carga` bigint(20) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_carga`
--

INSERT INTO `tipo_carga` (`id_tipo_carga`, `tipo`) VALUES
(1, 'Esposa o Esposo'),
(2, 'Padre/ Madre'),
(3, 'hijo /hoja '),
(4, 'hermana / hermano'),
(5, 'abuelo / abuela'),
(6, 'tio/ tia'),
(7, 'primo/ prima'),
(8, 'sobrina / sobrino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_clausula`
--

CREATE TABLE `tipo_clausula` (
  `id_tipo_clausula` int(11) NOT NULL,
  `tipo_clausula` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_clausula`
--

INSERT INTO `tipo_clausula` (`id_tipo_clausula`, `tipo_clausula`, `descripcion`) VALUES
(1, 'Identificación de las partes', ' Esta cláusula identifica quiénes son las partes involucradas en el contrato (vendedor y comprador, o arrendador y arrendatario), incluyendo sus nombres completos, datos de identificación y domicilios.'),
(2, 'Descripción del inmueble', 'Se detalla la propiedad objeto del contrato, incluyendo su ubicación, características físicas (tamaño, número de habitaciones, etc.), y número de referencia catastral.'),
(3, 'Precio y forma de pago', 'Se especifica el precio total de la venta o la renta mensual, así como la forma en que se realizará el pago (efectivo, transferencia bancaria, etc.) y las fechas límite para los pagos.'),
(4, 'Plazo del contrato', 'Se indica la duración del contrato, ya sea un plazo fijo (por ejemplo, un año) o un plazo indefinido. En el caso de la venta, se puede establecer una fecha para la transferencia de la propiedad.'),
(5, 'Condiciones de entrega', 'Se establecen las condiciones en las que se entregará el inmueble, incluyendo la fecha de entrega, el estado en el que debe encontrarse y quién se hará cargo de los gastos de entrega.'),
(6, 'Obligaciones de las partes: ', 'Se detallan las responsabilidades tanto del vendedor/arrendador como del comprador/arrendatario. Por ejemplo, el vendedor puede ser responsable de entregar el inmueble en buen estado, mientras que el comprador debe pagar el precio acordado.'),
(7, 'Garantías', 'Se establecen las garantías que ofrece el vendedor sobre el inmueble, como la ausencia de vicios ocultos o problemas legales.'),
(8, 'Cláusula penal', 'Se estipulan las penalizaciones en caso de incumplimiento del contrato por alguna de las partes. Por ejemplo, se puede establecer una multa por retraso en el pago o por incumplimiento de alguna obligación.'),
(9, 'Resolución del contrato', 'Se indican las causas por las que se puede rescindir el contrato antes de su vencimiento, así como las consecuencias de la rescisión'),
(10, 'Jurisdicción y ley aplicable', 'Se especifica qué leyes se aplicarán en caso de disputa y qué tribunales serán competentes para resolver cualquier conflicto relacionado con el contrato.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_complementaria`
--

CREATE TABLE `tipo_complementaria` (
  `id_tipo_complementario` int(11) NOT NULL,
  `tipo_complementario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_complementaria`
--

INSERT INTO `tipo_complementaria` (`id_tipo_complementario`, `tipo_complementario`) VALUES
(1, 'Ascensor'),
(2, 'Aire Acondicionado'),
(3, 'Closeth'),
(4, 'Rejas'),
(5, 'Porcelana'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_conservacion`
--

CREATE TABLE `tipo_conservacion` (
  `id_tipo_conservacion` bigint(11) NOT NULL,
  `tipo_conservacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_conservacion`
--

INSERT INTO `tipo_conservacion` (`id_tipo_conservacion`, `tipo_conservacion`) VALUES
(1, 'Excelente'),
(2, 'Bueno'),
(3, 'Regular'),
(4, 'Malo'),
(5, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_construccion`
--

CREATE TABLE `tipo_construccion` (
  `id_tipo_construccion` int(14) NOT NULL,
  `tipo_construccion` varchar(20) NOT NULL,
  `descripcion_contruccion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_construccion`
--

INSERT INTO `tipo_construccion` (`id_tipo_construccion`, `tipo_construccion`, `descripcion_contruccion`) VALUES
(1, 'Edif', 'Edificio'),
(2, 'Apto', 'Apartamento'),
(3, 'Qta', 'Quinta'),
(4, 'Casa', 'Casa'),
(5, 'Rancho', 'Rancho'),
(6, 'C.C', 'Centro Comercial'),
(7, 'Local C', 'Local Comercial'),
(8, 'Ofc', 'Oficina'),
(9, 'Galpon', 'Galpon'),
(10, 'Otros', 'Otro tipo de construción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_construccion_generales`
--

CREATE TABLE `tipo_construccion_generales` (
  `id_tipo_construccion_generales` int(14) NOT NULL,
  `tipo_construccion_generales` varchar(20) NOT NULL,
  `descripcion_tipo_construccion_generales` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_construccion_generales`
--

INSERT INTO `tipo_construccion_generales` (`id_tipo_construccion_generales`, `tipo_construccion_generales`, `descripcion_tipo_construccion_generales`) VALUES
(1, 'Edif', 'Edificio'),
(2, 'Apto', 'Apartamento'),
(3, 'Qta', 'Quinta'),
(4, 'Casa', 'Casa'),
(5, 'Rancho', 'Rancho'),
(6, 'C.C', 'Centro Comercial'),
(7, 'Local C', 'Local Comercial'),
(8, 'Ofc', 'Oficina'),
(9, 'Galpon', 'Galpon '),
(10, 'Otros', 'Otro tipo de construción'),
(11, 'Casa/Quinta', 'Casa/Quinta'),
(12, 'Chalet', 'Chalet'),
(13, 'Twon House', 'Twon House'),
(14, 'Casa Tradicional', 'Casa Tradicional'),
(15, 'Casa Convecional', 'Casa Convecional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_contrato`
--

CREATE TABLE `tipo_contrato` (
  `id_tipo_contrato` int(11) NOT NULL,
  `tipo_contrato` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_contrato`
--

INSERT INTO `tipo_contrato` (`id_tipo_contrato`, `tipo_contrato`, `descripcion`) VALUES
(1, 'Contrato Venta de Inmueble', ''),
(2, 'Contrato de Arrendamiento ', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cubierta`
--

CREATE TABLE `tipo_cubierta` (
  `id_tipo_cubierta` int(11) NOT NULL,
  `tipo_cubierta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_cubierta`
--

INSERT INTO `tipo_cubierta` (`id_tipo_cubierta`, `tipo_cubierta`) VALUES
(1, 'Madera/Teja'),
(2, 'Placa/Teja'),
(3, 'Platabanda'),
(4, 'Teja'),
(5, 'Asbesto'),
(6, 'Aluminio'),
(7, 'Zinc'),
(8, 'Aceroli'),
(9, 'Plafond'),
(10, 'Raso Laminas'),
(11, 'Raso Economico'),
(12, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_descripcion_uso`
--

CREATE TABLE `tipo_descripcion_uso` (
  `id_tipo_descripcion_uso` int(11) NOT NULL,
  `tipo_descripcion_uso` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_descripcion_uso`
--

INSERT INTO `tipo_descripcion_uso` (`id_tipo_descripcion_uso`, `tipo_descripcion_uso`, `descripcion`) VALUES
(1, 'Unifamiliar', 'La edificación es utilizada por una sola familia, respondiendo su distribucion arquitectónica a esta situación.'),
(2, 'Bifamiliar', 'La edificación de dos niveles o apareada, fue construida para albergar dos familias, estas presentan conexiones independientes a los servicios.'),
(3, 'Multifamiliar', 'La edificación por lo general de varios niveles, alberga varias familia, acorde con su distribución arquitectónica original.'),
(4, 'Comercio al Detal', 'La edificación esta destinado al comercio menor.'),
(5, 'Comercio al Mayor', 'La edificación es utilizada para la venta o distribución de cualquier producto en grandes coantidades.'),
(6, 'Mercado Libre', 'La edificación es utilizada como mercado, donde existen pequeños expendedores al detal.'),
(7, 'Oficina', 'La edificación funcionan oficinas de cualquier tipo, local destinado a actividades administrativas o al ejercicio de profesionales.'),
(8, 'Industria', 'La edificación es utilizada se utiliza para procesar materia prima.'),
(9, 'Servicio', 'La edificación es utilizada se utiliza para prestar algún servicio bien sea publico o privado.'),
(10, 'Agropecuario', 'La edificación es utilizada se utiliza para realizar actividades agropecuaria.'),
(11, 'Otro', 'Cualquier Otro tipo de descripción de uso no señalado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_destino`
--

CREATE TABLE `tipo_destino` (
  `id_tipo_destino` int(11) NOT NULL,
  `tipo_destino` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_destino`
--

INSERT INTO `tipo_destino` (`id_tipo_destino`, `tipo_destino`) VALUES
(1, 'Multifamiliar'),
(2, 'Comercial'),
(3, 'Industrial'),
(4, 'Recreativo/Deportivo'),
(5, 'Asistencia/Salud'),
(6, 'Educacional'),
(7, 'Turístico'),
(8, 'Social/Cultural'),
(9, 'Gubernamental/Institucional'),
(10, 'Religioso'),
(11, 'Pesquero'),
(12, 'Agroindustrial'),
(13, 'Agroforestal'),
(14, 'Agricola'),
(15, 'Pecuario'),
(16, 'Forestal'),
(17, 'Minero'),
(18, 'Sin uso'),
(19, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_entorno`
--

CREATE TABLE `tipo_entorno` (
  `id_tipo_entorno` int(11) NOT NULL,
  `tipo_entorno` varchar(20) NOT NULL,
  `descripcion_entorno` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_entorno`
--

INSERT INTO `tipo_entorno` (`id_tipo_entorno`, `tipo_entorno`, `descripcion_entorno`) VALUES
(1, 'Zona Urbanizada', 'inmueble que se encuentra localizado en una zomna urbanizada dentro o fuera de la poligonal urbana, determinada por la alcaldia.'),
(2, 'Zona No Urbanizada', 'Inmueble que esta localizada en una zona o sector, disponible o no de los servicios basicos, pero fuera del area urbana establecida.'),
(3, 'Río / Quebrada', 'Inmueble colinda con un rio / quebrada sin importar que estos no presenten caudal alguno.'),
(4, 'Barranco / Talud', 'Inmueble que se encuentra emplazado cerca de un corte pronunciado del terreno; ya sea sobre el talud, en el talud o bajo el talud.'),
(5, 'Otro', 'Cualquier otro tipo de entorno fisico no señalado en los puntos anteriores.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_escala`
--

CREATE TABLE `tipo_escala` (
  `id_tipo_escala` int(11) NOT NULL,
  `tipo_escala` varchar(20) NOT NULL,
  `descripcion_escala` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_escala`
--

INSERT INTO `tipo_escala` (`id_tipo_escala`, `tipo_escala`, `descripcion_escala`) VALUES
(1, '1:50', ''),
(2, '1:100', ''),
(3, '1:125', ''),
(4, '1:150', ''),
(5, '1:200', ''),
(6, '1:250', ''),
(7, '1:300', ''),
(8, '1:400', ''),
(9, '1:500', ''),
(10, '1:600', ''),
(11, '1:700', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_escala_lote`
--

CREATE TABLE `tipo_escala_lote` (
  `id_escala_lote` bigint(12) NOT NULL,
  `tipo_escala` bigint(12) NOT NULL,
  `descripcion_lote` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estructura`
--

CREATE TABLE `tipo_estructura` (
  `id_tipo_estructura` int(11) NOT NULL,
  `tipo_estructura` varchar(20) NOT NULL,
  `descripcion_estructura` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_estructura`
--

INSERT INTO `tipo_estructura` (`id_tipo_estructura`, `tipo_estructura`, `descripcion_estructura`) VALUES
(1, 'Concreto Armado', 'La edificación se soporta en columnas de una mezcla de arena, cemento, piedra picada y cabillas de acero.'),
(2, 'Metálica', 'La edificación se soporta en una estructura de acero, hierro u otro elemento metalico.'),
(3, 'Madera', 'La edificación se soporta en una estructura de madera.'),
(4, 'Paredes de Carga', 'Las paredes reposa la estructura que soporta el techo, es decir que si eliminamos las paredes el techo de desploma.'),
(5, 'Prefabricado', 'La edificación se soporta en elementos prefabricados.'),
(6, 'Machones', 'La edificación se soporta en columnas de concreto mezclado, utilizada generalmente en edificaciones de un nivel, en estos casos la columna es vaciada una vez levantada las paredes.'),
(7, 'Otro', 'Cualquier Otro tipo de soporte no señalado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_forma`
--

CREATE TABLE `tipo_forma` (
  `id_tipo_forma` int(11) NOT NULL,
  `tipo_forma` varchar(20) NOT NULL,
  `descripcion_forma` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_forma`
--

INSERT INTO `tipo_forma` (`id_tipo_forma`, `tipo_forma`, `descripcion_forma`) VALUES
(1, 'Regular', 'Forma de la Parcela es semejante a un rectangulo o un cuadrado, y esta en condiciones de lograr la maxima utilización del terreno.'),
(2, 'Irregular', 'Forma de la Parcela es un poligono irregular, es decir que representa dificultad para lograr su maximo aprovechamiento.'),
(3, 'Muy Irregular', 'La forma se excede de quiebres y ondulaciones, dificultando aun mas su posibilidad de aprovechamiento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_gravament`
--

CREATE TABLE `tipo_gravament` (
  `id_tipo_gravament` int(11) NOT NULL,
  `tipo_gravament` varchar(100) NOT NULL,
  `descripcion_gravament` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_gravament`
--

INSERT INTO `tipo_gravament` (`id_tipo_gravament`, `tipo_gravament`, `descripcion_gravament`) VALUES
(1, 'Hipoteca', 'Este gravamen representa un derecho real que grava el inmueble en garantía del cumplimiento de una obligación (generalmente un préstamo). Implica que el inmueble responde por la deuda, y en caso de impago, el acreedor hipotecario puede ejecutar la garantía y obtener el pago con el producto de la venta del inmueble.'),
(2, 'Embargo', 'Este gravamen es una medida judicial que inmoviliza el inmueble, impidiendo su venta o transferencia. Se decreta para asegurar el pago de una deuda o el cumplimiento de una obligación legal. Indica que el inmueble está sujeto a un proceso legal y puede ser objeto de venta forzosa.'),
(3, 'Usufructo', 'Este gravamen otorga a una persona (el usufructuario) el derecho a usar y disfrutar del inmueble, aunque la propiedad pertenezca a otra (el nudo propietario). El usufructuario puede percibir los frutos del inmueble, pero no puede venderlo ni hipotecarlo.'),
(4, 'Servidumbre', 'Este gravamen establece un derecho real que permite a un predio (predio dominante) utilizar o beneficiarse de otro predio (predio sirviente). Puede implicar el derecho de paso, el derecho a tomar agua, o cualquier otra limitación al uso del predio sirviente.'),
(5, 'Limitaciones de Dominio', 'Este gravamen engloba restricciones legales o convencionales que limitan el derecho de propiedad sobre el inmueble. Pueden incluir limitaciones urbanísticas (altura máxima, uso permitido), limitaciones impuestas por comunidades de propietarios (reglamento de copropiedad), o limitaciones derivadas de contratos.'),
(6, 'Afecciones Fiscales', 'Este gravamen se refiere a deudas pendientes relacionadas con impuestos sobre el inmueble, como el impuesto predial. Indica que el inmueble está sujeto al pago de dichas deudas, y en caso de impago, la autoridad fiscal puede ejecutar el inmueble.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_horario`
--

CREATE TABLE `tipo_horario` (
  `id_tipo_horario` int(11) NOT NULL,
  `tipo_horario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_horario`
--

INSERT INTO `tipo_horario` (`id_tipo_horario`, `tipo_horario`) VALUES
(1, '08:00 a 09:00'),
(2, '09:00 a 10:00'),
(3, '10:00 a 11:00'),
(4, '11:00 a 12:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_identificacion`
--

CREATE TABLE `tipo_identificacion` (
  `id_ti` int(11) NOT NULL,
  `tipo_i` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_tipo_p` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_identificacion`
--

INSERT INTO `tipo_identificacion` (`id_ti`, `tipo_i`, `descripcion`, `id_tipo_p`) VALUES
(1, 'V', 'Venezolano', 1),
(2, 'E', 'Extranjero', 1),
(3, 'J', 'Empresa Privada', 2),
(4, 'G', 'Institucion Gubernamental', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_inmueble`
--

CREATE TABLE `tipo_inmueble` (
  `id_tipo_inmueble` int(11) NOT NULL,
  `tipo_inmueble` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_instalaciones_electricas`
--

CREATE TABLE `tipo_instalaciones_electricas` (
  `id_tipo_instalaciones_electricas` int(11) NOT NULL,
  `tipo_instalaciones_electricas` varchar(20) NOT NULL,
  `descripcion_instalaciones` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_instalaciones_electricas`
--

INSERT INTO `tipo_instalaciones_electricas` (`id_tipo_instalaciones_electricas`, `tipo_instalaciones_electricas`, `descripcion_instalaciones`) VALUES
(1, 'Embutida', 'Las instalaciones eléctricas están embutida.'),
(2, 'Externa', 'Las instalaciones eléctricas están externa.'),
(3, 'Industrial', 'Las instalaciones eléctricas son industriales.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_interno`
--

CREATE TABLE `tipo_interno` (
  `id_tipo_interno` int(11) NOT NULL,
  `tipo_interno` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_interno`
--

INSERT INTO `tipo_interno` (`id_tipo_interno`, `tipo_interno`, `descripcion`) VALUES
(1, 'Plafón', 'La cubierta interna es de plafón.'),
(2, 'Cielo Raso Laminas', 'La cubierta interna es de cielo raso.'),
(3, 'Cielo Raso Economico', 'La cubierta interna es de cielo raso económico.'),
(4, 'Otros', 'Cualquier Otro tipo de cubierta interna no señalado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_lugar_inmueble`
--

CREATE TABLE `tipo_lugar_inmueble` (
  `id_tipo_lugar_inmueble` int(10) NOT NULL,
  `tipo_lugar_inmueble` varchar(20) NOT NULL,
  `descripcion_lugar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_lugar_inmueble`
--

INSERT INTO `tipo_lugar_inmueble` (`id_tipo_lugar_inmueble`, `tipo_lugar_inmueble`, `descripcion_lugar`) VALUES
(1, 'Urb', 'Urbanizacion'),
(2, 'Conj. Resd', 'Conjunto Residencial'),
(3, 'Barrio', 'Barrio'),
(4, 'Sector', 'Sector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mejora`
--

CREATE TABLE `tipo_mejora` (
  `id_tipo_mejora` int(11) NOT NULL,
  `tipo_mejora` varchar(20) NOT NULL,
  `descripcion_mejora` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_mejora`
--

INSERT INTO `tipo_mejora` (`id_tipo_mejora`, `tipo_mejora`, `descripcion_mejora`) VALUES
(1, 'Muro de Contención', 'El predio existen muros de contención, definidos como la estructura de soporte inclinada o vertical para confinar o restringir el movimiento de tierra o agua.'),
(2, 'Nivelación', 'EL terreno donde esta ubicado el inmueble se ha realizado una nivelación, entendiéndose como tal, al trabajo realizado en el terreno para uniforme las diferentes alturas o elevaciones.'),
(3, 'Cercado', 'El terreno donde esta ubicado el inmueble esta cercado, entendiéndose como tal al muro o cerca que se pone alrededor de algún terreno para su resguardo y que sirve para desmarcar los limistes de una p'),
(4, 'Pozo Séptico', 'El terreno donde esta ubicado el inmueble, existe un pozo séptico.'),
(5, 'Lagunas Artificiales', 'En el predio existen lagunas artificiales definidas como deposito para el almacenaje de agua hecho por el hombre a fin de suministrar agua al inmueble.'),
(6, 'Otros', 'Cualquier Otro tipo de mejora de terreno no señalado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_moneda`
--

CREATE TABLE `tipo_moneda` (
  `id_tipo_moneda` int(11) NOT NULL,
  `tipo_moneda` varchar(20) NOT NULL,
  `codigo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_moneda`
--

INSERT INTO `tipo_moneda` (`id_tipo_moneda`, `tipo_moneda`, `codigo`) VALUES
(1, 'EUR', '<i class=\"nav-icon fa fa-euro-sign\"></i>'),
(2, 'CNY', '<i class=\"nav-icon fa fa-yen-sign\"></i>'),
(3, 'TRY', '<i class=\"nav-icon fa fa-lira-sign\"></i>'),
(4, 'RUB', '<i class=\"nav-icon fa fa-ruble-sign\"></i>'),
(5, 'USD', '<i class=\"nav-icon fa fa-dollar-sign\"></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_motivo`
--

CREATE TABLE `tipo_motivo` (
  `id_tipo_motivo` int(11) NOT NULL,
  `tipo_motivo` varchar(200) NOT NULL,
  `estado_motivos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_motivo`
--

INSERT INTO `tipo_motivo` (`id_tipo_motivo`, `tipo_motivo`, `estado_motivos`) VALUES
(17, 'Contrato de Consecución de Uso Gratuito de Parcela de Terreno Municipal.', 1),
(18, 'Adjudicaciones de Arrendamiento con Opcion a Compra por M2.', 1),
(20, 'Otros', 1),
(21, 'Audiencia con el Director', 1),
(54, 'Contrato de Compra-Venta de Terreno (Parcela sin Desarrollar Compra Ordinaria por M2).', 1),
(528, 'Plano Mensura.', 1),
(529, 'Certificado de Empadronamiento.', 0),
(531, 'Solicitud de Cambio de Estructura Parcelaria.', 1),
(532, 'Cambio de Estructura Parcelaria por M2 del Área Total de la Parcela.', 1),
(533, 'Tasa Por Cambio de Propiedad (Constancia de Inscripción y Plano Mensura).', 1),
(534, 'Constancia de Inscripción de Inmueble o Cédula Catastral (Nueva).', 1),
(535, 'Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.', 0),
(536, 'Solicitud de Rectificación de Medidas y Linderos.', 0),
(539, 'Solicitud de Contrato de Arrendamiento de Terreno (Parcela sin Desarrollar).', 0),
(541, 'Solicitud de Regularización de la Tenencia de la Tierra (Parcela Desarrollada).', 1),
(542, 'Solicitud de Compra de Terreno Municipal (Compra Ordinaria).', 1),
(543, 'Solicitud de Traspaso de Terreno.', 0),
(544, 'Contrato de Arrendamiento de Terreno (Parcela sin Desarrollar por M2).', 0),
(634, 'Tasa por Inspección General.', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_paredes`
--

CREATE TABLE `tipo_paredes` (
  `id_tipo_paredes` int(11) NOT NULL,
  `tipo_paredes` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_paredes`
--

INSERT INTO `tipo_paredes` (`id_tipo_paredes`, `tipo_paredes`) VALUES
(1, 'Bloque'),
(2, 'Ladrillo'),
(3, 'Prefabricado'),
(4, 'Bahareque'),
(5, 'Adobe-Tapia'),
(6, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_persona`
--

CREATE TABLE `tipo_persona` (
  `id_tp` int(11) NOT NULL,
  `tipo_p` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_persona`
--

INSERT INTO `tipo_persona` (`id_tp`, `tipo_p`, `descripcion`) VALUES
(1, 'Pn', 'Persona natural'),
(2, 'Pj', 'Persona juridica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_piezas`
--

CREATE TABLE `tipo_piezas` (
  `id_tipo_piezas` int(12) NOT NULL,
  `tipo_piezas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_piezas`
--

INSERT INTO `tipo_piezas` (`id_tipo_piezas`, `tipo_piezas`) VALUES
(1, 'Porcelana Fina'),
(2, 'Porcelana Economica'),
(3, 'Bañera'),
(4, 'Calentador'),
(5, 'W.C.'),
(6, 'Bidet'),
(7, 'Lavamanos'),
(8, 'Ducha'),
(9, 'Letrinas'),
(10, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pintura`
--

CREATE TABLE `tipo_pintura` (
  `id_tipo_pintura` int(11) NOT NULL,
  `tipo_pintura` varchar(20) NOT NULL,
  `descripcion_pintura` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pintura`
--

INSERT INTO `tipo_pintura` (`id_tipo_pintura`, `tipo_pintura`, `descripcion_pintura`) VALUES
(1, 'Caucho', 'Las paredes presentan pintura de caucho.'),
(2, 'Oleo', 'Las paredes presentan pintura de óleo.'),
(3, 'Lechada', 'Las paredes presentan pintura de caucho.'),
(4, 'Pasta', 'Las paredes presentan pintura de pasta.'),
(5, 'Asbetina', 'Las paredes presentan pintura de asbetina.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_piso`
--

CREATE TABLE `tipo_piso` (
  `id_tipo_piso` int(11) NOT NULL,
  `tipo_piso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_piso`
--

INSERT INTO `tipo_piso` (`id_tipo_piso`, `tipo_piso`) VALUES
(1, 'Cemento Pulido'),
(2, 'Cemento Rústico'),
(3, 'Cemento Color'),
(4, 'Baldosa'),
(5, 'Granito 1'),
(6, 'Granito 2'),
(7, 'Lujoso'),
(8, 'Vinil'),
(9, 'Mosaico'),
(10, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_porcentaje`
--

CREATE TABLE `tipo_porcentaje` (
  `id_tipo_porcentaje` int(11) NOT NULL,
  `tipo_porcentaje` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_porcentaje`
--

INSERT INTO `tipo_porcentaje` (`id_tipo_porcentaje`, `tipo_porcentaje`) VALUES
(1, '10%'),
(2, '20%'),
(3, '30%'),
(4, '40%'),
(5, '50%'),
(6, '60%'),
(7, '70%'),
(8, '80%'),
(9, '90%'),
(10, '100%');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_puerta`
--

CREATE TABLE `tipo_puerta` (
  `id_tipo_puerta` bigint(11) NOT NULL,
  `tipo_puerta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_puerta`
--

INSERT INTO `tipo_puerta` (`id_tipo_puerta`, `tipo_puerta`) VALUES
(1, 'Entamborada Economica'),
(2, 'Entamborada Fina'),
(3, 'Metalica'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_regimen`
--

CREATE TABLE `tipo_regimen` (
  `id_tipo_regimen` int(11) NOT NULL,
  `tipo_regimen` varchar(20) NOT NULL,
  `descripcion_regimen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_regimen`
--

INSERT INTO `tipo_regimen` (`id_tipo_regimen`, `tipo_regimen`, `descripcion_regimen`) VALUES
(1, 'Municipio Propio', 'El inmueble es de propiedad del Municipio, habiendo sido adquirido por compra o donación.'),
(2, 'Nacional', 'El inmueble pertenece a la nación, forman parte de los bienes nacionales, según los establecido en el Art.16 de la Lay Orgánica de la Hacienda Pública Nacional.'),
(3, 'Estadal', 'El inmueble pertenece a las entidades federales (Estados).'),
(4, 'Priv. Individual', 'El inmueble pertenece a una persona natural o juridica.'),
(5, 'Priv. Condominio', 'El inmueble se rige por la ley de la propiedad horizontal.'),
(6, 'Otro', 'Cualquier Otro tipo de régimen de propiedad no señalado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio_publico`
--

CREATE TABLE `tipo_servicio_publico` (
  `id_tipo_servicio_publico` int(11) NOT NULL,
  `tipo_servicio_publico` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_servicio_publico`
--

INSERT INTO `tipo_servicio_publico` (`id_tipo_servicio_publico`, `tipo_servicio_publico`) VALUES
(1, 'Acueducto'),
(2, 'Cloacas'),
(3, 'Drenaje Artificial'),
(4, 'Pavimento'),
(5, 'Acera'),
(6, 'Electricidad Industrial'),
(7, 'Alumbrado Público'),
(8, 'Vialidad'),
(9, 'Aseo Urbano'),
(10, 'Cable TV'),
(11, 'Transporte'),
(12, 'Teléfono'),
(13, 'Cobertura Celular'),
(14, 'Escuelas'),
(15, 'Medicaturas'),
(16, 'Correo y Telégrafo'),
(17, 'Gas'),
(18, 'Aseo'),
(19, 'Electricidad Residencial'),
(20, 'Riego'),
(21, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE `tipo_solicitud` (
  `id_tipo_solicitud` int(11) NOT NULL,
  `tipo_solicitud` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`id_tipo_solicitud`, `tipo_solicitud`) VALUES
(1, 'Cita'),
(2, 'Inspección'),
(3, 'Evacuación de Titulo Supletorio'),
(4, 'Empadronamiento'),
(5, 'Contrato'),
(6, 'Regulación de la Tenencia de Tierra'),
(7, 'Cambio de Restructuración Parcelaria'),
(8, 'Copias Certificadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_techo`
--

CREATE TABLE `tipo_techo` (
  `id_tipo_techo` int(11) NOT NULL,
  `tipo_techo` varchar(20) NOT NULL,
  `descripcion_techo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_techo`
--

INSERT INTO `tipo_techo` (`id_tipo_techo`, `tipo_techo`, `descripcion_techo`) VALUES
(1, 'Concreto', 'Los elementos estructurales que soportan la cubierta de techo, son a base de concreto armado.'),
(2, 'Metálica', 'Los elementos estructurales que soportan la cubierta de techo son metálico.'),
(3, 'Madera', 'Los elementos estructurales que soportan la cubierta son vigas de madera.'),
(4, 'Varas', 'Los elementos estructurales que soportan la cubierta de techo son varas de madera.'),
(6, 'Otro', 'Cualquier Otro tipo de Techo señalado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tenencia`
--

CREATE TABLE `tipo_tenencia` (
  `id_tipo_tenencia` bigint(11) NOT NULL,
  `tipo_tenencia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_tenencia`
--

INSERT INTO `tipo_tenencia` (`id_tipo_tenencia`, `tipo_tenencia`) VALUES
(1, 'Municipal'),
(2, 'Individual'),
(3, 'Condominio'),
(4, 'Compañía'),
(5, 'Nacional'),
(6, 'Comunidad'),
(7, 'Arrendado'),
(8, 'Enfiteusis'),
(9, 'Ocupado'),
(10, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_terreno`
--

CREATE TABLE `tipo_terreno` (
  `id_tipo_terreno` bigint(11) NOT NULL,
  `area_terreno` float NOT NULL,
  `id_tenencia` bigint(11) NOT NULL,
  `estado_terreno` int(5) NOT NULL,
  `id_ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tipologia`
--

CREATE TABLE `tipo_tipologia` (
  `id_tipo_tipologia` int(11) NOT NULL,
  `tipo_tipologia` varchar(20) NOT NULL,
  `descripcion_tipologia` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_tipologia`
--

INSERT INTO `tipo_tipologia` (`id_tipo_tipologia`, `tipo_tipologia`, `descripcion_tipologia`) VALUES
(1, 'A', 'Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo A'),
(2, 'B', 'Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo B'),
(3, 'C', 'Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo C'),
(4, 'D', 'Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo D'),
(5, 'E', 'Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo E'),
(6, 'F', 'Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_topografia`
--

CREATE TABLE `tipo_topografia` (
  `id_tipo_topografia` int(11) NOT NULL,
  `tipo_topografia` varchar(20) NOT NULL,
  `descripcion_topografia` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_topografia`
--

INSERT INTO `tipo_topografia` (`id_tipo_topografia`, `tipo_topografia`, `descripcion_topografia`) VALUES
(1, 'Plano', 'La superficie del terreno se presenta plana o con pocos altibajos con la relación a la cabeza de acceso.'),
(2, 'Sobre Nível', 'La superficie del terreno se encuentra por encima del plano definido por la calzada del acceso.'),
(3, 'Bajo Nível', 'La superficie del terreno se encuentra por debajo del plano definido por la calzada del acceso.'),
(4, 'Corte', 'El terreno fue sometido a un movimiento de tierra para lograr su mejor aprovechamiento, el corte realizado remueve el terreno natural que se encuentra por encima de la calzada de acceso.'),
(5, 'Relleno', 'La parcela se le adiciona un agregado de material elevando su nivel.'),
(6, 'Inclinado', 'La superficie del terreno presenta inclinación.'),
(7, 'Irregular', 'La superficie del terreno presenta irregularidades en el relieve como por ejemplo, colina con pequeños valles, ligeramente planos, ligeramente inclinados, con inclinaciones muy abruptas, entre otros.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ubicacion`
--

CREATE TABLE `tipo_ubicacion` (
  `id_tipo_ubicacion` int(11) NOT NULL,
  `tipo_ubicacion` varchar(20) NOT NULL,
  `descripcion_ubicacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ubicacion`
--

INSERT INTO `tipo_ubicacion` (`id_tipo_ubicacion`, `tipo_ubicacion`, `descripcion_ubicacion`) VALUES
(1, 'Convecional', 'EL inmueble se puede ubicar facilmente desde la via de acceso al mismo.'),
(2, 'Esquina', 'Inmueble se encuentra ubicado en una de las esquinas de la manzana, ofreciendo mejores condiciones para su aprovechamiento.'),
(3, 'Interior de Manzana', 'Inmueble no es de facil ubicación, aun estando en frente a la via de acceso.'),
(4, 'Oculta', 'Acceso de inmueble es por el interior de otro inmueble, estando ubicado en el interior de la manzana sin ningun otro tipo de acceso.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ubicacion_entre`
--

CREATE TABLE `tipo_ubicacion_entre` (
  `id_tipo_ubicacion_entre` int(14) NOT NULL,
  `tipo_ubicacion_entre` varchar(10) NOT NULL,
  `descripcion_ubicacion_entre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ubicacion_entre`
--

INSERT INTO `tipo_ubicacion_entre` (`id_tipo_ubicacion_entre`, `tipo_ubicacion_entre`, `descripcion_ubicacion_entre`) VALUES
(1, 'Av', 'Avenida '),
(2, 'Clle', 'Calle'),
(3, 'Crr', 'Carril'),
(4, 'Trav', 'Transversal'),
(5, 'Prol', 'Prolongacion'),
(6, 'Crrt', 'Carretera'),
(7, 'Cjn', 'Callejon'),
(8, 'Psje', 'Pasaje'),
(9, 'Blv', 'Boolevar'),
(10, 'Vda', 'Vereda'),
(11, 'Esc', 'Escalera'),
(12, 'Snd', 'Senderos'),
(13, 'Tcal', 'Troncal'),
(14, 'Cno', 'Conuno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ventana`
--

CREATE TABLE `tipo_ventana` (
  `id_tipo_ventana` int(11) NOT NULL,
  `tipo_ventana` varchar(20) NOT NULL,
  `descripcion_ventana` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ventana`
--

INSERT INTO `tipo_ventana` (`id_tipo_ventana`, `tipo_ventana`, `descripcion_ventana`) VALUES
(1, 'Ventanal', 'El diseño sea ventanal.'),
(2, 'Bascula', 'El diseño de tipo basculante, las ventanas de este estilo son las que giran en torno a un eje horizontal o vertical en el centro del marco.'),
(3, 'Batiente', 'La ventana es de tipo batiente, se les denomina asi cuando la o las hojas se apoyan en los bordes con bisagras que sirven para que el eje de movimiento este en el marco'),
(4, 'Celosia', 'La ventana es de tipo celisia, este tipo de ventan formada por lamas horizontales que pivotan en un marco común de forma simultanea.'),
(6, 'Panorámica', 'La ventana es de tipo panorámica estas ventanas agrandan visualmente el espacio, permiten entrada de mayor cantidad de luz, pueden proyectarse hacia afuera como mirador.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo_supletorio`
--

CREATE TABLE `titulo_supletorio` (
  `id_titulo_supletorio` bigint(12) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `numero_titulo` varchar(100) NOT NULL,
  `folio_titulo` int(11) NOT NULL,
  `tomo_titulo` int(11) NOT NULL,
  `protocolo_titulo` int(11) NOT NULL,
  `fecha_titulo` varchar(100) NOT NULL,
  `tipo_titulo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `titulo_supletorio`
--

INSERT INTO `titulo_supletorio` (`id_titulo_supletorio`, `id_inmueble_usuario`, `numero_titulo`, `folio_titulo`, `tomo_titulo`, `protocolo_titulo`, `fecha_titulo`, `tipo_titulo`) VALUES
(82857228, 32, '42343434', 0, 0, 0, '2016-01-06', 1),
(83511982, 31, '45574', 0, 0, 0, '2017-11-04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topografia_inmueble`
--

CREATE TABLE `topografia_inmueble` (
  `id_topografia` int(11) NOT NULL,
  `tipo_t` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `topografia_inmueble`
--

INSERT INTO `topografia_inmueble` (`id_topografia`, `tipo_t`, `descripcion`) VALUES
(1, 'Plano', 'Terreno que es plana o con poca altibajos con relacion a la calzada de acceso.'),
(2, 'Sobre Nivel', 'Terreno que se encuentra por encima de plano definido por la calzada de acceso.'),
(3, 'Bajo Nivel', 'Terreno se Encuentra por debajo del definido por la calzada del acceso.'),
(4, 'Corte', 'Terreno sometido a un movimiento de tierra para lograr su mejor aprovechamiento. Corte realizado remueve el terreno natural que se encuebtra por encima de la calzada de acceso.'),
(5, 'Relleno', 'La parcela se le adiciona un agregado de material elevado su nivel.'),
(6, 'Inclinado', 'Terreno presenta pendientes'),
(7, 'Irregular', 'Terreno que presenta irregularidades en el relieve como ejemplo: Pequeño Valles, Ligeramente Plano, Ligeramente Inclinaciones muy abrutas, etc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_inmueble_y`
--

CREATE TABLE `ubicacion_inmueble_y` (
  `id_ubicacion_inmueble_y` int(14) NOT NULL,
  `tipo_ubicacion_y` varchar(10) NOT NULL,
  `descripcion_ubicacion_y` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ubicacion_inmueble_y`
--

INSERT INTO `ubicacion_inmueble_y` (`id_ubicacion_inmueble_y`, `tipo_ubicacion_y`, `descripcion_ubicacion_y`) VALUES
(1, 'Av', 'Avenida '),
(2, 'Clle', 'Calle'),
(3, 'Crr', 'Carril'),
(4, 'Trav', 'Transversal'),
(5, 'Prol', 'Prolongacion'),
(6, 'Crrt', 'Carretera'),
(7, 'Cjn', 'Callejon'),
(8, 'Psje', 'Pasaje'),
(9, 'Blv', 'Boolevar'),
(10, 'Vda', 'Vereda'),
(11, 'Esc', 'Escalera'),
(12, 'Snd', 'Senderos'),
(13, 'Tcal', 'Troncal'),
(14, 'Cno', 'Conuno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `union_hechos`
--

CREATE TABLE `union_hechos` (
  `id_union_hechos` bigint(12) NOT NULL,
  `folio_UH` int(11) NOT NULL,
  `n_acta_UH` int(11) NOT NULL,
  `fecha_acta_UH` date NOT NULL,
  `anno_union` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `union_hechos`
--

INSERT INTO `union_hechos` (`id_union_hechos`, `folio_UH`, `n_acta_UH`, `fecha_acta_UH`, `anno_union`) VALUES
(12735771, 0, 0, '0000-00-00', 0),
(18659368, 0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(12) NOT NULL,
  `cedula` bigint(12) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `token` varchar(100) NOT NULL,
  `passwrd` varchar(256) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nivel` int(11) NOT NULL,
  `tipo_usuario` enum('1','2') NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `estado` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `cedula`, `nombre`, `apellido`, `usuario`, `token`, `passwrd`, `fecha_nacimiento`, `nivel`, `tipo_usuario`, `direccion`, `correo`, `estado`) VALUES
(3212323, 3212323, 'wqwewqe', 'qweqweqw', 'Ronal34', '18f7fd6e964dc908d4511e879660b9c59b785a52a5f5a489df6606c989a40fca', '$2y$10$rtaE5LA3y1XTh8KEz/zu4OBuR7qWTLN8j06xr/g3UMW2SwMS./0PG', '2025-03-13', 3, '2', 'Caña de Aucar Sector4', 'leonarmasprint@gmail.com', 1),
(3255334, 3255334, 'rqwrwrqwer', 'erqwrwer', 'Hola12', '0656b87ed007812082a42c6ce426111e42a16d25764c347766ede91740a15bf5', '$2y$10$BqivOzq91q1fnw2O9qwFYO5yAmt97QyoWpkB56m1B5e3/nMSpmWO6', '2001-03-11', 7, '1', 'fasdfasdfas', 'hola@gmail.com', 1),
(12523579, 12523579, 'KEYLA', 'armas', 'Keyla0304', 'a1bbb569071535a4bc650943ef78f47818db34bffd0a11c7813862dd973416ed', '$2y$10$kn52NsOfaO2S1d7xJ22Yh.HpPvLa2BsIj5gvggoAu78AJUU3toHb2', '1979-04-03', 4, '1', 'Caña de Aucar Sector4', 'leonarmasprint@gmail.com', 1),
(12523580, 12523580, 'Kenia Reveca', 'Armas Miranda', 'Kram0129', '61ba8dc1e82fa20a5882a65da642c1512bb4ea187bff980617b571a95b98b2d6', '$2y$10$XGiFFxJHvVfSLK.wf4mj5.iRcwogeDhLr1OYGZ5vegMHQxHaHqk0O', '2006-04-06', 4, '1', 'lkjdsfjfsh', 'leonarmasprint@gmail.com', 1),
(21272431, 21272431, 'Aldo', 'Moreno', 'aldmor', '596dfc0c625d86e4b72304e7ae80f7ab9e675568719563f9755f368b55c4e17a', '$2y$10$HP/TEMhEt/niiFl47TANfOfEJpobOLZsQPCZDMXuAFo1kGrYPAPsi', '0000-00-00', 7, '1', 'caña de azucar', 'aldoaloy@gmail.com', 1),
(24551683, 24551683, 'wewqewqeqwe', 'eqwewqe', 'Andres', 'dc7bdcefa35e46b50e91bde48dd7fda9ba7f749a4a75a696f1eea8aff41b41d5', '$2y$10$G0Jy5k1Z.rUAPuatMVzApeeo3nzv9z0fdsf6sBX4gtcF/5k4OoBxe', '2023-02-12', 4, '1', 'wqeqweqweqwe', 'leonarmasprint@gmail.com', 1),
(275631092, 27563109, 'Valeria', 'Leon', 'Valeria25', 'beec69355c910fad66a0aa32624ce2166a7991b6da7f69f56e3c43c54b12312312', '$2y$10$476qCzarfzmKHEPYjhySh.tX5ZONMMaJLH92KJK3qu.HJdbbjyLae', '2000-06-16', 2, '2', 'dasdasdasd', 'angel@gmail.com', 1),
(297722942, 29772294, 'AngelLeon', 'Leon Armas', 'angel65', 'beec69355c910fad66a0aa32624ce2166a7991b6da7f69f56e3c43c54b8cf5c2', '$2y$10$M9tQyw0hX22lHVMHk4T28OCSVDkJWFCLVVgEwX4JKazrmueLDByB6', '2003-02-19', 0, '2', 'Caña d Sector4', 'angelleonarmas23@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_conectados`
--

CREATE TABLE `usuarios_conectados` (
  `id_usuario` bigint(12) NOT NULL,
  `token` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_data`
--

CREATE TABLE `usuario_data` (
  `id_data_usuario` bigint(12) NOT NULL,
  `id_usuarios` bigint(12) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_seguridad` bigint(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion_construccion`
--

CREATE TABLE `valoracion_construccion` (
  `id_valoracion_construccion` bigint(12) NOT NULL,
  `factor_construccion` int(11) NOT NULL,
  `tipologia_construccion` varchar(11) NOT NULL,
  `alicuota_construccion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valoracion_construccion`
--

INSERT INTO `valoracion_construccion` (`id_valoracion_construccion`, `factor_construccion`, `tipologia_construccion`, `alicuota_construccion`) VALUES
(40554178, 70, 'B', 0.5),
(56963412, 40, 'D', 0.5),
(67158229, 20, 'F', 0.5),
(72434894, 400, 'A', 0.5),
(74505712, 40, 'D', 0.5),
(76629948, 50, 'C', 0.5),
(76829418, 40, 'D', 0.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion_terreno`
--

CREATE TABLE `valoracion_terreno` (
  `id_valoracion_terreno` bigint(20) NOT NULL,
  `facto_terreno` int(11) NOT NULL,
  `tipologia_terreno` varchar(11) NOT NULL,
  `alicuota_terreno` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valoracion_terreno`
--

INSERT INTO `valoracion_terreno` (`id_valoracion_terreno`, `facto_terreno`, `tipologia_terreno`, `alicuota_terreno`) VALUES
(40554178, 10, 'A', 0.75),
(56963412, 10, 'A', 0.75),
(67158229, 2, 'E2', 0.75),
(72434894, 2, 'E2', 0.75),
(74505712, 10, 'A', 0.75),
(76629948, 3, 'D2', 0.75),
(76829418, 6, 'C', 0.75);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventana`
--

CREATE TABLE `ventana` (
  `id_ventana` bigint(11) NOT NULL,
  `ventana_totales` varchar(200) NOT NULL,
  `cantidad_ventana` int(11) NOT NULL,
  `codigo_ventana` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventana`
--

INSERT INTO `ventana` (`id_ventana`, `ventana_totales`, `cantidad_ventana`, `codigo_ventana`) VALUES
(23448489, '2# Bascula', 1, 2),
(39261115, '3# Batiente', 1, 3),
(90278483, '3# Batiente', 1, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abogado`
--
ALTER TABLE `abogado`
  ADD PRIMARY KEY (`id_abogado`);

--
-- Indices de la tabla `acta_matrinomio`
--
ALTER TABLE `acta_matrinomio`
  ADD PRIMARY KEY (`id_acta_matrimonio`);

--
-- Indices de la tabla `actor2`
--
ALTER TABLE `actor2`
  ADD PRIMARY KEY (`id_actor2`);

--
-- Indices de la tabla `aprobacion_contrato`
--
ALTER TABLE `aprobacion_contrato`
  ADD PRIMARY KEY (`id_aprobacion`),
  ADD KEY `id_contrato` (`id_contrato`);

--
-- Indices de la tabla `auditoria_usuario`
--
ALTER TABLE `auditoria_usuario`
  ADD PRIMARY KEY (`id_auditoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `avaluo`
--
ALTER TABLE `avaluo`
  ADD PRIMARY KEY (`id_valoracion_economica`),
  ADD KEY `id_valoracion_terreno` (`id_valoracion_terreno`),
  ADD KEY `id_valoracion_construccion` (`id_valoracion_construccion`),
  ADD KEY `AvaluoU-I` (`id_inmueble_usuario`);

--
-- Indices de la tabla `banno`
--
ALTER TABLE `banno`
  ADD PRIMARY KEY (`id_banno`);

--
-- Indices de la tabla `cambio_estructura`
--
ALTER TABLE `cambio_estructura`
  ADD PRIMARY KEY (`id_cambio_estructura`),
  ADD KEY `id_inmueble_integracion` (`id_inmueble_integracion`),
  ADD KEY `tipo_escala_lote` (`tipo_escala_lote`);

--
-- Indices de la tabla `carta_residencia`
--
ALTER TABLE `carta_residencia`
  ADD PRIMARY KEY (`id_cr`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `id_solicitud` (`id_solicitud`),
  ADD KEY `id_representante` (`id_representante`),
  ADD KEY `id_motivo` (`id_motivo`);

--
-- Indices de la tabla `clausulas`
--
ALTER TABLE `clausulas`
  ADD PRIMARY KEY (`id_clausulas`);

--
-- Indices de la tabla `cocina`
--
ALTER TABLE `cocina`
  ADD PRIMARY KEY (`id_cocina`);

--
-- Indices de la tabla `codigo_catastral`
--
ALTER TABLE `codigo_catastral`
  ADD PRIMARY KEY (`id_codigo_catastral`);

--
-- Indices de la tabla `codigo_expediente`
--
ALTER TABLE `codigo_expediente`
  ADD PRIMARY KEY (`id_codigo_expendiente`);

--
-- Indices de la tabla `comedor`
--
ALTER TABLE `comedor`
  ADD PRIMARY KEY (`id_comedor`);

--
-- Indices de la tabla `complementario`
--
ALTER TABLE `complementario`
  ADD PRIMARY KEY (`id_complementario`);

--
-- Indices de la tabla `componente_ficha`
--
ALTER TABLE `componente_ficha`
  ADD PRIMARY KEY (`id_componente`),
  ADD KEY `id_usuario` (`id_inmueble_usuario`),
  ADD KEY `id_carta_residencia` (`id_codigo_catastral`);

--
-- Indices de la tabla `constacia_catastral`
--
ALTER TABLE `constacia_catastral`
  ADD PRIMARY KEY (`id_ficha`),
  ADD KEY `id_componentes` (`id_componentes`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `id_contrato_datos` (`id_contrato_datos`);

--
-- Indices de la tabla `contrato_datos`
--
ALTER TABLE `contrato_datos`
  ADD PRIMARY KEY (`id_contrato_datos`),
  ADD KEY `id_actor1` (`id_actor1`),
  ADD KEY `id_actor2` (`id_actor2`),
  ADD KEY `id_inmueble` (`id_inmueble`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_tipo_contrato` (`id_tipo_contrato`),
  ADD KEY `DaContAbog` (`id_abobogado`),
  ADD KEY `DaContGrav` (`id_gravament`);

--
-- Indices de la tabla `datos_ambiente`
--
ALTER TABLE `datos_ambiente`
  ADD PRIMARY KEY (`id_ambientes`),
  ADD KEY `dormitorios` (`dormitorios`),
  ADD KEY `cocina` (`cocina`),
  ADD KEY `sala` (`sala`),
  ADD KEY `banno` (`banno`),
  ADD KEY `comedor` (`comedor`),
  ADD KEY `oficina` (`oficina`),
  ADD KEY `garaje` (`garaje`),
  ADD KEY `servicio` (`servicio`);

--
-- Indices de la tabla `datos_declaracion_ocupante`
--
ALTER TABLE `datos_declaracion_ocupante`
  ADD PRIMARY KEY (`id_declaracion_ocupante`);

--
-- Indices de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  ADD PRIMARY KEY (`id_datos_generales`);

--
-- Indices de la tabla `datos_inspeccion`
--
ALTER TABLE `datos_inspeccion`
  ADD PRIMARY KEY (`id_datos_inspeccion`),
  ADD KEY `id_datos_complementario` (`id_datos_complementario`),
  ADD KEY `id_datos_otros` (`id_datos_otros`),
  ADD KEY `id_datos_estructurales` (`id_datos_estructurales`),
  ADD KEY `id_datos_terreno` (`id_datos_terreno`),
  ADD KEY `id_datos_ambiente` (`id_datos_ambiente`),
  ADD KEY `id_datos_dimensiones` (`id_datos_dimensiones`),
  ADD KEY `id_datos_declaracion_ocupantes` (`id_datos_declaracion_ocupantes`),
  ADD KEY `id_datos_generales` (`id_datos_generales`),
  ADD KEY `id_escala` (`id_escala`);

--
-- Indices de la tabla `datos_ocupantes`
--
ALTER TABLE `datos_ocupantes`
  ADD PRIMARY KEY (`id_datos_ocupantes`);

--
-- Indices de la tabla `datos_rtt`
--
ALTER TABLE `datos_rtt`
  ADD PRIMARY KEY (`id_datos_rtt`),
  ADD KEY `id_usurio_inmueble` (`id_usurio_inmueble`),
  ADD KEY `id_am` (`id_am`),
  ADD KEY `id_cr` (`id_cr`),
  ADD KEY `id_sd` (`id_sd`),
  ADD KEY `id_ds` (`id_ds`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_uh` (`id_uh`);

--
-- Indices de la tabla `datos_terreno`
--
ALTER TABLE `datos_terreno`
  ADD PRIMARY KEY (`id_datos_terreno`),
  ADD KEY `id_topografia` (`id_topografia`,`id_acceso`,`id_forma`,`id_ubicacion`,`id_entorno_fisico`,`id_mejora_terreno`,`id_tenencia_terreno`,`id_regimen_propiedad`),
  ADD KEY `id_servicios_publicos` (`id_servicios_publicos`),
  ADD KEY `TerrTipAcc` (`id_acceso`),
  ADD KEY `TerrTipEntorno` (`id_entorno_fisico`),
  ADD KEY `TerrTipForma` (`id_forma`),
  ADD KEY `TerrTipMejora` (`id_mejora_terreno`),
  ADD KEY `TerrTipRegPri` (`id_regimen_propiedad`),
  ADD KEY `TerrTipUbic` (`id_ubicacion`);

--
-- Indices de la tabla `datos_ubicacion`
--
ALTER TABLE `datos_ubicacion`
  ADD PRIMARY KEY (`id_datos_ubicacion`);

--
-- Indices de la tabla `dato_complementario_construccion`
--
ALTER TABLE `dato_complementario_construccion`
  ADD PRIMARY KEY (`id_dato_complementario_construccion`),
  ADD KEY `id_paredes_complementario` (`id_paredes_complementario`,`id_piso_complementario`,`id_puerta_complementario`,`id_ventana_complementario`,`id_conservacion_complementario`,`id_adicional_complementario`),
  ADD KEY `CCVent` (`id_ventana_complementario`),
  ADD KEY `CCPue` (`id_puerta_complementario`),
  ADD KEY `CCPiso` (`id_piso_complementario`);

--
-- Indices de la tabla `dato_estructural_construccion`
--
ALTER TABLE `dato_estructural_construccion`
  ADD PRIMARY KEY (`id_dato_estructural_construccion`),
  ADD KEY `id_tipo_soporte` (`id_tipo_estructura`),
  ADD KEY `id_tipo_techo` (`id_tipo_techo`),
  ADD KEY `id_cubierta_externa` (`id_tipo_cubierta`);

--
-- Indices de la tabla `dato_general_construccion`
--
ALTER TABLE `dato_general_construccion`
  ADD PRIMARY KEY (`id_dato_general_construccion`),
  ADD KEY `id_tipo_descripcion_uso` (`id_destino`),
  ADD KEY `id_regimen_prioridad` (`id_regimen_prioridad`),
  ADD KEY `id_tipo_construccion_g` (`id_tipo_construccion_general`);

--
-- Indices de la tabla `declaracion_sucesoral`
--
ALTER TABLE `declaracion_sucesoral`
  ADD PRIMARY KEY (`id_ds`);

--
-- Indices de la tabla `denegacion`
--
ALTER TABLE `denegacion`
  ADD PRIMARY KEY (`id_denegacion`),
  ADD KEY `id_funcionario` (`id_funcionario`),
  ADD KEY `id_solicitud` (`id_solicitud`);

--
-- Indices de la tabla `dimensiones`
--
ALTER TABLE `dimensiones`
  ADD PRIMARY KEY (`id_datos_dimension`);

--
-- Indices de la tabla `direccion_inmueble`
--
ALTER TABLE `direccion_inmueble`
  ADD PRIMARY KEY (`id_direccion_inmueble`),
  ADD KEY `id_lugar_inmueble` (`id_lugar_inmueble`,`id_ubicacion_inmueble_entre`,`id_tipo_construccion`),
  ADD KEY `id_ubicacion_inmueble_y` (`id_ubicacion_inmueble_y`),
  ADD KEY `UbicEntre` (`id_ubicacion_inmueble_entre`),
  ADD KEY `TipoConst` (`id_tipo_construccion`);

--
-- Indices de la tabla `dormitorio`
--
ALTER TABLE `dormitorio`
  ADD PRIMARY KEY (`id_dormitorio`);

--
-- Indices de la tabla `empadronamiento`
--
ALTER TABLE `empadronamiento`
  ADD PRIMARY KEY (`id_empadronamiento`),
  ADD KEY `id_componentes` (`id_componentes`),
  ADD KEY `id_datos_ocupante` (`id_datos_ocupante`);

--
-- Indices de la tabla `garage`
--
ALTER TABLE `garage`
  ADD PRIMARY KEY (`id_garage`);

--
-- Indices de la tabla `gestion_social`
--
ALTER TABLE `gestion_social`
  ADD PRIMARY KEY (`id_gestion`),
  ADD KEY `id_concejo` (`id_concejo`,`id_usuario`);

--
-- Indices de la tabla `gravament`
--
ALTER TABLE `gravament`
  ADD PRIMARY KEY (`id_gravament`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD KEY `id_direccion_inmueble` (`id_direccion_inmueble`);

--
-- Indices de la tabla `inmueble_integracion`
--
ALTER TABLE `inmueble_integracion`
  ADD PRIMARY KEY (`id_inmueble_integracion`);

--
-- Indices de la tabla `inmueble_usuario`
--
ALTER TABLE `inmueble_usuario`
  ADD PRIMARY KEY (`id_inmueble_usuario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_inmueble` (`id_inmueble`),
  ADD KEY `id_linderos` (`id_linderos`);

--
-- Indices de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  ADD PRIMARY KEY (`id_inspeccion`),
  ADD KEY `id_usuario` (`id_inmueble_usuario`,`id_funcionario`),
  ADD KEY `InspFun` (`id_funcionario`);

--
-- Indices de la tabla `linderos`
--
ALTER TABLE `linderos`
  ADD PRIMARY KEY (`id_linderos`);

--
-- Indices de la tabla `motivo_cita`
--
ALTER TABLE `motivo_cita`
  ADD PRIMARY KEY (`id_motivo_cita`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`id_oficina`);

--
-- Indices de la tabla `otro_datos`
--
ALTER TABLE `otro_datos`
  ADD PRIMARY KEY (`id_otro_datos`);

--
-- Indices de la tabla `paredes`
--
ALTER TABLE `paredes`
  ADD PRIMARY KEY (`id_paredes`),
  ADD KEY `Instalacion_paredes` (`id_tipo_instalacion`),
  ADD KEY `pintura_paredes` (`id_tipo_pintura`),
  ADD KEY `acabado_paredes` (`id_tipo_acabado`),
  ADD KEY `tipo_paredes` (`id_tipo_pared`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parroquia`);

--
-- Indices de la tabla `piezas_sanitaria`
--
ALTER TABLE `piezas_sanitaria`
  ADD PRIMARY KEY (`id_pieza_sanitaria`);

--
-- Indices de la tabla `pregunta_seguridad`
--
ALTER TABLE `pregunta_seguridad`
  ADD PRIMARY KEY (`id_seguridad`);

--
-- Indices de la tabla `puerta`
--
ALTER TABLE `puerta`
  ADD PRIMARY KEY (`id_puerta`);

--
-- Indices de la tabla `regulacion_tt`
--
ALTER TABLE `regulacion_tt`
  ADD PRIMARY KEY (`id_regulacion_tt`),
  ADD KEY `RTTDATA` (`id_datos_rtt`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`id_representante`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id_sectores`),
  ADD KEY `id_parroquia` (`id_parroquia`);

--
-- Indices de la tabla `sentencia_divorcio`
--
ALTER TABLE `sentencia_divorcio`
  ADD PRIMARY KEY (`id_sentencia_divorcio`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `servicio_publico`
--
ALTER TABLE `servicio_publico`
  ADD PRIMARY KEY (`id_servicio_publico`);

--
-- Indices de la tabla `size_terreno`
--
ALTER TABLE `size_terreno`
  ADD PRIMARY KEY (`id_size_terreno`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_usuario` (`id_inmueble_usuario`);

--
-- Indices de la tabla `solvencia`
--
ALTER TABLE `solvencia`
  ADD PRIMARY KEY (`id_solvencia`),
  ADD KEY `id_dollar` (`id_dollar`,`id_usuario`);

--
-- Indices de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  ADD PRIMARY KEY (`id_sugerencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tasa_moneda`
--
ALTER TABLE `tasa_moneda`
  ADD PRIMARY KEY (`id_tasa_moneda`);

--
-- Indices de la tabla `tipo_acabado`
--
ALTER TABLE `tipo_acabado`
  ADD PRIMARY KEY (`id_tipo_acabado`);

--
-- Indices de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  ADD PRIMARY KEY (`id_tipo_acceso`);

--
-- Indices de la tabla `tipo_carga`
--
ALTER TABLE `tipo_carga`
  ADD PRIMARY KEY (`id_tipo_carga`);

--
-- Indices de la tabla `tipo_clausula`
--
ALTER TABLE `tipo_clausula`
  ADD PRIMARY KEY (`id_tipo_clausula`);

--
-- Indices de la tabla `tipo_complementaria`
--
ALTER TABLE `tipo_complementaria`
  ADD PRIMARY KEY (`id_tipo_complementario`);

--
-- Indices de la tabla `tipo_conservacion`
--
ALTER TABLE `tipo_conservacion`
  ADD PRIMARY KEY (`id_tipo_conservacion`);

--
-- Indices de la tabla `tipo_construccion`
--
ALTER TABLE `tipo_construccion`
  ADD PRIMARY KEY (`id_tipo_construccion`);

--
-- Indices de la tabla `tipo_construccion_generales`
--
ALTER TABLE `tipo_construccion_generales`
  ADD PRIMARY KEY (`id_tipo_construccion_generales`);

--
-- Indices de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  ADD PRIMARY KEY (`id_tipo_contrato`);

--
-- Indices de la tabla `tipo_cubierta`
--
ALTER TABLE `tipo_cubierta`
  ADD PRIMARY KEY (`id_tipo_cubierta`);

--
-- Indices de la tabla `tipo_descripcion_uso`
--
ALTER TABLE `tipo_descripcion_uso`
  ADD PRIMARY KEY (`id_tipo_descripcion_uso`);

--
-- Indices de la tabla `tipo_destino`
--
ALTER TABLE `tipo_destino`
  ADD PRIMARY KEY (`id_tipo_destino`);

--
-- Indices de la tabla `tipo_entorno`
--
ALTER TABLE `tipo_entorno`
  ADD PRIMARY KEY (`id_tipo_entorno`);

--
-- Indices de la tabla `tipo_escala`
--
ALTER TABLE `tipo_escala`
  ADD PRIMARY KEY (`id_tipo_escala`);

--
-- Indices de la tabla `tipo_escala_lote`
--
ALTER TABLE `tipo_escala_lote`
  ADD PRIMARY KEY (`id_escala_lote`);

--
-- Indices de la tabla `tipo_estructura`
--
ALTER TABLE `tipo_estructura`
  ADD PRIMARY KEY (`id_tipo_estructura`);

--
-- Indices de la tabla `tipo_forma`
--
ALTER TABLE `tipo_forma`
  ADD PRIMARY KEY (`id_tipo_forma`);

--
-- Indices de la tabla `tipo_gravament`
--
ALTER TABLE `tipo_gravament`
  ADD PRIMARY KEY (`id_tipo_gravament`);

--
-- Indices de la tabla `tipo_horario`
--
ALTER TABLE `tipo_horario`
  ADD PRIMARY KEY (`id_tipo_horario`);

--
-- Indices de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  ADD PRIMARY KEY (`id_ti`);

--
-- Indices de la tabla `tipo_inmueble`
--
ALTER TABLE `tipo_inmueble`
  ADD PRIMARY KEY (`id_tipo_inmueble`);

--
-- Indices de la tabla `tipo_instalaciones_electricas`
--
ALTER TABLE `tipo_instalaciones_electricas`
  ADD PRIMARY KEY (`id_tipo_instalaciones_electricas`);

--
-- Indices de la tabla `tipo_interno`
--
ALTER TABLE `tipo_interno`
  ADD PRIMARY KEY (`id_tipo_interno`);

--
-- Indices de la tabla `tipo_lugar_inmueble`
--
ALTER TABLE `tipo_lugar_inmueble`
  ADD PRIMARY KEY (`id_tipo_lugar_inmueble`);

--
-- Indices de la tabla `tipo_mejora`
--
ALTER TABLE `tipo_mejora`
  ADD PRIMARY KEY (`id_tipo_mejora`);

--
-- Indices de la tabla `tipo_moneda`
--
ALTER TABLE `tipo_moneda`
  ADD PRIMARY KEY (`id_tipo_moneda`);

--
-- Indices de la tabla `tipo_motivo`
--
ALTER TABLE `tipo_motivo`
  ADD PRIMARY KEY (`id_tipo_motivo`);

--
-- Indices de la tabla `tipo_paredes`
--
ALTER TABLE `tipo_paredes`
  ADD PRIMARY KEY (`id_tipo_paredes`);

--
-- Indices de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  ADD PRIMARY KEY (`id_tp`);

--
-- Indices de la tabla `tipo_piezas`
--
ALTER TABLE `tipo_piezas`
  ADD PRIMARY KEY (`id_tipo_piezas`);

--
-- Indices de la tabla `tipo_pintura`
--
ALTER TABLE `tipo_pintura`
  ADD PRIMARY KEY (`id_tipo_pintura`);

--
-- Indices de la tabla `tipo_piso`
--
ALTER TABLE `tipo_piso`
  ADD PRIMARY KEY (`id_tipo_piso`);

--
-- Indices de la tabla `tipo_porcentaje`
--
ALTER TABLE `tipo_porcentaje`
  ADD PRIMARY KEY (`id_tipo_porcentaje`);

--
-- Indices de la tabla `tipo_puerta`
--
ALTER TABLE `tipo_puerta`
  ADD PRIMARY KEY (`id_tipo_puerta`);

--
-- Indices de la tabla `tipo_regimen`
--
ALTER TABLE `tipo_regimen`
  ADD PRIMARY KEY (`id_tipo_regimen`);

--
-- Indices de la tabla `tipo_servicio_publico`
--
ALTER TABLE `tipo_servicio_publico`
  ADD PRIMARY KEY (`id_tipo_servicio_publico`);

--
-- Indices de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  ADD PRIMARY KEY (`id_tipo_solicitud`);

--
-- Indices de la tabla `tipo_techo`
--
ALTER TABLE `tipo_techo`
  ADD PRIMARY KEY (`id_tipo_techo`);

--
-- Indices de la tabla `tipo_tenencia`
--
ALTER TABLE `tipo_tenencia`
  ADD PRIMARY KEY (`id_tipo_tenencia`);

--
-- Indices de la tabla `tipo_terreno`
--
ALTER TABLE `tipo_terreno`
  ADD PRIMARY KEY (`id_tipo_terreno`),
  ADD KEY `id_tenencia` (`id_tenencia`),
  ADD KEY `id_fecha` (`id_ficha`),
  ADD KEY `id_ficha` (`id_ficha`);

--
-- Indices de la tabla `tipo_tipologia`
--
ALTER TABLE `tipo_tipologia`
  ADD PRIMARY KEY (`id_tipo_tipologia`);

--
-- Indices de la tabla `tipo_topografia`
--
ALTER TABLE `tipo_topografia`
  ADD PRIMARY KEY (`id_tipo_topografia`);

--
-- Indices de la tabla `tipo_ubicacion`
--
ALTER TABLE `tipo_ubicacion`
  ADD PRIMARY KEY (`id_tipo_ubicacion`);

--
-- Indices de la tabla `tipo_ubicacion_entre`
--
ALTER TABLE `tipo_ubicacion_entre`
  ADD PRIMARY KEY (`id_tipo_ubicacion_entre`);

--
-- Indices de la tabla `tipo_ventana`
--
ALTER TABLE `tipo_ventana`
  ADD PRIMARY KEY (`id_tipo_ventana`);

--
-- Indices de la tabla `titulo_supletorio`
--
ALTER TABLE `titulo_supletorio`
  ADD PRIMARY KEY (`id_titulo_supletorio`),
  ADD KEY `id_propietario` (`id_inmueble_usuario`);

--
-- Indices de la tabla `topografia_inmueble`
--
ALTER TABLE `topografia_inmueble`
  ADD PRIMARY KEY (`id_topografia`);

--
-- Indices de la tabla `ubicacion_inmueble_y`
--
ALTER TABLE `ubicacion_inmueble_y`
  ADD PRIMARY KEY (`id_ubicacion_inmueble_y`);

--
-- Indices de la tabla `union_hechos`
--
ALTER TABLE `union_hechos`
  ADD PRIMARY KEY (`id_union_hechos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_conectados`
--
ALTER TABLE `usuarios_conectados`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_data`
--
ALTER TABLE `usuario_data`
  ADD PRIMARY KEY (`id_data_usuario`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_nivel` (`id_nivel`),
  ADD KEY `id_seguridad` (`id_seguridad`);

--
-- Indices de la tabla `valoracion_construccion`
--
ALTER TABLE `valoracion_construccion`
  ADD PRIMARY KEY (`id_valoracion_construccion`);

--
-- Indices de la tabla `valoracion_terreno`
--
ALTER TABLE `valoracion_terreno`
  ADD PRIMARY KEY (`id_valoracion_terreno`);

--
-- Indices de la tabla `ventana`
--
ALTER TABLE `ventana`
  ADD PRIMARY KEY (`id_ventana`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta_matrinomio`
--
ALTER TABLE `acta_matrinomio`
  MODIFY `id_acta_matrimonio` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62496447;

--
-- AUTO_INCREMENT de la tabla `actor2`
--
ALTER TABLE `actor2`
  MODIFY `id_actor2` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32368325;

--
-- AUTO_INCREMENT de la tabla `aprobacion_contrato`
--
ALTER TABLE `aprobacion_contrato`
  MODIFY `id_aprobacion` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80203669;

--
-- AUTO_INCREMENT de la tabla `auditoria_usuario`
--
ALTER TABLE `auditoria_usuario`
  MODIFY `id_auditoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1194;

--
-- AUTO_INCREMENT de la tabla `carta_residencia`
--
ALTER TABLE `carta_residencia`
  MODIFY `id_cr` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62496447;

--
-- AUTO_INCREMENT de la tabla `clausulas`
--
ALTER TABLE `clausulas`
  MODIFY `id_clausulas` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80203669;

--
-- AUTO_INCREMENT de la tabla `complementario`
--
ALTER TABLE `complementario`
  MODIFY `id_complementario` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `constacia_catastral`
--
ALTER TABLE `constacia_catastral`
  MODIFY `id_ficha` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `id_contrato` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32368325;

--
-- AUTO_INCREMENT de la tabla `contrato_datos`
--
ALTER TABLE `contrato_datos`
  MODIFY `id_contrato_datos` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32368325;

--
-- AUTO_INCREMENT de la tabla `datos_generales`
--
ALTER TABLE `datos_generales`
  MODIFY `id_datos_generales` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_ocupantes`
--
ALTER TABLE `datos_ocupantes`
  MODIFY `id_datos_ocupantes` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81572020;

--
-- AUTO_INCREMENT de la tabla `datos_rtt`
--
ALTER TABLE `datos_rtt`
  MODIFY `id_datos_rtt` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62496447;

--
-- AUTO_INCREMENT de la tabla `datos_ubicacion`
--
ALTER TABLE `datos_ubicacion`
  MODIFY `id_datos_ubicacion` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `declaracion_sucesoral`
--
ALTER TABLE `declaracion_sucesoral`
  MODIFY `id_ds` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62496447;

--
-- AUTO_INCREMENT de la tabla `denegacion`
--
ALTER TABLE `denegacion`
  MODIFY `id_denegacion` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empadronamiento`
--
ALTER TABLE `empadronamiento`
  MODIFY `id_empadronamiento` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81572020;

--
-- AUTO_INCREMENT de la tabla `gravament`
--
ALTER TABLE `gravament`
  MODIFY `id_gravament` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inmueble_usuario`
--
ALTER TABLE `inmueble_usuario`
  MODIFY `id_inmueble_usuario` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  MODIFY `id_inspeccion` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id_parroquia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `piezas_sanitaria`
--
ALTER TABLE `piezas_sanitaria`
  MODIFY `id_pieza_sanitaria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puerta`
--
ALTER TABLE `puerta`
  MODIFY `id_puerta` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90278484;

--
-- AUTO_INCREMENT de la tabla `regulacion_tt`
--
ALTER TABLE `regulacion_tt`
  MODIFY `id_regulacion_tt` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62496447;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id_sectores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `sentencia_divorcio`
--
ALTER TABLE `sentencia_divorcio`
  MODIFY `id_sentencia_divorcio` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62496447;

--
-- AUTO_INCREMENT de la tabla `servicio_publico`
--
ALTER TABLE `servicio_publico`
  MODIFY `id_servicio_publico` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90278484;

--
-- AUTO_INCREMENT de la tabla `size_terreno`
--
ALTER TABLE `size_terreno`
  MODIFY `id_size_terreno` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94314096;

--
-- AUTO_INCREMENT de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  MODIFY `id_sugerencia` bigint(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tasa_moneda`
--
ALTER TABLE `tasa_moneda`
  MODIFY `id_tasa_moneda` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tipo_acabado`
--
ALTER TABLE `tipo_acabado`
  MODIFY `id_tipo_acabado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo_acceso`
--
ALTER TABLE `tipo_acceso`
  MODIFY `id_tipo_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_carga`
--
ALTER TABLE `tipo_carga`
  MODIFY `id_tipo_carga` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_clausula`
--
ALTER TABLE `tipo_clausula`
  MODIFY `id_tipo_clausula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_conservacion`
--
ALTER TABLE `tipo_conservacion`
  MODIFY `id_tipo_conservacion` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_construccion`
--
ALTER TABLE `tipo_construccion`
  MODIFY `id_tipo_construccion` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_construccion_generales`
--
ALTER TABLE `tipo_construccion_generales`
  MODIFY `id_tipo_construccion_generales` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tipo_contrato`
--
ALTER TABLE `tipo_contrato`
  MODIFY `id_tipo_contrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_cubierta`
--
ALTER TABLE `tipo_cubierta`
  MODIFY `id_tipo_cubierta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tipo_descripcion_uso`
--
ALTER TABLE `tipo_descripcion_uso`
  MODIFY `id_tipo_descripcion_uso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_destino`
--
ALTER TABLE `tipo_destino`
  MODIFY `id_tipo_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tipo_entorno`
--
ALTER TABLE `tipo_entorno`
  MODIFY `id_tipo_entorno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_escala`
--
ALTER TABLE `tipo_escala`
  MODIFY `id_tipo_escala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_estructura`
--
ALTER TABLE `tipo_estructura`
  MODIFY `id_tipo_estructura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_forma`
--
ALTER TABLE `tipo_forma`
  MODIFY `id_tipo_forma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_gravament`
--
ALTER TABLE `tipo_gravament`
  MODIFY `id_tipo_gravament` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_identificacion`
--
ALTER TABLE `tipo_identificacion`
  MODIFY `id_ti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_inmueble`
--
ALTER TABLE `tipo_inmueble`
  MODIFY `id_tipo_inmueble` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_instalaciones_electricas`
--
ALTER TABLE `tipo_instalaciones_electricas`
  MODIFY `id_tipo_instalaciones_electricas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_interno`
--
ALTER TABLE `tipo_interno`
  MODIFY `id_tipo_interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_lugar_inmueble`
--
ALTER TABLE `tipo_lugar_inmueble`
  MODIFY `id_tipo_lugar_inmueble` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_mejora`
--
ALTER TABLE `tipo_mejora`
  MODIFY `id_tipo_mejora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_moneda`
--
ALTER TABLE `tipo_moneda`
  MODIFY `id_tipo_moneda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_paredes`
--
ALTER TABLE `tipo_paredes`
  MODIFY `id_tipo_paredes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_persona`
--
ALTER TABLE `tipo_persona`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_pintura`
--
ALTER TABLE `tipo_pintura`
  MODIFY `id_tipo_pintura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_piso`
--
ALTER TABLE `tipo_piso`
  MODIFY `id_tipo_piso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_porcentaje`
--
ALTER TABLE `tipo_porcentaje`
  MODIFY `id_tipo_porcentaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_puerta`
--
ALTER TABLE `tipo_puerta`
  MODIFY `id_tipo_puerta` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_regimen`
--
ALTER TABLE `tipo_regimen`
  MODIFY `id_tipo_regimen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio_publico`
--
ALTER TABLE `tipo_servicio_publico`
  MODIFY `id_tipo_servicio_publico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tipo_solicitud`
--
ALTER TABLE `tipo_solicitud`
  MODIFY `id_tipo_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_techo`
--
ALTER TABLE `tipo_techo`
  MODIFY `id_tipo_techo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_tipologia`
--
ALTER TABLE `tipo_tipologia`
  MODIFY `id_tipo_tipologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_topografia`
--
ALTER TABLE `tipo_topografia`
  MODIFY `id_tipo_topografia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_ubicacion`
--
ALTER TABLE `tipo_ubicacion`
  MODIFY `id_tipo_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_ubicacion_entre`
--
ALTER TABLE `tipo_ubicacion_entre`
  MODIFY `id_tipo_ubicacion_entre` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tipo_ventana`
--
ALTER TABLE `tipo_ventana`
  MODIFY `id_tipo_ventana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ubicacion_inmueble_y`
--
ALTER TABLE `ubicacion_inmueble_y`
  MODIFY `id_ubicacion_inmueble_y` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario_data`
--
ALTER TABLE `usuario_data`
  MODIFY `id_data_usuario` bigint(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventana`
--
ALTER TABLE `ventana`
  MODIFY `id_ventana` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90278484;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprobacion_contrato`
--
ALTER TABLE `aprobacion_contrato`
  ADD CONSTRAINT `AproCont` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `avaluo`
--
ALTER TABLE `avaluo`
  ADD CONSTRAINT `AvaluoU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`),
  ADD CONSTRAINT `RAvaluoValConst` FOREIGN KEY (`id_valoracion_construccion`) REFERENCES `valoracion_construccion` (`id_valoracion_construccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `RAvaluoValTerr` FOREIGN KEY (`id_valoracion_terreno`) REFERENCES `valoracion_terreno` (`id_valoracion_terreno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `CitaMotivo` FOREIGN KEY (`id_motivo`) REFERENCES `motivo_cita` (`id_motivo_cita`) ON DELETE CASCADE,
  ADD CONSTRAINT `CitaSoli` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`);

--
-- Filtros para la tabla `componente_ficha`
--
ALTER TABLE `componente_ficha`
  ADD CONSTRAINT `CompCodig` FOREIGN KEY (`id_codigo_catastral`) REFERENCES `codigo_catastral` (`id_codigo_catastral`) ON DELETE CASCADE,
  ADD CONSTRAINT `CompU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`);

--
-- Filtros para la tabla `constacia_catastral`
--
ALTER TABLE `constacia_catastral`
  ADD CONSTRAINT `CCComp` FOREIGN KEY (`id_componentes`) REFERENCES `componente_ficha` (`id_componente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `ContDaCont` FOREIGN KEY (`id_contrato_datos`) REFERENCES `contrato` (`id_contrato`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contrato_datos`
--
ALTER TABLE `contrato_datos`
  ADD CONSTRAINT `DaContAbog` FOREIGN KEY (`id_abobogado`) REFERENCES `abogado` (`id_abogado`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaContAct2` FOREIGN KEY (`id_actor2`) REFERENCES `actor2` (`id_actor2`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaContInm` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`),
  ADD CONSTRAINT `DaContTipCont` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contrato` (`id_tipo_contrato`);

--
-- Filtros para la tabla `datos_inspeccion`
--
ALTER TABLE `datos_inspeccion`
  ADD CONSTRAINT `DaInpsDatEst` FOREIGN KEY (`id_datos_estructurales`) REFERENCES `dato_estructural_construccion` (`id_dato_estructural_construccion`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaInpsDatGen` FOREIGN KEY (`id_datos_generales`) REFERENCES `dato_general_construccion` (`id_dato_general_construccion`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaInpsDatOtro` FOREIGN KEY (`id_datos_otros`) REFERENCES `otro_datos` (`id_otro_datos`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaInpsDatTerr` FOREIGN KEY (`id_datos_terreno`) REFERENCES `datos_terreno` (`id_datos_terreno`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaInpsEscala` FOREIGN KEY (`id_escala`) REFERENCES `tipo_escala` (`id_tipo_escala`);

--
-- Filtros para la tabla `datos_rtt`
--
ALTER TABLE `datos_rtt`
  ADD CONSTRAINT `DaRttAm` FOREIGN KEY (`id_am`) REFERENCES `acta_matrinomio` (`id_acta_matrimonio`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaRttCr` FOREIGN KEY (`id_cr`) REFERENCES `carta_residencia` (`id_cr`),
  ADD CONSTRAINT `DaRttDs` FOREIGN KEY (`id_ds`) REFERENCES `declaracion_sucesoral` (`id_ds`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaRttSd` FOREIGN KEY (`id_sd`) REFERENCES `sentencia_divorcio` (`id_sentencia_divorcio`) ON DELETE CASCADE,
  ADD CONSTRAINT `DaRttU-I` FOREIGN KEY (`id_usurio_inmueble`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`);

--
-- Filtros para la tabla `datos_terreno`
--
ALTER TABLE `datos_terreno`
  ADD CONSTRAINT `TerrServPublic` FOREIGN KEY (`id_servicios_publicos`) REFERENCES `servicio_publico` (`id_servicio_publico`) ON DELETE CASCADE,
  ADD CONSTRAINT `TerrTipAcc` FOREIGN KEY (`id_acceso`) REFERENCES `tipo_acceso` (`id_tipo_acceso`),
  ADD CONSTRAINT `TerrTipEntorno` FOREIGN KEY (`id_entorno_fisico`) REFERENCES `tipo_entorno` (`id_tipo_entorno`),
  ADD CONSTRAINT `TerrTipForma` FOREIGN KEY (`id_forma`) REFERENCES `tipo_forma` (`id_tipo_forma`),
  ADD CONSTRAINT `TerrTipMejora` FOREIGN KEY (`id_mejora_terreno`) REFERENCES `tipo_mejora` (`id_tipo_mejora`),
  ADD CONSTRAINT `TerrTipRegPri` FOREIGN KEY (`id_regimen_propiedad`) REFERENCES `tipo_regimen` (`id_tipo_regimen`),
  ADD CONSTRAINT `TerrTipTopo` FOREIGN KEY (`id_topografia`) REFERENCES `tipo_topografia` (`id_tipo_topografia`),
  ADD CONSTRAINT `TerrTipUbic` FOREIGN KEY (`id_ubicacion`) REFERENCES `tipo_ubicacion` (`id_tipo_ubicacion`);

--
-- Filtros para la tabla `dato_complementario_construccion`
--
ALTER TABLE `dato_complementario_construccion`
  ADD CONSTRAINT `CCPared` FOREIGN KEY (`id_paredes_complementario`) REFERENCES `paredes` (`id_paredes`) ON DELETE CASCADE,
  ADD CONSTRAINT `CCPiso` FOREIGN KEY (`id_piso_complementario`) REFERENCES `tipo_piso` (`id_tipo_piso`),
  ADD CONSTRAINT `CCPue` FOREIGN KEY (`id_puerta_complementario`) REFERENCES `puerta` (`id_puerta`) ON DELETE CASCADE,
  ADD CONSTRAINT `CCVent` FOREIGN KEY (`id_ventana_complementario`) REFERENCES `ventana` (`id_ventana`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dato_estructural_construccion`
--
ALTER TABLE `dato_estructural_construccion`
  ADD CONSTRAINT `ECTipCub` FOREIGN KEY (`id_tipo_cubierta`) REFERENCES `tipo_cubierta` (`id_tipo_cubierta`),
  ADD CONSTRAINT `ECTipEst` FOREIGN KEY (`id_tipo_estructura`) REFERENCES `tipo_estructura` (`id_tipo_estructura`),
  ADD CONSTRAINT `ECTipTech` FOREIGN KEY (`id_tipo_techo`) REFERENCES `tipo_techo` (`id_tipo_techo`);

--
-- Filtros para la tabla `dato_general_construccion`
--
ALTER TABLE `dato_general_construccion`
  ADD CONSTRAINT `GCTipConstGen` FOREIGN KEY (`id_tipo_construccion_general`) REFERENCES `tipo_construccion_generales` (`id_tipo_construccion_generales`),
  ADD CONSTRAINT `GCTipDestino` FOREIGN KEY (`id_destino`) REFERENCES `tipo_destino` (`id_tipo_destino`),
  ADD CONSTRAINT `GCTipRegPri` FOREIGN KEY (`id_regimen_prioridad`) REFERENCES `tipo_regimen` (`id_tipo_regimen`);

--
-- Filtros para la tabla `direccion_inmueble`
--
ALTER TABLE `direccion_inmueble`
  ADD CONSTRAINT `LugarInm` FOREIGN KEY (`id_lugar_inmueble`) REFERENCES `tipo_lugar_inmueble` (`id_tipo_lugar_inmueble`),
  ADD CONSTRAINT `TipoConst` FOREIGN KEY (`id_tipo_construccion`) REFERENCES `tipo_construccion` (`id_tipo_construccion`),
  ADD CONSTRAINT `UbicEntre` FOREIGN KEY (`id_ubicacion_inmueble_entre`) REFERENCES `tipo_ubicacion_entre` (`id_tipo_ubicacion_entre`),
  ADD CONSTRAINT `UbicY` FOREIGN KEY (`id_ubicacion_inmueble_y`) REFERENCES `ubicacion_inmueble_y` (`id_ubicacion_inmueble_y`);

--
-- Filtros para la tabla `empadronamiento`
--
ALTER TABLE `empadronamiento`
  ADD CONSTRAINT `EmpaOcup` FOREIGN KEY (`id_datos_ocupante`) REFERENCES `datos_ocupantes` (`id_datos_ocupantes`) ON DELETE CASCADE;

--
-- Filtros para la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD CONSTRAINT `Inm-Direc` FOREIGN KEY (`id_direccion_inmueble`) REFERENCES `direccion_inmueble` (`id_direccion_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inmueble_usuario`
--
ALTER TABLE `inmueble_usuario`
  ADD CONSTRAINT `UI-Inm` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`) ON DELETE CASCADE,
  ADD CONSTRAINT `UI-Lin` FOREIGN KEY (`id_linderos`) REFERENCES `linderos` (`id_linderos`) ON DELETE CASCADE,
  ADD CONSTRAINT `UI-Usu` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `inspeccion`
--
ALTER TABLE `inspeccion`
  ADD CONSTRAINT `InspU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`);

--
-- Filtros para la tabla `regulacion_tt`
--
ALTER TABLE `regulacion_tt`
  ADD CONSTRAINT `RTTDATA` FOREIGN KEY (`id_datos_rtt`) REFERENCES `datos_rtt` (`id_datos_rtt`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD CONSTRAINT `ParrSect` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id_parroquia`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `SoliU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`);

--
-- Filtros para la tabla `titulo_supletorio`
--
ALTER TABLE `titulo_supletorio`
  ADD CONSTRAINT `TituU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
