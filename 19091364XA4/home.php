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
            <a href="home.php" name="home"><img src="imagenes/logoitzblanco.png" alt=""></a>
                <h1>Instituto Tecnológico de Zacatepec</h1>
                <img src="imagenes/LogoTecnmBlanco.png" alt="">
            </div>
            <div class="menu">
                <a href="materias.php">Materias</a>
                <!-- <a href="profesores.php">Profesores</a> -->
                <!-- <a href="cosos.php">Lista de costos</a> -->
                <a href="biblioteca.php">Biblioteca</a>
                <?php
                session_start();
                if(isset($_SESSION['usuario'])){
                ?>
                <a href="perfil.php"><?php echo $_SESSION['name'];?></a>
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
