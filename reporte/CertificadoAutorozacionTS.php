<?php

date_default_timezone_set("America/Caracas");

$dia = date("d") + 1;

require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloEvacuacion.php';
$dato = new ModeloEvacuacion();
$data = $dato->ReporteEvacuacionModelo($_POST['datos']);

class PDF extends FPDF
{

    function header()
    {

        $this->SetFont('Arial', 'B', 8);
        $this->Image('../public/images/EscudoDeMBI0.png', 10, 5, 30);
        $this->Image('../public/images/images.png', 175, 5, 30);
        $this->Cell(200, 4, utf8_decode("REPÚBLICA BOLIVARIA DE VENEZUELA"), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode("ALCADÍA DEL MUNICIPIO DE MARIO BRICEÑO IRAGORRY"), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('DIRECCIÓN DE CATASTRO'), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('EL LIMÓN - ESTADO ARAGUA'), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('Autorización de Titulo Supletorio'), 0, 1, 'C');
        $this->Ln(4);
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(180, 4, utf8_decode('--------------------------------------------------------------------------------------------------------'), 0, 1, 'C');
        $this->Cell(180, 4, utf8_decode('ESTE DOCUMENTO NO ACREDITA PROPIEDAD SOBRE EL INMUEBLE PRESENTADO, HASTA NO SER COMPROBADO SU VERACIDAD.'), 0, 1, 'C');

    }
}




$Puertas = str_replace("<br>", ", ", $data["puerta_totales"]);
$anno_cons = date("Y") - $data['year_construccion'];

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(18, 8, 18);
$pdf->SetFont('Arial', 'B', 10);

$pdf->Ln(15);
$pdf->MultiCell(180, 6, utf8_decode('    Quien suscribe, JUAN LUIS DEDORDY LANDAETA, Director de Catastro de la Alcaldía del Municipio Mario Briceño Iragorry, Estado Aragua, según Resolución N° 017-03-2024, de fecha 01/03/2024, hace constar por medio de la presente, que se recibió solicitud efectuada por la (el) (los) (las) ciudadana(o), (os) '. $data['nombre'] .' '. $data['apellido'] .', titular (es) de la (s) cédula (s) de identidad N° V-'. $data['id_usuario'] .', el requerimiento antes señalado se refiere a la obtención de una Constancia la cual tiene como finalidad u objetivo, evacuar Titulo Supletorio sobre unas bienhechurias que se PRESUME son de su propiedad de la (él) (los) solicitante (s), construidas o asentadas las mismas en un terreno cuyo origen es Municipal, ubicado en la siguiente dirección: SECTOR '. $data['sector'] .', CALLE VALERA, N° 9-A, PARROQUIA '. $data['parroquia'] .', JURISDICCIÓN DEL MUNICIPIO MARIO BRICEÑO IRAGORRY DEL ESTADO ARAGUA, la cual según inspección realizada por funcionarios adscritos a esta Dirección, el inmueble posee una superficie de terreno de '. $data['superficie_t'] .' mts2 y de construcción '. $data['superficie_c'] .' mts2, identificado con el Código Catastral 05.08.'. $data['parroquia_catastral'] .'.U-01.'. $data['sector_catastral'] .'.'. $data['manzana_catastral'] .'.'. $data['parcela_catastral'] .'. 

Cuya caracteristicas son: Terreno Con topografia '. $data['tipo_topografia'] .', forma '. $data['tipo_forma'] .', con todos sus servicios, de uso '. $data['tipo_descripcion_uso'] .' tenencia municipal. Construcción: Destino: '. $data['tipo_destino'] .', estructura: '. $data['tipo_estructura'] .', paredes tipo '. $data['tipo_paredes'] .', acabado '. $data['tipo_acabado'] .', pintura de '. $data['tipo_pintura'] .', estructura del techo '. $data['tipo_techo'] .', cubierta de '. $data['tipo_cubierta'] .', piso de '. $data['tipo_piso'] .', Pieza Sanitaria: porcelana económica, W.C., ducha, puertas: '. $Puertas.', Instalaciones eléctricas '. $data['tipo_instalaciones_electricas'] .', estado de conservación '. $data['tipo_conservacion'] .', Año de construcción '.$anno_cons.'.'), 0, "J");

$pdf->Ln(10);

$pdf->Cell(140, 7, 'LINDEROS ORIGINALES Y ACTUALES', 0, 1, 'L' );

$pdf->SetFillColor(163, 213, 255);
$pdf->Cell(20, 7, 'NORTE:', 1, 0, 'C', true);
$pdf->Cell(20, 7, 'CON', 1, 0, 'C');
$pdf->Cell(80, 7, $data["norte_lindero"], 1, 0, 'L');
$pdf->Cell(20, 7, 'EN', 1, 0, 'C');
$pdf->Cell(35, 7,  $data["norte_medida"] . ' mts', 1, 1, 'C');

$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(20, 7, 'SUR:', 1, 0, 'C', true);
$pdf->Cell(20, 7, 'CON', 1, 0, 'C');
$pdf->Cell(80, 7, $data["sur_lindero"], 1, 0, 'L');
$pdf->Cell(20, 7, 'EN', 1, 0, 'C');
$pdf->Cell(35, 7, $data["sur_medida"] . ' mts', 1, 1, 'C');

$pdf->SetFillColor(163, 213, 255);
$pdf->Cell(20, 7, 'ESTE:', 1, 0, 'C', true);
$pdf->Cell(20, 7, 'CON', 1, 0, 'C');
$pdf->Cell(80, 7, $data["este_lindero"], 1, 0, 'L');
$pdf->Cell(20, 7, 'EN', 1, 0, 'C');
$pdf->Cell(35, 7, $data["este_medida"] . ' mts', 1, 1, 'C');

$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(20, 7, 'OESTE:', 1, 0, 'C', true);
$pdf->Cell(20, 7, 'CON', 1, 0, 'C');
$pdf->Cell(80, 7, $data["oeste_lindero"], 1, 0, 'L');
$pdf->Cell(20, 7, 'EN', 1, 0, 'C');
$pdf->Cell(35, 7, $data["oeste_medida"] . ' mts', 1, 1, 'C');

$pdf->Ln(10);

$pdf->MultiCell(180, 6, utf8_decode('   En este sentido se realizó la revisión en el Registro de Inmuebles que reposan en los archivos de esta Dirección, constatándose que el terreno antes identificado forma parte de los Ejidos donados por la Nación Venezolana al Municipio Girardot, según se Desprende de documento registrado en la Oficina Subalterna bajo el N° ' . $data["numero_titulo"] . ', folios ' . $data["folio_titulo"] . ', Protocolo Adicional ' . $data["protocolo_titulo"] . ', Tomo ' . $data["tomo_titulo"] . ',
    Trimestre 1ero, del año 1960, perteneciendo hoy al Municipio Mario Briceño Iragorry de conformidad con la división Politico Territorial del Estado Aragua. Y hasta la fecha no existe inscripción catastral de bienhechurias sobre el terreno objeto de la consulta.'), 0, "J");

$pdf->AddPage();

$pdf->Ln(10);

$pdf->MultiCell(180, 6, utf8_decode('Finalizadas las previsiones que conllevan emitir una constancia para la evacuación de un TITULO SUPLETORIO, sobre unas bienhechurías que alegan la (el) (los) ciudadano(a), (os) '. $data['nombre'] .' '. $data['apellido'] .', es de su propiedad, se cita el Articulo 32 de la ORDENANZA DE CATASTRO URBANO, el mismo de forma tácita indica "Quienes hubieren incurrido en la presentación de datos falsos, amañados o insuficientes a los efectos de la inscripción catastral prevista en esta Ordenanza, serán sancionados con multas equivalentes al doble de la cantidad liquidada por concepto del impuesto sobre inmuebles urbanos, según lo dispuesto en la Ordenanza respectiva. 

Esta constancia no acredita la propiedad de las bienhechurías, ni el terreno, ni garantiza resultas positivas en Procedimientos Administrativos iniciados, así mismo deja a salvo el derecho frente a terceros. Asi como lo establece el artículo 937 del Código de Procedimiento Civil.

Se expide a petición de la parte interesada, en El Limón a los ' . date("d") . ' dias del mes de ' . date("m") . ' de ' . date("Y") . '
'), 0, "J");

$pdf->Ln(30);
//////////////////////////////
$pdf->MultiCell(190, 5, utf8_decode('ATENTAMENTE'), 0, "C");

$pdf->Ln(15);

$pdf->MultiCell(190, 5, utf8_decode('JUAN LUIS DEDORDY LANDAETA'), 0, "C");

$pdf->Ln(5);

$pdf->MultiCell(190, 5, utf8_decode('DIRECTOR DE CATASTRO'), 0, "C");
$pdf->MultiCell(190, 5, utf8_decode('SEGÚN RESOLUCION NO. 017/03/2024 DEL 01-03-2024'), 0, "C");

$pdf->Ln(5);


$pdf->Output('AUTORIZACION DE EVACUACION DE TITULO SUPLETOIO V-' . $data["id_usuario"], 'D');

?>