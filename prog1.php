<!-- Plantilla genérica de documento html -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Título del documento</title>
        <script type="text/javascript" src="js/"></script>
        <link rel="stylesheet" type="text/css" href="css/">
    </head>    
    <body>
        <?php
        echo "<h1>Hola mundo</h1>";
        $Nombre="Alex";
        echo "<h2>$Nombre</h2>";
        echo $Nombre.$Nombre;
        echo "<br><strong>".$Nombre."</strong>";
        echo "<h2 style=color:blue>Probando PHP</h2>"
        ?>
   </body>
</html>