<?php
  require_once "basedata2.php";
class ModeloEvacuacion extends baseData{

	public static function InsertarEvacuacionModelo($datos) {

		$sql= baseData::conexion()->prepare("INSERT INTO titulo_supletorio (id_titulo_supletorio, id_inmueble_usuario, numero_titulo, folio_titulo, tomo_titulo, protocolo_titulo, fecha_titulo, tipo_titulo) 
		VALUES(:id_titulo_supletorio, :id_inmueble_usuario, :numero_titulo, :folio_titulo, :tomo_titulo, :protocolo_titulo, :fecha_titulo,:tipo_titulo)");

		$sql->bindParam(":id_titulo_supletorio",$datos['codigo']);
		$sql->bindParam(":id_inmueble_usuario",$datos['inmueble']);
		$sql->bindParam(":numero_titulo",$datos['numero_titulo_supletorio']);
		$sql->bindParam(":folio_titulo",$datos['numero_folio']);
		$sql->bindParam(":tomo_titulo",$datos['numero_tomo']);
		$sql->bindParam(":protocolo_titulo",$datos['numero_protocolo']);
		$sql->bindParam(":fecha_titulo",$datos['fecha_evacuacion']);
		$sql->bindParam(":tipo_titulo",$datos['tipo_documento']);

		ModeloEvacuacion::InmuebleEvacuacionModelo($datos);

		if ($sql->execute()) {

			return true;
	  
		} else {

			return false;
		} 
	}

	/*borrar cliente*/
	public static function InmuebleEvacuacionModelo($datos){

		$sql= baseData::conexion()->prepare("UPDATE inmueble SET estado_inmueble =:estado_inmueble WHERE id_inmueble=:id_inmueble");
		$sql->bindParam(":estado_inmueble",$datos['estado_inmueble']);
		$sql->bindParam(":id_inmueble",$datos['inmueble']);
		$sql->execute();

		return $sql;
	}
	
	/* buscador cliente*/
	public static function ConsultaEvacuacionModelo($dato) {

		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble_usuario = solicitud.id_inmueble_usuario
		INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		WHERE usuario.id_usuario = $dato AND (solicitud.tipo_solicitud = 3 AND estado_solicitud = 2)
		ORDER BY id_titulo_supletorio DESC");
		$sql->execute();

		return $result = $sql->fetchAll();
		
    }

	public function ReporteEvacuacionModelo($dato) {

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos

		INNER JOIN titulo_supletorio ON titulo_supletorio.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario

		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		INNER JOIN inspeccion ON inspeccion.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario

		INNER JOIN datos_inspeccion ON datos_inspeccion.id_datos_inspeccion = inmueble_usuario.id_inmueble
		INNER JOIN dato_general_construccion ON dato_general_construccion.id_dato_general_construccion = datos_inspeccion.id_datos_generales 
		
		INNER JOIN dato_estructural_construccion ON dato_estructural_construccion.id_dato_estructural_construccion = datos_inspeccion.id_datos_estructurales 
		INNER JOIN tipo_cubierta ON tipo_cubierta.id_tipo_cubierta = dato_estructural_construccion.id_tipo_cubierta  
		INNER JOIN tipo_techo ON tipo_techo.id_tipo_techo = dato_estructural_construccion.id_tipo_techo  
		INNER JOIN tipo_estructura ON tipo_estructura.id_tipo_estructura = dato_estructural_construccion.id_tipo_estructura  

		INNER JOIN otro_datos ON otro_datos.id_otro_datos = datos_inspeccion.id_datos_otros 
		
		INNER JOIN dato_complementario_construccion ON dato_complementario_construccion.id_dato_complementario_construccion = datos_inspeccion.id_datos_complementario 
		INNER JOIN tipo_conservacion ON tipo_conservacion.id_tipo_conservacion = dato_complementario_construccion.id_conservacion_complementario 
		INNER JOIN tipo_piso ON tipo_piso.id_tipo_piso = dato_complementario_construccion.id_piso_complementario  
		INNER JOIN puerta ON puerta.id_puerta = dato_complementario_construccion.id_puerta_complementario
		INNER JOIN paredes ON paredes.id_paredes = dato_complementario_construccion.id_paredes_complementario
		INNER JOIN tipo_paredes ON tipo_paredes.id_tipo_paredes = paredes.id_tipo_pared 
		INNER JOIN tipo_acabado ON tipo_acabado.id_tipo_acabado = paredes.id_tipo_acabado 
		INNER JOIN tipo_pintura ON tipo_pintura.id_tipo_pintura = paredes.id_tipo_pintura 
		INNER JOIN tipo_instalaciones_electricas ON tipo_instalaciones_electricas.id_tipo_instalaciones_electricas = paredes.id_tipo_instalacion  
		
		INNER JOIN tipo_descripcion_uso ON tipo_descripcion_uso.id_tipo_descripcion_uso = dato_general_construccion.id_destino 
		INNER JOIN tipo_destino ON tipo_destino.id_tipo_destino = dato_general_construccion.id_destino 
		INNER JOIN datos_terreno ON datos_terreno.id_datos_terreno = datos_inspeccion.id_datos_terreno
		INNER JOIN tipo_topografia ON tipo_topografia.id_tipo_topografia = datos_terreno.id_topografia
		INNER JOIN tipo_forma ON tipo_forma.id_tipo_forma = datos_terreno.id_forma
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble 
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre 
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y 
		
		INNER JOIN sectores ON sectores.id_sectores = codigo_catastral.sector_catastral

		WHERE titulo_supletorio.id_titulo_supletorio = $dato");
		$sql->execute();

		$row = $sql->fetch(PDO::FETCH_ASSOC);

			$tenencia = ($row['tenencia_inmueble'] == 1) ? "Municipal" : "Privada";
			$parroquia = ($row['parroquia'] == 002) ? "Caña de Azucar" : "Limón";

			$datos= 
				array(
					//Datos de la Solicitud
					"id_titulo_supletorio" => $row['id_titulo_supletorio'],
					"id_usuario" => $row['id_usuario'],
					"nombre" => $row['nombre'],
					"apellido" => $row['apellido'],
					"telefono_inmueble" => $row['telefono_inmueble'],
					"id_inmueble" => $row['id_inmueble'],
					"descripcion_inmueble" => $row['descripcion_inmueble'],

					"puerta_totales" => $row['puerta_totales'],
					"year_construccion" => $row['year_construccion'],
					"tipo_estructura" => $row['tipo_estructura'],
					"tipo_paredes" => $row['tipo_paredes'],
					"tipo_acabado" => $row['tipo_acabado'],
					"tipo_pintura" => $row['tipo_pintura'],
					"tipo_techo" => $row['tipo_techo'],
					"tipo_cubierta" => $row['tipo_cubierta'],
					"tipo_piso" => $row['tipo_piso'],
					"tipo_instalaciones_electricas" => $row['tipo_instalaciones_electricas'],
					"tipo_conservacion" => $row['tipo_conservacion'],
					
					"nombre_inmueble" => $row['nombre_inmueble'],
					"n_civico" => $row['n_civico'],
					"sector" => $row['sectores'],
					"id_tipo_construccion" => $row['id_tipo_construccion'],
					"tipo_contruccion" => $row['tipo_construccion'],

					"numero_titulo" => $row['numero_titulo'],
					"folio_titulo" => $row['folio_titulo'],
					"tomo_titulo" => $row['tomo_titulo'],
					"protocolo_titulo" => $row['protocolo_titulo'],
					"fecha_titulo" => $row['fecha_titulo'],

					"tipo_forma" => $row['tipo_forma'],
					"tipo_descripcion_uso" => $row['tipo_descripcion_uso'],
					"tipo_destino" => $row['tipo_destino'],
					"tipo_topografia" => $row['tipo_topografia'],

					"norte_lindero" => $row['norte_lindero'],
					"norte_medida" => $row['norte_medida'],
					"este_lindero" => $row['este_lindero'],
					"este_medida" => $row['este_medida'],
					"oeste_lindero" => $row['oeste_lindero'],
					"oeste_medida" => $row['oeste_medida'],
					"sur_lindero" => $row['sur_lindero'],
					"sur_medida" => $row['sur_medida'],
					"entrada_lindero" => $row['entrada_lindero'],

					//datos del cliente
					"id_propietario" => $row['id_usuario'],
					"inmueble" => $row['id_inmueble'],
					"id_direccion_inmueble" => $row['id_direccion_inmueble'],

					"tenencia" => $tenencia,

					"parroquia_catastral" => $row['parroquia_catastral'],
					"sector_catastral" => $row['sector_catastral'],
					"manzana_catastral" => $row['manzana_catastral'],
					"parcela_catastral" => $row['parcela_catastral'],

					"superficie_c" => $row['superficie_c'],
					"superficie_t" => $row['superficie_t'],

					"parroquia" => $parroquia,
					"residencia" => $row['residencia'],
					"lugar_inmueble" => $row['lugar_inmueble'],
					"descripcion_lugar" => $row['descripcion_lugar'],

					"ubicacion_inmueble_entre" => $row['ubicacion_inmueble_entre'],
					"descripcion_e" => $row['descripcion_ubicacion_entre'],
					"ubicacion_inmueble_y" => $row['ubicacion_inmueble_y'],
					"descripcion_y" => $row['descripcion_ubicacion_y'],

					"punto_referencia" => $row['punto_referencia'],
					"estado_inmueble" => $row['estado_inmueble'],
				);

		return $datos;
    }
	
	/* buscador cliente*/
	public function SolicitudesEnEspera() {

		$sql = baseData::conexion()->prepare("SELECT * FROM solicitud
		INNER JOIN motivo_solicitud ON motivo_solicitud.id_motivo_solicitud = solicitud.id_solicitud
		INNER JOIN representante ON	representante.id_representante = solicitud.id_representante
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = solicitud.id_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tc = direccion_inmueble.id_tipo_construccion
		INNER JOIN usuario ON usuario.id_usuario = solicitud.id_usuario
		WHERE estado_solicitud = 1
		ORDER BY id_solicitud DESC");
		$sql->execute();

		$result = $sql->fetchAll();

		foreach ($result as $i => $row) {

			list($año, $mes, $dia) = explode('-', $row['fecha_solicitud']);

			// Reconstruimos la fecha en el formato deseado
			$fecha_nueva = "$dia/$mes/$año";

			$datos= 
				array(
					//Datos de la Solicitud
					"id_solicitud" => $row['id_solicitud'],
					"id_usuario" => $row['id_usuario'],
					"id_motivo" => $row['id_motivo'],
					"fecha_solicitud" => $fecha_nueva,
					"id_inmueble" => $row['id_inmueble'],
					"razon_inmueble" => $row['razon_inmueble'],
					
					"nombre_usuario" => $row['nombre_usuario'],
					"apellido_usuario" => $row['apellido_usuario'],

					"nombre" => $row['nombre'],
					"n_civico" => $row['n_civico'],
					"id_tipo_construccion" => $row['id_tipo_construccion'],
					"tipo_c" => $row['tipo_c'],

					//Datos del Motivo
					"id_motivo_solicitud" => $row['id_motivo_solicitud'],
					"id_propietario" => $row['id_propietario'],
					"cantidad_solicitud" => $row['cantidad_solicitud'],
					"total_solicitud" => $row['total_solicitud'],
					
					//Datos del Representante
					"id_representante" => $row['id_representante'],
					"cedula_representante" => $row['cedula_representante'],
					"nombre_completo" => $row['nombre_completo'],
					"apellido_completo" => $row['apellido_completo'],
					"numero_representante" => $row['numero_representante'],
					"estado_representante" => $row['estado_representante'],
				);

			echo "
				<tr data-widget='expandable-table' aria-expanded='false'>
            	  <td>CS-0" . $datos['id_solicitud'] . "</td>
            	  <td>".$row['tipo_c']." N°".$row['n_civico']."</td>
            	  <td>11-7-2014</td>
            	  <td>Approved</td>
            	  <td>
				  	<form action='regis-cita.php' method='post'>
						<input type='hidden' name='datos' value='". htmlentities(serialize($datos)) ."'>
						<button type='submit' class='btn btn-primary'>Aprobar <span class='fa fa-check'></span></button>
					</form>
					<br>
				  	<form action='regis-negacion.php' method='post'>
						<input type='hidden' name='datos' value='". htmlentities(serialize($datos)) ."'>
						<button type='submit' class='btn btn-danger'>Negar <span class='fa fa-ban'></span></button>
					</form>
				  </td>
            	</tr>
            	<tr class='expandable-body'>
            	  <td colspan='5' class='p-3'>
            	    <p> Razon de la Solicitud: ".$row['razon_inmueble']."<br>
					<br>Motivo de la Solicitud:
					<br>".$row['cantidad_solicitud']."</p>
            	  </td>
            	</tr>";

				

		}
		
    }

	
	/* buscador cliente*/
	public function MostrarListaEvacuacionModelo($dato) {

		$sql = baseData::conexion()->prepare("SELECT * FROM direccion_inmueble
		INNER JOIN titulo_supletorio ON	titulo_supletorio.id_inmueble = direccion_inmueble.id_direccion_inmueble
		INNER JOIN tipo_construccion ON	tipo_construccion.id_tc = direccion_inmueble.id_tipo_construccion
		INNER JOIN usuario ON usuario.id_usuario = titulo_supletorio.id_propietario
		WHERE direccion_inmueble.inmueble_titulo = 1 ORDER BY id_titulo_supletorio DESC");
		$sql->execute();

		$result = $sql->fetchAll();

		foreach ($result as $i => $row) {

			if($row['tipo_titulo'] == 2){

				$row['titulo'] = "Titulo Notariado";

			}else{

				$row['titulo'] = "Titulo Registrado";

			}

			$datos= 
				array(
					//Datos de la Solicitud
					"id_usuario" => $row['id_usuario'],
					"id_inmueble" => $row['id_inmueble'],
					"titulo" => $row['titulo'],
					
					"nombre" => $row['nombre'],
					"n_civico" => $row['n_civico'],
					"id_tipo_construccion" => $row['id_tipo_construccion'],
					"tipo_c" => $row['tipo_c'],
					
				);

			echo "
				<tr data-widget='expandable-table' aria-expanded='false'>
            	  <td>".$row['id_titulo_supletorio']."</td>
            	  <td>".$row['tipo_c']." N°".$row['n_civico']."</td>
            	  <td>11-7-2014</td>

            	  <td> <form action='form.php' method='post'>
                    <input type='hidden' name='datos' value= '". htmlentities(serialize($datos)) ."'>
                    <button type='submit' class='btn btn-secondary'>Acta de Verificacion <span class='fa fa-file-pdf'></button>
                  </form></td>

            	  <td>".$row['titulo']."</td>
            	</tr>
            	<tr class='expandable-body'>
            	  <td colspan='5' class='p-3'>
            	    <p> Razon de la Solicitud: <br>
					<br>Motivo de la Solicitud:
					<br></p>
            	  </td>
            	</tr>";

		}
		
    }

	/* registrar cliente*/
	public function InsertarNegarModelo($datos) {

		$sql= baseData::conexion()->prepare("INSERT INTO denegacion (id_denegacion, id_funcionario, id_solicitud, descripcion) 
		VALUES(:id_denegacion, :id_funcionario, :id_solicitud, :descripcion)");
		$sql->bindParam(":id_denegacion",$datos['id_denegacion']);
		$sql->bindParam(":id_funcionario",$datos['id_funcionario']);
		$sql->bindParam(":id_solicitud",$datos['id_solicitud']);
		$sql->bindParam(":descripcion",$datos['descripcion']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		} 
	}
} 