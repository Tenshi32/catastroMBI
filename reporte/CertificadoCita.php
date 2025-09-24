<?php

date_default_timezone_set("America/Caracas");

$dia = date("d") + 1;

require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloSolicitud.php';
$dato = new ModeloSolicitud();
$data = unserialize($_POST['datos']);
$data = $dato->ReporteConsultaCitaModelo($data);

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
        $this->Cell(200, 4,  utf8_decode('EL LIMÓN - ESTADO ARAGUA'), 0, 1, 'C');
        $this->Cell(200, 4,  utf8_decode('CERTIFICACIÓN DE CITA'), 0, 1, 'C');
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

function separarPalabrasPorComas($pdf, $data, $dato)
{
    $valores = explode(", ", $data['codigo_cita']);
    $palabras = "";
    $n = 0;
    foreach ($valores as $valor) {
        $n++;
        $Clasusulas = $dato->Motivos($valor);

        $pdf->Cell(190, 10, utf8_decode($n.") - ". $Clasusulas["tipo_motivo"] ), 0, 1, 'L');
        $pdf->Ln(3);
        
    }
}

$pdf = new PDF('P', 'mm', 'letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 10);

$pdf->Ln(15);

$pdf->MultiCell(190, 5, utf8_decode('Asunto: Cita Otorgada '), 0, "L");

$pdf->Ln(5);

$pdf->MultiCell(190, 5, utf8_decode('De mi mayor consideración: '), 0, "L");

$pdf->Ln(15);

$pdf->MultiCell(190, 5, utf8_decode('   Yo, JUAN LUIS DE DORDY en mi carácter de Director del Departamento de Catastro de la Alcaldía del Municipio Mario Briceño Iragorry, atendiendo a su solicitud, ' . $data["nombre"] . ' ' . $data["apellido"] . ', le extiendo un cordial saludo. Por este medio, le otorgo una reunión directa conmigo para conversar sobre los siguientes asuntos de su interés, relacionados con la tenencia de la tierra y el bien inmueble de su propiedad: '), 0, "J");

$pdf->Ln(8);

separarPalabrasPorComas($pdf, $data, $dato);

$pdf->Ln(7);

$pdf->MultiCell(190, 5, utf8_decode('   Cita que se otorga a los ' . $dia . ', del mes ' . date("m") . ' , del año ' . date("Y") . ' en el Municipio Mario Briceño Iragorry'), 0, "L");

$pdf->Ln(20);
//////////////////////////////
$pdf->MultiCell(190, 5, utf8_decode('   Atentamente '), 0, "L");

$pdf->Ln(15);

$pdf->MultiCell(190, 5, utf8_decode( $data["nombre"] . ' ' . $data["apellido"]), 0, "C");
$pdf->Ln(5);
$pdf->MultiCell(190, 5, utf8_decode('C.I: V-' . $data["id_usuario"]), 0, "C");

$pdf->Ln(5);

$pdf->MultiCell(190, 5, utf8_decode('TELÉFONO: ' . $data["telefono_inmueble"]), 0, "C");

$pdf->Ln(5);


$pdf->Output('CERTIFICADO DE CITA V-' . $data["id_usuario"], 'D');

?>