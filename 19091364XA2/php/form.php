<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/styleform.css">
        <title>Datos recibidos</title>
    </head>
    <body> 
        <div>
            <h1>Tus datos recibidos</h1>
            <div id="php">
            <?php
            $Nombre=$_POST['Nombre'];
            $aP=$_POST['Pa'];
            $aM=$_POST['Sa'];
            $Genero=$_POST['sexo'];
            $Dia=$_POST['dia'];
            $Mes=$_POST['mes'];
            $Año=$_POST['año'];
            $Municipio=$_POST['municipio'];
            echo "Tu nombre completo es:<br>$Nombre $aP $aM<br>";
            echo "Eres del genero $Genero<br>Tu cumpleaños es el día <br>
            $Dia de $Mes del año $Año<br>";
            echo "y vives en $Municipio";
            ?>
            </div>
        </div>
    </body>
</html>