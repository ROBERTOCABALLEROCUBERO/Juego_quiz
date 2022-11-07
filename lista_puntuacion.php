<?php
$servername = "10.230.108.82";
$username = "root";
$password = "ASECg1PYysBg";

session_start();
$nombre = $_SESSION["User"];
try {
    $conn = new PDO("mysql:host=$servername;dbname=Quiz", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $ranking = $conn->query("SELECT * FROM 'Puntuaciones' ORDER BY 'puntuacion' DESC LIMIT 5");
    $datospuntos = $conn->prepare($ranking);
    $datospuntos ->execute();
    $datosarrpuntos = $datospuntos->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <table class="table table-responsive">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Puntuacion</th>

            </tr>
        </thead>
        <?php
        echo "<tbody>";
        foreach ($datosarrpuntos as $row) {
            echo "<tr>";
            echo "<td>" . $row -> nombre_FK . "</td>";
            echo "<td>" . $row -> puntuacion . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";



        ?>

    </table>



</body>

</html>