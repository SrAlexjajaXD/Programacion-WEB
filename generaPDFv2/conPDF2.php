<?php
include_once('PDF.php');
require "qr/qr.php";

function cUTF($cadena){
  return  iconv('utf-8', 'ISO-8859-1',$cadena);
}

/*
function tabla($cursor){
    echo "<table border=1>";
    echo "<tr>";
    foreach($cursor[0] as $key=>$registro){
      echo "<th>".$key."</th>";  
    }
    echo "</tr>";
    foreach($cursor as $registro){
        echo "<tr>";
        foreach($registro as $key=>$campo){
            echo "<td>";
            echo "$campo";
            echo "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
*/

$pdf = new PDF("P","mm","Letter");
 
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$anchoPag=$pdf->GetPageWidth();  // Width of Current Page
$altoPag=$pdf->GetPageHeight(); // Height of Current Page

$titulo1=cUTF('** Resultado de la consulta a la base de datos **');
$tam1=$pdf->GetStringWidth($titulo1);
$pdf->SetXY(($anchoPag-$tam1)/2,45);
$pdf->Cell($tam1, 10, $titulo1); // centrando texto

$pdf->SetFont('Arial','I',14);
$titulo2=cUTF('(Desarrollada por Mario Humberto Tiburcio Zúñiga)'); 
$tam2=$pdf->GetStringWidth($titulo2);
$pdf->SetXY(($anchoPag-$tam2)/2,55);
$pdf->Cell($tam2, 10, $titulo2); // centrando texto

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
 

// Genera una tabla con cabecera y renglones (color de renglón alternado)
$pdf->tablaHorizontal($miCabecera,        // cadenas para cabecera
                      $misDatos ,         // resultado de la consulta
                      ($anchoPag-45*4)/2, // Posición X 45*4
                                          // (ancho columna)*(número de columna$
                      75,                 // Posición Y de la tabla
                      45,                 // Ancho de columna
                      7,                  // Alto de renglón
                      "FF0000",           // Color fondo cabecera
                      "FFFFFF",           // Color texto cabecera
                      "FFDDDD"            // Color fondo renglón alternado
                     );


//           Imagen       posX             posY  ancho  alto  formato
$pdf->Image('shark.png' , ($anchoPag-40)/2, 10,   40,    25,  'PNG', '');
//         Mensaje o texto a codificar                                        Imagen
qr_encode("M.C. Mario H Tiburcio\nDerechos Reservados 2021\nZacatepec, Mor.","codigo");
$pdf->Image('codigo.png' , $anchoPag-40, 5, 35, 35,'PNG', '');
 
$pdf->Output(); //Salida al navegador 

?>
