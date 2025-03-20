<?php 
require '../../controllers/UsuarioController.php';

require '../../config/conexion.php';

$resultado = $conexion->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css"> 
    <title>usuarios</title>
</head>
<center><body>

<?php include('../../dashboard.php');?> <br><br><br>

<div class="contenedor">
<button class="btn2" onclick="window.location.href='crear.php'">Crear Usuario</button><br><br>


    <table class="tabla-usuarios" border="1">
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
                    <a href="editar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿editar usuario?');">Editar</a><br><br>
                    <a href="eliminar.php?id=<?php echo $fila['id']; ?>" onclick="return confirm('¿Eliminar usuario?');">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<!-- MODAL PARA EDITAR -->
<div id="modalEditar" class="modal">
    <div class="modal-contenido">
        <span class="cerrar" onclick="cerrarModal()">&times;</span>
        <iframe id="iframeEditar" src="/editar.php" frameborder="0"></iframe>
    </div>
</div>

<div id="modalNuevo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar" onclick="cerrarModalNuevo()">&times;</span>
        <iframe id="iframeNuevo" src="crear.php" frameborder="0"></iframe>
    </div>
</div>

<script src="../../js/script.js"></script>
</body></center>
</html>