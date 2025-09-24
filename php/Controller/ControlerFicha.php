<?php

class ControlerFicha
{

    public function RegisFicha()
    {
        $data_db = ModeloFicha::InsertarFichaModelo($_POST);

        if ($data_db == true) {

            $auditoria = array(
                "id_usuario" => $_POST["id_usuario"],
                "descripcion" => "Sea Inscrito el Inmueble del codigo C.E " . $_POST["inmueble"],
                "evento" => "Inscripcion del Inmueble",
            );

            $session = $this->generarAuditoria($auditoria);

            $respuesta = array('status' => true, "mensaje" => "Accion Registrada con exito!");
            $this->generarRespuesta($respuesta);

        }
    }

    public function RegisDocFicha()
    {


    }

    public function RegisComp()
    {
        $_POST["subparcela_codigo"] = ($_POST["subparcela_si"] != "") ? $_POST["subparcela_si"] : $_POST["subparcela_no"];
        $_POST["parcela_codigo"] = ($_POST["parcela_si"] != "") ? $_POST["parcela_si"] : $_POST["parcela_no"];
        $_POST["unidad_codigo"] = ($_POST["unidad_si"] != "") ? $_POST["unidad_si"] : $_POST["unidad_no"];
        $_POST["nivel_codigo"] = ($_POST["nivel_si"] != "") ? $_POST["nivel_si"] : $_POST["nivel_no"];

        $data_db = ModeloCodigo::InsertarCodigoCatastralModelo($_POST);

        $_POST["id_inmueble"] = (isset($_POST["id_inmueble"])) ? $data_db : $_POST["id_inmueble"];

        ModeloDoc::CarpetaInmueble($_FILES, $_POST);
        ModeloCodigo::CodigoQr($_POST);

    }

    public function ConsultaFicha($id_ususario)
    {

        $result = ModeloFicha::BuscarConstanciaCatastralModelo($id_ususario);

        $dato = 0;

        foreach ($result as $row) {

            $dato++;

            if ($row['estado_inmueble'] == 2) {

                $toggle = " 
                    <td>
                        <form action='../../reporte/ComprobanteInsc.php' method='post'>
                          <input type='hidden' name='datos' value='" . $row['id_inmueble'] . "'>
                          <button type='submit' class='btn btn-danger'>Imprimir Comprobante de Inscripción <span class='bi bi-printer-fill'></span></button>
                        </form>
                    </td>
                    <br>";

            } else if ($row['estado_inmueble'] == 4) {

                $toggle = " 
                    <td>
		            	<form action='../../reporte/ConstanciaInsc.php' method='post'>
		            	  <input type='hidden' name='datos' value='" . $row['id_inmueble'] . "'>
		            	  <button type='submit' class='btn btn-danger'>Imprimir Constancia Catastral <span class='bi bi-printer-fill'></span></button>
		            	</form>
		            </td>
                    <br>";

            }

            echo "
		  <td>#" . $dato . "<br> </td>
		  <td>" . $row['sector_catastral'] . $row['manzana_catastral'] . $row['parcela_catastral'] . $row['parroquia_catastral'] . "<br></td>
		  <td> N° Cívico " . $row['n_civico'] . "<br></td>
		  <td> V-" . $row['id_usuario'] . " <br>
			" . $row['nombre'] . " " . $row['apellido'] . "
		  </td>";

            echo $toggle  ;

            echo "</tr>";
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

$ControlerFicha = new ControlerFicha();

if (isset($_POST["RegisFicha"])) {

    require_once "../Model/ModeloDoc.php";
    require_once "../Model/ModeloCodigo.php";
    require_once "../Model/ModeloFicha.php";
    require_once "../Model/ModeloUsuario.php";

    $ControlerFicha->RegisComp();
    $ControlerFicha->RegisDocFicha();
    $ControlerFicha->RegisFicha();

}

?>