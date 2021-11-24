<?php
   // Se importa librería para crear códigos QR
   require "qr/qr.php";

   // Se ejecuta función qr_encode($datos,$imagen) la cual codifica
   // la cadena $datos en una imagen $imagen correspondiente al código QR 
   // en formato PNG.
   qr_encode('Esr',"estaciones");
?>
<h1>Visualizado código QR generado</h1>
<img src=estaciones.png width=250 height=250>