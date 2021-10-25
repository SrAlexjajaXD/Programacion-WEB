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
        $personas=array("Kent","Eduardo","Carlos","Andrea","Alex","Alexis");
        //print_r ($personas);
        foreach($personas as $nombre){
            echo $nombre."<br>";
        }
        for($i=0;$i<count($personas);$i++){
            echo $personas[$i]."<br>";
        }
        ?>
   </body>
</html>