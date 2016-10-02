<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <title>Servidor local</title>
</head>
<body>
<?php 

$count = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    foreach ($_FILES['files']['name'] as $i => $name) {
        if (strlen($_FILES['files']['name'][$i]) > 1) {
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i],$name)) {
                $count++;
                chmod($name, '0775'); 
            }else{
              $msg="Ocurri&#243; algún error al subir el archivo. No pudo guardarse."; 
            }
        }
    }
}
 ?>
<div style="padding:8px">
<div class="panel panel-default">
  <div class="panel-body">
    <div class="text-center" >
      <?php if (isset($msg)): ?>
        <div class="alert alert-info">
          <?php echo $msg; ?>
        </div>
      <?php endif ?>
      <h3>Servidor de Aplicaciones Local</h3>

      <a href="/phpmyadmin" target="_blank"><img src="pma-logo.jpg" alt="phpmyadminlogo" width="100px">Ir a PHPMyAdmin</a>
      <form method="post" enctype="multipart/form-data">
      <center>
          <input type="file" name="files[]" id="files" multiple="" directory="" webkitdirectory="" mozdirectory="">
          <br>
          <input class="button" type="submit" value="Enviar" />
          </center>
      </form>
    </div>
  </div>
</div>
<?php 
$directorio = opendir("."); //ruta actual
$count=0;
echo '<div style="padding:10px;">';
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
  echo '<div class="pull-left" style="padding:5px">';
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        if ($archivo != '.' and $archivo != '..' and $archivo != 'bootstrap-3.3.7-dist' and $archivo != '.git') {
          $count++;
          # code...
          echo '<a href="'.$archivo.'" class="thumbnail">
            <img src="inode-directory.png" width="100px" alt="folder"><br>
            <div class="text-center">'.$archivo.'</div>
          </a>';
        }else{
          
        }
        // echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }else{
      if ($archivo != 'index.php' and $archivo != 'icono_file.png' and $archivo != 'inode-directory.png' and $archivo != 'pma-logo.jpg' and $archivo != 'README.md') {
        $count++;
        # code...
        echo '<a href="'.$archivo.'" class="thumbnail">
          <img src="icono_file.png" width="100px" alt="folder"><br>
          <div class="text-center">'.$archivo.'</div>
        </a>';
      }
    }
   
  echo '</div>';
}
echo '</div>';
if ($count == 0) {
  echo "<div class='text-center'><h2>No se Encontro ningun directorio.</h2></div>";
}
?>
</div>
</body>
</html>