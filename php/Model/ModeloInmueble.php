<?php

require_once "basedata2.php";

class ModeloInmueble extends baseData
{

	/*Registro de InmuebleUsuario*/
	public static function InsertarInmuebleUsuarioModelo($datos)
	{
		$dato_inmueble = $datos['codigo'];

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble_usuario WHERE id_inmueble = $dato_inmueble");
		$sql->execute();

		$result = $sql->rowCount();

		if ($result > 0) {

			return null;

		} else {

			$sql = baseData::conexion()->prepare("INSERT INTO inmueble_usuario (id_usuario, id_inmueble, id_linderos)
			VALUES(:id_usuario, :id_inmueble, :id_linderos)");

			$sql->bindParam(":id_usuario", $datos['cedula']);
			$sql->bindParam(":id_inmueble", $datos['codigo']);
			$sql->bindParam(":id_linderos", $datos['codigo']);

			ModeloInmueble::InsertarDireccionInmuebleModelo($datos);
			ModeloInmueble::InsertarDatosLinderosModelo($datos);
			ModeloInmueble::InsertarInmuebleModelo($datos);

			if ($sql->execute()) {

				return true;

			} else {

				return false;

			}

		}


	}

	/*Registro de DatosInmuebles*/
	public static function InsertarInmuebleModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO inmueble (id_inmueble, id_direccion_inmueble, parroquia, residencia, nombre_inmueble, n_civico, telefono_inmueble, medida_inmueble, valor_inmueble, punto_referencia, tenencia_inmueble, descripcion_inmueble, estado_inmueble)
		VALUES(:id_inmueble, :id_direccion_inmueble, :parroquia, :residencia, :nombre_inmueble, :n_civico, :telefono_inmueble, :medida_inmueble, :valor_inmueble, :punto_referencia, :tenencia_inmueble, :descripcion_inmueble, :estado_inmueble)");

		$sql->bindParam(":id_inmueble", $datos['codigo']);
		$sql->bindParam(":id_direccion_inmueble", $datos['codigo']);
		$sql->bindParam(":parroquia", $datos['parroquia']);
		$sql->bindParam(":residencia", $datos['residencia']);

		$sql->bindParam(":nombre_inmueble", $datos['nombre_inmueble']);
		$sql->bindParam(":n_civico", $datos['n_civico']);
		$sql->bindParam(":telefono_inmueble", $datos['numero_inmueble']);
		$sql->bindParam(":medida_inmueble", $datos['medida_inmueble']);
		$sql->bindParam(":valor_inmueble", $datos['valor_inmueble']);
		$sql->bindParam(":punto_referencia", $datos['punto_referencia']);
		$sql->bindParam(":tenencia_inmueble", $datos['tipo_registro']);
		$sql->bindParam(":descripcion_inmueble", $datos['descripcion_inmueble']);
		$sql->bindParam(":estado_inmueble", $datos['status']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	/*Registro de DireccionInmuebles*/
	public static function InsertarDireccionInmuebleModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO direccion_inmueble (id_direccion_inmueble, id_lugar_inmueble, id_ubicacion_inmueble_entre, id_ubicacion_inmueble_y, id_tipo_construccion, lugar_inmueble, ubicacion_inmueble_entre, ubicacion_inmueble_y)
		VALUES(:id_direccion_inmueble, :id_lugar_inmueble, :id_ubicacion_inmueble_entre, :id_ubicacion_inmueble_y, :id_tipo_construccion, :lugar_inmueble, :ubicacion_inmueble_entre, :ubicacion_inmueble_y)");

		$sql->bindParam(":id_direccion_inmueble", $datos['codigo']);

		$sql->bindParam(":id_lugar_inmueble", $datos['lugar_inmuble_tipo']);
		$sql->bindParam(":id_ubicacion_inmueble_entre", $datos['ubicacion_entre_tipo']);
		$sql->bindParam(":id_ubicacion_inmueble_y", $datos['ubicacion_y_tipo']);
		$sql->bindParam(":id_tipo_construccion", $datos['tipo_construccion_tipo']);

		$sql->bindParam(":lugar_inmueble", $datos['lugar_inmuble_text']);
		$sql->bindParam(":ubicacion_inmueble_entre", $datos['ubicacion_entre_text']);
		$sql->bindParam(":ubicacion_inmueble_y", $datos['ubicacion_y_text']);


		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Registro de DatosLinderos*/
	public static function InsertarDatosLinderosModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO linderos (id_linderos, norte_lindero, norte_medida, este_lindero , este_medida, oeste_lindero, oeste_medida ,sur_lindero, sur_medida, entrada_lindero)
			VALUES(:id_linderos, :norte_lindero, :norte_medida, :este_lindero , :este_medida, :oeste_lindero, :oeste_medida , :sur_lindero, :sur_medida, :entrada_lindero)");
		$sql->bindParam(":id_linderos", $datos['codigo']);
		$sql->bindParam(":norte_lindero", $datos['norte_descripcion']);
		$sql->bindParam(":norte_medida", $datos['norte_medida']);
		$sql->bindParam(":sur_lindero", $datos['sur_descripcion']);
		$sql->bindParam(":sur_medida", $datos['sur_medida']);
		$sql->bindParam(":este_lindero", $datos['este_descripcion']);
		$sql->bindParam(":este_medida", $datos['este_medida']);
		$sql->bindParam(":oeste_lindero", $datos['oeste_descripcion']);
		$sql->bindParam(":oeste_medida", $datos['oeste_medida']);
		$sql->bindParam(":entrada_lindero", $datos['entrada_lindero']);


		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public static function InmuebleSelectAccion($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		INNER JOIN sectores ON sectores.id_sectores = codigo_catastral.sector_catastral
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN datos_inspeccion ON datos_inspeccion.id_datos_inspeccion = inmueble_usuario.id_inmueble
		INNER JOIN dato_complementario_construccion ON dato_complementario_construccion.id_dato_complementario_construccion = datos_inspeccion.id_datos_complementario
		WHERE inmueble.id_inmueble = $dato");
		$sql->execute();

		return $result = $sql->fetch(PDO::FETCH_ASSOC);

	}

	/* consulta cliente*/
	public static function ConsultaInmueble($dato_usuario)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble

		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
				
		WHERE inmueble_usuario.id_usuario = $dato_usuario ORDER BY inmueble.id_inmueble DESC");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	/*Registro de DatosInmuebles*/
	public static function UpdateInmuebleModelo($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE inmueble 
		SET parroquia = :parroquia, residencia = :residencia, nombre_inmueble = :nombre_inmueble, n_civico = :n_civico, 
		telefono_inmueble = :telefono_inmueble, medida_inmueble = :medida_inmueble, valor_inmueble = :valor_inmueble, punto_referencia = :punto_referencia, 
		tenencia_inmueble = :tenencia_inmueble, descripcion_inmueble = :descripcion_inmueble
		WHERE id_inmueble = :id_inmueble");

		$sql->bindParam(":id_inmueble", $datos['id_inmueble']);
		$sql->bindParam(":parroquia", $datos['parroquia']);
		$sql->bindParam(":residencia", $datos['residencia']);
		$sql->bindParam(":nombre_inmueble", $datos['nombre_inmueble']);
		$sql->bindParam(":n_civico", $datos['n_civico']);
		$sql->bindParam(":telefono_inmueble", $datos['numero_inmueble']);
		$sql->bindParam(":medida_inmueble", $datos['medida_inmueble']);
		$sql->bindParam(":valor_inmueble", $datos['valor_inmueble']);
		$sql->bindParam(":punto_referencia", $datos['punto_referencia']);
		$sql->bindParam(":tenencia_inmueble", $datos['tipo_registro']);
		$sql->bindParam(":descripcion_inmueble", $datos['descripcion_inmueble']);

		ModeloInmueble::UpdateDireccionInmuebleModelo($datos);
		ModeloInmueble::UpdateDatosLinderosModelo($datos);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	/*Registro de DireccionInmuebles*/
	public static function UpdateDireccionInmuebleModelo($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE direccion_inmueble 
		SET id_lugar_inmueble = :id_lugar_inmueble, id_ubicacion_inmueble_entre = :id_ubicacion_inmueble_entre, id_ubicacion_inmueble_y = :id_ubicacion_inmueble_y, id_tipo_construccion = :id_tipo_construccion, 
		lugar_inmueble = :lugar_inmueble, ubicacion_inmueble_entre = :ubicacion_inmueble_entre, ubicacion_inmueble_y = :ubicacion_inmueble_y
		WHERE id_direccion_inmueble = :id_direccion_inmueble");

		$sql->bindParam(":id_direccion_inmueble", $datos['id_inmueble']);
		$sql->bindParam(":id_lugar_inmueble", $datos['lugar_inmuble_tipo']);
		$sql->bindParam(":id_ubicacion_inmueble_entre", $datos['ubicacion_entre_tipo']);
		$sql->bindParam(":id_ubicacion_inmueble_y", $datos['ubicacion_y_tipo']);
		$sql->bindParam(":id_tipo_construccion", $datos['tipo_construccion_tipo']);

		$sql->bindParam(":lugar_inmueble", $datos['lugar_inmuble_text']);
		$sql->bindParam(":ubicacion_inmueble_entre", $datos['ubicacion_entre_text']);
		$sql->bindParam(":ubicacion_inmueble_y", $datos['ubicacion_y_text']);


		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Registro de DatosLinderos*/
	public static function UpdateDatosLinderosModelo($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE linderos 
		SET norte_lindero = :norte_lindero, norte_medida = :norte_medida, este_lindero = :este_lindero, este_medida = :este_medida, 
		oeste_lindero = :oeste_lindero, oeste_medida = :oeste_medida, sur_lindero = :sur_lindero, sur_medida = :sur_medida, entrada_lindero = :entrada_lindero
		WHERE id_linderos = :id_linderos");

		$sql->bindParam(":id_linderos", $datos['id_inmueble']);
		$sql->bindParam(":norte_lindero", $datos['norte_descripcion']);
		$sql->bindParam(":norte_medida", $datos['norte_medida']);
		$sql->bindParam(":sur_lindero", $datos['sur_descripcion']);
		$sql->bindParam(":sur_medida", $datos['sur_medida']);
		$sql->bindParam(":este_lindero", $datos['este_descripcion']);
		$sql->bindParam(":este_medida", $datos['este_medida']);
		$sql->bindParam(":oeste_lindero", $datos['oeste_descripcion']);
		$sql->bindParam(":oeste_medida", $datos['oeste_medida']);
		$sql->bindParam(":entrada_lindero", $datos['entrada_lindero']);


		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

}