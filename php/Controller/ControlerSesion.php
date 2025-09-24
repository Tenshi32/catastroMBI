<?php

class ControlerSession
{

    public function InicioSesion()
    {

        $data_db = ModeloUsuario::BuscarUsuarioModelo($_POST);

        switch ($data_db) {
            //Caso de Ususrio Bloqueado
            case $data_db["estado"] == 2:

                $respuesta = array('status' => false, "mensaje" => "Usuario Bloqueado");
                $this->generarRespuesta($respuesta);

                break;

            //Caso Usuario Desbloqueado Exitoso
            case $data_db["estado"] == 1 && $data_db["status"] == true:



                $auditoria = array(
                    "id_usuario" => $data_db["id_usuario"],
                    "descripcion" => "Ha Iniciado Sesion",
                    "evento" => "Sesion Iniciada",
                );

                $session = $this->generarAuditoria($auditoria);

                if ($session == true) {

                    require_once '../Model/ModeloSolicitud.php';
                    require_once 'ControlerCita.php';

                    $ControlerCita = new ControlerCita();
                    $ControlerCita->Inasistencia($data_db["id_usuario"]);

                    if ($data_db["nivel"] == 0){
                        $this->tasa();
                    }

                    $respuesta = array('status' => true, "mensaje" => "!Bienvenido!");
                    $this->generarRespuesta($respuesta);

                }

                break;

            //Caso Usuario Desbloqueado Fallido
            case $data_db["estado"] == 1 && $data_db["status"] == false:

                $this->SistemBloq($data_db);

                break;

            default:

                $respuesta = array('status' => false, "mensaje" => "Usuario o Contraseña Invalida");
                $this->generarRespuesta($respuesta);

                break;

        }

    }

    public function tasa()
    {
        
        $url = "https://magicloops.dev/api/loop/2347f6a1-20a8-42a7-8e1f-6fe1ac5d76fd/run";
        $data = array(
            "solicitud" => "Obtener tasas de cambio BCV",
            "detalles" => "Tasas de dólar y euro"
        );

        // Codifica los datos de PHP a formato JSON
        $json_data = json_encode($data);

        // Define las opciones del contexto de flujo para la petición POST
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/json',
                'content' => $json_data
            )
        );

        // Crea el contexto de flujo
        $context = stream_context_create($options);

        // Realiza la petición POST y obtén la respuesta
        $response = file_get_contents($url, false, $context);

        if ($response === false) {

            $error = error_get_last();
            echo "Error al realizar la petición: " . $error['message'];

        } else {

            $response_data = json_decode($response, true);

            if ($response_data !== null) {
                
                
                $euro_float = (float) $response_data['euro'];
                $dolar_float = (float) $response_data['dolar'];
                $tasa = array (
                    "dolar" => number_format($dolar_float, 2, '.', ''),
                    "euro" => number_format($euro_float, 2, '.', ''),
                );

                $datos = array(
                    "cambio" => "2",
                    "fecha" => date("d-m-Y"),
                    "valor" => $tasa["euro"],
                    "estado" => "1",
                );

                ModeloMoneda::InsertarDolarModelo($datos);

                $_SESSION["tasa"] = $tasa;


                
            } else {
                echo "\nLa respuesta no es un JSON válido.";
            }

        }

    }

    public function SistemBloq($data_db)
    {

        session_start();

        // Fallido 
        if (!isset($_SESSION["int"])) {


            $_SESSION["int"] = 0;

            $_SESSION["int"]++;

            $respuesta = array('status' => false, "mensaje" => "tiene 3 intentos antes de que se bloquee el usuario, lleva " . $_SESSION["int"]);
            $this->generarRespuesta($respuesta);

        } else if (isset($_SESSION["int"])) {

            $_SESSION["int"]++;

            if ($_SESSION["int"] >= 3) {

                session_unset();

                $data_db = array(
                    "status" => 2,
                    "usuario" => $_POST["usuario"]
                );
                ModeloUsuario::ToggleUsuarioModelo($data_db);

                $respuesta = array('status' => false, "mensaje" => "El Usuario se encuentra bloqueado por exceso de intentos erroneos");
                $this->generarRespuesta($respuesta);

            } else {

                $respuesta = array('status' => false, "mensaje" => "tiene 3 intentos antes de que se bloquee el usuario, lleva " . $_SESSION["int"]);
                $this->generarRespuesta($respuesta);

            }

        }
    }

    public function generarRespuesta($status)
    {

        $respuesta = array(
            'status' => $status["status"],
            'mensaje' => $status["mensaje"]
        );

        echo json_encode($respuesta);
        exit;
    }

    public function generarAuditoria($datos)
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

    public function SesionActiva()
    {
        session_start();
        $token = $_SESSION['token']; // Obtener el token de la cookie, o null si no existe

        if (!$token) {

            header('location: login.php');


        }

        $usuario = ModeloUsuario::VerificarUsuarioConectados($token);

        if (!$usuario) {

            $this->CerrarSesion();
            header('location: login.php');

        }

        $script = '
            <div class="modal fade" id="modalMantenerSesion" tabindex="-1" role="dialog" aria-labelledby="modalMantenerSesionLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modalMantenerSesionLabel">¿Mantener sesión activa?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Tu sesión expirará en 5 minutos. ¿Deseas mantenerla activa?
                  </div>
                  <div class="modal-footer">

                    <form method="post" id="CerrarSession">
                        <input type="hidden" name="CerrarSesion" id="CerrarSesion">
                        <button type="button" class="btn btn-secondary" id="btnCerrarSesion" data-dismiss="modal">Cerrar sesión</button>
                    </form>

                    <form method="post" id="ActivarSession">
                        <input type="hidden" name="SesionActiva" id="SesionActiva">
                        <button type="button" class="btn btn-primary" id="btnMantenerSesion">Mantener sesión</button>
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>';

        echo $script;

        return $usuario;
    }

    public function MantenerSesion()
    {
        session_start();
        $token = $_SESSION['token'];
        $usuario = ModeloUsuario::VerificarUsuarioConectados($token);

        if ($usuario == "") {

            header('location: login.php');
            exit;

        }

    }

    public function Funcionario()
    {

        session_start();
        $token = $_SESSION['token']; // Obtener el token de la cookie, o null si no existe

        if (!$token) {

            header('location: login.php');


        }

        $usuario = ModeloUsuario::VerificarUsuarioConectados($token);

        if (!$usuario) {

            $this->CerrarSesion();
            header('location: login.php');

        }

        return $usuario;
    }

    public function CerrarSesion()
    {
        session_start();
        $token = $_SESSION['token'];

        if ($token) {

            $usuario = ModeloUsuario::VerificarUsuarioConectados($token);

            if ($usuario) {

                $dato = array(
                    "id_usuario" => $usuario["id_usuario"],
                    "descripcion" => "Ha Cerrado Sesion",
                    "evento" => "Sesion Cerrada",
                );

                $this->generarAuditoria($dato);

                session_unset();

                session_destroy();


                $respuesta = array('status' => true, "mensaje" => "Cerrando Sesion");
                $this->generarRespuesta($respuesta);

            } else {

                $respuesta = array('status' => false, "mensaje" => "Falla en la Conexion");
                $this->generarRespuesta($respuesta);

            }

        } else {

            $respuesta = array('status' => false, "mensaje" => "No existe una sesion activa");
            $this->generarRespuesta($respuesta);

        }
    }

}

$ControlerSession = new ControlerSession();

if (isset($_POST["InicioSesion"])) {

    require_once '../Model/ModeloMoneda.php';
    require_once '../Model/ModeloUsuario.php';
    $ControlerSession->InicioSesion();


} else if (isset($_POST["CerrarSesion"])) {

    require_once '../Model/ModeloUsuario.php';
    $ControlerSession->CerrarSesion();

} else if (isset($_POST["SesionActiva"])) {

    require_once '../Model/ModeloUsuario.php';
    $ControlerSession->MantenerSesion();

}