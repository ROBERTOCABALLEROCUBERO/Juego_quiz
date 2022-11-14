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
</head>

<body>
    <div id="caja">

        <a href="index.html" id="enlace" color='white'>Volver a la página de inicio</a>
    </div>
    <script>
        alert("<?php echo $resul?>"); 
        
    </script>
</body>

<?php
session_destroy();
?>
</html>