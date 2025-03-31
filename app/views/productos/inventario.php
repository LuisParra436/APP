<?php
require './../../controllers/InventarioController.php';
$inventario = new InventarioController();
$productos = $inventario->obtenerProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inventario</title>
    <link rel="stylesheet" href="../../../public/css/style.css">
</head>
<body>
<header>
    <img src="../../../public/img/logo.png" class="logo">   <br>  <h1>AREPAS EL DORADO</h1>
    </header>
    <br><br><br>

    <center><h1>Inventario de Productos</h1></center>
    <table border="1" class="tabla-inventario">
        <tr>
            
            <th>Producto</th>
            <th>Cantidad</th>
           
        </tr>
        <?php while ($fila = $productos->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $fila["nombre"]; ?></td>
            <td><?php echo $fila["cantidad"]; ?></td>
            
            
        </tr>
        <?php } ?>
    </table>
</body>
</html>
