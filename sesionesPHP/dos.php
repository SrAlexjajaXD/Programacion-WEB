<?php
   session_start();
   if (isset($_SESSION['usuario'])){
     echo "<h2>Usuario: ".$_SESSION['usuario']."</h2>";
     echo "<h2>Nombre: ".$_SESSION['nombre']."</h2>";
     echo "Soy <span style='color:red; font-size:30px'>dos.php...</span> La variable sesión usuario vale ".$_SESSION['usuario']."<br><br>";
     echo "<a href=menu.php>Ir al menú</a><br>";
     echo "<a href=destruye.php>Cerrar sesión</a>";
   }
   else
     header ("Location: login.php");
?>
