<?php
session_start();
if (isset($_SESSION['usuario'])){
$nombre=$_POST["nombre"];
$usuario=$_POST["usuario"];
$direccion=$_POST["direccion"];
$municipio=$_POST["municipio"];
$estado=$_POST["estado"];
$curp=$_POST["curp"];
$edad=$_POST["edad"];
$correo=$_POST["correo"];
$numero=$_POST["numero"];
$sangre=$_POST["sangre"];
$contrasena=$_POST["contrasena"];

$usuario = "sharky";
$pass = "lkpoaszxm2001";
$nombreBaseDeDatos = "tec";
$rutaServidor = "127.0.0.1";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;
                                    port=$puerto;
                                  dbname=$nombreBaseDeDatos",
                                         $usuario, 
                                         $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $sentencia = $base_de_datos->prepare("update personas set nombre='$nombre',direccion='$direccion',municipio='$municipio',estado='$estado',curp='$curp',edad='$edad',correo='$correo',numero='$numero',sangre='$sangre',contrasena='$contrasena' where control='19091364'");
    $sentencia = $base_de_datos->prepare("update personas set nombre='$nombre',direccion='$direccion',municipio='$municipio',estado='$estado',curp='$curp',edad='$edad',correo='$correo',numero='$numero',sangre='$sangre' where control='19091364'");
    if ($sentencia->execute())
       echo "Modificacion exitosa !!";
    else
       echo "Hubo en error al modificar";
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
header("Location: ../perfil.php");

}
else
  header ("Location: ../index.html");
?>