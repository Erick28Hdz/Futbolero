<?php
include '../Plataforma/conexion.php';

// Exportar la base de datos
function exportarBaseDeDatos($conexion) {
    // Nombre del archivo de exportación
    $filename = '../../BasesDatos/Backup.sql';

    // Consulta para obtener todas las tablas de la base de datos
    $tables = array();
    $sql = "SHOW TABLES";
    $result = $conexion->query($sql);

    // Recorrer el resultado y almacenar los nombres de las tablas en un array
    while ($row = $result->fetch_array()) {
        $tables[] = $row[0];
    }

    // Abrir el archivo de exportación en modo escritura
    $file = fopen($filename, 'w');

    // Recorrer las tablas y generar las instrucciones de exportación
    foreach ($tables as $table) {
        // Agregar un salto de línea entre las tablas
        fwrite($file, "\n");

        // Obtener la estructura de la tabla
        $sql = "SHOW CREATE TABLE `$table`";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();
        $createTable = $row['Create Table'];

        // Escribir la instrucción CREATE TABLE en el archivo
        fwrite($file, $createTable);
        fwrite($file, ";\n");

        // Obtener los datos de la tabla
        $sql = "SELECT * FROM $table";
        $result = $conexion->query($sql);

        // Recorrer los resultados y generar las instrucciones de inserción
        while ($row = $result->fetch_assoc()) {
            $tableColumns = implode(", ", array_keys($row));
            $tableValues = implode("', '", array_values($row));
            $insertStatement = "INSERT INTO $table ($tableColumns) VALUES ('$tableValues');";

            // Escribir la instrucción INSERT en el archivo
            fwrite($file, $insertStatement);
            fwrite($file, "\n");
        }
    }

    // Cerrar el archivo
    fclose($file);

    // Redirigir al usuario a index.php
    header("Location: Selecciones.php");
    exit();
}

// Llamar a la función de exportación
exportarBaseDeDatos($conexion);

// Cerrar la conexión a la base de datos
$conexion->close();
?>