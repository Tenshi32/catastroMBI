<?php
require_once "basedata2.php";

class ModeloAvaluacion extends baseData
{

	/*Insertar Avaluo*/
	public static function InsertarValoracionEconomica($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO avaluo (id_valoracion_economica, id_inmueble_usuario, id_valoracion_terreno, id_valoracion_construccion, depresiacion, fecha_avaluo, observacion_avaluo) 
		VALUES(:id_valoracion_economica, :id_inmueble_usuario, :id_valoracion_terreno, :id_valoracion_construccion, :depresiacion, :fecha_avaluo, :observacion_avaluo)");
		$sql->bindParam(":id_valoracion_economica", $datos['codigo']);
		$sql->bindParam(":id_inmueble_usuario", $datos['inmueble_usuario']);
		$sql->bindParam(":id_valoracion_terreno", $datos['codigo']);
		$sql->bindParam(":id_valoracion_construccion", $datos['codigo']);
		$sql->bindParam(":depresiacion", $datos['depresiacion']);
		$sql->bindParam(":fecha_avaluo", $datos['dia']);
		$sql->bindParam(":observacion_avaluo", $datos['observacion_avaluo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}

	}

	public static function InsertarValoracionTerreno($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO valoracion_terreno(id_valoracion_terreno, facto_terreno, tipologia_terreno, alicuota_terreno) 
		VALUES(:id_valoracion_terreno, :facto_terreno, :tipologia_terreno, :alicuota_terreno)");
		$sql->bindParam(":id_valoracion_terreno", $datos['codigo']);
		$sql->bindParam(":tipologia_terreno", $datos['TipologiaTerreno']);
		$sql->bindParam(":facto_terreno", $datos['FactorTerreno']);
		$sql->bindParam(":alicuota_terreno", $datos['AlicuotaTerreno']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function InsertarValoracionConstruccion($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO valoracion_construccion(id_valoracion_construccion, factor_construccion, tipologia_construccion, alicuota_construccion) 
		VALUES(:id_valoracion_construccion, :factor_construccion, :tipologia_construccion, :alicuota_construccion)");
		$sql->bindParam(":id_valoracion_construccion", $datos['codigo']);
		$sql->bindParam(":factor_construccion", $datos['FactorConstruccion']);
		$sql->bindParam(":tipologia_construccion", $datos['TipologiaConstruccion']);
		$sql->bindParam(":alicuota_construccion", $datos['AlicuotaConstruccion']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}
	
	/*Actualizar Avaluo*/
	public static function UpdateValoracionEconomica($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE avaluo 
		SET depresiacion =:depresiacion, observacion_avaluo =:observacion_avaluo 
		WHERE id_valoracion_economica =:id_valoracion_economica");
		$sql->bindParam(":id_valoracion_economica", $datos['id_valoracion_economica']);
		$sql->bindParam(":depresiacion", $datos['depresiacion']);
		$sql->bindParam(":observacion_avaluo", $datos['observacion_avaluo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public static function UpdateValoracionTerreno($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE valoracion_terreno SET tipologia_terreno =:tipologia_terreno, facto_terreno =:facto_terreno, 
		alicuota_terreno =:alicuota_terreno 
		WHERE id_valoracion_terreno =:id_valoracion_terreno");
		$sql->bindParam(":id_valoracion_terreno", $datos['codigo']);
		$sql->bindParam(":tipologia_terreno", $datos['TipologiaTerreno']);
		$sql->bindParam(":facto_terreno", $datos['FactorTerreno']);
		$sql->bindParam(":alicuota_terreno", $datos['AlicuotaTerreno']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function UpdateValoracionConstruccion($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE valoracion_construccion SET factor_construccion =:factor_construccion, tipologia_construccion =:tipologia_construccion, 
		alicuota_construccion =:alicuota_construccion  
		WHERE id_valoracion_construccion =:id_valoracion_construccion");
		$sql->bindParam(":id_valoracion_construccion", $datos['codigo']);
		$sql->bindParam(":factor_construccion", $datos['FactorConstruccion']);
		$sql->bindParam(":tipologia_construccion", $datos['TipologiaConstruccion']);
		$sql->bindParam(":alicuota_construccion", $datos['AlicuotaConstruccion']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public static function ActualizarOtrosDatosModelo($datos)
	{

		$sql = baseData::conexion()->prepare("UPDATE otro_datos SET edad_efectiva =:edad_efectiva, porcentage_refaccion =:porcentage_refaccion WHERE id_otro_datos =:id_otro_datos");
		$sql->bindParam(":id_otro_datos", $datos['inmueble']);
		$sql->bindParam(":edad_efectiva", $datos['edad_efectiva']);
		$sql->bindParam(":porcentage_refaccion", $datos['refaccion']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

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
		WHERE inmueble.estado_inmueble >= 3 ORDER BY inmueble.id_inmueble DESC");
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

class Tabulacion
{

	public static $factor = 0;

	public static $FactorTerreno = 0;

	public static $FactorConstruccion = 0;

	public function AlicuotaAnualTerreno($value)
	{

		if ($value == "Mixto") {

			echo '
				<input type="text" class="form-control"
                      value="1,75%" readonly>
                    <input type="hidden" name="AlicuotaTerreno" id="AlicuotaTerreno" value="1.75">';

		} else if ($value == "Cormercial") {

			echo '
				<input type="text" class="form-control"
                      value="1%" readonly>
                    <input type="hidden" name="AlicuotaTerreno" id="AlicuotaTerreno" value="1">';

		} else {

			echo '
				<input type="text" class="form-control"
                      value="0,75%" readonly>
                    <input type="hidden" name="AlicuotaTerreno" id="AlicuotaTerreno" value="0.75">';

		}


	}

	public function AlicuotaAnualConstruccion($value)
	{

		if ($value == "Mixto") {

			echo '
				<input type="text" class="form-control"
                      value="1,5%" readonly>
                    <input type="hidden" name="AlicuotaConstruccion" id="AlicuotaConstruccion" value="1.5">';

		} else if ($value == "Cormercial") {

			echo '
				<input type="text" class="form-control"
                      value="1%" readonly>
                    <input type="hidden" name="AlicuotaConstruccion" id="AlicuotaConstruccion" value="1">';

		} else {

			echo '
				<input type="text" class="form-control"
                      value="0,75%" readonly>
                    <input type="hidden" name="AlicuotaConstruccion" id="AlicuotaConstruccion" value="0.5">';

		}


	}

	public function ResidencialCormercial($value)
	{

		$ResidencialCormercial = array(
			"A" => 10,
			"B" => 8,
			"C" => 6
		);

		if ($value["TipoUso"] == "Residencial" || $value["TipoUso"] == "Cormercial") {

			$this->factor += $ResidencialCormercial[$value["TipoAvaluo"]];

		} else {

			$this->TerrenoTamaño($value);

		}


	}

	public static function TerrenoTamaño($value)
	{

		$TerrenoTamaño = array(
			"A" => 10,
			"B" => 8,
			"C" => 6,
			"D1" => 3,
			"D2" => 3,
			"D3" => 2,
			"E1" => 2,
			"E2" => 1.5,
			"E3" => 1,
		);

		self::$FactorTerreno += $TerrenoTamaño[$value["TipologiaTerreno"]];

		return self::$FactorTerreno;

	}

	public function GMV_INAVI($value)
	{

		$GMVINAVI = array(
			"GMV" => 20,
			"INAVI" => 15,
		);

		if ($value["Extra"] == "GMV" || $value["Extra"] == "INAVI") {

			$this->factor += $GMVINAVI[$value["Extra"]];

		} else {

			$this->AscensorSotano($value);

		}

	}

	public static function AscensorSotano($value)
	{
		$AscensorSiSotanoSi = array(
			"A" => 540,
			"B" => 90,
			"C" => 7,
			"D" => 60,
			"E" => 45,
			"F" => 30,
		);

		$AscensorNoSotanoNo = array(
			"A" => 300,
			"B" => 80,
			"C" => 70,
			"D" => 50,
			"E" => 40,
			"F" => 20,
		);

		$AscensorSotanoToggle = array(
			"A" => 80,
			"B" => 70,
			"C" => 50,
			"D" => 40,
			"E" => 25,
			"F" => 20,
		);

		switch ($value["TipologiaConstruccion"]) {

			case $value["ascensor"] == "si" && $value["sotano"] == "si":
				self::$FactorConstruccion += $AscensorSiSotanoSi[$value["TipologiaConstruccion"]];
				break;
			case $value["ascensor"] == "no" && $value["sotano"] == "no" && $value["nivel_catastral"] >= 5:
				self::$FactorConstruccion += $AscensorNoSotanoNo[$value["TipologiaConstruccion"]];
				break;
			case $value["ascensor"] == "si" && $value["sotano"] == "no":
				self::$FactorConstruccion += $AscensorSotanoToggle[$value["TipologiaConstruccion"]];
				break;
			case $value["ascensor"] == "no" && $value["sotano"] == "si":
				self::$FactorConstruccion += $AscensorSotanoToggle[$value["TipologiaConstruccion"]];
				break;
			default:
				Tabulacion::TipoConstValor($value);
				break;

		}

		return self::$FactorConstruccion;

	}

	public function Horizontal($value)
	{
		$ConstSi = array(
			"A" => 680,
			"B" => 110,
			"C" => 100,
			"D" => 80,
			"E" => 65,
			"F" => 50,
		);

		$ConstNo = array(
			"A" => 650,
			"B" => 100,
			"C" => 90,
			"D" => 80,
			"E" => 60,
			"F" => 40,
		);

		$OficSi = array(
			"A" => 650,
			"B" => 110,
			"C" => 90,
			"D" => 80,
			"E" => 60,
			"F" => 40,
		);

		$OficNo = array(
			"A" => 600,
			"B" => 100,
			"C" => 85,
			"D" => 70,
			"E" => 55,
			"F" => 35,
		);

		if ($value["TipoUso"] == "Comercio" || $value["TipoUso"] == "Oficinas") {


			if ($value["horizontal"] == "si" && $value["TipoUso"] == "Comercio") {

				$this->factor += $ConstSi[$value["TipoAvaluo"]];

			} else if ($value["horizontal"] == "no" && $value["TipoUso"] == "Comercio") {

				$this->factor += $ConstNo[$value["TipoAvaluo"]];

			}

			if ($value["horizontal"] == "si" && $value["TipoUso"] == "Oficinas") {

				$this->factor += $OficSi[$value["TipoAvaluo"]];

			} else if ($value["horizontal"] == "si" && $value["TipoUso"] == "Oficinas") {

				$this->factor += $OficNo[$value["TipoAvaluo"]];

			}

		} else {

			$this->TipoConstValor($value);

		}

	}

	public static function TipoConstValor($value)
	{

		$TipoQuinta = array(
			"A" => 500,
			"B" => 80,
			"C" => 70,
			"D" => 60,
			"E" => 40,
			"F" => 30,
		);

		$TipoCasaQuinta = array(
			"A" => 470,
			"B" => 80,
			"C" => 60,
			"D" => 50,
			"E" => 40,
			"F" => 25,
		);

		$TipoCasa = array(
			"A" => 400,
			"B" => 70,
			"C" => 50,
			"D" => 40,
			"E" => 30,
			"F" => 20,
		);

		$TipoCasaColonial = array(
			"A" => 320,
			"B" => 55,
			"C" => 40,
			"D" => 30,
			"E" => 20,
			"F" => 15,
		);

		$TipoCasaGMV = array(
			"A" => 15,
			"B" => 15,
			"C" => 10,
			"D" => 10,
			"E" => 8,
			"F" => 7,
		);

		$TipoCasaAuto = array(
			"A" => 15,
			"B" => 40,
			"C" => 30,
			"D" => 25,
			"E" => 20,
			"F" => 12,
		);

		$TipoHoteles = array(
			"A" => 130,
			"B" => 100,
			"C" => 90,
			"D" => 75,
			"E" => 55,
		);

		$ClubesMarina = array(
			"A" => 120,
			"B" => 100,
			"C" => 80,
			"D" => 70,
			"E" => 50,
		);

		switch ($value["contruccion"]) {

			case $value["contruccion"] == "Quinta":
				self::$FactorConstruccion += $TipoQuinta[$value["TipologiaConstruccion"]];
				break;
			case $value["contruccion"] == "Casa/Quinta":
				self::$FactorConstruccion += $TipoCasaQuinta[$value["TipologiaConstruccion"]];
				break;
			case $value["contruccion"] == "Casa":
				self::$FactorConstruccion += $TipoCasa[$value["TipologiaConstruccion"]];
				break;
			case $value["contruccion"] == "CasaColonial":
				self::$FactorConstruccion += $TipoCasaColonial[$value["TipologiaConstruccion"]];
				break;
			case $value["contruccion"] == "CasaGMV":
				self::$FactorConstruccion += $TipoCasaGMV[$value["TipologiaConstruccion"]];
				break;
			case $value["contruccion"] == "Hoteles-Similares":
				self::$FactorConstruccion += $TipoHoteles[$value["TipologiaConstruccion"]];
				break;
			case $value["contruccion"] == "Clubes-Marinas":
				self::$FactorConstruccion += $ClubesMarina[$value["TipologiaConstruccion"]];
				break;
			default:
				self::$FactorConstruccion += $TipoCasaAuto[$value["TipologiaConstruccion"]];
				break;

		}


	}

}