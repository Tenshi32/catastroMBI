<?php
require_once "basedata2.php";
class ModeloFicha extends baseData
{

	/*Registrar Ficha*/
	public static function InsertarFichaModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO constacia_catastral (id_componentes, fecha_inscripcion, nro_inscripcion, fecha_actualizacion, clase_operacion, valor_inmueble, estado_ficha) 
		VALUES(:id_componentes, :fecha_inscripcion, :nro_inscripcion, :fecha_actualizacion, :clase_operacion, :valor_inmueble, :estado_ficha)");
		$sql->bindParam(":id_componentes", $datos['codigo']);
		$sql->bindParam(":fecha_inscripcion", $datos['dia']);
		$sql->bindParam(":nro_inscripcion", $datos['codigo']);
		$sql->bindParam(":fecha_actualizacion", $datos['dia']);
		$sql->bindParam(":clase_operacion", $datos['clases_operaciones']);
		$sql->bindParam(":valor_inmueble", $datos['valor_inmueble']);
		$sql->bindParam(":estado_ficha", $datos['estado']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public function ValorMoneda()
	{

		$sql1 = baseData::conexion()->prepare("SELECT * FROM tasa_moneda 
		WHERE estado_moneda = 1");
		$sql1->execute();

		return $sql1->fetch(PDO::FETCH_ASSOC);

	}

	/*Consulta de Constancia Catastral*/
	public static function BuscarConstanciaCatastralModelo($id_ususario)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario 
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos 
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN constacia_catastral ON constacia_catastral.id_componentes = componente_ficha.id_componente
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		
		WHERE usuario.id_usuario = $id_ususario");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	/*Consulta de Constancia Catastral
	
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble.id_inmueble 
		INNER JOIN constacia_catastral ON constacia_catastral.id_componentes = inmueble_usuario.id_inmueble

		INNER JOIN avaluo ON avaluo.id_valoracion_economica = inmueble.id_inmueble 
		INNER JOIN valoracion_construccion ON valoracion_construccion.id_valoracion_construccion = inmueble.id_inmueble 
		INNER JOIN valoracion_terreno ON valoracion_terreno.id_valoracion_terreno = inmueble.id_inmueble
		INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble.id_inmueble
	*/
	public function ReporteConstanciaCatastralModelo($dato)
	{

		$moneda = $this->ValorMoneda();

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble 
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
				
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario 
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos 
		INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario 
		
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN constacia_catastral ON constacia_catastral.id_componentes = componente_ficha.id_componente
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario

		INNER JOIN avaluo ON avaluo.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN valoracion_construccion ON valoracion_construccion.id_valoracion_construccion = avaluo.id_valoracion_construccion
		INNER JOIN valoracion_terreno ON valoracion_terreno.id_valoracion_terreno = avaluo.id_valoracion_terreno

		WHERE inmueble.id_inmueble = $dato");
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_ASSOC);

			if($row['clase_inmueble'] == "Residencial"){

				$factor_construccion_c = "--";
				$factor_terreno_c = "--"; 
				$VIMPA_construccion_c = 0;
				$VIMPA_terreno_c = 0;
				
				$superficie_c_c = "--"; 
				$superficie_t_c = "--";
				
				$superficie_c_r = $row['superficie_c'];
				$superficie_t_r = $row['superficie_t'];

				$factor_construccion_r = $moneda['valor'] * $row['factor_construccion']; 
				$factor_terreno_r = $moneda['valor'] *  $row['facto_terreno']; 
				$VIMPA_construccion_r = $row['superficie_c'] *  $row['factor_construccion'] * 0.005;
				$VIMPA_terreno_r = $row['superficie_t'] *  $row['facto_terreno'] * 0.0075;

			}else if($row['clase_inmueble'] == "Comercial"){

				$factor_construccion_r= "--";
				$factor_terreno_r = "--"; 
				$VIMPA_construccion_r = 0;
				$VIMPA_terreno_r = 0;

				$superficie_c_c = $row['superficie_c']; 
				$superficie_t_c = $row['superficie_t']; 
				
				$superficie_c_r = "--";
				$superficie_t_r = "--";

				$factor_construccion_c = $moneda['valor'] * $row['factor_construccion']; 
				$factor_terreno_c = $moneda['valor'] *  $row['facto_terreno']; 
				$VIMPA_construccion_c = $row['superficie_c'] *  $row['factor_construccion'] * 0.01;
				$VIMPA_terreno_c = $row['superficie_t'] *  $row['facto_terreno'] * 0.01;

			}else{

				$factor_construccion_r = $moneda['valor'] * $row['factor_construccion']; 
				$factor_terreno_r = $moneda['valor'] *  $row['facto_terreno']; 
				$VIMPA_construccion_r = $row['superficie_c'] *  $row['factor_construccion'] * 0.005;
				$VIMPA_terreno_r = $row['superficie_t'] *  $row['facto_terreno'] * 0.0075;

				$superficie_c_r = $row['superficie_c'];
				$superficie_c_c = $row['superficie_c']; 

				$superficie_t_r = $row['superficie_t'];
				$superficie_t_c = $row['superficie_t']; 

				$factor_construccion_c = $moneda['valor'] * $row['factor_construccion']; 
				$factor_terreno_c = $moneda['valor'] *  $row['facto_terreno']; 
				$VIMPA_construccion_c = $row['superficie_c'] *  $row['factor_construccion'] * 0.01;
				$VIMPA_terreno_c = $row['superficie_t'] *  $row['facto_terreno'] *  0.01;
			}

			$tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

			$datos =
				array(
					//datos del cliente
					"id_propietario" => $row['id_usuario'],
					"id_ficha" => $row['id_ficha'],
					"valor" => $moneda['valor'],
					"nombre_usuario" => $row['nombre'],
					"apellido_usuario" => $row['apellido'],
					"inmueble" => $row['id_inmueble'],
					"id_direccion_inmueble" => $row['id_direccion_inmueble'],
					"n_civico" => $row['n_civico'],

					"clase_operacion" => $row['clase_operacion'],
					"fecha_actualizacion" => $row['fecha_actualizacion'],
					"fecha_inscripcion" => $row['fecha_inscripcion'],
					"nro_inscripcion" => $row['nro_inscripcion'],

					"numero_titulo" => $row['numero_titulo'],
					"folio_titulo" => $row['folio_titulo'],
					"tomo_titulo" => $row['tomo_titulo'],
					"protocolo_titulo" => $row['protocolo_titulo'],
					"fecha_titulo" => $row['fecha_titulo'],

					"tenencia" => $tenencia,
					"norte_lindero" => $row['norte_lindero'],
					"norte_medida" => $row['norte_medida'],
					"este_lindero" => $row['este_lindero'],
					"este_medida" => $row['este_medida'],
					"oeste_lindero" => $row['oeste_lindero'],
					"oeste_medida" => $row['oeste_medida'],
					"sur_lindero" => $row['sur_lindero'],
					"sur_medida" => $row['sur_medida'],

					"parroquia_catastral" => $row['parroquia_catastral'],
					"sector_catastral" => $row['sector_catastral'],
					"manzana_catastral" => $row['manzana_catastral'],
					"parcela_catastral" => $row['parcela_catastral'],

					"superficie_c_r" => $superficie_c_r,
					"superficie_c_c" => $superficie_c_c,
					"superficie_t_r" => $superficie_t_r,
					"superficie_t_c" => $superficie_t_c,

					"superficie_c" => $row['superficie_c'],
					"superficie_t" => $row['superficie_t'],

					"fc_construccion_c" => $factor_construccion_c,
					"VIMPA_construccion_c" => $VIMPA_construccion_c,

					"fc_construccion_r" => $factor_construccion_r,
					"VIMPA_construccion_r" => $VIMPA_construccion_r,

					"fc_terreno_c" => $factor_terreno_c,
					"VIMPA_terreno_c" => $VIMPA_terreno_c,
					"fc_terreno_r" => $factor_terreno_r,
					"VIMPA_terreno_r" => $VIMPA_terreno_r,

					"depresiacion" => $row['depresiacion'],
					"observacion" => $row['observacion_avaluo'],

					"parroquia" => $row['parroquia'],
					"residencia" => $row['residencia'],
					"lugar_inmueble" => $row['lugar_inmueble'],
					"descripcion_lugar" => $row['descripcion_lugar'],

					"ubicacion_inmueble_entre" => $row['ubicacion_inmueble_entre'],
					"descripcion_e" => $row['descripcion_ubicacion_entre'],
					"ubicacion_inmueble_y" => $row['ubicacion_inmueble_y'],
					"descripcion_y" => $row['descripcion_ubicacion_y'],

					"punto_referencia" => $row['punto_referencia'],
					"estado_inmueble" => $row['estado_inmueble'],
				);

		return $datos;

	}

	public function ReporteComprobanteCatastralModelo($dato)
	{

		$moneda = $this->ValorMoneda();

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble 
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
				
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario 
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos 

		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN constacia_catastral ON constacia_catastral.id_componentes = componente_ficha.id_componente
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral

		WHERE inmueble.id_inmueble = $dato");
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_ASSOC);

			
			$tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";
			$parroquia = ($row['parroquia_catastral'] == 002) ? "LIMÓN" : "CAÑA DE AZÚCAR";

			$datos =
				array(
					//datos del cliente
					"id_propietario" => $row['id_usuario'],
					"id_ficha" => $row['id_ficha'],
					"valor" => $moneda['valor'],
					"nombre_usuario" => $row['nombre'],
					"apellido_usuario" => $row['apellido'],
					"inmueble" => $row['id_inmueble'],
					"id_direccion_inmueble" => $row['id_direccion_inmueble'],
					"n_civico" => $row['n_civico'],

					"clase_operacion" => $row['clase_operacion'],
					"fecha_actualizacion" => $row['fecha_actualizacion'],
					"fecha_inscripcion" => $row['fecha_inscripcion'],
					"nro_inscripcion" => $row['nro_inscripcion'],

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
					"parroquia_catastral" => $row['parroquia_catastral'],
					"sector_catastral" => $row['sector_catastral'],
					"manzana_catastral" => $row['manzana_catastral'],
					"parcela_catastral" => $row['parcela_catastral'],

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

}