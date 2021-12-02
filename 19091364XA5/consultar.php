<?php

function cUTF($cadena){
    return iconv("utf-8", "ISO-8859-1", $cadena);
}

$pass = "lkpoaszxm2001";
$usuario = "sharky";
$nombreBaseDeDatos = "newbase";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";//si fuera MySQL el puerto seria 3306
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
    $sentencia = $base_de_datos->query("select * from albumes");
    $jugadores = $sentencia->fetchAll(PDO::FETCH_OBJ);//arreglo de jugadores
    echo json_encode($jugadores);//conseguir extension jsonlite para chrome
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
?>