<?php
require "conexion.php";


if(isset($_POST['login'])) {


$usuario = $_POST['nombre_user'];
$contrasena = $_POST['contrasena_user'];


$sql = "SELECT * FROM usuarios WHERE nombre_user = '$usuario' and contrasena_user = '$contrasena'";
$resultado = mysqli_query($conexion,$sql);
$numero_registros = mysqli_num_rows($resultado);
	if($numero_registros != 0) {
	
		echo "Inicio de sesión exitoso. Bienvenido, " . $usuario . "!";
		header("Location:http://localhost/INVENTARIO/index.php");
exit();

	} else {
		echo "Credenciales inválidas. Por favor, verifica tu nombre de usuario y/o contraseña."."<br>";
		echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
	}
}
?>
