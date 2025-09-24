<?php

class ControlerUsuario
{

    public function RegisUsuario()
    {

        $data_db = ModeloUsuario::BuscarNameUsuario($_POST["usuario"]);

        if ($data_db == true) {
            if ($_POST["PasswdConfirm"] == $_POST["Passwd"]) {
                if (preg_match("/[A-Z]/", $_POST["usuario"])) {

                    ModeloUsuario::InsertarUsuarioModelo($_POST);
                    $data_db = ModeloUsuario::InsertarPreguntasModelo($_POST);

                    if ($data_db == true) {

                        $dato = array(
                            "id" => $_POST["cedula"],
                            "descripcion" => "Sea Registrado un usuario con el codigo CI-" . $_POST["cedula"],
                            "evento" => "Registrado de Usuario",
                            "time" => date("H:i"),
                            "date" => date("d-m-Y"),
                        );

                        ModeloUsuario::InsertarAuditoriaUsuario($dato);

                        $respuesta = array('status' => true, "mensaje" => "Usuario Registrado con exito!");
                        $this->generarRespuesta($respuesta);

                    } else {

                        $respuesta = array('status' => false, "mensaje" => "Intentelo otra vez");
                        $this->generarRespuesta($respuesta);

                    }

                } else {
                    $respuesta = array('status' => false, "mensaje" => "El Usuario debe tener una Mayúscula por lo mínimo");
                    $this->generarRespuesta($respuesta);

                }
            } else {
                $respuesta = array('status' => false, "mensaje" => "Las Contraseñas no son iguales");
                $this->generarRespuesta($respuesta);

            }
        } else {
            $respuesta = array('status' => false, "mensaje" => "El Usuario ya existe");
            $this->generarRespuesta($respuesta);

        }

    }

    public function ActualizarUsuario()
    {

        $data_db = ModeloUsuario::ActualizarUsuarioModelo($_POST);

        if ($data_db == true) {

             $dato = array(
                "id" => $_POST["cedula"],
                "descripcion" => "Sea actualizado los datos del usuario con el codigo CI-" . $_POST["cedula"],
                "evento" => "Registrado de Usuario",
                "time" => date("H:i"),
                "date" => date("d-m-Y"),
            );

            ModeloUsuario::InsertarAuditoriaUsuario($dato);

            $respuesta = array('status' => true, "mensaje" => "Usuario Actualizado con exito!");
            $this->generarRespuesta($respuesta);

        } else {

            $respuesta = array('status' => false, "mensaje" => "El Usuario no existe");
            $this->generarRespuesta($respuesta);

        }

    }

    public function ValidarPreguntaSeguridad()
    {

        $data_db = ModeloUsuario::ConfirmarPreguntas($_POST);

        if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Accion Completada");
            $this->generarRespuesta($respuesta);

        } else {

            $respuesta = array('status' => false, "mensaje" => "Una o varias de las respuestas no coinciden");
            $this->generarRespuesta($respuesta);

        }

    }

    public function RegisSugerencia()
    {

        $data_db = ModeloUsuario::InsertarSuegerenciaModelo($_POST);

        if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Sugerencia Registrada");
            $this->generarRespuesta($respuesta);

        } else {

            $respuesta = array('status' => false, "mensaje" => "Falla de Conexion");
            $this->generarRespuesta($respuesta);

        }

    }

    public function BuscarPreguntaSeguridad()
    {

        $result = ModeloUsuario::BuscarUsuarioPreguntas($_POST["usuario"]);

        if ($result > 0) {

            session_start();

            session_unset();

            $pregunta = array(
                "1" => "Cual es el modelo de su carro favorito ?",
                "2" => "Cual es su mascota favorita ?",
                "3" => "En que ciudad nacio su padre ?",
                "4" => "Nombre de su primer jefe ?",
                "5" => "Cual es el nombre de su abuela materna ?",
                "6" => "Cual es su color favorito ?",
            );

            $_SESSION["unlock"] = array(
                "userId" => $result["id_usuario"],
                "usuario" => $result["usuario"],
                "pregunta1" => $pregunta[$result["pregunta_1"]],
                "pregunta2" => $pregunta[$result["pregunta_2"]],
                "pregunta3" => $pregunta[$result["pregunta_3"]],
                "estado" => 1
            );

            $respuesta = array('status' => true, "mensaje" => "Usuario Encontrado");
            $this->generarRespuesta($respuesta);

        } else {

            $respuesta = array('status' => false, "mensaje" => "Usuario Incorrecto");
            $this->generarRespuesta($respuesta);

        }

    }

    public function ConfirPreguntaSeguridad()
    {

        $data_db = ModeloUsuario::ConfirmarPreguntas($_POST);

        if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Usuario Encontrado");
            $this->generarRespuesta($respuesta);

        } else {

            $respuesta = array('status' => false, "mensaje" => "Usuario Incorrecto");
            $this->generarRespuesta($respuesta);

        }

    }

    public function ConsultaUsuario($nivel)
    {

        $data_db = ModeloUsuario::ConsultaUsuario($nivel);

        if ($data_db == true) {

            $dato = 0;

            foreach ($data_db as $row) {

                $dato++;

                $datos = array(
                    "id_usuario" => $row['id_usuario'],
                    "usuario" => $row['usuario'],
                    "nombre" => $row['nombre'],
                    "apellido" => $row['apellido'],
                    "correo" => $row['correo'],
                    "cedula" => $row['cedula'],
                    "niveles" => $row['niveles'],
                    "status" => $status = ($row['estado'] == 1) ? 2 : 1,
                );

                if ($row['estado'] == 1) {

                    $toggle = '
                                <div class="col">
                                    <form action="../../php/Controller/ControlerUsuario.php" method="post">
				                      <input type="hidden" name="TogglesUsuario" value="' . htmlentities(serialize($datos)) . '">
				                      <button type="submit" class="btn btn-danger">Desactivar <span class="bi bi-toggle-off fa-lg"></span></button>
				                    </form><br>
                                </div> 
                                ';

                } else {

                    $toggle = '
                                <div class="col">
                                    <form action="../../php/Controller/ControlerUsuario.php" method="post">
				                      <input type="hidden" name="TogglesUsuario" value="' . htmlentities(serialize($datos)) . '">
				                      <button type="submit" class="btn btn-primary">Activar <span class="bi bi-toggle-on fa-lg"></span></button>
				                    </form><br>
                                </div> 
                                ';

                }

                echo self::DetallesPerfil($datos);

                echo "<tr>
                          <td>" . $dato . "</td>
                          <td>" . $row['niveles'] . "<br>" . $row['usuario'] . "</td>
                          <td>" . $row['nombre'] . "<br>" . $row['apellido'] . "</td>
                          <td>" . $row['correo'] . "<br></td>";

                echo '
                        <td>
                            <div class="row">
                                <div class="col">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verDetalles-' . $row['id_usuario'] . '">
                                        Ver Detalles  <span class="fa fa-eye"></span>
                                    </button> 
                                </div>
                                ' . $toggle . '
                                <div class="col">
                                    <form action="../../Update/UpdaFuncionario.php" method="post">
				                      <input type="hidden" name="datos" value="' . htmlentities(serialize($datos)) . '">
				                      <button type="submit" class="btn btn-success">Editar <span class="fa fa-edit"></span></button>
				                    </form><br>
                                </div> 
                            </div> 
                        </td> 
                    </tr>';

            }

        } else {

            $respuesta = array('status' => false, "mensaje" => "Usuario Incorrecto");
            $this->generarRespuesta($respuesta);

        }

    }

    public static function DetallesPerfil($datos)
    {

        echo '<div class="modal fade" id="verDetalles-' . $datos['id_usuario'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos de la Inscrpcion</h5>
			  </div>
			  <div class="modal-body">
				<p>Nº de inscripcion: ' . $datos['id_usuario'] . '</p>
				<p>Datos del Evento:</p>
				<ul>

                        Nivel: ' . $datos['niveles'] . '<br>
                        Usuario: ' . $datos['usuario'] . '<br>
                        Nombre Completo: ' . $datos['nombre'] . ' ' . $datos['apellido'] . '<br>
                        Correo Electronico: ' . $datos['correo'] . '<br>
				  
				</ul>
			  </div>
			  <div class="modal-footer bg-dark">
				<button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>';
    }

    public function TogglePassword()
    {

        $data_db = ModeloUsuario::ActualizarPasswordModelo($_POST);

        if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Usuario Encontrado");
            $this->generarRespuesta($respuesta);

        } else {

            $respuesta = array('status' => false, "mensaje" => "Usuario Incorrecto");
            $this->generarRespuesta($respuesta);

        }

    }

    public function ToggleStatus($request)
    {

        $Desactiva = array(
            "userId" => $request["id_usuario"],
            "usuario" => $request["usuario"],
            "status" => $request["status"]
        );

        $data_db = ModeloUsuario::ToggleUsuarioModelo($Desactiva);

        if(isset($_POST["TogglesUsuario"])){

            header("Location: ../../consul/Perfiles/FuncionarioPerfiles.php");

        }else if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Accion Completada");
            $this->generarRespuesta($respuesta);

        } else {

            $respuesta = array('status' => false, "mensaje" => "Una o varias de las respuestas no coinciden");
            $this->generarRespuesta($respuesta);

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

$ControlerUsuario = new ControlerUsuario();


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    switch ($_POST) {

        case isset($_POST["RegisUsuario"]):

            require_once '../Model/ModeloUsuario.php';
            $ControlerUsuario->RegisUsuario();

            break;

        case isset($_POST["TogglesUsuario"]):

            require_once '../Model/ModeloUsuario.php';
            $data = unserialize($_POST['TogglesUsuario']);
            $ControlerUsuario->ToggleStatus($data);

            header("Location: ../../consul/Perfiles/FuncionarioPerfiles.php");

            break;

        case isset($_POST["UnlockUser"]) || isset($_POST["ToggleUser"]):

            require_once '../Model/ModeloUsuario.php';
            $ControlerUsuario->BuscarPreguntaSeguridad();

            break;

        case isset($_POST["ToggleQuest"]):

            require_once '../Model/ModeloUsuario.php';
            $ControlerUsuario->ValidarPreguntaSeguridad();

            break;

        case isset($_POST["UnlockQuest"]):

            require_once '../Model/ModeloUsuario.php';
            $ControlerUsuario->ToggleStatus($_POST);
            $ControlerUsuario->ValidarPreguntaSeguridad();

            break;

        case isset($_POST["TogglePasswd"]):

            require_once '../Model/ModeloUsuario.php';
            $ControlerUsuario->TogglePassword();

            break;

        case isset($_POST["sugerencia"]):

            require_once '../Model/ModeloUsuario.php';
            $ControlerUsuario->RegisSugerencia();

            break;

        case isset($_POST["UpdateUsuario"]):

            require_once '../Model/ModeloUsuario.php';
            $ControlerUsuario->ActualizarUsuario();

            break;

    }
}