<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <title>Document</title>
</head>
<header>
        <img src="../../src/logo.png" class="logo">   <br>  <h1>AREPAS EL DORADO</h1>
    </header>
    <div class="cuadro-usuario">
    <h2>👤<?php echo htmlspecialchars($_SESSION['fullname']); ?></h2> <?php echo htmlspecialchars($_SESSION['tipo_cargo']); ?></div>
    <br><br><br>
      <nav class="navbar">
        <div class="menu-icon" onclick="toggleMenu()"></div>
        <ul class="nav-links">
            <li><a href="./">Inventario</a></li>
            <li><a href="operaciones.php">Operaciones</a></li>
            <li><a href="vista_productos.php">traslados</a></li>
            <li><a href="usuarios.php"></a>terminar jornada</li>
            <li><a href="../logaut/index.php">Cerrar sesión</a></li>
        </ul>
    </nav>
    <br><br><br>
<body>

<main>
        <article>
    <h2>Inventario de 👤<?php echo htmlspecialchars($_SESSION['fullname']); ?></h2>

        <table>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
        </table>
        <table class="tabla-inventario">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            
                        </tr><br>   
                        <?php
                        include '../../config/conexion.php';
                        $sql = "SELECT inventario_users.*, producto.nombre AS nombre_producto, users.fullname AS nombre_usuario 
                        FROM inventario_users 
                        INNER JOIN producto ON inventario_users.id_producto = producto.id
                        INNER JOIN users ON inventario_users.id_user = users.id";
    
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

              
        </article>

        <aside>
            
    
    
        </aside>

</main>


    
</body>
<footer>

        📍 Dirección: Calle 76 A # 78 C 42 SUR, Bogotá | 📞 Teléfono: 3046074611 | ✉ Email: arepas.eldorado001@hotmail.com
</footer>
</html>