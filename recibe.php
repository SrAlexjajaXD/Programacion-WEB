<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Recibiendo valores...</title>
    </head>
    <body>
        <h1>Valores recibidos del formulario</h1>
    </body>
    <?php
        $Nombre=$_POST['Nombre'];
        $Procedencia=$_POST['Procedencia'];
        $Sexo=$_POST['Sexo'];
        $comentario=$_POST['comentario'];
        echo "<h2>Yo soy $Nombre y vengo de $Procedencia y mi sexo es $Sexo</h2>";
        echo "<h2>Mis gustos son</h2>";
        foreach ($_POST['Gusto'] as $Gust){
            echo "$Gust<br>";
        }
        echo "<h3> Comentarios: <i>$comentario</i> <h3>";
    ?>
</html>