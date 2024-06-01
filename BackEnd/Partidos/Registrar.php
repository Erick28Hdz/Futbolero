<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $calendario = $_POST['Calendario'];
    $clubLocal = $_POST['ClubLocal'];
    $clubVisitante = $_POST['ClubVisitante'];
    $hora = $_POST['Hora'];
    $fecha = $_POST['Fecha'];
    $resultadoLocal = $_POST['ResultadoLocal'];
    $resultadoVisitante = $_POST['ResultadoVisitante'];
    $puntos = $_POST['Puntos'];
    $goles = $_POST['Goles'];
    $tarjetasAmarillas = $_POST['TarjetasAmarillas'];
    $tarjetasRojas = $_POST['TarjetasRojas'];
    $doblesAmarillas = $_POST['DoblesAmarillas'];
    $fkidPlantilla = $_POST['FKIDPlantilla'];
    $fkidLigas = $_POST['FKIDLigas'];
    
    if (empty($calendario) || empty($clubLocal) || empty($clubVisitante) || empty($hora) || empty($fecha) || empty($resultadoLocal) || empty($resultadoVisitante) || empty($puntos) || empty($goles) || empty($tarjetasAmarillas) || empty($tarjetasRojas) || empty($doblesAmarillas) || empty($fkidPlantilla) ||  empty($fkidLigas)) {
        echo "Error: Todos los campos son obligatorios. Por favor, complete el formulario.";
    } else {
        // Realiza la inserción en la base de datos
        $sql = "INSERT INTO tblpartidos (Calendario, ClubLocal, ClubVisitante, Hora, Fecha, ResultadoLocal, ResultadoVisitante, Puntos, Goles, TarjetasAmarillas, TarjetasRojas, DoblesAmarillas, FKIDPlantilla, FKIDLigas) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conexion->prepare($sql);
        if (!$stmt) {
            die('Error en la preparación de la consulta: ' . $conexion->error);
        }
        $stmt->bind_param("ssssssssssssss", $calendario, $clubLocal, $clubVisitante, $hora, $fecha, $resultadoLocal, $resultadoVisitante, $puntos, $goles, $tarjetasAmarillas, $tarjetasRojas, $doblesAmarillas, $fkidPlantilla, $fkidLigas);

        if ($stmt->execute()) {
            // Inserción exitosa, redirige a la página de inicio
            header("Location: /BackEnd/Ligas/Ligas.php");
            exit(); // Asegura que no se ejecute más código después de la redirección
        } else {
            // Manejo de error en caso de fallo de la inserción
            echo "Error al agregar el partido: " . $stmt->error;
        }
    }
    $stmt->close();
}

$conexion->close();
?>
