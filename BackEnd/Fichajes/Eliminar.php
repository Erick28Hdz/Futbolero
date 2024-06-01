<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Verificar si se recibió un ID de fichaje válido
if (isset($_GET['idFichaje']) && !empty($_GET['idFichaje'])) {
    $idFichaje = $_GET['idFichaje'];

    // Consulta para eliminar el fichaje por su ID
    $consultaEliminar = "DELETE FROM tblfichajes WHERE idFichaje = ?";
    $stmtEliminar = $conexion->prepare($consultaEliminar);
    $stmtEliminar->bind_param("i", $idFichaje);

    // Ejecutar la consulta de eliminación
    if ($stmtEliminar->execute()) {
        echo "Fichaje eliminado correctamente.";
    } else {
        echo "Error al eliminar el fichaje: " . $stmtEliminar->error;
    }
} else {
    // Mostrar un mensaje de error si no se proporcionó un ID de fichaje válido
    echo "ID de fichaje no válido.";
}

// Cerrar la conexión y liberar los recursos
$stmtEliminar->close();
$conexion->close();
?>
