<?php session_start();
$resul = $_SESSION['Creada'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        alert("<?php echo $resul ?>");
    </script>
</head>

<body>
    <div id="caja">

        <a href="index.html" id="enlace" color='white'>Volver a la página de inicio</a>
    </div>

</body>

<?php
session_destroy();
?>

</html>