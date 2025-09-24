<?php

date_default_timezone_set("America/Caracas");

require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloInspeccion.php';
require_once '../php/Model/ModeloUsuario.php';
require_once '../php/Controller/ControlerSesion.php';
$session = new ControlerSession();
$usuario = $session->Funcionario();

$datos = ModeloInspeccion::ReporteSoliInspeccion($_POST['datos']);

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
        $this->SetFont('Arial', 'B', 10);
        $this->Image('../public/images/GBV.png', 5, 262, 45);
        $this->Ln(3);
        $this->Cell(40, 4, utf8_decode(''), 0, 0, 'R');
        $this->Cell(55, 4, utf8_decode('Ministerio del Poder Popular'), 0, 1, 'L');
        $this->Cell(40, 4, utf8_decode(''), 0, 0, 'R');
        $this->Cell(55, 4, utf8_decode('para el Ambiente'), 0, 1, 'L');
        $this->Image('../public/images/200BC.png', 175, 265, 35);
    }
}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

$pdf->Ln(20);
$pdf->MultiCell(190, 5, utf8_decode('       Por medio de la presente se deja constancia, en el día ' . date("d") . ', del mes ' . date("m") . ', del año ' . date("Y") . ' el funcionario ' . $usuario["nombre"] . ' ' . $usuario["apellido"] . ' portador de la cédula V-' . $usuario["cedula"] . ', en representación de la Oficina Municipal de Catastro del Municipio Mario Briceño Iragorry, del estado Aragua, ejecutó la verificación de los linderos del inmueble identificado como  ' . $datos["n_civico"] . ' ubicado en ' . $datos["punto_referencia"] . ', entre ' . $datos["descripcion_ubicacion_entre"] . ' ' . $datos["ubicacion_inmueble_entre"] . ' y ' . $datos["descripcion_ubicacion_y"] . ' ' . $datos["ubicacion_inmueble_y"] . ', Todo de conformidad con lo estipulado en los artículos 33 y 35 de la Ley de Geografía, Cartografía y Catastro Nacional, publicada en la Gaceta Oficial N° 37.002.'), 0, "J");

$pdf->Ln(5);
$pdf->MultiCell(190, 5, utf8_decode('Los abajo firmantes manifiestan su conformidad o inconformidad en cuanto a la exactitud y contenido de los datos reflejados en la ficha catastral.'), 0, "L");

$pdf->Ln(5);

$pdf->Cell(190, 6, utf8_decode('En señal de conformidad: '), 0, 1, 'L');
$pdf->Cell(190, 6, 'Firma del Propietario u Ocupante', 0, 1, 'C');
$pdf->Cell(190, 10, '', 1, 1, 'C');

$pdf->Ln(10);

$pdf->MultiCell(190, 5, utf8_decode('En caso inconformidad explique el(los) motivo(s) _________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________.'), 0, "L");

$pdf->Ln(10);

$pdf->Cell(190, 6, 'Firma de funcionario de la Oficina Municipal de Catastro', 0, 1, 'C');
$pdf->Cell(190, 10, '', 1, 1, 'C');

$pdf->Output('ACTA DE VERIFICACION DE LINDEROS DEL INMUEBLE N° ' . $datos["n_civico"], 'D');

?>