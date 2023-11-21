<?php

$servidor = "localhost"; 
$usuario = "root";
$contrasena = ""; 
$base_de_datos = "login"; 


$conexion = mysqli_connect($servidor, $usuario, $contrasena, $base_de_datos);


if (!$conexion) {
    die("Conexión fallida: " . mysqli_connect_error()); // Si la conexión falla, se muestra un mensaje de error y se termina la ejecución del script
}

?>
