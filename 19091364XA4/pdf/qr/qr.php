<?php
   function qr_encode($dato,$imagen){

     $comando = "qr \"$dato\" > $imagen.png";
     shell_exec($comando);
   }
?>
