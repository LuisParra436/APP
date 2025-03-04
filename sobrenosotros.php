<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  
    <title>Catálogo de Arepas</title>
</head>
<body>


<?php include('./templates/cabecera.php');?>

  
    <script>
        function toggleMenu() {
            document.querySelector(".nav-links").classList.toggle("active");
        }
    </script>
        <br>
        <h2>SOBRE NOSOTROS</h2>
    
        
        <center><div class="contenedor-principal">
        <div class="contenedor">
            <h2>Misión</h2>
            <p>Brindar a nuestros clientes arepas frescas, nutritivas y de calidad superior, elaboradas con los mejores ingredientes
                 y con un proceso que respeta la tradición. Nos esforzamos por innovar y mantener la excelencia en cada producto, 
                 garantizando una experiencia deliciosa en cada bocado.</p>
        </div>

        <div class="contenedor">
            <h2>Visión</h2><br>
            <p>Ser la marca líder en la producción y distribución de arepas a nivel nacional e internacional, expandiendo nuestra tradición y sabor
                a nuevos mercados. Queremos ser reconocidos por nuestro compromiso con la calidad, la innovación y el amor por la cocina artesanal.</p>
        </div>
        <div class="contenedor">
            <h2>Historia</h2>
            <p> En Arepas El Dorado, llevamos 15 años llevando el auténtico sabor de la tradición a cada mesa. Fundada con la pasión
                por la gastronomía artesanal, nuestra empresa nació con un propósito claro: ofrecer arepas de la más alta calidad,
                elaboradas con ingredientes frescos y naturales, respetando las recetas tradicionales que han pasado de generación 
                en generación.
                Desde nuestros inicios, hemos trabajado con dedicación para convertirnos en un referente en el mundo de las arepas, destacándonos por
                nuestro compromiso con el sabor, la calidad y la satisfacción de nuestros clientes.
                </p>
        </div>

        <div class="contenedor">
            <h2>Valores</h2><br>
            <p>
             Calidad: Seleccionamos los mejores ingredientes para ofrecer productos excepcionales.<br>
             Tradición: Respetamos las recetas auténticas que han sido parte de nuestra cultura por generaciones.<br>
             Compromiso: Trabajamos con pasión para ofrecer el mejor servicio y satisfacción a nuestros clientes.<br>
             Innovación: Buscamos mejorar continuamente nuestros procesos y productos sin perder nuestra esencia.<br>

            </p>
        </div>
    </div></center>
        <br><br>

        <?php include('./templates/pie.php');?>

</body>
</html>
