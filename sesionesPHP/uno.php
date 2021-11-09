<?php
   session_start();
   if (isset($_SESSION['usuario'])){
     echo "<h2>Usuario: ".$_SESSION['usuario']."</h2>";
     echo "<h2>Nombre: ".$_SESSION['nombre']."</h2>";
     echo "Soy <span style='color:blue; font-size:30px'>uno.php...</span> La variable sesión usuario vale ".$_SESSION['usuario']."<br><br>";
     echo "<a href=menu.php>Ir al menú</a><br>";
     echo "<a href=destruye.php>Cerrar sesión</a>";
   }
   else
     header ("Location: login.php");
?>
