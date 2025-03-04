<?php
session_start();
$conexion = new mysqli("localhost","root", "", "dorado");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["usuario"];
    $password = $_POST["password"];

    $stmt = $conexion->prepare("SELECT id, password FROM users WHERE usersname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["usersname"] = $username;
            $_SESSION["id"] = $id;
            header("Location:../secciones/index.php");
            exit();
        } else {
            header( "location:./");
            exit();
        }
    } else {

        
            echo "<script>alert('USUARIO O CONTRASEÑA INCORRECTOS.');
            window.location.href = './'</script>";
            

    }

    $stmt->close();
}
$conexion->close();
?>
