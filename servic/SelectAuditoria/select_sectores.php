<?php
    require '../../php/Controller/ControlerUsuario.php';
    require '../../php/Model/ModeloUsuario.php';
    $UsuarioM = new ModeloUsuario;

    $accion = isset($_POST['accion']) ? $_POST['accion'] : " ";
    $valor2 = isset($_POST['fecha2']) ? $_POST['fecha2'] : date("d-m-Y");
    $valor1 = isset($_POST['fecha1']) ? $_POST['fecha1'] :  ModeloUsuario::UltimaFecha();
    $Tipo = isset($_POST['Tipo']) ? $_POST['Tipo'] : 2;
    
    // Supongamos que $UsuarioM es una instancia de tu clase que contiene ConsultaAuditoria
    $resultados = $UsuarioM->ConsultaAuditoria($valor1, $valor2, $Tipo, $accion);
    
    $dato = 0;
    foreach ($resultados as $row) {

        $dato++;
       
        

        echo "<tr>
                <td>" . $dato . "</td>
                <td>" . $row['id_usuario'] . "<br></td>
                <td>" . $row['fecha'] . "<br></td>
                <td>" . $row['hora'] . "<br></td>
                <td>" . $row['accion'] . "<br></td>

                <td>
                    ". $row['descripcion'] ."
                </td> 
            </tr>";

    }


?>