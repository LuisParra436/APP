<?php
// Datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Correo al que quieres enviar
$para = "luis.parra11@outlook.com";

// Asunto del correo
$asunto = "Nuevo mensaje de sugerencia";

// Construir el cuerpo del mensaje
$contenido = "Nombre: $nombre\n";
$contenido .= "Correo: $email\n";
$contenido .= "Mensaje:\n$mensaje";

// Encabezados (cabeceras)
$cabeceras = "From: $email";

// Enviar correo
if (mail($para, $asunto, $contenido, $cabeceras)) {
    echo "Gracias por tu mensaje. ¡Fue enviado con éxito!";
} else {
    echo "Error: No se pudo enviar el mensaje.";
}
?>
