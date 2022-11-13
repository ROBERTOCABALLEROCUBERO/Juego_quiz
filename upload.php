<?php 
require("conn.php");
session_start();
$dir="Imagenes/";
$nombreArchivo=$_FILES['foto']['name'];

// Si no existe el directorio lo creas
$ruta = $dir . $nombreArchivo;

// Ahora puedes mover la imagen al directorio

if (!move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$nombreArchivo)){
    echo "error en la subida de la foto";
    echo "<a href='../views/empleadoAltaFormulario.php'>Volver</a>";
    exit;
}

$conn->query("UPDATE usuarios SET image='$ruta' WHERE nombre='".$_SESSION['User']."'") -> execute();

header("Location: menu.php");





?>