<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">  
    <title>Contactanos</title>
</head>
<body>
<?php include('./templates/cabecera.php');?>



        <div class="info-empresa">
            <h2>Información de la Empresa</h2>
            <p><strong>Nombre:</strong> Arepas El Dorado</p>
            <p><strong>Teléfono:</strong> +57 123 456 7890</p>
            <p><strong>Email:</strong> contacto@eldorado.com</p>
            <p><strong>Dirección:</strong> Calle 123, Bogotá, Colombia</p>
        </div>

        <div class="ubicacion">
            <h2>Ubicación</h2>
                <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d497.1156218336022!2d-74.2061381419733!3d4.607452926694905!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sus!4v1741060879098!5m2!1ses!2sus" 
                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
            </iframe>
            
        </div>

        <div class="redes-sociales">
            <h2>Redes Sociales</h2>
                    <div class="social-links">
                    <a href="https://wa.me/573046074611" target="_blank">
                    <img src="src/redes/whatsapp.png" alt="WhatsApp">
                </a>
                <a href="https://www.facebook.com/people/Arepas-el-Dorado/100068605943488/" target="_blank">
                    <img src="src/redes/facebook.png" alt="Facebook">
                </a>
                <a href="https://www.instagram.com/arepaseldorado/#" target="_blank">
                    <img src="src/redes/instagram.png" alt="Instagram">
                </a>
            </div>
        </div>

        <div class="formulario">
            <h2>Déjanos tu mensaje</h2>
            <form action="procesar_mensaje.php" method="POST">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>

                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>

                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

                <button type="submit">Enviar</button>
            </form>
        </div>

    <br>
<?php include('./templates/pie.php');?>
</body>
</html>