<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $genero = $_POST['Género'];
    $pais = $_POST['País']; // No se utiliza password_hash()
    $ciudad = $_POST['Ciudad'];
    $edad = $_POST['Edad'];
    $rol = 'Invitado';
    

    // Realiza la inserción en la base de datos
    $sql = "INSERT INTO tblinvitados (Género, País, Ciudad, Edad, FKIDRoles) VALUES (?, ?, ?, ?, (SELECT IdRol FROM tblroles WHERE Nombre = ?))";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $mysqli->error);
    }
    $stmt->bind_param("sssss", $genero, $pais, $ciudad, $edad, $rol);

    if ($stmt->execute()) {
        // Inserción exitosa, redirige a la página de inicio
        header("Location: /../FrontEnd/html/Inicio_sesion/Inicio.html");
        exit(); // Asegura que no se ejecute más código después de la redirección
    } else {
        // Manejo de error en caso de fallo de la inserción
        echo "Error al agregar el invitado: " . $stmt->error;
    }
}

$mysqli->close();
?>
