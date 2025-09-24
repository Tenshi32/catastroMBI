<?php

class ControlerAvaluo
{
  public function TasaTabu()
  {

    $FactorTerreno = Tabulacion::TerrenoTamaño($_POST);

    $FactorConstruccion = Tabulacion::AscensorSotano($_POST);

    $_POST["FactorTerreno"] = $FactorTerreno;
    $_POST["FactorConstruccion"] = $FactorConstruccion;


  }

  public function RegisAvaluo()
  {

    $this->TasaTabu();
    
    ModeloCodigo::InmuebleFichaModelo($_POST);
    ModeloAvaluacion::ActualizarOtrosDatosModelo($_POST);
    ModeloAvaluacion::InsertarValoracionTerreno($_POST);
    ModeloAvaluacion::InsertarValoracionConstruccion($_POST);
    $data_db = ModeloAvaluacion::InsertarValoracionEconomica($_POST);

    if ($data_db == true) {

      $auditoria = array(
        "id_usuario" => $_POST["id_funcionario"],
        "descripcion" => "Avaluo Realizado por el Funcionario " . $_POST["id_funcionario"] . ", al Inmueble con el codigo C.E" . $_POST["codigo"],
        "evento" => "Avaluo Realizado",
      );

      $session = $this->generarAuditoria($auditoria);

      $respuesta = array('status' => true, "mensaje" => "Accion Registrada con exito!");
      $this->generarRespuesta($respuesta);

    }
  }

  public function UpdaAvaluo()
  {
    $this->TasaTabu();
    ModeloAvaluacion::ActualizarOtrosDatosModelo($_POST);
    ModeloAvaluacion::UpdateValoracionTerreno($_POST);
    ModeloAvaluacion::UpdateValoracionConstruccion($_POST);
    $data_db = ModeloAvaluacion::UpdateValoracionEconomica($_POST);

    if ($data_db == true) {

      $auditoria = array(
        "id_usuario" => $_POST["funcionario"],
        "descripcion" => "Avaluo Actualizado al Inmueble con el codigo C.E" . $_POST["codigo"],
        "evento" => "Avaluo Actualizado",
      );

      $session = $this->generarAuditoria($auditoria);

      $respuesta = array('status' => true, "mensaje" => "Accion Realizada con exito!");
      $this->generarRespuesta($respuesta);

    }
  }

  public function ConsultaSoliAvaluo($datos)
  {

    $result = ModeloAvaluacion::listaSoliAvaluo($datos);

    foreach ($result as $row) {

      $datos =
        array(
          //datos del cliente
          "id_propietario" => $row['id_usuario'],
          "id_direccion_inmueble" => $row['id_direccion_inmueble'],
          "n_civico" => $row['n_civico'],

          "tipo_ubicacion_entre" => $row['tipo_ubicacion_entre'],
          "descripcion_ubicacion_entre" => $row['descripcion_ubicacion_entre'],
          "descripcion_ubicacion_y" => $row['descripcion_ubicacion_y'],
          "tipo_ubicacion_y" => $row['tipo_ubicacion_y'],
          "tipo_contruccion" => $row['tipo_construccion'],
          "tipo_lugar_inmueble" => $row['tipo_lugar_inmueble'],

          "sector_catastral" => $row['sectores'],
          "id_sector_catastral" => $row['id_sectores'],

          "superficie_c" => $row['superficie_c'],
          "superficie_t" => $row['superficie_t'],
          "clase_inmueble" => $row['clase_inmueble'],

          "parroquia" => $row['parroquia'],
          "residencia" => $row['residencia'],
          "lugar_inmueble" => $row['lugar_inmueble'],
          "ubicacion_inmueble_entre" => $row['ubicacion_inmueble_entre'],
          "ubicacion_inmueble_y" => $row['ubicacion_inmueble_y'],
          "punto_referencia" => $row['punto_referencia'],
          "estado_inmueble" => $row['estado_inmueble'],
        );


      echo "
            <td>" . $row['id_inmueble'] . "</td>
            <td>" . $row['nombre'] . " " . $row['apellido'] . "</td>
            <td>" . $row['nombre_inmueble'] . "<br> N° Civico " . $row['n_civico'] . "</td>
            ";

      echo '<td><form action="form_ava.php" method="post">
				  <input type="hidden" name="datos" value="' . htmlentities(serialize($datos)) . '">
				  <button type="submit" class="btn btn-primary">Generar Avaluo <span class="fa fa-edit"></span></button>
				</form><br>';

      echo "</td> </tr>";
    }

  }

  public function BuscarAvaluo()
  {

    $result = ModeloAvaluacion::BuscarAvaluoModelo();

    $dato = 0;

    foreach ($result as $row) {


      $dato++;

      $parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

      $tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

      $datos =
        array(
          "id_usuario" => $row['id_usuario'],
          "id_inmueble" => $row['id_inmueble'],
          "id_valoracion_economica" => $row['id_valoracion_economica'],
          "id_direccion_inmueble" => $row['id_direccion_inmueble'],
          "codigo" => $row['id_inmueble'],
          "sector_catastral" => $row['sectores'],
          "id_sector_catastral" => $row['id_sectores'],
          "nombre_inmueble" => $row['nombre_inmueble'],
          "descripcion_inmueble" => $row['estado_inmueble'],
          "parroquia" => $row['parroquia'],
          "residencia" => $row['residencia'],
          "parroquia_n" => $parroquia,
          "tenencia_n" => $tenencia,
          "tenencia" => $row['tenencia_inmueble'],
          "n_civico" => $row['n_civico'],

          "clase_inmueble" => $row['clase_inmueble'],
          "telefono_inmueble" => $row['telefono_inmueble'],
          "punto_referencia" => $row['punto_referencia'],

          "ubicacion_entre_tipo" => $row['id_ubicacion_inmueble_entre'],
          "ubicacion_entre_text" => $row['ubicacion_inmueble_entre'],
          "descripcion_ubicacion_entre" => $row['descripcion_ubicacion_entre'],

          "ubicacion_y_tipo" => $row['id_ubicacion_inmueble_y'],
          "ubicacion_y_text" => $row['ubicacion_inmueble_y'],
          "descripcion_ubicacion_y" => $row['descripcion_ubicacion_y'],

          "medida_inmueble" => $row['medida_inmueble'],
          "valor_inmueble" => $row['valor_inmueble'],

          "lugar_inmuble_tipo" => $row['id_lugar_inmueble'],
          "lugar_inmuble_text" => $row['lugar_inmueble'],
          "descripcion_lugar" => $row['descripcion_lugar'],

          "tipo_construccion_tipo" => $row['id_tipo_construccion'],
          "descripcion_contruccion" => $row['descripcion_contruccion'],

          "estado_inmueble" => $row['estado_inmueble'],
          "entrada_lindero" => $row['entrada_lindero'],

          "norte_medida" => $row['norte_medida'],
          "norte_descripcion" => $row['norte_lindero'],
          "oeste_medida" => $row['oeste_medida'],
          "oeste_descripcion" => $row['oeste_lindero'],
          "este_medida" => $row['este_medida'],
          "este_descripcion" => $row['este_lindero'],
          "sur_medida" => $row['sur_medida'],
          "sur_descripcion" => $row['sur_lindero'],

          "superficie_c" => $row['superficie_c'],
          "superficie_t" => $row['superficie_t'],

          "tipologia_terreno" => $row['tipologia_terreno'],
          "facto_terreno" => $row['facto_terreno'],
          "alicuota_terreno" => $row['alicuota_terreno'],

          "tipologia_construccion" => $row['tipologia_construccion'],
          "factor_construccion" => $row['factor_construccion'],
          "alicuota_construccion" => $row['alicuota_construccion'],

          "depresiacion" => $row['depresiacion'],
          "porcentage_refaccion" => $row['porcentage_refaccion'],
          "id_tipo_porcentaje" => $row['id_tipo_porcentaje'],
          "edad_efectiva" => $row['edad_efectiva'],
          "observacion" => $row['observacion_avaluo'],
        );

      echo $this->verDetalles($datos);
      echo "
				<tr>
					<td>#" . $dato . "</td>
		  			<td>" . $row['n_civico'] . "</td>
		  			<td>" . $parroquia . "</td>
		  			<td>" . $row['residencia'] . "</td>
					<td>Numero de Telefono: " . $row['telefono_inmueble'] . "</td>
					<td>
						<div class='row'>
							<div class='col'>
								<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#verDetalles-" . $row['id_usuario'] . "'>
									Ver Detalles  <span class='fa fa-eye'></span>
								</button> 
							</div>
							<div class='col'>
								<form action='../../Update/UpdaAvaluo.php' method='post'>
								  <input type='hidden' name='datos' value='" . htmlentities(serialize($datos)) . "'>
								  <button type='submit' class='btn btn-success'>Editar <span class='fa fa-edit'></span></button>
								</form>
							</div>
		  				</div>
					</td> 
				</tr>
				";
    }

  }

  public function verDetalles($datos)
  {

    echo '<div class="modal fade" id="verDetalles-' . $datos['id_usuario'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos del Avaluo</h5>
			  </div>
			  <div class="modal-body">
				<p>Nº de inscripcion: ' . $datos['id_usuario'] . '</p>
				<b>Datos del Inmueble </b>
				<ul>
					' . $datos['descripcion_contruccion'] . ' | N° Civico ' . $datos['n_civico'] . ' <br>
					Tenencia ' . $datos['tenencia_n'] . '<br>
					Medida del Inmueble ' . $datos['medida_inmueble'] . ' Mts<sup>2</sup> <br>
					<hr>
					Direccion: <br>
					Parroquia ' . $datos['parroquia_n'] . ' | Residencia ' . $datos['residencia'] . '  <br>
					Ubicado en ' . $datos['descripcion_lugar'] . ' ' . $datos['lugar_inmuble_text'] . '<br>
					Entre ' . $datos['descripcion_ubicacion_entre'] . ' ' . $datos['ubicacion_entre_text'] . ' y ' . $datos['descripcion_ubicacion_y'] . ' ' . $datos['ubicacion_y_text'] . ' <br>
					<hr>
					Linderos <br>
					Norte : ' . $datos['norte_medida'] . 'Mts / Colinda con ' . $datos['norte_descripcion'] . ' <br>
					Sur : ' . $datos['sur_medida'] . 'Mts / Colinda con ' . $datos['sur_descripcion'] . ' <br>
					Este : ' . $datos['este_medida'] . 'Mts / Colinda con ' . $datos['este_descripcion'] . ' <br>
					Oeste : ' . $datos['oeste_medida'] . 'Mts / Colinda con ' . $datos['oeste_descripcion'] . ' <br>
					<hr>
				</ul>

				<b>Datos del Avaluo </b>
				<ul>
					Clase de Inmueble : ' . $datos['clase_inmueble'] . ' <br>
					Tipologia del Terreno : ' . $datos['tipologia_terreno'] . ' / Tipologia de Construcción : ' . $datos['tipologia_construccion'] . '<br>
					% de Depresiación : ' . $datos['depresiacion'] . '% / % de Refacción ' . $datos['porcentage_refaccion'] . '%<br> <br>

					<li> Construcción <br>
					Factor Comun : ' . $datos['factor_construccion'] . ' / Alicuota Anual : ' . $datos['alicuota_construccion'] . ' <br>
					</li>
					<li> Terreno <br>
					Factor Comun ' . $datos['facto_terreno'] . ' / Alicuota Anual ' . $datos['alicuota_terreno'] . ' <br></li>
				</ul>
			  </div>
			  <div class="modal-footer bg-dark">
				<button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>';
  }

  public function ModalInfoAvaluo($datos)
  {

    $result = ModeloInmueble::InmuebleSelectAccion($datos);

    $parroquia = ($result['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

    $tenencia = ($result['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

    $datos =
      array(
        "id_usuario" => $result['id_usuario'],
        "id_inmueble" => $result['id_inmueble'],
        "id_direccion_inmueble" => $result['id_direccion_inmueble'],
        "codigo" => $result['id_inmueble'],
        "sector_catastral" => $result['sectores'],
        "id_sector_catastral" => $result['id_sectores'],
        "nombre_inmueble" => $result['nombre_inmueble'],
        "descripcion_inmueble" => $result['estado_inmueble'],
        "parroquia" => $result['parroquia'],
        "residencia" => $result['residencia'],
        "parroquia_n" => $parroquia,
        "tenencia_n" => $tenencia,
        "tenencia" => $result['tenencia_inmueble'],
        "n_civico" => $result['n_civico'],
        "nivel_catastral" => $result['nivel_catastral'],

        "clase_inmueble" => $result['clase_inmueble'],
        "telefono_inmueble" => $result['telefono_inmueble'],
        "punto_referencia" => $result['punto_referencia'],

        "ubicacion_entre_tipo" => $result['id_ubicacion_inmueble_entre'],
        "ubicacion_entre_text" => $result['ubicacion_inmueble_entre'],
        "descripcion_ubicacion_entre" => $result['descripcion_ubicacion_entre'],

        "ubicacion_y_tipo" => $result['id_ubicacion_inmueble_y'],
        "ubicacion_y_text" => $result['ubicacion_inmueble_y'],
        "descripcion_ubicacion_y" => $result['descripcion_ubicacion_y'],

        "medida_inmueble" => $result['medida_inmueble'],
        "valor_inmueble" => $result['valor_inmueble'],

        "lugar_inmuble_tipo" => $result['id_lugar_inmueble'],
        "lugar_inmuble_text" => $result['lugar_inmueble'],
        "descripcion_lugar" => $result['descripcion_lugar'],

        "tipo_construccion_tipo" => $result['id_tipo_construccion'],
        "descripcion_contruccion" => $result['descripcion_contruccion'],

        "estado_inmueble" => $result['estado_inmueble'],
        "entrada_lindero" => $result['entrada_lindero'],

        "norte_medida" => $result['norte_medida'],
        "norte_descripcion" => $result['norte_lindero'],
        "oeste_medida" => $result['oeste_medida'],
        "oeste_descripcion" => $result['oeste_lindero'],
        "este_medida" => $result['este_medida'],
        "este_descripcion" => $result['este_lindero'],
        "sur_medida" => $result['sur_medida'],
        "sur_descripcion" => $result['sur_lindero'],

        "superficie_c" => $result['superficie_c'],
        "superficie_t" => $result['superficie_t'],

      );
    $this->DetalleForm($datos);
    echo '            
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-' . $result['id_usuario'] . '">
               Ver detalles del Inmueble <i class="fas fa-eye"></i>
            </button>
        
            <input type="hidden" name="nivel_catastral" id="nivel_catastral" value="' . $result['nivel_catastral'] . '">
            <input type="hidden" name="inmueble_usuario" id="inmueble_usuario" value="' . $result['id_inmueble_usuario'] . '">
            <input type="hidden" name="inmueble" id="inmueble" value="' . $result['id_inmueble_usuario'] . '">
            <input type="hidden" name="sotano" id="sotano" value="' . $result['sotano_complementario'] . '">
            <input type="hidden" name="ascensor" id="ascensor" value="' . $result['ascensor_complementario'] . '">
            <input type="hidden" name="contruccion" id="contruccion" value="' . $result['descripcion_contruccion'] . '">
      ';
  }

  public function DetalleForm($datos)
  {

    echo '<div class="modal fade" id="verDetalles-' . $datos['id_usuario'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos del Avaluo</h5>
			  </div>
			  <div class="modal-body">
				<p>Nº de inscripcion: ' . $datos['id_usuario'] . '</p>
				<b>Datos del Inmueble </b>
				<ul>
					' . $datos['descripcion_contruccion'] . ' | N° Civico ' . $datos['n_civico'] . ' <br>
					Tenencia ' . $datos['tenencia_n'] . '<br>
					Medida del Inmueble ' . $datos['medida_inmueble'] . ' Mts<sup>2</sup> <br>
					<hr>
					Direccion: <br>
					Parroquia ' . $datos['parroquia_n'] . ' | Residencia ' . $datos['residencia'] . '  <br>
					Ubicado en ' . $datos['descripcion_lugar'] . ' ' . $datos['lugar_inmuble_text'] . '<br>
					Entre ' . $datos['descripcion_ubicacion_entre'] . ' ' . $datos['ubicacion_entre_text'] . ' y ' . $datos['descripcion_ubicacion_y'] . ' ' . $datos['ubicacion_y_text'] . ' <br>
					<hr>
					Linderos <br>
					Norte : ' . $datos['norte_medida'] . 'Mts / Colinda con ' . $datos['norte_descripcion'] . ' <br>
					Sur : ' . $datos['sur_medida'] . 'Mts / Colinda con ' . $datos['sur_descripcion'] . ' <br>
					Este : ' . $datos['este_medida'] . 'Mts / Colinda con ' . $datos['este_descripcion'] . ' <br>
					Oeste : ' . $datos['oeste_medida'] . 'Mts / Colinda con ' . $datos['oeste_descripcion'] . ' <br>
					<hr>
				</ul>
			  </div>
			  <div class="modal-footer bg-dark">
				<button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>';
  }

  function generarRespuesta($status)
  {

    $respuesta = array(
      'status' => $status["status"],
      'mensaje' => $status["mensaje"]
    );

    echo json_encode($respuesta);
    exit;
  }

  function generarAuditoria($datos)
  {
    date_default_timezone_set('America/Caracas');
    $auditoria = array(
      "id" => $datos["id_usuario"],
      "descripcion" => $datos["descripcion"],
      "evento" => $datos["evento"],
      "time" => date("H:i"),
      "date" => date("d-m-Y"),
    );

    $session = ModeloUsuario::InsertarAuditoriaUsuario($auditoria);

    if ($session == true) {

      return true;

    } else {

      $respuesta = array('status' => false, "mensaje" => "Falla en la Conexion al Servidor");
      $this->generarRespuesta($respuesta);

    }

  }


}

$ControlerAvaluo = new ControlerAvaluo();

if (isset($_POST["RegisAvaluo"])) {

  require_once "../Model/ModeloCodigo.php";
  require_once "../Model/ModeloAvaluacion.php";
  require_once "../Model/ModeloUsuario.php";
  $ControlerAvaluo->RegisAvaluo();

} else if (isset($_POST["UpdaAvaluo"])) {

  require_once "../Model/ModeloAvaluacion.php";
  require_once "../Model/ModeloUsuario.php";
  $ControlerAvaluo->UpdaAvaluo();
}