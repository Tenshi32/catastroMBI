<?php
require_once "basedata2.php";
class ModeloInspeccion extends baseData
{

	public static function InmuebleSelectAccion($dato)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble 
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario 
		INNER JOIN linderos ON linderos.id_linderos = inmueble_usuario.id_linderos
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		INNER JOIN sectores ON sectores.id_sectores = codigo_catastral.sector_catastral
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		WHERE inmueble.id_direccion_inmueble = $dato");

		$sql->execute();

		return $result = $sql->fetch(PDO::FETCH_ASSOC);

	}

	public function verDetalles($datos)
	{

		echo '<div class="modal fade text-dark" id="verDetalles-' . $datos['id_usuario'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

	public static function listaSoliInspeccion()
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		INNER JOIN sectores ON sectores.id_sectores = codigo_catastral.sector_catastral
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		WHERE inmueble.estado_inmueble = 2 ORDER BY inmueble.id_inmueble DESC");
		$sql->execute();

		$result = $sql->fetchAll();

		return $result;

	}

	public static function ReporteSoliInspeccion($token)
	{

		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble
		INNER JOIN inmueble_usuario ON inmueble_usuario.id_inmueble = inmueble.id_inmueble
		INNER JOIN direccion_inmueble ON direccion_inmueble.id_direccion_inmueble = inmueble.id_direccion_inmueble
		INNER JOIN tipo_lugar_inmueble ON tipo_lugar_inmueble.id_tipo_lugar_inmueble = direccion_inmueble.id_lugar_inmueble
		INNER JOIN tipo_ubicacion_entre ON tipo_ubicacion_entre.id_tipo_ubicacion_entre = direccion_inmueble.id_ubicacion_inmueble_entre
		INNER JOIN ubicacion_inmueble_y ON ubicacion_inmueble_y.id_ubicacion_inmueble_y = direccion_inmueble.id_ubicacion_inmueble_y
		INNER JOIN componente_ficha ON componente_ficha.id_inmueble_usuario = inmueble_usuario.id_inmueble_usuario
		INNER JOIN codigo_catastral ON codigo_catastral.id_codigo_catastral = componente_ficha.id_codigo_catastral
		INNER JOIN sectores ON sectores.id_sectores = codigo_catastral.sector_catastral
		INNER JOIN tipo_construccion ON tipo_construccion.id_tipo_construccion = direccion_inmueble.id_tipo_construccion
		WHERE inmueble.estado_inmueble = 2 AND inmueble.id_direccion_inmueble = $token");
		$sql->execute();

		$result = $sql->fetch();

		return $result;

	}

	/*Guardado de Inspeccion*/
	public static function InsertarInspeccionModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO inspeccion (id_inmueble_usuario, id_funcionario, clase_inmueble, fecha_inspecion, superficie_c, superficie_t, area_cr, area_tr, area_cc, area_tc) 
		VALUES(:id_inmueble_usuario, :id_funcionario, :clase_inmueble, :fecha_inspecion, :superficie_c, :superficie_t, :area_cr, :area_tr, :area_cc, :area_tc)");
		$sql->bindParam(":id_inmueble_usuario", $datos['inmueble']);
		$sql->bindParam(":id_funcionario", $datos['id_funcionario']);
		$sql->bindParam(":clase_inmueble", $datos['clase_inmueble']);
		$sql->bindParam(":fecha_inspecion", $datos['dia']);
		$sql->bindParam(":superficie_c", $datos['area_m2_c']);
		$sql->bindParam(":superficie_t", $datos['area_m2_t']);
		$sql->bindParam(":area_cr", $datos['area_cr']);
		$sql->bindParam(":area_tr", $datos['area_tr']);
		$sql->bindParam(":area_cc", $datos['area_cc']);
		$sql->bindParam(":area_tc", $datos['area_tc']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public static function InsertarXHabitacion($habitacion, $lista, $total, $datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO $habitacion (id_$habitacion, total_$habitacion, x_piso_$habitacion) 
		VALUES(:id_$habitacion, :total_$habitacion, :x_piso_$habitacion)");
		$sql->bindParam(":id_$habitacion", $datos['id_inmueble']);
		$sql->bindParam(":total_$habitacion", $total);
		$sql->bindParam(":x_piso_$habitacion", $lista );


		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Datos Inspeccion*/
	public static function InsertarDatosInspeccionModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO datos_inspeccion(id_datos_inspeccion, id_escala, id_datos_complementario, id_datos_otros, id_datos_estructurales, id_datos_terreno, id_datos_ambiente, id_datos_dimensiones, id_datos_declaracion_ocupantes, id_datos_generales) 
		VALUES(:id_datos_inspeccion, :id_escala, :id_datos_complementario, :id_datos_otros, :id_datos_estructurales, :id_datos_terreno, :id_datos_ambiente, :id_datos_dimensiones, :id_datos_declaracion_ocupantes, :id_datos_generales)");
		$sql->bindParam(":id_datos_inspeccion", $datos['id_inmueble']);
		$sql->bindParam(":id_escala", $datos['tipo_escala']);
		$sql->bindParam(":id_datos_complementario", $datos['id_inmueble']);
		$sql->bindParam(":id_datos_otros", $datos['id_inmueble']);
		$sql->bindParam(":id_datos_estructurales", $datos['id_inmueble']);
		$sql->bindParam(":id_datos_terreno", $datos['id_inmueble']);
		$sql->bindParam(":id_datos_ambiente", $datos['id_inmueble']);
		$sql->bindParam(":id_datos_dimensiones", $datos['id_inmueble']);
		$sql->bindParam(":id_datos_declaracion_ocupantes", $datos['id_inmueble']);
		$sql->bindParam(":id_datos_generales", $datos['id_inmueble']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Servicio Publico*/
	public static function InsertarServicioPublicoModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO servicio_publico(id_servicio_publico, servicio_publico_totales, cantidad_servicio_publico, codigo_servicio_publico) 
		VALUES(:id_servicio_publico, :servicio_publico_totales, :cantidad_servicio_publico, :codigo_servicio_publico)");
		$sql->bindParam(":id_servicio_publico", $datos['id_inmueble']);
		$sql->bindParam(":servicio_publico_totales", $datos['servicio_texto']);
		$sql->bindParam(":cantidad_servicio_publico", $datos['servicio_cantidad']);
		$sql->bindParam(":codigo_servicio_publico", $datos['servicio_codigo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Ventana*/
	public static function InsertarVentanaModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO ventana(id_ventana, ventana_totales, cantidad_ventana, codigo_ventana) 
		VALUES(:id_ventana, :ventana_totales, :cantidad_ventana, :codigo_ventana)");
		$sql->bindParam(":id_ventana", $datos['id_inmueble']);
		$sql->bindParam(":ventana_totales", $datos['ventana_texto']);
		$sql->bindParam(":cantidad_ventana", $datos['ventana_cantidad']);
		$sql->bindParam(":codigo_ventana", $datos['ventana_codigo']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Puerta*/
	public static function InsertarPuertaModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO puerta(id_puerta, puerta_totales, cantidad_puerta, codigo_puerta) 
		VALUES(:id_puerta, :puerta_totales, :cantidad_puerta, :codigo_puerta)");
		$sql->bindParam(":id_puerta", $datos['id_inmueble']);
		$sql->bindParam(":puerta_totales", $datos['puerta_texto']);
		$sql->bindParam(":cantidad_puerta", $datos['puerta_cantidad']);
		$sql->bindParam(":codigo_puerta", $datos['puerta_codigo']);

		if ($sql->execute()) {



			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Datos Terreno*/
	public static function InsertarDatosTerrenoModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO datos_terreno(id_datos_terreno, id_topografia, id_acceso, id_forma, id_ubicacion, id_entorno_fisico, id_mejora_terreno, id_tenencia_terreno, id_regimen_propiedad, id_servicios_publicos) 
		VALUES(:id_datos_terreno, :id_topografia, :id_acceso, :id_forma, :id_ubicacion, :id_entorno_fisico, :id_mejora_terreno, :id_tenencia_terreno, :id_regimen_propiedad, :id_servicios_publicos)");
		$sql->bindParam(":id_datos_terreno", $datos['id_inmueble']);
		$sql->bindParam(":id_topografia", $datos['topografia']);
		$sql->bindParam(":id_acceso", $datos['acceso']);
		$sql->bindParam(":id_forma", $datos['forma']);
		$sql->bindParam(":id_ubicacion", $datos['ubicacion']);
		$sql->bindParam(":id_entorno_fisico", $datos['entorno']);
		$sql->bindParam(":id_mejora_terreno", $datos['mejora']);
		$sql->bindParam(":id_tenencia_terreno", $datos['tenecia_terreno']);
		$sql->bindParam(":id_regimen_propiedad", $datos['regimen']);
		$sql->bindParam(":id_servicios_publicos", $datos['id_inmueble']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Datos Generales*/
	public static function InsertarDatosGeneralesModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO dato_general_construccion(id_dato_general_construccion, id_destino, id_regimen_prioridad, id_tipo_construccion_general) 
		VALUES(:id_dato_general_construccion, :id_destino, :id_regimen_prioridad, :id_tipo_construccion_general)");
		$sql->bindParam(":id_dato_general_construccion", $datos['id_inmueble']);
		$sql->bindParam(":id_destino", $datos['descripcion_uso']);
		$sql->bindParam(":id_regimen_prioridad", $datos['regimen_construccion']);
		$sql->bindParam(":id_tipo_construccion_general", $datos['tipo_construccion']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}
	}

	/*Guardado de Datos Estructurales*/
	public static function InsertarDatosEstructuralesModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO dato_estructural_construccion(id_dato_estructural_construccion, id_tipo_cubierta, id_tipo_techo, id_tipo_estructura) 
		VALUES(:id_dato_estructural_construccion, :id_tipo_cubierta, :id_tipo_techo, :id_tipo_estructura)");
		$sql->bindParam(":id_dato_estructural_construccion", $datos['id_inmueble']);
		$sql->bindParam(":id_tipo_cubierta", $datos['cubierta_inmueble']);
		$sql->bindParam(":id_tipo_techo", $datos['soporte_inmueble']);
		$sql->bindParam(":id_tipo_estructura", $datos['techo_inmueble']);
		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Datos Complementario*/
	public static function InsertarDatosComplementarioModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO dato_complementario_construccion(id_dato_complementario_construccion, id_paredes_complementario, id_piso_complementario, id_bano_complementario, id_puerta_complementario, id_ventana_complementario, id_adicional_complementario, id_conservacion_complementario, sotano_complementario, ascensor_complementario, observacion_complementario) 
		VALUES(:id_dato_complementario_construccion, :id_paredes_complementario, :id_piso_complementario, :id_bano_complementario, :id_puerta_complementario, :id_ventana_complementario, :id_adicional_complementario, :id_conservacion_complementario, :sotano_complementario, :ascensor_complementario, :observacion_complementario)");
		$sql->bindParam(":id_dato_complementario_construccion", $datos['id_inmueble']);
		$sql->bindParam(":id_paredes_complementario", $datos['id_inmueble']);
		$sql->bindParam(":id_bano_complementario", $datos['conservacion_inmueble']);
		$sql->bindParam(":id_piso_complementario", $datos['piso_inmueble']);
		$sql->bindParam(":id_puerta_complementario", $datos['id_inmueble']);
		$sql->bindParam(":id_ventana_complementario", $datos['id_inmueble']);
		$sql->bindParam(":id_adicional_complementario", $datos['conservacion_inmueble']);
		$sql->bindParam(":id_conservacion_complementario", $datos['conservacion_inmueble']);
		$sql->bindParam(":sotano_complementario", $datos['Sotano']);
		$sql->bindParam(":ascensor_complementario", $datos['Azotea']);
		$sql->bindParam(":observacion_complementario", $datos['observacion']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Paredes*/
	public static function InsertarParedesModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO paredes(id_paredes, id_tipo_pared, id_tipo_acabado, id_tipo_pintura, id_tipo_instalacion) 
		VALUES(:id_paredes, :id_tipo_pared, :id_tipo_acabado, :id_tipo_pintura, :id_tipo_instalacion)");
		$sql->bindParam(":id_paredes", $datos['id_inmueble']);
		$sql->bindParam(":id_tipo_pared", $datos['paredes_inmueble']);
		$sql->bindParam(":id_tipo_acabado", $datos['acabado_inmueble']);
		$sql->bindParam(":id_tipo_pintura", $datos['pintura_inmueble']);
		$sql->bindParam(":id_tipo_instalacion", $datos['instalaciones_electricas_inmueble']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Paredes*/
	public static function InsertarDatosAmbienteModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO datos_ambiente(id_ambientes, dormitorios, sala, banno, comedor, oficina, servicio, garaje) 
		VALUES(:id_ambientes, :dormitorios, :sala, :banno, :comedor, :oficina, :servicio, :garaje)");
		$sql->bindParam(":id_ambientes", $datos['id_inmueble']);
		$sql->bindParam(":dormitorios", $datos['id_inmueble']);
		$sql->bindParam(":sala", $datos['id_inmueble']);
		$sql->bindParam(":banno", $datos['id_inmueble']);
		$sql->bindParam(":comedor", $datos['id_inmueble']);
		$sql->bindParam(":oficina", $datos['id_inmueble']);
		$sql->bindParam(":servicio", $datos['id_inmueble']);
		$sql->bindParam(":garaje", $datos['id_inmueble']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	/*Guardado de Otros Datos*/
	public static function InsertarOtrosDatosModelo($datos)
	{

		$sql = baseData::conexion()->prepare("INSERT INTO otro_datos (id_otro_datos, year_construccion, year_refaccion, n_edificaciones) 
		VALUES(:id_otro_datos, :year_construccion, :year_refaccion, :n_edificaciones)");
		$sql->bindParam(":id_otro_datos", $datos['id_inmueble']);
		$sql->bindParam(":year_construccion", $datos['anno_construccion']);
		$sql->bindParam(":year_refaccion", $datos['anno_refaccion']);
		$sql->bindParam(":n_edificaciones", $datos['n_edificaciones']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;
		}

	}

	public static function ActualizarManzanaCodigoModelo($datos)
	{
		$sql = baseData::conexion()->prepare("UPDATE codigo_catastral SET manzana_catastral=:manzana_catastral WHERE id_codigo_catastral =:id_codigo_catastral");
		$sql->bindParam(":id_codigo_catastral", $datos['id_inmueble']);
		$sql->bindParam(":manzana_catastral", $datos['manzana']);

		if ($sql->execute()) {

			return true;

		} else {

			return false;

		}

	}

	/*Creador de Campo x Nivel del Inmueble*/
	public function MostrarXNivel($tipo, $dato)
	{


		switch ($tipo) {

			case $tipo == "Edificio" || $tipo == "Centro Comercial" || $tipo == "Local Comercial" || $tipo == "Oficina" || $tipo == "Galpon":

				// Generar los campos del formulario dinámicamente
				for ($i = 1; $i <= $dato; $i++) {

					echo "
					<label for='numero'>Nivel #$i</label>
					<input type='hidden' name='piso-$i-campo-Nivel' id='piso-$i-campo-Nivel' value='$i'>
						<div class='row'>
						  <div class='col'>
							<div class='form-group'>
							  <label><img src='../../public/images/almacen.png' alt='User Avatar' width='70' height='70'>
								Almacenes</label>
							  <input type='text' name='piso-$i-campo-Garage' id='piso-$i-campo-Garage' class='form-control' maxlength='3'>
							</div>
						  </div>	
								
						  <div class='col'>
							<div class='form-group'>
							  <label><img src='../../public/images/servicio.png' alt='User Avatar' width='70' height='70'>
								Zona de Servicio</label>
							  <input type='text' name='piso-$i-campo-Servicio' id='piso-$i-campo-Servicio' class='form-control' maxlength='3'>
							</div>
						  </div>
								
						  <div class='col'>
							<div class='form-group'>
							  <label><img src='../../public/images/oficina.png' alt='User Avatar' width='70' height='70'>
								Oficinas</label>
							  <input type='text' name='piso-$i-campo-Oficinas' id='piso-$i-campo-Oficinas' class='form-control' maxlength='3'>
							</div>
						  </div>
								
						  <div class='col'>
							<div class='form-group'>
							  <label><img src='../../public/images/baño.png' alt='User Avatar' width='70' height='70'>
								Baños</label>
							  <input type='text' name='piso-$i-campo-Bannos' id='piso-$i-campo-Bannos' class='form-control' maxlength='3'>
							</div>
						  </div>

						  <div class='col'>
							<div class='form-group'>
							  <label><img src='../../public/images/cocina.png' alt='User Avatar' width='70' height='70'>
								Cocinas</label>
							  <input type='text' name='piso-$i-campo-Cocina' id='piso-$i-campo-Cocina' class='form-control' maxlength='3'>
							</div>
						  </div>

						  <div class='col'>
							<div class='form-group'>
							  <label><img src='../../public/images/cocina.png' alt='User Avatar' width='70' height='70'>
								Cocinas</label>
							  <input type='text' name='piso-$i-campo-Comedor' id='piso-$i-campo-Comedor' class='form-control' maxlength='3'>
							</div>
						  </div>
						</div>

                		<input type='hidden' id='piso-$i-campo-Dormitorio' name='piso-$i-campo-Dormitorio' value='0'>
                		<input type='hidden' id='piso-$i-campo-Sala' name='piso-$i-campo-Sala' value='0'>

					";

				}

				break;

			default:

				// Generar los campos del formulario dinámicamente
				for ($i = 1; $i <= $dato; $i++) {

					echo "
						<label for='numero'>Nivel #$i</label>
					<input type='hidden' name='piso-$i-campo-Nivel' id='piso-$i-campo-Nivel' value='$i'>
						<div class='row'>
                		  <div class='col'>
                		    <div class='form-group'>
                		      <label><img src='../../public/images/cuarto.png' alt='User Avatar' width='70' height='70'>
                		        Dormitorios</label>
                		      <input type='text' name='piso-$i-campo-dormitorio' id='piso-$i-campo-dormitorio' class='form-control' maxlength='3'>
                		    </div>
                		  </div>

                		  <div class='col'>
                		    <div class='form-group'>
                		      <label><img src='../../public/images/baño.png' alt='User Avatar' width='70' height='70'>
                		        Baños</label>
                		      <input type='text' name='piso-$i-campo-banno' id='piso-$i-campo-banno' class='form-control' maxlength='3'>
                		    </div>
                		  </div>

                		  <div class='col'>
                		    <div class='form-group'>
                		      <label><img src='../../public/images/cocina.png' alt='User Avatar' width='70' height='70'>
                		        Cocinas</label>
                		      <input type='text' name='piso-$i-campo-cocina' id='piso-$i-campo-cocina' class='form-control' maxlength='3'>
                		    </div>
                		  </div>

						  <div class='col'>
                		    <div class='form-group'>
                		      <label><img src='../../public/images/comedor.png' alt='User Avatar' width='70' height='70'>
                		        Comedores</label>
                		      <input type='text' name='piso-$i-campo-comedor' id='piso-$i-campo-comedor' class='form-control' maxlength='3'>
                		    </div>
                		  </div>

                		  <div class='col'>
                		    <div class='form-group'>
                		      <label><img src='../../public/images/oficina.png' alt='User Avatar' width='70' height='70'>
                		        Estudio/Oficina</label>
                		      <input type='text' name='piso-$i-campo-oficina' id='piso-$i-campo-oficina' class='form-control' maxlength='3'>
                		    </div>
                		  </div>

                		  <div class='col'>
                		    <div class='form-group'>
                		      <label><img src='../../public/images/sala.png' alt='User Avatar' width='70' height='70'>
                		        Salas</label>
                		      <input type='text' name='piso-$i-campo-sala' id='piso-$i-campo-sala' class='form-control' maxlength='3'>
                		    </div>
                		  </div>

                		  <div class='col'>
                		    <div class='form-group'>
                		      <label><img src='../../public/images/garage.png' alt='User Avatar' width='70' height='70'>
                		        Garages</label>
                		      <input type='text' name='piso-$i-campo-garage' id='piso-$i-campo-garage' class='form-control' maxlength='3'>
                		    </div>
                		  </div>

                		</div>

						<input type='hidden' id='piso-$i-campo-servicio' name='piso-$i-campo-servicio' value='0'>
					";
				}

				break;

		}
	}
}