<?php
include_once('PDF.php');

function cUTF($cadena){
  return  iconv('utf-8', 'ISO-8859-1',$cadena);
}

// Tamaño de página A4=210x297 Letter=216x279 Legal=216x356 
// Tamaño personalizado array(216,150)
// Orientación (P)ortrait=vertical (L)andscape=apaisado
// Unidades en milímetros (mm)
$pdf = new PDF('P','mm','Letter');
 
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$titulo1='Ejemplo de consulta PostgreSQL generada en PDF';
$tam1=$pdf->GetStringWidth($titulo1);

$anchoPag=$pdf->GetPageWidth();  // Width of Current Page
$altoPag=$pdf->GetPageHeight(); // Height of Current Page

$pdf->SetXY(($anchoPag-$tam1)/2,45);
$pdf->Cell($tam1, 10, $titulo1); // centrando texto

$pdf->SetFont('Arial','I',14);
$titulo2=cUTF('(Desarrollada por Mario Humberto Tiburcio Zúñiga)'); 
$tam2=$pdf->GetStringWidth($titulo2);

$pdf->SetXY(($anchoPag-$tam2)/2,55);
$pdf->Cell($tam2, 10, $titulo2); // centrando texto

//**************************
$pass = "lkpoaszxm2001";
$usuario = "sharky";
$nombreBaseDeDatos = "tec";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sentencia = $base_de_datos->query("select control, nombre, estado from personas where control='19091364'");
    $jugadores = $sentencia->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}

//*************************



// Define las cadenas de las cabeceras
$miCabecera = array('ID','NOMBRE','PAIS');
 
// Genera una tabla con cabecera y renglones (color de renglón alternado)
$pdf->tablaHorizontal($miCabecera,        // cadenas para cabecera
                      $jugadores,         // resultado de la consulta
                      ($anchoPag-105)/2,  // Posición X de la tabla 105=35*3
                                          // (ancho columna)*(número de columnas)
                      75,                 // Posición Y de la tabla
                      35,                 // Ancho de columna
                      7,                  // Alto de rebglón
                      "0000FF",           // Color fondo cabecera
                      "FFFFFF",           // Color texto cabecera
                      "DDDDFF"            // Color fondo renglón alternado
                     );

// Agrega imagen de 40x25       
//            Archivo          Pos X        Pos Y  Ancho Alto Formato
// $pdf->Image('shark.png' , ($anchoPag-40)/2 ,  10 ,   40 ,  25 ,'PNG', '');
 
$pdf->Output(); //Salida al navegador
?>
