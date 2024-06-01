// Toca cambiar los datos de acuerdo a la base de datos
<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Obtiene el ID del usuario que se desea eliminar de la URL
$id = $_POST['idInvitado'];

// Prepara una declaración SQL para eliminar el usuario por ID
$sql = "DELETE FROM tblinvitados WHERE idInvitado = ?";
$stmt = $conexion->prepare($sql);

// Asocia el parámetro a la declaración SQL y ejecuta la misma
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
    header("Location: Invitados.php");
} else {
    echo "Error al eliminar el invitado: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>