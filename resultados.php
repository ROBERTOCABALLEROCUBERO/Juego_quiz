<?php
require "conn.php";
session_start();
$puntos = $_SESSION['puntuacion'];
$nombre = $_SESSION['User'];
$_SESSION['contador'] += 1;
if ($puntos > 60) {

    $resultado = $conn->query("SELECT * FROM resultados WHERE grado = 1");
}
if ($puntos < 60 && $puntos > 40) {
    $resultado = $conn->query("SELECT * FROM resultados WHERE grado = 2");
}
if ($puntos < 40 && $puntos > 20) {
    $resultado = $conn->query("SELECT * FROM resultados WHERE grado = 3");
}
if ($puntos < 20) {
    $resultado = $conn->query("SELECT * FROM resultados WHERE grado = 4");
}
/* La tabla de resultado esta ordenada por grados. El 1 es el mejor y el 4 el peor.
Segun nuestra puntuación saldrá una imagen u otra. Al igual que un mensaje  */

$datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

foreach ($datos as $row) {
    $foto = $row['foto'];
    $msg = $row['mensaje'];
}

if ($_SESSION['contador'] == 1) {
    $guardar =  $conn->query("INSERT INTO  puntuaciones(nombre_FK, puntuacion) VALUES ('$nombre', '$puntos')");
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
    <link rel="stylesheet" href="stylemenu.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="cerrarsesion.php">Cerrar sesion</a>

    </nav>

    <div class="card" style="width: 40rem;" id="tarjeta">
        <img src="<?php echo $foto ?>" class="card-img-top" alt="Foto de resultado" style="width 30rem;">
        <div class="card-body">
            <h5 class="card-title" id="centrar"><?php echo $msg . "<br>";
                                                echo $_SESSION['puntuacion'] . " puntos";
                                                session_destroy(); ?></h5>
        </div>
</body>

</html>