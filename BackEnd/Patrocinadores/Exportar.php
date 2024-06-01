<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Nombre del archivo CSV a generar
$csvFileName = 'patrocinadores.csv';

// Encabezados del archivo CSV
$csvHeader = array('ID', 'RazonSocial', 'TipoContrato', 'TiempoContrato', 'FKIDPlantilla', 'FKIDClubes', 'FKIDSeleccionesNacionales', 'FKIDTemporadas');

// Consulta para obtener todos los patrocinadores
$sql = "SELECT * FROM tblpatrocinadores";
$result = $conexion->query($sql);

if ($result->num_rows > 0) {
    // Abrir un nuevo archivo CSV para escribir
    $csvFile = fopen($csvFileName, 'w');

    // Escribir los encabezados en el archivo CSV
    fputcsv($csvFile, $csvHeader);

    // Recorrer los resultados y escribir cada fila en el archivo CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($csvFile, $row);
    }

    // Cerrar el archivo CSV
    fclose($csvFile);

    // Descargar el archivo CSV generado
    header('Content-Type: application/csv');
    header('Content-Disposition: attachment; filename=' . $csvFileName);
    readfile($csvFileName);
} else {
    echo "No se encontraron patrocinadores para exportar.";
}
?>
