<?php
class Producto {
    public $nombre;
    public $descripcion;
    public $precio;
    public $preciodescuento;
    public $unidades;
    public $foto;

    public function __construct($nombre, $descripcion, $precio, $preciodescuento, $unidades, $foto) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->preciodescuento = $preciodescuento;
        $this->unidades = $unidades;
        $this->foto = $this->procesarFoto($foto);
    }

    private function procesarFoto($foto) {
        if (is_array($foto)) {
            if (isset($foto['name']) && $foto['error'] === UPLOAD_ERR_OK) {
                // Si la foto tiene nombre y no hay errores en la subida, procesarla
                return basename($foto['name']); // Retorna solo el nombre del archivo
            } else {
                // Manejo de errores
                switch ($foto['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        return "Error: El archivo es demasiado grande.";
                    case UPLOAD_ERR_PARTIAL:
                        return "Error: El archivo solo se subió parcialmente.";
                    case UPLOAD_ERR_NO_FILE:
                        return "Error: No se subió ningún archivo.";
                    case UPLOAD_ERR_NO_TMP_DIR:
                        return "Error: Falta la carpeta temporal en el servidor.";
                    case UPLOAD_ERR_CANT_WRITE:
                        return "Error: Falló al escribir el archivo en el disco.";
                    case UPLOAD_ERR_EXTENSION:
                        return "Error: Una extensión de PHP detuvo la carga del archivo.";
                    default:
                        return "Error desconocido.";
                }
            }
        } elseif (is_string($foto) && !empty($foto)) {
            // Si se recibe un nombre de archivo directamente
            return $foto;
        }
        return ""; // Si no hay foto subida, retornar cadena vacía
    }
}

?>
