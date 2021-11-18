<?php
session_start();
if (isset($_SESSION['usuario'])){
// $control=$_POST["19091364"];
$titulo=$_POST["titulo"];
$link=$_POST["link"];
$descripcion=$_POST["descripcion"];
$usuario = "sharky";
$pass = "lkpoaszxm2001";
$nombreBaseDeDatos = "tec";
$rutaServidor = "127.0.0.1";
$puerto = "5432";
$us=$_SESSION['usuario'];
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sentencia = $base_de_datos->prepare("insert into biblioteca values(nextval('id'),'$us','$titulo','$link','$descripcion')");
    if ($sentencia->execute())
       echo "Insercion exitoso !!";
    else
       echo "Hubo en error al intentar insertar";
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
header ("Location: ../biblioteca.php");

}
else
  header ("Location: ../index.html");
?>
