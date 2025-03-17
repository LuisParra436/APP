<?php
session_start();
session_unset(); // Limpia las variables de sesión antes de destruirla
session_destroy(); // Destruye la sesión
setcookie(session_name(), '', time() - 3600, '/'); // Elimina la cookie de sesión
header("Location: index.php"); // Redirige al usuario a la página de inicio
exit();
?>
