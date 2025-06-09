
<?php
session_start();
if (!isset($_SESSION['usersname'])) {
    // Si la sesión no está iniciada, redirigir al usuario a la página de inicio de sesión
    header("Location: ../../logaut/index.php");
    exit();
}
?>


<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        
        
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="../../style.css">
      
    </head>

    <header>
        <img src="../../src/logo.png" class="logo">   <br>  <h1>AREPAS EL DORADO</h1>
    </header>
    <div class="cuadro-usuario">
    <h2>👤<?php echo htmlspecialchars($_SESSION['fullname']); ?></h2> <?php echo htmlspecialchars($_SESSION['tipo_cargo']); ?> </div>
    <br><br><br>
<body>
    
    <nav class="navbar">
        <div class="menu-icon" onclick="toggleMenu()"></div>
        <ul class="nav-links">
            <li><a href="./">Inicio</a></li>
            <li><a href="operaciones.php">Operaciones</a></li>
            <li><a href="productos.php">Productos</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
            <li><a href="../../logaut/index.php">Salir</a></li>
        </ul>
    </nav>
    <br><br><br>

   <main> 
<article>


    <h2>inventario de productos</h2>
            <br>
                    <table class="tabla-inventario">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            
                        </tr><br>   
                        <?php
                        include '../../config/conexion.php';
                        $sql = "SELECT inventario_total.*, producto.nombre AS nombre_producto FROM inventario_total 
                        INNER JOIN producto ON inventario_total.id_producto = producto.id";
    
                        $resultado = mysqli_query($conexion, $sql); 
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $fila['id_producto'] . "</td>";
                                echo "<td>" . $fila['nombre_producto'] . "</td>";
                                echo "<td>" . $fila['cantidad'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No hay productos disponibles</td></tr>";
                        }
                        mysqli_close($conexion);
                        ?>
                    </table>
                    <br> 

                     <h2>caja diaria</h2>

    <table class="tabla-caja">
        <tr>
            <th>Fecha</th>
            <th>Usuario</th>
            <th>Venta efectivo</th>
            <th>Venta credito</th>
            <th>Gastos de usuario</th>
        </tr>
        <?php
        include '../../config/conexion.php';
        $sql = "SELECT * FROM caja_diaria ORDER BY fecha DESC";
        $resultado = mysqli_query($conexion, $sql); 
        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['fecha'] . "</td>";
                echo "<td>" . $fila['id_users'] . "</td>";
                echo "<td>" . $fila['id_venta_efectivo'] . "</td>";
                echo "<td>" . $fila['id_venta_credito'] . "</td>";
                echo "<td>" . $fila['id_gastos_users'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No hay registros de caja</td></tr>";
        }
        mysqli_close($conexion);
        ?>
        </table>


                    <h2>clientes</h2>
                    <br>
                    <table class="tabla-clientes">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Saldo pendiente</th>
                        </tr><br>   
                        <?php
                        include '../../config/conexion.php';
                        $sql = "SELECT * FROM cliente";
                        $resultado = mysqli_query($conexion, $sql); 
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $fila['id'] . "</td>";
                                echo "<td>" . $fila['fullname'] . "</td>";
                                echo "<td>" . $fila['correo'] . "</td>";
                                echo "<td>" . $fila['tele'] . "</td>";
                                echo "<td>" . $fila['deuda'] .  "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay clientes registrados</td></tr>";
                        }
                        mysqli_close($conexion);
                        ?>
                        </table>
                    
</article>
<aside>

        <h2>inventario de Cambios</h2>
            <br>
                    <table class="tabla-inventario">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cambios</th>
                            
                        </tr><br>   
                        <?php
                        include '../../config/conexion.php';
                        $sql = "SELECT inventario_total.id_producto, producto.nombre AS nombre_producto, inventario_total.id_cambio 
                        FROM inventario_total 
                        INNER JOIN producto ON inventario_total.id_producto = producto.id";
    
                        $resultado = mysqli_query($conexion, $sql); 
                        if (mysqli_num_rows($resultado) > 0) {
                            while ($fila = mysqli_fetch_assoc($resultado)) {
                                echo "<tr>";
                                echo "<td>" . $fila['id_producto'] . "</td>";
                                echo "<td>" . $fila['nombre_producto'] . "</td>";
                                echo "<td>" . $fila['id_cambio'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No hay productos disponibles</td></tr>";
                        }
                        mysqli_close($conexion);
                        ?>
                    </table>
                    <br> 


    
</aside><br>
            

</main>
        
  
        
</body>   
    
<footer>

        📍 Dirección: Calle 76 A # 78 C 42 SUR, Bogotá | 📞 Teléfono: 3046074611 | ✉ Email: arepas.eldorado001@hotmail.com
</footer>


     
</html>
