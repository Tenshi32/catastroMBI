<?php

class ControlerContrato
{

    public function SoliContrato()
    {
        $data_sm = ModeloSolicitud::InsertarSolicitudModelo($_POST);
		$data_a2 =ModeloContrato::BuscarActor2($_POST);
        if ($data_a2 == true){

            ModeloContrato::InsertarAbogadoContrato($_POST);
            ModeloContrato::InsertarActor2($_POST);
            ModeloContrato::InsertarContratoDatos($_POST);
            $data_db = ModeloContrato::InsertarContratoModelo($_POST);    
        }else{

            $respuesta = array('status' => false, "mensaje" => "El Comprador no esta registrado en el sistema");
            $this->generarRespuesta($respuesta);

        }
		
        if ($data_db == true && $data_sm == true) {

            $auditoria = array(
                "id_usuario" => $_POST["cedula"],
                "descripcion" => "Solicitud de Contrato Registrada con el codigo C.E ".$_POST["codigo"],
                "evento" => "Solicitud de Contrato",
            );

            $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Solicitud Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function RegisContrato()
    {

        $data_db = ModeloSolicitud::ActualizarSolicitudModelo($_POST);
        $data_db = ModeloContrato::InsertarAprobacionContratoModelo($_POST);

        if($_POST["tipo_contrato"] == 1){

            $data_db = ModeloContrato::UpdatePropietarioContrato($_POST);

        }

        if ($data_db == true) {

            $auditoria = array(
                "id_usuario" => $_POST["cedula"],
                "descripcion" => "Contrato Solicitado con el Codigo C.E " . $_POST["codigo"]." Certificado por el funcionario del codigo ".$_POST["id_usuario"],
                "evento" => "Certificacion de Contrato",
            );

            $session = $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Accion Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function RegisDocContrato()
    {

        $data_db = ModeloCodigo::InmuebleFichaModelo($_POST);
        
        $_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $data_db : $_POST["id_inmueble"];

        ModeloDoc::CarpetaInmueble($_FILES, $_POST);

    }

	public function ModalInfoContrato($datos)
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

    public function BuscarContrato()
	{

        $result = ModeloContrato::ListaContrato();
		$dato = 0;

		foreach ($result as $i => $row) {

            
			$dato++;

				$parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

				$tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

			$datos =
				array(
					"id_usuario" => $row['id_usuario'],
					"id_inmueble" => $row['id_inmueble'],
					"id_direccion_inmueble" => $row['id_direccion_inmueble'],
					"codigo" => $row['id_inmueble'],
					"n_civico" => $row['n_civico'],
					"tenencia_n" => $tenencia,
					"parroquia_n" => $parroquia,

                    "residencia" => $row['residencia'],
					"id_contrato" => $row['id_contrato'],
					"id_contrato_datos" => $row['id_contrato_datos'],
					"id_tipo_contrato" => $row['id_tipo_contrato'],
					"id_abobogado" => $row['id_abobogado'],
					"fecha_entrega" => $row['fecha_entrega'],
					"monto_pagar" => $row['monto_pagar'],
					"codig_gmv" => $row['codig_gmv'],

					//tabla abogado//

					"nombre_abogado" => $row['nombre_abogado'],
					"apellido_abogado" => $row['apellido_abogado'],
					"inpre_abogado" => $row['inpre_abogado'],
					"cedula_abogado" => $row['cedula_abogado'],
					"telefono_abogado" => $row['telefono_abogado'],
					"corre_abogado" => $row['corre_abogado'],
					//actor2//

					"cedula_actor" => $row['cedula_actor'],
					"nombre_actor" => $row['nombre_actor'],
					"apellido_actor" => $row['apellido_actor'],
					"telefono_actor" => $row['telefono_actor'],

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
				);

			echo ModeloContrato::verDetalles($datos);
			echo "
				<tr>
					<td>#" . $dato . "</td>
		  			<td>" . $row['nombre'] . " " . $row['apellido'] . "</td>
		  			<td>" . $row['tipo_contrato'] . "</td>
					<td>
						<div class='row'>
							<div class='col'>
								<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#verDetalles-" . $row['id_usuario'] . "'>
									Ver Detalles  <span class='fa fa-eye'></span>
								</button> 
							</div>
							<div class='col'>
								<form action='form_cont.php' method='post'>
								  <input type='hidden' name='datos' value='" . htmlentities(serialize($datos)) . "'>
								  <button type='submit' class='btn btn-primary'>Aprobar <span class='bi bi-check2-circle'></span></button>
								</form>
							</div>
		  				</div>
					</td> 
				</tr>
				";
		}

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

$ControlerContrato = new ControlerContrato();

if (isset($_POST["SoliContrato"])) {

    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloDoc.php";
    require_once "../Model/ModeloSolicitud.php";
    require_once "../Model/ModeloContrato.php";
    require_once "../Model/ModeloUsuario.php";

    $ControlerContrato->RegisDocContrato();
    $ControlerContrato->SoliContrato();

}
if (isset($_POST["RegisContrato"])) {

    require_once "../Model/ModeloSolicitud.php";
    require_once "../Model/ModeloContrato.php";
    require_once "../Model/ModeloUsuario.php";

    $ControlerContrato->RegisContrato();

}