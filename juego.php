<?php
session_start();
require "conn.php";

$contador = $_SESSION['contador'] += 1;
echo $contador;
if ($contador> 7) {
    header("Location: resultados.php");
}

if (isset($_POST['text'])) {

    if ($_POST['respuestatextarea'] == $_SESSION['respuesta_bien']) {
        $_SESSION['puntuacion'] += 10;
    }
    if ($_POST['respuestatextarea'] == $_SESSION['respuesta_mal1']) {
        $_SESSION['puntuacion'] += 5;
    }
    if ($_POST['respuestatextarea'] == $_SESSION['respuesta_mal2']) {
        $_SESSION['puntuacion'] += 0;
    }
}
if (isset($_POST['Checkbox'])) {
    foreach ($_POST['check'] as $checked) {
        if ($checked == $_SESSION['respuesta_bien']) {
            $_SESSION['puntuacion'] += 10;
        }
        if ($checked == $_SESSION['respuesta_mal1']) {
            $_SESSION['puntuacion'] -= 5;
        }
        if ($checked == $_SESSION['respuesta_mal2']) {
            $_SESSION['puntuacion'] -= 5;
        }
    }
}
if (isset($_POST['radio'])) {

    switch ($_POST['res']) {
        case 'opcion1':
            $_SESSION['puntuacion'] += 10;
            break;
        case 'opcion2':
            $_SESSION['puntuacion'] -= 5;
            break;
        case 'opcion3':
            $_SESSION['puntuacion'] -= 5;
            break;
            default :
            $_SESSION['puntuacion'] -= 0;

    }
}

if (isset($_POST['sel'])) {

    switch ($_POST['res']) {
        case 'opcion1':
            $_SESSION['puntuacion'] += 10;
            break;
        case 'opcion2':
            $_SESSION['puntuacion'] -= 5;
            break;
        case 'opcion3':
            $_SESSION['puntuacion'] -= 5;
            break;
            default :
            $_SESSION['puntuacion'] -= 0;

    }
}








$consulta = $conn->query("SELECT * FROM Preguntas WHERE id ='$contador'");
$preguntaarr = $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($preguntaarr as &$row) {
    $texto = $row['texto'];
    $_SESSION['tipo'] = $row['tipo'];
    $_SESSION['respuesta_bien'] = $row['respuesta_bien'];
    $_SESSION['repuesta_mal1']  = $row['respuesta_mal1'];
    $_SESSION['repuesta_mal2'] = $row['respuesta_mal2'];
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
                <a class="nav-link" href="cerrarsesion.php"> Cerrar sesion</a>
            </li>
        </ul>

    </nav>
    <?php
    echo "<form action=" . $_SERVER['PHP_SELF'] .
        " method='post'>";
    echo "<div class='caja_test' style='width: 40rem;'>";

    if ($_SESSION['tipo'] == "textarea") {
        echo "<label>" . $texto . "</label>" . "<br>";
        echo "<textarea name='respuestatextarea' rows='4' cols='50'></textarea>";
        echo "<br>";
        echo "<input type='submit' value='Submit' name = 'text'>";
    }
    if ($_SESSION['tipo'] == "Checkbox") {
        echo "<label>" . $texto . "</label>" . "<br>";
        echo "<input type='checkbox' name='check[]' value='Bike'>";
        echo "<label for='vehicle1'>" . $_SESSION['respuesta_bien'] . "</label>" . "<br>";
        echo "<input type='checkbox' name='check[]' value='Car'>";
        echo "<label for='vehicle2'>"  . $_SESSION['repuesta_mal1'] . "</label>" . "<br>";
        echo "<input type='checkbox' name='check[]' value='Boat'>";
        echo "<label for='vehicle3'>" . $_SESSION['repuesta_mal2'] . "</label>" . "<br>";
        echo "<input type='submit' value='Submit' name='Checkbox'>";
    }
    if ($_SESSION['tipo'] == "RadioButton") {
        echo "<label>" . $texto . "</label>" . "<br>";
        echo "<input type='radio' id='age1' name='res' value='opcion1'>";
        echo "<label for='respuesta1'>" . $_SESSION['respuesta_bien'] . "</label>" . "<br>";
        echo "  <input type='radio' id='age2' name='res' value='opcion2'>";
        echo "<label for='respuesta2'>". $_SESSION['repuesta_mal1'] ."</label>" . "<br>";
        echo "<input type='radio' id='age3' name='res' value='opcion3'>";
        echo "<label for='respuesta3'>". $_SESSION['repuesta_mal2'] ."</label>" . "<br>";
        echo "<input type='submit' value='Submit' name='radio'>";
    }
    if ($_SESSION['tipo'] == "Button") {
        echo "<form action=" . $_SERVER['PHP_SELF'] .
        " method='post'>";
        echo "<label>" . $texto . "</label>" . "<br>";
        echo "<input type='submit' value='". $_SESSION['respuesta_bien'] ." ' name='radio'>"."<br>";
        echo "<input type='submit' value='". $_SESSION['respuesta_mal1'] ."' name='radio'>"."<br>";
        echo "<input type='submit' value=". $_SESSION['repuesta_mal2'] ." name='radio'>"."<br>";

    }
    if ($_SESSION['tipo'] == "Select") {
        echo "<label>" . $texto . "</label>" . "<br>";
        echo "<label for='preg'>Dame la respuesta correcta</label>";
        echo "<select id='preg' name='res'>";
        echo "<option value='opcion1'>Volvo</option>";
        echo "<option value='opcion2'>Saab</option>";
        echo  "<option value='opcion3'>Opel</option>";
        echo "</select>";
        echo "<input type='submit' value='Submit' name='sel'>";
    }


    echo "</div>";

    echo "</form>";
    ?>

</body>

</html>
