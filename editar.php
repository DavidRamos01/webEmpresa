<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        require_once "clases/conexion.php";
        require_once "clases/metodoscrud.php";
    ?>

    <h1>Insertar nuevo Registro</h1>
    <form action="procesos/actualizar.php" method="POST" enctype="multipart/form-data">
    <?php
        $id = $_GET['id'];
        $objeto = new metodos();
        $sql = "SELECT * FROM slider WHERE id = '$id'";
        $datos = $objeto->mostrarDatos($sql);
        foreach ($datos as $key) {
            echo "<input type='hidden' name='id' value='" . $key['id'] . "'>";
            echo "<input type='hidden' name='foto_actual' value='" . $key['foto'] . "'>";
            echo "<input type='file' name='foto'>";
        }
    ?>
    <input type="submit" value="Actualizar registro">
</form>
    
    
    
</body>
</html>