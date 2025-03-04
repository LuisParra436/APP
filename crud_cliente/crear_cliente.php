<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["correo"];
    $telefono = $_POST["tele"];

    $stmt = $conexion->prepare("INSERT INTO cliente (fullname, correo,tele) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $email, $telefono);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    <input type="text" name="fullname" placeholder="Nombre de usuario" required>
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="number" name="tele" placeholder="Telefono" required>

    <button type="submit">Registrar</button>
</form>
