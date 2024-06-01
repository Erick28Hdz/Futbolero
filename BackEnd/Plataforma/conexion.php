<?php
require '/Futbolero/BasesDatos/MySQLDatabase.php';

$server= "localhost";
$user = "root";
$pass = "";
$db = "futbolerodb";

try {
    $conexion = new MySQLDatabase($server, $user, $pass, $db);
} catch (Exception $e) {
    die($e->getMessage());
}
