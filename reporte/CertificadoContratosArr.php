<?php

date_default_timezone_set("America/Caracas");

$dia = date("d") + 1;

require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloContrato.php';
$dato = new ModeloContrato();
$data = $dato->ReporteContratoModelo($_POST['datos']);


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
        $this->Cell(200, 4, 'CONTRATO DE ARRENDAMIENTO DE INMUEBLE', 0, 1, 'C');
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


function separarPalabrasPorComas($data, $dato)
{
    $valores = explode(", ", $data["total_clausulas"]);
    $palabras = "";

    foreach ($valores as $valor) {
        
        $Clasusulas = $dato->Clausulas($valor);

        $palabras .= " ". $Clasusulas["descripcion"];
        
    }

    return $palabras;
}


$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(15, 0, 0);
$pdf->SetFont('Arial', 'B', 10);

$DescripcionClausulas = separarPalabrasPorComas($data, $dato);

$pdf->Ln(15);


$pdf->MultiCell(180, 6, 
utf8_decode('   Nosotros, Concejo Municipal garantes de todas las tierras (hejidos) del Municipio Mario Briceño Iragorry, en nuestras plenas facultades y despues de haber hecho un concenso entre concejales se decidio otorgar un CONTRATO DE ARRENDAMIENTO al ciudadano(a): ' . $data["nombre_usuario"] . ' ' . $data["apellido_usuario"] . ', Venezolano(a), Mayor de edad, Soltero, Titular de la Cedula de Identidad Nro.V-'. $data["id_usuario"] .', habil en derecho y de este domicilio el cual realizo solicitud de dicho contrato el cual fue aprobado con exito. Dicho contrato convendra ciertas Clausulas y Gravament donde se determinen los parametros a cumplir para la obtención del terreno donde se encuentran enclavados(as) sus bienechurias, por tal motivo las clausulas seran las siguientes: '. $DescripcionClausulas .' Una vez definido los terminos en analogo sentido se expresa las cuotas y el periodo que se debe cumplir para cubrir la exigencia emanadas por las ordenanzas municipales. Cuotas que se dividiran calculando un valor promedio al valor nominal de dicho terreno. ')
, 0, "J");

$pdf->Ln(30);
//////////////////////////////
$pdf->Cell(95, 5, utf8_decode('_______________________'), 0, 0, "C");
$pdf->Cell(95, 5, utf8_decode('_______________________'), 0, 1,"C");
$pdf->Cell(95, 5, utf8_decode('Firma Director de Catastro '), 0, 0, "C");
$pdf->Cell(95, 5, utf8_decode('Firma Concejo Municipal '), 0, 1,"C");
$pdf->Cell(60, 5, utf8_decode('C.I: V-'), 0,0, "C");
$pdf->Cell(130, 5, utf8_decode('C.I: V-'), 0,1, "C");
$pdf->Cell(60, 5, utf8_decode('TELEFONO: '), 0,0, "C");
$pdf->Cell(130, 5, utf8_decode('TELEFONO: '), 0,1, "C");

$pdf->Ln(30);

$pdf->Cell(95, 5, utf8_decode('_______________________'), 0, 0, "C");
$pdf->Cell(95, 5, utf8_decode('_______________________'), 0, 1,"C");
$pdf->Cell(95, 5, utf8_decode('Firma Alcalde '), 0, 0,"C");
$pdf->Cell(95, 5, utf8_decode('Firma Arrendatario '), 0, 1,"C");
$pdf->Cell(60, 5, utf8_decode('C.I: V-'), 0,0, "C");
$pdf->Cell(130, 5, utf8_decode('C.I: V-'), 0,1, "C");
$pdf->Cell(60, 5, utf8_decode('TELEFONO: '), 0,0, "C");
$pdf->Cell(130, 5, utf8_decode('TELEFONO: '), 0,1, "C");

$pdf->Ln(15);

$pdf->Output('CONTRATO DE ARRENDAMIENTO V-' . $data["id_usuario"], 'D');

?>