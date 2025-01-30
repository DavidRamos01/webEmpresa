<?php
require_once "../clases/conexion.php";
require_once "../clases/metodoscrud.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Actualización Producto</title>
    <style>
        /* Estilos Generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            font-size: 2.5rem;
            color: rgb(114, 173, 229);
            margin-top: 50px;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            font-size: 1.2rem;
            margin: 20px 0;
        }

        .error-message {
            background-color: #f44336;
            color: white;
            padding: 15px;
            border-radius: 5px;
            font-size: 1.2rem;
            margin: 20px 0;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            font-size: 1.1rem;
            color: rgb(114, 173, 229);
            text-decoration: none;
            font-weight: bold;
            border: 2px solid rgb(114, 173, 229);
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: rgb(114, 173, 229);
            color: white;
        }
    </style>
</head>
<body>


    <h1>Resultado de la actualizacion</h1>

</body>
<?php
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$preciodescuento = $_POST['preciodescuento'];
$unidades = $_POST['unidades'];
$fotoNombre = $_POST['foto_actual']; // Si no hay nueva imagen, mantenemos la actual

$obj = new metodoscrud();

// Procesar nueva foto si se sube
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $fotoTmp = $_FILES['foto']['tmp_name'];
    $fotoNombre = basename($_FILES['foto']['name']);
    $fotoDestino = "../Img/" . $fotoNombre;

    $permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $tipoArchivo = mime_content_type($fotoTmp);
    $tamanioArchivo = $_FILES['foto']['size'];

    if (!in_array($tipoArchivo, $permitidos)) {
        echo "<div class='error-message'>Error: Solo se permiten imágenes en formato JPEG, PNG, GIF o WebP.</div>";
        echo "<a href='../slideradmin.php' class='back-link'>Regresar</a>";
        exit;
    }

    if ($tamanioArchivo > 2 * 1024 * 1024) {
        echo "<div class='error-message'>Error: El tamaño del archivo no debe superar los 2 MB.</div>";
        exit;
    }
    
    if (!move_uploaded_file($fotoTmp, $fotoDestino)) {
        echo "<div class='error-message'>Error: No se pudo guardar la imagen en el servidor.</div>";
        exit;
    }
}

if ($obj->actualizarProducto($id, $nombre, $descripcion, $precio, $preciodescuento, $unidades, $fotoNombre)) {
    echo "<div class='success-message'>Producto actualizado con éxito.</div>";
    echo "<a href='../productosadmin.php' class='back-link'>Regresar</a>";
} else {
    echo "<div class='error-message'>Fallo al actualizar el producto.</div>";
    echo "<a href='../index.php' class='back-link'>Regresar</a>";
}
?>
</html>
