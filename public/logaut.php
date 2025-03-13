<?php
session_start();
session_destroy();
header("Location: index.php"); // Redirige al usuario a la página de inicio
exit();
?>
