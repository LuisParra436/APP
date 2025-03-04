<?php
include("conexion.php");
$resultado = $conexion->query("SELECT * FROM users");
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Correo</th>
        <th>Cargo</th>
        <th>Acciones</th>
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["fullname"]; ?></td>
            <td><?php echo $fila["usersname"]; ?></td>
            <td><?php echo $fila["cargo"]; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> |
                <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar usuario?');">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
