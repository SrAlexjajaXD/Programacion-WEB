<html>
    <head>
        <meta charset="UTF-8">
        <title>Título del documento</title>
        <link rel="stylesheet" type="text/css" href="stilo.css">
    </head>    
    <body>
    <?php
    $vi=$_POST["vi"];
    $vf=$_POST["vf"];
    $in=$_POST["i"];

    echo "<table>";
    echo "<tr><th>Radio</th><th>Perimetro</th><th>Area</th></tr>";

    $color=0;
    for ($i=$vi; $i<=$vf; $i=$i+$in) {
        $area=(pi()*pow($i,2));
        $perimetro=(2*pi()*$i);
        $color++;
        if ($color%2==0) {
            echo "<tr style='background: white'><td>$i</td><td>".sprintf("%.5f",$area)."</td><td>".sprintf("%.5f",$perimetro)."</td></tr>";
        }else
            echo "<tr style='background: rgb(50, 116, 238)'><td>$i</td><td>".sprintf("%.5f",$area)."</td><td>".sprintf("%.5f",$perimetro)."</td></tr>";
    }
    echo "</table>"
    ?>
    </body>
</html>