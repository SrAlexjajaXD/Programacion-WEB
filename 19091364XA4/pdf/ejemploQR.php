<!-- 
     Se debe instalar soporte para crear códigos QR en Ubuntu
     
                  apt install python3-qrcode
     
     Los archivos php y carpeta que los contenga, deben ser 
     propiedad del usuario www-data lo cual se asegura con el 
     comando:
                  chown -R www-data:www-data *
-->

<?php
   // Se importa librería para crear códigos QR
   require "qr/qr.php";

   session_start();
   if (isset($_SESSION['usuario'])){
   }
   else
     header ("Location: index.php");
   qr_encode("".$_SESSION['usuario']."","estaciones");
?>
<h1>Visualizado código QR generado</h1>
<img src=estaciones.png width=250 height=250>

