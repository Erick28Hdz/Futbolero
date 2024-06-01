<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Verificar si se recibió el ID del jugador a eliminar
if (isset($_GET['id'])) {
    $idJugador = $_GET['id'];

    // Preparar la consulta SQL para eliminar el jugador
    $consulta = "DELETE FROM tblplantillas WHERE ID=?";

    // Preparar la sentencia
    $stmt = $conexion->prepare($consulta);

    // Vincular parámetros
    $stmt->bind_param("i", $idJugador);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        // Redirigir a la página de jugadores con un mensaje de éxito
        header("Location: jugadores.php?eliminacion=exitosa");
        exit();
    } else {
        // Si la consulta falla, mostrar un mensaje de error
        echo "Error al eliminar el jugador: " . $stmt->error;
    }

    // Cerrar la sentencia
    $stmt->close();
} else {
    echo "ID de jugador no proporcionado.";
    exit();
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
