<?php
include_once 'conexion.php';

class metodoscrud
{
    private $conexion;

    public function __construct() {
        $this->conexion = new conexion();
    }

    public function insertarProducto($nombre, $descripcion, $precio, $preciodescuento, $unidades, $foto) {
        $conn = $this->conexion->conectar();

        $query = "INSERT INTO productos (nombre, descripcion, precio, preciodescuento, unidades, foto) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssddis', $nombre, $descripcion, $precio, $preciodescuento, $unidades, $foto);

        if ($stmt->execute()) {
            echo "Producto insertado correctamente.";
        } else {
            echo "Error al insertar el producto: " . $stmt->error;
        }
    }

    public function mostrarProductos() {
        $conn = $this->conexion->conectar();
        $query = "SELECT * FROM productos";
        $result = $conn->query($query);

        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $productos[] = $row;
        }

        $conn->close();
        return $productos;
    }

    public function actualizarProducto($id, $nombre, $descripcion, $precio, $preciodescuento, $unidades, $foto) {
        $conn = $this->conexion->conectar();

        if (!empty($foto)) {
            $query = "UPDATE productos SET nombre=?, descripcion=?, precio=?, preciodescuento=?, unidades=?, foto=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssddisi', $nombre, $descripcion, $precio, $preciodescuento, $unidades, $foto, $id);
        } else {
            $query = "UPDATE productos SET nombre=?, descripcion=?, precio=?, preciodescuento=?, unidades=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssddii', $nombre, $descripcion, $precio, $preciodescuento, $unidades, $id);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerProductoPorId($id) {
        $conn = $this->conexion->conectar();
        $query = "SELECT * FROM productos WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $producto = $result->fetch_assoc();
        $stmt->close();
        $conn->close();
        return $producto;
    }

    public function eliminarProducto($id) {
        $conn = $this->conexion->conectar();

        $query = "DELETE FROM productos WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al eliminar el producto: " . $stmt->error;
        }
    }
    public function login($nombre, $password)
    {
        $conn = $this->conexion->conectar();
        $query = "SELECT id, nombre, contrasena FROM usuarios WHERE nombre = '$nombre'";
        $resultado = $conn->query($query);

        if ($resultado->num_rows == 1) {
            $datosUsuario = $resultado->fetch_assoc();
            if (password_verify($password, $datosUsuario['contrasena'])) {
                return new Usuario($datosUsuario['nombre'], $datosUsuario['password']);
            }
        }
        return null;
    }
public function insertarContacto($remitente, $mensaje) {
        $conexion = $this->conexion->conectar();

        if (!$conexion) {
            die("Error de conexión a la base de datos");
        }

        $remitente = $conexion->real_escape_string($remitente);
        $mensaje = $conexion->real_escape_string($mensaje);

        $sql = "INSERT INTO contacto (remitente, mensaje) VALUES ('$remitente', '$mensaje')";

        if ($conexion->query($sql) === TRUE) {
            echo "Nuevo registro insertado correctamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    }
    public function mostrarContacto() {
        $connn = $this->conexion->conectar();
        $query = "SELECT * FROM contacto";
        $result = $connn->query($query);

        $productos = [];
        while ($row = $result->fetch_assoc()) {
            $contacto[] = $row;
        }

        $connn->close();
        return $contacto;
    }

    public function eliminarContacto($contacto) {
        $conn = $this->conexion->conectar();

        $query = "DELETE FROM contacto WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('i', $contacto);

        if ($stmt->execute()) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al eliminar el producto: " . $stmt->error;
        }
    }
}
