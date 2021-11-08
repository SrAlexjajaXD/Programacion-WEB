
<?php
$pass = "lkpoaszxm2001";
$usuario = "postgres";
$nombreBaseDeDatos = "newbase";
# Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
$rutaServidor = "127.0.0.1";
$puerto = "5432";//si fuera MySQL el puerto seria 3306
try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
    $sentencia = $base_de_datos->query("select * from jugadores");
    $jugadores = $sentencia->fetchAll(PDO::FETCH_OBJ);//arreglo de jugadores
    //print_r($jugadores);
    echo "<form action=borrar2.php method=POST>";
    echo "<table border=1>";
    echo "<tr><th>Marcar</th><th>Id</th><th>Jugador</th><th>Pais</th></tr>";
    foreach($jugadores as $jug){
      echo "<tr>";
      echo "<td><input type=checkbox name=check[] value=".$jug->id."></td>";
      echo "<td>".$jug->id."</t>";
      echo "<td>".$jug->nombre."</td>";
      echo "<td>".$jug->pais."</td>";
      echo "</tr>";
    }
    echo "</table>";
    echo "<button type=submit>Eliminar</button><br>";
    echo "</form>";
    //echo json_encode($jugadores);//conseguir extension jsonlite para chrome
} catch (Exception $e) {
    echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
?>
