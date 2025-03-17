<?php
require_once '../config/conexion.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM usuarios");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($datos) {
        $sql = "INSERT INTO usuarios (fullname, username, password, email, cargo) 
                VALUES ('".$datos['fullname']."', '".$datos['username']."', '".password_hash($datos['password'], PASSWORD_DEFAULT)."', '".$datos['email']."', '".$datos['cargo']."')";
        return $this->db->query($sql);
    }
}
?>
