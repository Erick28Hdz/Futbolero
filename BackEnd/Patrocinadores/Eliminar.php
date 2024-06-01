<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Verificar si se ha enviado una solicitud para eliminar un patrocinador
if (isset($_POST['id'])) {
    $idPatrocinador = $_POST['id'];

    // Consulta para eliminar el patrocinador de la base de datos
    $sql = "DELETE FROM tblpatrocinadores WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $idPatrocinador);

    if ($stmt->execute()) {
        // Redireccionar después de la eliminación exitosa
        header("Location: patrocinadores.php");
        exit();
    } else {
        echo "Error al eliminar el patrocinador: " . $stmt->error;
    }
}

// Si no se envió una solicitud de eliminación, mostrar un mensaje de error
echo "No se proporcionó un ID de patrocinador para eliminar.";
?>
