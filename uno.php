<?php
    session_start();
    if(isset($_SESSION['$usuario'])){
        echo "<h1>Yo soy la pagina 1</h1>";
        echo $_SESSION['$usuario'];
    }else
        echo "<h1>Acceso no autorizado</h1>";
?>