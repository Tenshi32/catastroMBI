<?php

require '../php/Model/basedata2.php';
$basedata = new baseData;

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'sidcambi';
$tables = '*';

$sql_file = $_FILES["sql_file"]["name"];
$usuari = $_POST["nombre"];
$Passwd = $_POST["passwd"];


$sql = $basedata->conexion()->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND nivel = 0");
$sql->bindParam(":usuario", $usuari);
$sql->execute();

$result = $sql->rowCount();

if ($result > 0) {

    $sql = $basedata->conexion()->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND nivel = 0");
    $sql->bindParam(":usuario", $usuari);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    if (password_verify($Passwd, $result['passwrd'])) {

        $dato = array(
            "id" => $result['id_usuario'],
            "descripcion" => "Ha Iniciado Sesion",
            "evento" => "Inicio de Sesion",
            "date" => date("d-m-Y"),
        );

        if (empty($sql_file)) {
          $respuesta = array('status' => false, "mensaje" => "Error al subir el archivo.");
          echo json_encode($respuesta);
          exit;
          
        } else {  

          $sql = "SHOW TABLES";
          $result = $basedata->conexion()->query($sql);
          
          $tables = array();
          
          if ($result) {
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              $tables[] = $row["Tables_in_" . $dbname];
            }
          }
          
          // Delete child records first (assuming you want to)
          foreach ($tables as $table) {
            $sql2 = "SET FOREIGN_KEY_CHECKS = 0;";
            $sql2 .= "DROP TABLE " . $table;
            $stmt = $basedata->conexion()->prepare($sql2);
            $stmt->execute();
          }
          
          $sql = "SET FOREIGN_KEY_CHECKS = 0;";
          
          $sql .= file_get_contents($sql_file);
          
          $stmt = $basedata->conexion()->prepare($sql);
          $stmt->execute();
          
          echo '<script>alert("Importacion de la base de datos exitosamente"); window.location.href = "../registrados.php";</script>';
          exit;

        }

    } else {

      echo '<script>alert("Contraseña Incorrecta"); window.location.href = "../carga.php";</script>';
      exit;

    }



}   else    {

  echo '<script>alert("Usuario Incorrecta"); window.location.href = "../carga.php";</script>';
  exit;

}

?>