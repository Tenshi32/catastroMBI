<?php

class ControlerRTT
{
	public function SoliRTT()
	{

		ModeloRTT::InsertarActaMatrimonio($_POST);
		ModeloRTT::InsertarSentenciaDeDivorcio($_POST);
		ModeloRTT::InsertarCartaDeResidencia($_POST);
		ModeloRTT::InsertarDeclaracionSucesoral($_POST);
		ModeloRTT::InsertarUnionHechos($_POST);
		ModeloRTT::InsertarDatosRttModelo($_POST);

		ModeloSolicitud::InsertarSolicitudModelo($_POST);

		$data_db = ModeloRTT::InsertarRttModelo($_POST);

		if ($data_db == true) {

			$auditoria = array(
				"id_usuario" => $_POST["cedula"],
				"descripcion" => "Sea Solicitado una Regulación de la Tenencia de la Tierra al inmueble con el codigo C.E " . $_POST["codigo"],
				"evento" => "Solicitado una Regulación de la Tenencia de la Tierra",
			);

			$session = $this->generarAuditoria($auditoria);

			$respuesta = array('status' => True, "mensaje" => "Solicitud Registrada con exito!");
			$this->generarRespuesta($respuesta);

		}
	}

	public function RegisDocRTT()
	{

		$data_db = ModeloCodigo::InmuebleFichaModelo($_POST);

		$_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $data_db : $_POST["id_inmueble"];

		ModeloDoc::CarpetaInmueble($_FILES, $_POST);

	}

	public function BuscarRTTModelo($id)
	{

		$data_db = ModeloRTT::BuscarRTTModelo($id);

		$dato = 0;

		foreach ($data_db as $row) {


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

					"residencia" => $row['residencia'],
					"parroquia_n" => $parroquia,
					"tenencia_n" => $tenencia,
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

			echo $this->verDetalles($datos);
			echo "
				<tr>
					<td>#" . $dato . "</td>
		  			<td>" . $row['nombre_cr'] . "</td>
		  			<td>" . $parroquia . "</td>
					<td>Numero de Telefono: " . $row['telefono_inmueble'] . "</td>
					<td>
						<div class='row'>
							<div class='col'>
								<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#verDetalles-" . $row['id_usuario'] . "'>
									Ver Detalles  <span class='fa fa-eye'></span>
								</button> 
							</div>

							<div class='col'>
								<form action='../../reporte/CertificadoRTT.php' method='post'>
								  <input type='hidden' name='datos' value='" . $row['id_inmueble'] . "'>
								  <button type='submit' class='btn btn-danger'>Imprimir Constancia <span class='bi bi-printer-fill'></span></button>
								</form>
							</div>

		  				</div>
					</td> 
				</tr>
				";
		}

	}

	public function ListaRTTModelo($dato)
	{

		$data_db = ModeloRTT::SoliRTTModelo();

		$n = 0;

		foreach ($data_db as $row) {


			$n++;

			$parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

			$tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

			$datos =
				array(
					"codigo" => $row['id_solicitud'],
					"id_solicitud" => $row['id_solicitud'],
					"fecha_solicitud" => $row['fecha_solicitud'],
					"estado_solicitud" => $row['estado_solicitud'] + 1,
					"id_usuario" => $row['id_usuario'],
					"id_inmueble" => $row['id_inmueble'],
					"id_direccion_inmueble" => $row['id_direccion_inmueble'],

					"tipo_solicitud" => $row['tipo_solicitud'],

					"nombre_usuario" => $row['nombre'],
					"apellido_usuario" => $row['apellido'],
					"nombre_inmueble" => $row['nombre_inmueble'],
					"descripcion_inmueble" => $row['estado_inmueble'],
					"parroquia" => $row['parroquia'],
					"residencia" => $row['residencia'],
					"parroquia_n" => $parroquia,
					"n_civico" => $row['n_civico'],
					"razon_inmueble" => $row["razon_inmueble"],

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

			echo $this->verDetallesSoli($datos);
			
			echo "
			    <tr>
          		  	<td>" . $n . "</td>
          		  	<td>" . $row['id_usuario'] . " " . $row['nombre'] . " " . $row['apellido'] . "</td>
          		  	<td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
          		  	<td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
				  	<td>  
					<div class='row'>
						<div class='col'>
							<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#verDetalles-" . $row['id_solicitud'] . "'>
								Ver Detalles  <span class='fa fa-eye'></span>
							</button> 
						</div>

						<div class='col'>
                    	    <form action='regis-negacion.php' method='post'>
				    	      <input type='hidden' name='datos' value='" . htmlentities(serialize($datos)) . "'>
				    	      <button type='submit' class='btn btn-danger'>Negar <span class='bi bi-x-circle fa-lg'></span></button>
				    	    </form><br>
                    	</div>

						<div class='col'>
                    	    <form action='../../php/Controller/ControlerCita.php' method='post'>
				    	      <input type='hidden' name='AprobarSoli' value='" . htmlentities(serialize($datos)) . "'>
				    	      <input type='hidden' name='funcionario' value='" . htmlentities(serialize($dato)) . "'>
				    	      <button type='submit' class='btn btn-primary'>Aprobar <span class='bi bi-check-circle fa-lg'></span></button>
				    	    </form><br>
                    	</div>
                    </div>
					
					</td>
            	</tr>";

		}

	}
	
	public function verDetallesSoli($datos)
	{

		echo '<div class="modal fade" id="verDetalles-' . $datos['codigo'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos del Avaluo</h5>
			  </div>
			  <div class="modal-body">
				<p>Nº de inscripcion: ' . $datos['id_usuario'] . '</p>
				<b>Datos de la Solicitud</b>
				<ul>
				            	
					Fecha de la Solicitud: ' . $datos["fecha_solicitud"] . '<br>
					
            		Razon de la Solicitud: ' . $datos["razon_inmueble"] . '<br>
            	
				</ul>
				<b>Datos del Inmueble </b>
				<ul>
					' . $datos['descripcion_contruccion'] . ' | N° Civico ' . $datos['n_civico'] . ' <br>
					Medida del Inmueble ' . $datos['medida_inmueble'] . ' Mts<sup>2</sup> <br>
					Valor del Inmueble ' . $datos['valor_inmueble'] . ' Bs. <br>
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

$ControlerRTT = new ControlerRTT();

if (isset($_POST["SoliRTT"])) {

	require_once "../Model/ModeloCodigo.php";
	require_once "../Model/ModeloDoc.php";
	require_once "../Model/ModeloSolicitud.php";
	require_once "../Model/ModeloRTT.php";
	require_once "../Model/ModeloUsuario.php";

	$ControlerRTT->RegisDocRTT();
	$ControlerRTT->SoliRTT();

}