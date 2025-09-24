<?php
require_once "basedata2.php";
class ModeloSolicitud extends baseData
{

	public static function InsertarSolicitudModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO solicitud (id_solicitud, id_inmueble_usuario, fecha_solicitud, razon_inmueble, tipo_solicitud, estado_solicitud) 
		VALUES(:id_solicitud, :id_inmueble_usuario, :fecha_solicitud, :razon_inmueble, :tipo_solicitud, :estado_solicitud)");

		$sql->bindParam(":id_solicitud", $datos['codigo']);
		$sql->bindParam(":id_inmueble_usuario", $datos['inmueble']);
		$sql->bindParam(":fecha_solicitud", $datos['dia']);

		$sql->bindParam(":razon_inmueble", $datos['razon_solicitud']);
		$sql->bindParam(":tipo_solicitud", $datos['tipo_solicitud']);
		$sql->bindParam(":estado_solicitud", $datos['estado_solicitud']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function InsertarRepresentanteSolicitud($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO representante (id_representante, cedula_representante, id_propietario, tipo_representante, nombre_completo, apellido_completo, numero_representante, estado_representante) 
		VALUES(:id_representante, :cedula_representante, :id_propietario, :tipo_representante, :nombre_completo, :apellido_completo, :numero_representante, :estado_representante)");

		$sql->bindParam(":id_representante", $datos['codigo']);
		$sql->bindParam(":cedula_representante", $datos['cedula_legal']);
		$sql->bindParam(":id_propietario", $datos['cedula']);

		$sql->bindParam(":tipo_representante", $datos['representativeChoice']);
		$sql->bindParam(":nombre_completo", $datos['nombre_legal']);
		$sql->bindParam(":apellido_completo", $datos['apellido_legal']);
		$sql->bindParam(":numero_representante", $datos['numero_legal']);
		$sql->bindParam(":estado_representante", $datos['estado_solicitud']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function InsertarMotivoCita($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO motivo_cita (id_motivo_cita, cita_totales, cantidad_cita, codigo_cita) 
		VALUES(:id_motivo_cita, :cita_totales, :cantidad_cita, :codigo_cita)");

		$sql->bindParam(":id_motivo_cita", $datos['codigo']);
		$sql->bindParam(":cita_totales", $datos['motivo_cantidad']);
		$sql->bindParam(":cantidad_cita", $datos['motivo_texto']);
		$sql->bindParam(":codigo_cita", $datos['motivo_codigo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function InsertarCitaModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO citas (id_citas, id_solicitud, id_representante, id_motivo, estado_cita) 
		VALUES(:id_citas, :id_solicitud, :id_representante, :id_motivo, :estado_cita)");

		$sql->bindParam(":id_citas", $datos['codigo']);
		$sql->bindParam(":id_solicitud", $datos['codigo']);
		$sql->bindParam(":id_representante", $datos['codigo']);
		$sql->bindParam(":id_motivo", $datos['codigo']);
		$sql->bindParam(":estado_cita", $datos['estado_solicitud']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function AprobarCitaModelo($datos, $fecha_otorgada)
	{

		$sql = baseData::conexion()->prepare("UPDATE citas SET fecha_otorgada =:fecha_otorgada WHERE id_citas=:id_citas");
		$sql->bindParam(":id_citas", $datos['codigo']);
		$sql->bindParam(":fecha_otorgada", $fecha_otorgada);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function FechaAprobacion($dato)
	{


		$sql = baseData::conexion()->prepare("SELECT fecha_otorgada FROM citas WHERE fecha_otorgada = :fecha_otorgada");
		$sql->bindParam(":fecha_otorgada", $dato);
		$sql->execute();

		$result = $sql->rowCount();

		if ($result > 40) {

			$fechaActual = new DateTime();

			// Sumar un día a la fecha
			$fechaActual->modify('+2 day');

			// Formatear la fecha como "d/m/Y"
			return $fecha_otorgada = $fechaActual->format('Y-m-d');

		} else {

			return $dato;

		}

	}

	public static function BuscarSoli($dato)
	{
		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud 
        INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
        WHERE tipo_solicitud = 1 AND inmueble_usuario.id_inmueble_usuario = :id_inmueble_usuario");

		$sql->bindParam(':id_inmueble_usuario', $dato, PDO::PARAM_INT);

		$sql->execute();

		$result = $sql->fetch(PDO::FETCH_ASSOC);

		if (!$result) {
			return true; // Si no hay solicitud, se puede solicitar.
		}

		date_default_timezone_set('America/Caracas');

		$fechaActual = new DateTime();
		$fechaSolicitud = new DateTime($result["fecha_solicitud"]);

		if ($fechaSolicitud <= $fechaActual) {

			return true; // Han pasado los días hábiles
			
		} else {
			
			return false; // Aún no han pasado los días hábiles

		}
	}

	
	public static function ListaSoliXModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		WHERE estado_solicitud = 1 AND tipo_solicitud = $dato ORDER BY solicitud.fecha_solicitud DESC");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public static function ListaSoliModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		WHERE estado_solicitud = 1 ORDER BY solicitud.fecha_solicitud DESC");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public static function ListaSoliUsuarioModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		WHERE usuario.id_usuario = $dato");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public static function BuscarCitaModelo($id_usuario, $fecha)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM citas
        INNER JOIN solicitud ON solicitud.id_solicitud = citas.id_solicitud 
        INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
        INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
        INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
        WHERE usuario.id_usuario = :id_usuario AND citas.fecha_otorgada < :fecha AND solicitud.estado_solicitud = 2");

		$sql->bindParam(":id_usuario", $id_usuario, PDO::PARAM_INT);
		$sql->bindParam(":fecha", $fecha, PDO::PARAM_STR);

		$sql->execute();
		return $sql->fetchAll(PDO::FETCH_ASSOC);

	}

	public static function ListaCitaModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM citas
		INNER JOIN solicitud ON solicitud.id_solicitud = citas.id_solicitud 
		INNER JOIN representante ON	representante.id_representante = citas.id_representante
		INNER JOIN motivo_cita ON motivo_cita.id_motivo_cita = citas.id_motivo

		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		WHERE usuario.id_usuario = $dato AND (solicitud.tipo_solicitud = 1 AND solicitud.estado_solicitud = 2)");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public static function ConsultaOCCModelo($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		WHERE usuario.id_usuario = $dato AND (solicitud.tipo_solicitud = 6 AND estado_solicitud = 2)");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public function Motivos($datos)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM tipo_motivo
		WHERE id_tipo_motivo = $datos");
		$sql->execute();

		$result = $sql->fetch();

		return $result;
	}

	public function ReporteConsultaCitaModelo($dato)
	{
		$id_soli = $dato["id_solicitud"];

		$sql = baseData::conexion()->prepare("SELECT * FROM citas
		INNER JOIN solicitud ON solicitud.id_solicitud = citas.id_solicitud 
		INNER JOIN representante ON	representante.id_representante = citas.id_representante
		INNER JOIN motivo_cita ON motivo_cita.id_motivo_cita = citas.id_motivo
		
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario

		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion

		WHERE solicitud.id_solicitud = $id_soli");
		$sql->execute();

		$row = $sql->fetch();

		$datos =
			array(
				//Datos de la Solicitud
				"id_solicitud" => $row['id_solicitud'],
				"id_usuario" => $row['id_usuario'],
				"fecha_solicitud" => $row['fecha_solicitud'],
				"id_inmueble" => $row['id_inmueble'],
				"razon_inmueble" => $row['razon_inmueble'],

				"nombre" => $row['nombre'],
				"apellido" => $row['apellido'],
				"telefono_inmueble" => $row['telefono_inmueble'],

				"nombre_inmueble" => $row['nombre_inmueble'],
				"n_civico" => $row['n_civico'],
				"id_tipo_contruccion" => $row['id_tipo_construccion'],
				"tipo_construccion" => $row['tipo_construccion'],

				//Datos del Motivo
				"id_motivo_cita" => $row['id_motivo_cita'],
				"codigo_cita" => $row['codigo_cita'],
				"cantidad_cita" => $row['cantidad_cita'],
				"cita_totales" => $row['cita_totales'],

				//Datos del Representante
				"id_representante" => $row['id_representante'],
				"cedula_representante" => $row['cedula_representante'],
				"nombre_completo" => $row['nombre_completo'],
				"apellido_completo" => $row['apellido_completo'],
				"numero_representante" => $row['numero_representante'],
				"estado_representante" => $row['estado_representante'],
			);

		return $datos;
	}

	public function SolicitudesEnEspera($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM citas
		INNER JOIN solicitud ON solicitud.id_solicitud = citas.id_solicitud 
		INNER JOIN representante ON	representante.id_representante = citas.id_representante
		INNER JOIN motivo_cita ON motivo_cita.id_motivo_cita = citas.id_motivo
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = solicitud.id_inmueble_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_contruccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		WHERE usuario.id_usuario = '$dato'");
		$sql->execute();

		$data = [];
		foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $row) {
			$data[] = [
				'title' => "Inmueble #" . $row['n_civico'] . " | Codigo Motivos " . $row['codigo_cita'],
				'start' => date('Y-m-d H:i:s', strtotime($row['fecha_otorgada'] . ' 08:00:00')),
				'end' => date('Y-m-d H:i:s', strtotime($row['fecha_otorgada'] . ' 14:00:00')),

			];



		}
		// Convertir $data a formato JSON
		$json_data = json_encode($data);

		// Devolver el JSON
		return $json_data;

	}

	public function verDetalles($datos)
	{

		echo '<div class="modal fade" id="verDetalles-' . $datos['id_proveedores'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos de la Inscrpcion</h5>
			  </div>
			  <div class="modal-body">
				<p>Nº de inscripcion: ' . $datos['id_proveedores'] . '</p>
				<p>Datos del Proveedor:</p>
				<ul>

	
				  
				</ul>
			  </div>
			  <div class="modal-footer bg-dark">
				<button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>';
	}

	/* registrar cliente*/
	public static function InsertarNegarModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO citas (id_funcionario, id_solicitud, fecha_otorgada, razon_negacion, estado_cita) 
		VALUES(:id_funcionario, :id_solicitud, :fecha_otorgada, :razon_negacion, :estado_cita)");
		$sql->bindParam(":id_funcionario", $datos['id_funcionario']);
		$sql->bindParam(":id_solicitud", $datos['codigo']);
		$sql->bindParam(":fecha_otorgada", $datos['fecha_otorgada']);
		$sql->bindParam(":razon_negacion", $datos['razon_negacion']);
		$sql->bindParam(":estado_cita", $datos['estado_cita']);

		if ($sql->execute()) {

			ModeloSolicitud::ActualizarSolicitudModelo($datos);

			return true;

		} else {

			return false;
		}
	}

	/*update cliente*/
	public static function NegarSolicitudModelo($datos)
	{

		$sql = baseData::conexion()->prepare("UPDATE solicitud SET estado_solicitud =:estado_solicitud, razon_negar =:razon_negar  WHERE id_solicitud=:id_solicitud");
		$sql->bindParam(":id_solicitud", $datos['codigo']);
		$sql->bindParam(":estado_solicitud", $datos['estado_solicitud']);
		$sql->bindParam(":razon_negar", $datos['razon_negacion']);
		$sql->execute();

		return $sql;
	}

	public static function ActualizarSolicitudModelo($datos)
	{

		$sql = baseData::conexion()->prepare("UPDATE solicitud SET estado_solicitud =:estado_solicitud WHERE id_solicitud=:id_solicitud");
		$sql->bindParam(":id_solicitud", $datos['codigo']);
		$sql->bindParam(":estado_solicitud", $datos['estado_solicitud']);
		$sql->execute();

		return $sql;
	}

}