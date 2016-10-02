<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <meta charset="UTF-8">
  <title>Servidor</title>
</head>
<body>
<div style="padding:8px">
<div class="panel panel-default">
  <div class="panel-body">
    <div class="text-center">
      <h3>Servidor de Aplicaciones Local</h3>
    </div>
  </div>
</div>
<?php 
$directorio = opendir("."); //ruta actual
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
echo '<div class="row">';
  echo '<div class="col-xs-6 col-md-3">';
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        if ($archivo != '.' and $archivo != '..' and $archivo != 'bootstrap-3.3.7-dist') {
          # code...
          echo '<a href="'.$archivo.'" class="thumbnail">
            <img src="inode-directory.png" width="100px" alt="folder">
            '.$archivo.'
          </a>';
        }
        // echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
   
  echo '</div>';
echo '</div>';
}
?>
</div>
</body>
</html>