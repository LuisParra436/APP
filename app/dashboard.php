<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        
        
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <link rel="stylesheet" href="../public/css/style.css">
      
    </head>
<body>
<header>
    <img src="../public/img/logo.png" class="logo">   <br>  <h1>AREPAS EL DORADO</h1>
    </header>
    <br><br><br>

    <nav>
    <nav class="navbar">
       
       <div class="menu-icon" onclick="toggleMenu()"></div>
       <ul class="nav-links">

                <li><a href="dashboard.php">Home  </a></li>
                <li><a href="operaciones.php">opéraciones</a></li>
                <li><a href="views/productos/inventario.php">  productos </a></li>
                <li><a href="views/usuarios/listar.php">   usuarios </a></li>
                <li><a href="../public/index.php">salir  </a>
       </ul>
   </nav>
   <script>
       function toggleMenu() {
           document.querySelector(".nav-links").classList.toggle("active");
       }
   </script>
    </nav>


    <table class="inventario">
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>Mouse Logitech</td>
            <td>Electrónica</td>
            <td>50</td>
            <td>$25.99</td>
            <td>
                <button class="editar">Editar</button>
                <button class="eliminar">Eliminar</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Teclado Mecánico</td>
            <td>Electrónica</td>
            <td>30</td>
            <td>$49.99</td>
            <td>
                <button class="editar">Editar</button>
                <button class="eliminar">Eliminar</button>
            </td>
        </tr>
    </tbody>
</table>




   
            
    </body> <br><br><br>         
    
    
</html>
