<?php
session_start();
include("conexion.php");

// Verificamos que venga el ID por GET
if (!isset($_GET["id"])) {
    die("Error: ID no especificado.");
}

$id = intval($_GET["id"]); // Sanitizamos el ID como número entero

// Preparamos y ejecutamos la consulta para obtener los datos del usuario
$stmt = $conexion->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();

// Verificamos si el usuario existe
if ($resultado->num_rows === 0) {
    die("Error: Usuario no encontrado.");
}

$fila = $resultado->fetch_assoc();

// Si se envió el formulario (POST), procesamos la actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["usersname"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $password = $_POST["password"];
    $id_cargo = $_POST["id_cargo"];

    $update = $conexion->prepare("UPDATE users SET fullname = ?, usersname = ?, telefono = ?, direccion = ?, password = ?, id_cargo = ? WHERE id = ?");
    $update->bind_param("ssssssi", $fullname, $username,$telefono,$direccion,$password,$id_cargo, $id);

    if ($update->execute()) {
        echo "<script>alert('Usuario actualizado correctamente'); window.location='../secciones/admin/usuarios.php';</script>";
        exit();
    } else {
        echo "Error en la actualización: " . $update->error;
    }
}
?>

<!-- Formulario para editar -->
<form method="POST">
    <input type="text" name="fullname" value="<?php echo htmlspecialchars($fila['fullname']); ?>" required>
    <input type="email" name="usersname" value="<?php echo htmlspecialchars($fila['usersname']); ?>" required>
    <input type="tel" name="telefono" value="<?php echo htmlspecialchars($fila['telefono']); ?>" required>
    <input type="text" name="direccion" value="<?php echo htmlspecialchars($fila['direccion']); ?>" required>
    <input type="password" name="password" placeholder="Nueva contraseña (dejar en blanco si no se desea cambiar)">
    <select name="id_cargo" required>
        <option value="" disabled>Seleccione un cargo</option>
        <option value="1" <?php if ($fila['id_cargo'] == 1) echo 'selected'; ?>>Admin</option>
        <option value="2" <?php if ($fila['id_cargo'] == 2) echo 'selected'; ?>>Usuario</option>
    </select>
    <br><br>
    <button type="submit">Actualizar</button>
</form>
