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
        $number=array("one","two","tree","four","five","six","seven",
        "eigh","nine","ten");
        for($i=0;$i<10;$i++){
            echo "<p>Titulo ".($i+1)." = ".$number[($i)]."<p>";
        }
        /*Contruyendo una tabla con los parrafos anteriores usando las
        etiquetas table, tr, td, th*/

        echo "<table>";
        echo "<tr><th>Titulo</th><th>Num. en ingles</th></tr>";
        for($i=0;$i<10;$i++){
            if($i%2==0)
            echo "<tr style='background:yellow'><td>Titulo ".($i+1)."</td><td>".$number[($i)]."</td><tr>";
            else
            echo "<tr style='background:orange'><td>Titulo ".($i+1)."</td><td>".$number[($i)]."</td><tr>";
        }
        echo "</table>";

        $equipo=array(
            "Portero"=>"Memo Ochoa",
            "Defensa"=>"Johan Vazquez",
            "Medio"=>"Hector Herrera",
            "Delantero"=>"Hirving Lozano"
        );
        foreach($equipo as $clave=>$valor){
            echo "El ".$clave." es ".$valor."<br>";
        }
        ?>
    </body>
</html>
<!-- Hacer aplicacion web en php que cualcule los perimetros y las areas para circuitos
de diferentes raddios, desde un valor inicial a un valos final en incrementos 
especiificos.
Los resultados deberan apareer en una tabla cuas columnas sean readio, perimetro y area,
con una precision de 5 decimales.
Los renglones de la tabla deberan tener alternancia de color.

a) Conruir unn formulario para capturar el valor inicial el valor final
y el incremento de los radios (validado con js)
b) Programa en PHP que reciba los valores del formulario y hacer
la tabla
 -->