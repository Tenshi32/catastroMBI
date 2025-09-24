<?php

class ControlerInspeccion
{

    public function SoliInspec()
    {
        $data_db = ModeloSolicitud::InsertarSolicitudModelo($_POST);

        if ($data_db == true) {

            $auditoria = array(
                "id_usuario" => $_POST["cedula"],
                "descripcion" => "Sea Solicitado una Rectificacion de Medidas y Linderos al inmueble con el codigo C.E " . $_POST["codigo"],
                "evento" => "Solicitado una Rectificacion de Medidas y Linderos",
            );

            $session = $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Solicitud Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function RegisInspec()
    {

        ModeloInspeccion::ActualizarManzanaCodigoModelo($_POST);
        ModeloInspeccion::InsertarDatosAmbienteModelo($_POST);
        ModeloInspeccion::InsertarDatosGeneralesModelo($_POST);

        ModeloInspeccion::InsertarServicioPublicoModelo($_POST);
        ModeloInspeccion::InsertarDatosTerrenoModelo($_POST);

        ModeloInspeccion::InsertarParedesModelo($_POST);
        ModeloInspeccion::InsertarPuertaModelo($_POST);
        ModeloInspeccion::InsertarVentanaModelo($_POST);
        ModeloInspeccion::InsertarDatosComplementarioModelo($_POST);

        ModeloInspeccion::InsertarOtrosDatosModelo($_POST);
        ModeloInspeccion::InsertarDatosEstructuralesModelo($_POST);
        ModeloInspeccion::InsertarInspeccionModelo($_POST);
        $data_db = ModeloInspeccion::InsertarDatosInspeccionModelo($_POST);
        if ($data_db == true) {

            $auditoria = array(
                "id_usuario" => $_POST["id_funcionario"],
                "descripcion" => "Inspeccion Registrada por el funcionario con el codigo ".$_POST["id_funcionario"].", al inmueble con el codigo C.E " . $_POST["codigo"],
                "evento" => "Inspeccion Registrada",
            );

            $session = $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Solicitud Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function DistribucionEspacial()
    {
        // Definir los tipos de habitaciones
        $habitaciones = array(
            "dormitorio",
            "cocina",
            "banno",
            "comedor",
            "garage",
            "oficina",
            "sala",
            "servicio",
        );

        // Obtener el número de niveles (asumiendo que se envía en el POST)
        $niveles = $_POST['niveles']; // Ajusta el nombre del campo según tu formulario

        $resultadosTotal = array();
        $resultadosLista = array();
        
        foreach ($habitaciones as $habitacion) {

            $resultadosTotal[$habitacion] = 0; // Inicializar a 0
            $resultadosLista[$habitacion] = '';
            
            for ($i = 1; $i <= $niveles; $i++) {

                $campo = 'piso-' . $i . '-campo-' . $habitacion;

                // Obtener los datos POST
                $valor = isset($_POST[$campo]) ? $_POST[$campo] : null;

                $resultadosTotal = [];
                if ($valor !== null && is_numeric($valor)) {

                    if (!isset($resultadosTotal[$habitacion])) {

                        $resultadosTotal[$habitacion] = 0;

                    }

                    $resultadosTotal[$habitacion] += $valor;

                }

                $resultadosLista = [];
                // Concatenar los valores
                if ($valor !== null) {

                    if (!isset($resultadosLista[$habitacion])) {

                        $resultadosLista[$habitacion] = '';

                    }

                    if ($resultadosLista[$habitacion] !== '') {

                        $resultadosLista[$habitacion] .= ', ';

                    }

                    $resultadosLista[$habitacion] .= $valor;

                }

                
            }

            $lista = $resultadosLista[$habitacion];
            $total = $resultadosTotal[$habitacion];
            ModeloInspeccion::InsertarXHabitacion($habitacion, $lista, $total, $_POST);

        }


    }

    public function RegisDocInspec()
    {

        $data_db = ModeloCodigo::InmuebleFichaModelo($_POST);

        $_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $data_db : $_POST["id_inmueble"];

        ModeloDoc::CarpetaInmueble($_FILES, $_POST);

    }

    public function ConsultaSoliInspec($datos)
    {

        $data_db = ModeloInspeccion::listaSoliInspeccion($datos);

        foreach ($data_db as $row) {

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
                    "tipo_contruccion" => $row['id_tipo_construccion'],
                    "tipo_lugar" => $row['tipo_lugar_inmueble'],

                    "sector_expe" => $row['sectores'],
                    "nivel_expe" => $row['nivel_catastral'],
                    "id_sector_expe" => $row['id_sectores'],

                    "parroquia" => $row['parroquia'],
                    "residencia" => $row['residencia'],
                    "lugar_inmueble" => $row['lugar_inmueble'],
                    "ubicacion_inmueble_entre" => $row['ubicacion_inmueble_entre'],
                    "ubicacion_inmueble_y" => $row['ubicacion_inmueble_y'],
                    "punto_referencia" => $row['punto_referencia'],
                    "estado_inmueble" => $row['estado_inmueble'],
                );


            echo "
		  <td>" . $row['nombre_inmueble'] . "<br> </td>
		  <td>" . $row['n_civico'] . "<br></td>
		  <td>Numero de Telefono: " . $row['telefono_inmueble'] . "<br></td>";

            echo '<td><form action="../../reporte/ActaVerificacion.php" method="post">
				  <input type="hidden" name="datos" value="' . $row['id_direccion_inmueble'] . '">
				  <button type="submit" class="btn btn-danger">Imprimir Acta de Verificacion <span class="fa fa-file-pdf"></span></button>
				</form><br>';

            echo '<form action="form_inspe.php" method="post">
				  <input type="hidden" name="datos" value="' . htmlentities(serialize($datos)) . '">
				  <button type="submit" class="btn btn-primary">Generar Inspeccion <span class="fa fa-edit"></span></button>
				</form><br>';

            echo "</td> </tr>";
        }

    }

    public function ModalInfoInspec($datos)
    {

        $result = ModeloInspeccion::InmuebleSelectAccion($datos);


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

                "telefono_inmueble" => $result['telefono_inmueble'],
                "punto_referencia" => $result['punto_referencia'],

                "ubicacion_entre_tipo" => $result['id_tipo_ubicacion_entre'],
                "ubicacion_entre_text" => $result['tipo_ubicacion_entre'],
                "descripcion_ubicacion_entre" => $result['descripcion_ubicacion_entre'],

                "ubicacion_y_tipo" => $result['id_ubicacion_inmueble_y'],
                "ubicacion_y_text" => $result['ubicacion_inmueble_y'],
                "descripcion_ubicacion_y" => $result['descripcion_ubicacion_y'],

                "medida_inmueble" => $result['medida_inmueble'],
                "valor_inmueble" => $result['valor_inmueble'],

                "lugar_inmuble_tipo" => $result['id_tipo_lugar_inmueble'],
                "lugar_inmuble_text" => $result['tipo_lugar_inmueble'],
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

            );
        $this->verDetalles($datos);
        echo '            

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-' . $result['id_usuario'] . '">
                   Ver detalles del Inmueble <i class="fas fa-eye"></i>
                </button>

				<input type="hidden" id="inmueble" name="inmueble" value="' . $result['id_inmueble_usuario'] . '">
			  ';
    }

    public function verDetalles($datos)
    {

        echo '<div class="modal fade text-dark" id="verDetalles-' . $datos['id_usuario'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos del Inmueble</h5>
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

$ControlerInspeccion = new ControlerInspeccion();

if (isset($_POST["RegisInspec"])) {

    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloEvacuacion.php";
    require_once "../Model/ModeloUsuario.php";
    require_once "../Model/ModeloDoc.php";
    require_once "../Model/ModeloInspeccion.php";

    $ControlerInspeccion->RegisDocInspec();
    $ControlerInspeccion->DistribucionEspacial();
    $ControlerInspeccion->RegisInspec();

} else if (isset($_POST["SoliInspec"])) {

    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloDoc.php";
    require_once "../Model/ModeloSolicitud.php";
    require_once "../Model/ModeloInspeccion.php";
    require_once "../Model/ModeloUsuario.php";

    $ControlerInspeccion->RegisDocInspec();
    $ControlerInspeccion->SoliInspec();

}

?>