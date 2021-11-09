<?php
   session_start();
   if (isset($_SESSION['usuario'])){
     echo "<h2>Usuario: ".$_SESSION['usuario']."</h2>";
     echo "<h2>Nombre: ".$_SESSION['nombre']."</h2>";
     echo "<h1>Mi imagen</h1>";
     echo "<img src='../images/carOFF.png'><br>";
     echo "<a href=menu.php>Ir al menú</a><br>";
     echo "<a href=destruye.php>Cerrar sesión</a>";
   }
   else
     header ("Location: login.php");
?>
