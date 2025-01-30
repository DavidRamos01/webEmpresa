<?php
    require_once "../clases/conexion.php";
    require_once "../clases/metodoscrud.php";

    $id = $_POST['id'];
    $fotoNombre = isset($_POST['foto_actual']) ? $_POST['foto_actual'] : "";

    $obj = new metodos();

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $fotoTmp = $_FILES['foto']['tmp_name'];
        $fotoNombre = basename($_FILES['foto']['name']);
        $fotoDestino = "../Img/" . $fotoNombre;
    
        $permitidos = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $tipoArchivo = mime_content_type($fotoTmp);
        $tamanioArchivo = $_FILES['foto']['size'];
    
        if (!in_array($tipoArchivo, $permitidos)) {
            echo "Error: Solo se permiten imágenes en formato JPEG, PNG, GIF o WebP.<br>";
            echo "<a href='../slideradmin.php'>Regresar</a>";
            exit;
        }
    
        if ($tamanioArchivo > 2 * 1024 * 1024) {
            echo "Error: El tamaño del archivo no debe superar los 2 MB.<br>";
            exit;
        }
        
        if (!move_uploaded_file($fotoTmp, $fotoDestino)) {
            echo "Error: No se pudo guardar la imagen en el servidor.<br>";
            exit;
        }
    }
    
    $slider = [$id, $fotoNombre];

    if ($obj->actualizarSlider($slider)) {
        echo "Actualizado con éxito";
        echo "<br><a href='../slideradmin.php'>Regresar</a>";
    } else {
        echo "Fallo al actualizar";
        echo "<br><a href='../index.php'>Regresar</a>";
    }
?>