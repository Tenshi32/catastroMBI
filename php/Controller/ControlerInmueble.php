<?php

class ControlerInmueble
{

    public function RegistrarInmueble()
    {

        $data_db = ModeloInmueble::InsertarInmuebleUsuarioModelo($_POST);

        if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Inmueble Registrado Con exito");
            $this->generarRespuesta($respuesta);

            $auditoria = array(
                "id_usuario" => $_POST["id_usuario"],
                "descripcion" => "Inmueble Registrado Con exito con el codigo C.E ".$_POST["codigo"],
                "evento" => "Inmueble Registrado",
            );

            $this->generarAuditoria($auditoria);


        }

    }

    public function ActualizarInmueble()
    {

        $data_db = ModeloInmueble::UpdateInmuebleModelo($_POST);

        if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Inmueble Actualizado Con exito");
            $this->generarRespuesta($respuesta);

            $auditoria = array(
                "id_usuario" => $_POST["id_usuario"],
                "descripcion" => "Inmueble Actualizado Con exito con el codigo C.E ".$_POST["codigo"],
                "evento" => "Inmueble Actualizado",
            );

            $this->generarAuditoria($auditoria);


        }

    }

    public function ConsultaInmueble($datos)
    {

        $data_db = ModeloInmueble::ConsultaInmueble($datos);

        $n = 0;
        foreach ($data_db as $row) {

            $parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

            $tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

            $n++;

            $datos = array(
                "id_usuario" => $row['id_usuario'],
                "codigo" => $row['id_inmueble'],
                "nombre_inmueble" => $row['nombre_inmueble'],
                "descripcion_inmueble" => $row['descripcion_inmueble'],
                "parroquia" => $row['parroquia'],
                "parroquia_n" => $parroquia,
                "residencia" => $row['residencia'],

                "tenencia_n" => $tenencia,
                "tenencia" => $row['tenencia_inmueble'],
                "n_civico" => $row['n_civico'],

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

                "lugar_inmuble_tipo" => $row['id_tipo_lugar_inmueble'],
                "lugar_inmuble_text" => $row['tipo_lugar_inmueble'],
                "lugar_inmuble" => $row['lugar_inmueble'],
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

            $this->DetallesInmueble($datos);
            echo "
		  			<td>" . $n . "</td>
		  			<td>" . $row['n_civico'] . "<br></td>
		  			<td>" . $parroquia . "<br></td>
		  			<td>" . $row['residencia'] . "<br></td>
		  			<td>" . $tenencia . "<br></td>";

            echo '
				<td>
					<div class="row">
						<div class="col">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-' . $row['id_inmueble'] . '">
								Ver Detalles  <span class="fa fa-eye"></span>
							</button> 
						</div>
						<div class="col">
							<form action="../../Update/UpdaInmueble.php" method="post">
							  <input type="hidden" name="datos" value="' . htmlentities(serialize($datos)) . '">
							  <button type="submit" class="btn btn-success">Editar <span class="fa fa-edit"></span></button>
							</form>
						</div>
		  			</div>
				</td> 
			</tr>';
        }

    }

    public function DatosInmueble($row)
    {

        $parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

        $tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

    }

    public function ReporteInmueble($datos)
    {

        $row = ModeloInmueble::ConsultaInmueble($datos);

        $parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

        $tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

        $datos = array(
            "id_usuario" => $row['id_usuario'],
            "codigo" => $row['id_inmueble'],
            "nombre_inmueble" => $row['nombre_inmueble'],
            "descripcion_inmueble" => $row['estado_inmueble'],
            "parroquia" => $row['parroquia'],
            "parroquia_n" => $parroquia,
            "residencia" => $row['residencia'],

            "tenencia_n" => $tenencia,
            "tenencia" => $row['tenencia_inmueble'],
            "n_civico" => $row['n_civico'],

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

    }

    public function DetallesInmueble($datos)
    {

        echo '<div class="modal fade" id="verDetalles-' . $datos['codigo'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos de la Inscrpcion</h5>
			  </div>
			  <div class="modal-body">
				<p>Nº de inscripcion: ' . $datos['id_usuario'] . '</p>
				<p>Datos del Proveedor:</p>
				<ul>
					' . $datos['descripcion_contruccion'] . ' | N° Civico ' . $datos['n_civico'] . ' <br>
					Tenencia ' . $datos['tenencia_n'] . '<br>
					Medida del Inmueble ' . $datos['medida_inmueble'] . ' Mts<sup>2</sup> <br>
                    Valor del Inmueble ' . $datos['valor_inmueble'] . ' Bs. <br>
					<hr>
					Direccion: <br>
					Parroquia ' . $datos['parroquia_n'] . ' | Residencia ' . $datos['residencia'] . '  <br>
					Ubicado en ' . $datos['descripcion_lugar'] . ' ' . $datos['lugar_inmuble'] . '<br>
					Entre ' . $datos['descripcion_ubicacion_entre'] . ' ' . $datos['ubicacion_entre_text'] . ' y ' . $datos['descripcion_ubicacion_y'] . ' ' . $datos['ubicacion_y_text'] . ' <br>
					<hr>
					Linderos <br>
					Norte : ' . $datos['norte_medida'] . 'Mts / Colinda con ' . $datos['norte_descripcion'] . ' <br>
					Sur : ' . $datos['sur_medida'] . 'Mts / Colinda con ' . $datos['sur_descripcion'] . ' <br>
					Este : ' . $datos['este_medida'] . 'Mts / Colinda con ' . $datos['este_descripcion'] . ' <br>
					Oeste : ' . $datos['oeste_medida'] . 'Mts / Colinda con ' . $datos['oeste_descripcion'] . ' <br>
				  
				</ul>
			  </div>
			  <div class="modal-footer bg-dark">
				<button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>';
    }

    public function EliminarInmueble($datos)
    {

        $this->generarRespuesta($datos);
        $this->generarAuditoria($datos);
        echo "Eliminando inmueble con los siguientes datos:";
        print_r($datos);

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
            "id" => $datos["status"],
            "descripcion" => "Sea Registrado una Solicitud con el codigo CS-0" . $datos["status"],
            "evento" => "Solicitud Registrada",
            "time" => date("H:i"),
            "date" => date("d-m-Y"),
        );

        $session = new ModeloUsuario();
        $session->InsertarAuditoriaUsuario($auditoria);

    }

}

$controladorInmueble = new ControlerInmueble();

if (isset($_POST["RegisInmueble"])) {


    require_once "../Model/ModeloInmueble.php";
    require_once "../Model/ModeloUsuario.php";
    // Llamar a la función específica que deseas ejecutar
    $controladorInmueble->RegistrarInmueble();

} else if (isset($_POST["UpdateInmueble"])) {

    require_once "../Model/ModeloInmueble.php";
    require_once "../Model/ModeloUsuario.php";
    // Llamar a la función específica que deseas ejecutar
    $controladorInmueble->ActualizarInmueble();

}