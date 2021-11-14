
<?php
session_start();
if (isset($_SESSION['usuario'])){
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
  <title>Materias</title>
</head>
<body>
  <?php
  $pass = "lkpoaszxm2001";
  $usuario = "postgres";
  $nombreBaseDeDatos = "tec";
  # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
  $rutaServidor = "127.0.0.1";
  $puerto = "5432";//si fuera MySQL el puerto seria 3306
  try {
      $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
      $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
      $sentencia = $base_de_datos->query("select calificaciones.clave, materias.nombre, calificacion, semestre from calificaciones, materias where control='19091364' and calificaciones.clave=materias.clave");
      $estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);//arreglo de jugadores
      //print_r($jugadores);
      echo "<table>";
      echo "<tr>
      <th>Clave</th>
      <th>Materia</th>
      <th>Semestre</th>
      <th>Calificacion</th>
      </tr>";
      foreach($estudiantes as $est){
        echo "<tr>";
        echo "<td>".$est->clave."</t>";
        echo "<td>".$est->nombre."</td>";
        echo "<td>".$est->semestre."</td>";
        echo "<td>".$est->calificacion."</td>";
        echo "</tr>";
      }
      echo "</table>";
      //echo json_encode($jugadores);//conseguir extension jsonlite para chrome
  } catch (Exception $e) {
      echo "Ocurrió un error con la base de datos: " . $e->getMessage();
  }
  ?>
</body>
</html>
<?php
}
else
  header ("Location: index.html");
?>
