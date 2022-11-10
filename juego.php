<?php
session_start();
include "conn.php";
$consulta = $conn->query("SELECT * FROM Preguntas ORDER BY RAND() LIMIT 0,1");
$pregunta = $conn->prepare($consulta);
$pregunta->execute();
$preguntaarr = $pregunta->fetchAll(PDO::FETCH_ASSOC);

foreach ($preguntaarr as $row) {
    $id = $row->id_pregunta;
    $texto = $row->texto;
    $tipo = $row->tipo;
    $respuesta_bien = $row -> respuesta_bien;
    $repuesta_mal1 = $row -> respuesta_mal1;
    $repuesta_mal2 = $row -> respuesta_mal2;

}
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
echo"<form action=".$_SERVER['PHP_SELF'].
" method='post'>";
echo "<div class='caja_test'>";

if ($tipo == "textarea") {

    $_SESSION["textarea"]++;
}
if ($tipo == "Checkbox") {
    $_SESSION["Checkbox"]++;
}
if ($tipo == "RadioButton") {
    $_SESSION["RadioButton"]++;
}
if ($tipo == "Button") {
    $_SESSION["Button"]++;
}
if ($tipo == "Select") {
    $_SESSION["Select"]++ ;
}



echo "</div>";

echo "</form>";
?>


</body>

</html>