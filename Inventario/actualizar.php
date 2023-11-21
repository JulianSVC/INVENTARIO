<?php
$con = mysqli_connect("localhost", "root", "", "productos");

if (isset($_POST['modify'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio' WHERE id='$id'";

    if ($con->query($sql) === TRUE) {
        echo "Producto actualizado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}
else {
$id= $_GET['id'];
$sql ="select * from productos where id='".$id."'";
$resultado =mysqli_query($con,$sql);
$filas = mysqli_fetch_assoc($resultado);
$nombre = $filas["nombre"];
$descripcion = $filas["descripcion"];
$precio = $filas["precio"];
}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modificar Producto</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <form method="post" action=""<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <br>
        <label>Descripcion:</label>
        <input type="text" name="descripcion" value="<?php echo $descripcion; ?>">
        <br>
        <label>Precio:</label>
        <input type="text" name="precio" value="<?php echo $precio; ?>">
        <br>
        <BR>
     
        <input type="submit" name="modify" value="Modificar">

        <a href="index.php">regresar</a>
    </form>

</body>
</html>