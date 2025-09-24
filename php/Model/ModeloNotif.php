<?php
require_once "basedata2.php";
class NotifiModelo extends baseData
{

	public static function MarcarLeida($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE solicitud 
		SET leida_estado = :leida_estado
		WHERE id_solicitud = :id_solicitud");

		$sql->bindParam(":id_solicitud", $datos['id_solicitud']);
		$sql->bindParam(":leida_estado", $datos['estado_solicitud']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	public function NotificacionInspeccion()
	{
		$sql = baseData::conexion()->query("SELECT * FROM solicitud 
		INNER JOIN inmueble_usuario ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN inmueble ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		WHERE (tipo_solicitud = 5 OR estado_inmueble = 2) AND estado_solicitud = 1 AND leida_estado = 1");

		$n = 0;

		$accion = array(
			1 => "Cita",
			2 => "Empadronamiento",
			3 => "Evacuación de Titulo Supletorio",
			4 => "Contrato",
			5 => "Rectificación de Medida y Linderos",
			6 => "Obteción de Copias Certificadas",
			7 => "Regulación de la Tenencia de la Tierra",	
		); 

		$result = $sql->fetchAll();

		$notificacion = ""; 
		
		foreach ($result as $fila) {
			$n++;
			
			$id_solicitud = $fila['id_solicitud'];


			$notificacion .= '<form class="notificacion-form" data-id="' . $id_solicitud . '" method="post">
					<input type="hidden" name="estado_solicitud" value="3">
					<input type="hidden" name="id_solicitud" value="' . $fila['id_solicitud'] . '">
					<button type="button" class="dropdown-item texto-adaptable notificacion-btn">
						<i class="fas fa-envelope mr-2"></i> Solicitud de ' . $accion[$fila['tipo_solicitud']] . ' 
						<span class="text-sm float-right badge badge-danger right">NUEVO</span>
					</button>
				</form>';
			
		}

		$n = ($n > 0) ? $n : "" ;
		echo '
		  <a class="nav-link" data-toggle="dropdown" href="#">
            <i style="font-size: 20px;" class="far fa-bell"></i>
            <span id="mySpan" class="badge badge-warning navbar-badge">'.$n.'</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones <i class="far fa-bell"></i></span>
            <div class="dropdown-divider"></div>

            '.$notificacion.'

          </div>
		';

	}

	public function NotificacionAvaluo()
	{

		$sql = baseData::conexion()->query("SELECT * FROM avaluo 
		INNER JOIN inmueble_usuario ON avaluo.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN inmueble ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		WHERE inmueble.estado_inmueble = 4");

		$n = 0;

		$accion = array(
			1 => "Cita",
			2 => "Empadronamiento",
			3 => "Evacuación de Titulo Supletorio",
			4 => "Contrato",
			5 => "Rectificación de Medida y Linderos",
			6 => "Obteción de Copias Certificadas",
			7 => "Regulación de la Tenencia de la Tierra",	
		); 

		$result = $sql->fetchAll();
		
		$notificacion = ""; 
		foreach ($result as $fila) {
			$n++;
			
			$notificacion .= '<form class="notificacion-form" data-id="' . $fila['id_inmueble'] . '" method="post">
					<input type="hidden" name="estado_solicitud" value="3">
					<input type="hidden" name="id_solicitud" value="' . $fila['id_inmueble'] . '">
					<button type="button" class="dropdown-item texto-adaptable notificacion-btn">
						<i class="fas fa-envelope mr-2"></i> Avaluo al inmueble | N° Civico ' . $fila['n_civico'] . '
						<span class="text-sm float-right badge badge-danger right">NUEVO</span>
					</button>
				</form>';
			
		}

		$n = ($n > 0) ? $n : "" ;
		echo '
		  <a class="nav-link" data-toggle="dropdown" href="#">
            <i style="font-size: 20px;" class="far fa-bell"></i>
            <span id="mySpan" class="badge badge-warning navbar-badge">'.$n.'</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones <i class="far fa-bell"></i></span>
            <div class="dropdown-divider"></div>

            '.$notificacion.'

          </div>
		';

	}

	public function NotificacionRtt($datos)
	{

		$sql = baseData::conexion()->query("SELECT * FROM solicitud
		WHERE tipo_solicitud = 7 AND (estado_solicitud = 1 AND leida_estado = 1)");

		$result = $sql->fetch(PDO::FETCH_ASSOC);

		$n = 0;

		$accion = array(
			1 => "Cita",
			2 => "Empadronamiento",
			3 => "Evacuación de Titulo Supletorio",
			4 => "Contrato",
			5 => "Rectificación de Medida y Linderos",
			6 => "Obteción de Copias Certificadas",
			7 => "Regulación de la Tenencia de la Tierra",	
		); 

		$result = $sql->fetchAll();
		
		$notificacion = ""; 
		foreach ($result as $fila) {
			$n++;
			
			$id_solicitud = $fila['id_solicitud'];

			$estado = ($fila["estado_solicitud"] == 2) ? "Aprobada": "Negada";

			$notificacion .= '<form class="notificacion-form" data-id="' . $id_solicitud . '" method="post">
					<input type="hidden" name="estado_solicitud" value="3">
					<input type="hidden" name="id_solicitud" value="' . $fila['id_solicitud'] . '">
					<button type="button" class="dropdown-item texto-adaptable notificacion-btn">
						<i class="fas fa-envelope mr-2"></i> Solicitud de ' . $accion[$fila['tipo_solicitud']] . ' '. $estado .' 
						<span class="text-sm float-right badge badge-danger right">NUEVO</span>
					</button>
				</form>';
			
		}

		$n = ($n > 0) ? $n : "" ;
		echo '
		  <a class="nav-link" data-toggle="dropdown" href="#">
            <i style="font-size: 20px;" class="far fa-bell"></i>
            <span id="mySpan" class="badge badge-warning navbar-badge">'.$n.'</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones <i class="far fa-bell"></i></span>
            <div class="dropdown-divider"></div>

            '.$notificacion.'

          </div>
		';

	}

	public function NotificacionUsuario($datos)
	{

		$sql = baseData::conexion()->query("SELECT * FROM solicitud 
		INNER JOIN inmueble_usuario ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		WHERE inmueble_usuario.id_usuario = $datos AND (estado_solicitud != 1 AND leida_estado = 2)");

		$result = $sql->fetch(PDO::FETCH_ASSOC);

		$n = 0;

		$accion = array(
			1 => "Cita",
			2 => "Empadronamiento",
			3 => "Evacuación de Titulo Supletorio",
			4 => "Contrato",
			5 => "Rectificación de Medida y Linderos",
			6 => "Obteción de Copias Certificadas",
			7 => "Regulación de la Tenencia de la Tierra",	
		); 

		$result = $sql->fetchAll();
		
		$notificacion = ""; 
		foreach ($result as $fila) {
			$n++;
			
			$id_solicitud = $fila['id_solicitud'];

			$estado = ($fila["estado_solicitud"] == 2) ? "Aprobada": "Negada";

			$notificacion .= '<form class="notificacion-form" data-id="' . $id_solicitud . '" method="post">
					<input type="hidden" name="estado_solicitud" value="3">
					<input type="hidden" name="id_solicitud" value="' . $fila['id_solicitud'] . '">
					<button type="button" class="dropdown-item texto-adaptable notificacion-btn">
						<i class="fas fa-envelope mr-2"></i> Solicitud de ' . $accion[$fila['tipo_solicitud']] . ' '. $estado .' 
						<span class="text-sm float-right badge badge-danger right">NUEVO</span>
					</button>
				</form>';
			
		}

		$n = ($n > 0) ? $n : "" ;
		echo '
		  <a class="nav-link" data-toggle="dropdown" href="#">
            <i style="font-size: 20px;" class="far fa-bell"></i>
            <span id="mySpan" class="badge badge-warning navbar-badge">'.$n.'</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones <i class="far fa-bell"></i></span>
            <div class="dropdown-divider"></div>

            '.$notificacion.'

          </div>
		';

	}

	public function NotificacionSAdmin($datos)
	{

		$sql = baseData::conexion()->query("SELECT * FROM solicitud 
		INNER JOIN inmueble_usuario ON solicitud.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		WHERE estado_solicitud != 1 AND leida_estado = 2");

		$result = $sql->fetch(PDO::FETCH_ASSOC);

		$n = 0;

		$accion = array(
			1 => "Cita",
			2 => "Empadronamiento",
			3 => "Evacuación de Titulo Supletorio",
			4 => "Contrato",
			5 => "Rectificación de Medida y Linderos",
			6 => "Obteción de Copias Certificadas",
			7 => "Regulación de la Tenencia de la Tierra",	
		); 

		$result = $sql->fetchAll();
		
		$notificacion = ""; 
		foreach ($result as $fila) {
			$n++;
			
			$id_solicitud = $fila['id_solicitud'];

			$estado = ($fila["estado_solicitud"] == 2) ? "Aprobada": "Negada";

			$notificacion .= '<form class="notificacion-form" data-id="' . $id_solicitud . '" method="post">
					<input type="hidden" name="estado_solicitud" value="3">
					<input type="hidden" name="id_solicitud" value="' . $fila['id_solicitud'] . '">
					<button type="button" class="dropdown-item texto-adaptable notificacion-btn">
						<i class="fas fa-envelope mr-2"></i> Solicitud de ' . $accion[$fila['tipo_solicitud']] . ' del Usuario V-' . $fila['cedula'] . ' ('. $estado .')
						<span class="text-sm float-right badge badge-danger right">NUEVO</span>
					</button>
				</form>';
			
		}

		$n = ($n > 0) ? $n : "" ;
		echo '
		  <a class="nav-link" data-toggle="dropdown" href="#">
            <i style="font-size: 20px;" class="far fa-bell"></i>
            <span id="mySpan" class="badge badge-warning navbar-badge">'.$n.'</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones <i class="far fa-bell"></i></span>
            <div class="dropdown-divider"></div>

            '.$notificacion.'

          </div>
		';

	}

	public function NotificacionSolicitud()
	{

		$sql = baseData::conexion()->query("SELECT id_solicitud, tipo_solicitud FROM solicitud 
		WHERE estado_solicitud = 1 AND leida_estado = 1");

		$n = 0;

		$accion = array(
			1 => "Cita",
			2 => "Empadronamiento",
			3 => "Evacuación de Titulo Supletorio",
			4 => "Contrato",
			5 => "Rectificación de Medida y Linderos",
			6 => "Obteción de Copias Certificadas",
			7 => "Regulación de la Tenencia de la Tierra",	
		); 

		$notificacion = "";

		$result = $sql->fetchAll();
		
		foreach ($result as $fila) {

			$n++;
	
			$notificacion .= '
				<form class="notificacion-form" data-id="' . $fila['id_solicitud'] . '" method="post">
					<input type="hidden" name="estado_solicitud" value="2">
					<input type="hidden" name="id_solicitud" value="' . $fila['id_solicitud'] . '">
					<button type="button" class="dropdown-item texto-adaptable notificacion-btn">
						<i class="fas fa-envelope mr-2"></i> Solicitud de ' . $accion[$fila['tipo_solicitud']] . ' 
						<span class="text-sm float-right badge badge-danger right">NUEVO</span>
					</button>
				</form>';

		}

		$n = ($n > 0) ? $n : "" ;

		echo '
		  <a class="nav-link" data-toggle="dropdown" href="#">
            <i style="font-size: 20px;" class="far fa-bell"></i>
            <span id="mySpan" class="badge badge-warning navbar-badge">'.$n.'</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Notificaciones <i class="far fa-bell"></i></span>
            <div class="dropdown-divider"></div>

            '.$notificacion.'

          </div>
		';

	}


}
