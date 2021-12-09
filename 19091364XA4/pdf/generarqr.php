
<?php
session_start();
if (isset($_SESSION['usuario'])){
   require "qr/qr.php";
   $us=$_SESSION['usuario'];
   $nom=$_SESSION['name'];
   date_default_timezone_set('America/Mexico_City');
   $fecha=date('d/F/Y', time());
   $hora=date('h:i:s a', time());
   qr_encode("$us $nom, $fecha $hora","datos");
?>
<?php
}
else
  header ("Location: index.html");
?>