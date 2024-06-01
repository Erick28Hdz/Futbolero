<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Verificar si se ha enviado el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $tipoFichaje = $_POST['tipo_fichaje'];
    $clubAnterior = $_POST['club_anterior'];
    $clubActual = $_POST['club_actual'];
    $costoFichaje = $_POST['costo_fichaje'];

    // Validar los campos obligatorios
    if (empty($tipoFichaje) || empty($clubAnterior) || empty($clubActual) || empty($costoFichaje)) {
        echo "Error: Todos los campos son obligatorios. Por favor, complete el formulario.";
    } else {
        // Preparar la consulta SQL para insertar el nuevo fichaje
        $sql = "INSERT INTO tblfichajes (TipoFichaje, ClubAnterior, ClubActual, CostoFichaje) VALUES (?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        
        // Verificar si la preparación de la consulta fue exitosa
        if ($stmt) {
            // Vincular los parámetros y ejecutar la consulta
            $stmt->bind_param("sssd", $tipoFichaje, $clubAnterior, $clubActual, $costoFichaje);
            if ($stmt->execute()) {
                // Redirigir a una página de éxito o mostrar un mensaje de éxito
                echo "El fichaje se ha registrado correctamente.";
            } else {
                // Manejar errores en la ejecución de la consulta
                echo "Error al registrar el fichaje: " . $stmt->error;
            }
            // Cerrar la declaración preparada
            $stmt->close();
        } else {
            // Manejar errores en la preparación de la consulta
            echo "Error en la preparación de la consulta: " . $conexion->error;
        }
    }
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
