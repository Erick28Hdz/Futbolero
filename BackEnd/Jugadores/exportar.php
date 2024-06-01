<?php
// Incluir el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

// Nombre del archivo CSV que se generará
$csvFileName = 'jugadores.csv';

// Encabezados de columna para el archivo CSV
$columnHeaders = array('ID', 'Dorsal', 'Posicion', 'Nombres', 'Apellidos', 'FechaNacimiento', 'Edad', 'Estatura', 'PieHabil', 'PrecioMercado', 'PartidosJugados', 'TiempoJugado', 'Goles', 'Asistencias', 'Atajadas', 'TarjetasAmarillas', 'DoblesAmarillas', 'RojasDirectas', 'FKTemporada', 'FKIDLigas', 'FKIDClubes', 'FKIDNacionalidades', 'FKIDSeleccionNacional', 'FKIDPatrocinadores', 'FKIDPartidos');

// Consulta SQL para seleccionar todos los jugadores
$consulta = "SELECT * FROM tblplantillas";

// Ejecutar la consulta
$resultado = $conexion->query($consulta);

// Crear un nuevo archivo CSV y escribir los encabezados de columna
$file = fopen($csvFileName, 'w');
fputcsv($file, $columnHeaders);

// Recorrer los resultados y escribir cada fila en el archivo CSV
while ($fila = $resultado->fetch_assoc()) {
    fputcsv($file, $fila);
}

// Cerrar el archivo CSV y la conexión a la base de datos
fclose($file);
$conexion->close();

// Descargar el archivo CSV generado
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=' . $csvFileName);
readfile($csvFileName);
?>
