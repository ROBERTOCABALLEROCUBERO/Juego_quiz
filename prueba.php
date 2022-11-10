<?php
session_start();
$productos = array("foo", "pepe", "Jose", "Rober");
$_SESSION['productos']=$productos;
foreach ($_SESSION['productos'] as $value) {

    echo "El valor es ". $value . "<br>"; 
    

}

$q = array('pepito');
$_SESSION['productos'] = $q;

foreach ($_SESSION['productos'] as $value) {

    echo "El valor es ". $value . "<br>"; 
    

}

?>