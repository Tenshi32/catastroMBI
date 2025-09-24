DROP TABLE IF EXISTS abogado;

CREATE TABLE `abogado` (
  `id_abogado` bigint(12) NOT NULL,
  `nombre_abogado` varchar(50) NOT NULL,
  `apellido_abogado` varchar(50) NOT NULL,
  `inpre_abogado` varchar(8) NOT NULL,
  `cedula_abogado` varchar(12) NOT NULL,
  `telefono_abogado` int(11) NOT NULL,
  `corre_abogado` varchar(100) NOT NULL,
  PRIMARY KEY (`id_abogado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO abogado VALUES("13614338","rwerwqerwer","werweqrqwer","2312","3213123","2147483647","angel@gmail.com"),
("32368324","","","","","0","");



DROP TABLE IF EXISTS acta_matrinomio;

CREATE TABLE `acta_matrinomio` (
  `id_acta_matrimonio` bigint(12) NOT NULL AUTO_INCREMENT,
  `n_am` int(11) NOT NULL,
  `tomo_am` varchar(11) NOT NULL,
  `folio_am` varchar(11) NOT NULL,
  `fecha_am` varchar(11) NOT NULL,
  PRIMARY KEY (`id_acta_matrimonio`)
) ENGINE=InnoDB AUTO_INCREMENT=93318146 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO acta_matrinomio VALUES("62496446","0","","","");



DROP TABLE IF EXISTS actor2;

CREATE TABLE `actor2` (
  `id_actor2` bigint(12) NOT NULL AUTO_INCREMENT,
  `cedula_actor` int(12) NOT NULL,
  `nombre_actor` varchar(20) NOT NULL,
  `apellido_actor` varchar(20) NOT NULL,
  `telefono_actor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_actor2`)
) ENGINE=InnoDB AUTO_INCREMENT=88159074 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO actor2 VALUES("13614338","122133","wqewqewqe","qweqweqwe","04263321074"),
("32368324","0","","","");



DROP TABLE IF EXISTS aprobacion_contrato;

CREATE TABLE `aprobacion_contrato` (
  `id_aprobacion` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_contrato` bigint(12) NOT NULL,
  `fecha_otorgada` varchar(20) NOT NULL,
  `registro_autorizado` varchar(30) NOT NULL,
  `timbre_fiscal` varchar(20) NOT NULL,
  `monto_pago` float NOT NULL,
  `cuotas` float NOT NULL,
  `periodo_r` int(11) NOT NULL,
  `clausulas` varchar(250) NOT NULL,
  `v_inmueble` float NOT NULL,
  PRIMARY KEY (`id_aprobacion`),
  KEY `id_contrato` (`id_contrato`),
  CONSTRAINT `AproCont` FOREIGN KEY (`id_contrato`) REFERENCES `contrato` (`id_contrato`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=96980201 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO aprobacion_contrato VALUES("17072550","32368324","2025-12-23","","","0","12","2","017072550","34567"),
("80203668","13614338","2004-02-12","","","569547","0","0","080203668","0");



DROP TABLE IF EXISTS auditoria_usuario;

CREATE TABLE `auditoria_usuario` (
  `id_auditoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(12) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `accion` varchar(200) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id_auditoria`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=779 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO auditoria_usuario VALUES("674","297722942","07-03-2025","02:55","Solicitud de Evacuación de Titulo Supletorio","Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 31"),
("675","297722942","07-03-2025","02:59","Solicitud de Evacuación de Titulo Supletorio","Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 31"),
("676","297722942","07-03-2025","03:02","Solicitud de Evacuación de Titulo Supletorio","Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 31"),
("677","0","07-03-2025","04:10","Inspeccion Registrada","Inspeccion Registrada del inmueble con el codigo C.E 047664099"),
("678","297722942","06-03-2025","04:31","Avaluo Realizado","Avaluo Realizado al Inmueble con el codigo C.E076629948"),
("679","297722942","07-03-2025","05:25","Solicitud de Empadronamiento","Solicitud de Empadronamiento Registrada con el Codigo C.E 081572019"),
("680","297722942","07-03-2025","05:28","Solicitud de Evacuación de Titulo Supletorio","Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E 32"),
("682","297722942","07-03-2025","05:48","Inspeccion Registrada","Inspeccion Registrada del inmueble con el codigo C.E 096122583"),
("683","297722942","07-03-2025","05:49","Avaluo Realizado","Avaluo Realizado al Inmueble con el codigo C.E074505712"),
("684","297722942","07-03-2025","06:35","Solicitud de Contrato","Solicitud de Contrato Registrada con el codigo C.E 32"),
("685","297722942","07-03-2025","06:39","Sesion Cerrada","Ha Cerrado Sesion"),
("686","297722942","07-03-2025","15:49","Sesion Iniciada","Ha Iniciado Sesion"),
("687","297722942","07-03-2025","17:23","Certificacion de Contrato","Certificacion de Contrato Registrada con el codigo C.E 017072550"),
("688","297722942","07-03-2025","19:26","Solicitud de Contrato","Solicitud de Contrato Registrada con el codigo C.E 31"),
("689","297722942","07-03-2025","19:27","Certificacion de Contrato","Certificacion de Contrato Registrada con el codigo C.E 080203668"),
("690","297722942","08-03-2025","15:46","Solicitado una Rectificacion de Medidas y Linderos","Sea Solicitado una Rectificacion de Medidas y Linderos al inmueble con el codigo C.E 32"),
("691","297722942","08-03-2025","16:02","Solicitado una Rectificacion de Medidas y Linderos","Sea Solicitado una Rectificacion de Medidas y Linderos al inmueble con el codigo C.E 31"),
("692","297722942","08-03-2025","16:03","Solicitud Registrada","Solicitud Cita Registrada con el codigo C.E065491220"),
("693","297722942","05-03-2025","11:13","Solicitud Registrada","Solicitud Cita Registrada con el codigo C.E054262613"),
("694","297722942","08-03-2025","11:16","Solicitud Registrada","Solicitud Cita Registrada con el codigo C.E026251498"),
("695","297722942","08-03-2025","11:42","Solicitud Registrada","Solicitud Cita Registrada con el codigo C.E063820122"),
("696","297722942","08-03-2025","16:59","Solicitado una Regulación de la Tenencia de la Tierra","Sea Solicitado una Regulación de la Tenencia de la Tierra al inmueble con el codigo C.E 31"),
("697","297722942","08-03-2025","18:44","Sesion Cerrada","Ha Cerrado Sesion"),
("698","21272431","08-03-2025","18:44","Sesion Iniciada","Ha Iniciado Sesion"),
("699","21272431","08-03-2025","13:46","Solicitud Registrada","Solicitud Cita Registrada con el codigo C.E081225758"),
("700","21272431","08-03-2025","18:46","Sesion Cerrada","Ha Cerrado Sesion"),
("701","297722942","08-03-2025","18:46","Sesion Iniciada","Ha Iniciado Sesion"),
("702","297722942","08-03-2025","19:16","Sesion Cerrada","Ha Cerrado Sesion"),
("703","297722942","08-03-2025","19:16","Sesion Iniciada","Ha Iniciado Sesion"),
("704","297722942","08-03-2025","19:20","Sesion Cerrada","Ha Cerrado Sesion"),
("705","297722942","08-03-2025","19:34","Sesion Iniciada","Ha Iniciado Sesion"),
("706","297722942","08-03-2025","19:34","Sesion Cerrada","Ha Cerrado Sesion"),
("707","297722942","08-03-2025","19:38","Sesion Iniciada","Ha Iniciado Sesion"),
("708","297722942","08-03-2025","19:38","Sesion Cerrada","Ha Cerrado Sesion"),
("709","297722942","08-03-2025","19:38","Sesion Iniciada","Ha Iniciado Sesion"),
("710","297722942","08-03-2025","19:38","Sesion Cerrada","Ha Cerrado Sesion"),
("711","297722942","08-03-2025","19:40","Sesion Iniciada","Ha Iniciado Sesion"),
("712","297722942","08-03-2025","19:40","Sesion Cerrada","Ha Cerrado Sesion"),
("713","297722942","08-03-2025","19:41","Sesion Iniciada","Ha Iniciado Sesion"),
("714","297722942","08-03-2025","19:41","Sesion Cerrada","Ha Cerrado Sesion"),
("715","297722942","08-03-2025","19:47","Sesion Iniciada","Ha Iniciado Sesion"),
("716","297722942","08-03-2025","19:47","Sesion Cerrada","Ha Cerrado Sesion"),
("717","297722942","08-03-2025","19:47","Sesion Iniciada","Ha Iniciado Sesion"),
("718","297722942","08-03-2025","19:47","Sesion Cerrada","Ha Cerrado Sesion"),
("719","297722942","08-03-2025","19:47","Sesion Iniciada","Ha Iniciado Sesion"),
("720","297722942","08-03-2025","19:47","Sesion Cerrada","Ha Cerrado Sesion"),
("721","297722942","08-03-2025","19:50","Sesion Iniciada","Ha Iniciado Sesion"),
("722","297722942","08-03-2025","19:50","Sesion Cerrada","Ha Cerrado Sesion"),
("723","297722942","08-03-2025","19:50","Sesion Iniciada","Ha Iniciado Sesion"),
("724","297722942","08-03-2025","19:50","Sesion Cerrada","Ha Cerrado Sesion"),
("725","297722942","08-03-2025","19:51","Sesion Iniciada","Ha Iniciado Sesion"),
("726","297722942","08-03-2025","19:51","Sesion Cerrada","Ha Cerrado Sesion"),
("727","297722942","08-03-2025","19:53","Sesion Iniciada","Ha Iniciado Sesion"),
("728","297722942","08-03-2025","19:53","Sesion Iniciada","Ha Iniciado Sesion"),
("729","297722942","08-03-2025","19:54","Sesion Iniciada","Ha Iniciado Sesion"),
("730","297722942","08-03-2025","19:54","Sesion Cerrada","Ha Cerrado Sesion"),
("731","297722942","08-03-2025","20:07","Sesion Iniciada","Ha Iniciado Sesion"),
("732","297722942","08-03-2025","20:07","Sesion Iniciada","Ha Iniciado Sesion"),
("733","297722942","08-03-2025","20:07","Sesion Cerrada","Ha Cerrado Sesion"),
("734","297722942","08-03-2025","20:08","Sesion Iniciada","Ha Iniciado Sesion"),
("735","297722942","08-03-2025","20:08","Sesion Cerrada","Ha Cerrado Sesion"),
("736","297722942","08-03-2025","20:08","Sesion Iniciada","Ha Iniciado Sesion"),
("737","297722942","08-03-2025","20:19","Sesion Cerrada","Ha Cerrado Sesion"),
("738","297722942","08-03-2025","20:20","Sesion Iniciada","Ha Iniciado Sesion"),
("739","297722942","08-03-2025","20:28","Sesion Cerrada","Ha Cerrado Sesion"),
("740","297722942","08-03-2025","20:29","Sesion Iniciada","Ha Iniciado Sesion"),
("741","297722942","08-03-2025","20:30","Sesion Cerrada","Ha Cerrado Sesion"),
("742","297722942","08-03-2025","20:31","Sesion Iniciada","Ha Iniciado Sesion"),
("743","297722942","08-03-2025","20:33","Sesion Cerrada","Ha Cerrado Sesion"),
("744","297722942","08-03-2025","20:37","Sesion Iniciada","Ha Iniciado Sesion"),
("745","297722942","08-03-2025","20:40","Sesion Cerrada","Ha Cerrado Sesion"),
("746","297722942","08-03-2025","20:42","Sesion Iniciada","Ha Iniciado Sesion"),
("747","297722942","08-03-2025","20:47","Sesion Cerrada","Ha Cerrado Sesion"),
("748","297722942","08-03-2025","20:48","Sesion Iniciada","Ha Iniciado Sesion"),
("749","297722942","08-03-2025","20:49","Sesion Cerrada","Ha Cerrado Sesion"),
("750","297722942","08-03-2025","20:53","Sesion Iniciada","Ha Iniciado Sesion"),
("751","297722942","08-03-2025","20:54","Sesion Cerrada","Ha Cerrado Sesion"),
("752","297722942","08-03-2025","20:55","Sesion Iniciada","Ha Iniciado Sesion"),
("753","297722942","08-03-2025","20:56","Sesion Cerrada","Ha Cerrado Sesion"),
("754","297722942","08-03-2025","20:58","Sesion Iniciada","Ha Iniciado Sesion"),
("755","297722942","08-03-2025","22:53","Sesion Cerrada","Ha Cerrado Sesion"),
("756","297722942","09-03-2025","01:06","Sesion Iniciada","Ha Iniciado Sesion"),
("757","297722942","09-03-2025","01:06","Sesion Cerrada","Ha Cerrado Sesion"),
("758","21272431","09-03-2025","01:06","Sesion Iniciada","Ha Iniciado Sesion"),
("759","0","09-03-2025","01:07","Inscripcion del Inmueble","Sea Inscrito el Inmueble del codigo C.E 33"),
("760","21272431","09-03-2025","01:07","Sesion Cerrada","Ha Cerrado Sesion"),
("761","297722942","09-03-2025","01:07","Sesion Iniciada","Ha Iniciado Sesion"),
("762","297722942","09-03-2025","01:36","Inspeccion Registrada","Inspeccion Registrada del inmueble con el codigo C.E 032518192"),
("763","297722942","09-03-2025","01:41","Sesion Cerrada","Ha Cerrado Sesion"),
("764","297722942","09-03-2025","01:49","Sesion Iniciada","Ha Iniciado Sesion"),
("765","297722942","09-03-2025","01:51","Sesion Cerrada","Ha Cerrado Sesion"),
("766","297722942","09-03-2025","01:52","Sesion Iniciada","Ha Iniciado Sesion"),
("767","297722942","09-03-2025","01:52","Sesion Cerrada","Ha Cerrado Sesion"),
("768","297722942","09-03-2025","01:54","Sesion Iniciada","Ha Iniciado Sesion"),
("769","297722942","09-03-2025","01:54","Sesion Cerrada","Ha Cerrado Sesion"),
("770","297722942","09-03-2025","01:55","Sesion Iniciada","Ha Iniciado Sesion"),
("771","297722942","09-03-2025","02:00","Sesion Cerrada","Ha Cerrado Sesion"),
("772","297722942","09-03-2025","02:00","Sesion Iniciada","Ha Iniciado Sesion"),
("773","297722942","09-03-2025","02:05","Sesion Cerrada","Ha Cerrado Sesion"),
("774","297722942","09-03-2025","02:05","Sesion Iniciada","Ha Iniciado Sesion"),
("775","297722942","09-03-2025","02:11","Sesion Cerrada","Ha Cerrado Sesion"),
("776","297722942","09-03-2025","03:10","Sesion Iniciada","Ha Iniciado Sesion"),
("777","297722942","09-03-2025","03:13","Sesion Cerrada","Ha Cerrado Sesion"),
("778","297722942","09-03-2025","03:49","Sesion Iniciada","Ha Iniciado Sesion");



DROP TABLE IF EXISTS avaluo;

CREATE TABLE `avaluo` (
  `id_valoracion_economica` bigint(12) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `id_valoracion_terreno` bigint(12) NOT NULL,
  `id_valoracion_construccion` bigint(12) NOT NULL,
  `depresiacion` varchar(20) NOT NULL,
  `observacion_avaluo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_valoracion_economica`),
  KEY `id_valoracion_terreno` (`id_valoracion_terreno`),
  KEY `id_valoracion_construccion` (`id_valoracion_construccion`),
  KEY `AvaluoU-I` (`id_inmueble_usuario`),
  CONSTRAINT `AvaluoU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`),
  CONSTRAINT `RAvaluoValConst` FOREIGN KEY (`id_valoracion_construccion`) REFERENCES `valoracion_construccion` (`id_valoracion_construccion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `RAvaluoValTerr` FOREIGN KEY (`id_valoracion_terreno`) REFERENCES `valoracion_terreno` (`id_valoracion_terreno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO avaluo VALUES("74505712","32","74505712","74505712","5","sdfasdfdsafasdfsad"),
("76629948","31","76629948","76629948","8","wqerwqerqwrqwerqwerqwer");



DROP TABLE IF EXISTS banno;

CREATE TABLE `banno` (
  `id_banno` bigint(12) NOT NULL,
  `total_banno` int(11) NOT NULL,
  `x_piso_banno` varchar(100) NOT NULL,
  PRIMARY KEY (`id_banno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO banno VALUES("39261115","1","1");



DROP TABLE IF EXISTS carta_residencia;

CREATE TABLE `carta_residencia` (
  `id_cr` bigint(12) NOT NULL AUTO_INCREMENT,
  `nombre_cr` varchar(50) NOT NULL,
  `direccion_cr` varchar(200) NOT NULL,
  `telf_cr` int(12) NOT NULL,
  `fecha_cr` varchar(20) NOT NULL,
  PRIMARY KEY (`id_cr`)
) ENGINE=InnoDB AUTO_INCREMENT=66060334 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO carta_residencia VALUES("62496446","parque aragua","en mi calle ","2147483647","2012-05-12");



DROP TABLE IF EXISTS citas;

CREATE TABLE `citas` (
  `id_citas` bigint(12) NOT NULL,
  `id_solicitud` bigint(12) NOT NULL,
  `id_representante` bigint(12) NOT NULL,
  `id_motivo` bigint(12) NOT NULL,
  `fecha_otorgada` date NOT NULL,
  `razon_negacion` varchar(300) NOT NULL,
  `estado_cita` int(5) NOT NULL,
  PRIMARY KEY (`id_citas`),
  KEY `id_solicitud` (`id_solicitud`),
  KEY `id_representante` (`id_representante`),
  KEY `id_motivo` (`id_motivo`),
  CONSTRAINT `CitaMotivo` FOREIGN KEY (`id_motivo`) REFERENCES `motivo_cita` (`id_motivo_cita`) ON DELETE CASCADE,
  CONSTRAINT `CitaSoli` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO citas VALUES("26251498","26251498","26251498","26251498","2025-03-09","","1"),
("63820122","63820122","63820122","63820122","2025-03-09","","1"),
("81225758","81225758","81225758","81225758","2025-03-09","","1");



DROP TABLE IF EXISTS clausulas;

CREATE TABLE `clausulas` (
  `id_clausulas` bigint(20) NOT NULL AUTO_INCREMENT,
  `cantidad_clausulas` varchar(50) NOT NULL,
  `texto_clausulas` varchar(200) NOT NULL,
  `total_clausulas` varchar(200) NOT NULL,
  PRIMARY KEY (`id_clausulas`)
) ENGINE=InnoDB AUTO_INCREMENT=96980201 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO clausulas VALUES("17072550","2","2# Descripción del inmueble<br> 4# Plazo del contrato","2, 4"),
("80203668","","","");



DROP TABLE IF EXISTS cocina;

CREATE TABLE `cocina` (
  `id_cocina` bigint(12) NOT NULL,
  `total_cocina` int(11) NOT NULL,
  `x_piso_cocina` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cocina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO cocina VALUES("39261115","1","1");



DROP TABLE IF EXISTS codigo_catastral;

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
  `subparcela_catastral` varchar(3) NOT NULL,
  PRIMARY KEY (`id_codigo_catastral`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO codigo_catastral VALUES("27174894","001","1","U01","001","008","005","001","","3","001"),
("36294638","001","1","U01","002","008","005","","12","23","001"),
("78699611","001","1","U01","002","008","005","","12","21","001"),
("87935569","001","1","U01","002","008","005","001","","27","001");



DROP TABLE IF EXISTS codigo_expediente;

CREATE TABLE `codigo_expediente` (
  `id_codigo_expendiente` bigint(12) NOT NULL,
  `unidad_expe` varchar(3) NOT NULL,
  `nivel_expe` int(3) NOT NULL,
  `parcela_expe` varchar(3) NOT NULL,
  `manzana_expe` varchar(3) NOT NULL,
  `sector_expe` varchar(3) NOT NULL,
  `subparcela_expe` varchar(3) NOT NULL,
  PRIMARY KEY (`id_codigo_expendiente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS comedor;

CREATE TABLE `comedor` (
  `id_comedor` bigint(12) NOT NULL,
  `total_comedor` int(11) NOT NULL,
  `x_piso_comedor` varchar(100) NOT NULL,
  PRIMARY KEY (`id_comedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO comedor VALUES("39261115","1","1");



DROP TABLE IF EXISTS complementario;

CREATE TABLE `complementario` (
  `id_complementario` bigint(12) NOT NULL AUTO_INCREMENT,
  `complementario_totales` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_complementario` int(20) NOT NULL,
  `codigo_complementario` int(20) NOT NULL,
  PRIMARY KEY (`id_complementario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS componente_ficha;

CREATE TABLE `componente_ficha` (
  `id_componente` bigint(12) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `id_codigo_catastral` bigint(12) NOT NULL,
  PRIMARY KEY (`id_componente`),
  KEY `id_usuario` (`id_inmueble_usuario`),
  KEY `id_carta_residencia` (`id_codigo_catastral`),
  CONSTRAINT `CompCodig` FOREIGN KEY (`id_codigo_catastral`) REFERENCES `codigo_catastral` (`id_codigo_catastral`) ON DELETE CASCADE,
  CONSTRAINT `CompU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO componente_ficha VALUES("27174894","33","27174894"),
("78699611","32","78699611"),
("87935569","31","87935569");



DROP TABLE IF EXISTS constacia_catastral;

CREATE TABLE `constacia_catastral` (
  `id_ficha` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_componentes` bigint(12) NOT NULL,
  `fecha_inscripcion` varchar(20) NOT NULL,
  `nro_inscripcion` varchar(100) NOT NULL,
  `fecha_actualizacion` varchar(20) NOT NULL,
  `clase_operacion` varchar(100) NOT NULL,
  `valor_inmueble` float NOT NULL,
  `estado_ficha` int(5) NOT NULL,
  `control_archivo` enum('si','no') NOT NULL,
  PRIMARY KEY (`id_ficha`),
  KEY `id_componentes` (`id_componentes`),
  CONSTRAINT `CCComp` FOREIGN KEY (`id_componentes`) REFERENCES `componente_ficha` (`id_componente`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO constacia_catastral VALUES("57","87935569","2025-03-06","087935569","2025-03-06","Herencia","2312320","1","si"),
("58","27174894","2025-03-08","027174894","2025-03-08","Donacion","34567","1","si");



DROP TABLE IF EXISTS contrato;

CREATE TABLE `contrato` (
  `id_contrato` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_contrato_datos` bigint(12) NOT NULL,
  `fecha_entrega` varchar(50) NOT NULL,
  `metodo_pago` varchar(20) NOT NULL,
  `monto_pagar` varchar(12) NOT NULL,
  `codig_gmv` varchar(20) NOT NULL,
  PRIMARY KEY (`id_contrato`),
  KEY `id_contrato_datos` (`id_contrato_datos`),
  CONSTRAINT `ContDaCont` FOREIGN KEY (`id_contrato_datos`) REFERENCES `contrato` (`id_contrato`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88159074 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO contrato VALUES("13614338","13614338","12/02/2025","","2312",""),
("32368324","32368324","","","","");



DROP TABLE IF EXISTS contrato_datos;

CREATE TABLE `contrato_datos` (
  `id_contrato_datos` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_actor1` bigint(12) NOT NULL,
  `id_actor2` bigint(12) NOT NULL,
  `id_inmueble` bigint(12) NOT NULL,
  `id_funcionario` int(12) NOT NULL,
  `id_tipo_contrato` int(11) NOT NULL,
  `id_abobogado` bigint(12) NOT NULL,
  `id_gravament` bigint(12) NOT NULL,
  PRIMARY KEY (`id_contrato_datos`),
  KEY `id_actor1` (`id_actor1`),
  KEY `id_actor2` (`id_actor2`),
  KEY `id_inmueble` (`id_inmueble`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_tipo_contrato` (`id_tipo_contrato`),
  KEY `DaContAbog` (`id_abobogado`),
  KEY `DaContGrav` (`id_gravament`),
  CONSTRAINT `DaContAbog` FOREIGN KEY (`id_abobogado`) REFERENCES `abogado` (`id_abogado`) ON DELETE CASCADE,
  CONSTRAINT `DaContAct2` FOREIGN KEY (`id_actor2`) REFERENCES `actor2` (`id_actor2`) ON DELETE CASCADE,
  CONSTRAINT `DaContInm` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`),
  CONSTRAINT `DaContTipCont` FOREIGN KEY (`id_tipo_contrato`) REFERENCES `tipo_contrato` (`id_tipo_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=88159074 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO contrato_datos VALUES("13614338","297722942","13614338","31","0","1","13614338","0"),
("32368324","297722942","32368324","32","0","2","32368324","0");



DROP TABLE IF EXISTS dato_complementario_construccion;

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
  `observacion_complementario` varchar(200) NOT NULL,
  PRIMARY KEY (`id_dato_complementario_construccion`),
  KEY `id_paredes_complementario` (`id_paredes_complementario`,`id_piso_complementario`,`id_puerta_complementario`,`id_ventana_complementario`,`id_conservacion_complementario`,`id_adicional_complementario`),
  KEY `CCVent` (`id_ventana_complementario`),
  KEY `CCPue` (`id_puerta_complementario`),
  KEY `CCPiso` (`id_piso_complementario`),
  CONSTRAINT `CCPared` FOREIGN KEY (`id_paredes_complementario`) REFERENCES `paredes` (`id_paredes`) ON DELETE CASCADE,
  CONSTRAINT `CCPiso` FOREIGN KEY (`id_piso_complementario`) REFERENCES `tipo_piso` (`id_tipo_piso`),
  CONSTRAINT `CCPue` FOREIGN KEY (`id_puerta_complementario`) REFERENCES `puerta` (`id_puerta`) ON DELETE CASCADE,
  CONSTRAINT `CCVent` FOREIGN KEY (`id_ventana_complementario`) REFERENCES `ventana` (`id_ventana`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO dato_complementario_construccion VALUES("23448489","23448489","1","1","23448489","23448489","1","1","no","no","fasdfasdfasdf"),
("39261115","39261115","1","1","39261115","39261115","1","1","no","no","weqerwqerqwerqwerqwerqwer"),
("90278483","90278483","2","1","90278483","90278483","1","1","no","no","ewqeweqwewqe");



DROP TABLE IF EXISTS dato_estructural_construccion;

CREATE TABLE `dato_estructural_construccion` (
  `id_dato_estructural_construccion` bigint(12) NOT NULL,
  `id_tipo_cubierta` int(11) NOT NULL,
  `id_tipo_techo` int(11) NOT NULL,
  `id_tipo_estructura` int(11) NOT NULL,
  PRIMARY KEY (`id_dato_estructural_construccion`),
  KEY `id_tipo_soporte` (`id_tipo_estructura`),
  KEY `id_tipo_techo` (`id_tipo_techo`),
  KEY `id_cubierta_externa` (`id_tipo_cubierta`),
  CONSTRAINT `ECTipCub` FOREIGN KEY (`id_tipo_cubierta`) REFERENCES `tipo_cubierta` (`id_tipo_cubierta`),
  CONSTRAINT `ECTipEst` FOREIGN KEY (`id_tipo_estructura`) REFERENCES `tipo_estructura` (`id_tipo_estructura`),
  CONSTRAINT `ECTipTech` FOREIGN KEY (`id_tipo_techo`) REFERENCES `tipo_techo` (`id_tipo_techo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO dato_estructural_construccion VALUES("23448489","1","1","1"),
("39261115","3","2","2"),
("90278483","2","2","3");



DROP TABLE IF EXISTS dato_general_construccion;

CREATE TABLE `dato_general_construccion` (
  `id_dato_general_construccion` bigint(12) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `id_regimen_prioridad` int(11) NOT NULL,
  `id_tipo_construccion_general` int(11) NOT NULL,
  PRIMARY KEY (`id_dato_general_construccion`),
  KEY `id_tipo_descripcion_uso` (`id_destino`),
  KEY `id_regimen_prioridad` (`id_regimen_prioridad`),
  KEY `id_tipo_construccion_g` (`id_tipo_construccion_general`),
  CONSTRAINT `GCTipConstGen` FOREIGN KEY (`id_tipo_construccion_general`) REFERENCES `tipo_construccion_generales` (`id_tipo_construccion_generales`),
  CONSTRAINT `GCTipDestino` FOREIGN KEY (`id_destino`) REFERENCES `tipo_destino` (`id_tipo_destino`),
  CONSTRAINT `GCTipRegPri` FOREIGN KEY (`id_regimen_prioridad`) REFERENCES `tipo_regimen` (`id_tipo_regimen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO dato_general_construccion VALUES("23448489","1","1","3"),
("39261115","2","2","7"),
("90278483","3","3","4");



DROP TABLE IF EXISTS datos_ambiente;

CREATE TABLE `datos_ambiente` (
  `id_ambientes` bigint(12) NOT NULL,
  `dormitorios` bigint(12) NOT NULL,
  `cocina` bigint(12) NOT NULL,
  `sala` bigint(12) NOT NULL,
  `banno` bigint(12) NOT NULL,
  `comedor` bigint(12) NOT NULL,
  `oficina` bigint(12) NOT NULL,
  `garaje` bigint(12) NOT NULL,
  `servicio` bigint(12) NOT NULL,
  PRIMARY KEY (`id_ambientes`),
  KEY `dormitorios` (`dormitorios`),
  KEY `cocina` (`cocina`),
  KEY `sala` (`sala`),
  KEY `banno` (`banno`),
  KEY `comedor` (`comedor`),
  KEY `oficina` (`oficina`),
  KEY `garaje` (`garaje`),
  KEY `servicio` (`servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS datos_declaracion_ocupante;

CREATE TABLE `datos_declaracion_ocupante` (
  `id_declaracion_ocupante` bigint(12) NOT NULL,
  `habitacion_propietario` varchar(20) NOT NULL,
  `habitacion_inquilino` varchar(20) NOT NULL,
  `renta_mensual` float NOT NULL,
  `fecha_contrato` varchar(20) NOT NULL,
  `n_habitaciones` int(11) NOT NULL,
  `ingreso_familiar` float NOT NULL,
  PRIMARY KEY (`id_declaracion_ocupante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS datos_generales;

CREATE TABLE `datos_generales` (
  `id_datos_generales` bigint(11) NOT NULL AUTO_INCREMENT,
  `control_archivo` enum('si','no') NOT NULL,
  `n_ficha` bigint(11) NOT NULL,
  `fecha_inscripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_datos_generales`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS datos_inspeccion;

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
  `id_datos_generales` bigint(12) NOT NULL,
  PRIMARY KEY (`id_datos_inspeccion`),
  KEY `id_datos_complementario` (`id_datos_complementario`),
  KEY `id_datos_otros` (`id_datos_otros`),
  KEY `id_datos_estructurales` (`id_datos_estructurales`),
  KEY `id_datos_terreno` (`id_datos_terreno`),
  KEY `id_datos_ambiente` (`id_datos_ambiente`),
  KEY `id_datos_dimensiones` (`id_datos_dimensiones`),
  KEY `id_datos_declaracion_ocupantes` (`id_datos_declaracion_ocupantes`),
  KEY `id_datos_generales` (`id_datos_generales`),
  KEY `id_escala` (`id_escala`),
  CONSTRAINT `DaInpsDatEst` FOREIGN KEY (`id_datos_estructurales`) REFERENCES `dato_estructural_construccion` (`id_dato_estructural_construccion`) ON DELETE CASCADE,
  CONSTRAINT `DaInpsDatGen` FOREIGN KEY (`id_datos_generales`) REFERENCES `dato_general_construccion` (`id_dato_general_construccion`) ON DELETE CASCADE,
  CONSTRAINT `DaInpsDatOtro` FOREIGN KEY (`id_datos_otros`) REFERENCES `otro_datos` (`id_otro_datos`) ON DELETE CASCADE,
  CONSTRAINT `DaInpsDatTerr` FOREIGN KEY (`id_datos_terreno`) REFERENCES `datos_terreno` (`id_datos_terreno`) ON DELETE CASCADE,
  CONSTRAINT `DaInpsEscala` FOREIGN KEY (`id_escala`) REFERENCES `tipo_escala` (`id_tipo_escala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO datos_inspeccion VALUES("23448489","9","23448489","23448489","23448489","23448489","23448489","23448489","23448489","23448489"),
("39261115","6","39261115","39261115","39261115","39261115","39261115","39261115","39261115","39261115"),
("90278483","11","90278483","90278483","90278483","90278483","90278483","90278483","90278483","90278483");



DROP TABLE IF EXISTS datos_ocupantes;

CREATE TABLE `datos_ocupantes` (
  `id_datos_ocupantes` bigint(12) NOT NULL AUTO_INCREMENT,
  `ci_rif` bigint(12) NOT NULL,
  `nombre_ocupante` varchar(20) NOT NULL,
  `apellido_ocupante` varchar(20) NOT NULL,
  `telefono_ocupante` varchar(11) NOT NULL,
  PRIMARY KEY (`id_datos_ocupantes`)
) ENGINE=InnoDB AUTO_INCREMENT=95598928 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO datos_ocupantes VALUES("81572019","4124243","werwqer","werqwerw","04263321074");



DROP TABLE IF EXISTS datos_rtt;

CREATE TABLE `datos_rtt` (
  `id_datos_rtt` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_usurio_inmueble` bigint(12) NOT NULL,
  `id_am` bigint(12) NOT NULL,
  `id_cr` bigint(12) NOT NULL,
  `id_sd` bigint(12) NOT NULL,
  `id_ds` bigint(12) NOT NULL,
  `id_funcionario` bigint(12) NOT NULL,
  PRIMARY KEY (`id_datos_rtt`),
  KEY `id_usurio_inmueble` (`id_usurio_inmueble`),
  KEY `id_am` (`id_am`),
  KEY `id_cr` (`id_cr`),
  KEY `id_sd` (`id_sd`),
  KEY `id_ds` (`id_ds`),
  KEY `id_funcionario` (`id_funcionario`),
  CONSTRAINT `DaRttAm` FOREIGN KEY (`id_am`) REFERENCES `acta_matrinomio` (`id_acta_matrimonio`) ON DELETE CASCADE,
  CONSTRAINT `DaRttCr` FOREIGN KEY (`id_cr`) REFERENCES `carta_residencia` (`id_cr`),
  CONSTRAINT `DaRttDs` FOREIGN KEY (`id_ds`) REFERENCES `declaracion_sucesoral` (`id_ds`) ON DELETE CASCADE,
  CONSTRAINT `DaRttSd` FOREIGN KEY (`id_sd`) REFERENCES `sentencia_divorcio` (`id_sentencia_divorcio`) ON DELETE CASCADE,
  CONSTRAINT `DaRttU-I` FOREIGN KEY (`id_usurio_inmueble`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=93318146 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO datos_rtt VALUES("62496446","31","62496446","62496446","62496446","62496446","62496446");



DROP TABLE IF EXISTS datos_terreno;

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
  `id_servicios_publicos` bigint(11) NOT NULL,
  PRIMARY KEY (`id_datos_terreno`),
  KEY `id_topografia` (`id_topografia`,`id_acceso`,`id_forma`,`id_ubicacion`,`id_entorno_fisico`,`id_mejora_terreno`,`id_tenencia_terreno`,`id_regimen_propiedad`),
  KEY `id_servicios_publicos` (`id_servicios_publicos`),
  KEY `TerrTipAcc` (`id_acceso`),
  KEY `TerrTipEntorno` (`id_entorno_fisico`),
  KEY `TerrTipForma` (`id_forma`),
  KEY `TerrTipMejora` (`id_mejora_terreno`),
  KEY `TerrTipRegPri` (`id_regimen_propiedad`),
  KEY `TerrTipUbic` (`id_ubicacion`),
  CONSTRAINT `TerrServPublic` FOREIGN KEY (`id_servicios_publicos`) REFERENCES `servicio_publico` (`id_servicio_publico`) ON DELETE CASCADE,
  CONSTRAINT `TerrTipAcc` FOREIGN KEY (`id_acceso`) REFERENCES `tipo_acceso` (`id_tipo_acceso`),
  CONSTRAINT `TerrTipEntorno` FOREIGN KEY (`id_entorno_fisico`) REFERENCES `tipo_entorno` (`id_tipo_entorno`),
  CONSTRAINT `TerrTipForma` FOREIGN KEY (`id_forma`) REFERENCES `tipo_forma` (`id_tipo_forma`),
  CONSTRAINT `TerrTipMejora` FOREIGN KEY (`id_mejora_terreno`) REFERENCES `tipo_mejora` (`id_tipo_mejora`),
  CONSTRAINT `TerrTipRegPri` FOREIGN KEY (`id_regimen_propiedad`) REFERENCES `tipo_regimen` (`id_tipo_regimen`),
  CONSTRAINT `TerrTipTopo` FOREIGN KEY (`id_topografia`) REFERENCES `tipo_topografia` (`id_tipo_topografia`),
  CONSTRAINT `TerrTipUbic` FOREIGN KEY (`id_ubicacion`) REFERENCES `tipo_ubicacion` (`id_tipo_ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO datos_terreno VALUES("23448489","7","1","1","1","1","1","1","1","23448489"),
("39261115","3","2","3","2","1","2","1","1","39261115"),
("90278483","1","1","1","1","1","1","1","1","90278483");



DROP TABLE IF EXISTS datos_ubicacion;

CREATE TABLE `datos_ubicacion` (
  `id_datos_ubicacion` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_codigo_ambito` bigint(11) NOT NULL,
  `id_linderos_actuales` bigint(11) NOT NULL,
  `coordenadas_utm` varchar(200) NOT NULL,
  `id_levantamiento_p` bigint(11) NOT NULL,
  PRIMARY KEY (`id_datos_ubicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS declaracion_sucesoral;

CREATE TABLE `declaracion_sucesoral` (
  `id_ds` bigint(12) NOT NULL AUTO_INCREMENT,
  `rif_sucesoral` varchar(12) NOT NULL,
  `descripcion_ds` varchar(400) NOT NULL,
  `fecha_ds` varchar(20) NOT NULL,
  PRIMARY KEY (`id_ds`)
) ENGINE=InnoDB AUTO_INCREMENT=66060334 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO declaracion_sucesoral VALUES("62496446","","","");



DROP TABLE IF EXISTS denegacion;

CREATE TABLE `denegacion` (
  `id_denegacion` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_funcionario` bigint(11) NOT NULL,
  `id_solicitud` bigint(11) NOT NULL,
  `motivo_denegar` varchar(50) NOT NULL,
  `descripcion_denegar` varchar(200) NOT NULL,
  PRIMARY KEY (`id_denegacion`),
  KEY `id_funcionario` (`id_funcionario`),
  KEY `id_solicitud` (`id_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS dimensiones;

CREATE TABLE `dimensiones` (
  `id_datos_dimension` bigint(12) NOT NULL,
  `frente` varchar(100) NOT NULL,
  `profundidad` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `tipo_frente` varchar(100) NOT NULL,
  `tipo_profundidad` varchar(100) NOT NULL,
  PRIMARY KEY (`id_datos_dimension`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO dimensiones VALUES("1","Frente","","","",""),
("2","Pofundidad","","","",""),
("3","Area","","","",""),
("4","Fren. tipo","","","","");



DROP TABLE IF EXISTS direccion_inmueble;

CREATE TABLE `direccion_inmueble` (
  `id_direccion_inmueble` bigint(12) NOT NULL,
  `id_lugar_inmueble` int(11) NOT NULL,
  `id_ubicacion_inmueble_entre` int(11) NOT NULL,
  `id_ubicacion_inmueble_y` int(11) NOT NULL,
  `id_tipo_construccion` int(11) NOT NULL,
  `lugar_inmueble` varchar(20) NOT NULL,
  `ubicacion_inmueble_entre` varchar(20) NOT NULL,
  `ubicacion_inmueble_y` varchar(20) NOT NULL,
  PRIMARY KEY (`id_direccion_inmueble`),
  KEY `id_lugar_inmueble` (`id_lugar_inmueble`,`id_ubicacion_inmueble_entre`,`id_tipo_construccion`),
  KEY `id_ubicacion_inmueble_y` (`id_ubicacion_inmueble_y`),
  KEY `UbicEntre` (`id_ubicacion_inmueble_entre`),
  KEY `TipoConst` (`id_tipo_construccion`),
  CONSTRAINT `LugarInm` FOREIGN KEY (`id_lugar_inmueble`) REFERENCES `tipo_lugar_inmueble` (`id_tipo_lugar_inmueble`),
  CONSTRAINT `TipoConst` FOREIGN KEY (`id_tipo_construccion`) REFERENCES `tipo_construccion` (`id_tipo_construccion`),
  CONSTRAINT `UbicEntre` FOREIGN KEY (`id_ubicacion_inmueble_entre`) REFERENCES `tipo_ubicacion_entre` (`id_tipo_ubicacion_entre`),
  CONSTRAINT `UbicY` FOREIGN KEY (`id_ubicacion_inmueble_y`) REFERENCES `ubicacion_inmueble_y` (`id_ubicacion_inmueble_y`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO direccion_inmueble VALUES("23448489","1","1","1","4","Los Cocos","Universidad","Caracas"),
("39261115","4","1","1","4","Sector 4","Caña de azucar","Universidad"),
("90278483","1","1","1","4","Caña de azucar","Caña de azucar","Universidad");



DROP TABLE IF EXISTS dormitorio;

CREATE TABLE `dormitorio` (
  `id_dormitorio` bigint(12) NOT NULL,
  `total_dormitorio` int(11) NOT NULL,
  `x_piso_dormitorio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_dormitorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO dormitorio VALUES("32518192","2","2");



DROP TABLE IF EXISTS empadronamiento;

CREATE TABLE `empadronamiento` (
  `id_empadronamiento` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_componentes` bigint(12) NOT NULL,
  `id_datos_ocupante` bigint(12) NOT NULL,
  `estado_empadronamiento` int(11) NOT NULL,
  PRIMARY KEY (`id_empadronamiento`),
  KEY `id_componentes` (`id_componentes`),
  KEY `id_datos_ocupante` (`id_datos_ocupante`),
  CONSTRAINT `EmpaOcup` FOREIGN KEY (`id_datos_ocupante`) REFERENCES `datos_ocupantes` (`id_datos_ocupantes`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95598928 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO empadronamiento VALUES("81572019","81572019","81572019","1");



DROP TABLE IF EXISTS garage;

CREATE TABLE `garage` (
  `id_garage` bigint(12) NOT NULL,
  `total_garage` int(11) NOT NULL,
  `x_piso_garage` varchar(100) NOT NULL,
  PRIMARY KEY (`id_garage`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO garage VALUES("39261115","1","1");



DROP TABLE IF EXISTS gestion_social;

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
  `estado_gestion` int(5) NOT NULL,
  PRIMARY KEY (`id_gestion`),
  KEY `id_concejo` (`id_concejo`,`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS gravament;

CREATE TABLE `gravament` (
  `id_gravament` bigint(12) NOT NULL AUTO_INCREMENT,
  `cantidad_gravament` varchar(50) NOT NULL,
  `total_gravament` varchar(100) NOT NULL,
  `texto_gravament` varchar(200) NOT NULL,
  PRIMARY KEY (`id_gravament`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS inmueble;

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
  `estado_inmueble` int(11) NOT NULL,
  PRIMARY KEY (`id_inmueble`),
  KEY `id_direccion_inmueble` (`id_direccion_inmueble`),
  CONSTRAINT `Inm-Direc` FOREIGN KEY (`id_direccion_inmueble`) REFERENCES `direccion_inmueble` (`id_direccion_inmueble`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO inmueble VALUES("23448489","23448489","001","Los Cocos","Los Tesoros","2354","04263321074","2341.34","21342100","dfasdfdfasdfasdf","2","efasfdasfasdfasfsadfadsfasdf","4"),
("39261115","39261115","002","Caña de azucar","Los Angeles","2323","04263321074","770000","32000","Avenida 6 Casa 20A","2","En buen Estado","4"),
("90278483","90278483","002","Caña de azucar","Los Alpes","3425","04263321074","23145","31232","Sector 12 calle 6","1","todo de chill","3");



DROP TABLE IF EXISTS inmueble_usuario;

CREATE TABLE `inmueble_usuario` (
  `id_inmueble_usuario` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_usuario` bigint(12) NOT NULL,
  `id_inmueble` bigint(12) NOT NULL,
  `id_linderos` bigint(12) NOT NULL,
  PRIMARY KEY (`id_inmueble_usuario`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_inmueble` (`id_inmueble`),
  KEY `id_linderos` (`id_linderos`),
  CONSTRAINT `UI-Inm` FOREIGN KEY (`id_inmueble`) REFERENCES `inmueble` (`id_inmueble`) ON DELETE CASCADE,
  CONSTRAINT `UI-Lin` FOREIGN KEY (`id_linderos`) REFERENCES `linderos` (`id_linderos`) ON DELETE CASCADE,
  CONSTRAINT `UI-Usu` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO inmueble_usuario VALUES("31","297722942","39261115","39261115"),
("32","297722942","23448489","23448489"),
("33","21272431","90278483","90278483");



DROP TABLE IF EXISTS inspeccion;

CREATE TABLE `inspeccion` (
  `id_inspeccion` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `id_funcionario` bigint(12) NOT NULL,
  `clase_inmueble` enum('Residencial','Comercial','Mixto') NOT NULL,
  `superficie_c` float NOT NULL,
  `superficie_t` float NOT NULL,
  `area_cr` float NOT NULL,
  `area_tr` float NOT NULL,
  `area_cc` float NOT NULL,
  `area_tc` float NOT NULL,
  PRIMARY KEY (`id_inspeccion`),
  KEY `id_usuario` (`id_inmueble_usuario`,`id_funcionario`),
  KEY `InspFun` (`id_funcionario`),
  CONSTRAINT `InspU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO inspeccion VALUES("12","31","297722942","Comercial","231.23","12323.3","0","0","0","0"),
("13","32","297722942","Comercial","213123","12323.3","0","0","0","0"),
("14","33","297722942","Comercial","3212","3212","0","0","0","0");



DROP TABLE IF EXISTS linderos;

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
  `entrada_lindero` enum('Norte','Sur','Este','Oeste') NOT NULL,
  PRIMARY KEY (`id_linderos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO linderos VALUES("23448489","dfasdfasdf","123.23","ewrqwer","123.12","wqeewrq","213.12","sdfasdfasdf","231.23","Este"),
("39261115","wqeqwe","213.12","wqeqwe","123.12","qweqwe","123.12","eqwewq","123.12","Sur"),
("90278483","werqwr","423.44","ewrqwer","343.4","wqerwqer","421.34","wqerqwer","234","Sur");



DROP TABLE IF EXISTS motivo_cita;

CREATE TABLE `motivo_cita` (
  `id_motivo_cita` bigint(12) NOT NULL,
  `cita_totales` varchar(200) NOT NULL,
  `cantidad_cita` varchar(1000) NOT NULL,
  `codigo_cita` varchar(100) NOT NULL,
  PRIMARY KEY (`id_motivo_cita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO motivo_cita VALUES("26251498","1","2# Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.","2"),
("63820122","3","2# Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.<br>4# Certificado de Empadronamiento.<br>5# Tasa Por Cambio de Propiedad (Constancia de Inscripción y Plano Mensura).","2, 4, 5"),
("81225758","2","2# Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.<br>3# Plano Mensura.","2, 3");



DROP TABLE IF EXISTS nivel;

CREATE TABLE `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `niveles` varchar(50) NOT NULL,
  `descripcion_nivel` varchar(100) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO nivel VALUES("1","SuperAdmin","Nivel especial de Dev´s "),
("2","Admin","Nivel Especial del Director de la Direcciòn de Catastro"),
("3","Secretaria","Nivel para la Secretaria del Director"),
("4","Fiscal-Inspector","Nivel para el Fiscal que realiza inspecciones");



DROP TABLE IF EXISTS oficina;

CREATE TABLE `oficina` (
  `id_oficina` int(12) NOT NULL,
  `total_oficina` int(11) NOT NULL,
  `x_piso_oficina` varchar(100) NOT NULL,
  PRIMARY KEY (`id_oficina`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO oficina VALUES("39261115","2","2");



DROP TABLE IF EXISTS otro_datos;

CREATE TABLE `otro_datos` (
  `id_otro_datos` bigint(11) NOT NULL,
  `year_construccion` varchar(20) NOT NULL,
  `year_refaccion` varchar(20) NOT NULL,
  `edad_efectiva` varchar(100) NOT NULL,
  `n_edificaciones` int(10) NOT NULL,
  `porcentage_refaccion` varchar(100) NOT NULL,
  PRIMARY KEY (`id_otro_datos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO otro_datos VALUES("23448489","12","12","12","2","3"),
("39261115","1","2","21","1","4"),
("90278483","12","12","","2","");



DROP TABLE IF EXISTS paredes;

CREATE TABLE `paredes` (
  `id_paredes` bigint(12) NOT NULL,
  `id_tipo_pared` int(11) NOT NULL,
  `id_tipo_acabado` int(11) NOT NULL,
  `id_tipo_pintura` int(11) NOT NULL,
  `id_tipo_instalacion` int(11) NOT NULL,
  PRIMARY KEY (`id_paredes`),
  KEY `Instalacion_paredes` (`id_tipo_instalacion`),
  KEY `pintura_paredes` (`id_tipo_pintura`),
  KEY `acabado_paredes` (`id_tipo_acabado`),
  KEY `tipo_paredes` (`id_tipo_pared`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO paredes VALUES("23448489","3","1","1","1"),
("39261115","5","3","2","2"),
("90278483","2","2","2","2");



DROP TABLE IF EXISTS parroquia;

CREATE TABLE `parroquia` (
  `id_parroquia` int(11) NOT NULL AUTO_INCREMENT,
  `parroquia` varchar(100) NOT NULL,
  PRIMARY KEY (`id_parroquia`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO parroquia VALUES("1","El Limon"),
("2","Caña de Azucar");



DROP TABLE IF EXISTS piezas_sanitaria;

CREATE TABLE `piezas_sanitaria` (
  `id_pieza_sanitaria` int(11) NOT NULL AUTO_INCREMENT,
  `pieza_sanitaria_totales` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `cantidad_pieza_sanitaria` int(20) NOT NULL,
  `codigo_pieza_sanitaria` int(20) NOT NULL,
  PRIMARY KEY (`id_pieza_sanitaria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS pregunta_seguridad;

CREATE TABLE `pregunta_seguridad` (
  `id_seguridad` bigint(12) NOT NULL,
  `pregunta_1` varchar(11) NOT NULL,
  `repuesta_1` varchar(100) NOT NULL,
  `pregunta_2` varchar(11) NOT NULL,
  `repuesta_2` varchar(100) NOT NULL,
  `pregunta_3` varchar(11) NOT NULL,
  `repuesta_3` varchar(100) NOT NULL,
  PRIMARY KEY (`id_seguridad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO pregunta_seguridad VALUES("12523580","1","123123","2","123123","3","123123"),
("21272431","2","perro","3","caracas","6","azul"),
("29772294","4","1","6","2","2","3"),
("297722942","1","1","4","2","6","3");



DROP TABLE IF EXISTS puerta;

CREATE TABLE `puerta` (
  `id_puerta` bigint(12) NOT NULL AUTO_INCREMENT,
  `puerta_totales` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_puerta` int(11) NOT NULL,
  `codigo_puerta` int(11) NOT NULL,
  PRIMARY KEY (`id_puerta`)
) ENGINE=InnoDB AUTO_INCREMENT=29772294203 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO puerta VALUES("23448489","2# Entamborada Fina<br> 3# Metalica","2","2"),
("39261115","2# Entamborada Fina","1","2"),
("90278483","3# Metalica","1","3");



DROP TABLE IF EXISTS regulacion_tt;

CREATE TABLE `regulacion_tt` (
  `id_regulacion_tt` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_datos_rtt` bigint(12) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `razon` varchar(200) NOT NULL,
  PRIMARY KEY (`id_regulacion_tt`),
  KEY `RTTDATA` (`id_datos_rtt`),
  CONSTRAINT `RTTDATA` FOREIGN KEY (`id_datos_rtt`) REFERENCES `datos_rtt` (`id_datos_rtt`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93318146 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO regulacion_tt VALUES("62496446","62496446","soltero(a)","2025-03-08","kkflaslkdjsfllskjfsfklasjdfkjgfklasjdfljkd");



DROP TABLE IF EXISTS representante;

CREATE TABLE `representante` (
  `id_representante` int(11) NOT NULL,
  `cedula_representante` bigint(12) NOT NULL,
  `id_propietario` bigint(12) NOT NULL,
  `tipo_representante` varchar(100) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `apellido_completo` varchar(100) NOT NULL,
  `numero_representante` varchar(20) NOT NULL,
  `estado_representante` int(11) NOT NULL,
  PRIMARY KEY (`id_representante`),
  KEY `id_propietario` (`id_propietario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO representante VALUES("26251498","0","297722942","Titular","","","","1"),
("63820122","0","297722942","Titular","","","","1"),
("81225758","0","21272431","Titular","","","","1");



DROP TABLE IF EXISTS sala;

CREATE TABLE `sala` (
  `id_sala` bigint(12) NOT NULL,
  `total_sala` int(11) NOT NULL,
  `x_piso_sala` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sala`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO sala VALUES("39261115","1","1");



DROP TABLE IF EXISTS sectores;

CREATE TABLE `sectores` (
  `id_sectores` int(11) NOT NULL AUTO_INCREMENT,
  `sectores` varchar(100) NOT NULL,
  `id_parroquia` int(11) NOT NULL,
  PRIMARY KEY (`id_sectores`),
  KEY `id_parroquia` (`id_parroquia`),
  CONSTRAINT `ParrSect` FOREIGN KEY (`id_parroquia`) REFERENCES `parroquia` (`id_parroquia`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sectores VALUES("1","Arias Blanco","1"),
("2","El Progreso","1"),
("3","El Piñal","1"),
("4","Mata Seca","1"),
("5","Valle Verde","1"),
("6","Corral de Piedra","1"),
("7","Los Capuchino","1"),
("8","Niño Jesús","1"),
("9","Tejerías","1"),
("10","Agropecuaria","1"),
("11","El Paseo Casa","1"),
("12","El Paseo Bloque","1"),
("13","Caja de Agua","1"),
("14","Los Rauseos","1"),
("15","Los Mayas","1"),
("16","Alma Mater I","1"),
("17","Alma Mater II","1"),
("18","#1","2"),
("19","#2","2"),
("20","#3","2"),
("21","#4","2"),
("22","#5","2"),
("23","#6","2"),
("24","#7 - La Trinidad","2"),
("25","#8","2"),
("26","#9","2"),
("27","#10","2"),
("28","#11","2"),
("29","#12","2"),
("30","#13","2"),
("31","Jose Felix Ribas 2","2"),
("32","Jose Felix Ribas 3","2"),
("33","Jose Felix Ribas 4","2"),
("34","Jose Felix Ribas 5","2"),
("35","La Candelaria I","2"),
("36","La Candelaria II","2"),
("37","Arsenal Sector A","2"),
("38","Arsenal Sector B","2"),
("39","Arsenal Sector C","2"),
("40","Arsenal Valle de Aragua","2");



DROP TABLE IF EXISTS sentencia_divorcio;

CREATE TABLE `sentencia_divorcio` (
  `id_sentencia_divorcio` bigint(12) NOT NULL AUTO_INCREMENT,
  `n_sd` varchar(11) NOT NULL,
  `tomo_sd` varchar(11) NOT NULL,
  `folio_sd` varchar(11) NOT NULL,
  `fecha_sd` varchar(11) NOT NULL,
  PRIMARY KEY (`id_sentencia_divorcio`)
) ENGINE=InnoDB AUTO_INCREMENT=66060334 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO sentencia_divorcio VALUES("62496446","","","","");



DROP TABLE IF EXISTS servicio;

CREATE TABLE `servicio` (
  `id_servicio` bigint(12) NOT NULL,
  `total_servicio` int(11) NOT NULL,
  `x_piso_servicio` varchar(100) NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO servicio VALUES("39261115","0","0");



DROP TABLE IF EXISTS servicio_publico;

CREATE TABLE `servicio_publico` (
  `id_servicio_publico` bigint(12) NOT NULL AUTO_INCREMENT,
  `servicio_publico_totales` varchar(500) NOT NULL,
  `cantidad_servicio_publico` int(20) NOT NULL,
  `codigo_servicio_publico` varchar(20) NOT NULL,
  PRIMARY KEY (`id_servicio_publico`)
) ENGINE=InnoDB AUTO_INCREMENT=29772294203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO servicio_publico VALUES("23448489","3# Drenaje Artificial<br> 5# Acera","2","3, 5"),
("39261115","3# Drenaje Artificial<br> 5# Acera","2","3, 5"),
("90278483","3# Drenaje Artificial<br> 5# Acera","2","3, 5");



DROP TABLE IF EXISTS size_terreno;

CREATE TABLE `size_terreno` (
  `id_size_terreno` int(12) NOT NULL AUTO_INCREMENT,
  `tipo_size` varchar(12) NOT NULL,
  `info_size` varchar(200) NOT NULL,
  `rule_size` float NOT NULL,
  PRIMARY KEY (`id_size_terreno`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO size_terreno VALUES("1","D1","Terreno Urbanizable hasta 5.000,00 M2","5000"),
("2","D2","Terreno Urbanizable desde 5.000,01 M2 hasta 50.000,00 M2","0"),
("3","D3","Terreno Urbanizable desde 50.000,01 M2, en adelante","50000"),
("4","E1","Terreno Rural hasta 5.000,00 M2, incluido en la Poligonal Urbana","5000"),
("5","E2","Terreno Rural desde 5.000,01 M2 hasta 50.000,00 M2, incluido en la Poligonal Urbana","0"),
("6","E3","Terreno Rural desde 50.000,01 M2, incluido en la Poligonal Urbana","50000"),
("7","A","Uso Recidencial o Comercial con todos los Servicios de Urbanismo Tipo A","1"),
("8","B","Uso Recidencial o Comercial con todos los Servicios de Urbanismo Tipo B","1"),
("9","C","Uso Recidencial o Comercial con todos los Servicios de Urbanismo Tipo C","1");



DROP TABLE IF EXISTS solicitud;

CREATE TABLE `solicitud` (
  `id_solicitud` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `razon_inmueble` varchar(200) NOT NULL,
  `tipo_solicitud` int(11) NOT NULL,
  `estado_solicitud` int(11) NOT NULL,
  `leida_estado` enum('1','2') NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `id_usuario` (`id_inmueble_usuario`),
  CONSTRAINT `SoliU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=99642764 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO solicitud VALUES("13614338","31","2025-03-07","erqerewrqwerwerwerqwerwerwqerwer","4","1","1"),
("26251498","32","2025-03-08","sadadASDASDasd","1","1","1"),
("37859269","31","2025-03-08","dsfasdfasdfasdfsadfasdfsdafsfasdfasdffasdfasdfasdfasdfa","5","1","1"),
("54944398","32","2025-03-08","erwerwqerwerwqerqwer","5","1","1"),
("63820122","32","2025-03-08","sadadASDASDasd","1","1","1"),
("65491220","32","2025-03-08","sdfsadfasdfasdfasdfasdfasdfad","6","1","1"),
("81225758","33","2025-03-08","dsfasdfasdfsdfsdafasdfasdfsadf","1","1","1"),
("81572019","32","2025-03-07","fasdfasdfasdfsadfasdfdsfasfasdfsdfsdfdfasdf","2","1","1");



DROP TABLE IF EXISTS solvencia;

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
  `estado_solvencia` int(5) NOT NULL,
  PRIMARY KEY (`id_solvencia`),
  KEY `id_dollar` (`id_dollar`,`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS tasa_moneda;

CREATE TABLE `tasa_moneda` (
  `id_tasa_moneda` bigint(11) NOT NULL AUTO_INCREMENT,
  `id_moneda` int(11) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `valor` float NOT NULL,
  `estado_moneda` int(5) NOT NULL,
  PRIMARY KEY (`id_tasa_moneda`),
  KEY `codigo_moneda` (`id_moneda`),
  CONSTRAINT `TasaMon` FOREIGN KEY (`id_moneda`) REFERENCES `tipo_moneda` (`id_tipo_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tasa_moneda VALUES("1","1","15-08-2024","45","2"),
("2","3","15-08-2024","54.56","2"),
("3","1","23-02-2025","45.8","2"),
("4","1","09-03-2025","23.45","1");



DROP TABLE IF EXISTS tipo_acabado;

CREATE TABLE `tipo_acabado` (
  `id_tipo_acabado` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_acabado` varchar(20) NOT NULL,
  `descripcion_acabado` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_acabado`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_acabado VALUES("1","Sin Friso","Las Paredes no presenta friso."),
("2","Friso Liso","Las Paredes presenta un friso liso."),
("3","Friso Rustico","Las Paredes presenta un friso con variaciones en la textura debido al uso del cepillo de madera o rodillo de textura."),
("4","Obra Limpia","Los elementos integrantes del acabado de la obra son de primera, no requiriendo agregados adicionales."),
("6","Lujoso","Las Paredes presenta cerámica."),
("9","Otros","Cualquier Otro tipo de acabado no señalado.");



DROP TABLE IF EXISTS tipo_acceso;

CREATE TABLE `tipo_acceso` (
  `id_tipo_acceso` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_acceso` varchar(20) NOT NULL,
  `descripcion_acceso` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_acceso`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_acceso VALUES("1","Calle Pavimentada","Acceso al inmueble es una calle que esta pavimentada y es transitable."),
("2","Calle Engranzonada","Calle presenta una capa uniforme de material de relleno, sin paviemnto."),
("3","Calle de Tierra","Calle es de tierra, sin relleno; pero transitable."),
("4","Escalera Pavimento","Acceso al inmueble es una escalera comun pavimentada."),
("5","Escalera de Tierra","Acceso al inmueble es una escalera comun de tierra (sin paviemento)"),
("6","Otros","Otro tipo de acceso no señalado en los puntos anteriores");



DROP TABLE IF EXISTS tipo_carga;

CREATE TABLE `tipo_carga` (
  `id_tipo_carga` bigint(20) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_carga`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_carga VALUES("1","Esposa o Esposo"),
("2","Padre/ Madre"),
("3","hijo /hoja "),
("4","hermana / hermano"),
("5","abuelo / abuela"),
("6","tio/ tia"),
("7","primo/ prima"),
("8","sobrina / sobrino");



DROP TABLE IF EXISTS tipo_clausula;

CREATE TABLE `tipo_clausula` (
  `id_tipo_clausula` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_clausula` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_tipo_clausula`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_clausula VALUES("1","Identificación de las partes"," Esta cláusula identifica quiénes son las partes involucradas en el contrato (vendedor y comprador, o arrendador y arrendatario), incluyendo sus nombres completos, datos de identificación y domicilios."),
("2","Descripción del inmueble","Se detalla la propiedad objeto del contrato, incluyendo su ubicación, características físicas (tamaño, número de habitaciones, etc.), y número de referencia catastral."),
("3","Precio y forma de pago","Se especifica el precio total de la venta o la renta mensual, así como la forma en que se realizará el pago (efectivo, transferencia bancaria, etc.) y las fechas límite para los pagos."),
("4","Plazo del contrato","Se indica la duración del contrato, ya sea un plazo fijo (por ejemplo, un año) o un plazo indefinido. En el caso de la venta, se puede establecer una fecha para la transferencia de la propiedad."),
("5","Condiciones de entrega","Se establecen las condiciones en las que se entregará el inmueble, incluyendo la fecha de entrega, el estado en el que debe encontrarse y quién se hará cargo de los gastos de entrega."),
("6","Obligaciones de las partes: ","Se detallan las responsabilidades tanto del vendedor/arrendador como del comprador/arrendatario. Por ejemplo, el vendedor puede ser responsable de entregar el inmueble en buen estado, mientras que el comprador debe pagar el precio acordado."),
("7","Garantías","Se establecen las garantías que ofrece el vendedor sobre el inmueble, como la ausencia de vicios ocultos o problemas legales."),
("8","Cláusula penal","Se estipulan las penalizaciones en caso de incumplimiento del contrato por alguna de las partes. Por ejemplo, se puede establecer una multa por retraso en el pago o por incumplimiento de alguna obligación."),
("9","Resolución del contrato","Se indican las causas por las que se puede rescindir el contrato antes de su vencimiento, así como las consecuencias de la rescisión"),
("10","Jurisdicción y ley aplicable","Se especifica qué leyes se aplicarán en caso de disputa y qué tribunales serán competentes para resolver cualquier conflicto relacionado con el contrato.");



DROP TABLE IF EXISTS tipo_complementaria;

CREATE TABLE `tipo_complementaria` (
  `id_tipo_complementario` int(11) NOT NULL,
  `tipo_complementario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_complementario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_complementaria VALUES("1","Ascensor"),
("2","Aire Acondicionado"),
("3","Closeth"),
("4","Rejas"),
("5","Porcelana"),
("6","Otros");



DROP TABLE IF EXISTS tipo_conservacion;

CREATE TABLE `tipo_conservacion` (
  `id_tipo_conservacion` bigint(11) NOT NULL AUTO_INCREMENT,
  `tipo_conservacion` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_conservacion`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_conservacion VALUES("1","Excelente"),
("2","Bueno"),
("3","Regular"),
("4","Malo"),
("5","Otro");



DROP TABLE IF EXISTS tipo_construccion;

CREATE TABLE `tipo_construccion` (
  `id_tipo_construccion` int(14) NOT NULL AUTO_INCREMENT,
  `tipo_construccion` varchar(20) NOT NULL,
  `descripcion_contruccion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_construccion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_construccion VALUES("1","Edif","Edificio"),
("2","Apto","Apartamento"),
("3","Qta","Quinta"),
("4","Casa","Casa"),
("5","Rancho","Rancho"),
("6","C.C","Centro Comercial"),
("7","Local C","Local Comercial"),
("8","Ofc","Oficina"),
("9","Galpon","Galpon"),
("10","Otros","Otro tipo de construción");



DROP TABLE IF EXISTS tipo_construccion_generales;

CREATE TABLE `tipo_construccion_generales` (
  `id_tipo_construccion_generales` int(14) NOT NULL AUTO_INCREMENT,
  `tipo_construccion_generales` varchar(20) NOT NULL,
  `descripcion_tipo_construccion_generales` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_construccion_generales`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_construccion_generales VALUES("1","Edif","Edificio"),
("2","Apto","Apartamento"),
("3","Qta","Quinta"),
("4","Casa","Casa"),
("5","Rancho","Rancho"),
("6","C.C","Centro Comercial"),
("7","Local C","Local Comercial"),
("8","Ofc","Oficina"),
("9","Galpon","Galpon "),
("10","Otros","Otro tipo de construción"),
("11","Casa/Quinta","Casa/Quinta"),
("12","Chalet","Chalet"),
("13","Twon House","Twon House"),
("14","Casa Tradicional","Casa Tradicional"),
("15","Casa Convecional","Casa Convecional");



DROP TABLE IF EXISTS tipo_contrato;

CREATE TABLE `tipo_contrato` (
  `id_tipo_contrato` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_contrato` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_contrato`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_contrato VALUES("1","Contrato Venta de Inmueble",""),
("2","Contrato de Arrendamiento ","");



DROP TABLE IF EXISTS tipo_cubierta;

CREATE TABLE `tipo_cubierta` (
  `id_tipo_cubierta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_cubierta` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_cubierta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_cubierta VALUES("1","Madera/Teja"),
("2","Placa/Teja"),
("3","Platabanda"),
("4","Teja"),
("5","Asbesto"),
("6","Aluminio"),
("7","Zinc"),
("8","Aceroli"),
("9","Plafond"),
("10","Raso Laminas"),
("11","Raso Economico"),
("12","Otro");



DROP TABLE IF EXISTS tipo_descripcion_uso;

CREATE TABLE `tipo_descripcion_uso` (
  `id_tipo_descripcion_uso` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_descripcion_uso` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_descripcion_uso`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_descripcion_uso VALUES("1","Unifamiliar","La edificación es utilizada por una sola familia, respondiendo su distribucion arquitectónica a esta situación."),
("2","Bifamiliar","La edificación de dos niveles o apareada, fue construida para albergar dos familias, estas presentan conexiones independientes a los servicios."),
("3","Multifamiliar","La edificación por lo general de varios niveles, alberga varias familia, acorde con su distribución arquitectónica original."),
("4","Comercio al Detal","La edificación esta destinado al comercio menor."),
("5","Comercio al Mayor","La edificación es utilizada para la venta o distribución de cualquier producto en grandes coantidades."),
("6","Mercado Libre","La edificación es utilizada como mercado, donde existen pequeños expendedores al detal."),
("7","Oficina","La edificación funcionan oficinas de cualquier tipo, local destinado a actividades administrativas o al ejercicio de profesionales."),
("8","Industria","La edificación es utilizada se utiliza para procesar materia prima."),
("9","Servicio","La edificación es utilizada se utiliza para prestar algún servicio bien sea publico o privado."),
("10","Agropecuario","La edificación es utilizada se utiliza para realizar actividades agropecuaria."),
("11","Otro","Cualquier Otro tipo de descripción de uso no señalado.");



DROP TABLE IF EXISTS tipo_destino;

CREATE TABLE `tipo_destino` (
  `id_tipo_destino` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_destino` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tipo_destino`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_destino VALUES("1","Multifamiliar"),
("2","Comercial"),
("3","Industrial"),
("4","Recreativo/Deportivo"),
("5","Asistencia/Salud"),
("6","Educacional"),
("7","Turístico"),
("8","Social/Cultural"),
("9","Gubernamental/Institucional"),
("10","Religioso"),
("11","Pesquero"),
("12","Agroindustrial"),
("13","Agroforestal"),
("14","Agricola"),
("15","Pecuario"),
("16","Forestal"),
("17","Minero"),
("18","Sin uso"),
("19","Otro");



DROP TABLE IF EXISTS tipo_entorno;

CREATE TABLE `tipo_entorno` (
  `id_tipo_entorno` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_entorno` varchar(20) NOT NULL,
  `descripcion_entorno` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_entorno`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_entorno VALUES("1","Zona Urbanizada","inmueble que se encuentra localizado en una zomna urbanizada dentro o fuera de la poligonal urbana, determinada por la alcaldia."),
("2","Zona No Urbanizada","Inmueble que esta localizada en una zona o sector, disponible o no de los servicios basicos, pero fuera del area urbana establecida."),
("3","Río / Quebrada","Inmueble colinda con un rio / quebrada sin importar que estos no presenten caudal alguno."),
("4","Barranco / Talud","Inmueble que se encuentra emplazado cerca de un corte pronunciado del terreno; ya sea sobre el talud, en el talud o bajo el talud."),
("5","Otro","Cualquier otro tipo de entorno fisico no señalado en los puntos anteriores.");



DROP TABLE IF EXISTS tipo_escala;

CREATE TABLE `tipo_escala` (
  `id_tipo_escala` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_escala` varchar(20) NOT NULL,
  `descripcion_escala` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_escala`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_escala VALUES("1","1:50",""),
("2","1:100",""),
("3","1:125",""),
("4","1:150",""),
("5","1:200",""),
("6","1:250",""),
("7","1:300",""),
("8","1:400",""),
("9","1:500",""),
("10","1:600",""),
("11","1:700","");



DROP TABLE IF EXISTS tipo_estructura;

CREATE TABLE `tipo_estructura` (
  `id_tipo_estructura` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_estructura` varchar(20) NOT NULL,
  `descripcion_estructura` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_estructura`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_estructura VALUES("1","Concreto Armado","La edificación se soporta en columnas de una mezcla de arena, cemento, piedra picada y cabillas de acero."),
("2","Metálica","La edificación se soporta en una estructura de acero, hierro u otro elemento metalico."),
("3","Madera","La edificación se soporta en una estructura de madera."),
("4","Paredes de Carga","Las paredes reposa la estructura que soporta el techo, es decir que si eliminamos las paredes el techo de desploma."),
("5","Prefabricado","La edificación se soporta en elementos prefabricados."),
("6","Machones","La edificación se soporta en columnas de concreto mezclado, utilizada generalmente en edificaciones de un nivel, en estos casos la columna es vaciada una vez levantada las paredes."),
("7","Otro","Cualquier Otro tipo de soporte no señalado.");



DROP TABLE IF EXISTS tipo_forma;

CREATE TABLE `tipo_forma` (
  `id_tipo_forma` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_forma` varchar(20) NOT NULL,
  `descripcion_forma` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_forma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_forma VALUES("1","Regular","Forma de la Parcela es semejante a un rectangulo o un cuadrado, y esta en condiciones de lograr la maxima utilización del terreno."),
("2","Irregular","Forma de la Parcela es un poligono irregular, es decir que representa dificultad para lograr su maximo aprovechamiento."),
("3","Muy Irregular","La forma se excede de quiebres y ondulaciones, dificultando aun mas su posibilidad de aprovechamiento.");



DROP TABLE IF EXISTS tipo_gravament;

CREATE TABLE `tipo_gravament` (
  `id_tipo_gravament` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_gravament` varchar(100) NOT NULL,
  `descripcion_gravament` varchar(500) NOT NULL,
  PRIMARY KEY (`id_tipo_gravament`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_gravament VALUES("1","Hipoteca","Este gravamen representa un derecho real que grava el inmueble en garantía del cumplimiento de una obligación (generalmente un préstamo). Implica que el inmueble responde por la deuda, y en caso de impago, el acreedor hipotecario puede ejecutar la garantía y obtener el pago con el producto de la venta del inmueble."),
("2","Embargo","Este gravamen es una medida judicial que inmoviliza el inmueble, impidiendo su venta o transferencia. Se decreta para asegurar el pago de una deuda o el cumplimiento de una obligación legal. Indica que el inmueble está sujeto a un proceso legal y puede ser objeto de venta forzosa."),
("3","Usufructo","Este gravamen otorga a una persona (el usufructuario) el derecho a usar y disfrutar del inmueble, aunque la propiedad pertenezca a otra (el nudo propietario). El usufructuario puede percibir los frutos del inmueble, pero no puede venderlo ni hipotecarlo."),
("4","Servidumbre","Este gravamen establece un derecho real que permite a un predio (predio dominante) utilizar o beneficiarse de otro predio (predio sirviente). Puede implicar el derecho de paso, el derecho a tomar agua, o cualquier otra limitación al uso del predio sirviente."),
("5","Limitaciones de Dominio","Este gravamen engloba restricciones legales o convencionales que limitan el derecho de propiedad sobre el inmueble. Pueden incluir limitaciones urbanísticas (altura máxima, uso permitido), limitaciones impuestas por comunidades de propietarios (reglamento de copropiedad), o limitaciones derivadas de contratos."),
("6","Afecciones Fiscales","Este gravamen se refiere a deudas pendientes relacionadas con impuestos sobre el inmueble, como el impuesto predial. Indica que el inmueble está sujeto al pago de dichas deudas, y en caso de impago, la autoridad fiscal puede ejecutar el inmueble.");



DROP TABLE IF EXISTS tipo_horario;

CREATE TABLE `tipo_horario` (
  `id_tipo_horario` int(11) NOT NULL,
  `tipo_horario` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_horario VALUES("1","08:00 a 09:00"),
("2","09:00 a 10:00"),
("3","10:00 a 11:00"),
("4","11:00 a 12:00");



DROP TABLE IF EXISTS tipo_identificacion;

CREATE TABLE `tipo_identificacion` (
  `id_ti` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_i` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `id_tipo_p` int(2) NOT NULL,
  PRIMARY KEY (`id_ti`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_identificacion VALUES("1","V","Venezolano","1"),
("2","E","Extranjero","1"),
("3","J","Empresa Privada","2"),
("4","G","Institucion Gubernamental","2");



DROP TABLE IF EXISTS tipo_inmueble;

CREATE TABLE `tipo_inmueble` (
  `id_tipo_inmueble` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_inmueble` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_inmueble`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS tipo_instalaciones_electricas;

CREATE TABLE `tipo_instalaciones_electricas` (
  `id_tipo_instalaciones_electricas` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_instalaciones_electricas` varchar(20) NOT NULL,
  `descripcion_instalaciones` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_instalaciones_electricas`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_instalaciones_electricas VALUES("1","Embutida","Las instalaciones eléctricas están embutida."),
("2","Externa","Las instalaciones eléctricas están externa."),
("3","Industrial","Las instalaciones eléctricas son industriales.");



DROP TABLE IF EXISTS tipo_interno;

CREATE TABLE `tipo_interno` (
  `id_tipo_interno` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_interno` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_interno`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_interno VALUES("1","Plafón","La cubierta interna es de plafón."),
("2","Cielo Raso Laminas","La cubierta interna es de cielo raso."),
("3","Cielo Raso Economico","La cubierta interna es de cielo raso económico."),
("4","Otros","Cualquier Otro tipo de cubierta interna no señalado.");



DROP TABLE IF EXISTS tipo_lugar_inmueble;

CREATE TABLE `tipo_lugar_inmueble` (
  `id_tipo_lugar_inmueble` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_lugar_inmueble` varchar(20) NOT NULL,
  `descripcion_lugar` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_lugar_inmueble`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_lugar_inmueble VALUES("1","Urb","Urbanizacion"),
("2","Conj. Resd","Conjunto Residencial"),
("3","Barrio","Barrio"),
("4","Sector","Sector");



DROP TABLE IF EXISTS tipo_mejora;

CREATE TABLE `tipo_mejora` (
  `id_tipo_mejora` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_mejora` varchar(20) NOT NULL,
  `descripcion_mejora` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_mejora`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_mejora VALUES("1","Muro de Contención","El predio existen muros de contención, definidos como la estructura de soporte inclinada o vertical para confinar o restringir el movimiento de tierra o agua."),
("2","Nivelación","EL terreno donde esta ubicado el inmueble se ha realizado una nivelación, entendiéndose como tal, al trabajo realizado en el terreno para uniforme las diferentes alturas o elevaciones."),
("3","Cercado","El terreno donde esta ubicado el inmueble esta cercado, entendiéndose como tal al muro o cerca que se pone alrededor de algún terreno para su resguardo y que sirve para desmarcar los limistes de una p"),
("4","Pozo Séptico","El terreno donde esta ubicado el inmueble, existe un pozo séptico."),
("5","Lagunas Artificiales","En el predio existen lagunas artificiales definidas como deposito para el almacenaje de agua hecho por el hombre a fin de suministrar agua al inmueble."),
("6","Otros","Cualquier Otro tipo de mejora de terreno no señalado.");



DROP TABLE IF EXISTS tipo_moneda;

CREATE TABLE `tipo_moneda` (
  `id_tipo_moneda` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_moneda` varchar(20) NOT NULL,
  `codigo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_moneda`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_moneda VALUES("1","EUR","<i class=\"nav-icon fa fa-euro-sign\"></i>"),
("2","CNY","<i class=\"nav-icon fa fa-yen-sign\"></i>"),
("3","TRY","<i class=\"nav-icon fa fa-lira-sign\"></i>"),
("4","RUB","<i class=\"nav-icon fa fa-ruble-sign\"></i>"),
("5","USD","<i class=\"nav-icon fa fa-dollar-sign\"></i>");



DROP TABLE IF EXISTS tipo_motivo;

CREATE TABLE `tipo_motivo` (
  `id_tipo_motivo` int(11) NOT NULL,
  `tipo_motivo` varchar(200) NOT NULL,
  `estado_motivos` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_motivo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_motivo VALUES("1","Constancia de Inscripción de Inmueble o Cédula Catastral (Nueva).","1"),
("2","Renovación de Constancia de Inscripción de Inmueble o Cédula Catastral.","0"),
("3","Plano Mensura.","1"),
("4","Certificado de Empadronamiento.","0"),
("5","Tasa Por Cambio de Propiedad (Constancia de Inscripción y Plano Mensura).","1"),
("6","Tasa por Inspección General.","1"),
("8","Solicitud de Cambio de Estructura Parcelaria.","1"),
("9","Solicitud de Rectificación de Medidas y Linderos.","0"),
("10","Solicitud de Contrato de Arrendamiento de Terreno (Parcela sin Desarrollar).","0"),
("11","Solicitud de Regularización de la Tenencia de la Tierra (Parcela Desarrollada).","1"),
("12","Solicitud de Compra de Terreno Municipal (Compra Ordinaria).","1"),
("13","Solicitud de Traspaso de Terreno.","0"),
("14","Cambio de Estructura Parcelaria por M2 del Área Total de la Parcela.","1"),
("15","Contrato de Arrendamiento de Terreno (Parcela sin Desarrollar por M2).","0"),
("16","Contrato de Compra-Venta de Terreno (Parcela sin Desarrollar Compra Ordinaria por M2).","1"),
("17","Contrato de Consecución de Uso Gratuito de Parcela de Terreno Municipal.","1"),
("18","Adjudicaciones de Arrendamiento con Opcion a Compra por M2.","1"),
("20","Otros","1"),
("21","Audiencia con el Director","1");



DROP TABLE IF EXISTS tipo_paredes;

CREATE TABLE `tipo_paredes` (
  `id_tipo_paredes` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_paredes` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_paredes`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_paredes VALUES("1","Bloque"),
("2","Ladrillo"),
("3","Prefabricado"),
("4","Bahareque"),
("5","Adobe-Tapia"),
("6","Otros");



DROP TABLE IF EXISTS tipo_persona;

CREATE TABLE `tipo_persona` (
  `id_tp` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_p` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tp`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_persona VALUES("1","Pn","Persona natural"),
("2","Pj","Persona juridica");



DROP TABLE IF EXISTS tipo_piezas;

CREATE TABLE `tipo_piezas` (
  `id_tipo_piezas` int(12) NOT NULL,
  `tipo_piezas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_piezas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_piezas VALUES("1","Porcelana Fina"),
("2","Porcelana Economica"),
("3","Bañera"),
("4","Calentador"),
("5","W.C."),
("6","Bidet"),
("7","Lavamanos"),
("8","Ducha"),
("9","Letrinas"),
("10","Otros");



DROP TABLE IF EXISTS tipo_pintura;

CREATE TABLE `tipo_pintura` (
  `id_tipo_pintura` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_pintura` varchar(20) NOT NULL,
  `descripcion_pintura` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_pintura`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_pintura VALUES("1","Caucho","Las paredes presentan pintura de caucho."),
("2","Oleo","Las paredes presentan pintura de óleo."),
("3","Lechada","Las paredes presentan pintura de caucho."),
("4","Pasta","Las paredes presentan pintura de pasta."),
("5","Asbetina","Las paredes presentan pintura de asbetina.");



DROP TABLE IF EXISTS tipo_piso;

CREATE TABLE `tipo_piso` (
  `id_tipo_piso` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_piso` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_piso`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_piso VALUES("1","Cemento Pulido"),
("2","Cemento Rústico"),
("3","Cemento Color"),
("4","Baldosa"),
("5","Granito 1"),
("6","Granito 2"),
("7","Lujoso"),
("8","Vinil"),
("9","Mosaico"),
("10","Otro");



DROP TABLE IF EXISTS tipo_porcentaje;

CREATE TABLE `tipo_porcentaje` (
  `id_tipo_porcentaje` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_porcentaje` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tipo_porcentaje`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_porcentaje VALUES("1","10%"),
("2","20%"),
("3","30%"),
("4","40%"),
("5","50%"),
("6","60%"),
("7","70%"),
("8","80%"),
("9","90%"),
("10","100%");



DROP TABLE IF EXISTS tipo_puerta;

CREATE TABLE `tipo_puerta` (
  `id_tipo_puerta` bigint(11) NOT NULL AUTO_INCREMENT,
  `tipo_puerta` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_puerta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_puerta VALUES("1","Entamborada Economica"),
("2","Entamborada Fina"),
("3","Metalica"),
("4","Otros");



DROP TABLE IF EXISTS tipo_regimen;

CREATE TABLE `tipo_regimen` (
  `id_tipo_regimen` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_regimen` varchar(20) NOT NULL,
  `descripcion_regimen` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_regimen`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_regimen VALUES("1","Municipio Propio","El inmueble es de propiedad del Municipio, habiendo sido adquirido por compra o donación."),
("2","Nacional","El inmueble pertenece a la nación, forman parte de los bienes nacionales, según los establecido en el Art.16 de la Lay Orgánica de la Hacienda Pública Nacional."),
("3","Estadal","El inmueble pertenece a las entidades federales (Estados)."),
("4","Priv. Individual","El inmueble pertenece a una persona natural o juridica."),
("5","Priv. Condominio","El inmueble se rige por la ley de la propiedad horizontal."),
("6","Otro","Cualquier Otro tipo de régimen de propiedad no señalado.");



DROP TABLE IF EXISTS tipo_servicio_publico;

CREATE TABLE `tipo_servicio_publico` (
  `id_tipo_servicio_publico` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_servicio_publico` varchar(40) NOT NULL,
  PRIMARY KEY (`id_tipo_servicio_publico`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_servicio_publico VALUES("1","Acueducto"),
("2","Cloacas"),
("3","Drenaje Artificial"),
("4","Pavimento"),
("5","Acera"),
("6","Electricidad Industrial"),
("7","Alumbrado Público"),
("8","Vialidad"),
("9","Aseo Urbano"),
("10","Cable TV"),
("11","Transporte"),
("12","Teléfono"),
("13","Cobertura Celular"),
("14","Escuelas"),
("15","Medicaturas"),
("16","Correo y Telégrafo"),
("17","Gas"),
("18","Aseo"),
("19","Electricidad Residencial"),
("20","Riego"),
("21","Otros");



DROP TABLE IF EXISTS tipo_solicitud;

CREATE TABLE `tipo_solicitud` (
  `id_tipo_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_solicitud` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_solicitud`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO tipo_solicitud VALUES("1","Cita"),
("2","Inspección"),
("3","Evacuación de Titulo Supletorio"),
("4","Empadronamiento"),
("5","Contrato"),
("6","Regulación de la Tenencia de Tierra"),
("7","Cambio de Restructuración Parcelaria"),
("8","Copias Certificadas");



DROP TABLE IF EXISTS tipo_techo;

CREATE TABLE `tipo_techo` (
  `id_tipo_techo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_techo` varchar(20) NOT NULL,
  `descripcion_techo` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_techo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_techo VALUES("1","Concreto","Los elementos estructurales que soportan la cubierta de techo, son a base de concreto armado."),
("2","Metálica","Los elementos estructurales que soportan la cubierta de techo son metálico."),
("3","Madera","Los elementos estructurales que soportan la cubierta son vigas de madera."),
("4","Varas","Los elementos estructurales que soportan la cubierta de techo son varas de madera."),
("6","Otro","Cualquier Otro tipo de Techo señalado.");



DROP TABLE IF EXISTS tipo_tenencia;

CREATE TABLE `tipo_tenencia` (
  `id_tipo_tenencia` bigint(11) NOT NULL,
  `tipo_tenencia` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo_tenencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_tenencia VALUES("1","Municipal"),
("2","Individual"),
("3","Condominio"),
("4","Compañía"),
("5","Nacional"),
("6","Comunidad"),
("7","Arrendado"),
("8","Enfiteusis"),
("9","Ocupado"),
("10","Otro");



DROP TABLE IF EXISTS tipo_terreno;

CREATE TABLE `tipo_terreno` (
  `id_tipo_terreno` bigint(11) NOT NULL,
  `area_terreno` float NOT NULL,
  `id_tenencia` bigint(11) NOT NULL,
  `estado_terreno` int(5) NOT NULL,
  `id_ficha` int(11) NOT NULL,
  PRIMARY KEY (`id_tipo_terreno`),
  KEY `id_tenencia` (`id_tenencia`),
  KEY `id_fecha` (`id_ficha`),
  KEY `id_ficha` (`id_ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS tipo_tipologia;

CREATE TABLE `tipo_tipologia` (
  `id_tipo_tipologia` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_tipologia` varchar(20) NOT NULL,
  `descripcion_tipologia` varchar(400) NOT NULL,
  PRIMARY KEY (`id_tipo_tipologia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_tipologia VALUES("1","A","Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo A"),
("2","B","Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo B"),
("3","C","Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo C"),
("4","D","Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo D"),
("5","E","Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo E"),
("6","F","Uso Residencial o Comercial con todos los Servicios de Urbanismo Tipo F");



DROP TABLE IF EXISTS tipo_topografia;

CREATE TABLE `tipo_topografia` (
  `id_tipo_topografia` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_topografia` varchar(20) NOT NULL,
  `descripcion_topografia` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_topografia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_topografia VALUES("1","Plano","La superficie del terreno se presenta plana o con pocos altibajos con la relación a la cabeza de acceso."),
("2","Sobre Nível","La superficie del terreno se encuentra por encima del plano definido por la calzada del acceso."),
("3","Bajo Nível","La superficie del terreno se encuentra por debajo del plano definido por la calzada del acceso."),
("4","Corte","El terreno fue sometido a un movimiento de tierra para lograr su mejor aprovechamiento, el corte realizado remueve el terreno natural que se encuentra por encima de la calzada de acceso."),
("5","Relleno","La parcela se le adiciona un agregado de material elevando su nivel."),
("6","Inclinado","La superficie del terreno presenta inclinación."),
("7","Irregular","La superficie del terreno presenta irregularidades en el relieve como por ejemplo, colina con pequeños valles, ligeramente planos, ligeramente inclinados, con inclinaciones muy abruptas, entre otros.");



DROP TABLE IF EXISTS tipo_ubicacion;

CREATE TABLE `tipo_ubicacion` (
  `id_tipo_ubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_ubicacion` varchar(20) NOT NULL,
  `descripcion_ubicacion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_ubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_ubicacion VALUES("1","Convecional","EL inmueble se puede ubicar facilmente desde la via de acceso al mismo."),
("2","Esquina","Inmueble se encuentra ubicado en una de las esquinas de la manzana, ofreciendo mejores condiciones para su aprovechamiento."),
("3","Interior de Manzana","Inmueble no es de facil ubicación, aun estando en frente a la via de acceso."),
("4","Oculta","Acceso de inmueble es por el interior de otro inmueble, estando ubicado en el interior de la manzana sin ningun otro tipo de acceso.");



DROP TABLE IF EXISTS tipo_ubicacion_entre;

CREATE TABLE `tipo_ubicacion_entre` (
  `id_tipo_ubicacion_entre` int(14) NOT NULL AUTO_INCREMENT,
  `tipo_ubicacion_entre` varchar(10) NOT NULL,
  `descripcion_ubicacion_entre` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_ubicacion_entre`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_ubicacion_entre VALUES("1","Av","Avenida "),
("2","Clle","Calle"),
("3","Crr","Carril"),
("4","Trav","Transversal"),
("5","Prol","Prolongacion"),
("6","Crrt","Carretera"),
("7","Cjn","Callejon"),
("8","Psje","Pasaje"),
("9","Blv","Boolevar"),
("10","Vda","Vereda"),
("11","Esc","Escalera"),
("12","Snd","Senderos"),
("13","Tcal","Troncal"),
("14","Cno","Conuno");



DROP TABLE IF EXISTS tipo_ventana;

CREATE TABLE `tipo_ventana` (
  `id_tipo_ventana` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_ventana` varchar(20) NOT NULL,
  `descripcion_ventana` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tipo_ventana`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO tipo_ventana VALUES("1","Ventanal","El diseño sea ventanal."),
("2","Bascula","El diseño de tipo basculante, las ventanas de este estilo son las que giran en torno a un eje horizontal o vertical en el centro del marco."),
("3","Batiente","La ventana es de tipo batiente, se les denomina asi cuando la o las hojas se apoyan en los bordes con bisagras que sirven para que el eje de movimiento este en el marco"),
("4","Celosia","La ventana es de tipo celisia, este tipo de ventan formada por lamas horizontales que pivotan en un marco común de forma simultanea."),
("6","Panorámica","La ventana es de tipo panorámica estas ventanas agrandan visualmente el espacio, permiten entrada de mayor cantidad de luz, pueden proyectarse hacia afuera como mirador.");



DROP TABLE IF EXISTS titulo_supletorio;

CREATE TABLE `titulo_supletorio` (
  `id_titulo_supletorio` bigint(12) NOT NULL,
  `id_inmueble_usuario` bigint(12) NOT NULL,
  `numero_titulo` varchar(100) NOT NULL,
  `folio_titulo` int(11) NOT NULL,
  `tomo_titulo` int(11) NOT NULL,
  `protocolo_titulo` int(11) NOT NULL,
  `fecha_titulo` varchar(100) NOT NULL,
  `tipo_titulo` int(5) NOT NULL,
  PRIMARY KEY (`id_titulo_supletorio`),
  KEY `id_propietario` (`id_inmueble_usuario`),
  CONSTRAINT `TituU-I` FOREIGN KEY (`id_inmueble_usuario`) REFERENCES `inmueble_usuario` (`id_inmueble_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO titulo_supletorio VALUES("82857228","32","42343434","0","0","0","2016-01-06","1"),
("83511982","31","45574","0","0","0","2017-11-04","1");



DROP TABLE IF EXISTS topografia_inmueble;

CREATE TABLE `topografia_inmueble` (
  `id_topografia` int(11) NOT NULL,
  `tipo_t` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_topografia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO topografia_inmueble VALUES("1","Plano","Terreno que es plana o con poca altibajos con relacion a la calzada de acceso."),
("2","Sobre Nivel","Terreno que se encuentra por encima de plano definido por la calzada de acceso."),
("3","Bajo Nivel","Terreno se Encuentra por debajo del definido por la calzada del acceso."),
("4","Corte","Terreno sometido a un movimiento de tierra para lograr su mejor aprovechamiento. Corte realizado remueve el terreno natural que se encuebtra por encima de la calzada de acceso."),
("5","Relleno","La parcela se le adiciona un agregado de material elevado su nivel."),
("6","Inclinado","Terreno presenta pendientes"),
("7","Irregular","Terreno que presenta irregularidades en el relieve como ejemplo: Pequeño Valles, Ligeramente Plano, Ligeramente Inclinaciones muy abrutas, etc.");



DROP TABLE IF EXISTS ubicacion_inmueble_y;

CREATE TABLE `ubicacion_inmueble_y` (
  `id_ubicacion_inmueble_y` int(14) NOT NULL AUTO_INCREMENT,
  `tipo_ubicacion_y` varchar(10) NOT NULL,
  `descripcion_ubicacion_y` varchar(200) NOT NULL,
  PRIMARY KEY (`id_ubicacion_inmueble_y`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO ubicacion_inmueble_y VALUES("1","Av","Avenida "),
("2","Clle","Calle"),
("3","Crr","Carril"),
("4","Trav","Transversal"),
("5","Prol","Prolongacion"),
("6","Crrt","Carretera"),
("7","Cjn","Callejon"),
("8","Psje","Pasaje"),
("9","Blv","Boolevar"),
("10","Vda","Vereda"),
("11","Esc","Escalera"),
("12","Snd","Senderos"),
("13","Tcal","Troncal"),
("14","Cno","Conuno");



DROP TABLE IF EXISTS usuario;

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
  `estado` int(5) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuario VALUES("12523580","12523580","Kenia Reveca","Armas Miranda","Kram0129","61ba8dc1e82fa20a5882a65da642c1512bb4ea187bff980617b571a95b98b2d6","$2y$10$XGiFFxJHvVfSLK.wf4mj5.iRcwogeDhLr1OYGZ5vegMHQxHaHqk0O","2006-04-06","4","1","lkjdsfjfsh","leonarmasprint@gmail.com","1"),
("21272431","0","Aldo","Moreno","aldmor","596dfc0c625d86e4b72304e7ae80f7ab9e675568719563f9755f368b55c4e17a","$2y$10$HP/TEMhEt/niiFl47TANfOfEJpobOLZsQPCZDMXuAFo1kGrYPAPsi","0000-00-00","7","1","caña de azucar","aldoaloy@gmail.com","1"),
("27536109","0","Valeria","Leon","Valeria65","5dd68879e185be9e5cc6fceeb00d08c06f6a1979f3ab90bb5f4552de0f0dc037","$2y$10$SfuUL1PX3LjvNk8o8PRajuwHR7K9QFTo633z40m04Wr.Sp4EUh.MO","2000-06-16","7","1","dfasdasdasd","angel@gmail.com","1"),
("29772294","0","Angel Rafael","Leon Armas","angel25","140dde5979a9b76cee9cebe395527173f7c4457b26e5e8705cc10048e6920d7b","$2y$10$5bo3eR3H5rzrv0pdAEsEse6eeEzZFoXKy9OUddC/D6vRV.cxXuIPK","0000-00-00","7","1","Caña de Azucar Sector4","angelleonarmas23@gmial.com","1"),
("275631092","27563109","Valeria","Leon","Valeria25","beec69355c910fad66a0aa32624ce2166a7991b6da7f69f56e3c43c54b12312312","$2y$10$mer/z5/vdMeWxFy1lqYuQOSAJG9D/8enaeQdwAXiABEfuFb1shWNa","2000-06-16","2","2","dasdasdasd","angel@gmail.com","2"),
("297722942","29772294","AngelLeon","Leon Armas","angel65","beec69355c910fad66a0aa32624ce2166a7991b6da7f69f56e3c43c54b8cf5c2","$2y$10$M9tQyw0hX22lHVMHk4T28OCSVDkJWFCLVVgEwX4JKazrmueLDByB6","2003-02-19","1","2","Caña de Azucar Sector4","angelleonarmas23@gmail.com","1");



DROP TABLE IF EXISTS usuario_data;

CREATE TABLE `usuario_data` (
  `id_data_usuario` bigint(12) NOT NULL AUTO_INCREMENT,
  `id_usuarios` bigint(12) NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `id_seguridad` bigint(12) NOT NULL,
  PRIMARY KEY (`id_data_usuario`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_nivel` (`id_nivel`),
  KEY `id_seguridad` (`id_seguridad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




DROP TABLE IF EXISTS usuarios_conectados;

CREATE TABLE `usuarios_conectados` (
  `id_usuario` bigint(12) NOT NULL,
  `token` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuarios_conectados VALUES("297722942","beec69355c910fad66a0aa32624ce2166a7991b6da7f69f56e3c43c54b8cf5c2","angel65","1");



DROP TABLE IF EXISTS valoracion_construccion;

CREATE TABLE `valoracion_construccion` (
  `id_valoracion_construccion` bigint(12) NOT NULL,
  `factor_construccion` int(11) NOT NULL,
  `tipologia_construccion` varchar(11) NOT NULL,
  `alicuota_construccion` float NOT NULL,
  PRIMARY KEY (`id_valoracion_construccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO valoracion_construccion VALUES("74505712","40","D","0.5"),
("76629948","50","C","0.5");



DROP TABLE IF EXISTS valoracion_terreno;

CREATE TABLE `valoracion_terreno` (
  `id_valoracion_terreno` bigint(20) NOT NULL,
  `facto_terreno` int(11) NOT NULL,
  `tipologia_terreno` varchar(11) NOT NULL,
  `alicuota_terreno` float NOT NULL,
  PRIMARY KEY (`id_valoracion_terreno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO valoracion_terreno VALUES("74505712","10","A","0.75"),
("76629948","3","D2","0.75");



DROP TABLE IF EXISTS ventana;

CREATE TABLE `ventana` (
  `id_ventana` bigint(11) NOT NULL AUTO_INCREMENT,
  `ventana_totales` varchar(200) NOT NULL,
  `cantidad_ventana` int(11) NOT NULL,
  `codigo_ventana` int(11) NOT NULL,
  PRIMARY KEY (`id_ventana`)
) ENGINE=InnoDB AUTO_INCREMENT=29772294203 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO ventana VALUES("23448489","2# Bascula","1","2"),
("39261115","3# Batiente","1","3"),
("90278483","3# Batiente","1","3");



