<?php
session_start();
require "conn.php";
/* Creo un contador que ejerce de corredor de preguntas. */
$contador = $_SESSION['contador'] += 1;
if ($contador > 7) {
    header("Location: resultados.php");
}
/* Al llegar a 7 he terminado el test */
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
        $_SESSION['puntuacion'] += 4;
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
        default:
            $_SESSION['puntuacion'] -= 0;
    }
}

if (isset($_POST['sel'])) {

    switch ($_POST['res']) {
        case 'opcion2':
            $_SESSION['puntuacion'] += 10;
            break;
        case 'opcion3':
            $_SESSION['puntuacion'] -= 5;
            break;
        default:
            $_SESSION['puntuacion'] -= 0;
    }
}
if (isset($_POST['boton1'])) {

    $_SESSION['puntuacion'] += 10;
}
if (isset($_POST['boton2'])) {

    $_SESSION['puntuacion'] -= 5;
}

/* Compruebo todas las posibles respuestas a través de los formularios. */

$consulta = $conn->query("SELECT * FROM Preguntas WHERE id ='$contador'");
$preguntaarr = $consulta->fetchAll(PDO::FETCH_ASSOC);

foreach ($preguntaarr as $row) {
    $texto = $row['texto'];
    $_SESSION['tipo'] = $row['tipo'];
    $_SESSION['respuesta_bien'] = $row['respuesta_bien'];
    $_SESSION['repuesta_mal1']  = $row['respuesta_mal1'];
    $_SESSION['repuesta_mal2'] = $row['respuesta_mal2'];
}
/* Saco toda la informacion de las preguntas para posteriormente clasificarlas. Existen errores al usar el alfabeto
español, pero no he conseguido arreglarlo y no se visualizan bien las letras. */
/*     $status = !array_diff($q, $_SESSION['array']) ? TRUE : FALSE;  Comparador de arrays sin uso*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="juego.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- Importo el bootstrap -->
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="cerrarsesion.php">Cerrar sesion</a>

    </nav>
<!-- Navbar con bootstrap -->
    <form action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?> " method='post'>
        <div class='caja_test' style='width: 40rem;'>
            <p><?php echo $_SESSION['respuesta_mal1']; ?></p>
            <p>Puntuacion: <?php echo $_SESSION['puntuacion'] ?></p>
            <?php

/* Clasificacion de las preguntas por tipos */
            if ($_SESSION['tipo'] == "textarea") {
                echo "<label>" . $texto . "</label>" . "<br>";
                echo "<textarea name='respuestatextarea' rows='4' cols='50'></textarea>";
                echo "<br>";
                echo "<input type='submit' value='Submit' name = 'text'>";
            }
            if ($_SESSION['tipo'] == "Checkbox") {
                echo "<label>" . $texto . "</label>" . "<br>";
                echo "<input type='checkbox' name='check[]' >";
                echo "<label for='vehicle1'>" . $_SESSION['respuesta_bien'] . "</label>" . "<br>";
                echo "<input type='checkbox' name='check[]' >";
                echo "<label for='vehicle2'>"  . $_SESSION['repuesta_mal1'] . "</label>" . "<br>";
                echo "<input type='checkbox' name='check[]' >";
                echo "<label for='vehicle3'>" . $_SESSION['repuesta_mal2'] . "</label>" . "<br>";
                echo "<input type='submit' value='Submit' name='Checkbox'>";
            }
            if ($_SESSION['tipo'] == "RadioButton") {
                echo "<label>" . $texto . "</label>" . "<br>";
                echo "<input type='radio' id='age1' name='res' value='opcion1'>";
                echo "<label for='respuesta1'>" . $_SESSION['respuesta_bien'] . "</label>" . "<br>";
                echo "  <input type='radio' id='age2' name='res' value='opcion2'>";
                echo "<label for='respuesta2'>" . $_SESSION['repuesta_mal1'] . "</label>" . "<br>";
                echo "<input type='radio' id='age3' name='res' value='opcion3'>";
                echo "<label for='respuesta3'>" . $_SESSION['repuesta_mal2'] . "</label>" . "<br>";
                echo "<input type='submit' value='Submit' name='radio'>";
            }
            if ($_SESSION['tipo'] == "Button") {
                echo "<form action=" . $_SERVER['PHP_SELF'] .
                    " method='post'>";
                echo "<label>" . $texto . "</label>" . "<br>";
                echo "<input type='submit' value='" . $_SESSION['respuesta_bien'] . " ' name='boton1'>";
                echo "<input type='submit' value=" . $_SESSION['repuesta_mal2'] . " name='boton2'>" . "<br>";
            }
            if ($_SESSION['tipo'] == "Select") {
                echo "<label>" . $texto . "</label>" . "<br>";
                echo "<label for='preg'>Dame la respuesta correcta</label>";
                echo "<select id='preg' name='res'>";
                echo "<option value='opcion2'>" . $_SESSION['respuesta_bien'] . " </option>";
                echo  "<option value='opcion3'>" . $_SESSION['repuesta_mal2'] . "</option>";
                echo "</select>";
                echo "<input type='submit' value='Submit' name='sel'>";
            }

            ?>
        </div>
    </form>
</body>

</html>