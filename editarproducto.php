<?php
require_once "clases/conexion.php";
require_once "clases/metodoscrud.php";
include "includes/navAdmin.php";

class EditarProducto {
    private $metodoscrud;

    public function __construct() {
        $this->metodoscrud = new metodoscrud();
    }

    public function obtenerProducto($id) {
        return $this->metodoscrud->obtenerProductoPorId($id);
    }
}

// Obtener ID del producto
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Error: ID no especificado.");
}

$id = $_GET['id'];

$editor = new EditarProducto();
$producto = $editor->obtenerProducto($id);

if (!$producto) {
    die("Error: Producto no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="css/footer.css">
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
    <h1>Editar Producto</h1>
    <div class="form-container">
        <form action="procesos/actualizarproducto.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
            <input type="hidden" name="foto_actual" value="<?php echo $producto['foto']; ?>">

            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>

            <label>Descripción:</label>
            <input type="text" name="descripcion" value="<?php echo $producto['descripcion']; ?>" required>

            <label>Precio:</label>
            <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" required>

            <label>Precio con Descuento:</label>
            <input type="text" name="preciodescuento" value="<?php echo $producto['preciodescuento']; ?>" required>

            <label>Unidades:</label>
            <input type="number" name="unidades" value="<?php echo $producto['unidades']; ?>" required>

            <div class="foto-section">
                <label>Foto Actual:</label><br>
                <?php if (!empty($producto['foto'])): ?>
                    <img src="Img/<?php echo $producto['foto']; ?>" alt="Foto del producto"><br>
                <?php else: ?>
                    <p>No hay foto disponible</p>
                <?php endif; ?>

                <label>Nueva Foto:</label>
                <input type="file" name="foto">
            </div>

            <input type="submit" value="Actualizar Producto">
        </form>

        <div class="form-footer">
            <a href="productosadmin.php">Volver a la lista de productos</a>
        </div>
    </div>
    <?php 
    include "includes/footer.php"
    ?>
</body>
</html>
