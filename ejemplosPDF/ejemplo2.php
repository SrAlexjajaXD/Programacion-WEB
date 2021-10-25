
<?php
function cUTF($cadena){
  return  iconv('utf-8', 'ISO-8859-1',$cadena);
}

require('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A3');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$str=cUTF('¡Hola, Mundo!');
for ($p=1;$p<=10;$p++)
{
  $pdf->Cell(15,15,$p." ".$str,1);
  $pdf->Ln();
}
$pdf->AddPage();
$pdf->Cell(0,20,utf8_decode("Este texto aparece en una nueva página"),0,false,'C');
$pdf->Output();
?>

