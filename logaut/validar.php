<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "dorado");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["usuario"];
    $password = $_POST["password"];

    // Traer tipo_cargo en lugar de id_cargo
    $stmt = $conexion->prepare("
        SELECT u.id, u.fullname, c.tipo_cargo, u.password 
        FROM users u 
        JOIN cargo c ON u.id = c.id_users 
        WHERE u.usersname = ?
    ");
    
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $fullname, $tipo_cargo, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["usersname"] = $username;
            $_SESSION["fullname"] = $fullname;
            $_SESSION["tipo_cargo"] = $tipo_cargo;
            $_SESSION["id"] = $id;

            // Redireccionar según el cargo
            switch ($tipo_cargo) {
                case 'admin':
                    header("Location: ../secciones/index.php");
                    break;
                case 'usuario':
                    header("Location: ../secciones/users.php");
                    break;
                default:
                    header("Location: ./");
                    break;
            }
            exit();
        } else {
            header("Location: ./");
            exit();
        }
    }

    $stmt->close();
}
$conexion->close();
?>
