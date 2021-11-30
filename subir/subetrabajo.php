<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
  $target_path = "../CARPETA/";
  $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
  if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) 
  {
      echo "<p>Felicidades !</p>";
      echo "<p>Se ha enviado satisfactoriamente el archivo [".basename( $_FILES['uploadedfile']['name'])."]";
  } 
  else
  {
      echo "<p>Lo sentimos...</p>";
      echo "<p>Hubo un error en el env&iacute;o del archivo intente de nuevo !</p>";
  }
?>
</body>
</html>

