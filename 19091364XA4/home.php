<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ITZ</title>
        <link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
    </head>
    <body>
        <nav id="encabezado">
            <h1 id="logo">*LOGO*</h1>
            <input type="checkbox" id="consultas">
            <label for="consultas" id="consul">Consultar</label>
            <nav class="menu">
                <ul>
                    <li><a href="">Materias</a></li>
                    <li><a href="">Profesores</a></li>
                    <li><a href="">Biblioteca</a></li>
                    <li><a href="">Notas</a></li>
                </ul>
            </nav>
            <input type="checkbox" id="perfil">
            <label for="perfil" id="perfill">Perfil</label>
            <nav class="perfil">
                    <?php
                    session_start();
                    if(isset($_SESSION['usuario'])){
                    ?>
                    <p><?php echo $_SESSION['usuario'];?></p>
                    <a href="php/cierra.php" id="cerrar">Cerrar sesión</a>
                      <?php
                      }else
                      header("Location: index.html");
                      ?>
            </nav>
        </nav>
    </body>
</html>
