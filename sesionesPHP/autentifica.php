<?php
  // Se inicia sesión
  session_start();

// Función que busca si el usuario $u con password $p está en la base de datos.
// Si no lo encuentra o existe algun problema o error, regresa un "NO".
// Si lo encuentra, devuelve un objeto o arreglo asociativo conteniendo 
// el registro del usuario.
function buscaUsuario($u,$p){
  $pass = "lkpoaszxm2001";
  $usuario = "sharky";
  $nombreBaseDeDatos = "basedatos";
  # Puede ser 127.0.0.1 o el nombre de tu equipo; o la IP de un servidor remoto
  $rutaServidor = "127.0.0.1";
  $puerto = "5432";
  try {
    $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sentencia = $base_de_datos->query("select * from usuarios where iduser='$u' and pass='$p'");
    $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
    if  (count($resultado)==1){
       return $resultado;    
    }
    else
       return "NO";
    }catch(Exception $e){
       return "NO";    
    }
} // function

 
  if (isset($_SESSION['usuario'])) // Verifica que exista sesión
    header ("Location: menu.php");  // Si existe redirecciona al menú
  else // Si no hay sesión ...
  {
    // Recibe valores del formulario  
    $username=$_POST["username"];
    $pass=$_POST["pass"]; 
      
    // Verifica datos del form recibidos y que estén en la base de datos  
    if (isset($username) && isset($pass) && buscaUsuario($username,$pass)!="NO") 
    {
        // Crea variables de sesión
        $_SESSION['usuario']=$username; 
        $_SESSION["nombre"]=buscaUsuario($username,$pass)[0]->nombre; 
        
        // Redirecciona al menú
        header ("Location: menu.php");
    }
    else    
        // En caso contrario direcciona al login
        header ("Location: login.php"); 
  }
?>

