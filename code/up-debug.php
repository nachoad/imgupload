<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  <head>
     <body>
        <?php

          echo "<H3>Caracteristicas de la imagen subida:</H3>";
          echo "Nombre - <b>".$_FILES["fileToUpload"]['name']."</b><br>";
          echo "Dir temporal - <b>".$_FILES["fileToUpload"]['tmp_name']."</b><br>";
          echo "Tamaño - <b>".$_FILES["fileToUpload"]['size']."</b><br>";
          echo "¿Error? (0=no) - <b>".$_FILES['fileToUpload']['error']."</b><br>";

          $target_dir = "imgs/";
          $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
          $uploadOk = 1;
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          // Check if image file is a actual image or fake image
          if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
              if($check !== false) {
                  echo "El archivo es una imagen - <b>" . $check["mime"] . "</b>.<br>";
                  $uploadOk = 1;
              } else {
                  echo "El archivo no es una imagen.<br>";
                  $uploadOk = 0;
              }
          }

          if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                  echo "El fichero <b>". basename( $_FILES["fileToUpload"]["name"]). "</b> se ha cargado en el directorio. <br>";
              } else {
                  echo "Lo siento, ha habido un error subiendo el fichero. <br>";
              }

          echo "URL de descarga:<br>";
          echo "<a href=\"/thinkers/php/imgs/".$_FILES["fileToUpload"]["name"]."\">http://nachoad.com/thinkers/php/imgs/".$_FILES["fileToUpload"]["name"]."</a>" ;

        ?>
     <body>
<html>
