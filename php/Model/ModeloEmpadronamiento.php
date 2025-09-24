<?php
require_once "basedata2.php";
class ModeloEmpadronamiento extends baseData
{

	public static function InsertarEmpadronamientoModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO empadronamiento (id_empadronamiento, id_componentes,	 id_datos_ocupante, estado_empadronamiento) 
		VALUES(:id_empadronamiento, :id_componentes, :id_datos_ocupante, :estado_empadronamiento)");

		$sql->bindParam(":id_empadronamiento", $datos['codigo']);
		$sql->bindParam(":id_componentes", $datos['codigo']);
		$sql->bindParam(":id_datos_ocupante", $datos['codigo']);
		$sql->bindParam(":estado_empadronamiento", $datos['estado_solicitud']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function InsertarOcupanteModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO datos_ocupantes (id_datos_ocupantes, ci_rif, nombre_ocupante, apellido_ocupante, telefono_ocupante) 
		VALUES(:id_datos_ocupantes, :ci_rif, :nombre_ocupante, :apellido_ocupante, :telefono_ocupante)");

		$sql->bindParam(":id_datos_ocupantes", $datos['codigo']);
		$sql->bindParam(":ci_rif", $datos['id_ocupante']);
		$sql->bindParam(":nombre_ocupante", $datos['nombre_ocupante']);
		$sql->bindParam(":apellido_ocupante", $datos['apellido_ocupante']);
		$sql->bindParam(":telefono_ocupante", $datos['Telefono_ocupante']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	/* buscador cliente*/
	public static function ConsultaSoliEmpaModelo()
	{

		$sql = baseData::conexion()->query("SELECT * FROM solicitud
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN datos_ocupantes ON datos_ocupantes.id_datos_ocupantes = solicitud.id_solicitud
		WHERE solicitud.tipo_solicitud = 2 AND inmueble.estado_inmueble = 2 ORDER BY id_solicitud DESC");

		return $sql->fetchAll();
		

	}

	/*Consulta de Certificado Empadronamiento*/
	public static function BuscarCertificadoEmpadronamientoModelo()
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
				INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
				INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
				INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario 
				INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
				INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
				INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
				INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario

				INNER JOIN avaluo ON avaluo.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
				INNER JOIN valoracion_construccion ON valoracion_construccion.id_valoracion_construccion = avaluo.id_valoracion_construccion
				INNER JOIN valoracion_terreno ON valoracion_terreno.id_valoracion_terreno = avaluo.id_valoracion_terreno

				INNER JOIN dato_general_construccion ON dato_general_construccion.id_dato_general_construccion = inmueble_usuario.id_inmueble
				INNER JOIN tipo_regimen ON tipo_regimen.id_tipo_regimen = dato_general_construccion.id_regimen_prioridad 
				
				INNER JOIN solicitud ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
				INNER JOIN empadronamiento ON empadronamiento.id_componentes = solicitud.id_solicitud
				WHERE inmueble.estado_inmueble = 4 AND (estado_solicitud = 2 AND tipo_solicitud = 2)");
		$sql->execute();

		return $result = $sql->fetchAll();
	}

	public function ReporteCertificadoEmpadronamientoModelo($datos)
	{
		$sql1 = baseData::conexion()->prepare("SELECT * FROM tasa_moneda
				WHERE estado_moneda = 1");
		$sql1->execute();

		$moneda = $sql1->fetch(PDO::FETCH_ASSOC);

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
				INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
				INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
				INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario 
				INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
				INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
				INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
				INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
				INNER JOIN datos_inspeccion ON datos_inspeccion.id_datos_inspeccion = inmueble_usuario.id_inmueble
				INNER JOIN tipo_escala ON tipo_escala.id_tipo_escala = datos_inspeccion.id_escala
				
				INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
				INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
				INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
				INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		
				INNER JOIN avaluo ON avaluo.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
				INNER JOIN valoracion_construccion ON valoracion_construccion.id_valoracion_construccion = avaluo.id_valoracion_construccion
				INNER JOIN valoracion_terreno ON valoracion_terreno.id_valoracion_terreno = avaluo.id_valoracion_terreno

				INNER JOIN dato_general_construccion ON dato_general_construccion.id_dato_general_construccion = inmueble_usuario.id_inmueble
				INNER JOIN tipo_regimen ON tipo_regimen.id_tipo_regimen = dato_general_construccion.id_regimen_prioridad 
				INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario

				INNER JOIN solicitud ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
				INNER JOIN empadronamiento ON empadronamiento.id_componentes = solicitud.id_solicitud
				INNER JOIN datos_ocupantes ON datos_ocupantes.id_datos_ocupantes = empadronamiento.id_datos_ocupante
				WHERE inmueble.id_inmueble = $datos");
		$sql->execute();

		$row = $sql->fetch();

		if ($row['clase_inmueble'] == "Residencial") {

			$factor_construccion_c = "--";
			$factor_terreno_c = "--";
			$VIMPA_construccion_c = 0;
			$VIMPA_terreno_c = 0;

			$superficie_c_c = "--";
			$superficie_t_c = "--";

			$superficie_c_r = $row['superficie_c'];
			$superficie_t_r = $row['superficie_t'];

			$factor_construccion_r = $moneda['valor'] * $row['factor_construccion'];
			$factor_terreno_r = $moneda['valor'] * $row['facto_terreno'];
			$VIMPA_construccion_r = $row['superficie_c'] * $row['factor_construccion'] * 0.005;
			$VIMPA_terreno_r = $row['superficie_t'] * $row['facto_terreno'] * 0.0075;

		} else if ($row['clase_inmueble'] == "Comercial") {

			$factor_construccion_r = "--";
			$factor_terreno_r = "--";
			$VIMPA_construccion_r = 0;
			$VIMPA_terreno_r = 0;

			$superficie_c_c = $row['superficie_c'];
			$superficie_t_c = $row['superficie_t'];

			$superficie_c_r = "--";
			$superficie_t_r = "--";

			$factor_construccion_c = $moneda['valor'] * $row['factor_construccion'];
			$factor_terreno_c = $moneda['valor'] * $row['facto_terreno'];
			$VIMPA_construccion_c = $row['superficie_c'] * $row['factor_construccion'] * 0.01;
			$VIMPA_terreno_c = $row['superficie_t'] * $row['facto_terreno'] * 0.01;

		} else {

			$factor_construccion_r = $moneda['valor'] * $row['factor_construccion'];
			$factor_terreno_r = $moneda['valor'] * $row['facto_terreno'];
			$VIMPA_construccion_r = $row['superficie_c'] * $row['factor_construccion'] * 0.005;
			$VIMPA_terreno_r = $row['superficie_t'] * $row['facto_terreno'] * 0.0075;

			$superficie_c_r = $row['superficie_c'];
			$superficie_c_c = $row['superficie_c'];

			$superficie_t_r = $row['superficie_t'];
			$superficie_t_c = $row['superficie_t'];

			$factor_construccion_c = $moneda['valor'] * $row['factor_construccion'];
			$factor_terreno_c = $moneda['valor'] * $row['facto_terreno'];
			$VIMPA_construccion_c = $row['superficie_c'] * $row['factor_construccion'] * 0.01;
			$VIMPA_terreno_c = $row['superficie_t'] * $row['facto_terreno'] * 0.01;
		}

		$parroquia_catastral = ($row['parroquia_catastral'] == "001") ? "El Limon" : "Caña de Azucar";

		$datos =
			array(
				//datos del cliente
				"id_propietario" => $row['id_usuario'],
				"inmueble" => $row['id_inmueble'],
				"valor" => $moneda['valor'],
				"nombre_usuario" => $row['nombre'],
				"apellido_usuario" => $row['apellido'],
				"id_direccion_inmueble" => $row['id_direccion_inmueble'],
				"n_civico" => $row['n_civico'],

				"tipo_regimen" => $row['tipo_regimen'],

				"numero_titulo" => $row['numero_titulo'],
				"folio_titulo" => $row['folio_titulo'],
				"tomo_titulo" => $row['tomo_titulo'],
				"protocolo_titulo" => $row['protocolo_titulo'],
				"fecha_titulo" => $row['fecha_titulo'],

				"id_datos_ocupantes" => $row['id_datos_ocupantes'],
				"ci_rif" => $row['ci_rif'],
				"nombre_ocupante" => $row['nombre_ocupante'],
				"apellido_ocupante" => $row['apellido_ocupante'],
				"telefono_ocupante" => $row['telefono_ocupante'],

				"norte_lindero" => $row['norte_lindero'],
				"norte_medida" => $row['norte_medida'],
				"este_lindero" => $row['este_lindero'],
				"este_medida" => $row['este_medida'],
				"oeste_lindero" => $row['oeste_lindero'],
				"oeste_medida" => $row['oeste_medida'],
				"sur_lindero" => $row['sur_lindero'],
				"sur_medida" => $row['sur_medida'],
				"entrada_lindero" => $row['entrada_lindero'],

				"direccion" => $row['direccion'],

				"parroquia" => $parroquia_catastral,
				"parroquia_catastral" => $row['parroquia_catastral'],
				"sector_catastral" => $row['sector_catastral'],
				"manzana_catastral" => $row['manzana_catastral'],
				"parcela_catastral" => $row['parcela_catastral'],
				"subparcela_catastral" => $row['subparcela_catastral'],

				"fc_construccion_c" => $factor_construccion_c,
				"VIMPA_construccion_c" => $VIMPA_construccion_c,

				"fc_construccion_r" => $factor_construccion_r,
				"VIMPA_construccion_r" => $VIMPA_construccion_r,

				"fc_terreno_c" => $factor_terreno_c,
				"VIMPA_terreno_c" => $VIMPA_terreno_c,
				"fc_terreno_r" => $factor_terreno_r,
				"VIMPA_terreno_r" => $VIMPA_terreno_r,

				"superficie_c_r" => $superficie_c_r,
				"superficie_t_r" => $superficie_t_r,
				"superficie_c_c" => $superficie_c_c,
				"superficie_t_c" => $superficie_t_c,

				"depresiacion" => $row['depresiacion'],
				"observacion" => $row['observacion_avaluo'],

				"residencia" => $row['residencia'],
				"tipo_escala" => $row['tipo_escala'],
				"lugar_inmueble" => $row['lugar_inmueble'],

				"descripcion_lugar" => $row['descripcion_lugar'],
				"descripcion_e" => $row['descripcion_ubicacion_entre'],
				"descripcion_y" => $row['descripcion_ubicacion_y'],

				"ubicacion_inmueble_entre" => $row['ubicacion_inmueble_entre'],
				"ubicacion_inmueble_y" => $row['ubicacion_inmueble_y'],
				"punto_referencia" => $row['punto_referencia'],
				"estado_inmueble" => $row['estado_inmueble'],
			);

		return $datos;
	}
}