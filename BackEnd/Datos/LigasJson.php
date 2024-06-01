<?php
include '../Plataforma/conexion.php';

// Consulta SQL para seleccionar solo ID y Nombre de tblclubes
$query = "SELECT ID, Nombre FROM tblligas";

// Preparar y ejecutar la consulta
try {
    // Verificar si la variable $conexion está definida
    if (!isset($conexion)) {
        throw new Exception("La variable \$conexion no está definida.");
    }

    $resultado = $conexion->query($query);

    if (!$resultado) {
        throw new Exception("Error al ejecutar la consulta: " . $conexion->error);
    }

    // Obtener los resultados de la consulta
    $ligas = [];
    while ($fila = $resultado->fetch_assoc()) {
        $ligas[] = $fila;
    }

    // Liberar el resultado
    $resultado->free();

} catch (Exception $e) {
    die($e->getMessage());
}

// Convertir el resultado a formato JSON
$json_data = json_encode($ligas);

// Especificar la ruta del archivo JSON en tu servidor
$ruta_json = '../../FrontEnd/Json/Ligas.json';

// Escribir el JSON en el archivo
if (file_put_contents($ruta_json, $json_data) !== false) {
    echo "JSON generado y guardado exitosamente.";
} else {
    echo "Error al guardar el JSON.";
}
?>