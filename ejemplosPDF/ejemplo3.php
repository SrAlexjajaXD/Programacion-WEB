
<?php
function cUTF($cadena){
  return  iconv('utf-8', 'ISO-8859-1',$cadena);
}

require('fpdf/fpdf.php');

$misDatos = array(
            array('nombre' => 'Esperbeneplatoledo', 'apellido' => 'Martínez', 'matricula' => '20420423'),
            array('nombre' => 'Araceli', 'apellido' => 'Morales', 'matricula' =>  '204909'),
            array('nombre' => 'Georginadavabulus', 'apellido' => 'Galindo', 'matricula' =>  '2043442'),
            array('nombre' => 'Luis', 'apellido' => 'Dolores', 'matricula' => '20411122'),
            array('nombre' => 'Mario', 'apellido' => 'Linares', 'matricula' => '2049990'),
            array('nombre' => 'Viridianapaliragama', 'apellido' => 'Badillo', 'matricula' => '20418855'),
            array('nombre' => 'Yadiramentoladosor', 'apellido' => 'García', 'matricula' => '20443335')
            );

$pdf = new FPDF('P','mm','A3');
$pdf->AddPage();
$pdf->SetFont('Times','I',15);
foreach($misDatos as $alumno){
  $pdf->Cell(50,15,cUTF($alumno['nombre']),1);
  $pdf->Cell(50,15,cUTF($alumno['apellido']),1);
  $pdf->Cell(50,15,cUTF($alumno['matricula']),1);
  $pdf->Ln();
}
$pdf->Output();
?>

