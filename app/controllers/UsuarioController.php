<?php
require_once __DIR__ . '/../models/Usuario.php';


class UsuarioController {
    public function listar() {
        $usuario = new Usuario();
        $usuarios = $usuario->getAll();
        require '/../views/usuarios/listar.php';
    }

    public function crear($datos) {
        $usuario = new Usuario();
        $usuario->crear($datos);
        header('Location: listar.php');
    }
}
?>
