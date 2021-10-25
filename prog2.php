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
        //Definiendo variables de diferente tipo
        $cad="¿Hola que tal?";
        $entero=5;
        $numero=4.35;
        $estado=true;
        echo $cad." ".$entero." ".$numero." ".$estado;
        echo "<br>Cadena=$cad<br>Entero=$entero<br>Numero=$numero";
        define ("IVA",16);
        echo "El porcentaje usado del IVA es= ".IVA;
        echo "<br>5+3= ".(5 + 3)."<br>";
        echo "5-3= ".(5 - 3)."<br>";
        echo "5*3= ".(5 * 3)."<br>";
        echo "5/3= ".(5 / 3)."<br>";
        echo "5%3= ".(5 % 3)."<br>";

        //Sentencia if
        $miEdad=19;
        if($miEdad>=18){
            echo "Eres mayor de edad";
        }else
            echo "Eres menor de edad";

        for($i=0;$i<5;$i++){
            echo "<h1>Hola mundo ".($i+1)."</h1>";
        }
        $contador=1;
        while($contador<=10){
            echo "<br>".$contador;
            $contador+2;
        }
        ?>
   </body>
</html>