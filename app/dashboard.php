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
                <li><a href="vista_productos.php">  productos </a></li>
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
   
            
    </body> <br><br><br>         
    
    
</html>
