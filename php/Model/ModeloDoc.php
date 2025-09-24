<?php

require_once "basedata2.php";

class ModeloDoc extends baseData
{

	/*datos select-Unidad*/
	public static function CarpetaInmueble($file, $data)
	{

		$CarpetaInmueble = "../../DocumentosRaiz/" . $data["id_inmueble"];

		if (!is_dir($CarpetaInmueble)) {

			mkdir($CarpetaInmueble, 0755);

			ModeloDoc::CarpetaPropietario($file, $CarpetaInmueble, $data);

		} else if (is_dir($CarpetaInmueble)) {

			ModeloDoc::CarpetaPropietario($file, $CarpetaInmueble, $data);

		}
	}
	public static function CarpetaPropietario($file, $CarpetaInmueble, $data)
	{

		$CarpetaPropietario = $CarpetaInmueble . "/" . $data["cedula"];

		if (!is_dir($CarpetaPropietario)) {

			mkdir($CarpetaPropietario, 0755);

			ModeloDoc::CargaDoc($file, $CarpetaPropietario, $data);

		} else if (is_dir($CarpetaPropietario)) {

			ModeloDoc::CargaDoc($file, $CarpetaPropietario, $data);
		}

	}
	public static function CargaDoc($file, $CarpetaPropietario, $data)
	{
		$Acciones = array(
			"Cedula" => $CarpetaPropietario . "/ Cedula V-" . $data["cedula"] . " " . date("d-m-Y") . ".pdf",
			"Rif" => $CarpetaPropietario . "/ Rif " . $data["cedula"] . " " . date("d-m-Y") . ".pdf",
			"Titulo_Supletorio" => $CarpetaPropietario . "/ Titulo Supletorio " . $data["id_inmueble"] . " " . date("d-m-Y") . ".pdf",
			"Constancia_Catastral" => $CarpetaPropietario . "/ Constancia Catastral " . $data["id_inmueble"] . " " . date("d-m-Y") . ".pdf",
			"Compra_Venta" => $CarpetaPropietario . "/ Compra Venta " . $data["id_inmueble"] . " " . date("d-m-Y") . ".pdf",
			"Compra_Venta_Anterior" => $CarpetaPropietario . "/ Compra Venta Anterior " . $data["id_inmueble"] . " " . date("d-m-Y") . ".pdf",
			"Plano_Mensura" => $CarpetaPropietario . "/ Plano Mensura " . $data["id_inmueble"] . " " . date("d-m-Y") . ".png",
			"Propiedad_Documento" => $CarpetaPropietario . "/ Documento de Propiedad " . $data["id_inmueble"] . " " . date("d-m-Y") . ".pdf",
			"Autorizacion" => $CarpetaPropietario . "/ Autorizacion de Representación Legal " . $data["cedula"] . " " . date("d-m-Y") . ".pdf",
			"Venta_Plazo" => $CarpetaPropietario . "/ Documento de Venta Plazo" . $data["id_inmueble"] . " " . date("d-m-Y") . ".pdf",
			"vauche_vivienda" => $CarpetaPropietario . "/ Vauche de la Vivienda" . $data["id_inmueble"] . " " . date("d-m-Y") . ".pdf",
		);

		foreach ($Acciones as $nombreCampo => $rutaArchivo) {
			$fechaActual = time();
			$fechaArchivo = file_exists($rutaArchivo) ? filemtime($rutaArchivo) : 0;

			// Calcula la diferencia en segundos entre la fecha actual y la fecha del archivo
			$diferencia = $fechaActual - $fechaArchivo;

			// Calcula la diferencia en años
			$unAñoEnSegundos = 365 * 24 * 60 * 60;
			$diferenciaEnAños = $diferencia / $unAñoEnSegundos;

			if ($diferenciaEnAños > 1 || $fechaArchivo === 0) {

				if (isset($file[$nombreCampo]) && $file[$nombreCampo]['error'] === UPLOAD_ERR_OK) {

					move_uploaded_file($file[$nombreCampo]['tmp_name'], $rutaArchivo);

				}
			}
		}
	}
	public static function BuscarDoc($dato, $files)
	{
		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble_usuario
    	INNER JOIN usuario ON usuario.id_usuario = inmueble_usuario.id_usuario
   		WHERE id_inmueble_usuario = :id_inmueble_usuario");
		$sql->bindParam(":id_inmueble_usuario", $dato);
		$sql->execute();
		$data = $sql->fetch(PDO::FETCH_ASSOC);

		$carpeta_inmueble = "../DocumentosRaiz/" . $data["id_inmueble"] . "/" . $data["id_usuario"];
		$documentos_html = '<div class="row">';

		if (is_dir($carpeta_inmueble)) {
			$directorio = dir($carpeta_inmueble);

			foreach ($files as $nombreBaseDeseado) {
				$archivoEncontrado = null;

				// Reiniciamos el puntero del directorio para cada nombre base
				$directorio->rewind();

				while (false !== ($entrada = $directorio->read())) {
					if ($entrada != '.' && $entrada != '..') {
						// Verificamos si el nombre del archivo comienza con el nombre base deseado y es PDF
						if (strpos($entrada, $nombreBaseDeseado) === 0 && strtolower(pathinfo($entrada, PATHINFO_EXTENSION)) === 'pdf') {
							$archivoEncontrado = $carpeta_inmueble . '/' . $entrada;
							break; // Si encontramos el primero que coincide (podrías modificar esto para buscar el más reciente)
						}
					}
				}

				if ($archivoEncontrado) {
					$nombreMostrar = basename($archivoEncontrado);
					$documentos_html .= "
                    <div class='col mr-5 mb-3'>
						<a href='$archivoEncontrado' target='_blank'>
                    	    <button class='btn btn-danger'>
                    	        <i class='fa fa-file-pdf'></i> $nombreMostrar
                    	    </button>
                    	</a>
                    </div>
					
                ";
				}
			}
			$documentos_html .= '</div>';
			$directorio->close();
		}

		echo $documentos_html; // Imprimimos el HTML generado
	}
	public static function buscar_archivos_inmuebles($id_propietario)
	{
		$sql = baseData::conexion()->prepare("SELECT * FROM inmueble_usuario 
		INNER JOIN inmueble ON inmueble.id_inmueble = inmueble_usuario.id_inmueble 
		WHERE id_usuario = :id_usuario");
		$sql->bindParam(":id_usuario", $id_propietario);
		$sql->execute();

		$resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

		foreach ($resultados as $resultado) {
			ModeloDoc::MostrarXFila($resultado, $id_propietario);
		}

	}
	public static function MostrarXFila($resultado, $id_propietario)
	{
		$codigo_inmueble = $resultado['id_inmueble'];
		$carpeta_inmueble = "DocumentosRaiz/" . $codigo_inmueble . "/" . $id_propietario;

		$documentos_html = ''; // Variable para almacenar el HTML de los documentos

		if (is_dir($carpeta_inmueble)) {
			$directorio = dir($carpeta_inmueble);

			while (false !== ($entrada = $directorio->read())) {
				if ($entrada != '.' && $entrada != '..') {
					$ruta = $carpeta_inmueble . '/' . $entrada;
					$nombre_archivo = basename($ruta);
					$extension = pathinfo($ruta, PATHINFO_EXTENSION);

					if (strtolower($extension) !== 'png') {
						$documentos_html .= "
                    
                        <a href='$ruta' target='_blank' class='mb-3'>
							<button class='btn btn-danger btn-block'>
                        	    <i class='fa fa-file-pdf'></i> $nombre_archivo
							</button>
                        </a>
                    
    	            	";
					}
				}
			}
			$directorio->close();
		}

		// Generar la fila principal y la fila expandible
		echo "
    	    <tr data-widget='expandable-table' aria-expanded='false'>
    	        <td>{$codigo_inmueble}<br> 
				{$resultado['nombre_inmueble']} N° Civico{$resultado['n_civico']} | Residencia {$resultado['residencia']}</td>
    	    </tr>
    	    <tr class='expandable-body'>
    	        <td colspan='5' class='p-3'>
    	            <div class='row'>
    	                {$documentos_html}
    	            </div>
    	        </td>
    	    </tr>
    	";

	}
}