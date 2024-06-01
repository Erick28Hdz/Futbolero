<?php
require_once __DIR__ . '/../../BasesDatos/DatabaseInterface.php';

class Autenticacion {
    private $db;

    public function __construct(DatabaseInterface $db) {
        $this->db = $db;
    }

    public function login($email, $password) {
        // Consultar la base de datos para verificar las credenciales
        $user = $this->db->query("SELECT * FROM tblusuarios WHERE correo = '$email' AND password = '$password'");

        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($user) {
            // Usuario autenticado correctamente
            return true;
        } else {
            // Usuario no autenticado
            return false;
        }
    }
}