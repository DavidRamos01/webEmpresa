<?php

include_once 'clases/metodoscrud.php';
include_once 'includes/navAdmin.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $preciodescuento = $_POST['preciodescuento'];
    $unidades = $_POST['unidades'];

    function subirImagen($archivo) {
        $directorioDestino = 'Img/';  
    
        $nombreArchivo = basename($archivo['name']);
    
        $rutaDestino = $directorioDestino . $nombreArchivo;
    
        $tipoArchivo = strtolower(pathinfo($rutaDestino, PATHINFO_EXTENSION));
    
        $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
    
        if (!in_array($tipoArchivo, $tiposPermitidos)) {
            die('Error: Solo se permiten imágenes JPG, JPEG, PNG y GIF.');
        }
    
        if ($archivo['size'] > 2 * 1024 * 1024) { 
            die('Error: El archivo es demasiado grande. El tamaño máximo permitido es 2MB.');
        }
        if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
            return $nombreArchivo; 
        } else {
            die('Error: No se pudo subir el archivo.');
        }
    }

    $nombreImagen = subirImagen($_FILES['foto']);  


    $metodoscrud = new metodoscrud();

    $metodoscrud->insertarProducto($nombre, $descripcion, $precio, $preciodescuento, $unidades, $nombreImagen);

    header('Location: productosadmin.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            font-size: 2.5rem;
            color: rgb(114, 173, 229);
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .form-container label {
            font-size: 1rem;
            color: #333;
            margin-bottom: 8px;
        }

        .form-container input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="file"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 1rem;
        }

        .form-container input[type="submit"] {
            background-color: rgb(114, 173, 229);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: rgb(45, 98, 154);
        }

        .form-container img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .form-container .foto-section {
            text-align: center;
        }

        .form-container .foto-section p {
            color: #888;
        }

        .form-container .form-footer {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .form-footer a {
            text-decoration: none;
            color: rgb(114, 173, 229);
            font-weight: bold;
            margin-left: 15px;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h1>Insertar un nuevo producto</h1>

    <div class="form-container">
        <form action="anadirproducto.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre del Producto:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>

            <label for="descripcion">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" required></input><br><br>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required><br><br>

            <label for="preciodescuento">Precio con Descuento:</label>
            <input type="number" id="preciodescuento" name="preciodescuento" step="0.01" required><br><br>

            <label for="unidades">Unidades Disponibles:</label>
            <input type="number" id="unidades" name="unidades" required><br><br>

            <div class="foto-section">
                <label for="imagen">Imagen (JPG, JPEG, PNG, GIF):</label>
                <input type="file" id="foto" name="foto" required><br><br>
            </div>

            <input type="submit" value="Insertar Producto">
        </form>

        <div class="form-footer">
            <a href="productosadmin.php">Regresar a la lista de productos</a>
        </div>
    </div>
</body>
<?php include_once 'includes/footer.php'; ?>
</html>
