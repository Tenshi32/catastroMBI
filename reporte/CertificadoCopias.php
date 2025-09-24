<?php

date_default_timezone_set("America/Caracas");

$dia = date("d") + 1;

require '../fpdf/fpdf.php';

$data = unserialize($_POST['datos']);

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
        $this->Cell(200, 4, 'Solicitud para la Obtencion de Copia Certificada', 0, 1, 'C');
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

$pdf->MultiCell(190, 5, utf8_decode('Asunto: Cita Otorgada '), 0, "L");

$pdf->Ln(5);

$pdf->MultiCell(190, 5, utf8_decode('De mi mayor consideración: '), 0, "L");

$pdf->Ln(15);


$pdf->MultiCell(190, 5, 
utf8_decode(' Ubicación del Inmueble: 
mi caracter de director del departameto de catastro de la alcaldia del Municipio Mario Briceño 
Iragorry, Atiendo a su solicitud ' . $data["nombre_usuario"] . ' ' . $data["apellido_usuario"] . ' 
y se le da un cordial saludo. mediante este motivo, le otorgo una reunion directa con mi persona, 
para conversar sobre los siguentes asuntos que son de su interes. A razon de la tenencia de la tierra 
y bien inmueble de su propiedad. ')
, 1, "L");

$pdf->MultiCell(190, 5, 
utf8_decode('   Yo, ' . $data["nombre"] . ' ' . $data["apellido"] . ', Venezolano(a), Mayor de edad, Soltero, Titular de la Cedula de Identidad Nro.V-' . $data["id_usuario"] . ' y de este domicilio declaro bajo juramento que los datos aqui suministrados son auténticos y reales,
por lo que hago totalmente responsable de cualquier acción que por este motivo se presente.')
, 0, "L");

$pdf->MultiCell(190, 5, utf8_decode('Cita que se otorga a los ' . $dia . ', del mes ' . date("m") . ' , del año ' . date("Y") . ' en el Municipio Mario Briceño Iragorry'), 0, "L");

$pdf->Ln(20);


$pdf->Ln(5);


$pdf->Output('SOLICITUD DE CERTIFICADO DE COPIAS V-' . $data["id_usuario"], 'D');

?>