<?php
    session_start();
    if(isset($_SESSION['$usuario'])){
        echo "<h1>Yo soy la pagina 1</h1>";
    }else
        echo "Acceso no autorizado";
?>