<?php
// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Incluir el archivo de conexión a la base de datos
    require '../Plataforma/conexion.php';

    // Obtener los datos del formulario
    $razonSocial = $_POST['razon_social'] ?? '';
    $tipoContrato = $_POST['tipo_contrato'] ?? '';
    $tiempoContrato = $_POST['tiempo_contrato'] ?? '';

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO tblpatrocinadores (RazonSocial, TipoContrato, TiempoContrato) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $razonSocial, $tipoContrato, $tiempoContrato);

    if ($stmt->execute()) {
        // Registro exitoso
        echo "El patrocinador se registró correctamente.";
    } else {
        // Error en el registro
        echo "Error al registrar el patrocinador: " . $stmt->error;
    }

    // Cerrar la conexión y liberar recursos
    $stmt->close();
    $conexion->close();
} else {
    // Redireccionar si se intenta acceder al script directamente sin datos del formulario
    header("Location: patrocinadores.php");
    exit();
}
?>

