<?php
require_once "basedata2.php";
class ModeloContrato extends baseData
{

	public static function InsertarContratoModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO contrato (id_contrato, id_contrato_datos, fecha_entrega, metodo_pago, monto_pagar, codig_gmv) 
		VALUES(:id_contrato, :id_contrato_datos, :fecha_entrega, :metodo_pago, :monto_pagar, :codig_gmv)");

		$sql->bindParam(":id_contrato", $datos['codigo']);
		$sql->bindParam(":id_contrato_datos", $datos['codigo']);
		$sql->bindParam(":metodo_pago", $datos['metodo_pago']);

		$sql->bindParam(":fecha_entrega", $datos['fecha_entrega']);
		$sql->bindParam(":monto_pagar", $datos['monto_pago']);
		$sql->bindParam(":codig_gmv", $datos['codigo_mision']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	public static function InsertarAprobacionContratoModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO aprobacion_contrato (id_aprobacion, id_contrato, fecha_otorgada, registro_autorizado, timbre_fiscal, monto_pago, cuotas, periodo_r, clausulas, v_inmueble) 
		VALUES(:id_aprobacion, :id_contrato, :fecha_otorgada, :registro_autorizado, :timbre_fiscal, :monto_pago, :cuotas, :periodo_r, :clausulas, :v_inmueble)");

		$sql->bindParam(":id_aprobacion", $datos['codigo']);
		$sql->bindParam(":id_contrato", $datos['id_contrato']);
		$sql->bindParam(":fecha_otorgada", $datos['fecha_otorgada']);
		$sql->bindParam(":registro_autorizado", $datos['registro_autorizado']);

		$sql->bindParam(":timbre_fiscal", $datos['timbre_fiscal']);
		$sql->bindParam(":monto_pago", $datos['Monto_pago']);
		$sql->bindParam(":cuotas", $datos['cuotas']);
		$sql->bindParam(":periodo_r", $datos['periodo_r']);
		$sql->bindParam(":clausulas", $datos['codigo']);
		$sql->bindParam(":v_inmueble", $datos['v_inmueble']);

		ModeloContrato::InsertarClausualasModelo($datos);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	public static function InsertarClausualasModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO clausulas (id_clausulas, cantidad_clausulas,  texto_clausulas, total_clausulas) 
		VALUES(:id_clausulas, :cantidad_clausulas, :texto_clausulas, :total_clausulas)");

		$sql->bindParam(":id_clausulas", $datos['codigo']);
		$sql->bindParam(":cantidad_clausulas", $datos['clausulas_cantidad']);
		$sql->bindParam(":texto_clausulas", $datos['clausulas_texto']);
		$sql->bindParam(":total_clausulas", $datos['clausulas_codigo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}


	}

	public static function InsertarAbogadoContrato($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO abogado (id_abogado, nombre_abogado, apellido_abogado, inpre_abogado, cedula_abogado, telefono_abogado, corre_abogado) 
		VALUES(:id_abogado, :nombre_abogado, :apellido_abogado, :inpre_abogado, :cedula_abogado, :telefono_abogado, :corre_abogado)");

		$sql->bindParam(":id_abogado", $datos['codigo']);
		$sql->bindParam(":nombre_abogado", $datos['nombre_legal']);
		$sql->bindParam(":apellido_abogado", $datos['apellido_legal']);
		$sql->bindParam(":inpre_abogado", $datos['numero_inpre']);
		$sql->bindParam(":cedula_abogado", $datos['cedula_legal']);
		$sql->bindParam(":telefono_abogado", $datos['numero_legal']);
		$sql->bindParam(":corre_abogado", $datos['correo_abogado']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function InsertarContratoDatos($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO contrato_datos (id_contrato_datos, id_actor1, id_actor2, id_inmueble, id_tipo_contrato, id_abobogado) 
		VALUES(:id_contrato_datos, :id_actor1, :id_actor2, :id_inmueble, :id_tipo_contrato, :id_abobogado)");

		$sql->bindParam(":id_contrato_datos", $datos['codigo']);
		$sql->bindParam(":id_actor1", $datos['cedula']);
		$sql->bindParam(":id_actor2", $datos['codigo']);
		$sql->bindParam(":id_inmueble", $datos['inmueble']);
		$sql->bindParam(":id_tipo_contrato", $datos['contrato']);
		$sql->bindParam(":id_abobogado", $datos['codigo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function InsertarActor2($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO actor2 (id_actor2, cedula_actor, nombre_actor, apellido_actor, telefono_actor) 
		VALUES(:id_actor2, :cedula_actor, :nombre_actor, :apellido_actor, :telefono_actor)");

		$sql->bindParam(":id_actor2", $datos['codigo']);
		$sql->bindParam(":cedula_actor", $datos['cedula_comprador']);
		$sql->bindParam(":nombre_actor", $datos['nombre_comprador']);
		$sql->bindParam(":apellido_actor", $datos['apellido_comprador']);
		$sql->bindParam(":telefono_actor", $datos['numero_comprador']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}
	}

	public static function UpdatePropietarioContrato($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE inmueble_usuario 
		SET id_usuario = :id_usuario
		WHERE id_inmueble = :id_inmueble");
		$sql->bindParam(":id_usuario", $datos['actor2']);
		$sql->bindParam(":id_inmueble", $datos['inmueble']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public static function BuscarActor2($datos)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM usuario WHERE usuario = :usuario");
		$sql->bindParam(":usuario", $datos['cedula_comprador']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public static function ListaContrato()
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM contrato

			INNER JOIN contrato_datos ON contrato_datos.id_contrato_datos = contrato.id_contrato_datos
			INNER JOIN tipo_contrato ON tipo_contrato.id_tipo_contrato = contrato_datos.id_tipo_contrato
			INNER JOIN abogado ON abogado.id_abogado = contrato_datos.id_abobogado 
			INNER JOIN actor2 ON actor2.id_actor2 = contrato_datos.id_actor2

			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = contrato_datos.id_inmueble
			
			INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
			INNER JOIN inmueble ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
			INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
			INNER JOIN linderos ON inmueble_usuario.id_linderos = linderos.id_linderos

			INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
			INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
			INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
			INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
			
			WHERE inmueble.estado_inmueble >= 4");
		$sql->execute();

		return $result = $sql->fetchAll();

	}

	public function ConsultaContratoModelo()
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM contrato
			INNER JOIN contrato_datos ON contrato_datos.id_contrato_datos = contrato.id_contrato
			INNER JOIN tipo_contrato ON tipo_contrato.id_tipo_contrato = contrato_datos.id_tipo_contrato
			INNER JOIN abogado ON abogado.id_abogado = contrato_datos.id_abobogado 

			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = contrato_datos.id_inmueble
			INNER JOIN inmueble ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
			INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
			INNER JOIN linderos ON inmueble_usuario.id_linderos = linderos.id_linderos
			INNER JOIN usuario ON inmueble_usuario.id_usuario = usuario.id_usuario

			INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario 
		
			INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
			INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			
			WHERE inmueble.estado_inmueble >= 1");
		$sql->execute();

		$result = $sql->fetchAll();

		$dato = 0;

		foreach ($result as $i => $row) {


			$dato++;


			$parroquia = ($row['parroquia'] == 002) ? "CAÑA DE AZUCAR" : "LIMÓN";

			if ($row['id_tipo_contrato'] == 2) {

				$reporte = "<form action='../../reporte/CertificadoContratosArr.php' method='post'>";

			} else {

				$reporte = "<form action='../../reporte/CertificadoContratosVen.php' method='post'>";

			}


			echo "
				<tr>
					<td>#" . $dato . "</td>
		  			<td>" . $row['nombre_abogado'] . "</td>
		  			<td>" . $parroquia . "</td>
		  			<td>" . $row['tipo_contrato'] . "</td>
					<td>Numero de Telefono: " . $row['telefono_inmueble'] . "</td>
					<td>
						<div class='row'>
							<div class='col'>
								" . $reporte . "
								  <input type='hidden' name='datos' value='" . $row['id_inmueble'] . "'>
								  <button type='submit' class='btn btn-danger'>Generar Contrato <span class='fa fa-file-pdf'></span></button>
								</form>
							</div>
		  				</div>
					</td> 
				</tr>
				";
		}

	}

	public function ReporteContratoModelo($datos)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM contrato
			INNER JOIN contrato_datos ON contrato_datos.id_contrato_datos = contrato.id_contrato
			INNER JOIN tipo_contrato ON tipo_contrato.id_tipo_contrato = contrato_datos.id_tipo_contrato
			INNER JOIN abogado ON abogado.id_abogado = contrato_datos.id_abobogado 

			INNER JOIN actor2 ON actor2.id_actor2 = contrato_datos.id_actor2
			INNER JOIN aprobacion_contrato ON aprobacion_contrato.id_contrato = contrato.id_contrato 
			INNER JOIN clausulas ON clausulas.id_clausulas = aprobacion_contrato.clausulas

			INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = contrato_datos.id_inmueble
			INNER JOIN inmueble ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
			INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble 
			INNER JOIN linderos ON inmueble_usuario.id_linderos = linderos.id_linderos
			INNER JOIN usuario ON inmueble_usuario.id_usuario = usuario.id_usuario

			INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario 
		
			INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
			INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
			INNER JOIN servicio_publico ON servicio_publico.id_servicio_publico = inmueble.id_inmueble  

			INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
			INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
			INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
			INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
			
			WHERE inmueble.id_inmueble = $datos");
		$sql->execute();

		$row = $sql->fetch();
		$parroquia = ($row['parroquia'] == 002) ? "CAÑA DE AZUCAR" : "LIMÓN";
		$tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";

		if ($row['parroquia'] == 002) {

			$reporte = "CAÑA DE AZUCAR";

		} else {

			$reporte = "LIMÓN";

		}


		$hola = $this->numeroATexto($row['medida_inmueble']);

		$datos =
			array(
				"id_usuario" => $row['id_usuario'],
				"nombre_usuario" => $row['nombre'],
				"apellido_usuario" => $row['apellido'],
				"id_inmueble" => $row['id_inmueble'],
				"id_direccion_inmueble" => $row['id_direccion_inmueble'],
				"codigo" => $row['id_inmueble'],

				"id_contrato_datos" => $row['id_contrato_datos'],
				"id_tipo_contrato" => $row['id_tipo_contrato'],
				"id_abobogado" => $row['id_abobogado'],
				"fecha_entrega" => $row['fecha_entrega'],
				"monto_pagar" => $row['monto_pagar'],
				"metodo_pago" => $row['metodo_pago'],
				"monto_texto" => $this->numeroATexto($row['monto_pagar']),
				"codig_gmv" => $row['codig_gmv'],

				"cantidad_clausulas" => $row['cantidad_clausulas'],
				"texto_clausulas" => $row['texto_clausulas'],
				"total_clausulas" => $row['total_clausulas'],

				"numero_titulo" => $row['numero_titulo'],
				"folio_titulo" => $row['folio_titulo'],
				"tomo_titulo" => $row['tomo_titulo'],
				"protocolo_titulo" => $row['protocolo_titulo'],
				"fecha_titulo" => $row['fecha_titulo'],
				"anno_titulo" => date('Y', strtotime($row['fecha_titulo'])),

				//tabla abogado//
				"nombre_abogado" => $row['nombre_abogado'],
				"apellido_abogado" => $row['apellido_abogado'],
				"inpre_abogado" => $row['inpre_abogado'],
				"cedula_abogado" => $row['cedula_abogado'],
				"telefono_abogado" => $row['telefono_abogado'],
				"corre_abogado" => $row['corre_abogado'],

				"parroquia_catastral" => $row['parroquia_catastral'],
				"sector_catastral" => $row['sector_catastral'],
				"manzana_catastral" => $row['manzana_catastral'],
				"parcela_catastral" => $row['parcela_catastral'],

				//actor2//
				"cedula_actor" => $row['cedula_actor'],
				"nombre_actor" => $row['nombre_actor'],
				"apellido_actor" => $row['apellido_actor'],
				"telefono_actor" => $row['telefono_actor'],

				"servicio_publico_totales" => $row['servicio_publico_totales'],
				"telefono_inmueble" => $row['telefono_inmueble'],
				"punto_referencia" => $row['punto_referencia'],

				"ubicacion_entre_tipo" => $row['id_ubicacion_inmueble_entre'],
				"ubicacion_entre_text" => $row['ubicacion_inmueble_entre'],
				"descripcion_ubicacion_entre" => strtoupper($row['descripcion_ubicacion_entre']),
				"tenencia" => $tenencia,

				"ubicacion_y_tipo" => $row['id_ubicacion_inmueble_y'],
				"ubicacion_y_text" => $row['ubicacion_inmueble_y'],
				"descripcion_ubicacion_y" => strtoupper($row['descripcion_ubicacion_y']),

				"medida_inmueble" => $row['medida_inmueble'],
				"medida_texto" => $this->numeroATexto($row['medida_inmueble']),
				"valor_inmueble" => $row['valor_inmueble'],
				"parroquia" => $parroquia,
				"n_civico" => $row['n_civico'],
				"residencia" => $row['residencia'],

				"lugar_inmuble_tipo" => $row['id_lugar_inmueble'],
				"lugar_inmuble_text" => $row['lugar_inmueble'],
				"descripcion_lugar" => $row['descripcion_lugar'],

				"tipo_construccion_tipo" => $row['id_tipo_construccion'],
				"descripcion_contruccion" => $row['descripcion_contruccion'],

				"estado_inmueble" => $row['estado_inmueble'],
				"entrada_lindero" => $row['entrada_lindero'],

				"norte_medida" => $row['norte_medida'],
				"norte_texto" => $this->numeroATexto($row['norte_medida']),
				"norte_descripcion" => $row['norte_lindero'],
				"oeste_texto" => $this->numeroATexto($row['oeste_medida']),
				"oeste_medida" => $row['oeste_medida'],
				"oeste_descripcion" => $row['oeste_lindero'],
				"este_texto" => $this->numeroATexto($row['este_medida']),
				"este_medida" => $row['este_medida'],
				"este_descripcion" => $row['este_lindero'],
				"sur_texto" => $this->numeroATexto($row['sur_medida']),
				"sur_medida" => $row['sur_medida'],
				"sur_descripcion" => $row['sur_lindero'],
			);

		return $datos;

	}

	public function Clausulas($datos)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM tipo_clausula
		WHERE id_tipo_clausula = $datos");
		$sql->execute();

		$result = $sql->fetch();

		return $result;
	}

	function numeroATexto($numero)
	{

		$numero = floatval($numero);

		$unidades = [
			'CERO',
			'UNO',
			'DOS',
			'TRES',
			'CUATRO',
			'CINCO',
			'SEIS',
			'SIETE',
			'OCHO',
			'NUEVE',
			'DIEZ',
			'ONCE',
			'DOCE',
			'TRECE',
			'CATORCE',
			'QUINCE',
			'DIECISÉIS',
			'DIECISIETE',
			'DIECIOCHO',
			'DIECINUEVE'
		];

		$decenas = ['', '', 'VEINTE', 'TREINTA', 'CUARENTA', 'CINCUENTA', 'SESENTA', 'SETENTA', 'OCHENTA', 'NOVENTA'];
		$centenas = ['', 'CIENTO', 'DOSCIENTOS', 'TRESCIENTOS', 'CUATROCIENTOS', 'QUINIENTOS', 'SEISCIENTOS', 'SETECIENTOS', 'OCHOCIENTOS', 'NOVECIENTOS'];

		if ($numero == 0) {
			return 'CERO';
		}

		// Separar la parte entera y decimal
		$partes = explode('.', number_format($numero, 2, '.', ''));
		$parteEntera = (int) $partes[0];
		$parteDecimal = isset($partes[1]) ? (int) $partes[1] : 0;

		// Convertir la parte entera
		$textoEntero = '';
		if ($parteEntera < 20) {
			$textoEntero = $unidades[$parteEntera];
		} elseif ($parteEntera < 100) {
			$decena = (int) ($parteEntera / 10);
			$unidad = $parteEntera % 10;
			$textoEntero = $decenas[$decena] . ($unidad > 0 ? ' Y ' . $unidades[$unidad] : '');
		} elseif ($parteEntera < 1000) {
			$centena = (int) ($parteEntera / 100);
			$resto = $parteEntera % 100;
			$textoEntero = $centenas[$centena] . ($resto > 0 ? ' ' . $this->numeroATexto($resto) : '');
		} elseif ($parteEntera < 1000000) {
			$miles = (int) ($parteEntera / 1000);
			$resto = $parteEntera % 1000;
			$textoEntero = $this->numeroATexto($miles) . ' MIL' . ($resto > 0 ? ' ' . $this->numeroATexto($resto) : '');
		} else {
			$textoEntero = 'NÚMERO DEMASIADO GRANDE';
		}

		// Convertir la parte decimal
		$textoDecimal = '';
		if ($parteDecimal > 0) {
			$textoDecimal = ' CON ' . ($parteDecimal < 20 ? $unidades[$parteDecimal] : $this->numeroATexto($parteDecimal)) . '';
		}

		return $textoEntero . $textoDecimal;
	}

	public static function verDetalles($datos)
	{

		echo '<div class="modal fade" id="verDetalles-' . $datos['id_usuario'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header bg-primary">
				<h5 class="modal-title" id="exampleModalLabel">Datos del Avaluo</h5>
			  </div>
			  <div class="modal-body">
				<p>Nº de inscripcion: ' . $datos['id_usuario'] . '</p>
				<b>Datos del Inmueble </b>
				<ul>
					' . $datos['descripcion_contruccion'] . ' | N° Civico ' . $datos['n_civico'] . ' <br>
					Tenencia ' . $datos['tenencia_n'] . '<br>
					Medida del Inmueble ' . $datos['medida_inmueble'] . ' Mts<sup>2</sup> <br>
					<hr>
					Direccion: <br>
					Parroquia ' . $datos['parroquia_n'] . ' | Residencia ' . $datos['residencia'] . '  <br>
					Ubicado en ' . $datos['descripcion_lugar'] . ' ' . $datos['lugar_inmuble_text'] . '<br>
					Entre ' . $datos['descripcion_ubicacion_entre'] . ' ' . $datos['ubicacion_entre_text'] . ' y ' . $datos['descripcion_ubicacion_y'] . ' ' . $datos['ubicacion_y_text'] . ' <br>
					<hr>
					Linderos <br>
					Norte : ' . $datos['norte_medida'] . 'Mts / Colinda con ' . $datos['norte_descripcion'] . ' <br>
					Sur : ' . $datos['sur_medida'] . 'Mts / Colinda con ' . $datos['sur_descripcion'] . ' <br>
					Este : ' . $datos['este_medida'] . 'Mts / Colinda con ' . $datos['este_descripcion'] . ' <br>
					Oeste : ' . $datos['oeste_medida'] . 'Mts / Colinda con ' . $datos['oeste_descripcion'] . ' <br>
					<hr>
				</ul>

			  </div>
			  <div class="modal-footer bg-dark">
				<button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			  </div>
			</div>
		  </div>
		</div>';
	}

}