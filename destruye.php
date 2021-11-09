<?php
session_start();
if(isset($_SESSION['$usuario'])){
    session_destroy();
    echo "Sesion destruida";
}else
    echo "La session no existe";
?>