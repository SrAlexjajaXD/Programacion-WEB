<?php
$pass = "lkpoaszxm2001";
$usuario = "postgres";
$nombreBaseDeDatos = "NewBase";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";//si fuera MySQL el puerto seria 3306
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
    $sentencia = $base_de_datos->query("select * from jugadores");
    $jugadores = $sentencia->fetchAll(PDO::FETCH_OBJ);//arreglo de jugadores
    //print_r($jugadores);
    // foreach($jugadores as $jug){
    //   echo $jug->id."<br>";
    //   echo $jug->nombre."<br>";
    //   echo $jug->pais."<br>";
    // }
    echo json_encode($jugadores);//conseguir extension jsonlite para chrome
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
?>
