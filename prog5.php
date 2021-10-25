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
            $edad=20;
            if($edad>=18){
        ?>
                <h1>Yo soy mayor de edad</h1>
        <?php
            }else{
        ?>
                <h1>Yo soy menor de edad</h1>
        <?php
            }
        ?>
        <?php
        $numero=7;
        for($i=1;$i<=10;$i++){
            $res=$numero*$i;
            echo "<h1>".$numero." x ".$i." = ".$res."</h1>";
        }
        ?>
        <?php
        $nombre="Alex";
        for($i=0;$i<5;$i++){
        ?>
            <h1>Hola mundo, yo soy <?php echo $nombre;?></h1>
        <?php
        }
        ?>
        <?php
        //areglos asociativos
        $persona=array("nombre"=>"Alex","edad"=>19,"procedencia"=>"Cuautla");
        $persona2=array("Alex",19,"Cuautla");
        print_r($persona2);
        ?>
    </body>
</html>