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
    <br><br><br><br>

    <center><h1>Inventario de Productos</h1></center>

    <article>
    <table border="1" class="inventario">
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
    </article>
    <aside>
                
    <h2>Opciones de Inventario</h2>
    <table class="opciones.inventario">
        <tr class="1">
                <td><button class="btn-emergente" id="openModal1">Abrir Modal 1</button></td>
        </tr>
        <tr>
            <td><button class="btn-emergente"  id="openModal2">Abrir Modal 2</button></td>    
        </tr>
        <tr>
            <td><button class="btn-emergente" onclick="abrirModal('eliminarproducto.php')">Eliminar producto</button></td>
        </tr>
        <tr>
            <td><button class="btn-emergente" onclick="abrirModal('modificarproducto.php')">Modificar Prodcutos</button></td>
        </tr>

    </table>
        <h2>Agregar Producto</h2>
        <form action="../../controllers/InventarioController.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            
            <label for="cantidad">Cantidad:</label>
            <input type="number" id="cantidad" name="cantidad" required><br><br>
            
            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" required><br><br>
            
            <label for="vendedor">Vendedor:</label>
            <input type="text" id="vendedor" name="vendedor"><br><br>
            
            <input type="submit" value="Agregar Producto">
        </form>

        <h2>agregar cantidades</h2>
        <form action="../../controllers/InventarioController.php" method="POST">
            <label for="producto">Producto:</label>
            <input type="text" id="producto" name="producto" required><br><br>
            
            <label for="cantidad">Cantidad a agregar:</label>
            <input type="number" id="cantidad" name="cantidad" required><br><br>
            
            <input type="submit" value="Agregar Cantidad">
        </form>

    </aside>
   

    <h2>Eliminar Producto</h2>
    <form action="../../controllers/InventarioController.php" method="POST">
        <label for="id_producto">ID del Producto:</label>
        <input type="number" id="id_producto" name="id_producto" required><br><br>
        
        <input type="submit" value="Eliminar Producto">
    </form>
    <h2>Modificar Producto</h2>
    <form action="../../controllers/InventarioController.php" method="POST">
        <label for="id_producto">ID del Producto:</label>
        <input type="number" id="id_producto" name="id_producto" required><br><br>
        
        <label for="nuevo_precio">Nuevo Precio:</label>
        <input type="number" id="nuevo_precio" name="nuevo_precio" required><br><br>
        
        <input type="submit" value="Modificar Precio">

<!-- MODAL -->
<div id="modal" class="modal">
    <div class="modal-contenido">
        <span class="cerrar" onclick="cerrarModal()">&times;</span>
        <h2>Ventana Emergente</h2>
        <p>Este es un mensaje dentro del modal.</p>
    </div>
</div>
<script>

    // Mostrar el modal correspondiente
    function abrirModal(url) {
        const modal = document.getElementById('modal');
        const modalContent = modal.querySelector('.modal-contenido');
        modalContent.innerHTML = `<span class="cerrar" onclick="cerrarModal()">&times;</span>`;
        fetch(url)
            .then(response => response.text())
            .then(data => {
                modalContent.innerHTML += data;
                modal.style.display = 'flex';
            })
            .catch(error => console.error('Error al cargar el contenido:', error));
    }
document.getElementById('openModal1').addEventListener('click', function() {
  document.getElementById('modal1').style.display = 'block';
});
    function abrirModal() {
        document.getElementById("modal").style.display = "flex";
    }

    function cerrarModal() {
        document.getElementById("modal").style.display = "none";
    }
    window.onclick = function(e) {
    const modal = document.getElementById("modal");
    if (e.target == modal) {
        modal.style.display = "none";
    }
}
</script>



</body>
</html>
