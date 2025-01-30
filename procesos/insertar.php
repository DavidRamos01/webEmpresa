<?php
class GestorProductos {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $baseDatos) {
        // Conexión a la base de datos
        $this->conexion = new mysqli($host, $usuario, $contrasena, $baseDatos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function obtenerProductos() {
        // Obtener productos desde la base de datos
        $query = "SELECT * FROM productos";
        $result = $this->conexion->query($query);

        $productos = array();
        while ($row = $result->fetch_assoc()) {
            $producto = new Producto($row['id'], $row['nombre'], $row['descripcion'], $row['precio'], $row['preciodescuento'], $row['unidades'], $row['foto']);
            $productos[] = $producto;
        }

        return $productos;
    }

    // Insertar un producto
    public function insertarProducto($nombre, $descripcion, $precio,$preciodescuento,$unidades,$foto) {
        // Preparar la consulta de inserción
        $query = "INSERT INTO productos (nombre, descripcion, precio, imagen) VALUES (?, ?, ?, ?)";

        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param('ssds', $nombre, $descripcion, $precio, $imagen); // 'ssds' son los tipos de datos: string, string, decimal, string
        $stmt->execute();

        // Comprobar si la inserción fue exitosa
        if ($stmt->affected_rows > 0) {
            echo "Producto insertado correctamente.";
        } else {
            echo "Error al insertar el producto.";
        }

        $stmt->close();
    }

    // Otros métodos para gestionar productos...
}
?>