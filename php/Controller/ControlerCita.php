<?php

class ControlerCita
{

	public function ToggleCita()
	{

		$data_db = ModeloSolicitud::InsertarNegarModelo($_POST);

		if ($data_db == true) {

			$auditoria = array(
				"id_usuario" => $_POST["id_usuario"],
				"descripcion" => "Se Nego la Cita del Codigo C.E" . $_POST["codigo"],
				"evento" => "Negacion de Cita",
			);

			$session = $this->generarAuditoria($auditoria);

			$respuesta = array('status' => false, "mensaje" => "Accion Realizada con exito!");
			$this->generarRespuesta($respuesta);

		}
	}

	public function RegistrarCita()
	{

		$permitir = ModeloSolicitud::BuscarSoli($_POST["inmueble"]);

		if ($permitir == false && $_POST['tipo_solicitud'] == 1) {

			$respuesta = array('status' => false, "mensaje" => "Ya ha solicitado una cita para este inmueble. Debe esperar 3 días hábiles para solicitar otra.");
			$this->generarRespuesta($respuesta);

		} else {

			$data_db = ModeloSolicitud::InsertarSolicitudModelo($_POST);

		}

		if ($_POST['tipo_solicitud'] == 1) {

			ModeloSolicitud::InsertarRepresentanteSolicitud($_POST);
			ModeloSolicitud::InsertarMotivoCita($_POST);
			ModeloSolicitud::InsertarCitaModelo($_POST);

		}

		$accion = array(
			1 => "Cita",
			2 => "Empadronamiento",
			3 => "Evacuación de Titulo Supletorio",
			4 => "Contrato",
			5 => "Rectificación de Medida y Linderos",
			6 => "Obteción de Copias Certificadas",
			7 => "Regulación de la Tenencia de la Tierra",
		);

		if ($data_db == true) {

			$auditoria = array(
				"id_usuario" => $_POST["cedula"],
				"descripcion" => "Solicitud de " . $accion[$_POST['tipo_solicitud']] . " Registrada con el codigo C.E" . $_POST["codigo"],
				"evento" => "Solicitud Registrada",
			);

			$session = $this->generarAuditoria($auditoria);

			$respuesta = array('status' => true, "mensaje" => "Solicitud Registrada con exito!");
			$this->generarRespuesta($respuesta);

		}
	}

	public function Inasistencia($id_usuario)
	{
		date_default_timezone_set('America/Caracas');
		$fecha = date("Y-m-d");

		$data_db = ModeloSolicitud::BuscarCitaModelo($id_usuario, $fecha);

		foreach ($data_db as $inancistencia) {

			$actualizar = array(
				"codigo" => $inancistencia["id_solicitud"],
				"estado_solicitud" => 4,
			);

			ModeloSolicitud::ActualizarSolicitudModelo($actualizar);

		}

	}

	public function RegisDocCita()
	{

		$data_db = ModeloCodigo::InmuebleFichaModelo($_POST);

		$_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $data_db : $_POST["id_inmueble"];

		ModeloDoc::CarpetaInmueble($_FILES, $_POST);


	}

	public function RegisNegar()
	{

		$data_db = ModeloSolicitud::NegarSolicitudModelo($_POST);

		if ($data_db == true) {

			$auditoria = array(
				"id_usuario" => $_POST["id_funcionario"],
				"descripcion" => "Negacion Hecha por el funcionario de ID " . $_POST["id_funcionario"] . " a la Solicitud de con el codigo C.E" . $_POST["codigo"],
				"evento" => "Negacion Registrada",
			);

			$session = $this->generarAuditoria($auditoria);

			$respuesta = array('status' => true, "mensaje" => "Accion Registrada con exito!");
			$this->generarRespuesta($respuesta);

		}

	}

	public function AprobarSoli($data, $funcionario)
	{

		if ($data['tipo_solicitud'] == 1) {

			date_default_timezone_set('America/Caracas');

			$fechaActual = new DateTime();

			// Obtener el día de la semana (0 = domingo, 6 = sábado)
			$diaSemana = $fechaActual->format('w');

			// Si es viernes (día de la semana = 5), sumar 3 días, sino sumar 1 día
			if ($diaSemana == 5) {
				$fechaActual->modify('+3 days');
			} else {
				$fechaActual->modify('+1 day');
			}

			// Formatear la fecha como "d/m/Y"
			$dato = $fechaActual->format('Y-m-d');


			$data_db = ModeloSolicitud::FechaAprobacion($dato);
			ModeloSolicitud::AprobarCitaModelo($data, $data_db);

		}

		$data_db = ModeloSolicitud::ActualizarSolicitudModelo($data);

		if ($data_db == true) {

			$auditoria = array(
				"id_usuario" => $funcionario,
				"descripcion" => "Aprobación Hecha por el funcionario de ID " . $funcionario . " a la Solicitud de con el codigo C.E" . $data["codigo"],
				"evento" => "Aprobación Registrada",
			);

			$this->generarAuditoria($auditoria);

		}

	}

	public function BuscarCita($dato)
	{
		$data_db = ModeloSolicitud::ListaCitaModelo($dato);

		foreach ($data_db as $row) {
			$datos =
				array(
					//Datos de la Solicitud
					"id_solicitud" => $row['id_solicitud'],
					"estado_solicitud" => $row['estado_solicitud'],
					"id_usuario" => $row['id_usuario'],
					"id_motivo" => $row['id_motivo'],
					"fecha_solicitud" => $row['fecha_solicitud'],
					"id_inmueble" => $row['id_inmueble'],
					"razon_inmueble" => $row['razon_inmueble'],

					"nombre_usuario" => $row['nombre'],
					"apellido_usuario" => $row['apellido'],

					"nombre" => $row['nombre_inmueble'],
					"n_civico" => $row['n_civico'],
					"id_tipo_construccion" => $row['id_tipo_construccion'],
					"tipo_construccion" => $row['tipo_construccion'],

					//Datos del Motivo
					"id_motivo_cita" => $row['id_motivo_cita'],
					"codigo_cita" => $row['codigo_cita'],
					"cantidad_cita" => $row['cantidad_cita'],
					"cita_totales" => $row['cita_totales'],

					//Datos del Representante
					"id_representante" => $row['id_representante'],
					"cedula_representante" => $row['cedula_representante'],
					"nombre_completo" => $row['nombre_completo'],
					"apellido_completo" => $row['apellido_completo'],
					"numero_representante" => $row['numero_representante'],
					"estado_representante" => $row['estado_representante'],
				);

			if ($row['estado_solicitud'] == 1) {

				$toggle = " 
								<span class='text-md float-center badge badge-warning right'>EN ESPERA <i class='bi bi-hourglass-split'></i></span>
							";

			} else if ($row['estado_solicitud'] == 2) {

				$toggle = " 						
					<form action='reporte/CertificadoCita.php' method='post'>
						<input type='hidden' name='datos' value='" . htmlentities(serialize($datos)) . "'>
						<button type='submit' class='btn btn-danger'>Imprimir Certificado de Cita <span class='bi bi-printer-fill'></span></button>
					</form>
					";

			} else {

				$toggle = " 						
								<span class='text-md float-center badge badge-danger right'>CANCELADA <i class='fa fa-ban'></i></span>
							";

			}

			$fechaObjeto = DateTime::createFromFormat('Y-m-d', $row['fecha_solicitud']);
			$fecha = $fechaObjeto->format('d-m-Y');

			echo "
				<tr data-widget='expandable-table' aria-expanded='false'>
            	  <td>" . $row['id_solicitud'] . "</td>
            	  <td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
				  <td>" . $fecha . "</td>
            	  <td>" . $row['codigo_cita'] . "</td>
				  <td> 					
				  	" . $toggle . "
				  </td>
            	</tr>
            	<tr class='expandable-body'>
            	  <td colspan='5' class='p-3'>
            	    <p> Razon de la Solicitud: " . $row['razon_inmueble'] . "<br>
					<br>Motivo de la Solicitud:
					<br>" . $row['cantidad_cita'] . "</p>
            	  </td>
            	</tr>";

		}
	}

	public function ConsultaCita($dato)
	{
		$data_db = ModeloSolicitud::ListaCitaModelo($dato);

		$n = 0;

		foreach ($data_db as $row) {

			$n++;

			$datos =
				array(
					//Datos de la Solicitud
					"id_solicitud" => $row['id_solicitud'],
					"estado_solicitud" => $row['estado_solicitud'],
					"id_usuario" => $row['id_usuario'],
					"fecha_solicitud" => $row['fecha_solicitud'],
					"id_inmueble" => $row['id_inmueble'],
					"razon_inmueble" => $row['razon_inmueble'],

					"nombre_usuario" => $row['nombre'],
					"apellido_usuario" => $row['apellido'],

					"nombre_inmueble" => $row['nombre_inmueble'],
					"n_civico" => $row['n_civico'],
					"id_tipo_contruccion" => $row['id_tipo_construccion'],
					"tipo_contruccion" => $row['tipo_construccion'],

					//Datos del Motivo
					"id_motivo_cita" => $row['id_motivo_cita'],
					"codigo_cita" => $row['codigo_cita'],
					"cantidad_cita" => $row['cantidad_cita'],
					"cita_totales" => $row['cita_totales'],

					//Datos del Representante
					"id_representante" => $row['id_representante'],
					"cedula_representante" => $row['cedula_representante'],
					"nombre_completo" => $row['nombre_completo'],
					"apellido_completo" => $row['apellido_completo'],
					"numero_representante" => $row['numero_representante'],
					"estado_representante" => $row['estado_representante'],
				);

			if ($row['estado_solicitud'] == 1) {

				$toggle = " 
								<span class='text-md float-center badge badge-warning right'>EN ESPERA <i class='bi bi-hourglass-split'></i></span>
							";

			} else if ($row['estado_solicitud'] == 2) {

				$toggle = " 						
					<form action='../../reporte/CertificadoCita.php' method='post'>
						<input type='hidden' name='datos' value='" . htmlentities(serialize($datos)) . "'>
						<button type='submit' class='btn btn-danger'>Imprimir Certificado de Cita <span class='bi bi-printer-fill'></span></button>
					</form>
					";

			} else {

				$toggle = " 						
								<span class='text-md float-center badge badge-danger right'>CANCELADA <i class='fa fa-ban'></i></span>
							";

			}
			$fechaObjeto = DateTime::createFromFormat('Y-m-d', $row['fecha_solicitud']);
			$fecha = $fechaObjeto->format('d-m-Y');
			echo "
			    <tr>
          		  	<td>" . $n . "</td>
          		  	<td>" . $row['id_solicitud'] . "</td>
          		  	<td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
					<td>" . $fecha . "</td>
          		  	<td>" . $row['codigo_cita'] . "</td>
	
				    <td> 					
						" . $toggle . "
					</td>

            	</tr>";

		}
	}

	public function ConsultaSoliUsuario($dato)
	{
		$data_db = ModeloSolicitud::ListaSoliUsuarioModelo($dato);

		$n = 0;

		foreach ($data_db as $row) {

			$n++;
			$accion = array(
				1 => "Cita",
				2 => "Empadronamiento",
				3 => "Evacuación de Titulo Supletorio",
				4 => "Contrato",
				5 => "Rectificación de Medida y Linderos",
				6 => "Obteción de Copias Certificadas",
				7 => "Regulación de la Tenencia de la Tierra",
			);

			$datos =
				array(
					//Datos de la Solicitud
					"id_solicitud" => $row['id_solicitud'],
					"estado_solicitud" => $row['estado_solicitud'],
					"id_usuario" => $row['id_usuario'],
					"fecha_solicitud" => $row['fecha_solicitud'],
					"id_inmueble" => $row['id_inmueble'],
					"razon_inmueble" => $row['razon_inmueble'],
					"razon_negar" => $row['razon_negar'],

					"tipo_solicitud" => $row['tipo_solicitud'],
					"tipo_solicitud_text" => $accion[$row['tipo_solicitud']],

					"nombre_usuario" => $row['nombre'],
					"apellido_usuario" => $row['apellido'],

					"nombre_inmueble" => $row['nombre_inmueble'],
					"n_civico" => $row['n_civico'],
					"id_tipo_contruccion" => $row['id_tipo_construccion'],
					"tipo_contruccion" => $row['tipo_construccion'],

				);

			if ($row['estado_solicitud'] == 1) {

				$toggle = " 
								<span class='text-md float-center badge badge-warning right'>EN ESPERA <i class='bi bi-hourglass-split'></i></span>
							";

			} else if ($row['estado_solicitud'] == 2) {

				$toggle = " 						
						<span class='text-md float-center badge badge-primary right'>APROBADO <i class='bi bi-check2-circle'></i></span>
					";

			} else {

				$toggle = "
					<div class='row'>
						<div class='col'>
							<button type='button' class='btn btn-danger' data-toggle='modal' data-target='#verDetalles-" . $row['id_solicitud'] . "'>
								Ver Negacion <i class='fa fa-eye'></i>
							</button> 
						</div>
						<div class='col'>				
								<button type='button' class='text-md float-center btn btn-danger right'>CANCELADA <i class='bi bi-x-circle'></i></button>
						</div>
					</div>
					";

				echo $this->verNegacion($datos);

			}

			if ($row["leida_estado"] == 1) {
				$leer = "<span class='text-sm float-right badge badge-danger right'>NUEVO</span>";
			} else {
				$leer = "";
			}

			$accion = array(
				1 => "Cita",
				2 => "Empadronamiento",
				3 => "Evacuación de Titulo Supletorio",
				4 => "Contrato",
				5 => "Rectificación de Medida y Linderos",
				6 => "Obteción de Copias Certificadas",
				7 => "Regulación de la Tenencia de la Tierra",
			);

			$fechaObjeto = DateTime::createFromFormat('Y-m-d', $row['fecha_solicitud']);
			$fecha = $fechaObjeto->format('d-m-Y');

			if ($row['estado_solicitud'] != 4) {

				echo "
			    <tr>
          		  	<td>" . $n . "</td>
          		  	<td>" . $row['id_solicitud'] . "</td>
          		  	<td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
					<td>" . $fecha . "</td>
          		  	<td> Solicitud de " . $accion[$row['tipo_solicitud']] . " 
					
						" . $leer . "
					</td>
	
				    <td> 					
						" . $toggle . "
					</td>

            	</tr>";

			}
		}
	}

	public function verNegacion($datos)
	{

		echo '<div class="modal fade" id="verDetalles-' . $datos['id_solicitud'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            		Razon de la Negacion: ' . $datos["razon_negar"] . '<br>
            	
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
					Tipo de la Solicitud: ' . $datos["tipo_solicitud_text"] . '<br>
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

	public function ConsultaSoli($dato)
	{
		$result = ModeloSolicitud::ListaSoliModelo($dato);

		$n = 0;

		foreach ($result as $row) {

			$n++;

			$parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

			$accion = array(
				1 => "Cita",
				2 => "Empadronamiento",
				3 => "Evacuación de Titulo Supletorio",
				4 => "Contrato",
				5 => "Rectificación de Medida y Linderos",
				6 => "Obteción de Copias Certificadas",
				7 => "Regulación de la Tenencia de la Tierra",
			);
			$fechaObjeto = DateTime::createFromFormat('Y-m-d', $row['fecha_solicitud']);
			$fecha = $fechaObjeto->format('d-m-Y');
			$datos =
				array(
					"codigo" => $row['id_solicitud'],
					"id_solicitud" => $row['id_solicitud'],
					"fecha_solicitud" => $fecha,
					"estado_solicitud" => $row['estado_solicitud'] + 1,
					"id_usuario" => $row['id_usuario'],
					"id_inmueble" => $row['id_inmueble'],
					"id_direccion_inmueble" => $row['id_direccion_inmueble'],

					"tipo_solicitud" => $row['tipo_solicitud'],
					"tipo_solicitud_text" => $accion[$row['tipo_solicitud']],

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


			echo $this->verDetalles($datos);
			
			echo "
			    <tr>
          		  	<td>" . $n . "</td>
          		  	<td>" . $row['id_usuario'] . " " . $row['nombre'] . " " . $row['apellido'] . "</td>
          		  	<td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
          		  	<td>" . $accion[$row['tipo_solicitud']] . "</td>
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

	public function CalendarioCita($dato)
	{
		$data_db = ModeloSolicitud::ListaCitaModelo($dato);

		$data = [];
		foreach ($data_db as $row) {
			$data[] = [
				'title' => "Inmueble #" . $row['n_civico'] . " | Codigo Motivos " . $row['codigo_cita'],
				'start' => date('Y-m-d h:i:s', strtotime($row['fecha_otorgada'] . ' 08:00:00')),
				'textColor' => "dark",
			];

		}
		// Convertir $data a formato JSON
		$json_data = json_encode($data);

		// Devolver el JSON
		return $json_data;

	}

	public function BuscarOCC($dato)
	{
		$data_db = ModeloSolicitud::ListaSoliModelo($dato);

		$n = 0;

		foreach ($data_db as $row) {

			$n++;

			if ($row['estado_solicitud'] == 1) {
				$toggle = " 						
							<form action='../../reporte/CertificadoCopias.php' method='post'>
								<input type='hidden' name='datos' value='" . $row['id_solicitud'] . "'>
								<button type='submit' class='btn btn-danger'>Imprimir Certificado de Cita <span class='bi bi-printer-fill'></span></button>
							</form>
						";
			} else if ($row['estado_solicitud'] == 2) {
				$toggle = " 
							<span class='text-md float-center badge badge-warning right'>EN ESPERA <i class='bi bi-hourglass-split'></i></span>
						";
			} else {
				$toggle = " 						
							<span class='text-md float-center badge badge-danger right'>NEGADA <i class='fa fa-ban'></i></span>
						";
			}

			echo "
			    <tr>
          		  	<td>" . $n . "</td>
          		  	<td>" . $row['id_solicitud'] . "</td>
          		  	<td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
          		  	<td>" . $row['id_solicitud'] . "</td>
				  	<td>  4 </td>
	
				    <td> 					
						" . $toggle . "
					</td>
            	</tr>";

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

$ControlerCita = new ControlerCita();

if (isset($_POST["RegistrarCita"])) {

	require_once "../Model/ModeloCodigo.php";
	require_once "../Model/ModeloDoc.php";
	require_once "../Model/ModeloSolicitud.php";
	require_once "../Model/ModeloUsuario.php";
	$ControlerCita->RegisDocCita();
	$ControlerCita->RegistrarCita();

} else if (isset($_POST["NegarCita"])) {

	require_once "../Model/ModeloSolicitud.php";
	$ControlerCita->ToggleCita();

} else if (isset($_POST["NegarSoli"])) {

	require_once "../Model/ModeloUsuario.php";
	require_once "../Model/ModeloSolicitud.php";
	$ControlerCita->RegisNegar();

} else if (isset($_POST["AprobarSoli"])) {

	require_once "../Model/ModeloUsuario.php";
	require_once "../Model/ModeloSolicitud.php";
	$data = unserialize($_POST['AprobarSoli']);
	$funcionario = unserialize($_POST['funcionario']);
	$ControlerCita->AprobarSoli($data, $funcionario);

	header("Location: ../../consul/solicitud/consul_solicitud.php");

}
