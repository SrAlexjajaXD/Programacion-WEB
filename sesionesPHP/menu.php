<?php 
  session_start();
  if (isset($_SESSION['usuario'])){
?>  
  <h1>Menú:</h1>
  <h2>Usuario: <?php echo $_SESSION['usuario']; ?></h2>
  <h2>Nombre: <?php print_r ($_SESSION['nombre']); ?></h2>
  <a href="uno.php">Uno</a><br>
  <a href="dos.php">Dos</a><br>
  <a href="tres.php">Tres</a><br>
  <a href="nueva.php">Mi imagen</a><br>
  <a href="destruye.php">Salir de la sesión</a><br>
<?php
  } //
  else 
    header ("Location: login.php");
?>
