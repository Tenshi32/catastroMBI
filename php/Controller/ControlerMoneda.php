<?php

    require_once "../Model/ModeloMoneda.php";
    $moneda = new ModeloMoneda();

if ($_SERVER["REQUEST_METHOD"] === "POST") { 

    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
        //Dolar
        $status = 1;
        $cambio = 2;
        $dia = $data["dia"];
        $igual = $data["igual"];
        $tipo_moneda = 1;

        $Dolar = array(
            "fecha" => $dia,
            "valor" => $igual, 
            "estado" => $status, 
            "cambio" => $cambio, 
            "tipo_moneda" => $tipo_moneda, 
        );

        $data_db = 
            $moneda->
                InsertarDolarModelo($Dolar);
    
        if ($data_db == true){

            $respuesta = array('status' => true, "mensaje" => "Sea a Registrado la Nueva Tasa con Exito!");
            echo json_encode($respuesta);
            exit;

        }else{

            $respuesta = array('status' => false, "mensaje" => "Debe de colocar la contraseña");
            echo json_encode($respuesta);
            exit;
        }

    }

?>