<?php
    require '../../php/Model/ModeloSelect.php';
    $ciudades = new ModeloSelect;

    $parroquia = $_POST['id_parroquia'];

    $ciudad = $ciudades->DatosSectores($parroquia);

    $cadena=" <option value='0'>--Selecciona un Sector--</option>";

    foreach($ciudad as $cw){

        $cadena.= '<option value="'.$cw['id_sectores'].'"> Sector '.$cw['sectores'].'</option>';

    }
        echo  $cadena."";

?>