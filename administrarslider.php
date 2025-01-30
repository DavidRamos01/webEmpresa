<?php
include 'clases/conexion.php';
include 'clases/slider.php';


define('CARPETA_IMAGENES', 'img/');

if (!is_dir(CARPETA_IMAGENES)) {
    mkdir(CARPETA_IMAGENES, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $foto = $_FILES['foto'];

        if ($foto['error'] == 0) {
            $extensiones_validas = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower(pathinfo($foto['name'], PATHINFO_EXTENSION));

            if (in_array($ext, $extensiones_validas)) {
                $nuevo_nombre = uniqid() . '.' . $ext;
                $ruta_destino = CARPETA_IMAGENES . $nuevo_nombre;
                if (move_uploaded_file($foto['tmp_name'], $ruta_destino)) {
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

$sliders = Slider::obtenerSliders();
include 'includes/navAdmin.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar Slider</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <style>
        h1 {
            text-align: center;
            font-size: 2.5rem;
            color: rgb(114, 173, 229);
            margin-bottom: 30px;
            font-weight: 600;
        }

        .card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
            text-align: center;
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-warning {
            background-color: rgb(114, 173, 229);
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 500;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-warning:hover {
            background-color: rgb(93, 150, 211);
        }

        .form-control {
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: rgb(114, 173, 229);
            box-shadow: 0 0 0 0.2rem rgba(114, 173, 229, 0.25);
        }

        .row {
            display: flex;
            justify-content: center;
            gap: 20px;
        }


        .form-footer {
            text-align: center;
            margin-top: 40px;
        }

        .form-footer a {
            text-decoration: none;
            color: rgb(114, 173, 229);
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            text-decoration: underline;
            color: rgb(93, 150, 211);
        }

    </style>
</head>
<body>

    <div class="container mt-5">
        <h1>Administrar Slider</h1>

        <div class="row" id="contendorslider">
            <?php foreach ($sliders as $slider): ?>
                <div class="col-md-3 col-sm-6 col-12"> 
                    <div class="card">
                        <img src="<?= CARPETA_IMAGENES . $slider->getFoto(); ?>" alt="Imagen Slider">
                        <div class="card-body">
                            <h5>ID: <?= $slider->getId(); ?></h5>

                            <form action="administrarslider.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $slider->getId(); ?>">

                                <input type="file" name="foto" class="form-control" required>
                                <button type="submit" name="update" class="btn btn-warning btn-sm mt-2">Actualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



