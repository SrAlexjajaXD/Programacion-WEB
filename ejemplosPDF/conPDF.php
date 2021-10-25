<?php
include_once('PDF.php');

function cUTF($cadena){
  return  iconv('utf-8', 'ISO-8859-1',$cadena);
}


$pdf = new PDF();
 
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$titulo1='Ejemplo de tabla generada en PDF';
$pdf->SetXY(0,45);
$pdf->Cell(0, 10, $titulo1, 0, true, 'C'); // centrando texto

$pdf->SetFont('Arial','I',14);
$titulo2=cUTF('(Desarrollada por Mario Humberto Tiburcio Zúñiga)'); 
$pdf->SetXY(0,55);
$pdf->Cell(0, 10, $titulo2, 0, true, 'C'); // centrando texto

$miCabecera = array('id','Nombre de campo', 'Apellido', 'Matrícula campo');
 
$misDatos = array(
            array('id'=>'100','nombre' => 'Esperbeneplatoledo', 'apellido' => 'Martínez de la Serna', 'matricula' => '20420423'),
            array('id'=>'200','nombre' => 'Araceli', 'apellido' => 'Morales', 'matricula' =>  '204909'),
            array('id'=>'300','nombre' => 'Georginadavabulus', 'apellido' => 'Galindo', 'matricula' =>  '2043442'),
            array('id'=>'400','nombre' => 'Luis', 'apellido' => 'Dolores', 'matricula' => '20411122'),
            array('id'=>'500','nombre' => 'Mario', 'apellido' => 'Linares', 'matricula' => '2049990'),
            array('id'=>'600','nombre' => 'Viridianapaliragama', 'apellido' => 'Badillo', 'matricula' => '20418855'),
            array('id'=>'700','nombre' => 'Yadiramentoladosor', 'apellido' => 'García', 'matricula' => '20443335')
            );
 
$pdf->tablaHorizontal($miCabecera, $misDatos, 40,75);

$pdf->Image('shark.png' , 85 ,10, 40 , 25,'PNG', '');
 
$pdf->Output(); //Salida al navegador
?>
