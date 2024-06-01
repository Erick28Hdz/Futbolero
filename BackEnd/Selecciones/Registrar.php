<?php
// Incluye el archivo de conexión a la base de datos
require '../Plataforma/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos del formulario
    $nombre = $_POST['Nombre'];
    $añofundacion = $_POST['AñoFundacion'];
    $idplantilla = $_POST['FKIDPlantilla'];
    $idnacionalidad = $_POST['FKIDNacionalidades'];

    // Verificar campos obligatorios
    if (empty($nombre) && empty($añofundacion) && empty($idplantilla) && empty($idnacionalidad)) {
        echo "Error: Todos los campos son obligatorios. Por favor, complete el formulario.";
    } else {
        // Verifica si el correo ya existe en la base de datos
        $verificarNombre = "SELECT COUNT(*) as total FROM tblseleccionesnacionales WHERE Nombre = ?";
        $stmtVerificar = $conexion->prepare($verificarNombre);
        $stmtVerificar->bind_param("s", $nombre);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();
        $rowVerificar = $resultVerificar->fetch_assoc();

        if ($rowVerificar['total'] > 0) {
            // La selección ya existe, manejar el error o redirigir a una página de error
            echo "Error: La selección ya está registrada.";
        } else {
            // La selección no existe, procede con la inserción en la base de datos "ARREGLAR CON LA BASE DE PLANTILLAS
            $sql = "INSERT INTO tblseleccionesnacionales (Nombre, AñoFundacion, FKIDPlantilla, FKIDNacionalidades) VALUES (?, ?, ?,  (SELECT ID FROM tblnacionalidades WHERE Nombres = ?))";
            $stmt = $conexion->prepare($sql);
            if (!$stmt) {
                die('Error en la preparación de la consulta: ' . $conexion->error);
            }
            $stmt->bind_param("ssss", $nombre, $añofundacion, $idplantilla, $idnacionalidad);

            if ($stmt->execute()) {
                // Inserción exitosa, redirige a la página de inicio
                header("Location: /BackEnd/Selecciones/Selecciones.php");
                exit(); // Asegura que no se ejecute más código después de la redirección
            } else {
                // Manejo de error en caso de fallo de la inserción
                echo "Error al agregar la selección nacional: " . $stmt->error;
            }
        }
    }
    $stmtVerificar->close();
    $stmt->close();
}

$conexion->close();
?>


