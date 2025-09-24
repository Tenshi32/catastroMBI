<?php

require_once "basedata2.php";

class ModeloUsuario extends baseData
{

	/* Funciones para Usuario */

	/* Insert */
	public static function InsertarUsuarioModelo($datos)
	{

		$token = bin2hex(random_bytes(32));

		$sql = baseData::conexion()->prepare("INSERT INTO usuario (id_usuario, cedula, nombre,  apellido, usuario, token, passwrd, fecha_nacimiento, nivel, tipo_usuario, direccion, correo, estado) 
		VALUES(:id_usuario, :cedula, :nombre,  :apellido, :usuario, :token, :passwrd, :fecha_nacimiento, :nivel, :tipo_usuario, :direccion, :correo, :estado)");
		$sql->bindParam(":id_usuario", $datos['cedula']);
		$sql->bindParam(":usuario", $datos['usuario']);
		$sql->bindParam(":token", $token);

		$password = password_hash($datos['Passwd'], PASSWORD_DEFAULT);
		$sql->bindParam(":passwrd", $password);

		$sql->bindParam(":fecha_nacimiento", $datos['fecha_nac']);
		$sql->bindParam(":nivel", $datos['nivel']);
		$sql->bindParam(":cedula", $datos['cedula']);
		$sql->bindParam(":tipo_usuario", $datos['tipo_usuario']);
		$sql->bindParam(":nombre", $datos['nombre']);
		$sql->bindParam(":apellido", $datos['apellido']);
		$sql->bindParam(":correo", $datos['correo']);
		$sql->bindParam(":direccion", $datos['direccion']);
		$sql->bindParam(":estado", $datos['estado']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function InsertarSuegerenciaModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO sugerencia (id_usuario, sugerencia) 
		VALUES(:id_usuario, :sugerencia)");
		$sql->bindParam(":id_usuario", $datos['id_usuario']);
		$sql->bindParam(":sugerencia", $datos['sugerencia']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Tupla de Usuario-PreguntaSeguridad-Nivel*/
	public static function InsertarDataUsuarioModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO usuario_data (id_usuarios, id_nivel, id_seguridad) 
		VALUES(:id_usuarios, :id_nivel, :id_seguridad)");

		$sql->bindParam(":id_usuarios", $datos['cedula']);
		$sql->bindParam(":id_nivel", $datos['pregunta1']);
		$sql->bindParam(":id_seguridad", $datos['cedula']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	public static function InsertarPreguntasModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO pregunta_seguridad (id_seguridad, pregunta_1, repuesta_1, pregunta_2, repuesta_2, pregunta_3, repuesta_3) 
		VALUES(:id_seguridad, :pregunta_1, :repuesta_1, :pregunta_2, :repuesta_2, :pregunta_3, :repuesta_3)");

		$sql->bindParam(":id_seguridad", $datos['cedula']);

		$sql->bindParam(":pregunta_1", $datos['pregunta1']);
		$sql->bindParam(":repuesta_1", $datos['repuesta1']);

		$sql->bindParam(":pregunta_2", $datos['pregunta2']);
		$sql->bindParam(":repuesta_2", $datos['repuesta2']);

		$sql->bindParam(":pregunta_3", $datos['pregunta3']);
		$sql->bindParam(":repuesta_3", $datos['repuesta3']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	/* Update */
	public static function ActualizarPasswordModelo($datos)
	{
		if ($datos['PasswdNew'] == $datos['PasswdNewConfirm']) {

			$password = password_hash($datos['PasswdNew'], PASSWORD_DEFAULT);

			$sql = baseData::conexion()->prepare("UPDATE usuario SET passwrd =:passwrd WHERE id_usuario =:id_usuario");
			$sql->bindParam(":id_usuario", $datos['id_usuario']);
			$sql->bindParam(":passwrd", $password);

			if ($sql->execute()) {

				return true;

			} else {

				return false;

			}

		} else {

			return null;

		}

	}

	public static function ActualizarUsuarioModelo($datos)
	{

		$sql = baseData::conexion()->prepare("UPDATE usuario SET fecha_nacimiento = :fecha_nacimiento, correo = :correo, direccion = :direccion WHERE id_usuario=:id_usuario");
		$sql->bindParam(":fecha_nacimiento", $datos['fecha_nacimiento']);
		$sql->bindParam(":correo", $datos['correo']);
		$sql->bindParam(":direccion", $datos['direccion']);
		$sql->bindParam(":id_usuario", $datos['cedula']);
		
		if($sql->execute()){

			return true;

		} else {

			return false;

		}
	}

	public static function ToggleUsuarioModelo($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE usuario SET estado = :estado WHERE usuario = :usuario");
		$sql->bindParam(":usuario", $datos['usuario']);
		$sql->bindParam(":estado", $datos['status']);
		$sql->execute();

		return $sql;
	}

	/*Desbloqueo de Usuario*/
	public static function BuscarUsuarioPreguntas($datos)
	{
		$sql = baseData::conexion()->prepare("SELECT * FROM usuario 
		INNER JOIN pregunta_seguridad ON pregunta_seguridad.id_seguridad = usuario.id_usuario
		WHERE usuario = :usuario");
		$sql->bindParam(":usuario", $datos);
		$sql->execute();

		$fila = $sql->rowCount();

		$valor = $sql->fetch(PDO::FETCH_ASSOC);

		if ($fila > 0 && $datos === $valor["usuario"]) {

			return $valor;

		} else {

			return false;

		}
	}

	public static function ConfirmarPreguntas($datos)
	{
		$sql = baseData::conexion()->prepare("SELECT * FROM usuario 
		INNER JOIN pregunta_seguridad ON pregunta_seguridad.id_seguridad = usuario.id_usuario
		WHERE id_usuario = :id_usuario");
		$sql->bindParam(":id_usuario", $datos['id_usuario']);
		$sql->execute();

		$result = $sql->fetch(PDO::FETCH_ASSOC);

		if ($result['repuesta_1'] == $datos['respuesta1'] && $result['repuesta_2'] == $datos['respuesta2'] && $result['repuesta_3'] == $datos['respuesta3']) {

			return true;

		} else {

			return false;

		}
	}

	public static function BuscarUsuarioModelo($datos)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
		$sql->bindParam(":usuario", $datos['usuario']);
		$sql->execute();

		$fila = $sql->rowCount();
		$valor = $sql->fetch(PDO::FETCH_ASSOC);

		if ($fila > 0 && $datos['usuario'] === $valor["usuario"]) {

			if (password_verify($datos['Passwd'], $valor['passwrd'])) {

				session_start();

				$_SESSION["token"] = $valor['token'];

				return ['status' => true, 'estado' => $valor["estado"], "id_usuario" => $valor["id_usuario"], "nivel" => $valor["nivel"]];				

			} else if ($valor["estado"] == 2) {

				return ['status' => false, 'estado' => $valor["estado"]];

			} else if ($datos['Passwd'] != $valor['passwrd']) {

				return ['status' => false, "estado" => $valor["estado"]];

			} else {

				return ['status' => null, "estado" => $valor["estado"], "id_usuario" => $valor["id_usuario"], "usuario" => $valor["usuario"]];

			}

		} else {

			return ['status' => null, 'estado' => 'Este Usuario No Existe'];

		}
	}

	public static function VerificarUsuarioConectados($token)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM usuario 
		WHERE token = '$token'");
		$sql->execute();

		$result = $sql->rowCount();

		if ($result > 0) {

			$usuario = $sql->fetch(PDO::FETCH_ASSOC);
			return $usuario;

		} else {

			return false;

		}

	}

	/* Insert */
	public static function InsertarAuditoriaUsuario($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO auditoria_usuario (id_usuario, fecha, hora, accion, descripcion) 
		VALUES(:id_usuario, :fecha, :hora, :accion, :descripcion)");

		$sql->bindParam(":id_usuario", $datos['id']);
		$sql->bindParam(":fecha", $datos['date']);

		$sql->bindParam(":hora", $datos['time']);
		$sql->bindParam(":accion", $datos['evento']);
		$sql->bindParam(":descripcion", $datos['descripcion']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	/* Search */
	public static function BuscarNameUsuario($datos)
	{
		$sql = baseData::conexion()->prepare("SELECT COUNT(*) FROM usuario WHERE usuario = :usuario");
		$sql->bindParam(':usuario', $datos);
		$sql->execute();

		$count = $sql->fetchColumn(); // Obtener el número de filas encontradas

		if ($count == 0) {

			return true;

		} else {

			return false;

		}

	}

	public static function ConsultaUsuario($nivel)
	{
		$sql = baseData::conexion()->prepare("SELECT * FROM usuario 
		INNER JOIN nivel ON nivel.id_nivel = usuario.nivel
		WHERE tipo_usuario = $nivel ORDER BY id_usuario DESC");
		$sql->execute();


		return $result = $sql->fetchAll();

	}

	public static function ConsultaAuditoria($valor1, $valor2, $nivel, $palabraBusqueda = null)
	{
		if (isset($valor1) && isset($valor2) && isset($palabraBusqueda) && !empty($palabraBusqueda)) {

			$sql = "SELECT * FROM auditoria_usuario
			INNER JOIN usuario ON usuario.id_usuario = auditoria_usuario.id_usuario
			WHERE tipo_usuario = :nivel AND fecha BETWEEN :valor1 AND :valor2
			AND accion LIKE CONCAT('%', :palabraBusqueda, '%')
			ORDER BY fecha DESC";

			$sql = baseData::conexion()->prepare($sql);
			$sql->bindValue(':valor1', $valor1);
			$sql->bindValue(':valor2', $valor2);
			$sql->bindValue(':nivel', $nivel);
			$sql->bindValue(':palabraBusqueda', $palabraBusqueda);
			$sql->execute();


		} elseif (isset($valor1) && isset($valor2)) {

			$sql = "SELECT * FROM auditoria_usuario
			INNER JOIN usuario ON usuario.id_usuario = auditoria_usuario.id_usuario
			WHERE tipo_usuario = :nivel AND fecha BETWEEN :valor1 AND :valor2 ORDER BY fecha DESC";
			$sql = baseData::conexion()->prepare($sql);
			$sql->bindValue(':valor1', $valor1);
			$sql->bindValue(':valor2', $valor2);
			$sql->bindValue(':nivel', $nivel);
			$sql->execute();

		} elseif (isset($palabraBusqueda) && !empty($palabraBusqueda)) {
			//Búsqueda por palabra clave sin fechas
			$sql = "SELECT * FROM auditoria_usuario
			INNER JOIN usuario ON usuario.id_usuario = auditoria_usuario.id_usuario
			WHERE tipo_usuario = :nivel AND eventos LIKE CONCAT('%', :palabraBusqueda, '%')
			ORDER BY usuario.id_usuario DESC";

			$sql = baseData::conexion()->prepare($sql);
			$sql->bindValue(':nivel', $nivel);
			$sql->bindValue(':palabraBusqueda', $palabraBusqueda);
			$sql->execute();

		} else {
			// Búsqueda sin filtros
			$sql = baseData::conexion()->prepare("SELECT * FROM auditoria_usuario
					INNER JOIN usuario ON usuario.id_usuario = auditoria_usuario.id_usuario
					WHERE tipo_usuario = :nivel ORDER BY usuario.id_usuario DESC");
			$sql = baseData::conexion()->prepare($sql);
			$sql->bindValue(':nivel', $nivel);
			$sql->execute();
		}

		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	/* Extra */
	public static function UltimaFecha()
	{

		$sql = "SELECT MIN(fecha) FROM auditoria_usuario";
		$stmt = baseData::conexion()->prepare($sql);
		$stmt->execute();

		$fecha = $stmt->fetchColumn();

		return $fecha;

	}

	public function DatosSectores($id_parroquia)
	{
		$sql = "SELECT * FROM sectores WHERE id_parroquia = '$id_parroquia'";

		$account = baseData::conexion()->query($sql);

		return $account;
	}

}