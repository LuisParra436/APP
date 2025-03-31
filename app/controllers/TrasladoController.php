<?php
require '../config/conexion.php';

class TrasladoController {
    public function trasladarProducto($producto_id, $vendedor_origen, $vendedor_destino) {
        global $conexion;

        // Verificar si el producto pertenece al vendedor origen
        $check = $conexion->query("SELECT * FROM productos WHERE id = '$producto_id' AND vendedor_id = '$vendedor_origen'");
        
        if ($check->num_rows > 0) {
            // Actualizar el producto con el nuevo vendedor
            $query = "UPDATE productos SET vendedor_id = '$vendedor_destino' WHERE id = '$producto_id'";
            return $conexion->query($query);
        } else {
            return false;
        }
    }
}
?>
