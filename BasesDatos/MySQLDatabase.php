<?php
require_once 'DatabaseInterface.php';
class MySQLDatabase implements DatabaseInterface {
    private $conexion;

    public function __construct($server, $user, $pass, $db) {
        $this->conexion = new mysqli($server, $user, $pass, $db);
        if ($this->conexion->connect_errno) {
            throw new Exception("Error en la conexión: " . $this->conexion->connect_errno);
        }
    }

    public function query($sql) {
        return $this->conexion->query($sql);
    }

    public function prepare($sql) {
        return $this->conexion->prepare($sql);
    }

    public function connectError() {
        return $this->conexion->connect_errno;
    }

    // Método para obtener la conexión mysqli
    public function getConnection() {
        return $this->conexion;
    }
}