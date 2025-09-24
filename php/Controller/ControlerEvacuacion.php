<?php

class ControlerEvacuacion
{

    public function RegisEvac()
    {
        $data_db = ModeloEvacuacion::InsertarEvacuacionModelo($_POST);

        if ($data_db == true) {

            $auditoria = array(
                "id_usuario" => $_POST["cedula"],
                "descripcion" => "Sea Solicitado una Evacuación de Titulo Supletorio para el inmueble de codigo C.E " . $_POST["codigo"],
                "evento" => "Solicitud de Evacuación de Titulo Supletorio",
            );

            $session = $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Solicitud Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function RegisDocEvac()
    {

        $data_db = ModeloCodigo::InmuebleFichaModelo($_POST);

        $_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $data_db : $_POST["id_inmueble"];

        ModeloDoc::CarpetaInmueble($_FILES, $_POST);

    }

    public function ConsultaEvac($dato)
    {

        $result = ModeloEvacuacion::ConsultaEvacuacionModelo($dato);

        foreach ($result as $row) {

            $nTitulo = ($row["tipo_titulo"] == 1) ? $row["numero_titulo"] : $row["folio_titulo"] . $row["tomo_titulo"] . $row["protocolo_titulo"];

            echo "
				<tr>
            	  	<td>" . $row['id_titulo_supletorio'] . "</td>
            	  	<td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
            	  	<td>" . $row["nombre"] . " " . $row["apellido"] . "</td>
            	  	<td>" . $nTitulo . "</td>
             		<td class='text-center'>
                        <form action='../../reporte/CertificadoAutorozacionTS.php' method='post'>
						  <input type='hidden' name='datos' value='" . $row['id_titulo_supletorio'] . "'>
						  <button type='submit' class='btn btn-danger'>Planilla de Autorización <span class='fa fa-file-pd'></span></button>
						</form>
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

$ControlerEvacuacion = new ControlerEvacuacion();

if (isset($_POST["RegisEvac"])) {

    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloEvacuacion.php";
    require_once "../Model/ModeloUsuario.php";
    $UsuarioM = new ModeloUsuario();

    $ControlerEvacuacion->RegisEvac();

} else if (isset($_POST["SoliEvac"])) {

    require_once "../Model/ModeloDoc.php";
    require_once "../Model/ModeloSolicitud.php";
    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloEvacuacion.php";
    require_once "../Model/ModeloUsuario.php";

    $ControlerEvacuacion->RegisDocEvac();
    $ControlerEvacuacion->RegisEvac();

}
