<?php
include("conexion.php");

$id = $_GET["id"];
$resultado = $conexion->query("SELECT * FROM users WHERE id = $id");
$fila = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["usersname"];

    $stmt = $conexion->prepare("UPDATE users SET fullname=?, usersname=? WHERE id=?");
    $stmt->bind_param("ssi", $fullname, $username, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario actualizado'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    <input type="text" name="fullname" value="<?php echo $fila['fullname']; ?>" required>
    <input type="email" name="usersname" value="<?php echo $fila['usersname']; ?>" required>
    <button type="submit">Actualizar</button>
</form>
