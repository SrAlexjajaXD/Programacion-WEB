<?php
// Nota para reconocer tildes y caracteres UTF-8 usar:
// utf8_decode($cadena)
// iconv('utf-8', 'ISO-8859-1',$cadena)

// Incluir librería fpdf
require('fpdf/fpdf.php');
//  Letter, A3, Legal, A4, A5, etc
//  P protrait L landscape
$pdf = new FPDF('P','mm','A3');
// Agrega página al pdf
$pdf->AddPage();
// Tipo de letra arial bold tamaño 16
$pdf->SetFont('Arial','B',16);
// Celda para texto de tamaño 40 de ancho y 10 de alto
$pdf->Cell(40,10,'Hola a todos !');
// Salto de línea
$pdf->ln();
// Celda para texto centrada, enmarcada, fondo transparente, alto 10
// ancho toda la página.
$pdf->Cell(0,10,'Saludos al ITZ',1,false,'C');
// Se envía todo lo definido atrás como salida al documento pdf
$pdf->ln();
$pdf->ln();
$pdf->Cell(0,10,'Alex Lozano García',1,false,'C');
$pdf->ln();
$pdf->ln();
$pdf->AddPage();
$pdf->Cell(0,10,utf8_decode('El lápiz del niño contra el del pingüino'),1,false,'C');
$pdf->SetFont('Times','I',20);
$pdf->ln();
$pdf->ln();
$pdf->Cell(0,10,utf8_decode('Buenos días'),1,false,'C');

$pdf->Output();
?>
