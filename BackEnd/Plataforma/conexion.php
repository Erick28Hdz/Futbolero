<?php
require_once __DIR__ . '/../../BasesDatos/MySQLDatabase.php';

$server= "localhost";
$user = "root";
$pass = "";
$db = "futbolerodb";

try {
    $conexion = new MySQLDatabase('localhost', 'root', '', 'futbolerodb');
    $mysqli = $conexion->getConnection();  // Aquí obtienes el objeto mysqli
} catch (Exception $e) {
    die("Error de conexión: " . $e->getMessage());
}