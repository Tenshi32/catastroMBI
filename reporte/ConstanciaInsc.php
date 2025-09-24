<?php


require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloFicha.php';
$dato = new ModeloFicha();

$data = $dato->ReporteConstanciaCatastralModelo($_POST['datos']);

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
        $this->Cell(200, 4, 'CONSTANCIA DE INSCRIPCION CATASTRAL', 0, 1, 'C');
        $this->Ln(4);
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(200, 4, utf8_decode('______________________________________________________________________________________________'), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('LA INSCRIPCION DEL INMUEBLE NO ACREDITA LA PROPIEDAD DEL INMUEBLE/PCFIS.'), 0, 1, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 6);

$pdf->Ln(6);


$pdf->Image("../DocumentosRaiz/".$data['inmueble']."/".$data['id_propietario']."/QR.png", 175,     35, 30);
$pdf->Cell(65, 6, utf8_decode(''), 0, 0, 'R');
$pdf->Cell(95, 6, utf8_decode('Nº DE INSCRIPCIÓN: ' . $data['nro_inscripcion']), 0, 1, 'R');
$pdf->Cell(65, 6, utf8_decode(''), 0, 0, 'R');
$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(95, 6, utf8_decode('CODIGO CATASTRAL'), 1, 1, 'C', true);
$pdf->SetTextColor(0, 0, 0); 
$pdf->Cell(65, 6, utf8_decode(''), 0, 0, 'R');

$pdf->Cell(10, 6, utf8_decode('Estado'), 1, 0, 'C');
$pdf->Cell(13, 6, utf8_decode('Municipio'), 1, 0, 'C');
$pdf->Cell(15, 6, utf8_decode('Parroquia'), 1, 0, 'C');
$pdf->Cell(12, 6, utf8_decode('Ámbito'), 1, 0, 'C');
$pdf->Cell(13.5, 6, utf8_decode('Sector'), 1, 0, 'C');
$pdf->Cell(13.5, 6, utf8_decode('Manzana'), 1, 0, 'C');
$pdf->Cell(18, 6, utf8_decode('Lote'), 1, 1, 'C');

$pdf->Cell(65, 6, utf8_decode(''), 0, 0, 'R');

$pdf->Cell(10, 6, utf8_decode('05'), 1, 0, 'C');
$pdf->Cell(13, 6, utf8_decode('08'), 1, 0, 'C');
$pdf->Cell(15, 6, utf8_decode($data['parroquia_catastral']), 1, 0, 'C');
$pdf->Cell(12, 6, utf8_decode('U-01'), 1, 0, 'C');
$pdf->Cell(13.5, 6, utf8_decode($data['sector_catastral']), 1, 0, 'C');
$pdf->Cell(13.5, 6, utf8_decode($data['manzana_catastral']), 1, 0, 'C');
$pdf->Cell(18, 6, utf8_decode($data['parcela_catastral']), 1, 1, 'C');

$pdf->Ln(6);
$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(190, 6, 'DATOS DEL PROPIETARIO', 1, 1, 'L', true);

$pdf->Cell(135, 6, 'NOMBRE Y APELLIDO COMPLETO ' . $data['nombre_usuario'] . " " . $data['apellido_usuario'], 0, 0, 'L');

$pdf->Cell(25, 6, utf8_decode('C.I.N° V-' . $data['id_propietario']), 0, 1, 'L');

$pdf->Cell(190, 6, utf8_decode('DIRECCION DEL INMUEBLE '.$data['descripcion_lugar'].' '.$data['lugar_inmueble'].', '.$data['descripcion_e'].' '.$data['ubicacion_inmueble_entre'].', '.$data['descripcion_y'].' '.$data['ubicacion_inmueble_y']), 0, 1, 'L');

$pdf->Ln(6);


///////////////////////////////////////////////////
$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(190, 6, 'DATOS DEL INMUEBLE', 1, 1, 'C', true);
$pdf->SetTextColor(0, 0, 0); 
$pdf->Cell(63, 6, 'AREA TOTAL DE LA CONSTRUCCION (M2)', 1, 0, 'C');
$pdf->Cell(63, 6, $data['superficie_c'], 1, 0, 'C');
$pdf->Multicell(64, 12, 'TCMDBCV: ' . $data['valor'] . '.Bs', 1, 'C');
$x = $pdf->GetX();
$y = 106;

$pdf->SetXY($x, $y);
$pdf->Cell(63, 6, 'AREA TOTAL DEL TERRENO (M2)', 1, 0, 'C');
$pdf->Cell(63, 6, $data['superficie_t'], 1, 1, 'C');

//__________________________________________________________________

$pdf->Cell(63, 3, '', 1, 0, 'C');
$pdf->Cell(28, 3, 'M2', 1, 0, 'C');
$pdf->Cell(25, 3, "A.A (%)", 1, 0, 'C');
$pdf->Cell(28, 3, 'F.C', 1, 0, 'C');
$pdf->Cell(20, 3, 'V.IMP.A', 1, 0, 'C');
$pdf->Cell(26, 3, '', 1, 1, 'C');

$pdf->Cell(63, 8, 'TERRENO RESIDENCIAL', 1, 0, 'C');
$pdf->Cell(28, 8, $data['superficie_t_r'], 1, 0, 'C');
$pdf->Cell(25, 8, "0.75%", 1, 0, 'C');
$pdf->Cell(28, 8, $data['fc_terreno_r'], 1, 0, 'C');
$pdf->Cell(20, 8, $data['VIMPA_terreno_r'], 1, 0, 'C');
$pdf->Cell(26, 8, $data['VIMPA_terreno_r'], 1, 1, 'C');

$pdf->Cell(63, 8, 'TERRENO COMERCIAL', 1, 0, 'C');
$pdf->Cell(28, 8, $data['superficie_t_c'], 1, 0, 'C');
$pdf->Cell(25, 8, '1.00%', 1, 0, 'C');
$pdf->Cell(28, 8, $data['fc_terreno_c'], 1, 0, 'C');
$pdf->Cell(20, 8, $data['VIMPA_terreno_c'], 1, 0, 'C');
$pdf->Cell(26, 8, $data['VIMPA_terreno_r'] + $data['VIMPA_terreno_c'], 1, 1, 'C');

$pdf->Cell(63, 8, 'CONSTRUCCION RESIDENCIAL', 1, 0, 'C');
$pdf->Cell(28, 8, $data['superficie_c_r'], 1, 0, 'C');
$pdf->Cell(25, 8, '0,50%', 1, 0, 'C');
$pdf->Cell(28, 8, $data['fc_construccion_r'], 1, 0, 'C');
$pdf->Cell(20, 8, $data['VIMPA_construccion_r'], 1, 0, 'C');
$pdf->Cell(26, 8, $data['VIMPA_terreno_r'] + $data['VIMPA_terreno_c'] + $data['VIMPA_construccion_r'], 1, 1, 'C');

$pdf->Cell(63, 8, 'CONSTRUCCION COMERCIAL', 1, 0, 'C');
$pdf->Cell(28, 8, $data['superficie_c_c'], 1, 0, 'C');
$pdf->Cell(25, 8, '1,00%', 1, 0, 'C');
$pdf->Cell(28, 8, $data['fc_construccion_c'], 1, 0, 'C');
$pdf->Cell(20, 8, $data['VIMPA_construccion_c'], 1, 0, 'C');
$pdf->Cell(26, 8, $data['VIMPA_terreno_r'] + $data['VIMPA_terreno_c'] + $data['VIMPA_construccion_r'] + $data['VIMPA_construccion_c'], 1, 1, 'C');

$pdf->Cell(47, 8, '', 0, 0, 'C');
$pdf->Cell(44, 8, '', 0, 0, 'C');
$pdf->Cell(53, 8, 'VALOR TOTAL (Bs)', 1, 0, 'C');
$pdf->Cell(46, 8, $data['VIMPA_terreno_r'] + $data['VIMPA_terreno_c'] + $data['VIMPA_construccion_r'] + $data['VIMPA_construccion_c'].'.Bs', 1, 1, 'C');

$pdf->Ln(6);
$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(190, 6, 'DATOS DEL INMUEBLE', 1, 1, 'C', true);
$pdf->SetTextColor(0, 0, 0); 
$pdf->Cell(35, 6, utf8_decode('TIPO DE OPERACIÓN '), 1, 0, 'C');
$pdf->Cell(20, 6, utf8_decode('N° DOC'), 1, 0, 'C');
$pdf->Cell(20, 6, 'FOLIO', 1, 0, 'C');
$pdf->Cell(20, 6, 'PROTOCOLO', 1, 0, 'C');
$pdf->Cell(15, 6, 'TOMO', 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode('ÁREA (M2)'), 1, 0, 'C');
$pdf->Cell(25, 6, 'FECHA', 1, 0, 'C');
$pdf->Cell(30, 6, 'VALOR TOTAL (Bs.)', 1, 1, 'C');

$pdf->Cell(35, 6, utf8_decode($data['clase_operacion']), 1, 0, 'C');
$pdf->Cell(20, 6, utf8_decode($data['numero_titulo']), 1, 0, 'C');
$pdf->Cell(20, 6, $data['folio_titulo'], 1, 0, 'C');
$pdf->Cell(20, 6, $data['protocolo_titulo'], 1, 0, 'C');
$pdf->Cell(15, 6, $data['tomo_titulo'], 1, 0, 'C');
$pdf->Cell(25, 6, utf8_decode($data['superficie_t']), 1, 0, 'C');
$pdf->Cell(25, 6, $data['fecha_titulo'], 1, 0, 'C');
$pdf->Cell(30, 6, '', 1, 1, 'C');
$pdf->Ln(2);
$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(190, 6, utf8_decode('LINDEROS Y DIMENSIONES'), 1, 1, 'C', true);
$pdf->SetFillColor(163, 213, 255);
$pdf->Cell(45, 6, utf8_decode('NORTE'), 1, 0, 'L', true);
$pdf->Cell(10, 6, utf8_decode('EN:'), 0, 0, 'L');
$pdf->Cell(45, 6, utf8_decode($data['norte_medida']), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('MTS'), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('CON'), 0, 0, 'L');
$pdf->Cell(70, 6, utf8_decode($data['norte_lindero']), 0, 1, 'L');
$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(45, 6, utf8_decode('SUR'), 1, 0, 'L', true);
$pdf->Cell(10, 6, utf8_decode('EN:'), 0, 0, 'L');
$pdf->Cell(45, 6, utf8_decode($data['sur_medida']), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('MTS'), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('CON'), 0, 0, 'L');
$pdf->Cell(70, 6, utf8_decode($data['sur_lindero']), 0, 1, 'L');
$pdf->SetFillColor(163, 213, 255);
$pdf->Cell(45, 6, utf8_decode('ESTE'), 1, 0, 'L', true);
$pdf->Cell(10, 6, utf8_decode('EN:'), 0, 0, 'L');
$pdf->Cell(45, 6, utf8_decode($data['este_medida']), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('MTS'), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('CON'), 0, 0, 'L');
$pdf->Cell(70, 6, utf8_decode($data['este_lindero']), 0, 1, 'L');
$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(45, 6, utf8_decode('OESTE'), 1, 0, 'L', true);
$pdf->Cell(10, 6, utf8_decode('EN:'), 0, 0, 'L');
$pdf->Cell(45, 6, utf8_decode($data['oeste_medida']), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('MTS'), 0, 0, 'L');
$pdf->Cell(10, 6, utf8_decode('CON'), 0, 0, 'L');
$pdf->Cell(70, 6, utf8_decode($data['oeste_lindero']), 0, 1, 'L');

$pdf->Ln(6);
$pdf->Cell(95, 6, utf8_decode('Tenencia: ' . $data['tenencia']), 0, 0, 'L');
$pdf->Cell(95, 6, utf8_decode('Fecha: ' . $data['fecha_inscripcion']), 0, 1, 'R');

$pdf->Cell(45, 6, utf8_decode(''), 0, 0, 'L');
$pdf->Cell(45, 6, utf8_decode('Fecha de Actualización: ' . $data['fecha_actualizacion']), 0, 1, 'L');

$pdf->Multicell(190, 6, 'Observaciones Generales: ' . $data['observacion'], 0, 'L');

$pdf->Ln(12);

$pdf->Cell(95, 6, '___________________________________________', 0, 0, 'C');
$pdf->Cell(95, 6, '___________________________________________', 0, 1, 'C');
$pdf->Cell(95, 6, 'PROPIETARIO', 0, 0, 'C');
$pdf->Cell(95, 6, utf8_decode('DIRECCIÓN DE CATASTRO'), 0, 1, 'C');

$pdf->Output('Constancia de Inscripcion Catastral ', 'D');

?>