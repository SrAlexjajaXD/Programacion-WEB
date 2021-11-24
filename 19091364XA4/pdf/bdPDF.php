<?php

session_start();
if (isset($_SESSION['usuario'])){

include_once('PDF.php');
require "qr/qr.php";

function cUTF($cadena){
  return  iconv('utf-8', 'ISO-8859-1',$cadena);
}


$pass = "lkpoaszxm2001";
$usuario = "sharky";
$nombreBaseDeDatos = "tec";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";

$sem=$_POST["semestre"];
$us=$_SESSION['usuario'];
try {
  $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
  $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sentencia = $base_de_datos->query("select calificaciones.clave, materias.nombre, semestre, calificacion from calificaciones, materias where control='$us' and calificaciones.clave=materias.clave and semestre='$sem'");
  $materias = $sentencia->fetchAll(PDO::FETCH_OBJ);
  $consulDat = $base_de_datos->query("select * from estudiantes, personas where personas.control='$us' and estudiantes.control='$us'");
  $datos = $consulDat->fetchAll(PDO::FETCH_OBJ);
} catch (Exception $e) {
  echo "Ocurrió un error con la base de datos: " . $e->getMessage();
  }
  // Tamaño de página A4=210x297 Letter=216x279 Legal=216x356 
  // Tamaño personalizado array(216,150)
  // Orientación (P)ortrait=vertical (L)andscape=apaisado
  // Unidades en milímetros (mm)
  $pdf = new PDF('P','mm','Letter');
  
  $pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$anchoPag=$pdf->GetPageWidth();  // Width of Current Page
$altoPag=$pdf->GetPageHeight(); // Height of Current Page




  $pdf->Image('../imagenes/logEdu.png' , 5 ,  0 ,   80 ,  42 ,'PNG', '');
  $pdf->Image('../imagenes/logoTECNM1.png' , 140 ,  11 ,   60 ,  21 ,'PNG', '');
  
  $pdf->SetFont('Arial','B',10);
  $dep=cUTF('Instituto Tecnológico de Zacatepec'); 
  $pdf->SetXY(135,38);
  $pdf->Cell(1, 10, $dep);
  
  $dep=cUTF('Departamento de servicios escolares'); 
  $pdf->SetXY(130,42);
  $pdf->Cell(1, 10, $dep);
  
  $pdf->SetFont('Arial','B',16);
  $titulo1='Boleta de calificaciones';
  $tam1=$pdf->GetStringWidth($titulo1);
  $pdf->SetXY(($anchoPag-$tam1)/2,55);
  $pdf->Cell($tam1, 10, $titulo1); // centrando texto
  
  
  foreach($datos as $dat){
    $pdf->SetFont('Arial','I',13);
    $nombre=cUTF('Estudiante: '.$dat->nombre); 
    $pdf->SetXY(10,67);
    $pdf->Cell(1, 10, $nombre);
    
    $pdf->SetFont('Arial','I',13);
    $control=cUTF('No. Control: '.$dat->control); 
    $pdf->SetXY(10,73);
    $pdf->Cell(1, 10, $control);
    
    $pdf->SetFont('Arial','I',13);
    $sem=cUTF('Semestre: '.$sem); 
    $pdf->SetXY(10,79);
    $pdf->Cell(1, 10, $sem);
    
    $pdf->SetFont('Arial','I',13);
    $car=cUTF('Carrera: '.$dat->carrera); 
    $pdf->SetXY(10,85);
    $pdf->Cell(1, 10, $car);
    
    $pdf->SetFont('Arial','I',13);
    $esp=cUTF('Especialidad: '.$dat->especialidad); 
    $pdf->SetXY(10,91);
    $pdf->Cell(1, 10, $esp);
  }
  
  //**************************
  
  //*************************
  $pdf->Image('../imagenes/piepdf.jpg' , 7 ,  235 ,   200 ,  40 ,'JPG', '');
  
  
  // Define las cadenas de las cabeceras
  $miCabecera = array('Clave','Nombre','Semestre','Calificación');
  
  // Genera una tabla con cabecera y renglones (color de renglón alternado)
  $pdf->tablaHorizontal($miCabecera,        // cadenas para cabecera
  $materias,         // resultado de la consulta
  ($anchoPag-200)/2,  // Posición X de la tabla 105=35*3
  // (ancho columna)*(número de columnas)
  110,                 // Posición Y de la tabla
  50,                 // Ancho de columna
  7,                  // Alto de rebglón
  "132541",           // Color fondo cabecera
  "FFFFFF",           // Color texto cabecera
  "FFFFFF"            // Color fondo renglón alternado
);

// Agrega imagen de 40x25       
//            Archivo          Pos X        Pos Y  Ancho Alto Formato

// qr_encode("".$_SESSION['usuario']."","datos");
$pdf->Image('datos.png' , 6 ,  210 ,   30 ,  30 ,'PNG', '');
$pdf->Output(); //Salida al navegador
}
else
header ("Location: index.html");
?>
