<?php
include_once('PDF.php');

function cUTF($cadena){
  return  iconv('utf-8', 'ISO-8859-1',$cadena);
}


$pdf = new PDF('P', 'mm', 'Letter');
 
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$titulo1='Ejemplo de tabla generada en PDF';
$pdf->SetXY(0,45);
$pdf->Cell(0, 10, $titulo1, 0, true, 'C'); // centrando texto

$pdf->SetFont('Arial','I',14);
$titulo2=cUTF('(Desarrollada por Mario Humberto Tiburcio Zúñiga)'); 
$pdf->SetXY(0,55);
$pdf->Cell(0, 10, $titulo2, 0, true, 'C'); // centrando texto

$miCabecera = array('id','Nombre', 'Pais');

$pass = "lkpoaszxm2001";
$usuario = "postgres";
$nombreBaseDeDatos = "newbase";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";//si fuera MySQL el puerto seria 3306
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
    $sentencia = $base_de_datos->query("select * from jugadores order by nombre");
    $jugadores = $sentencia->fetchAll(PDO::FETCH_OBJ);//arreglo de jugadores
    
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
$pdf->tablaHorizontal($miCabecera, $jugadores, 40,75);

$pdf->Image('shark.png' , 85 ,10, 40 , 25,'PNG', '');

$pdf->Image('../genQR/estaciones.png' ,165 ,229, 40 , 40,'PNG', '');
 
$pdf->Output(); //Salida al navegador
?>
