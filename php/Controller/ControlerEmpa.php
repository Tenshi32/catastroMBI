<?php

class ControlerEmpa
{

    public function RegisEmpa()
    {

        $_POST["subparcela_codigo"] = ($_POST["subparcela_si"] != "") ? $_POST["subparcela_si"] : $_POST["subparcela_no"];
        
        $_POST["parcela_codigo"] = ($_POST["parcela_si"] != "") ? $_POST["parcela_si"] : $_POST["parcela_no"];

        $_POST["nivel_codigo"] = ($_POST["nivel_si"] != "") ? $_POST["nivel_si"] : $_POST["nivel_no"];

        $_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $_POST["id_inmueble"] : " ";

        $data_db = ModeloCodigo::InsertarCodigoCatastralModelo($_POST);
        ModeloCodigo::CodigoQr($_POST);
        $data_db = ModeloSolicitud::ActualizarSolicitudModelo($_POST);

        if ($data_db == true) {

            $auditoria = array(
                "id_usuario" => $_POST["id_usuario"],
                "descripcion" => "Empadronamiento Solicitado con el Codigo C.E " . $_POST["codigo"]." Certificado por el funcionario del codigo ".$_POST["id_usuario"],
                "evento" => "Certificacion de Empadronamiento",
            );

            $session = $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Accion Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function RegisSoliEmpa()
    {

        $data_sm = ModeloSolicitud::InsertarSolicitudModelo($_POST);
        ModeloEmpadronamiento::InsertarOcupanteModelo($_POST);
        $data_db = ModeloEmpadronamiento::InsertarEmpadronamientoModelo($_POST);

        if ($data_db == true && $data_sm == true) {

            $auditoria = array(
                "id_usuario" => $_POST["cedula"],
                "descripcion" => "Solicitud de Empadronamiento Registrada con el Codigo C.E " . $_POST["codigo"],
                "evento" => "Solicitud de Empadronamiento",
            );

            $session = $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Solicitud Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function RegisDocEmpa()
    {

        $data_db = ModeloCodigo::InmuebleFichaModelo($_POST);

        $_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $data_db : $_POST["id_inmueble"];

        ModeloDoc::CarpetaInmueble($_FILES, $_POST);

    }

    public function ConsultaSoliEmpa()
    {
        $data_db = ModeloEmpadronamiento::ConsultaSoliEmpaModelo();

        foreach ($data_db as $row) {
            $datos =
                array(
                    //Datos de la Solicitud
                    "id_solicitud" => $row['id_solicitud'],
                    "id_usuario" => $row['id_usuario'],
                    "id_inmueble_usuario" => $row['id_inmueble_usuario'],
                    "id_componente" => $row['id_componente'],

                    "fecha_solicitud" => $row['fecha_solicitud'],

                    "id_inmueble" => $row['id_inmueble'],
                    "razon_inmueble" => $row['razon_inmueble'],

                    "nombre_inmueble" => $row['nombre_inmueble'],
                    "n_civico" => $row['n_civico'],

                    "norte_lindero" => $row['norte_lindero'],
                    "norte_medida" => $row['norte_medida'],
                    "este_lindero" => $row['este_lindero'],
                    "este_medida" => $row['este_medida'],
                    "oeste_lindero" => $row['oeste_lindero'],
                    "oeste_medida" => $row['oeste_medida'],
                    "sur_lindero" => $row['sur_lindero'],
                    "sur_medida" => $row['sur_medida'],

                    "ci_rif" => $row['ci_rif'],
                    "nombre_ocupante" => $row['nombre_ocupante'],
                    "apellido_ocupante" => $row['apellido_ocupante'],
                    "telefono_ocupante" => $row['telefono_ocupante'],

                    "id_tipo_construccion" => $row['id_tipo_construccion'],
                    "tipo_contruccion" => $row['tipo_construccion'],

                );

            echo "
				<tr>
            	  <td>" . $row['id_solicitud'] . "</td>
            	  <td>" . $row['nombre'] . " " . $row['apellido'] . "</td>
            	  <td>" . $row['tipo_construccion'] . " N°" . $row['n_civico'] . "</td>
            	  <td>" . $row['nombre_ocupante'] . " " . $row['apellido_ocupante'] . "</td>
            	  <td>
				  	<form action='form-empa.php' method='post'>
						<input type='hidden' name='datos' value='" . htmlentities(serialize($datos)) . "'>
						<button type='submit' class='btn btn-primary'>Realizar Empadronamiento <span class='fa fa-edit'></span></button>
					</form>
				  </td>
            	</tr>";


        }
    }

    public function ConsultaEmpa()
    {
        $data_db = ModeloEmpadronamiento::BuscarCertificadoEmpadronamientoModelo();

        $dato = 0;

        foreach ($data_db as $row) {

            $dato++;

            $parroquia_catastral = ($row['parroquia_catastral'] == "001") ? "El Limon" : "Caña de Azucar";

            echo "
				<tr>
					<td>#" . $dato . "</td>
		  			<td>" . $row['n_civico'] . "</td>
		  			<td>" . $parroquia_catastral . "</td>
		  			<td>" . $row['residencia'] . "</td>
					<td>Numero de Telefono: " . $row['telefono_inmueble'] . "</td>
					<td>
						<form action='../../reporte/CertificadoEmpadronamiento.php' method='post'>
						  <input type='hidden' name='datos' value='" . $row['id_inmueble'] . "'>
						  <button type='submit' class='btn btn-danger'>Imprimir Certificado de Empadronamiento <span class='bi bi-printer-fill'></span></button>
						</form>
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

$ControlerEmpa = new ControlerEmpa();

if (isset($_POST["RegisEmpa"])) {

    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloEmpadronamiento.php";
    require_once "../Model/ModeloUsuario.php";
    require_once "../Model/ModeloSolicitud.php";

    $ControlerEmpa->RegisEmpa();

} else if (isset($_POST["SoliEmpa"])) {

    require_once "../Model/ModeloDoc.php";
    require_once "../Model/ModeloSolicitud.php";
    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloEmpadronamiento.php";
    require_once "../Model/ModeloUsuario.php";

    $ControlerEmpa->RegisDocEmpa();
    $ControlerEmpa->RegisSoliEmpa();

}