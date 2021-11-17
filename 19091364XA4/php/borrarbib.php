<?php
session_start();
if (isset($_SESSION['usuario'])){
$id=$_POST["check"];

$usuario = "sharky";
$pass = "lkpoaszxm2001";
$nombreBaseDeDatos = "tec";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    foreach($id as $ids){
        $sentencia = $base_de_datos->prepare("delete from biblioteca where id='$ids'");
        $sentencia->execute();
    }
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
header("Location: ../biblioteca.php");

}
else
  header ("Location: ../index.html");
?>