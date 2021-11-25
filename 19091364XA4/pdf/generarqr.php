
<?php
session_start();
if (isset($_SESSION['usuario'])){
   // Se importa librería para crear códigos QR
   require "qr/qr.php";
   $us=$_SESSION['usuario'];
   $nom=$_SESSION['name'];
   date_default_timezone_set('America/Mexico_City');
   $fecha=date('d/F/Y', time());
   $hora=date('h:i:s a', time());

   
   // Se ejecuta función qr_encode($datos,$imagen) la cual codifica
   // la cadena $datos en una imagen $imagen correspondiente al código QR 
   // en formato PNG.
   qr_encode("$us $nom, $fecha $hora","datos");
?>
<?php
}
else
  header ("Location: index.html");
?>