<?php
session_start();
if (isset($_SESSION['usuario'])){
    $pass = "lkpoaszxm2001";
    $usuario = "postgres";
    $nombreBaseDeDatos = "tec";
    $rutaServidor = "127.0.0.1";
    $puerto = "5432";
    try {
        $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
        $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para capturar errores
        $consulBibl = $base_de_datos->query("select personas.nombre, titulo, biblioteca.direccion, descripcion from biblioteca, personas");
        $biblioteca = $consulBibl->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
  <title>Biblioteca</title>
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
      <a href="profesores.php">Profesores</a>
      <a href="cosos.php">Lista de costos</a>
      <a href="biblioteca.php">Biblioteca</a>
      <a href="perfil.php"><?php echo $_SESSION['usuario'];?></a>
      <a href="php/cierra.php" id="cerrar">Cerrar sesión</a>
    </div>
  </nav>
  <div class="contenido">
    <h1>Bliblioteca digital</h1>
    <p>Aqui podras añadir varios enlaces de los cuales obtuviste alguna informacion importante para poder compartilos con tus
        profesores y compañeros del Tecnologico de zacatepec. Te recomendamos añadir una descrpcion breve para que nadie puierda
        detalles del enlace que añadiste (cuentas con 260 caracteres para expresarte libremente). Tampoco olvides añadir un titulo 
        bastante descriptivo.
    </p>
    <form action="php/insertarBib.php" method="POST">
    <input placeholder="Titulo" name="titulo">
    <input placeholder="Link" name="link">
    <input placeholder="Descripcion" name="descripcion">
    <button type="submit">Agregar</button>
    </form>
    <div>
    </div>
  <?php
      echo "<table class='biblioteca'>";
      echo "<tr>
      <th>Compartido por</th>
      <th>Titulo</th>
      <th>Enlace</th>
      <th>Descripcion</th>
      </tr>";
      foreach($biblioteca as $bib){
        echo "<tr>";
        echo "<td>".$bib->nombre."</t>";
        echo "<td>".$bib->titulo."</td>";
        echo "<td><a href='$bib->direccion'>$bib->direccion</a></td>";
        echo "<td>".$bib->descripcion."</td>";
        echo "</tr>";
      }
      echo "</table>";
  } catch (Exception $e) {
      echo "Ocurrió un error con la base de datos: " . $e->getMessage();
  }
  ?>
  </div>
</body>
</html>
<?php
}
else
  header ("Location: index.html");
?>