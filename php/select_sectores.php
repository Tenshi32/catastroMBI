<?php
    require 'Model/ModeloDoc.php';
    $Documentos = new ModeloDoc;

    $documento = $_POST["doc"];
    $id_inmubele_usuario = $_POST["id"];

    $Documentos->BuscarDoc($id_inmubele_usuario, $documento);
?>