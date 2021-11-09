<?php
   session_start();
   if (!isset($_SESSION['usuario'])){
?>
     <form action="autentifica.php" method="Post">
        <label for="username">Dar su nombre de usuario</label>
        <input id="username" type="text" name="username"><br>
        <label for="pass">Dar su nombre de contraseña</label>
        <input id="pass" type="password" name="pass"><br>
        <button type="submit">Entrar</button>
     </form>     
<?php
   } else {
       header("Location: menu.php");
   }
    
?>
