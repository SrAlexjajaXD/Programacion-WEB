<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
  <title>Mi perfil</title>
</head>
<?php
session_start();
if (isset($_SESSION['usuario'])){
?>
<body>
<nav>
    <div class="Titulos">
      <img src="imagenes/logoitzblanco.png" alt="">
      <h1>Intituto Tecnologico de Zacatepec</h1>
      <img src="imagenes/LogoTecnmBlanco.png" alt="">
    </div>
    <div class="menu">
      <a href="materias.php">Materias</a>
      <a href="profesores.php">Profesores</a>
      <a href="cosos.php">Lista de costos</a>
      <a href="perfil.php"><?php echo $_SESSION['usuario'];?></a>
      <a href="php/cierra.php" id="cerrar">Cerrar sesión</a>
    </div>
  </nav>
  <div class="contenido">
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
      $sentencia = $base_de_datos->query("select * from estudiantes, personas where estudiantes.control='19091364'");
      $estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);//arreglo de jugadores
      foreach($estudiantes as $est){
        echo "<h2>Usuario: $est->usuario</h2>";
        echo "<h2>Nombre: $est->nombre</h2>";
        echo "<h2>Tipo: $est->tipo</h2>";
        echo "<h2>No. Control: $est->control</h2>";
        echo "<h2>Direccion: $est->direccion</h2>";
        echo "<h2>Municipio: $est->municipio</h2>";
        echo "<h2>Estado: $est->estado</h2>";
        echo "<h2>CURP: $est->curp</h2>";
        echo "<h2>Edad: $est->edad</h2>";
        echo "<h2>Correo: $est->correo</h2>";
        echo "<h2>Numero: $est->numero</h2>";
        echo "<h2>Sangre: $est->sangre</h2>";
        echo "<h2>Contraseña: $est->contrasena</h2>";
      }
      //echo json_encode($jugadores);//conseguir extension jsonlite para chrome
  } catch (Exception $e) {
      echo "Ocurrió un error con la base de datos: " . $e->getMessage();
  }
  ?>
  </div>
</body>
<?php
}
else
  header ("Location: index.html");
?>
</html>
