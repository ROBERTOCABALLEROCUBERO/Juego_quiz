<?php
$servername = "10.230.108.82";
$username = "root";
$password = "ASECg1PYysBg";

session_start();
$nombre = $_SESSION["User"];
try {
    $conn = new PDO("mysql:host=$servername;dbname=Quiz", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $usuario = $conn->query("SELECT * FROM Usuarios WHERE nombre = '$nombre'");
    $puntosmax = $conn->query("SELECT max(puntuacion) FROM Puntuaciones WHERE nombre_FK = '$nombre'");
    $datos = $conn->prepare($usuario);
    $datosarr = $datos->fetchAll(PDO::FETCH_ASSOC);
    $datospuntos = $conn->prepare($puntosmax);
    $datosarrpuntos = $datospuntos->fetchAll(PDO::FETCH_ASSOC);
    foreach ($arrDatos as $row) {
        $name = $row["nombre"];
        $image = $row["image"];
    }
    foreach ($datosarrpuntos as $row) {
        $max_puntos = $row["puntuacion"];
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
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
                <a class="nav-link" href="#">Juego</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Lista de puntuaciones</a>
            </li>
        </ul>


    </nav>

    <div class="card" style="width: 18rem;" id="tarjeta">
        <img src="<?php $image?>" class="card-img-top" alt="Foto de perfil">
        <div class="card-body">
            <h5 class="card-title">Bienvenido al juego</h5>
            <p class="card-text">El juego es un quiz que todavía no he pensado</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Nombre: <?php echo $name ?></li>
            <li class="list-group-item">Puntuacion máxima: <?php echo $max_puntos ?> </li>
        </ul>
        <div class="card-body">
            <a href="#" class="card-link">Cambiar foto de perfil</a>
        </div>
    </div>
</body>

</html>