<?php

session_start();

require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloEmpadronamiento.php';
$dato = new ModeloEmpadronamiento();
$data = $dato->ReporteCertificadoEmpadronamientoModelo($_POST['datos']);

class PDF extends FPDF
{

    function header()
    {

        $this->SetFont('Arial', 'B', 8);
        $this->Image('../public/images/EscudoDeMBI0.png', 10, 5, 30);
        $this->Image('../public/images/images.png', 175, 5, 30);
        $this->Cell(200, 4, utf8_decode("REPUBLICA BOLIVARIA DE VENEZUELA"), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode("ALCADIA DEL MUNICIPIO DE MARIO BRICEÑO IRAGORRY"), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('DIRECCION DE CATASTRO'), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('EL LIMON - ESTADO ARAGUA'), 0, 1, 'C');
        $this->Cell(200, 4, 'CERTIFICADO DE EMPADRONAMIENTO', 0, 1, 'C');
        $this->Ln(4);
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(200, 4, utf8_decode('______________________________________________________________________________________________'), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('EL EMPADRONAMIENTO DEL INMUEBLE NO ACREDITA LA PROPIEDAD DEL INMUEBLE/PCFIS.'), 0, 1, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 6);

$pdf->Ln(2);

$pdf->SetFont('Arial', 'B', 6);

$pdf->Image("../DocumentosRaiz/".$data['inmueble']."/".$data['id_propietario']."/QR.png", 175,     35, 30);

$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(160, 5, 'CODIGO CATASTRAL', 1, 1, 'C', true);
$pdf->SetTextColor(0, 0, 0); 
$pdf->Cell(29, 6, 'Estado    ', 1, 0, 'R');
$pdf->Cell(17, 6, 'Municipio', 1, 0, 'C');
$pdf->Cell(17, 6, 'Parroquia', 1, 0, 'C');
$pdf->Cell(17, 6, utf8_decode('Ámbito'), 1, 0, 'C');
$pdf->Cell(17, 6, 'Sector', 1, 0, 'C');
$pdf->Cell(17, 6, 'Manzana', 1, 0, 'C');
$pdf->Cell(17, 6, 'Lote', 1, 0, 'C');
$pdf->Cell(29, 6, '   Sub-Lote', 1, 1, 'L');

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(29, 6, '05    ', 1, 0, 'R');
$pdf->Cell(17, 6, '08', 1, 0, 'C');
$pdf->Cell(17, 6, $data['parroquia_catastral'], 1, 0, 'C');
$pdf->Cell(17, 6, 'U-01', 1, 0, 'C');
$pdf->Cell(17, 6, $data['sector_catastral'], 1, 0, 'C');
$pdf->Cell(17, 6, $data['manzana_catastral'], 1, 0, 'C');
$pdf->Cell(17, 6, $data['parcela_catastral'], 1, 0, 'C');
$pdf->Cell(29, 6, $data['subparcela_catastral'], 1, 1, 'L');

$pdf->Ln(2);

$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(160, 4, 'DATOS DEL PROPIETARIO', 1, 1, 'C', true);

$pdf->Cell(130, 4, utf8_decode('Nombre / Razón Social '. $data['nombre_usuario'] . " " . $data['apellido_usuario']), 1, 0, 'L');

$pdf->Cell(30, 4, 'C.I/ Rif: ' . $data['id_propietario'], 1, 1, 'L');

$pdf->Cell(64, 4, 'Estado: Aragua', 1, 0, 'L');
$pdf->Cell(63, 4, utf8_decode('Municipio: M Briceño Iragorry '), 1, 0, 'L');
$pdf->Cell(33, 4, utf8_decode('Parroquia: '.$data['parroquia']), 1, 1, 'L');

$pdf->Ln(4);

$pdf->Cell(190, 4, 'DATOS DEL OCUPANTE', 1, 1, 'C', true);

$pdf->Cell(130, 4, utf8_decode('Nombre / Razón Social '. $data['nombre_ocupante'] . " " . $data['apellido_ocupante']), 1, 0, 'L');

$pdf->Cell(60, 4, 'C.I/ Rif: '. $data['ci_rif'], 1, 1, 'L');

$pdf->Cell(64, 4, 'Estado: Aragua', 1, 0, 'L');
$pdf->Cell(63, 4, utf8_decode('Municipio: M Briceño Iragorry '), 1, 0, 'L');
$pdf->Cell(63, 4, utf8_decode('Parroquia: '.$data['parroquia']), 1, 1, 'L');
$pdf->Cell(190, 4, 'Direccion:', 1, 1, 'C');
$pdf->Cell(190, 4, utf8_decode($data['descripcion_lugar'].' '.$data['lugar_inmueble'].', '.$data['descripcion_e'].' '.$data['ubicacion_inmueble_entre'].', '.$data['descripcion_y'].' '.$data['ubicacion_inmueble_y']), 1, 1, 'C');

$pdf->Ln(2);

$pdf->Cell(140, 5, 'LINDEROS ORIGINALES Y ACTUALES', 1, 0, 'C', true);
$pdf->Cell(5, 5, '', 0, 0, 'C');

$pdf->Cell(45, 5, 'ENTRADA LINDERO', 1, 1, 'C', true);
$pdf->Image("../public/images/".$data['entrada_lindero'].".png", 157.5,     105, 40);

$pdf->SetFillColor(163, 213, 255);
$pdf->Cell(20, 5, 'NORTE', 1, 0, 'C', true);
$pdf->Cell(120, 5, utf8_decode('    EN:                 '.$data['norte_medida'].' MTS             CON    '.$data['norte_lindero']), 1, 1, '');

$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(20, 5, 'SUR', 1, 0, 'C', true);
$pdf->Cell(120, 5, utf8_decode('    EN:                 '.$data['sur_medida'].' MTS             CON    '.$data['sur_lindero']), 1, 1, 'L');

$pdf->SetFillColor(163, 213, 255);
$pdf->Cell(20, 5, 'ESTE', 1, 0, 'C', true);
$pdf->Cell(120, 5, utf8_decode('    EN:                 '.$data['este_medida'].' MTS             CON    '.$data['este_lindero']), 1, 1, 'L');

$pdf->SetFillColor(71, 171, 255);
$pdf->Cell(20, 5, 'OESTE', 1, 0, 'C', true);
$pdf->Cell(120, 5, utf8_decode('    EN:                 '.$data['oeste_medida'].' MTS             CON    '.$data['oeste_lindero']), 1, 1, 'L');



$pdf->SetFont('Arial', 'B', 5);
$pdf->MultiCell(25, 4, 'SUPERFICIE TOTAL DEL TERRENO RESIDENCIAL', 1, 'C');
$x = $pdf->GetX();


$newX = $x + 25; 
$y = 118; 

$pdf->SetXY($newX, $y);
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(42, 5, 'AVALUO TERRENO RESIDENCIAL', 1, 0, 'C');
//
$pdf->SetFont('Arial', 'B', 5);
$pdf->MultiCell(31, 4, utf8_decode('SUPERFICIE TOTAL DE LA CONSTRUCCIÓN RESIDENCIAL'), 1, 'C');
$x = $pdf->GetX();

$newX = $x + 98;
$y = 118;

$pdf->SetXY($newX, $y);
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(42, 5, 'AVALUO TERRENO RESIDENCIAL', 1, 1, 'C');

$newX = $x + 25; 
$y = 123; 

$pdf->SetXY($newX, $y);
$pdf->Cell(14, 3, 'F.C', 1, 0, 'C');
$pdf->Cell(14, 3, 'A.A%', 1, 0, 'C');
$pdf->Cell(14, 3, 'Bs.', 1, 0, 'C');

$newX = $x; 
$y = 126; 

$pdf->SetXY($newX, $y);
$pdf->Cell(25, 6, $data['superficie_c_r'], 1, 0, 'C');
$pdf->Cell(14, 6, $data['fc_construccion_r'], 1, 0, 'C');
$pdf->Cell(14, 6, '0,50%', 1, 0, 'C');
$pdf->Cell(14, 6, $data['VIMPA_construccion_r'], 1, 0, 'C');


$newX = $x + 98; 
$y = 123; 

$pdf->SetXY($newX, $y);
$pdf->Cell(14, 3, 'F.C', 1, 0, 'C');
$pdf->Cell(14, 3, 'A.A%', 1, 0, 'C');
$pdf->Cell(14, 3, 'Bs.', 1, 0, 'C');

$newX = $x + 67; 
$y = 126; 

$pdf->SetXY($newX, $y);
$pdf->Cell(31, 6,  $data['superficie_t_r'], 1, 0, 'C');
$pdf->Cell(14, 6, $data['fc_terreno_r'], 1, 0, 'C');
$pdf->Cell(14, 6, "0.75%", 1, 0, 'C');
$pdf->Cell(14, 6, $data['VIMPA_terreno_r'], 1, 0, 'C');

$newX = $x; 
$y = 132; 

$total1 = $data['VIMPA_terreno_r'] + $data['VIMPA_construccion_r'] ;
$pdf->SetXY($newX, $y);
$pdf->Cell(140, 4, 'V.IMP.A (Residencial): '. $total1, 1, 1, 'C');
$pdf->Ln(2);


$pdf->SetFont('Arial', 'B', 5);
$pdf->MultiCell(25, 4, 'SUPERFICIE TOTAL DEL TERRENO CORMERCIAL', 1, 'C');
$x = $pdf->GetX();

$newX = $x + 25; 
$y = 138; 

$pdf->SetXY($newX, $y);
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(42, 5, 'AVALUO TERRENO CORMERCIAL', 1, 0, 'C');
//
$pdf->SetFont('Arial', 'B', 5);
$pdf->MultiCell(31, 4, 'SUPERFICIE TOTAL DE LA CONSTRUCCION CORMERCIAL', 1, 'C');
$x = $pdf->GetX();

$newX = $x + 98;
$y = 138; 

$pdf->SetXY($newX, $y);
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(42, 5, 'AVALUO TERRENO CORMERCIAL', 1, 1, 'C');

$newX = $x + 25; 
$y = 143; 

$pdf->SetXY($newX, $y);
$pdf->Cell(14, 3, 'F.C', 1, 0, 'C');
$pdf->Cell(14, 3, 'A.A%', 1, 0, 'C');
$pdf->Cell(14, 3, 'Bs.', 1, 0, 'C');

$newX = $x; 
$y = 146; 

$pdf->SetXY($newX, $y);
$pdf->Cell(25, 6, $data['superficie_c_c'], 1, 0, 'C');
$pdf->Cell(14, 6, $data['fc_construccion_c'], 1, 0, 'C');
$pdf->Cell(14, 6, '1,00%', 1, 0, 'C');
$pdf->Cell(14, 6, $data['VIMPA_construccion_c'], 1, 0, 'C');


$newX = $x + 98; 
$y = 143; 

$pdf->SetXY($newX, $y);
$pdf->Cell(14, 3, 'F.C', 1, 0, 'C');
$pdf->Cell(14, 3, 'A.A%', 1, 0, 'C');
$pdf->Cell(14, 3, 'Bs.', 1, 0, 'C');

$newX = $x + 67; 
$y = 146; 

$pdf->SetXY($newX, $y);
$pdf->Cell(31, 6, $data['superficie_c_c'], 1, 0, 'C');
$pdf->Cell(14, 6, $data['fc_terreno_c'], 1, 0, 'C');
$pdf->Cell(14, 6, '1.00%', 1, 0, 'C');
$pdf->Cell(14, 6, $data['VIMPA_terreno_c'] , 1, 0, 'C');

$newX = $x; 
$y = 152;

$total2 = $data['VIMPA_terreno_c'] + $data['VIMPA_construccion_c'] ;
$pdf->SetXY($newX, $y);
$pdf->Cell(140, 4, 'V.IMP.A (Comercial): '. $total2, 1, 1, 'C');
$total3 = $total1 + $total2;
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(140, 6, 'V.IMP.A TOTAL: '. $total3, 0, 1, 'C');

$pdf->Image('../public/images/example.png', 65, 160, 80);
$pdf->Cell(190, 4, 'PLANO', 1, 1, 'C');

$pdf->Ln(47);

$pdf->Cell(30, 8, 'Fecha Primera Vista', 1, 0, 'C');
$pdf->Cell(34, 8, '', 1,0, 'C');
$x = $pdf->GetX();

$newX = $x ;
$y = 213;

$pdf->SetXY($newX, $y);
$pdf->Cell(65, 4, '', 1,0,'C');
$pdf->MultiCell(63, 26, '  Sello y Firma del Director:', 1, 'L');
$x = $pdf->GetX();

$newX = $x + 64;
$y = 217;

$pdf->SetXY($newX, $y);
$pdf->Cell(32.5, 4, 'NOMBRE', 1,0,'C');
$pdf->Cell(32.5, 4, 'C.I', 1,1,'C');

$pdf->Cell(30, 4, 'Fecha Levantamiento', 1, 0, 'C');
$pdf->Cell(34, 4, '', 1, 0, 'C');
$pdf->Cell(32.5, 4, '', 1,0,'C');
$pdf->Cell(32.5, 4, '', 1,1,'C');
$fecha = date("d/m/Y");
$pdf->Cell(30, 6, 'ESCALA', 1, 0, 'C');
$pdf->Cell(34, 6, utf8_decode('FECHA DE EXPEDICIÓN'), 1, 0, 'C');
$pdf->Cell(65, 6, utf8_decode('Elaborado por:'), 1, 1, 'C');
$pdf->Cell(30, 8, $data['tipo_escala'], 1, 0, 'C');
$pdf->Cell(34, 8, $fecha, 1, 1, 'C');

$x = $pdf->GetX();

$newX = $x + 64;
$y = 231;

$pdf->SetXY($newX, $y);
$pdf->Cell(32.5, 4, 'NOMBRE', 1,0,'C');
$pdf->Cell(32.5, 4, 'C.I', 1,1,'C');

$x = $pdf->GetX();

$newX = $x + 64;
$y = 235;

$pdf->SetXY($newX, $y);
$pdf->Cell(32.5, 4, '', 1,0,'C');
$pdf->Cell(32.5, 4, '', 1,1,'C');

$pdf->Output('Certificacion de Empadronamiento ', 'D');

?>