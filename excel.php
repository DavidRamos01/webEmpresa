<?php
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=Mensajes.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    include_once "clases/metodoscrud.php";
    $metodoscrud = new metodoscrud();
    $contacto = $metodoscrud->mostrarContacto(); 
?>

<table border="1">
    <thead>
        <tr>
            <th>ID mensaje</th>
            <th>Remitente</th>
            <th>Mensaje</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($contacto as $contactos) {
        ?>
            <tr>
                <td><?php echo utf8_decode($contactos["id"]); ?></td>
                <td><?php echo utf8_decode($contactos["remitente"]); ?></td>
                <td><?php echo utf8_decode($contactos["mensaje"]); ?></td>
            </tr>
        <?php
            }
        ?>
    </tbody>
</table>
