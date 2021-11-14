<?php
session_start();

function buscaUsuario($us,$pas){
    $pass = "lkpoaszxm2001";
    $usuario = "sharky";
    //$nombreBaseDeDatos = "basedatos";
    $nombreBaseDeDatos = "tec";
    $rutaServidor = "127.0.0.1";
    $puerto = "5432";
    try {
      $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
      $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //$sentencia = $base_de_datos->query("select * from usuarios where iduser='$us' and pass='$pas'");
      $sentencia = $base_de_datos->query("select * from estudiantes where usuario='$us' and contrasena='$pas'");
      $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
      if  (count($resultado)==1){
         return $resultado;    
      }
      else
         return "NO";
      }catch(Exception $e){
         return "NO";    
      }
  }

  if (isset($_SESSION['usuario']))
    header ("Location: ../home.php");
  else
  {  
    $username=$_POST["nombre"];
    $pass=$_POST["contraseña"]; 
      
     
    if (isset($username) && isset($pass) && buscaUsuario($username,$pass)!="NO") 
    {
        $_SESSION['usuario']=$username;
        header ("Location: ../home.php");
    }
    else    
       
        header ("Location: ../index.html"); 
  }
?>