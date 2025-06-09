<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<header>
        <img src="../src/logo.png" class="logo">   <br>  <h1>AREPAS EL DORADO</h1>
    </header>
    <div class="cuadro-usuario">
    <h2>👤<?php echo htmlspecialchars($_SESSION['fullname']); ?></h2> <?php echo htmlspecialchars($_SESSION['tipo_cargo']); ?> </div>
    <br><br><br>
      <nav class="navbar">
        <div class="menu-icon" onclick="toggleMenu()"></div>
        <ul class="nav-links">
            <li><a href="./">Inicio</a></li>
            <li><a href="operaciones.php">Operaciones</a></li>
            <li><a href="vista_productos.php">Productos</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
            <li><a href="../logaut/index.php">Salir</a></li>
        </ul>
    </nav>
    <br><br><br>
<body>

<main>
        <article>
                <h2>Usuarios</h2>
                <br>
                <table class="tabla-inventario">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>cargo</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Acciones</th>
                    </tr><br>   
                    <?php
                    include '../config/conexion.php';
                    $sql = "SELECT * FROM users";
                    $resultado = mysqli_query($conexion, $sql); 
                    if (mysqli_num_rows($resultado) > 0) {
                        while ($fila = mysqli_fetch_assoc($resultado)) {
                            echo "<tr>";
                            echo "<td>" . $fila['id'] . "</td>";
                            echo "<td>" . $fila['fullname'] . "</td>";
                            echo "<td>" . $fila['usersname'] . "</td>";
                            echo "<td>" . $fila['id_cargo'] . "</td>";
                            echo "<td>" . $fila['telefono'] . "</td>";
                            echo "<td>" . $fila['direccion'] . "</td>";
                            echo "<td>
            <a href='../crud/editar.php?id=" . $fila['id'] . "' class='btn-editar'>Editar</a>
            <a href='../crud/eliminar.php?eliminar=" . $fila['id'] . "' class='btn-eliminar' onclick=\"return confirm('¿Estás seguro de eliminar este usuario?')\">Eliminar</a>
          </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No hay usuarios disponibles</td></tr>";
                    }
                    ?>
                </table>



                <h2>Usuario Nuevo</h2>
    
    <table class="tabla-operaciones">
        
        <tr>
            <td><a href="../crud/crear.php">Agregar Usuario</a></td>
        </tr>
        
    </table>
    <br>
        </article>

        
</main>


    
</body>
<footer>

        📍 Dirección: Calle 76 A # 78 C 42 SUR, Bogotá | 📞 Teléfono: 3046074611 | ✉ Email: arepas.eldorado001@hotmail.com
</footer>
</html>