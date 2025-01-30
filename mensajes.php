<?php
include_once 'clases/metodoscrud.php';

$metodoscrud = new metodoscrud();

$contacto = $metodoscrud->mostrarContacto();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Ver Mensajes</title>
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

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            justify-items: center;
            height:100px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            height: 250px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-content {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: rgb(114, 173, 229);
            margin: 0;
        }

        .card-description {
            width: 100%;
            font-size: 1rem;
            color: #555;
            margin: 10px 0;
            min-height: 110px;
            overflow-wrap: break-word;
        }

        .card-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .card-footer {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin-top: 15px;
        }

        .card-footer a {
            text-decoration: none;
            color: rgb(114, 173, 229);
            font-weight: bold;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        .no-products {
            text-align: center;
            font-size: 1.2rem;
            color: #888;
        }
    </style>
</head>
<body>
    <?php include 'includes/navexcel.php' ?>
    <h1>Gestion De Mensaje</h1>

    <?php if (empty($contacto)): ?>
        <p class="no-products">No hay mensajes disponibles en la base de datos.</p>
    <?php else: ?>
        <div class="card-container">
            <?php foreach ($contacto as $contactos): ?>
                <div class="card">
                    <div class="card-content">
                        <h2 class="card-title"><?php echo $contactos['remitente']; ?></h2>
                        <p class="card-description">Mensaje: <?php echo $contactos['mensaje']; ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="procesos/eliminarcontacto.php?id=<?php echo $contactos['id']; ?>">Eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>
</html>