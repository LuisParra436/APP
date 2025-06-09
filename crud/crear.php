<?php
session_start();
?>
<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["usersname"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $cargo = $_POST["id_cargo"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];

    $stmt = $conexion->prepare("INSERT INTO users (fullname, usersname, password,id_cargo,telefono,direccion) VALUES (?, ?, ?,?,?,?)");
    $stmt->bind_param("ssssss", $fullname, $username, $password, $cargo, $telefono, $direccion);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location='crear.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>
<body>
<header>
    <img src="../src/logo.png" class="logo">   <br>  <h1>AREPAS EL DORADO</h1>
</header>
<div class="cuadro-usuario">
    <h2>👤<?php echo htmlspecialchars($_SESSION['fullname']); ?></h2> <h3><?php echo htmlspecialchars($_SESSION['tipo_cargo']); ?></h3></div>
    
    <nav class="regresar"> 
         <br><br><br>
        <button class="btn-regresar" onclick="location.href='../secciones/index.php'">Regresar</button>
        <br><br><br>
    
    </nav>
    
    <main>


            <form method="POST">
            <input type="text" name="fullname" placeholder="Nombre de usuario" required>
            <input type="email" name="usersname" placeholder="Correo electrónico" required>
            <input type="tel" name="telefono" placeholder="Telefono" required>
            <input type="text" name="direccion" placeholder="Direccion" required>
            <input type="password" name="password" placeholder="Contraseña" required>

            <select name="id_cargo" required>
            <option value="" disabled selected>Seleccione un cargo</option>
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
            
        </select>

            <button type="submit">Registrar</button>
        </form>

        


    </main>

        

<footer>
    📍 Dirección: Calle 76 A # 78 C 42 SUR, Bogotá | 📞 Teléfono: 3046074611 | ✉ Email:
 </footer>

</body>
</html>

