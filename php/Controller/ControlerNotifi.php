<?php

class ControlerNotific
{

    public function MarcarLeido()
    {

        $data_db = NotifiModelo::MarcarLeida($_POST); 

        if ($data_db == true) {

            $respuesta = array('status' => true, "mensaje" => "Solicitud Registrada con exito!");
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

}

$ControlerNotific = new ControlerNotific();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once '../Model/ModeloNotif.php';
    $ControlerNotific->MarcarLeido();

}