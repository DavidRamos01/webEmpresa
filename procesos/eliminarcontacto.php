<?php
    require_once "../clases/conexion.php";
    require_once "../clases/metodoscrud.php";

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        $metodoscrud = new metodoscrud();
        $metodoscrud->eliminarContacto($id);

        header("Location: ../mensajes.php");
        exit();
    } else {
        echo "ID de producto no válido.";
    }
?>