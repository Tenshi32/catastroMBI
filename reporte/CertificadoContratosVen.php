<?php

date_default_timezone_set("America/Caracas");

$dia = date("d") + 1;

require_once '../fpdf/fpdf.php';
require_once '../php/Model/ModeloContrato.php';
$data = new ModeloContrato();
$data = $data->ReporteContratoModelo($_POST['datos']);

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
        $this->Cell(200, 4, 'CONTRATO DE VENTA DE INMUEBLE', 0, 1, 'C');
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



$pdf = new PDF('P', 'mm', 'legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->SetMargins(12, 0, 0);
$pdf->Ln(15);

$pdf->MultiCell(
    190, 7,
    utf8_decode('   Yo, ' . $data["nombre_usuario"] . ' ' . $data["apellido_usuario"] . ', Venezolano(a), Mayor de edad, Soltero, Titular de la Cedula de Identidad Nro.V-' . $data["id_usuario"] . ' de este domicilio actuando en nombre propio, respectivamente, por medio de la presente doy en VENTA pura y simple perfecta e irrevocable al ciudadano(a), ' . $data["nombre_actor"] . ' ' . $data["apellido_actor"] . ' Venezolano(a), Mayor de edad, soltero, titular de la cedula de identidad Nro.V-' . $data["cedula_actor"] . ' un inmueble constituido sobre una parcela de terreno de propiedad '. $data['tenencia'] .' que mide '.$data['medida_texto'].' ('.$data['medida_inmueble'].' mts2), "Direccion Completa" UBICADA EN LA PARROQUIA '.$data['parroquia'].', RESICENDECIA '.$data['residencia'].', ENTRE '.$data['descripcion_ubicacion_entre'].' '.$data['ubicacion_entre_text'].' Y '.$data['descripcion_ubicacion_y'].' '.$data['ubicacion_y_text'].', NRO CIVICO '.$data['n_civico'].', SECTOR '.$data['parroquia'].', JURISDICCIÓN DEL MUNICIPIO MARIO BRICEÑO IRAGORRY DEL ESTADO ARAGUA, identificada con el Nro. Catastral 05-08-U1-'.$data['parroquia_catastral'].'-'.$data['sector_catastral'].'-'.$data['manzana_catastral'].''.$data['parcela_catastral'].', cuyos linderos y medidas son los siguientes: NORTE: '.$data['norte_descripcion'].', en '.$data['norte_texto'].' CENTÍMETROS ('.$data['norte_medida'].'MTS) el cual es su frente; SUR: '.$data['sur_descripcion'].', en '.$data['sur_texto'].' CENTIMETROS ('.$data['sur_medida'].'MTS); ESTE: '.$data['este_descripcion'].', en '.$data['este_texto'].' CENTIMETROS ('.$data['este_medida'].'MTS) y OESTE: '.$data['oeste_descripcion'].', en '.$data['oeste_texto'].' CENTIMETROS ('.$data['oeste_medida'].'MTS), inmueble el cual me pertenece según se evidencia en el documento debidamente autenticado ante EL REGISTRO INMOBILIARIO SEGUNDO de Maracay, Edo. Aragua de la fecha '.$data['fecha_titulo'].', Nro.'.$data['numero_titulo'].' de los libros respectivos llevados por ese despacho en el año '.$data['anno_titulo'].'. Inmueble dotada de Servicios publicos tales como:'.$cadenaLimpia = str_replace("<br>", ", ", $data['servicio_publico_totales']).', inmueble que es de mi entera propiedad, dicho inmueble me pertenece por haberla adquirido de acuerdo a documento debidamente autenticado ante EL REGISTRO INMUBOLIARIO SEGUNDO de Maracay, Edo. Aragua de fecha '.$data['fecha_titulo'].', Nro.'.$data['numero_titulo'].' de los libros respectivos llevados por ese despacho en el año '.$data['anno_titulo'].', el monto de la venta es la cantidad de '.$data['monto_texto'].' BOLIVARES DIGITALES ( '.$data['monto_pagar'].' Bsd) de los cuales declaro recibir del comprador a su entera y cabal satisfacción mediante Metodo de pago '.$data['metodo_pago'].', por el monto ya antes mencionado el inmueble aquí dado en venta está libre de gravamen y de cualquier tipo de impuesta nacional o municipal, y yo ' . $data["nombre_actor"] . ' ' . $data["apellido_actor"] . ' supra identificada declaro que acepto la venta que se me hace en los términos  y condiciones aquí expuestas en Maracay y a la fecha de su presentación.'),
    0, "J"
);


$pdf->Ln(8);

$pdf->MultiCell(190, 5, utf8_decode('Contrato que se otorga a los ' . $dia . ', del mes ' . date("m") . ' , del año ' . date("Y") . ' en el Municipio Mario Briceño Iragorry'), 0, "L");

$pdf->Ln(20);
//////////////////////////////
$pdf->MultiCell(190, 5, utf8_decode('ATENTAMENTE ' . $data["nombre_usuario"] . ' ' . $data["apellido_usuario"]), 0, "C");

$pdf->Ln(15);

$pdf->MultiCell(190, 5, utf8_decode('C.I: V-' . $data["id_usuario"]), 0, "C");

$pdf->Ln(5);

$pdf->MultiCell(190, 5, utf8_decode('TELEFONO: '), 0, "C");

$pdf->Ln(5);


$pdf->Output('CERTIFICADO DE CITA V-' . $data["id_usuario"], 'D');

?>