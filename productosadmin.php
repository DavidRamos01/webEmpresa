<?php
// Incluir las clases necesarias
include_once 'clases/metodoscrud.php';

// Crear una instancia de la clase CRUD
$metodoscrud = new metodoscrud();

// Obtener todos los productos
$productos = $metodoscrud->mostrarProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Productos</title>
    <style>
        /* Estilos Generales */
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
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 100%;
            height: 500px;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
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
            height: auto;
            font-size: 1rem;
            color: #555;
            margin: 10px 0;
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
    <h1>Gestion De Productos</h1>

    <?php if (empty($productos)): ?>
        <p class="no-products">No hay productos disponibles en la base de datos.</p>
    <?php else: ?>
        <div class="card-container">
            <?php foreach ($productos as $producto): ?>
                <div class="card">
                    <?php if (!empty($producto['foto'])): ?>
                        <img src="Img/<?php echo $producto['foto']; ?>" alt="Imagen del producto">
                    <?php else: ?>
                        <img src="Img/default.jpg" alt="Imagen del producto">
                    <?php endif; ?>
                    <div class="card-content">
                        <h2 class="card-title"><?php echo $producto['nombre']; ?></h2>
                        <p class="card-description">Descripcion: <?php echo $producto['descripcion']; ?></p>
                        <p class="card-price">Precio: <?php echo number_format($producto['precio'], 2, ',', '.'); ?>€</p>
                        <p class="card-price">Precio con descuento: <?php echo number_format($producto['preciodescuento'], 2, ',', '.'); ?>€</p>
                        <p class="card-description">Unidades: <?php echo $producto['unidades']; ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="editarproducto.php?id=<?php echo $producto['id']; ?>">Editar</a>
                        <a href="procesos/eliminarproducto.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</body>
</html>
