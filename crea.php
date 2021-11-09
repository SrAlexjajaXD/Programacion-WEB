<?php
    session_start();
    if(isset($_SESSION['$usuario'])){
        echo "<h1>La variable de sesion ya esta creada</h1>";
    }else
        echo "<h1>Creando variable sesion</h1>";
        $_SESSION['$usuario']="Alex";
?>