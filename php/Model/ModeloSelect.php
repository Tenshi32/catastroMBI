<?php
require_once "basedata2.php";
class ModeloSelect extends baseData
{

	public function Tenencia($datos)
	{

		if ($datos == 1) {

			echo ' 
			<option value="1" selected="selected">Notaria => Tenencia (Municipal)</option>
            <option value="2">Registro => Tenencia (Privada)</option>';
			
		} else {
			
			echo '<option value="2" selected="selected">Registro => Tenencia (Privada)</option>
            <option value="1">Notaria => Tenencia (Municipal)</option>';
		}
	}

	public function Parroquia($datos)
	{

		if ($datos == 001) {

			echo '<option value="002">002# Caña Azucar</option>';
			
		} else {
			
			echo '<option value="001">001# El Limon</option>';
		}
	}

	public function EntradaLindero($datos)
	{

		switch ($datos) {

			case "Norte": 

				echo '<div class="form-group">
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary1" name="entrada_lindero" value="Norte" checked>
                      <label for="radioPrimary1">
                        Norte
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary2" name="entrada_lindero" value="Sur">
                      <label for="radioPrimary2">
                        Sur
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary3" name="entrada_lindero" value="Este">
                      <label for="radioPrimary3">
                        Este
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary4" name="entrada_lindero" value="Oeste">
                      <label for="radioPrimary4">
                        Oeste
                      </label>
                    </div>
                  </div>';

				break;

			case "Este":

				echo '<div class="form-group">
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary1" name="entrada_lindero" value="Norte">
                      <label for="radioPrimary1">
                        Norte
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary2" name="entrada_lindero" value="Sur">
                      <label for="radioPrimary2">
                        Sur
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary3" name="entrada_lindero" value="Este" checked>
                      <label for="radioPrimary3">
                        Este
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary4" name="entrada_lindero" value="Oeste">
                      <label for="radioPrimary4">
                        Oeste
                      </label>
                    </div>
                  </div>';

				break;

			case "Sur":

				echo '<div class="form-group">
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary1" name="entrada_lindero" value="Norte">
                      <label for="radioPrimary1">
                        Norte
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary2" name="entrada_lindero" value="Sur" checked>
                      <label for="radioPrimary2">
                        Sur
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary3" name="entrada_lindero" value="Este">
                      <label for="radioPrimary3">
                        Este
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary4" name="entrada_lindero" value="Oeste">
                      <label for="radioPrimary4">
                        Oeste
                      </label>
                    </div>
                  </div>';

				break;

			case "Oeste": 

				echo '<div class="form-group">
                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary1" name="entrada_lindero" value="Norte">
                      <label for="radioPrimary1">
                        Norte
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary2" name="entrada_lindero" value="Sur" >
                      <label for="radioPrimary2">
                        Sur
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary3" name="entrada_lindero" value="Este">
                      <label for="radioPrimary3">
                        Este
                      </label>
                    </div>

                    <div class="icheck-primary d-inline mr-2">
                      <input type="radio" id="radioPrimary4" name="entrada_lindero" value="Oeste" checked>
                      <label for="radioPrimary4">
                        Oeste
                      </label>
                    </div>
                  </div>';

				break;
		}

	}

	//Tipo Motivo
	public function SelectBasicUpdate($tabla, $datos)
	{

		$unidad = array();
		$sql = baseData::conexion()->query("SELECT * FROM $tabla WHERE id_$tabla != $datos");
		if ($sql) {
			while ($fila = $sql->fetch()) {

				echo '<option value=' . $fila['id_'.$tabla] . '>' . $fila['id_'.$tabla] . '# ' . $fila[$tabla] . '</option>';
			}

		}
	}

	public function SelectBasic($tabla)
	{

		$unidad = array();
		$sql = baseData::conexion()->query("SELECT * FROM $tabla");
		if ($sql) {
			while ($fila = $sql->fetch()) {

				echo '<option value=' . $fila['id_'.$tabla] . '>' . $fila['id_'.$tabla] . '# ' . $fila[$tabla] . '</option>';
			}

		}
	}

	public function DatosTipoTipologia()
	{

		$unidad = array();
		$sql = baseData::conexion()->query("SELECT * FROM tipo_tipologia");
		if ($sql) {
			while ($fila = $sql->fetch()) {

				echo '<option value=' . $fila['tipo_tipologia'] . '>' . $fila['id_tipo_tipologia'] . '# '.$fila['descripcion_tipologia'] .'</option>';
			}

		}
	}

	public function DatosSizeTerreno($valor)
	{
		if($valor <= 5000.00){
			$filtro = 5000;
		} else if ($valor >= 5000.01 && $valor <= 50000.00){
			$filtro = 0;
		} else {
			$filtro = 50000;
		}

		$sql = baseData::conexion()->query("SELECT * FROM size_terreno WHERE rule_size = 1 OR rule_size = $filtro");
		if ($sql) {
			while ($fila = $sql->fetch()) {

				echo '<option value=' . $fila['tipo_size'] . '>' . $fila['id_size_terreno'] . '# ' . $fila['tipo_size'] . ') : '.$fila['info_size'] .'</option>';
			}

		}
	}

	public function UpdateTipologiaConstruccion($datos)
	{

		$unidad = array();
		$sql = baseData::conexion()->query("SELECT * FROM tipo_tipologia");
		if ($sql) {
			while ($fila = $sql->fetch()) {

				if($fila['id_tipo_tipologia'] == $datos){
					echo '<option selected value=' . $fila['tipo_tipologia'] . '>' . $fila['id_tipo_tipologia'] . '# ' . $fila['tipo_tipologia'] . ') ' . $fila['descripcion_tipologia'] . '</option>';
				}else{
					echo '<option value=' . $fila['tipo_tipologia'] . '>' . $fila['id_tipo_tipologia'] . '# ' . $fila['tipo_tipologia'] . ') ' . $fila['descripcion_tipologia'] . '</option>';
				}
				
			}

		}
	}

	public function UpdateTipologiaTerreno($datos, $valor)
	{
		if($valor <= 5000.00){
			$filtro = 5000;
		} else if ($valor >= 5000.01 && $valor <= 50000.00){
			$filtro = 0;
		} else {
			$filtro = 50000;
		}
		$unidad = array();
		$sql = baseData::conexion()->query("SELECT * FROM size_terreno WHERE rule_size = 1 OR rule_size = $filtro");
		if ($sql) {
			while ($fila = $sql->fetch()) {

				if($fila['id_size_terreno'] == $datos){
					echo '<option selected value=' . $fila['tipo_size'] . '>' . $fila['id_size_terreno'] . '# ' . $fila['tipo_size'] . ') ' . $fila['info_size'] . '</option>';
				}else{
					echo '<option value=' . $fila['tipo_size'] . '>' . $fila['id_size_terreno'] . '# ' . $fila['tipo_size'] . ') ' . $fila['info_size'] . '</option>';
				}
				
			}

		}
	}

	public function UpdatePorcentajes($datos)
	{

		$unidad = array();
		$sql = baseData::conexion()->query("SELECT * FROM tipo_porcentaje");
		if ($sql) {
			while ($fila = $sql->fetch()) {
				
				if($fila['id_tipo_porcentaje'] == $datos){
					echo '<option selected value=' . $fila['id_tipo_porcentaje'] . '>' . $fila['tipo_porcentaje'] . '</option>';
				}else{
					echo '<option value=' . $fila['id_tipo_porcentaje'] . '>' . $fila['tipo_porcentaje'] . '</option>';
				}

			}

		}
	}

	//Inmuebles Propietario
	/*
		   Estados del Inmueble en el sistema
		   0 = None
		   1 = Titulo Supletorio
		   2 = Inscrito
		   3 = Empadronado

		*/
	public function InmueblePropietarioFicha($dato, $numero)
	{

		$sql = baseData::conexion()->query("SELECT * FROM inmueble 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		WHERE inmueble_usuario.id_usuario = $dato AND estado_inmueble = $numero");

		$n = 0;
		
		if ($sql) {
			while ($fila = $sql->fetch()) {
				$n++;
				echo '<option value=' . $fila['id_inmueble_usuario'] . '> Inmueble ' . $n . '# - N° Civico ' . $fila['n_civico'] . '</option>';
			}

		}
	}

	public function DatosInmueblePropietario($dato, $numero)
	{

		$sql = baseData::conexion()->query("SELECT * FROM inmueble 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		WHERE inmueble_usuario.id_usuario = $dato AND estado_inmueble >= $numero");

		$n = 0;
		
		if ($sql) {
			while ($fila = $sql->fetch()) {
				$n++;
				echo '<option value="' . $fila['id_inmueble_usuario'] . '"> Inmueble ' . $n . '# - N° Civico ' . $fila['n_civico'] . ' </option>';
			}

		}
	}

	//Tipo Sectores
	public function DatosSectores($id_parroquia)
	{
		$sql = "SELECT * FROM sectores WHERE id_parroquia = '$id_parroquia'";

		$account = baseData::conexion()->query($sql);

		return $account;
	}

}