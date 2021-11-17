
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
  <nav>
    <div class="Titulos">
      <img src="imagenes/logoitzblanco.png" alt="">
      <h1>Intituto Tecnologico de Zacatepec</h1>
      <img src="imagenes/LogoTecnmBlanco.png" alt="">
    </div>
    <div class="menu">
      <a href="materias.php">Materias</a>
      <!-- <a href="profesores.php">Profesores</a>
      <a href="cosos.php">Lista de costos</a> -->
      <a href="biblioteca.php">Biblioteca</a>
      <a href="perfil.php"><?php echo $_SESSION['usuario'];?></a>
      <a href="php/cierra.php" id="cerrar">Cerrar sesión</a>
    </div>
  </nav>
  <div class="contenido">
    <h1>Boleta de calificaciones</h1>
  <?php
  $pass = "lkpoaszxm2001";
  $usuario = "postgres";
  $nombreBaseDeDatos = "tec";
  $rutaServidor = "127.0.0.1";
  $puerto = "5432";
  try {
      $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
      $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
      $consulMat = $base_de_datos->query("select calificaciones.clave, materias.nombre, calificacion, semestre from calificaciones, materias where control='19091364' and calificaciones.clave=materias.clave");
      $materias = $consulMat->fetchAll(PDO::FETCH_OBJ);
      $consulDat = $base_de_datos->query("select * from estudiantes, personas where personas.control='19091364'");
      $datos = $consulDat->fetchAll(PDO::FETCH_OBJ);
      foreach($datos as $dat){
        echo "<p>Nombre: $dat->nombre</p>";
        echo "<p>No. Control: $dat->control</p>";
        echo "<p>Semestre: $dat->semestre</p>";
        echo "<p>Carrera: $dat->carrera</p>";
        echo "<p>Especialidad: $dat->especialidad</p>";
      }
      echo "<table class='tabla'>";
      echo "<tr>
      <th>Clave</th>
      <th>Materia</th>
      <th>Semestre</th>
      <th>Calificacion</th>
      </tr>";
      foreach($materias as $mats){
        echo "<tr>";
        echo "<td class='clave'>".$mats->clave."</t>";
        echo "<td>".$mats->nombre."</td>";
        echo "<td class='semestre'>".$mats->semestre."</td>";
        echo "<td class='calificacion'>".$mats->calificacion."</td>";
        echo "</tr>";
      }
      echo "</table>";
  } catch (Exception $e) {
      echo "Ocurrió un error con la base de datos: " . $e->getMessage();
  }
  ?>
  <a href="pdf/bdPDF.php">Crear documento PDF</a>
  </div>
</body>
</html>
<?php
}
else
  header ("Location: index.html");
?>
