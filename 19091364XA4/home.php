<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ITZ</title>
        <link rel="stylesheet" type="text/css" href="css/estiloGeneral.css">
    </head>
    <body>
        <nav>
            <div class="Titulos">
                <img src="imagenes/logoitzblanco.png" alt="">
                <h1>Intituto Tecnologico de Zacatepec</h1>
                <img src="imagenes/LogoTecnmBlanco.png" alt="">
            </div>
            <div class="menu">
                <a href="materias.php">Materias</a>
                <a href="profesores.php">Profesores</a>
                <a href="cosos.php">Lista de costos</a>
                <a href="biblioteca.php">Biblioteca</a>
                <?php
                session_start();
                if(isset($_SESSION['usuario'])){
                ?>
                <a href="perfil.php"><?php echo $_SESSION['usuario'];?></a>
                <a href="php/cierra.php" id="cerrar">Cerrar sesión</a>
                <?php
                }else
                header("Location: index.html");
                ?>
            </div>
        </nav>
        <div>
            
        </div>
    </body>
</html>
