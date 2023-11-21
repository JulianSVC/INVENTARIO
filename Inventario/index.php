<!DOCTYPE html>
<html>
<head>
    <title>Productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .action {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
        }

        .action a {
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .action a:hover {
            background-color: #ddd;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: #4caf50;
            /* Cambia el borde cuando se enfoca el campo */
        }

        input[type="submit"] {
            /* Estilos para el botón de enviar */
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Productos</h1>
        <form action="productos.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" required><br>

            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" required></textarea><br>

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" required><br>

            <input type="submit" name="submit" value="Registrar">
        </form>

        <hr> <!-- Separador entre el formulario y la tabla de productos -->

        <h2>Productos Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se debería insertar dinámicamente los productos desde la base de datos -->
                <!-- Se recomienda usar PHP para obtener y mostrar los productos registrados -->
                <?php

if(isset($_POST['submit'])){

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    //Conectar a la base de datos
    $con = mysqli_connect("localhost", "root", "", "productos");

    //Verificar la conexión
    if (mysqli_connect_errno()) {
        echo "Error: " . $con->connect_error;
    }

    //Insertar los datos en la base de datos
    $sql = "INSERT INTO productos (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', '$precio')";

    if ($con->query($sql) === TRUE) {
        echo "Producto registrado correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }

    //Cerrar la conexión
    $con->close();

}

?>
                <?php
                // Tu código PHP para conectarte a la base de datos y obtener los productos
                // Debes reemplazar estas líneas con tu lógica de consulta a la base de datos
                $con = mysqli_connect("localhost", "root", "", "productos");
                $sql = "SELECT * FROM productos";
                $result = mysqli_query($con, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['descripcion'] . "</td>";
                    echo "<td>" . $row['precio'] . "</td>";
                    echo "<td class='action'>
                            <a href='actualizar.php?id=" . $row['id'] . "'>Modificar</a>
                            <a href='eliminar.php?id=" . $row['id'] . "'>Eliminar</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>