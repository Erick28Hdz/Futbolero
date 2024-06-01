<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $nombre = $_POST['Nombre'];
    $numeroEquipos = $_POST['NumeroEquipos'];
    $idClubes = $_POST['FKIDClubes'];
    $idNacionalidades = $_POST['FKIDNacionalidades'];
    $idTemporada = $_POST['FKIDTemporada'];
    $idPartidos = $_POST['FKIDPartidos'];
    
    if (empty($nombre) && empty($numeroEquipos) && empty($idClubes) && empty($idNacionalidades) && empty($idTemporada) && empty($idPartidos)) {
        echo "Error: Todos los campos son obligatorios. Por favor, complete el formulario.";
    } else {
        // Verifica si el nombre ya existe en la base de datos
        $verificarNombre = "SELECT COUNT(*) as total FROM tblligas WHERE Nombre = ?";
        $stmtVerificar = $conexion->prepare($verificarNombre);
        $stmtVerificar->bind_param("s", $nombre);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();
        $rowVerificar = $resultVerificar->fetch_assoc();
       
    if ($rowVerificar['total'] > 0) {
      // La selección ya existe, manejar el error o redirigir a una página de error            echo "Error: La selección ya está registrada.";
    } else {
    // Realiza la inserción en la base de datos
    $sql = "INSERT INTO tblligas (Nombre, NumeroEquipos, FKIDClubes, FKIDNacionalidades, FKIDTemporada, FKIDPartidos) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $conexion->error);
    }
    $stmt->bind_param("ssssss", $nombre, $numeroEquipos, $idClubes, $idNacionalidades, $idTemporada, $idPartidos);

    if ($stmt->execute()) {
        // Inserción exitosa, redirige a la página de inicio
        header("Location: /BackEnd/Ligas/Ligas.php");
        exit(); // Asegura que no se ejecute más código después de la redirección
    } else {
        // Manejo de error en caso de fallo de la inserción
        echo "Error al agregar la liga: " . $stmt->error;
    }
}
}
$stmtVerificar->close();
$stmt->close();
}

$conexion->close();
?>
