<?php
include("../config/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["usersname"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $cargo = $_POST["cargo"];

    $stmt = $conexion->prepare("INSERT INTO users (fullname, usersname, password,cargo) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $fullname, $username, $password, $cargo);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    <input type="text" name="fullname" placeholder="Nombre de usuario" required>
    <input type="email" name="usersname" placeholder="Correo electrónico" required>
    <input type="password" name="password" placeholder="Contraseña" required>

    <select name="cargo" required>
    <option value="" disabled selected>Seleccione un cargo</option>
    <option value="Admin">Administrador</option>
    <option value="Usuario">Usuario</option>
    
</select>

    <button type="submit">Registrar</button>
</form>
