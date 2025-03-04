<?php
include("conexion.php");
$resultado = $conexion->query("SELECT * FROM cliente");
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Cliente</th>
        <th>Correo</th>
        <th>Telefono</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["fullname"]; ?></td>
            <td><?php echo $fila["correo"]; ?></td>
            <td><?php echo $fila["tele"]; ?></td>
            <td>
                <a href="editar_cliente.php?id=<?php echo $fila['id']; ?>">Editar</a> |
                <a href="eliminar_cliente.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar usuario?');">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
