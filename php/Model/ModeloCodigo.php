<?php
require_once "basedata2.php";

class ModeloCodigo extends baseData
{
  public static function InsertarComponentesModelo($datos)
  {

    $sql = baseData::conexion()->prepare("INSERT INTO componente_ficha (id_componente ,id_inmueble_usuario, id_codigo_catastral) 
		VALUES(:id_componente ,:id_inmueble_usuario, :id_codigo_catastral)");
    $sql->bindParam(":id_componente", $datos['codigo']);
    $sql->bindParam(":id_inmueble_usuario", $datos['inmueble']);
    $sql->bindParam(":id_codigo_catastral", $datos['codigo']);

    if ($sql->execute()) {

      $id_inmueble = ModeloCodigo::InmuebleFichaModelo($datos);
      return $id_inmueble;
      
    } else {

      return false;
    }

  }

  public static function InsertarCodigoCatastralModelo($datos)
  {

    $sql = baseData::conexion()->prepare("INSERT INTO codigo_catastral (id_codigo_catastral, parcela_catastral, nivel_catastral, ambito_catastral, parroquia_catastral, municipio_catastral, estado_catastral, unidad_catastral, manzana_catastral, sector_catastral, subparcela_catastral) 
		VALUES(:id_codigo_catastral, :parcela_catastral, :nivel_catastral, :ambito_catastral, :parroquia_catastral, :municipio_catastral, :estado_catastral, :unidad_catastral, :manzana_catastral, :sector_catastral, :subparcela_catastral)");

    $sql->bindParam(":id_codigo_catastral", $datos['codigo']);
    $sql->bindParam(":estado_catastral", $datos['estado_codigo']);
    $sql->bindParam(":municipio_catastral", $datos['municipio_codigo']);
    $sql->bindParam(":parroquia_catastral", $datos['parroquia']);
    $sql->bindParam(":ambito_catastral", $datos['ambito_codigo']);
    $sql->bindParam(":sector_catastral", $datos['sector']);
    $sql->bindParam(":manzana_catastral", $datos['manzana_codigo']);
    $sql->bindParam(":parcela_catastral", $datos['parcela_codigo']);
    $sql->bindParam(":subparcela_catastral", $datos['subparcela_codigo']);
    $sql->bindParam(":nivel_catastral", $datos['nivel_codigo']);
    $sql->bindParam(":unidad_catastral", $datos['unidad_codigo']);

    if ($sql->execute()) {

      $id_inmueble = ModeloCodigo::InsertarComponentesModelo($datos);
      return $id_inmueble;

    } else {

      return false;
    }

  }

  public static function InmuebleFichaModelo($datos)
  {
    $sql = baseData::conexion()->prepare("SELECT id_inmueble fROM inmueble_usuario
		WHERE id_inmueble_usuario = :id_inmueble_usuario");
    $sql->bindParam(":id_inmueble_usuario", $datos['inmueble']);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);
    $id_inmueble = $result['id_inmueble'];

    if (!isset($datos['estado_inmueble'])) {

      return $id_inmueble;

    } else {

      $sql = baseData::conexion()->prepare("UPDATE inmueble SET estado_inmueble=:estado_inmueble WHERE id_inmueble =:id_inmueble");
      $sql->bindParam(":id_inmueble", $result['id_inmueble']);
      $sql->bindParam(":estado_inmueble", $datos['estado_inmueble']);

      if ($sql->execute()) {

        return $id_inmueble;

      } else {

        return false;

      }
    }

  }

  public static function CodigoQr($data)
  {

    require_once '../../phpqrcode/qrlib.php';
    $ubicacion_qr = "../../DocumentosRaiz/" . $data['id_inmueble'] . "/" . $data['cedula'] . "/QR.png";

    $dato_qr =
      array(
        "Cedula del Propietario" => $data['id_usuario'],
        "Codigo Catastral" => "0508" . $data['parroquia'] . "U-01" . $data['sector'] . $data['manzana_codigo'] . $data['parcela_codigo'],
        "Fecha de Inscripcion" => $data['dia'],
        "Fecha de Actualizacion" => $data['dia'],
        "Tipo de Operacion" => $data['clases_operaciones'],
      );

    $csv_data = "";
    foreach ($dato_qr as $key => $value) {
      $csv_data .= $key . " : " . $value . "\n";
    }

    $json_data = json_encode($dato_qr);

    if (!is_dir($ubicacion_qr)) {

      QRcode::png($csv_data, $ubicacion_qr);

    } else {

      unlink($ubicacion_qr);
      QRcode::png($csv_data, $ubicacion_qr);

    }

  }

  public function CodigoAcciones($dato)
  {
    date_default_timezone_set('America/Caracas');
    $codigo = random_int(10000000, 100000000);

    $block = '
                <div class="col-3 m-4"> 
                  <label for="dia">Fecha de la Solicitud</label>
                  <label>' . date("d-m-Y") . '</label><br>
                  <label for="nombre">Código Especial CE-' . $codigo . '</label>

                  <input type="hidden" name="codigo" id="codigo" value="0' . $codigo . '" readonly>
                  <input type="hidden" class="form-control" name="dia" id="dia" value="' . date("Y-m-d") . '">
                </div>
                ';

    $sql = baseData::conexion()->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
    $sql->bindParam(":id_usuario", $dato);
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    $resulto = $sql->rowCount();

    $datos =
      array(
        //datos del cliente
        "id_usuario" => $result['id_usuario'],
        "nombre" => $result['nombre'],
        "apellido" => $result['apellido'],
      );

    echo $block . '
          <div class="col-3 m-4">      
            <label for="nombre">Propietraio ' . $datos['nombre'] . ' ' . $datos['apellido'] . '</label>
            <label for="nombre">Cédula CI: ' . $datos['id_usuario'] . '</label>
            <input type="hidden" name="cedula" id="cedula" value="' . $datos['id_usuario'] . '" readonly>
          </div>
				
      ';

  }

  public function CodigoEmpadronamientoModelo($dato)
  {

    $sql = baseData::conexion()->prepare("SELECT id_empadronamiento FROM empadronamiento");
    $sql->execute();

    $result = $sql->rowCount();

    if ($result > 0) {

      $result++;

      $block = '
                
                <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <label for="nombre">Codigo Especial</label>
                        <input type="text" class="form-control" value="CE-0' . $result . '" readonly>
                        <input type="hidden" class="form-control" name="codigo" id="codigo" value="0' . $result . '" readonly>
                      </div>
                    </div>
                </div>
                ';

    } else {

      $block = '
                <div class="row">
                    <div class="col-3">
                      <div class="form-group">
                        <label for="nombre">Codigo Especial</label>
                        <input type="text" class="form-control" value="CE-01" readonly>
                        <input type="hidden" class="form-control" name="codigo" id="codigo" value="01" readonly>
                      </div>
                    </div>
                </div>
                ';
    }


    $sql = baseData::conexion()->prepare("SELECT * FROM usuario WHERE id_usuario = $dato");
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_ASSOC);

    $resulto = $sql->rowCount();

    if ($resulto > 0) {

      $datos =
        array(
          //datos del cliente
          "id_usuario" => $result['id_usuario'],
          "nombre" => $result['nombre_usuario'],
          "apellido" => $result['apellido_usuario'],
        );

    } else {

      $sql = baseData::conexion()->prepare("SELECT * FROM funcionario WHERE id_funcionario = :id_funcionario");
      $sql->bindParam(":id_funcionario", $dato);
      $sql->execute();

      $result = $sql->fetch(PDO::FETCH_ASSOC);

      $resulto = $sql->rowCount();



      $datos =
        array(
          //datos del cliente
          "id_usuario" => $result['id_funcionario'],
          "nombre" => $result['nombre_funcionario'],
          "apellido" => $result['apellido_funcionario'],
        );

    }

    echo $block . '       
      <div class="row">
          <div class="col-5">
            <div class="form-group">
              <label for="nombre">Propietraio</label>
              <input type="text" class="form-control" value="' . $datos['nombre'] . ' ' . $datos['apellido'] . '" readonly>
            </div>
          </div>
  
          <div class="col-3">
            <div class="form-group">
              <label for="nombre">Cedula</label>
              <input type="text" class="form-control" placeholder="Ingrese el nombre..." value="CI: ' . $datos['id_usuario'] . '" 	readonly>
              <input type="hidden" class="form-control" name="cedula" id="cedula" value="' . $datos['id_usuario'] . '" readonly>
            </div>
          </div>
      </div>				
      ';

  }

}