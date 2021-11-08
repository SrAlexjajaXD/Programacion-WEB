<?php
$usuario = "sharky";
$pass = "lkpoaszxm2001";
$nombreBaseDeDatos = "newbase";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;
                                    port=$puerto;
                                  dbname=$nombreBaseDeDatos",
                                         $usuario, 
                                         $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sentencia = $base_de_datos->prepare("update jugadores set nombre='PIPINO',pais='Guatemala' where id='8888'");
    if ($sentencia->execute())
       echo "Modificacion exitosa !!";
    else
       echo "Hubo en error al modificar";
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
?>
