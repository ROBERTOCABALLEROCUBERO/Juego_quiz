<?php 
require("conn.php");
/* Esto es para cambiar las imagenes de perfil de nuestros usuarios.
Además en caso de que no sea una imagen predeterminada que tengan nuestros usuarios estas se borraran del servidor
automáticamente. */
session_start();
$nombre = $_SESSION["User"];
$borrar = $conn->query("SELECT imagen AS borrarlink FROM usuarios WHERE nombre = '$nombre'");
$borrarimg = $borrar->fetch(PDO::FETCH_ASSOC);
if (!($borrarimg['borrarlink'] == "Imagenes/predeterminado.webp")){

unlink($borrarimg['borrarlink']);
}
$dir="Imagenes/";
$nombreArchivo=$_FILES['foto']['name'];

// Si no existe el directorio lo creas
$ruta = $dir . $nombreArchivo;

// Ahora puedes mover la imagen al directorio

if (!move_uploaded_file($_FILES['foto']['tmp_name'],$dir.$nombreArchivo)){
    echo "error en la subida de la foto";
    echo "<a href='menu.php'>Volver</a>";
    exit;
}

$conn->query("UPDATE usuarios SET imagen='$ruta' WHERE nombre='".$_SESSION['User']."'");

 header("Location: menu.php"); 




?>
