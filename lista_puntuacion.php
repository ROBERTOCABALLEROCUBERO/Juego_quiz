<?php
require 'conn.php';

session_start();
$nombre = $_SESSION["User"];

    $ranking = $conn->query ("SELECT * FROM Puntuaciones ORDER BY puntuacion DESC LIMIT 5");
    $datosarrpuntos = $ranking->fetchAll(PDO::FETCH_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilotabla.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="menu.php">Menú</a>


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

    <table class="table tabla">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Puntuacion</thclass=>

            </tr>
        </thead>
        <?php
        echo "<tbody>";
        foreach ($datosarrpuntos as $row) {
            echo "<tr>";
            echo "<td>" . $row["nombre_FK"] . "</td>";
            echo "<td>" . $row["puntuacion"] . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";



        ?>

    </table>



</body>

</html>