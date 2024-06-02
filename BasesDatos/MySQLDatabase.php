<?php
require 'DatabaseInterface.php';
class MySQLDatabase implements DatabaseInterface {
    private $connection;

    public function __construct($server, $user, $pass, $db) {
        $this->connection = new mysqli($server, $user, $pass, $db);
        if ($this->connection->connect_errno) {
            throw new Exception("Error en la conexión: " . $this->connection->connect_errno);
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }

    public function connectError() {
        return $this->connection->connect_errno;
    }
}
