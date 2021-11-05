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

   // Se ejecuta función qr_encode($datos,$imagen) la cual codifica
   // la cadena $datos en una imagen $imagen correspondiente al código QR 
   // en formato PNG.
   qr_encode('Estaciones: Spring, Summer, Autumm, Winter',"estaciones");
?>
<h1>Visualizado código QR generado</h1>
<img src=estaciones.png width=250 height=250>

