<?php 
require("conn.php");
$nombreuser = $_SESSION["User"];
$archivo = $_FILES["imagen"]["tmp_name"]; 
 $tamanio = $_FILES["imagen"]["size"];
 $tipo    = $_FILES["imagen"]["type"];
 $nombre  = $_FILES["imagen"]["name"];

 if ( $archivo != "none" )
 
 {

    $fp = fopen($archivo, "rb");
    $contenido = fread($fp, $tamanio);
    $contenido = addslashes($contenido);
    fclose($fp); 

    $qry = "INSERT INTO Usuarios () VALUES 
            (0,'$nombre','$titulo','$contenido','$tipo')";

$foto = $conn->prepare($qry);
    $foto -> execute();
    if($foto -> rowCount() > 0)
      header("Location: menu.php");
 }



?>