<?php
require_once '../../config/conexion.php';

class Usuario {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll() {
        $query = $this->db->query("SELECT * FROM dorado");
        return $query->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($datos) {
        $sql = "INSERT INTO users (fullname, usersname, password, cargo) 
                VALUES ('".$datos['fullname']."', '".$datos['usersname']."', '".password_hash($datos['password'], PASSWORD_DEFAULT)."', '".$datos['cargo']."')";
        return $this->db->query($sql);
    }
}
?>
