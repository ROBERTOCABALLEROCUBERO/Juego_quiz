<?php
include "conn.php";
error_reporting(0);
session_start();
$nombre = $_SESSION["User"];


    $usuario = $conn->query("SELECT * FROM Usuarios WHERE nombre = '$nombre'");
    $puntosmax = $conn->query("SELECT MAX(puntuacion) AS Maxima FROM Puntuaciones WHERE nombre_FK = '$nombre'");  
    $datosarr = $usuario->fetchAll(PDO::FETCH_ASSOC);
   $valormax = $puntosmax->fetch(PDO::FETCH_ASSOC);
    foreach ($datosarr as $row) {
      
      $image = $row['imagen'];
    }
   


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylemenu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Menú</a>


        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="juego.php">Juego</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="lista_puntuacion.php">Lista de puntuaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cerrarsesion.php">Cerrar Sesion</a>
            </li>
        </ul>

    </nav>

    <div class="card" style="width: 40rem;" id="tarjeta">
        <img src="<?php echo $image ?>" class="card-img-top" alt="Foto de perfil" style="width 30rem;">
        <div class="card-body">
            <h5 class="card-title">Bienvenido al juego</h5>
            <p class="card-text">El juego es un quiz de futbol</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nombre: <?php echo $nombre; ?></li>
            <li class="list-group-item">Puntuacion máxima: <?php echo $valormax['Maxima']?> </li>
        </ul>
        <div class="card-body">
            <form action="upload.php" method="post" enctype="multipart/form-data">
                Sube una imagen.
                <input type="file" name="foto" />
                <input type="submit" name="submit" value="UPLOAD" />
            </form>
        </div>
    </div>
</body>

</html>
