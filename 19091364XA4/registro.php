<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user=scaleble=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="css/form.css">

    </head>
    <body>
        <form action="php/registro.php" method="POST">
            <img src="imagenes/logoitzblanco.png">
            <h1>Registro</h1>
            <p>Ingresa los siguientes datos<br> para poder registrarte</p>
        <!-- <form action="consultar.php" method="POST"> -->
            <input id="control" type="text" name="control" placeholder="Ingresa tu número de control"><br>
            <input id="nombre" type="text" name="nombre" placeholder="Nombre completo"><br>
            <input id="usuario" type="text" name="usuario" placeholder="Crea un usuario"><br>
            <select name="carrera" id="carrera">
                <option value="Ingeniería en sistemas computacionales">Ingeniería en sistemas computacionales</option>
                <option value="Ingeniería industrial">Ingeniería industrial</option>
                <option value="Ingeniería química">Ingeniería química</option>
                <option value="Ingeniería en electromecánica">Ingeniería en electromecánica</option>
                <option value="Ingeniería civil">Ingeniería civil</option>
                <option value="Turismo">Turismo</option>
            </select>
            <input id="contraseña" type="password" name="contraseña" placeholder="Crea una contraseña"><br>
            <button type="submit">Registrarme</button><br>
        </form>
    </body>
</html>