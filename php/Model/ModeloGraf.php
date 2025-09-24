<?php

class ModeloGraf extends baseData
{

	/*Insertar Avaluo*/
	public static function GrafInmueble()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT * FROM inmueble WHERE inmueble.estado_inmueble = 4");
			$sql->execute();

			return $sql->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {

			return 0;
		}
	}

	public static function GrafContrato()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
			INNER JOIN contrato_datos ON contrato_datos.id_inmueble = inmueble_usuario.id_inmueble_usuario
			 WHERE inmueble.estado_inmueble = 4");
			$sql->execute();

			return $sql->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {

			return 0;
		}
	}

	public static function GrafInmuebleTitulo()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT COUNT(*) FROM inmueble 
			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = inmueble.id_inmueble
			INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			WHERE inmueble.estado_inmueble >= 4");
			$sql->execute();
			return $sql->fetchColumn();

		} catch (PDOException $e) {

			return 0;
		}

	}

	public static function GrafInmuebleFicha()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT COUNT(*) FROM inmueble 
			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
			INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN constacia_catastral ON constacia_catastral.id_componentes = componente_ficha.id_componente
			WHERE inmueble.estado_inmueble >= 4");
			$sql->execute();
			return $sql->fetchColumn();

		} catch (PDOException $e) {

			return 0;
		}

	}


	public static function GrafCita()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT DATE_FORMAT(citas.fecha_otorgada, '%Y-%m-01') AS mes, COUNT(*) AS total FROM inmueble 
        INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
        INNER JOIN solicitud ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
        INNER JOIN citas ON citas.id_solicitud = solicitud.id_solicitud 
        WHERE inmueble.estado_inmueble >= 4 AND solicitud.estado_solicitud = 2");
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return [];
		}
	}

	public static function GrafAvaluo()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT DATE_FORMAT(avaluo.fecha_avaluo, '%Y-%m-01') AS mes, COUNT(*) AS total FROM inmueble 
        	INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
        	INNER JOIN avaluo ON avaluo.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario");
			$sql->execute();
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			return [];
		}
	}

	public static function GrafExtra()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT clase_inmueble FROM inmueble 
        	INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
        	INNER JOIN datos_inspeccion ON datos_inspeccion.id_datos_inspeccion = inmueble.id_inmueble
        	INNER JOIN dato_complementario_construccion ON dato_complementario_construccion.dato_complementario_construccion = datos_inspeccion.id_datos_complementario");
			$sql->execute();

			return $sql->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {
			return [];
		}
	}

	public static function GrafClase()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT clase_inmueble FROM inmueble 
        	INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
        	INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario");
			$sql->execute();

			return $sql->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {
			return [];
		}
	}

	public static function GrafInspeccion()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT clase_inmueble, DATE_FORMAT(inspeccion.fecha_inspeccion, '%Y-%m-01') AS mes, COUNT(*) AS total FROM inmueble 
        	INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
        	INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario");
			$sql->execute();

			return $sql->fetchAll(PDO::FETCH_ASSOC);

		} catch (PDOException $e) {
			return [];
		}
	}

	public static function GrafInmuebleEmpa()
	{
		try {
			$sql = baseData::conexion()->prepare("SELECT COUNT(*) FROM inmueble 
			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
			INNER JOIN solicitud ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN empadronamiento ON empadronamiento.id_componentes = solicitud.id_solicitud
			WHERE inmueble.estado_inmueble >= 4");
			$sql->execute();
			return $sql->fetchColumn();

		} catch (PDOException $e) {

			return 0;
		}

	}

	/*Lista Soli Avaluo*/
	public static function listaSoliAvaluo($token)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		INNER JOIN sectores ON sectores.id_sectores = codigo_catastral.sector_catastral
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		WHERE inmueble.estado_inmueble >= 4 ORDER BY inmueble.id_inmueble DESC");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	/*Lista Avaluo*/
	public static function BuscarAvaluoModelo()
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
			INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
			INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario 
			INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos


			INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN avaluo ON avaluo.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN valoracion_construccion ON valoracion_construccion.id_valoracion_construccion = avaluo.id_valoracion_economica 
			INNER JOIN valoracion_terreno ON valoracion_terreno.id_valoracion_terreno = avaluo.id_valoracion_economica

			
			INNER JOIN otro_datos ON otro_datos.id_otro_datos = inmueble.id_inmueble 
			INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
			INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
			INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
			INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion

			INNER JOIN tipo_porcentaje ON tipo_porcentaje.id_tipo_porcentaje = otro_datos.porcentage_refaccion
			INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
			INNER JOIN sectores ON sectores.id_sectores = codigo_catastral.sector_catastral	
			WHERE inmueble.estado_inmueble >= 4");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

}
