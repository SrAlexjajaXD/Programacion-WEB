<?php
$id=$_GET["id"];
$nombre=$_GET["nombre"];
$pais=$_GET["pais"];
?>
<form action="Modifica.php" method="POST">
    <input type="input" name="id" value="<?php echo $id; ?>" readonly=readonly><br>
    <input type="input" name="nombre" value="<?php echo $nombre; ?>"><br>
    <input type="input" name="pais" value="<?php echo $pais; ?>"><br>

    <button type="submit">Modificar</button>
</form>
