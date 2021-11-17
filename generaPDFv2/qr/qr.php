<?php
   function qr_encode($dato,$imagen){
     $comando = "qr \"$dato\" > $imagen.png";
     exec($comando,$output,$exitCode);
   }
?>
