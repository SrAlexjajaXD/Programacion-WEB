<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/perfiil.css">
  <title>Mi perfil</title>
</head>
<?php
session_start();
if (isset($_SESSION['usuario'])){
  $pass = "lkpoaszxm2001";
  $usuario = "sharky";
  $nombreBaseDeDatos = "tec";
  # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
  $rutaServidor = "127.0.0.1";
  $puerto = "5432";//si fuera MySQL el puerto seria 3306
  $us=$_SESSION['usuario'];
  try {
      $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
      $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
      $sentencia = $base_de_datos->query("select * from estudiantes, personas where estudiantes.control='$us'");
      $estudiantes = $sentencia->fetchAll(PDO::FETCH_OBJ);//arreglo de jugadores
      foreach($estudiantes as $est){
?>
<body>
<nav>
    <div class="Titulos">
    <a href="home.php"><img src="imagenes/logoitzblanco.png" alt=""></a>
      <h1>Instituto Tecnológico de Zacatepec</h1>
      <img src="imagenes/LogoTecnmBlanco.png" alt="">
    </div>
    <div class="menu">
      <a href="materias.php">Materias</a>
      <!-- <a href="profesores.php">Profesores</a>
      <a href="cosos.php">Lista de costos</a> -->
      <a href="biblioteca.php">Biblioteca</a>
      <a href="perfil.php"><?php echo $_SESSION['name'];?></a>
      <a href="php/cierra.php" id="cerrar">Cerrar sesión</a>
    </div>
  </nav>
  <div class="contenido">
        <h1>Datos personales</h1>
            <div class="top">
            <img src="imagenes/perfilblue-01.png" alt="">
            <div>
                <form action="php/modificapersona.php" method="POST">
                <input type="input" value="<?php echo $est->nombre;?>" name="nombre"><br>
                <h2><?php echo $est->usuario?></h2>
                <h2><?php echo $est->control?></h2>
                <p>#<?php echo $est->tipo?></p>
              </div>
            </div>
            <div class="abajo">
              <div>
                <p>Dirección:</p><input value='<?php echo $est->direccion?>' name='direccion'><br>
                <p>Municipio:</p><input value='<?php echo $est->municipio?>'name='municipio'><br>
                <p>Estado:</p><input value='<?php echo $est->estado?>'name='estado'><br>
                <p>CURP:</p><input value='<?php echo $est->curp?>'name='curp'><br>
                <p>Edad:</p><input value='<?php echo $est->edad?>'name='edad'><br>
              </div>
              <div>
                <p>Correo:</p><input value='<?php echo $est->correo?>'name='correo'><br>
                <p>Número:</p><input value='<?php echo $est->numero?>'name='numero'><br>
                <p>Tipo de sangre:</p><input value='<?php echo $est->sangre?>'name='sangre'><br>
                <!-- <p>Contraseña:</p><?php echo $est->contrasena?></h3><br> -->
              </div>
            </div>
            <div  class="botones">
                <div>
                    <a href="perfil.php">Cancelar</a>
                    <button type="submit">Guardar cambios</button>
                </div>
            </div>
        </form>
  </div>
</body>
<?php
}
} catch (Exception $e) {
echo "Ocurrió un error con la base de datos: " . $e->getMessage();
}
}
else
  header ("Location: index.html");
?>
</html>