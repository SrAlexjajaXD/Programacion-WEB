
            <?php
            $control=$_POST["control"];
            $nombre=$_POST["nombre"];
            $usuariop=$_POST["usuario"];
            $carrera=$_POST["carrera"];
            $contrasena=$_POST["contraseña"];
            $usuario = "sharky";
            $pass = "lkpoaszxm2001";
            $nombreBaseDeDatos = "tec";
            $rutaServidor = "127.0.0.1";
            $puerto = "5432";
            $us=$_SESSION['usuario'];
            try {
                $base_de_datos = new PDO("pgsql:host=$rutaServidor;port=$puerto;dbname=$nombreBaseDeDatos", $usuario, $pass);
                $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $registroE = $base_de_datos->prepare("insert into estudiantes values('$control','$usuariop','$carrera','Sin especialidad',0,'XD',0,0,'$contrasena')");
                $registroP = $base_de_datos->prepare("insert into personas values('$control','$nombre','Estudiante','',0,'','','','','','')");
                $registroP->execute();
                if ($registroE->execute())
                   echo "Insercion exitoso !!";
                else
                   echo "Hubo en error al intentar insertar";
            } catch (Exception $e) {
                echo "Ocurrió un error con la base de datos: " . $e->getMessage();
            }
            header ("Location: ../index.html");
            ?>