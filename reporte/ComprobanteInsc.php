<?php

date_default_timezone_set("America/Caracas");

$dia = date("d") + 1;

require '../fpdf/fpdf.php';

require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloFicha.php';
$dato = new ModeloFicha();

$data = $dato->ReporteComprobanteCatastralModelo($_POST['datos']);

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
        $this->Cell(200, 4, utf8_decode('Comprobante de Inscripción Catastral'), 0, 1, 'C');
        $this->Ln(4);
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(200, 4, utf8_decode('--------------------------------------------------------------------------------------------------------'), 0, 1, 'C');
        $this->Cell(200, 4, utf8_decode('ESTE DOCUMENTO NO ACREDITA PROPIEDAD SOBRE EL INMUEBLE PRESENTADO, HASTA NO SER COMPROBADO SU VERACIDAD.'), 0, 1, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

$pdf->Ln(15);

$pdf->MultiCell(190, 5, utf8_decode('Asunto: Inscripción Catastral de Bien Inmueble '), 0, "L");

$pdf->Ln(5);

$pdf->MultiCell(190, 5, utf8_decode('De mi mayor consideración: '), 0, "L");

$pdf->Ln(15);


$pdf->MultiCell(190, 5, 
utf8_decode('Yo, ' . $data["nombre_usuario"] . ' ' . $data["apellido_usuario"] . ', Venezolano(a), mayor de edad, Soltero, Titular de la Cedula de Identidad Nro.V-' . $data["id_propietario"] . 'de domicilio tipo : '. $data['descripcion_contruccion'] .', Metros cuadrados aproximados de construcción : '.$data['medida_inmueble'].' mts2, en la direccion: PARROQUIA '.$data['parroquia_n'].', RESICENDECIA '.$data['residencia'].', ENTRE '.$data['descripcion_ubicacion_entre'].' '.$data['ubicacion_entre_text'].' Y '.$data['descripcion_ubicacion_y'].' '.$data['ubicacion_y_text'].', NRO CIVICO '.$data['n_civico'].', SECTOR '.$data['parroquia'].', por medio del presente documento, formalizo mi Inscripción Catastral de Bien Inmueble de mi propiedad, ubicado en PARROQUIA '.$data['parroquia'].', RESICENDECIA '.$data['residencia'].', ENTRE '.$data['descripcion_ubicacion_entre'].' '.$data['ubicacion_entre_text'].' Y '.$data['descripcion_ubicacion_y'].' '.$data['ubicacion_y_text'].', NRO CIVICO '.$data['n_civico'].', SECTOR '.$data['parroquia'].'. ')
, 0, "J");

$pdf->Ln(15);

$pdf->Cell(140, 7, 'LINDEROS', 0, 1, 'L' );

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

$pdf->Ln(15);

$pdf->MultiCell(190, 5, utf8_decode('Inscripción Catastral que se realizo en la fecha : '. $data["fecha_inscripcion"] ), 0, "L");

$pdf->Ln(20);


$pdf->Ln(5);


$pdf->Output(utf8_decode('COMPROBANTE DE INSCRIPCIÓN V-' . $data["id_propietario"]), 'D');

?>