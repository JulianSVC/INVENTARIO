<?php
$con = mysqli_connect("localhost", "root", "", "productos");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM productos WHERE id='$id'";

    if (mysqli_query($con, $sql)) {
        echo "Producto eliminado.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

mysqli_close($con);
?>
   <a href="index.php">regresar</a>