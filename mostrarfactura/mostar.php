<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "dorado");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener todos los clientes para mostrar enlaces dinámicos
$query_clientes = "SELECT id, fullname FROM cliente";
$result_clientes = $conexion->query($query_clientes);

// Obtener el cliente seleccionado (por defecto, cliente 1)
$cliente_id = isset($_GET['cliente_id']) ? intval($_GET['cliente_id']) : 1;

// Obtener el nombre del cliente seleccionado
$query_cliente = "SELECT fullname FROM cliente WHERE id = ?";
$stmt_cliente = $conexion->prepare($query_cliente);
$stmt_cliente->bind_param("i", $cliente_id);
$stmt_cliente->execute();
$result_cliente = $stmt_cliente->get_result();
$cliente = $result_cliente->fetch_assoc();
$nombre_cliente = $cliente ? $cliente['fullname'] : "Desconocido";

// Consulta para obtener los productos con precios personalizados
$query = "SELECT productos.id AS producto_id, productos.fullname AS producto,
                 COALESCE(precios.precio, productos.precio) AS precio
          FROM productos
          LEFT JOIN precios ON productos.id = precios.producto_id AND precios.cliente_id = ?";

$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $cliente_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>
<body>
    
    <h2>Productos para Cliente: <?php echo $nombre_cliente; ?> </h2>

    <h3>Seleccionar Cliente:</h3>
    <table border="2">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acción</th>
        </tr>
        <?php while ($row_cliente = $result_clientes->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row_cliente['id']; ?></td>
                <td><?php echo $row_cliente['fullname']; ?></td>
                <td>
                    <form method="GET">
                        <input type="hidden" name="cliente_id" value="<?php echo $row_cliente['id']; ?>">
                        <button type="submit">Seleccionar</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <br>

    <table border="1">
        <tr>
            <th>Cant</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>V.Total</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>
                    <input type="number" min="0" value="null" class="cantidad" 
                           data-precio="<?php echo $row['precio']; ?>" oninput="calcularTotal()">
                </td>
                <td><?php echo $row['producto']; ?></td>
                <td>$ <?php echo number_format($row['precio'], 2); ?></td>
                <td class="valorTotal">$0</td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan="3"><b>Total:</b></td>
            <td id="totalFactura">$0</td>
        </tr>
    </table>

<script>
    function calcularTotal() {
        let totalGeneral = 0;
        document.querySelectorAll("tr").forEach(tr => {
            let input = tr.querySelector(".cantidad");
            let valorTotal = tr.querySelector(".valorTotal");
            if (input) {
                let cantidad = parseInt(input.value) || 0;
                let precio = parseFloat(input.getAttribute("data-precio"));
                let total = cantidad * precio;
                valorTotal.textContent = "$" + new Intl.NumberFormat().format(total);
                totalGeneral += total;
            }
        });
        document.getElementById("totalFactura").textContent = "$" + new Intl.NumberFormat().format(totalGeneral);
    }
</script>

</body>
</html>

<?php
// Cerrar conexiones
$stmt->close();
$stmt_cliente->close();
$conexion->close();
?>
