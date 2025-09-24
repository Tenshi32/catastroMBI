<?php
require_once "basedata2.php";
class ModeloRTT extends baseData
{

	public static function InsertarRttModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO regulacion_tt (id_regulacion_tt, id_datos_rtt, estado_civil, fecha, razon) 
		VALUES(:id_regulacion_tt, :id_datos_rtt, :estado_civil, :fecha, :razon)");

		$sql->bindParam(":id_regulacion_tt", $datos['codigo']);
		$sql->bindParam(":id_datos_rtt", $datos['codigo']);
		$sql->bindParam(":estado_civil", $datos['estado_civil']);
		$sql->bindParam(":fecha", $datos['dia']);
		$sql->bindParam(":razon", $datos['razon_solicitud']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	public static function InsertarDatosRttModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO datos_rtt (id_datos_rtt, id_usurio_inmueble, id_am, id_cr, id_sd, id_ds, id_uh, id_funcionario) 
		VALUES(:id_datos_rtt, :id_usurio_inmueble, :id_am, :id_cr, :id_sd, :id_ds, :id_uh, :id_funcionario)");

		$sql->bindParam(":id_datos_rtt", $datos['codigo']);
		$sql->bindParam(":id_usurio_inmueble", $datos['inmueble']);
		$sql->bindParam(":id_am", $datos['codigo']);

		$sql->bindParam(":id_cr", $datos['codigo']);
		$sql->bindParam(":id_sd", $datos['codigo']);
		$sql->bindParam(":id_ds", $datos['codigo']);
		$sql->bindParam(":id_uh", $datos['codigo']);
		$sql->bindParam(":id_funcionario", $datos['codigo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	public static function InsertarActaMatrimonio($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO acta_matrinomio (id_acta_matrimonio, n_am, tomo_am, folio_am, fecha_am) 
		VALUES(:id_acta_matrimonio, :n_am, :tomo_am, :folio_am, :fecha_am)");

		$sql->bindParam(":id_acta_matrimonio", $datos['codigo']);
		$sql->bindParam(":n_am", $datos['n_acta_AM']);
		$sql->bindParam(":tomo_am", $datos['tomo_AM']);
		$sql->bindParam(":folio_am", $datos['folio_AM']);
		$sql->bindParam(":fecha_am", $datos['fecha_acta_AM']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function InsertarSentenciaDeDivorcio($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO sentencia_divorcio (id_sentencia_divorcio, n_sd, tomo_sd, folio_sd, fecha_sd) 
		VALUES(:id_sentencia_divorcio, :n_sd, :tomo_sd, :folio_sd, :fecha_sd)");

		$sql->bindParam(":id_sentencia_divorcio", $datos['codigo']);
		$sql->bindParam(":n_sd", $datos['n_acta_SD']);
		$sql->bindParam(":tomo_sd", $datos['tomo_SD']);
		$sql->bindParam(":folio_sd", $datos['folio_SD']);
		$sql->bindParam(":fecha_sd", $datos['fecha_acta_SD']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function InsertarCartaDeResidencia($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO carta_residencia (id_cr, nombre_cr, direccion_cr, telf_cr, fecha_cr) 
		VALUES(:id_cr, :nombre_cr, :direccion_cr, :telf_cr, :fecha_cr)");

		$sql->bindParam(":id_cr", $datos['codigo']);
		$sql->bindParam(":nombre_cr", $datos['nombre_cc']);
		$sql->bindParam(":direccion_cr", $datos['direccion_cc']);
		$sql->bindParam(":telf_cr", $datos['telefono_cc']);
		$sql->bindParam(":fecha_cr", $datos['fecha_emision']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function InsertarDeclaracionSucesoral($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO declaracion_sucesoral (id_ds, rif_sucesoral, descripcion_ds, fecha_ds) 
		VALUES(:id_ds, :rif_sucesoral, :descripcion_ds, :fecha_ds)");

		$sql->bindParam(":id_ds", $datos['codigo']);
		$sql->bindParam(":rif_sucesoral", $datos['rif_DS']);
		$sql->bindParam(":descripcion_ds", $datos['descripcion_DS']);
		$sql->bindParam(":fecha_ds", $datos['fecha_DS']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function InsertarUnionHechos($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO union_hechos (id_union_hechos, folio_UH, n_acta_UH, fecha_acta_UH, anno_union) 
		VALUES(:id_union_hechos, :folio_UH, :n_acta_UH, :fecha_acta_UH, :anno_union)");

		$sql->bindParam(":id_union_hechos", $datos['codigo']);
		$sql->bindParam(":folio_UH", $datos['folio_UH']);
		$sql->bindParam(":n_acta_UH", $datos['n_acta_UH']);
		$sql->bindParam(":fecha_acta_UH", $datos['fecha_acta_UH']);
		$sql->bindParam(":anno_union", $datos['anno_union']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function BuscarRTTModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM regulacion_tt
			INNER JOIN datos_rtt ON datos_rtt.id_datos_rtt = regulacion_tt.id_datos_rtt
			INNER JOIN acta_matrinomio ON acta_matrinomio.id_acta_matrimonio = datos_rtt.id_am
			INNER JOIN carta_residencia ON carta_residencia.id_cr = datos_rtt.id_cr 
			INNER JOIN declaracion_sucesoral ON declaracion_sucesoral.id_ds = datos_rtt.id_ds
			INNER JOIN sentencia_divorcio ON sentencia_divorcio.id_sentencia_divorcio = datos_rtt.id_sd
			INNER JOIN union_hechos ON union_hechos.id_union_hechos = datos_rtt.id_uh

			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = datos_rtt.id_usurio_inmueble
			INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
			
			INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
			INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
			INNER JOIN linderos ON inmueble_usuario.id_linderos = linderos.id_linderos

			INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
			INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
			INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
			INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion	
			
			INNER JOIN solicitud ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			WHERE usuario.id_usuario = $dato AND (tipo_solicitud = 7 AND estado_solicitud = 2)");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public static function CertificadoRTTModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM regulacion_tt
			INNER JOIN datos_rtt ON datos_rtt.id_datos_rtt = regulacion_tt.id_datos_rtt
			INNER JOIN acta_matrinomio ON acta_matrinomio.id_acta_matrimonio = datos_rtt.id_am
			INNER JOIN carta_residencia ON carta_residencia.id_cr = datos_rtt.id_cr 
			INNER JOIN declaracion_sucesoral ON declaracion_sucesoral.id_ds = datos_rtt.id_ds
			INNER JOIN sentencia_divorcio ON sentencia_divorcio.id_sentencia_divorcio = datos_rtt.id_sd
			INNER JOIN union_hechos ON union_hechos.id_union_hechos = datos_rtt.id_uh

			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = datos_rtt.id_usurio_inmueble
			INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
			
			INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
			INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
			INNER JOIN linderos ON inmueble_usuario.id_linderos = linderos.id_linderos

			INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
			INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
			INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
			INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion	
			
			WHERE inmueble.id_inmueble = $dato");
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_ASSOC);

		$tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";
		$parroquia = ($row['parroquia'] == 002) ? "LIMÓN" : "CAÑA DE AZÚCAR";

		$datos =
			array(
				//datos del cliente
				"id_propietario" => $row['id_usuario'],
				"nombre_usuario" => $row['nombre'],
				"apellido_usuario" => $row['apellido'],
				"inmueble" => $row['id_inmueble'],
				"id_direccion_inmueble" => $row['id_direccion_inmueble'],
				"n_civico" => $row['n_civico'],

				"tenencia" => $tenencia,
				"norte_lindero" => $row['norte_lindero'],
				"norte_medida" => $row['norte_medida'],
				"este_lindero" => $row['este_lindero'],
				"este_medida" => $row['este_medida'],
				"oeste_lindero" => $row['oeste_lindero'],
				"oeste_medida" => $row['oeste_medida'],
				"sur_lindero" => $row['sur_lindero'],
				"sur_medida" => $row['sur_medida'],

				"parroquia_n" => $parroquia,

				"parroquia" => $row['parroquia'],
				"residencia" => $row['residencia'],
				"lugar_inmueble" => $row['lugar_inmueble'],
				"descripcion_lugar" => $row['descripcion_lugar'],

				"ubicacion_entre_tipo" => $row['id_ubicacion_inmueble_entre'],
				"ubicacion_entre_text" => $row['ubicacion_inmueble_entre'],
				"descripcion_contruccion" => $row['descripcion_contruccion'],
				"descripcion_ubicacion_entre" => strtoupper($row['descripcion_ubicacion_entre']),

				"ubicacion_y_tipo" => $row['id_ubicacion_inmueble_y'],
				"ubicacion_y_text" => $row['ubicacion_inmueble_y'],
				"descripcion_ubicacion_y" => strtoupper($row['descripcion_ubicacion_y']),

				"medida_inmueble" => $row['medida_inmueble'],
				"valor_inmueble" => $row['valor_inmueble'],

				"punto_referencia" => $row['punto_referencia'],
				"estado_inmueble" => $row['estado_inmueble'],
			);

		return $datos;

	}

	public static function ListaSoliXModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		WHERE estado_solicitud = 1 AND tipo_solicitud = $dato ORDER BY solicitud.fecha_solicitud DESC");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public static function SoliRTTModelo()
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM regulacion_tt
			INNER JOIN datos_rtt ON datos_rtt.id_datos_rtt = regulacion_tt.id_datos_rtt
			INNER JOIN acta_matrinomio ON acta_matrinomio.id_acta_matrimonio = datos_rtt.id_am
			INNER JOIN carta_residencia ON carta_residencia.id_cr = datos_rtt.id_cr 
			INNER JOIN declaracion_sucesoral ON declaracion_sucesoral.id_ds = datos_rtt.id_ds
			INNER JOIN sentencia_divorcio ON sentencia_divorcio.id_sentencia_divorcio = datos_rtt.id_sd
			INNER JOIN union_hechos ON union_hechos.id_union_hechos = datos_rtt.id_uh

			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = datos_rtt.id_usurio_inmueble
			INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
			INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
			INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
			INNER JOIN linderos ON inmueble_usuario.id_linderos = linderos.id_linderos

			INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
			INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
			INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
			INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion	
			
			INNER JOIN solicitud ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			WHERE inmueble.estado_inmueble >= 4 AND (tipo_solicitud = 7 AND estado_solicitud = 1)");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

}
