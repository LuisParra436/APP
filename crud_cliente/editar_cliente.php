<?php
include("conexion.php");

$id = $_GET["id"];
$resultado = $conexion->query("SELECT * FROM cliente WHERE id = $id");
$fila = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $email = $_POST["correo"];
    $telefono = $_POST["tele"];

    $stmt = $conexion->prepare("UPDATE cliente SET fullname=?, correo=?, tele=? WHERE id=?");
    $stmt->bind_param("sssi", $fullname, $email, $telefono, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario actualizado'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    <input type="text" name="fullname" value="<?php echo $fila['fullname']; ?>" required>
    <input type="email" name="correo" value="<?php echo $fila['correo']; ?>" required>
    <input type="number" name="tele" value="<?php echo $fila['tele']; ?>" required>
    <button type="submit">Actualizar</button>
</form>