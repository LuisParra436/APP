<?php
include("conexion.php");
$resultado = $conexion->query("SELECT * FROM productos");
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre de Producto</th>
        <th>Precio</th>
        
    </tr>
    <?php while ($fila = $resultado->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila["id"]; ?></td>
            <td><?php echo $fila["fullname"]; ?></td>
            <td><?php echo $fila["precio"]; ?></td>
            <td>
                <a href="editar_productos.php?id=<?php echo $fila['id']; ?>">Editar</a> |
                <a href="eliminar_productos.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar usuario?');">Eliminar</a>
            </td>
        </tr>
    <?php } ?>
</table>
