<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Obtiene el ID del usuario que se desea eliminar de la URL
$id = $_POST['idUsuario'];

// Prepara una declaración SQL para eliminar el usuario por ID
$sql = "DELETE FROM tblusuarios WHERE idUsuario = ?";
$stmt = $conexion->prepare($sql);

// Asocia el parámetro a la declaración SQL y ejecuta la misma
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: Usuarios.php");
} else {
    echo "Error al eliminar el usuario: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>

