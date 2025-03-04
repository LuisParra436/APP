<?php
include("conexion.php");

$id = $_GET["id"];
$resultado = $conexion->query("SELECT * FROM productos WHERE id = $id");
$fila = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $precio = $_POST["precio"];

    $stmt = $conexion->prepare("UPDATE productos SET fullname=?, precio=? WHERE id=?");
    $stmt->bind_param("ssi", $fullname, $precio, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Producto actualizado'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="POST">
    <input type="text" name="fullname" value="<?php echo $fila['fullname']; ?>" required>
    <input type="number" name="precio" step="0.01" min="0" placeholder="0.00" value="<?php echo $fila['precio']; ?>" required>
    <button type="submit">Actualizar Producto</button>
</form>