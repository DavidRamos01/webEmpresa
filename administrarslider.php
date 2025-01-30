<?php
include 'clases/conexion.php';
include 'clases/slider.php';

// Ruta de la carpeta donde se almacenan las imágenes
define('CARPETA_IMAGENES', 'imagenes_slider/');

// Crear la carpeta si no existe
if (!is_dir(CARPETA_IMAGENES)) {
    mkdir(CARPETA_IMAGENES, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $foto = $_FILES['foto'];

        // Comprobar si el archivo ha sido subido correctamente
        if ($foto['error'] == 0) {
            // Comprobar si el archivo es una imagen válida
            $extensiones_validas = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));

            if (in_array($ext, $extensiones_validas)) {
                // Generar un nombre único para la imagen
                $nuevo_nombre = uniqid() . '.' . $ext;
                $ruta_destino = CARPETA_IMAGENES . $nuevo_nombre;

                // Subir la imagen
                if (move_uploaded_file($foto['tmp_name'], $ruta_destino)) {
                    // Actualizar el slider con la nueva imagen
                    $slider = new Slider($nuevo_nombre);
                    $slider->actualizarSlider($id);
                } else {
                    echo 'Error al subir la imagen.';
                }
            } else {
                echo 'Formato de archivo no válido. Solo se permiten imágenes JPG, PNG, o GIF.';
            }
        } else {
            echo 'Error al subir el archivo.';
        }
    }
}

// Obtener todos los sliders (imágenes)
$sliders = Slider::obtenerSliders();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Slider</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
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
            text-align: center;
            font-size: 2.5rem;
            color: rgb(114, 173, 229);
            margin-bottom: 30px;
        }

        .container {
            background-color: white;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 80%;
            max-width: 900px;
        }

        .table {
            border-radius: 8px;
            border: none;
            width: 100%;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
        }

        .table th {
            background-color: rgb(114, 173, 229);
            color: white;
        }

        .table td {
            background-color: #fff;
        }

        .btn {
            font-size: 1rem;
            border-radius: 5px;
            padding: 8px 16px;
        }

        .btn-warning {
            background-color: rgb(114, 173, 229);
            color: white;
            transition: background-color 0.3s ease;
        }

        .btn-warning:hover {
            background-color: rgb(114, 173, 229);
        }

        .form-control {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            text-decoration: none;
            color: rgb(114, 173, 229);
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .table img {
            max-width: 100px;
            height: auto;
            object-fit: cover;
        }

        .mt-4 {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Administrar Slider</h1>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sliders as $slider): ?>
                    <tr>
                        <td><?= $slider->getId(); ?></td>
                        <td><img src="<?= CARPETA_IMAGENES . $slider->getFoto(); ?>" alt="Imagen Slider"></td>
                        <td>
                            <!-- Formulario para actualizar la imagen -->
                            <form action="administrarslider.php" method="POST" enctype="multipart/form-data" class="d-inline">
                                <input type="hidden" name="id" value="<?= $slider->getId(); ?>">
                                
                                <!-- Selección de archivo -->
                                <input type="file" name="foto" class="form-control" required>
                                
                                <button type="submit" name="update" class="btn btn-warning btn-sm mt-2">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-footer">
            <a href="indexAdmin.php" class="btn btn-primary">Volver</a>
        </div>
    </div>

</body>
</html>
