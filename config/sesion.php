<?php
session_start(); // Inicia la sesión

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login.php"); // Redirige si no hay sesión activa
    exit();
}
?>
