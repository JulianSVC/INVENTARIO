<?php
$con = mysqli_connect("localhost", "root", "", "productos");

if (isset($_POST['submit'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', '$precio')";

    if (mysqli_query($con, $sql)) {
        echo "Nuevo producto registrado.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
   <a href="index.php">regresar</a>