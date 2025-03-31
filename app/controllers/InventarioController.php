<?php
require '../../config/conexion.php';

class InventarioController {
    public function obtenerProductos() {
        global $conexion;
        $query = "SELECT * FROM producto";
        return $conexion->query($query);
    }

    public function agregarProducto($nombre, $cantidad, $precio, $vendedor) {
        global $conexion;
        $query = "INSERT INTO producto (nombre, cantidad, precio, vendedor_id) 
                  VALUES ('$nombre', '$cantidad', '$precio', '$vendedor')";
        return $conexion->query($query);
    }
}

// Uso
$inventario = new InventarioController();
$productos = $inventario->obtenerProductos();
?>
