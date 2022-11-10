<?php
session_start();
include "conn.php";

if (isset($_POST['respuestatextarea']) === true) {

    if ($_POST['respuestatextarea'] == $_SESSION['respuesta_bien']) {
        $_SESSION['puntuacion'] += 10;
    }
    if ($_POST['respuestatextarea'] == $_SESSION['respuesta_mal1']) {
        $_SESSION['contador'] += 5;
    }
    if ($_POST['respuestatextarea'] == $_SESSION['respuesta_mal2']) {
        $_SESSION['contador'] += 0;

    }
}






$_SESSION['contador'] += 1;


$consulta = $conn->query("SELECT * FROM Preguntas WHERE id = " . $_SESSION['contador'] . "");
$pregunta = $conn->prepare($consulta);
$pregunta->execute();
$preguntaarr = $pregunta->fetchAll(PDO::FETCH_ASSOC);

foreach ($preguntaarr as $row) {
    $texto = $row->texto;
    $tipo = $row->tipo;
    $_SESSION['respuesta_bien'] = $row->respuesta_bien;
    $_SESSION['repuesta_mal1']  = $row->respuesta_mal1;
    $_SESSION['repuesta_mal2'] = $row->respuesta_mal2;
}

/*     $status = !array_diff($q, $_SESSION['array']) ? TRUE : FALSE; */






//Crear sesion con array
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo "<form action=" . $_SERVER['PHP_SELF'] .
        " method='post'>";
    echo "<div class='caja_test'>";

    if ($tipo == "textarea") {
        echo "<label>" . $texto . "</label>";
        echo "<textarea name='respuestatextarea' rows='4' cols='50'></textarea>";
        echo "<br>";
        echo "<input type='submit' value='Submit'>";
    }
    if ($tipo == "Checkbox") {
        echo "<input type='checkbox' name='vehicle1' value='Bike'>";
        echo "<label for='vehicle1'> I have a bike</label>"."<br>";
        echo "<input type='checkbox' name='vehicle2' value='Car'>";
        echo "<label for='vehicle2'> I have a car</label>"."<br>";
        echo "<input type='checkbox' name='vehicle3' value='Boat'>";
        echo "<label for='vehicle3'> I have a boat</label>"."<br>";
        echo "<input type='submit' value='Submit'>";
    }
    if ($tipo == "RadioButton") {
        
    }
    if ($tipo == "Button") {
    }
    if ($tipo == "Select") {
    }



    echo "</div>";

    echo "</form>";
    ?>


</body>

</html>