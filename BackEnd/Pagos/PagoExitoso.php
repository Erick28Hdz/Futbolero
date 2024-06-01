<?php
require '../Plataforma/conexion.php';
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['idUsuario'])) {
    // Si el usuario no está autenticado, redirigirlo a la página de inicio de sesión
    header("Location: /FrontEnd/html/Inicio_sesión/Inicio.html");
    exit();
}

// Obtener la información de la sesión
$idUsuario = $_SESSION['idUsuario'];
$fechaInicio = date('Y-m-d'); // La fecha de inicio es la fecha actual
$tipoMembresia = $_GET['plan'];
$precioPlan = $_GET['price'];

// Aquí podrías incluir el código para actualizar el rol del usuario según la membresía seleccionada
function obtenerNuevoRol($planSeleccionado)
{
    // Implementa tu lógica para asignar un nuevo rol según el plan seleccionado
    switch ($planSeleccionado) {
        case 'Básico':
            return 2; // ID del rol para el plan básico
        case 'Estrella':
            return 3; // ID del rol para el plan estrella
        case 'Premium':
            return 4; // ID del rol para el plan premium
        default:
            return 2; // Por defecto, asignar el rol básico
    }
}

// Obtener el nuevo rol basado en el tipo de membresía
$nuevoRol = obtenerNuevoRol($tipoMembresia);

// Actualizar el rol del usuario en la base de datos
if (isset($conexion)) {
    $sql = "UPDATE tblusuarios SET FKIDRoles = ? WHERE IdUsuario = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ii", $nuevoRol, $idUsuario);
    $stmt->execute();
}

// Calcular la fecha de finalización de la membresía
// Suponiendo que la duración de la membresía está en días
$duracionMembresia = 30; // Por ejemplo, un mes de duración
$fechaFin = date('Y-m-d', strtotime($fechaInicio . " + $duracionMembresia days"));

// Mostrar un mensaje de pago exitoso y la información relevante al usuario
echo "¡Pago exitoso!<br>";
echo "Precio: $" . $precioPlan . "<br>";
echo "Tipo de membresía: " . $tipoMembresia . "<br>";
echo "Fecha de inicio: $fechaInicio <br>";
echo "Fecha de finalización: $fechaFin <br>";

// Redirigir al usuario a la página de aceptado después de mostrar el mensaje
header("Location: /FrontEnd/html/Pagos/pagoaceptado.html");
exit();
?>
